<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        return match ($user->role) {
            'admin' => view('admin-dashboard', [
                'counts' => [
                    'user' => User::where('role', 'user')->count(),
                    'doctor' => User::where('role', 'doctor')->count(),
                ],
            ]),
            'doctor' => view('doctor-dashboard'),
            'user' => view('patient-dashboard'),
            default => abort(403),
        };
    }
}