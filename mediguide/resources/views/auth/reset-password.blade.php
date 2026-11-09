@extends('layouts.app')
@section('content')
    <div class="authbg">
        <div class="box">
            <span class="pill {{ $portal === 'doctor' ? 'bl' : ($portal === 'admin' ? 'or' : '') }}">{{ $portal === 'doctor' ? 'Clinician Access' : ($portal === 'admin' ? 'Administrator Access' : 'Patient Access') }}</span>
            <h1>Choose a new password</h1>
            <p class="sm">Use at least 8 characters for your new password.</p>
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ old('email', $email) }}">
                <input type="hidden" name="portal" value="{{ old('portal', $portal) }}">

                <label for="password">New password</label>
                <div class="password-field">
                    <input id="password" type="password" name="password" autocomplete="new-password" required autofocus>
                    <button class="password-toggle" type="button" data-password-toggle aria-label="Show password" aria-pressed="false">
                        <svg class="password-eye-show" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="password-eye-hide" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.7 10.7 0 0 1 12 5c6.4 0 10 7 10 7a15 15 0 0 1-3.2 4.1M6.2 6.3C3.5 8.1 2 12 2 12s3.6 7 10 7c1.1 0 2.1-.2 3-.5"/></svg>
                    </button>
                </div>
                @error('password')
                    <div class="err">{{ $message }}</div>
                @enderror

                <label for="password_confirmation">Confirm new password</label>
                <div class="password-field">
                    <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
                    <button class="password-toggle" type="button" data-password-toggle aria-label="Show password" aria-pressed="false">
                        <svg class="password-eye-show" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="password-eye-hide" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.7 10.7 0 0 1 12 5c6.4 0 10 7 10 7a15 15 0 0 1-3.2 4.1M6.2 6.3C3.5 8.1 2 12 2 12s3.6 7 10 7c1.1 0 2.1-.2 3-.5"/></svg>
                    </button>
                </div>

                <button class="btn {{ $portal === 'doctor' ? 'b' : 'p' }} full lg" style="margin-top:22px">Reset password</button>
            </form>
            <p class="alt2"><a href="{{ $portal === 'admin' ? route('admin.login') : route('login', $portal) }}">Back to sign in</a></p>
        </div>
    </div>
@endsection