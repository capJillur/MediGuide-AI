@extends('layouts.app')
@section('content')
    <div class="authbg">
        <div class="box">
            <span class="pill">Account Verification</span>
            <h1>Enter your OTP</h1>
            <p class="sm">We sent a 6-digit code to {{ session('otp_email') }}. It expires in 10 minutes.</p>
            @if (session('ok'))
                <div class="ok">{{ session('ok') }}</div>
            @endif
            @if (session('dev_otp'))
                {{-- <div class="dev">Dev mode — your OTP is <b>{{ session('dev_otp') }}</b> (also in storage/logs/laravel.log)
                </div> --}}
            @endif
            <form method="post" action="{{ route('otp.verify') }}">@csrf<input class="otp" name="otp" maxlength="6"
                    inputmode="numeric" autofocus>
                @error('otp')
                    <div class="err">{{ $message }}</div>
                @enderror
                <button class="btn p full lg" style="margin-top:18px">Verify Account</button>
            </form>
            <form method="post" action="{{ route('otp.resend') }}" class="alt2">@csrf Didn't get it? <button
                    style="border:0;background:none;color:var(--t2);font-weight:700;cursor:pointer">Resend code</button>
            </form>
        </div>
    </div>
@endsection
