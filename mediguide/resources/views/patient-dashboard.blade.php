@extends('layouts.dashboard')
@section('title', 'Patient Dashboard | MediGuide AI')
@section('content')
    <main class="dashboard-shell">
        <header class="dashboard-header">
            <div>
                <span class="pill">Patient Dashboard</span>
                <h1>Welcome back, {{ auth()->user()->name }}</h1>
                <p>Your account is verified. Explore your care options and next steps.</p>
            </div>
        </header>

        <div class="patient-dashboard-layout">
            <section class="dashboard-grid patient-dashboard-grid" aria-label="Patient care options">
                <article class="dashboard-card dashboard-card--teal is-disabled" aria-disabled="true">
                    <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 4v6a4 4 0 0 0 8 0V4"/><path d="M6 4H4v2m10-2h2v2"/><path d="M10 14v2a4 4 0 0 0 8 0v-1"/><circle cx="18" cy="13" r="2"/></svg></span>
                    <span class="dashboard-card-label">Care directory</span>
                    <h2>Find a doctor</h2>
                    <p>Doctor categories and search are not available yet.</p>
                    <span class="dashboard-card-link dashboard-disabled-note">Not available yet</span>
                </article>

                <article class="dashboard-card dashboard-card--blue is-disabled" aria-disabled="true">
                    <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3h6m-5 0v6l-4.5 8a2 2 0 0 0 1.8 3h9.4a2 2 0 0 0 1.8-3L14 9V3"/><path d="M8 15h8"/></svg></span>
                    <span class="dashboard-card-label">Labs and diagnostics</span>
                    <h2>Explore tests</h2>
                    <p>Diagnostic test booking is not available yet.</p>
                    <span class="dashboard-card-link dashboard-disabled-note">Not available yet</span>
                </article>

                <article class="dashboard-card dashboard-card--violet is-disabled" aria-disabled="true">
                    <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="7" width="16" height="13" rx="3"/><path d="M12 3v4m-4 5h.01M16 12h.01M9 16h6"/></svg></span>
                    <span class="dashboard-card-label">Guided navigation</span>
                    <h2>AI care guide</h2>
                    <p>Personalized AI guidance is not available yet.</p>
                    <span class="dashboard-card-link dashboard-disabled-note">Not available yet</span>
                </article>

                <article class="dashboard-card dashboard-card--amber is-disabled" aria-disabled="true">
                    <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/><path d="m9 15 2 2 4-4"/></svg></span>
                    <span class="dashboard-card-label">Booking status</span>
                    <h2>Appointments</h2>
                    <p>Online appointment booking is not available yet.</p>
                    <span class="dashboard-card-link dashboard-disabled-note">Booking unavailable</span>
                </article>
            </section>

            <aside class="patient-chat-panel" aria-label="MediGuide AI chat preview">
                <div class="patient-chat-header">
                    <span class="dashboard-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 11.5a7.5 7.5 0 0 1-8 7.5 8 8 0 0 1-3.5-.8L4 20l1.3-3.5A7.2 7.2 0 0 1 4 12c0-4.1 3.6-7.5 8-7.5s8 3.1 8 7Z"/><path d="M8 12h.01M12 12h.01M16 12h.01"/></svg></span>
                    <span><strong>MediGuide AI</strong><small>Care navigation preview</small></span>
                    <span class="chat-preview-badge">PREVIEW</span>
                </div>
                <div class="patient-chat-thread">
                    <p class="patient-chat-message patient-chat-message--user">I am not sure which kind of care to look for.</p>
                    <p class="patient-chat-message patient-chat-message--assistant">I can help you explore care options. I cannot diagnose, prescribe, or book appointments.</p>
                    <p class="patient-chat-message patient-chat-message--assistant">What would you like to explore?</p>
                </div>
                <div class="patient-chat-prompts" aria-label="Example prompts">
                    <span>Find a specialist</span>
                    <span>Learn about lab tests</span>
                </div>
                <div class="patient-chat-compose" aria-disabled="true">
                    <span>Chat will be available in a future release</span>
                    <button type="button" disabled aria-label="Chat unavailable">&uarr;</button>
                </div>
                <p class="patient-chat-disclaimer">Preview only. For medical advice, contact a qualified clinician.</p>
            </aside>
        </div>
    </main>
@endsection