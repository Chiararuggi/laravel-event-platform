@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Edit event:</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') ?? $event->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>

                    <input type="text" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ old('date') ?? $event->date }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="available_tickets" class="form-label">Available tickets</label>
                    <input type="text" class="form-control" id="available_tickets" name="available_tickets"
                        value="{{ old('available_tickets') ?? $event->available_tickets }}">
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <select multiple name="tags[]" id="" class="form-select">
                        <option value="">No tag</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            <a href="{{ route('admin.events.index') }}" class="btn btn-warning">Back to event list</a>
        </div>
    </div>
@endsection