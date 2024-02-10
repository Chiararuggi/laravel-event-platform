@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            @foreach ($projects as $project)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $project->title }}</div>
                        <div class="card-body">{{ $project->description }}</div>
                        <a href="{{ route('admin.projects.show', $project->id) }}"><img src="{{ $project->image }}"
                                class="comics-img" alt="{{ $project->title }}">
                        </a>
                    </div>
                    <div class="card-body">{{ $project->topic }}</div>
                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">Show details</a>
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-info">Edit</a>

                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                        class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
