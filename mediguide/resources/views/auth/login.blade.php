@extends('layouts.app')
@section('content')
    <div class="authbg">
        <div class="box">
            <span
                class="pill {{ $portal === 'doctor' ? 'bl' : '' }}">{{ $portal === 'doctor' ? 'Clinician Access' : 'Patient Access' }}</span>
            <h1>{{ $portal === 'doctor' ? 'Doctor Sign In' : 'Patient Sign In' }}</h1>
            <p class="sm">Welcome back to MediGuide AI.</p>
            @if (session('ok'))
                <div class="ok">{{ session('ok') }}</div>
            @endif
            @if (session('status'))
                <div class="ok">{{ session('status') }}</div>
            @endif
            @if (session('approval_pending'))
                <div class="dev" role="status">{{ session('approval_pending') }}</div>
            @endif
            <form method="post" action="{{ route('login.post') }}">@csrf
                <input type="hidden" name="portal" value="{{ $portal }}">
                <label>Email</label><input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="err">{{ $message }}</div>
                @enderror
                <label>Password</label>
                <div class="password-field">
                    <input type="password" name="password" autocomplete="current-password">
                    <button class="password-toggle" type="button" data-password-toggle aria-label="Show password" aria-pressed="false">
                        <svg class="password-eye-show" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="password-eye-hide" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.7 10.7 0 0 1 12 5c6.4 0 10 7 10 7a15 15 0 0 1-3.2 4.1M6.2 6.3C3.5 8.1 2 12 2 12s3.6 7 10 7c1.1 0 2.1-.2 3-.5"/></svg>
                    </button>
                </div>
                <p class="password-recovery"><a href="{{ route('password.request', $portal) }}">Forgot password?</a></p>
                <button class="btn {{ $portal === 'doctor' ? 'b' : 'p' }} full lg" style="margin-top:22px">Sign In →</button>
            </form>
            <p class="alt2">New here? <a href="{{ route('register', $portal === 'doctor' ? 'doctor' : 'user') }}">Create
                    account</a></p>
        </div>
    </div>
@endsection
