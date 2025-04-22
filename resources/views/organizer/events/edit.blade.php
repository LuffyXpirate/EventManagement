@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Event</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('organizer.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $event->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="venue_id" class="form-label">Venue</label>
            <select name="venue_id" id="venue_id" class="form-control" required>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" {{ old('venue_id', $event->venue_id) == $venue->id ? 'selected' : '' }}>
                        {{ $venue->name }} - {{ $venue->city }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price', $event->price) }}" required>
        </div>
        <div class="mb-3">
            <label for="max_attendees" class="form-label">Max Attendees</label>
            <input type="number" name="max_attendees" id="max_attendees" class="form-control" value="{{ old('max_attendees', $event->max_attendees) }}" required>
        </div>
      
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ old('status', $event->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="active" {{ old('status', $event->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="cancelled" {{ old('status', $event->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Change Event Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if ($event->photo)
                <img src="{{ asset('storage/' . $event->photo) }}" width="100" class="mt-2" alt="Current Photo">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection