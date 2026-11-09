<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DoctorApprovalTest extends TestCase
{
    use RefreshDatabase;

    public function test_unapproved_doctor_cannot_sign_in(): void
    {
        $doctor = $this->createAccount('doctor', 'doctor@example.test');

        $this->post(route('login.post'), [
            'email' => $doctor->email,
            'password' => 'doctor-password',
            'portal' => 'doctor',
        ])->assertRedirect()
            ->assertSessionHas('approval_pending', 'Your account is not approved yet. Please wait, thank you.');

        $this->assertGuest();
    }

    public function test_admin_approval_allows_doctor_to_sign_in(): void
    {
        $admin = $this->createAccount('admin', 'admin@example.test');
        $doctor = $this->createAccount('doctor', 'doctor@example.test');

        $this->actingAs($admin)
            ->post(route('admin.approve', $doctor))
            ->assertRedirect(route('admin.index', ['type' => 'doctor']))
            ->assertSessionHas('ok', 'Doctor account approved.');

        $this->assertNotNull($doctor->fresh()->doctor_approved_at);

        $this->post(route('login.post'), [
            'email' => $doctor->email,
            'password' => 'doctor-password',
            'portal' => 'doctor',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($doctor->fresh());
    }

    public function test_patient_cannot_approve_a_doctor(): void
    {
        $patient = $this->createAccount('user', 'patient@example.test');
        $doctor = $this->createAccount('doctor', 'doctor@example.test');

        $this->actingAs($patient)
            ->post(route('admin.approve', $doctor))
            ->assertForbidden();

        $this->assertNull($doctor->fresh()->doctor_approved_at);
    }

    private function createAccount(string $role, string $email): User
    {
        return User::create([
            'name' => ucfirst($role) . ' Account',
            'email' => $email,
            'password' => Hash::make($role === 'doctor' ? 'doctor-password' : 'account-password'),
            'role' => $role,
            'email_verified_at' => now(),
        ]);
    }
}