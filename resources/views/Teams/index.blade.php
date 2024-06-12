@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Your <span class="text-primary">Teams</span></h1>
    <div class="container-fluid col-md-4 text-center">
        <div class="w-100 p-2 rounded-pill border bg-primary text-center mt-4">
            <span class="text-light">nbr teams: {{ $teams->count() }}</span>
        </div>
        <div class="container-fluid col-md-6 text-center mt-4">
            <a href="{{ route('teams.create') }}" class="btn btn-primary text-light">New team</a>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-3 bg-primary rounded-3 mt-4">
        @foreach ($teams as $team)
        <div class="col">
            <div class="card m-4 rounded-4">
                <div class="card-body">
                    <h2 class="card-title text-primary">Team Name: {{ $team->nameTeam }}</h2>
                    <p class="card-text">Created at: {{ $team->created_at }}</p>
                    <div class="container-fluid mt-4">
                        <div>
                            <h5>Tasks:</h5>
                            @if($team->tasks->isNotEmpty())
                            @foreach ($team->tasks as $task)
                            <div>
                                <span>{{ $task->nameTask }}</span> - <span>{{ $task->status->name }}</span>
                            </div>
                            @endforeach
                            @else
                            <p>No tasks associated with this team.</p>
                            @endif
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('teams.edit', ['team' => $team->id]) }}" class="btn btn-primary btn-s mb-4 text-light">Editer</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST" style="display: inline-block">
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
    @endforeach
</div>
@endsection