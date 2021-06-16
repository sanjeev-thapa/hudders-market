@extends('layouts.app')

@section('content')
<div class="container">
    <form action="" class="form auth-form mx-auto">
        <h1 class="text-dark text-center mt-5 bold">LOGIN</h1>
        <div class="form-group mt-4">
            <input class="form-control border-dark py-4" id="username" type="text" placeholder="Username">
        </div>
        <div class="form-group mt-4">
            <input class="form-control border-dark py-4" id="password" type="password" placeholder="Password">
        </div>

        <button class="btn btn-primary btn-block py-2 mt-4">LOGIN</button>
        <div class="d-flex mt-2">
            <a class="link-secondary" href="#">Register</a>
            <a class="link-secondary ml-auto" href="#">Forgot Password?</a>
        </div>
    </form>
</div>
@endsection('content')
