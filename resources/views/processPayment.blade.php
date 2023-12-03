@extends('layout')
@section('title', 'Payment for enroll')
@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
            <div class="col-12"> 
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger"> {{$error}}</div>
                @endforeach
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success"> {{session('success')}}</div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger"> {{session('error')}}</div>
        @endif
    </div>
    @auth
    <form action="{{ route('processPayment') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
        @csrf
        <h5> Payment for Course Enrollment </h5>
        <div class="mb-3">
            <label class="form-label">Card Number</label>
            <input type="text" class="form-control" name="card_number" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Expiration Date</label>
            <input type="text" class="form-control" name="expiration_date" placeholder="MM/YYYY" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CVV</label>
            <input type="text" class="form-control" name="cvv" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Card Holder Name</label>
            <input type="text" class="form-control" name="card_holder_name" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
    @else
        <div class="d-flex justify-content-center align-items-center">
            <h5 class="text-center display-4">To enroll, you must log in</h5>
        </div>
    @endauth
</div>
@endsection