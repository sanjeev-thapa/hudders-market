@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" class="form auth-form mx-auto">
        <h1 class="text-dark text-center mt-5 bold">REGISTER</h1>

        <div class="form-group mt-4">
            <label class="mb-0" for="username">Username</label>
            <input class="form-control py-4 @error('username') is-invalid @else border-dark @enderror" id="username"
                name="username" type="text" placeholder="Username" value="{{ old('username') }}">
            @error('username') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="row">
            <div class="col form-group">
                <label class="mb-0" for="first">First Name</label>
                <input class="form-control py-4 @error('first_name') is-invalid @else border-dark @enderror" id="first"
                    name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}">
                @error('first_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
            <div class="col form-group ml-auto">
                <label class="mb-0" for="first">Last Name</label>
                <input class="form-control py-4 @error('last_name') is-invalid @else border-dark @enderror" id="last"
                    name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}">
                @error('last_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col form-group mb-0">
                <label class="mb-0" for="date">Date of Birth</label>
                <input class="form-control @error('date_of_birth') is-invalid @else border-dark @enderror" id="date"
                    name="date_of_birth" type="date" value="{{ old('date_of_birth') }}">
                @error('date_of_birth') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
            <div class="col form-group mb-0 ml-auto">
                <label class="mb-0" for="gender">Gender</label>
                <select class="custom-select @error('gender') is-invalid @else border-dark @enderror" id="gender"
                    name="gender">
                    <option value="">Choose Gender</option>
                    <option value="0" @if(old('gender')==0 && is_numeric(old('gender'))) selected @endif>Male</option>
                    <option value="1" @if(old('gender')==1) selected @endif>Female</option>
                    <option value="2" @if(old('gender')==2) selected @endif>Other</option>
                </select>
                @error('gender') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
        </div>

        <div class="form-group mt-4">
            <label class="mb-0" for="email">Email</label>
            <input class="form-control py-4 @error('email') is-invalid @else border-dark @enderror" id="email"
                name="email" type="email" placeholder="Email" value="{{ old('email') }}">
            @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="form-group mt-4">
            <label class="mb-0" for="phone">Phone</label>
            <input class="form-control py-4 @error('phone') is-invalid @else border-dark @enderror" id="phone"
                name="phone" type="number" placeholder="Phone Number" value="{{ old('phone') }}">
            @error('phone') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="form-group mt-4">
            <label class="mb-0" for="password">Password</label>
            <input class="form-control py-4 @error('password') is-invalid @else border-dark @enderror" id="password"
                name="password" type="password" placeholder="Password">
            @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="form-group mt-4">
            <label class="mb-0" for="confirm">Confirm Password</label>
            <input class="form-control py-4 @error('password_confirmation') is-invalid @else border-dark @enderror"
                id="confirm" name="password_confirmation" type="password" placeholder="Confirm Password">
            @error('password_confirmation') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="mt-4">
            @csrf
            <button class="btn btn-primary btn-block py-2">REGISTER</button>
        </div>

        <div class="d-flex mt-2">
            <a class="link-secondary" href="{{ route('login') }}">Already have an account?</a>
        </div>
    </form>
</div>
@endsection('content')
