@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>{{$project->nameProject}}</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-3 bg-primary rounded-3 mt-4">
        <div class="col">
            <div class="card m-4 rounded-4">
                <span>{{$project->id}}</span>
                <div class="card-body text-center">
                    <h2 class="card-title">{{$project->nameProject}}</h2>
                    <span class="card-text">{{$project->team_id}}</span>
                    <span class="card-text">{{$project->created_at}}</span>
                    <span class="card-text">{{$project->updated_at}}</span>
                    <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-primary btn-sm mb-4">Editer</a>
                    <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type=" submit">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection