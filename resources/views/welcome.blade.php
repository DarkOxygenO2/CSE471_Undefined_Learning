@extends('layout')
@section('title', 'Home Page')
@section('content')

<style>
    .text-3d {
        font-size: 3em;
        color: #3498db;
        text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);
        transform: skew(-5deg, 5deg);
        display: inline-block;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .text-3d {
            font-size: 2em;
        }
    }
</style>

<div class="container mt-5">
    <div class="text-center">
        @auth
            <h2>Welcome, {{ auth()->user()->name }}!</h2>
            <p class="lead">You are logged in. Enjoy your learning journey.</p>
        @else
            <h2 class="text-3d"><a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">Undefined Learning</a></h2>
            <p class="lead">Explore the world of knowledge with Undefined Learning. Login or register to get started.</p>
        @endauth
    </div>
</div>

@endsection
