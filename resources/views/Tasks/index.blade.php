@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h1>All Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
    <div class="mt-4">
        @foreach($tasks as $task)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $task->nameTask }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                <p class="card-text">Project: {{ $task->project->nameProject }}</p>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
