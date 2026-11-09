<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Dashboard | MediGuide AI')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="dashboard-page">
    <nav class="dashboard-nav" aria-label="Dashboard navigation">
        <div class="dashboard-nav-inner">
            <a class="dashboard-brand" href="{{ route('dashboard') }}">
                <i aria-hidden="true">♥</i>
                <span><strong>MediGuide AI</strong><small>{{ ucfirst(auth()->user()->role) }} workspace</small></span>
            </a>

            <div class="dashboard-nav-links">
                @if (auth()->user()->role === 'admin')
                    <a class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}"
                        href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="{{ request()->routeIs('admin.index') && request('type', 'user') === 'user' ? 'is-active' : '' }}"
                        href="{{ route('admin.index', ['type' => 'user']) }}">Patients</a>
                    <a class="{{ request()->routeIs('admin.index') && request('type') === 'doctor' ? 'is-active' : '' }}"
                        href="{{ route('admin.index', ['type' => 'doctor']) }}">Doctors</a>
                @elseif (auth()->user()->role === 'doctor')
                    <a class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}"
                        href="{{ route('dashboard') }}">Dashboard</a>
                    <span class="dashboard-nav-disabled" aria-disabled="true">Care services</span>
                    <span class="dashboard-nav-disabled" aria-disabled="true">Clinical Care</span>
                    <span class="dashboard-nav-disabled" aria-disabled="true">Appointments</span>
                @else
                    <a class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}"
                        href="{{ route('dashboard') }}">Dashboard</a>
                    <span class="dashboard-nav-disabled" aria-disabled="true">Find care</span>
                    <span class="dashboard-nav-disabled" aria-disabled="true">Diagnostics</span>
                    <a href="{{ route('home') }}#ai">AI guidance</a>
                @endif
            </div>

            <div class="dashboard-nav-account">
                <span
                    class="dashboard-nav-user"><strong>{{ auth()->user()->name }}</strong><small>{{ auth()->user()->email }}</small></span>
                <span class="dashboard-role">{{ ucfirst(auth()->user()->role) }}</span>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn dashboard-signout" type="submit">Sign out</button>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
