@extends('layouts.app')
@section('content')<div class="authbg">
        <div class="box">
            <span
                class="pill {{ $role === 'doctor' ? 'bl' : '' }}">{{ $role === 'doctor' ? 'Clinician Registration' : 'Patient Registration' }}</span>
            <h1>{{ $role === 'doctor' ? 'Join our MediGuide' : 'Create your account' }}</h1>
            <p class="sm">You'll verify your account with a one-time password next.</p>
            <form method="post" action="{{ route('register.post', $role) }}">@csrf
                @foreach ([['name', 'Full name', 'text'], ['email', 'Email', 'email'], ['phone', 'Phone', 'text']] as [$n, $l, $t])
                    <label>{{ $l }}</label><input type="{{ $t }}" name="{{ $n }}"
                        value="{{ old($n) }}">
                    @error($n)
                        <div class="err">{{ $message }}</div>
                    @enderror
                @endforeach
                @if ($role === 'doctor')
                    @foreach ([['specialty', 'Specialty'], ['license_no', 'Medical license no.']] as [$n, $l])
                        <label>{{ $l }}</label><input name="{{ $n }}" value="{{ old($n) }}">
                        @error($n)
                            <div class="err">{{ $message }}</div>
                        @enderror
                    @endforeach
                @endif
                <label>Password</label>
                <div class="password-field">
                    <input type="password" name="password" autocomplete="new-password">
                    <button class="password-toggle" type="button" data-password-toggle aria-label="Show password" aria-pressed="false">
                        <svg class="password-eye-show" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="password-eye-hide" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.7 10.7 0 0 1 12 5c6.4 0 10 7 10 7a15 15 0 0 1-3.2 4.1M6.2 6.3C3.5 8.1 2 12 2 12s3.6 7 10 7c1.1 0 2.1-.2 3-.5"/></svg>
                    </button>
                </div>
                @error('password')
                    <div class="err">{{ $message }}</div>
                @enderror
                <label>Confirm password</label>
                <div class="password-field">
                    <input type="password" name="password_confirmation" autocomplete="new-password">
                    <button class="password-toggle" type="button" data-password-toggle aria-label="Show password" aria-pressed="false">
                        <svg class="password-eye-show" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="password-eye-hide" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"/><path d="M9.9 5.2A10.7 10.7 0 0 1 12 5c6.4 0 10 7 10 7a15 15 0 0 1-3.2 4.1M6.2 6.3C3.5 8.1 2 12 2 12s3.6 7 10 7c1.1 0 2.1-.2 3-.5"/></svg>
                    </button>
                </div>
                <button class="btn {{ $role === 'doctor' ? 'b' : 'p' }} full lg" style="margin-top:22px">Register →</button>
            </form>
            <p class="alt2">Already registered? <a href="{{ route('login', $role === 'doctor' ? 'doctor' : 'patient') }}">Sign
                    in</a></p>
        </div>
</div>@endsection
