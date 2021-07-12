@extends('layouts.app')

@section('style')
<style>
    .banner-img {
        width: 100%;
        height: 387px;
        object-fit: cover;
    }
</style>
@endsection

@section('content')
<!--Banner Image-->
<div>
    <img class="banner-img" src="assets/images/Contact.jpeg" alt="Banner">
</div>
<!--End of Banner-->
<!--Contact Us-->
<div class="container mt-4 mb-2">
    <div class="container">
        <h1 class="text-dark text-center mt-5 bold">CONTACT US</h1>
        <p style="text-align: center;">Have a query related to your order staus? Or do you want to cancel ordered items?
            <br>Feel free to fill out the form below and submit if you have any feedback or queries about our service.
        </p>
    </div>
</div>
<!--End of Contact Us-->
<!--Contact Us Form-->
<div class="container mt-5">
    <form action="#" class="form auth-form mx-auto">
        <div class="form-group mt-4">
            <input class="form-control border-dark py-4" id="username" type="text" placeholder="Name*">
        </div>
        <div class="form-group mt-4">
            <input class="form-control border-dark py-4" id="password" type="password" placeholder="Email Address*">
        </div>
        <div class="form-group mt-4">
            <textarea class="form-control border-dark" id="Textarea" rows="4" placeholder="Your Message*"></textarea>
        </div>
        <button class="btn btn-secondary btn-block py-2 mt-4">Submit</button>
    </form>
</div>
<!--End of Contact Us Form-->
@endsection
