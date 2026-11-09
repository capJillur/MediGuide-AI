<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_and_doctor_can_open_their_forgot_password_forms(): void
    {
        $this->get(route('password.request', 'patient'))->assertOk();
        $this->get(route('password.request', 'doctor'))->assertOk();
        $this->get(route('password.request', 'admin'))->assertOk();
    }

    public function test_reset_email_is_only_sent_for_the_selected_portal_role(): void
    {
        Notification::fake();

        $patient = $this->createAccount('user', 'patient@example.test');
        $doctor = $this->createAccount('doctor', 'doctor@example.test');
        $admin = $this->createAccount('admin', 'admin@example.test');

        $this->post(route('password.email', 'doctor'), ['email' => $patient->email])
            ->assertSessionHas('status');
        $this->post(route('password.email', 'patient'), ['email' => $admin->email])
            ->assertSessionHas('status');
        Notification::assertNothingSent();

        $this->post(route('password.email', 'doctor'), ['email' => $doctor->email])
            ->assertSessionHas('status');

        Notification::assertSentTo($doctor, ResetPassword::class);
        Notification::assertNotSentTo($patient, ResetPassword::class);
        Notification::assertNotSentTo($admin, ResetPassword::class);
    }

    public function test_patient_can_reset_password_with_a_valid_token(): void
    {
        $patient = $this->createAccount('user', 'patient@example.test');
        $token = $this->createResetToken($patient);

        $this->get(route('password.reset', ['token' => $token, 'email' => $patient->email]))
            ->assertOk();

        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $patient->email,
            'portal' => 'patient',
            'password' => 'new-patient-password',
            'password_confirmation' => 'new-patient-password',
        ])->assertRedirect(route('login', 'patient'))
            ->assertSessionHas('status');

        $this->assertTrue(Hash::check('new-patient-password', $patient->fresh()->password));
    }

    public function test_admin_can_reset_password_and_returns_to_admin_sign_in(): void
    {
        $admin = $this->createAccount('admin', 'admin@example.test');
        $token = $this->createResetToken($admin);

        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $admin->email,
            'portal' => 'admin',
            'password' => 'new-admin-password',
            'password_confirmation' => 'new-admin-password',
        ])->assertRedirect(route('admin.login'))
            ->assertSessionHas('status');

        $this->assertTrue(Hash::check('new-admin-password', $admin->fresh()->password));
    }

    public function test_doctor_reset_cannot_be_redeemed_through_patient_portal(): void
    {
        $doctor = $this->createAccount('doctor', 'doctor@example.test');
        $token = $this->createResetToken($doctor);

        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $doctor->email,
            'portal' => 'patient',
            'password' => 'new-doctor-password',
            'password_confirmation' => 'new-doctor-password',
        ])->assertSessionHasErrors('email');

        $this->assertTrue(Hash::check('old-password', $doctor->fresh()->password));
    }

    private function createAccount(string $role, string $email): User
    {
        return User::create([
            'name' => ucfirst($role) . ' Account',
            'email' => $email,
            'password' => 'old-password',
            'role' => $role,
            'email_verified_at' => now(),
        ]);
    }

    private function createResetToken(User $user): string
    {
        $token = null;

        Password::broker()->sendResetLink(['email' => $user->email], function ($sentUser, string $sentToken) use (&$token): void {
            $token = $sentToken;
        });

        return $token ?? throw new \RuntimeException('The password reset token was not generated.');
    }
}
