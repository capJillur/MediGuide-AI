@extends('layouts.dashboard')
@section('title', 'Edit Account | MediGuide AI')
@section('content')
    <main class="dashboard-shell">
        <header class="dashboard-header">
            <div><span class="pill or">Administrator</span><h1>Edit account</h1><p>Update {{ $account->role }} details.</p></div>
        </header>
        <div class="box"><span class="pill or">{{ $account->role }}</span>
            <h1>{{ $account->name }}</h1>
            <form method="post" action="{{ route('admin.update', $account) }}">@csrf @method('PUT')
                @foreach (['name' => 'Name', 'email' => 'Email', 'phone' => 'Phone'] as $n => $l)
                    <label>{{ $l }}</label><input name="{{ $n }}" value="{{ old($n, $account->$n) }}">
                    @error($n)
                        <div class="err">{{ $message }}</div>
                    @enderror
                @endforeach
                @if ($account->role === 'doctor')
                    @foreach (['specialty' => 'Specialty', 'license_no' => 'License no.'] as $n => $l)
                        <label>{{ $l }}</label><input name="{{ $n }}"
                            value="{{ old($n, $account->$n) }}">
                    @endforeach
                @endif
                <label>New password (optional)</label><input type="password" name="password">
                @error('password')
                    <div class="err">{{ $message }}</div>
                @enderror
                <button class="btn p full lg" style="margin-top:22px">Save changes</button>
            </form>
            <p class="alt2"><a href="{{ route('admin.index', ['type' => $account->role]) }}">&larr; Back to accounts</a></p>
        </div>
    </main>
@endsection
