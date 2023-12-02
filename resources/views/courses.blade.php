@extends('layout')
@section('title', 'Courses')
@section('content')

<div class="container">
    <div class="mt-5">
        <h2>Courses</h2>
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$course->Name}}</h5>
                            <p class="card-text">{{$course->description}}</p>
                            <a href="#" class="btn btn-primary">Enroll Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
