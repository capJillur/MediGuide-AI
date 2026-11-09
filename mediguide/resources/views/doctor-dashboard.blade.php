@extends('layouts.dashboard')
@section('title', 'Clinician Dashboard | MediGuide AI')
@section('content')
    <main class="dashboard-shell">
        <header class="dashboard-header">
            <div>
                <span class="pill">Clinician Dashboard</span>
                <h1>Welcome back, {{ auth()->user()->name }}</h1>
                <p>Your provider account is verified. Review your profile details and available tools.</p>
            </div>
        </header>

        <section class="dashboard-grid" aria-label="Clinician tools">
            <article class="dashboard-card dashboard-card--teal is-disabled" aria-disabled="true">
                <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4v6a4 4 0 0 0 8 0V4"/><path d="M6 4H4v2m10-2h2v2"/><path d="M10 14v2a4 4 0 0 0 8 0v-1"/><circle cx="18" cy="13" r="2"/></svg></span>
                <span class="dashboard-card-label">Provider profile</span>
                <h2>{{ auth()->user()->specialty ?: 'Specialty' }}</h2>
                <p>Provider directory and specialty matching are not available yet.</p>
                <span class="dashboard-card-link dashboard-disabled-note">Not available yet</span>
            </article>

            <article class="dashboard-card dashboard-card--blue is-disabled" aria-disabled="true">
                <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/><path d="m9 15 2 2 4-4"/></svg></span>
                <span class="dashboard-card-label">Appointment management</span>
                <h2>Schedule</h2>
                <p>Patient booking and schedule management are not available yet.</p>
                <span class="dashboard-card-link dashboard-disabled-note">Not available yet</span>
            </article>

            {{-- <a class="dashboard-card dashboard-card--violet" href="{{ route('home') }}#ai">
                <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="7" width="16" height="13" rx="3"/><path d="M12 3v4m-4 5h.01M16 12h.01M9 16h6"/></svg></span>
                <span class="dashboard-card-label">Guided navigation</span>
                <h2>AI care guide</h2>
                <p>View the care-navigation demonstration.</p>
                <span class="dashboard-card-link">Open demo <span aria-hidden="true">&rarr;</span></span>
            </a> --}}

            <article class="dashboard-card dashboard-card--amber is-disabled" aria-disabled="true">
                <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/><path d="m9 12 2 2 4-4"/></svg></span>
                <span class="dashboard-card-label">Credentials</span>
                <h2>License details</h2>
                <p>{{ auth()->user()->license_no ? 'License on file: ' . auth()->user()->license_no : 'License details are not available.' }}</p>
                <span class="dashboard-card-link dashboard-disabled-note">Profile tools unavailable</span>
            </article>
        </section>
    </main>
@endsection