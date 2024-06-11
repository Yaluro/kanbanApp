@extends('layouts.app')
@section('content')


<div class="container-fluid col-md-6 text-center mt-4">
    <div class="form-container">
        <h1 class="mb-4">Créer une Nouvelle Équipe</h1>
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nameTeam">Nom de l'équipe :</label>
                <input type="text" class="form-control" name="nameTeam" required>
            </div>
            <div class="form-group mt-3">
                <label for="founded">Fondé par :</label>
                <input type="text" class="form-control" name="founded" required>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Créer l'équipe</button>
        </form>
    </div>
</div>
@endsection