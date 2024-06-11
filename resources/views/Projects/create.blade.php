@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un projet</h3>
                        
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
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nameProject">Project Name</label>
                                <input type="text" name="nameProject" class="form-control" id="nameProject" required>
                            </div>

                            <div class="form-group">
                                <label for="team_id">Select Team</label>
                                <select name="team_id" class="form-control" id="team_id" required>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->nameTeam }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm mt-4">
                                Ajouter un projet
                            </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
