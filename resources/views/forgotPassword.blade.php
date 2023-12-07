@extends('layout')
@section('title', 'Forgot Password')
@section('content')
<div class="container">
    <div class="mt-5">
        <h2>Forgot Password</h2>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="col-12"> 
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('forgotPassword.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="emailInput">
            </div>

            <button type="button" class="btn btn-primary" onclick="showMessage()">Send Password Reset Link</button>
        </form>
    </div>
</div>

<script>
    function showMessage() {
        var email = document.getElementById('emailInput').value;
        alert('Password reset link has been sent to the email address: ' + email);
    }
</script>

@endsection
