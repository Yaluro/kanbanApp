@extends('layouts.app')
@section('content')

<div class="container-fluid text-center">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <h1>Your Projects</h1>
    <div class="container-fluid col-md-4 text-center">
        <div class="w-100 p-2 rounded-pill border bg-primary text-center mt-4">
            <span>nbr projects</span>
        </div>
        <div class="container-fluid col-md-6 text-center mt-4">
            <button class="btn btn-primary">New projects</button>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-3 bg-primary rounded-3 mt-4">
        @foreach($projects as $project)
        <div class="col">
            <div class="card m-4 rounded-4">
                <span>{{$project->id}}</span>
                <div class="card-body">
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
        @endforeach
    </div>
</div>
@endsection