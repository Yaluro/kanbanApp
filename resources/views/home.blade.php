@extends('layouts.app')

@section('content')
<div class="container-flex">
    <div class="row">
        <div class="container d-flex flex-column align-items-center text-center m-5">
            <h1>KANBAN <span class="text-primary">APP</span> : TASK IS <span class="text-primary">LIFE</span></h1>
        </div>

        @guest
        <div class="col-md-6">
            <div class="container d-flex flex-column align-items-center mt-5">
                <span class="h2 "><i class="bi bi-check-lg"></i>Project creation</span><br>
                <span class="h2"><i class="bi bi-check-lg"></i>Task management</span><br>
                <span class="h2"><i class="bi bi-check-lg"></i>Team work</span><br>
                <span class="h2"><i class="bi bi-check-lg"></i>Secure application</span><br>
            </div>
        </div>
        <div class="col-md-6">
            @include('auth.login-form')
        </div>
        @else
        <div class="row">
            <div class="container d-flex flex-column align-items-center text-center m-5">
                <span class="h2 "><i class="bi bi-check-lg"></i>Project creation</span><br>
                <span class="h2"><i class="bi bi-check-lg"></i>Task management</span><br>
                <span class="h2"><i class="bi bi-check-lg"></i>Team work</span><br>
                <span class="h2"><i class="bi bi-check-lg"></i>Secure application</span><br>
            </div>
        </div>
        @endguest
        <div class="row">
            <div class="container d-flex flex-column align-items-center text-center m-5">
                <h3 class="h3">work <span class="text-primary">fast</span> and <span class="text-primary">simple</span></h3>
                <div class="row">
                    <div class="col-md-4">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-4">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-4">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection