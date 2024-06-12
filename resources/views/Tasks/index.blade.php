@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Vos tâches</h1>
    @foreach ($tasks as $task)
    <div class="container-fluid col-md-4 text-center">
        <div class="w-100 p-2 rounded-pill border bg-primary text-center mt-4">
            <span>Équipe: {{ $task->nameTeam }}</span>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-12 g-4 m-3 bg-primary rounded-3 mt-4">
        <div class="col">
            <div class="card m-4 rounded-4">
                <div class="card-body">
                    <h4 class="card-title">Nom de la tâche: {{ $task->nameTask }}</h4>
                    <p class="card-text">Date de création: {{ $task->description}}</p>
                    <input type="hidden" name="team_id" value="{{$project->team_id}}">
                    <div class="row">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary mb-2">
                            Editer
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
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
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Ajouter une tache</a>
    </div>
</div>
@endsection