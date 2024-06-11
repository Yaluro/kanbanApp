@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Editer un projet</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('projects.update', ['project' => $project->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" name="nameProject" class="form-control" value="{{ $project->nameProject }}" required>
                            </div>
                            <div class="form-group">
                                <label for="team_id">Team</label>
                                <select name="team_id" class="form-control" id="team_id" required>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}" {{ $project->team_id == $team->id ? 'selected' : '' }}>
                                            {{ $team->nameTeam }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>                           
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm mt-4">Mettre à jour</button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection