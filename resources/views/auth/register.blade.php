@extends('layouts.app')

@section('content')
<div class="container">
    <form action="" class="form auth-form mx-auto">
        <h1 class="text-dark text-center mt-5 bold">REGISTER</h1>
        <div class="form-group mt-4">
            <label for="username">Username</label>
            <input class="form-control border-dark py-4" id="username" type="text" placeholder="Username">
        </div>
        <div class="row">
            <div class="col form-group">
                <label for="first">First Name</label>
                <input class="form-control border-dark py-4" id="first" type="text" placeholder="First Name">
            </div>
            <div class="col form-group ml-auto">
                <label for="first">Last Name</label>
                <input class="form-control border-dark py-4" id="last" type="text" placeholder="Last Name">
            </div>
        </div>
        <div class="row">
            <div class="col form-group mb-0">
                <label for="date">Date of Birth</label>
                <input class="form-control border-dark" id="date" type="date">
            </div>
            <div class="col form-group mb-0 ml-auto">
                <label for="gender">Gender</label>
                <select class="custom-select border-dark" id="gender">
                    <option value="">Choose Gender</option>
                    <option value="">Male</option>
                    <option value="">Female</option>
                </select>
            </div>
        </div>
        <div class="form-group mt-4">
            <label for="email">Email</label>
            <input class="form-control border-dark py-4" id="email" type="password" placeholder="Email">
        </div>
        <div class="form-group mt-4">
            <label for="phone">Phone</label>
            <input class="form-control border-dark py-4" id="phone" type="password" placeholder="Phone Number">
        </div>
        <div class="form-group mt-4">
            <label for="password">Password</label>
            <input class="form-control border-dark py-4" id="password" type="password" placeholder="Password">
        </div>
        <div class="form-group mt-4">
            <label for="confirm">Confirm Password</label>
            <input class="form-control border-dark py-4" id="confirm" type="password" placeholder="Confirm Password">
        </div>

        <button class="btn btn-primary btn-block py-2 mt-4">REGISTER</button>
        <div class="d-flex mt-2">
            <a class="link-secondary" href="#">Already have an account?</a>
        </div>
    </form>
</div>
@endsection('content')
