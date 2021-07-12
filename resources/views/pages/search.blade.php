@extends('layouts.app', ['search' => request('q')])

@section('content')
<form>
    <input type="hidden" name="q" value="{{ request('q') ?? '' }}">

    <div class="container">
        <div class="row">

            <div class="col-lg-3 mt-5">
                <p class="text-dark text-left mt-3">Shop</p>
                <div class="row">
                    <div class="form-group col" id="shop_form">
                        <select class="custom-select border-text" name="shop" id="shop">
                            <option value="">Choose Shop</option>
                            @foreach ($shops as $shop)
                            <option value="{{ $shop->id }}" @if($shop->id == request('shop')) selected
                                @endif>
                                {{ $shop->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr>
                <p class="text-dark text-left">Product Type</p>
                <div class="row">
                    <div class="form-group col" id="product_type_form">
                        <select class="custom-select border-text" name="product_type" id="product_type">
                            <option value="">Choose Product Type</option>
                            @foreach ($productTypes as $productType)
                            <option value="{{ $productType->id }}" @if($productType->id == request('product_type'))
                                selected
                                @endif>
                                {{ $productType->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>

                <p class="text-dark text-left">Price</p>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control border-text mr-2" name="minimum"
                        value="{{ request('minimum') ?? '' }}" placeholder="Minimum">
                    <span>-</span>
                    <input type="text" class="form-control border-text mx-2" name="maximum"
                        value="{{ request('maximum') ?? '' }}" placeholder="Maximum">
                    <button class="btn btn-warning"><i class="fas fa-play"></i></button>
                </div>
                <hr>

                <p class="text-dark text-left">Rating</p>

                <div id="rating">
                    <input type="radio" class="rating" name="rating" value="5" id="5" @if(request('rating')==5) checked
                        @endif>
                    <label for="5">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </label>
                    <br>

                    <input type="radio" class="rating" name="rating" value="4" id="4" @if(request('rating')==4) checked
                        @endif>
                    <label for="4">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </label>
                    <br>

                    <input type="radio" class="rating" name="rating" value="3" id="3" @if(request('rating')==3) checked
                        @endif>
                    <label for="3">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </label>
                    <br>

                    <input type="radio" class="rating" name="rating" value="2" id="2" @if(request('rating')==2) checked
                        @endif>
                    <label for="2">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </label>
                    <br>

                    <input type="radio" class="rating" name="rating" value="1" id="1" @if(request('rating')==1) checked
                        @endif>
                    <label for="1">
                        <div class="text-warning text-left">
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </label>
                </div>
            </div>


            <div class="col">
                <div class="row mt-5">
                    <div class="col d-flex align-items-left">
                        <p class="mt-3">
                            @if($products->count() > 0) {{ $products->count() }} @else No @endif items found
                            @if(!empty(request('q'))) for "{{Str::title(request('q')) }}" @endif
                        </p>
                    </div>
                    <div class="col d-flex mr-0">
                        <p class="ml-auto mt-3">Sort By: </p>
                        <div class="form-group col-lg-5 mt-2 mr-0">
                            <select class="custom-select border-text" id="first">
                                <option>Best Match</option>
                                <option>Latest</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-3">
                        <a class="product-card" href="{{ route('products.show', $product->id) }}">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <img class="thumbnail-img"
                                        src="{{ $product->image ? asset($product->image) : asset('assets/images/thumbnail.png') }}"
                                        alt="Product">
                                    <p class="mt-2 mb-0 text-center ellipsis-1">{{ Str::title($product->name) }}</p>
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
        </div>
    </div>
    <!-- End of Results -->
</form>
@endsection

@section('script')
<script>
    $('#shop').change(function(){
        $('form').submit();
    });
    $('#product_type').change(function(){
        $('form').submit();
    });
    $('#rating .rating').click(function(){
        $('form').submit();
    });
</script>
@endsection
