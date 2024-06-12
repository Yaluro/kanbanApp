@extends('layouts.app')

@section('content')
<div class="container-flex">
    <div class="row">
        <div class="container d-flex flex-column align-items-center text-center mt-5">
            <h1>Your <span class="text-primary">Dashboard</span></h1>
        </div>
        <div class="container-fluid col-md-4 text-center">
            <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped" style="width: 75%"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 align-items-center text-center mt-5">
                <h2>Your <span class="text-primary">Projects</span></h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 m-3 bg-primary rounded-3 mt-4">
                    @foreach($projects as $project)
                    <div class="col">
                        <div class="card m-4 rounded-4">
                            <div class="card-body">
                                <h2 class="card-title text-primary">{{ $project->nameProject }}</h2>
                                <span class="card-text">{{ $project->updated_at }}</span>
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm mb-4 text-light mt-4">See the project</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="col-md-6 align-items-center text-center mt-5">
                <h2>Your <span class="text-primary">Teams</span></h2>
                
            </div>

        </div>
    </div>
</div>

@endsection