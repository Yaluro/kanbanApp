@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>{{$team->nameTeam}} <span class="text-primary">Team</span></h1>
    <div class="container-fluid col-md-6 text-center mt-4">
        <a href="{{ route('teams.create') }}" class="btn btn-primary text-light">New Team</a>
    </div>
    <div class="container-fluid col-md-6 text-center bg-tertiary rounded-3 mt-4 border border-3 border-primary">
        <div class="col">
            <div class="card m-4 rounded-4">
                <span>{{$team->id}}</span>
                <div class="card-body text-center">
                    <h2 class="card-title">{{$team->nameTeam}}</h2>
                    <span class="card-text">{{$team->team_id}}</span>
                    <span class="card-text">{{$team->created_at}}</span>
                    <span class="card-text">{{$team->updated_at}}</span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('teams.edit', ['team' => $team->id]) }}" class="btn btn-primary btn-s mb-4 text-light">Editer</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST" style="display: inline-block">
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