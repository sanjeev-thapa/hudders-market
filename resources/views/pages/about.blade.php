@extends('layouts.app')

@section('content')
<div>
    <img class="banner-img" src="assets/images/about_us.jpg" alt="Banner 1">
</div>

<div class="container mt-4 mb-3">
    <div class="container">
        <h1 class="text-dark text-center mt-4 bold">Our Services</h1>
    </div>
</div>

<div class="container mt-5 mb-2">
    <div class="row">
        <div class="col-lg-4">
            <p class="text-center mb-2"><i class="fas fa-cart-plus" style="font-size: 70px;"></i></p>
            <p class="text-center mt-2 mb-2 bold">Biggest Variety</p>
            <p class="text-center mt-2 mb-5">We offer millions of product at a great value for Customers. </p>
        </div>
        <div class="col-lg-4">
            <p class="text-center mb-2"><i class="fas fa-hand-holding-usd" style="font-size: 70px;"></i></p>
            <p class="text-center mt-2 mb-2 bold">Best Prices</p>
            <p class="text-center mt-2 mb-5">We provide great value by offering best prices on all our products</p>
        </div>
        <div class="col-lg-4">
            <p class="text-center mb-2"><i class="fas fa-user-shield" style="font-size: 70px;"></i></p>
            <p class="text-center mt-2 mb-2 bold">100% Protected</p>
            <p class="text-center mt-2 mb-5">We provide 100% protection from your purchase from click to collection.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <p class="text-center mb-2"><i class="fas fa-shopping-bag" style="font-size: 70px;"></i></p>
            <p class="text-center mt-2 mb-2 bold">No Minimum Order</p>
            <p class="text-center mt-2 mb-5"> Hudders Market provides no minimum order for Customers.</p>
        </div>
        <div class="col-lg-4">
            <p class="text-center mb-2"><i class="fas fa-search" style="font-size: 70px;"></i></p>
            <p class="text-center mt-2 mb-2 bold">Search Your Favourite Shops</p>
            <p class="text-center mt-2 mb-5">Select your favourite food based on shop, categories, ratings and price.
            </p>
        </div>
        <div class="col-lg-4">
            <p class="text-center mb-2"><i class="fas fa-mobile" style="font-size: 70px;"></i></p>
            <p class="text-center mt-2 mb-2 bold">Easily Order</p>
            <p class="text-center mt-2 mb-5">We offer easy access through our fully functional website.</p>
        </div>
    </div>
</div>

<!--Image -->
<div class="container">
    <a href="#">
        <img class="img w-100 h-auto" src="assets/images/ad.jpeg" alt="Ad Image">
    </a>
</div>
<!-- End of Image -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 align-self-center">
            <h1 class="text-dark text-center bold">Our Traders</h1>
        </div>
        <div class="col-lg-9 align-self-center">
            <p class="text-left mt-2">Hudders Market puts utmost focus on empowerlng It's traders, they form the
                backbone of our market- place. With our new and cutting edge systems we provlde Incredible levels of
                control and ownership to our traders so they can manage their shops effectively and efficlently. <br>
                <br>From promotional and sales maximlsatlon tools to order tracking, performance reports, real-time
                analytics and Industry benchmarking; thelr growth Is only Ilmited by the effort and dedication they
                commit.<br><br> We are Incredibly proud of the success storles that have emerged from our marketplace In
                the past and actively look forward to welcoming many more!</p>
        </div>
    </div>
</div>
@endsection
