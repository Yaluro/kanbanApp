@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center text-center mt-5">
    <h1>KANBAN APP : TASK IS LIFE</h1>
    @include('auth.login')
    <div class="mt-4">
        <p>work fast and simple</p>
    </div>
</div>
@endsection