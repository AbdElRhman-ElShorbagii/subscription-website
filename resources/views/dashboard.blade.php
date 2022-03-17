@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <h1>Dashboard</h1>
            <a class="nav-link" href="{{ route('user') }}">View Users</a>
        </div>
    </div>
</main>
@endsection