@extends('layouts.app')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4">
    <h3 class="fw-black mb-4 italic">EXERCISE MANAGEMENT</h3>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Muscle Group</th>
                    <th>Instructions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($exercises as $exercise)
                    <tr>
                        <td><span class="fw-bold">{{ $exercise->name }}</span></td>
                        <td><span class="badge bg-info-subtle text-info">{{ $exercise->muscle_group }}</span></td>
                        <td><small class="text-muted">{{ Str::limit($exercise->instructions, 60) }}</small></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">No exercises found in the database.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
