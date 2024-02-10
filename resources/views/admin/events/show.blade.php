@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $event->title }}</h2>
        </div>
        <div class="row">
            <p>{{ $event->date }}</p>
            <p>Avalaible tickets: {{ $event->available_tickets }}</p>
            <h4>
                @if (count($event->tags) > 0)
                    <ul>
                        @foreach ($event->tags as $tag)
                            <li>#{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No Tags</p>
                @endif
            </h4>
            <a href="{{ route('admin.events.index') }}" class="btn btn-primary mt-3">Back to events list</a>

        </div>
    </div>
@endsection