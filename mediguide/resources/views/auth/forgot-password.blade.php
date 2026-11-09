@extends('layouts.app')
@section('content')
    <div class="authbg">
        <div class="box">
            <span class="pill {{ $portal === 'doctor' ? 'bl' : ($portal === 'admin' ? 'or' : '') }}">{{ $portal === 'doctor' ? 'Clinician Access' : ($portal === 'admin' ? 'Administrator Access' : 'Patient Access') }}</span>
            <h1>Forgot your password?</h1>
            <p class="sm">Enter your account email and we’ll send a secure reset link if it matches this {{ $portal }} account.</p>
            @if (session('status'))
                <div class="ok">{{ session('status') }}</div>
            @endif
            <form method="post" action="{{ route('password.email', $portal) }}">
                @csrf
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                @error('email')
                    <div class="err">{{ $message }}</div>
                @enderror
                <button class="btn {{ $portal === 'doctor' ? 'b' : 'p' }} full lg" style="margin-top:22px">Send reset link</button>
            </form>
                <p class="alt2"><a href="{{ $portal === 'admin' ? route('admin.login') : route('login', $portal) }}">Back to sign in</a></p>
        </div>
    </div>
@endsection