@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Messages</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @foreach($messages as $message)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $message->user->username }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $message->user->email }}</h6>
                <p class="card-text">{{ $message->message }}</p>
                <p class="card-text"><small class="text-muted">{{ $message->created_at }}</small></p>
                <form action="{{ route('contact.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message? Only delete if the request has been handled.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection