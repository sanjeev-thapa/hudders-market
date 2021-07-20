@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" class="form auth-form mx-auto" action="{{ route('password.email') }}">
        <h1 class="text-dark text-center mt-5 bold">FORGOT PASSWORD</h1>

        {!! session('message') !!}

        <div class="form-group mt-4">
            <input class="form-control py-4 @error('email') is-invalid @else border-dark @enderror" name="email"
                id="email" type="email" placeholder="Email Address" value="{{ old('username') }}">
            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            @csrf
            <button class="btn btn-primary btn-block py-2">SEND RESET EMAIL</button>
        </div>

        <div class="d-flex mt-2">
            <a class="link-secondary" href="{{ route('login') }}">Already have an account?</a>
            <a class="link-secondary ml-auto" href="{{ route('register') }}">Register</a>
        </div>
    </form>
</div>
@endsection('content')
