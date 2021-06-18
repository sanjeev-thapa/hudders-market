@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" class="form auth-form mx-auto">
        <h1 class="text-dark text-center mt-5 bold">LOGIN</h1>

        {!! session('message') !!}

        <div class="form-group mt-4">
            <input class="form-control py-4 @error('username') is-invalid @else border-dark @enderror" name="username"
                id="username" type="text" placeholder="Username" value="{{ old('username') }}">
            @error('username') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mt-4">
            <input class="form-control py-4 @error('password') is-invalid @else border-dark @enderror" name="password"
                id="password" type="password" placeholder="Password">
            @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            @csrf
            <button class="btn btn-primary btn-block py-2">LOGIN</button>
        </div>

        <div class="d-flex mt-2">
            <a class="link-secondary" href="{{ route('register') }}">Register</a>
            <a class="link-secondary ml-auto" href="#">Forgot Password?</a>
        </div>
    </form>
</div>
@endsection('content')
