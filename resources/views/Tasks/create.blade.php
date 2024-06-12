@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Ajouter une tâche</h3>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nameTask">Task Name</label>
                                <input type="text" name="nameTask" class="form-control" id="nameTask" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status_id">Status</label>
                                <select name="status_id" class="form-control" id="status_id" required>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="project_id">Select Project</label>
                                <select name="project_id" class="form-control" id="project_id" required>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->nameProject }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm mt-4">Ajouter une tâche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
