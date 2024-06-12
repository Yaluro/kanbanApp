@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <h1>All Your <span class="text-primary">Tasks</span></h1>
    <div class="container-fluid col-md-4 text-center">
        <div class="w-100 p-2 rounded-pill border bg-primary text-center mt-4">
            <span class="text-light">nbr tasks: {{ $tasks->count() }}</span>
        </div>
        <div class="container-fluid col-md-6 text-center mt-4">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary text-light">New Task</a>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-3 bg-primary rounded-3 mt-4">
        @foreach($tasks as $task)
        <div class="col">
            <div class="card m-4 rounded-4">
                <div class="card-body">
                    <h2 class="card-title text-primary">{{ $task->nameTask }}</h2>
                    <span class="card-text">{{ $task->description }}</span><br>
                    <span class="card-text">Project: {{ $task->project->nameProject }}</span><br>
                    <div class="container-fluid mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary btn-s mb-4 text-light">Edit</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-s" type=" submit">Delete</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection