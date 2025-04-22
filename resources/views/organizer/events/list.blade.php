@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Your Events</h3>
        <a href="{{ route('organizer.events.create') }}" class="btn btn-primary btn-sm">
            + Create Event
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 py-2">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date/Time</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            @if ($event->photo)
                            <img src="{{ asset('storage/' . $event->photo) }}" 
                                 class="img-thumbnail me-2" 
                                 width="50" 
                                 height="50" 
                                 alt="Event photo">
                            @endif
                            {{ $event->title }}
                        </div>
                    </td>
                    <td>{{ $event->category->name ?? '-' }}</td>
                    <td>
                        <div class="text-nowrap">
                            <div>{{ \Carbon\Carbon::parse($event->start_time)->format('d M, H:i') }}</div>
                            <small class="text-muted">to {{ \Carbon\Carbon::parse($event->end_time)->format('d M, H:i') }}</small>
                        </div>
                    </td>
                    <td>${{ number_format($event->price, 2) }}</td>
                    <td>
                        <span class="badge 
                            @if($event->status == 'active') bg-success 
                            @elseif($event->status == 'cancelled') bg-danger 
                            @else bg-warning @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('organizer.events.edit', $event->id) }}" 
                               class="btn btn-sm btn-outline-secondary">
                                Edit
                            </a>
                            <form action="{{ route('organizer.events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this event?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">
                        No events found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection