@extends('layouts.app')
@section('content')

<div class="container-fluid text-center">
    <h1>Editer l'Équipe</h1>
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
                    <div class="container-fluid col-md-6 text-center mt-4">
                        <form action="{{ route('teams.update', $team->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nameTeam">Nom de l'équipe :</label>
                                <input type="text" class="form-control" name="nameTeam" value="{{ $team->nameTeam }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
