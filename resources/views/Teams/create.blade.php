<h1>Créer une Nouvelle Équipe</h1>
<div class="container-fluid col-md-6 text-center mt-4">
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nameTeam">Nom de l'équipe :</label>
            <input type="text" class="form-control" id="nameTeam" name="nameTeam" required>
        </div>
        <div class="form-group mt-3">
            <label for="founded">Fondé par :</label>
            <input type="text" class="form-control" id="founded" name="founded" required>
        </div>
        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary mt-4">Créer l'équipe</button>
    </form>
</div>