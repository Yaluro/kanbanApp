@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>{{$team->nameTeam}}</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 m-3 bg-primary rounded-3 mt-4">
        <div class="col">
            <div class="card m-4 rounded-4">
                <span>{{$team->id}}</span>
                <div class="card-body text-center">
                    <h2 class="card-title">{{$team->nameTeam}}</h2>
                    <span class="card-text">{{$team->team_id}}</span>
                    <span class="card-text">{{$team->created_at}}</span>
                    <span class="card-text">{{$team->updated_at}}</span>
                    <a href="{{ route('teams.edit', ['team' => $team->id]) }}" class="btn btn-primary btn-sm mb-4">Editer</a>
                    <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type=" submit">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection