@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center text-center mt-5">
    @include('auth.login-form')
    <div class="mt-4">
        <p>Please login to access Kanban App</p>
    </div>
</div>
@endsection