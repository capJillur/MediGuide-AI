<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function createRequest(string $portal)
    {
        return view('auth.forgot-password', compact('portal'));
    }

    public function sendLink(Request $request, string $portal)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $role = match ($portal) {
            'doctor' => 'doctor',
            'admin' => 'admin',
            default => 'user',
        };
        $user = User::where('email', $validated['email'])
            ->where('role', $role)
            ->first();

        if ($user) {
            Password::broker()->sendResetLink(['email' => $user->email]);
        }

        return back()->with('status', 'A password reset link has been sent.');
    }

    public function createReset(Request $request, string $token)
    {
        $email = (string) $request->query('email');
        $user = User::where('email', $email)
            ->whereIn('role', ['user', 'doctor', 'admin'])
            ->first();

        abort_unless($user, 404);

        $portal = match ($user->role) {
            'doctor' => 'doctor',
            'admin' => 'admin',
            default => 'patient',
        };

        return view('auth.reset-password', compact('email', 'portal', 'token'));
    }

    public function reset(Request $request)
    {
        $validated = $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'portal' => ['required', 'in:patient,doctor,admin'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $role = match ($validated['portal']) {
            'doctor' => 'doctor',
            'admin' => 'admin',
            default => 'user',
        };
        $userExists = User::where('email', $validated['email'])
            ->where('role', $role)
            ->exists();

        if (! $userExists) {
            return back()->withErrors(['email' => 'This reset link is not valid for this account.']);
        }

        $status = Password::broker()->reset(
            [
                'email' => $validated['email'],
                'password' => $validated['password'],
                'password_confirmation' => $request->input('password_confirmation'),
                'token' => $validated['token'],
            ],
            function (User $user, string $password): void {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $loginRoute = $validated['portal'] === 'admin' ? 'admin.login' : 'login';
            $loginParameters = $validated['portal'] === 'admin' ? [] : [$validated['portal']];

            return redirect()->route($loginRoute, $loginParameters)
                ->with('status', 'Your password has been reset. Sign in with your new password.');
        }

        return back()->withInput($request->only('email', 'portal'))
            ->withErrors(['email' => __($status)]);
    }
}