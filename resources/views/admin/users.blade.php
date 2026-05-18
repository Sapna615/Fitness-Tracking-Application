@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h3 class="fw-black mb-4 italic">USER MANAGEMENT</h3>
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Goal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
                <tr>
                    <td><span class="fw-bold">{{ $u->name }}</span></td>
                    <td>{{ $u->email }}</td>
                    <td><span class="badge bg-primary-subtle text-primary">{{ $u->profile->fitness_goal ?? 'No Profile' }}</span></td>
                    <td>
                        @if($u->is_admin)
                            <span class="badge bg-dark">Admin</span>
                        @else
                            <span class="badge bg-light text-muted border">User</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
@endsection
