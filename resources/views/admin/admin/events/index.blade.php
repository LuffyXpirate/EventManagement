@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Manage Events</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Pending Approval</span>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Organizer</th>
                            <th>Event Date</th>
                            <th>Submitted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- resources/views/adm
in/events/index.blade.php -->
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->organizer->name ?? 'Unknown' }}</td>
                                <td>{{ $event->event_date }}</td>
                                <td>{{ $event->created_at }}</td>
                                <td>{{ $event->status }}</td>
                                <td>
                                    <form action="{{ route('admin.events.approve', $event->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
