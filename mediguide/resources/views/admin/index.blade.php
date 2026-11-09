@extends('layouts.dashboard')
@section('title', 'Manage Accounts | MediGuide AI')
@section('content')
    <main class="dashboard-shell">
        <header class="dashboard-header">
            <div>
                <span class="pill or">Administrator</span>
                <h1>Manage accounts</h1>
                <p>Review user and clinician accounts.</p>
            </div>
        </header>
        @if (session('ok'))
            <div class="ok" style="margin-bottom:18px">{{ session('ok') }}</div>
        @endif
        <div class="admin-summary">
            <div><span>Patients</span><strong>{{ $counts['user'] }}</strong></div>
            <div><span>Doctors</span><strong>{{ $counts['doctor'] }}</strong></div>
        </div>
        <div class="tabs"><a class="{{ $type === 'user' ? 'on' : '' }}" href="?type=user">Patients ({{ $counts['user'] }})</a><a
                class="{{ $type === 'doctor' ? 'on' : '' }}" href="?type=doctor">Doctors ({{ $counts['doctor'] }})</a></div>
        <div class="dashboard-table-wrap">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        @if ($type === 'doctor')
                            <th>Specialty</th>
                            <th>License</th>
                            <th>Approval</th>
                        @endif
                        <th>
                            Verified</th>
                        <th></th>
                    </tr>
                    @forelse($accounts as $a)
                        <tr>
                            <td>{{ $a->name }}</td>
                            <td>{{ $a->email }}</td>
                            <td>{{ $a->phone }}</td>
                            @if ($type === 'doctor')
                                <td>{{ $a->specialty }}</td>
                                <td>{{ $a->license_no }}</td>
                                <td>{{ $a->doctor_approved_at ? 'Approved' : 'Pending' }}</td>
                            @endif
                            <td>
                                {{ $a->email_verified_at ? 'Yes' : 'No' }}</td>
                            <td class="acts">
                                <a class="btn" href="{{ route('admin.edit', $a) }}">Edit</a>
                                @if ($type === 'doctor' && !$a->doctor_approved_at)
                                    <form method="post" action="{{ route('admin.approve', $a) }}">@csrf<button class="btn p" type="submit">Approve</button></form>
                                @endif
                                <form method="post" action="{{ route('admin.destroy', $a) }}"
                                    onsubmit="return confirm('Delete this account?')">@csrf @method('DELETE')<button
                                        class="btn d">Delete</button></form>
                            </td>
                        </tr>
                    @empty<tr>
                            <td colspan="7" style="text-align:center;color:var(--mut)">No {{ $type }}s yet.</td>
                        </tr>
                    @endforelse
                </table>
        </div>
        <div style="margin-top:16px">{{ $accounts->links() }}</div>
    </main>
@endsection
