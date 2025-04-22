@extends('Layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Registered Users</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container mt-5">
            <h2 class="text-center mb-4">Registered Organizers List</h2>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>user_type</th>
                        <th>Registered At</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($organizer as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->user_type == 'organizer' ? 'bg-info' : 'bg-success' }}">
                                    {{ ucfirst($user->user_type) }}
                                </span>
                            </td>
                            <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : 'N/A' }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                <form action="{{ route('admin.organizers.destroy', $user->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No registered users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </body>

    </html>
@endsection
