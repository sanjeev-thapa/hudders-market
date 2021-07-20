@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" class="form auth-form mx-auto" action="{{ route('password.update') }}">
        <h1 class="text-dark text-center mt-5 bold">RESET PASSWORD</h1>

        {!! session('message') !!}

        <div class="form-group mt-4">
            <input class="form-control py-4 @error('email') is-invalid @else border-dark @enderror" name="email"
                id="email" type="email" placeholder="Email Address" value="{{ old('email') ?? $request->email }}">
            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mt-4">
            <input class="form-control py-4 @error('password') is-invalid @else border-dark @enderror" name="password"
                id="password" type="password" placeholder="Password">
            @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group mt-4">
            <input class="form-control py-4 @error('password_confirmation') is-invalid @else border-dark @enderror"
                name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password">
            @error('password_confirmation') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            @csrf
            <input type="hidden" name="token" value="{{ $request->token }}">
            <button class="btn btn-primary btn-block py-2">RESET PASSWORD</button>
        </div>

        <div class="d-flex mt-2">
            <a class="link-secondary" href="{{ route('login') }}">Already have an account?</a>
            <a class="link-secondary ml-auto" href="{{ route('register') }}">Register</a>
        </div>
    </form>
</div>
@endsection('content')
