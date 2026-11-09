@extends('layouts.dashboard')
@section('title', 'Admin Dashboard | MediGuide AI')
@section('content')
    <main class="dashboard-shell">
        <header class="dashboard-header">
            <div>
                <span class="pill or">Administrator Dashboard</span>
                <h1>Welcome back, {{ auth()->user()->name }}</h1>
                <p>Review account activity and manage users and clinicians.</p>
            </div>
        </header>

        <section class="admin-summary admin-dashboard-summary" aria-label="Account totals">
            <a href="{{ route('admin.index', ['type' => 'user']) }}">
                <span>Patients</span>
                <strong>{{ $counts['user'] }}</strong>
                <small>Manage patient accounts &rarr;</small>
            </a>
            <a href="{{ route('admin.index', ['type' => 'doctor']) }}">
                <span>Doctors</span>
                <strong>{{ $counts['doctor'] }}</strong>
                <small>Manage doctor accounts &rarr;</small>
            </a>
        </section>
    </main>
@endsection