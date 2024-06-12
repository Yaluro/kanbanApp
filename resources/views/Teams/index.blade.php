@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Vos Équipes</h1>
    @foreach ($teams as $team)
    <div class="container-fluid col-md-4 text-center">
        <div class="w-100 p-2 rounded-pill border bg-primary text-center mt-4">
            <span>Équipe: {{ $team->nameTeam }}</span>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-12 g-4 m-3 bg-primary rounded-3 mt-4">
        <div class="col">
            <div class="card m-4 rounded-4">
                <div class="card-body">
                    <h4 class="card-title">Nom de l'équipe: {{ $team->nameTeam }}</h4>
                    <p class="card-text">Date de création: {{ $team->created_at }}</p>
                    <div>
                        <h5>Tâches:</h5>
                        @foreach ($teams->tasks as $task)
                        <div>
                            <a href="{{ route('tasks.index', $task->id) }}">{{ $task->name }}</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mt-3">
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-secondary mb-2">
                            Editer
                        </a>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="text-center mt-4 mb-3">
        <a href="{{ route('teams.create') }}" class="btn btn-primary">Ajouter une équipe</a>
    </div>
</div>
@endsection