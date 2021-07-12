@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="carousel-img" src="{{ asset('assets/images/first-banner.jpg') }}" alt="Banner 1">
        </div>

        <div class="carousel-item">
            <img class="carousel-img" src="{{ asset('assets/images/second-banner.jpg') }}" alt="Banner 2">
        </div>

        <div class="carousel-item">
            <img class="carousel-img" src="{{ asset('assets/images/third-banner.jpg') }}" alt="Banner 3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container mt-4 mb-2">
    <div class="row category-slider">

        @foreach ($productTypes as $productType)
        <div class="col">
            <a class="link-text" href="{{ route('search', ['product_type' => $productType->id]) }}">
                <img class="thumbnail-img rounded border-primary-hover"
                    src="{{$productType->image ? asset($productType->image) : asset('assets/images/thumbnail.png') }}"
                    alt="{{ $productType->image }}">
                <p class="bold text-center">{{ Str::title($productType->name) }}</p>
            </a>
        </div>
        @endforeach

    </div>
</div>

<!-- Ad Image -->
<div class="container">
    <a href="{{ route('register') }}">
        <img class="ad-img" src="{{ asset('assets/images/ad.png') }}" alt="Ad Image">
    </a>
</div>
<!-- End of Ad Image -->

<!-- Deals -->
@if($deals->count())
<div class="container mt-4">
    <div class="d-flex align-items-center">
        <h3 class="mb-0">Deals</h3>
        <a href="{{ route('search', ['filter' => 'deals']) }}" class="btn btn-secondary bold btn-sm ml-auto">View
            More</a>
    </div>
</div>

<div class="container mt-4">
    <div class="row slider">

        @foreach ($deals as $product)
        <div class="col">
            <a class="product-card" href="{{ route('products.show', $product->id) }}">
                <div class="card">
                    <div class="card-body">
                        <img class="thumbnail-img"
                            src="{{ $product->image ? asset($product->image) : asset('assets/images/thumbnail.png') }}"
                            alt="Product">
                        <p class="mt-2 mb-0 text-center">{{ Str::title($product->name) }}</p>
                        <p class="text-center mb-0">
                            @if($product->hasDiscount()) <strike>£{{ $product->price }}</strike> @endif
                            <strong>£{{ $product->getPrice() }}</strong>
                        </p>
                        {!! $product->getRatingBadge() !!}
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>
@endif
<!-- End of Deals -->

<!-- Top Rated -->
@if($ratings->count())
<div class="container mt-4">
    <div class="d-flex align-items-center">
        <h3 class="mb-0">Top Rated</h3>
        <a href="{{ route('search', ['filter' => 'top_rated']) }}" class="btn btn-secondary bold btn-sm ml-auto">View
            More</a>
    </div>
</div>

<div class="container mt-4">
    <div class="row slider">

        @foreach ($ratings as $product)
        <div class="col">
            <a class="product-card" href="{{ route('products.show', $product->id) }}">
                <div class="card">
                    <div class="card-body">
                        <img class="thumbnail-img"
                            src="{{ $product->image ? asset($product->image) : asset('assets/images/thumbnail.png') }}"
                            alt="Product">
                        <p class="mt-2 mb-0 text-center">{{ Str::title($product->name) }}</p>
                        <p class="text-center mb-0">
                            @if($product->hasDiscount()) <strike>£{{ $product->price }}</strike> @endif
                            <strong>£{{ $product->getPrice() }}</strong>
                        </p>
                        {!! $product->getRatingBadge() !!}
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>
@endif
<!-- End of Top Rated -->

<!-- Latest -->
@if($products->count())
<h3 class="container mt-4 mb-0">Latest</h3>
<div class="container mt-4">
    <div class="row row-cols-lg-5">

        @foreach ($products->take(10) as $product)
        <div class="col-6 col-md-4">
            <a class="product-card" href="{{ route('products.show', $product->id) }}">
                <div class="card mb-4">
                    <div class="card-body">
                        <img class="thumbnail-img"
                            src="{{ $product->image ? asset($product->image) : asset('assets/images/thumbnail.png') }}"
                            alt="Product">
                        <p class="mt-2 mb-0 text-center">{{ Str::title($product->name) }}</p>
                        <p class="text-center mb-0">
                            @if($product->hasDiscount()) <strike>£{{ $product->price }}</strike> @endif
                            <strong>£{{ $product->getPrice() }}</strong>
                        </p>
                        {!! $product->getRatingBadge() !!}
                    </div>
                </div>
            </a>
        </div>
        @endforeach

    </div>

    <div class="text-center mt-2">
        <a href="{{ route('search') }}" class="btn btn-outline-secondary bold">View More</a>
    </div>
</div>
@endif
<!-- End of Latest -->
@endsection('content')
