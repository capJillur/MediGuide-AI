@extends('layouts.app')
@section('content')
    <div class="authbg">
        <div class="box">
            <span class="pill or">Restricted Area</span>
            <h1>Administrator Sign In</h1>
            <p class="sm">Authorised MediGuide AI staff only.</p>
            @if (session('status'))
                <div class="ok">{{ session('status') }}</div>
            @endif
            <form method="post" action="{{ route('admin.login.post') }}">@csrf
                <label>Email</label><input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="err">{{ $message }}</div>
                @enderror
                <label>Password</label><input type="password" name="password">
                <p class="password-recovery"><a href="{{ route('password.request', 'admin') }}">Forgot password?</a></p>
                <button class="btn p full lg" style="margin-top:22px">Sign In →</button>
            </form>
        </div>
    </div>
@endsection
