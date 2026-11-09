<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'MediGuide AI')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="page-loader" id="page-loader" role="status" aria-label="Loading MediGuide AI">
        <div class="loader-content">
            <span class="loader-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M9 2h6v7h7v6h-7v7H9v-7H2V9h7z"/></svg>
            </span>
            <span class="loader-title">MediGuide <b>AI</b></span>
            <svg class="loader-pulse" viewBox="0 0 220 48" aria-hidden="true">
                <path class="loader-pulse-track" d="M2 24h216"/>
                <path class="loader-pulse-line" d="M2 24h76l10 0 8-18 12 36 10-28 9 10h93"/>
            </svg>
        </div>
    </div>
    <nav class="top" aria-label="Primary navigation">
        <div class="wrap">
            <a href="{{ route('home') }}" class="logo"><i>♥</i><span>MediGuide AI<small>Intelligent Healthcare
                        Navigation</small></span></a>
            <div class="links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('home') }}#services">Services</a>
                <a href="{{ route('home') }}#how">How It Works</a>
                <a href="{{ route('home') }}#ai">AI Guidance</a>
                <a href="{{ route('home') }}#trust">Clinical Trust</a>
                <a href="{{ route('home') }}#faq">FAQ</a>
            </div>
            <div class="sp"></div>
            <div class="nav-actions">
                @auth
                    <span style="font-size:13px;color:var(--mut)">{{ auth()->user()->name }}</span>
                    @if (auth()->user()->role === 'admin')
                        <a class="btn" href="{{ route('admin.index') }}">Admin</a>
                    @endif
                    <form method="post" action="{{ route('logout') }}">@csrf<button class="btn">Sign out</button></form>
                @else
                    <a class="btn soft" href="{{ route('login', 'doctor') }}">Doctor Sign In</a>
                    <a class="btn p" href="{{ route('login', 'patient') }}">Patient Sign In</a>
                @endauth
            </div>
        </div>
    </nav>
    @yield('content')
    <footer>
        <div class="wrap">
            <div><a class="logo"><i>♥</i>MediGuide AI</a>
                <p style="margin-top:14px;max-width:260px">Healthcare guidance and clinical management, made simpler,
                    compassionate, and transparent.</p>
            </div>
            <div style="display:flex;gap:70px">
                <div>
                    <h5>Explore</h5><a>Doctor Appointments</a><a>Diagnostic Tests</a><a>AI Care Navigation</a><a>How It
                        Works</a><a>FAQ</a>
                </div>
                <div>
                    <h5>Support &amp; Legal</h5><a>Contact Support</a><a>Privacy Policy</a><a>Terms of
                        Service</a><a>Security Standards</a><a style="color:#ff6b6b">Emergency Guidance</a>
                </div>
            </div>
        </div>
        <div class="legal">© 2025 MediGuide AI Inc. All rights reserved. MediGuide AI provides care navigation and is
            not an emergency service or clinical diagnostic tool.</div>
    </footer>
    <script>
        const pageLoader = document.getElementById('page-loader');
        let pageLoaderDismissed = false;

        const dismissPageLoader = () => {
            if (pageLoaderDismissed || !pageLoader) return;

            pageLoaderDismissed = true;
            pageLoader.classList.add('is-hidden');
            window.setTimeout(() => pageLoader.remove(), 450);
        };

        const schedulePageLoaderDismissal = () => window.setTimeout(dismissPageLoader, 300);

        if (document.readyState === 'complete') {
            schedulePageLoaderDismissal();
        } else {
            window.addEventListener('load', schedulePageLoaderDismissal, { once: true });
        }

        window.setTimeout(dismissPageLoader, 5000);

        document.querySelectorAll('[data-password-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.closest('.password-field').querySelector('input');
                const isVisible = input.type === 'password';

                input.type = isVisible ? 'text' : 'password';
                button.setAttribute('aria-pressed', String(isVisible));
                button.setAttribute('aria-label', isVisible ? 'Hide password' : 'Show password');
            });
        });
    </script>
</body>

</html>
