@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>{{$project->nameProject}} <span class="text-primary">project</span></h1>
    <div class="container-fluid col-md-4 text-center">
        <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped" style="width: 75%"></div>
        </div>
    </div>
    <div class="container-fluid col-md-6 text-center mt-4">
        <a href="{{ route('projects.create') }}" class="btn btn-primary text-light">New Project</a>
    </div>
    <div class="container-fluid col-md-6 text-center bg-tertiary rounded-3 mt-4 border border-3 border-primary">
        <div class="col">
            <div class="card m-4 rounded-4">
                <span>{{$project->id}}</span>
                <div class="card-body text-center">
                    <h2 class="card-title">{{$project->nameProject}}</h2>
                    <span class="card-text">{{$project->team_id}}</span>
                    <span class="card-text">{{$project->created_at}}</span>
                    <span class="card-text">{{$project->updated_at}}</span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-primary btn-s mb-4 text-light">Editer</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('projects.destroy', ['project' => $project->id]) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-s" type=" submit">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection