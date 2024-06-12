@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>{{$task->nameTask}} <span class="text-primary">Task</span></h1>
    <div class="container-fluid col-md-4 text-center">
        <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped" style="width: 75%"></div>
        </div>
    </div>
    <div class="container-fluid col-md-6 text-center mt-4">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary text-light">New Task</a>
    </div>
    <div class="container-fluid col-md-6 text-center bg-tertiary rounded-3 mt-4 border border-3 border-primary">
        <div class="col">
            <div class="card m-4 rounded-4">
                <span>{{$task->id}}</span>
                <div class="card-body text-center">
                    <h2 class="card-title">{{$task->nameTask}}</h2>
                    <span class="card-text">{{ $task->description }}</span>
                    <span class="card-text">Project: {{ $task->project->nameProject }}</span>
                    <div class="container-fluid">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection