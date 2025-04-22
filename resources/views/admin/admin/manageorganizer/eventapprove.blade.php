@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Manage Events</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Organizer</th>
                <th>Category</th>
                <th>Event Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->organizer->name ?? 'Unknown' }}</td>
                <td>{{ $event->category }}</td>
                <td>{{ $event->event_date }}</td>
                <td>
                    @if($event->is_approved)
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-warning text-dark">Pending</span>
                    @endif
                </td>
                <td>
                    @if(!$event->is_approved)
                    {{-- <form action="{{ route('admin.events.approve', $event->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                    </form> --}}
                    
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
