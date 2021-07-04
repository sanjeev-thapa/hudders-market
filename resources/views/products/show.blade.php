@extends('layouts.app')

@section('style')
    <style>
        .loupe {
            display: none;
            position: absolute;
            width: 200px;
            height: 200px;
            border: 1px solid black;
            background: rgba(0, 0, 0, 0.25);
            cursor: crosshair;
            overflow: hidden;
        }

        .loupe img {
            position: absolute;
            right: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 image">
                <img class="product-img mt-5" src="{{ $product->image ? asset($product->image) :'https://getuikit.com/v2/docs/images/placeholder_600x400.svg' }}" alt="{{ $product->name }}">
            </div>
            <div class="loupe"></div>

            <div class="col-lg-5 mb-4">
                <h4 class="mt-5">{{ $product->name }}</h4>
                <h5 class="text-dark bold mt-4">Price: @if($product->hasDiscount()) <strike class="text-text font-weight-normal">£{{ $product->price }}</strike> @endif £{{ $product->getPrice() }}</h5>
                <hr>
                <h5 class="@if($product->stock > 0) text-dark @else text-danger @endif bold">@if($product->stock > 0) In Stock @else Out of Stock @endif</h5>
                <div class="d-flex align-items-left mt-3">
                    <p class="ml-0 mt-2">Qty: </p>
                    <div class="form-group col-lg-4">
                        <input class="form-control border-text" type="number" min="{{ $product->minimum  }}" max="{{ $product->maximum  }}" value="{{ $product->minimum }}" @if($product->stock <= 0) disabled @endif>
                    </div>
                </div>
                <div class="d-flex align-items-left mt-3">
                    <button class="btn btn-primary bold ml-0" @if($product->stock <= 0) disabled @endif>
                        <i class="cart fas fa-shopping-cart mr-1"></i> Add To Basket
                    </button>
                    <button class="btn btn-secondary bold ml-3" @if($product->stock <= 0) disabled @endif>
                        <i class="far fa-credit-card mr-1"></i> Checkout
                    </button>
                </div>
            </div>

            <div class="col-lg-3">
                <table class="table mt-2 mt-md-5 mb-0">
                    <tbody class="bg-white">
                        <tr>
                            <td>
                                <p class="text-muted mb-2 bold">Shop</p>
                                <a class="mb-0 bold" href="#">{{ $product->ProductType->shop->name }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mb-2 bold">Product Type</p>
                                <a class="mb-0 bold" href="#">{{ $product->ProductType->name }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="text-muted mb-2 bold">Allergy Info</p>
                                <p class="text-muted mb-0">{{ $product->allergy_info }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <table class="table table-borderless mt-5">
            <thead class="thead py-2 bg-info">
                <th scope="col" class="text-white">Product Details</th>
            </thead>
            <tbody class="bg-white border">
                <tr>
                    <td>
                        <p class="mb-0">{!! nl2br(e($product->description)) !!}</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table mt-4">
            <thead class="thead py-2 bg-info">
                <th scope="col" class="text-white">Product Rating & Review</th>
            </thead>
        </table>
        <p class="mt-2 mb-2">There are no reviews yet.</p>
        <p class="mt-2 mb-0">Your Ratings</p>
        <div class="text-left">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
        </div>
        <div class="form-group">
            <p class="mt-2 mb-0">Your Review</p>
            <textarea class="form-control border-dark" id="Textarea" rows="3"></textarea>
        </div>
        <div class="mt-1">
            <div class="d-flex align-items-center">
                <button class="btn btn-secondary bold btn-sm ml-auto">Submit</button>
            </div>
        </div>
    </div>
    <!-- Similiar Products -->
    <div class="container mt-5">
        <div class="d-flex align-items-center">
            <h3 class="mb-0">Products by same seller</h3>
            <button class="btn btn-secondary bold btn-sm ml-auto">View More</button>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row slider">

            <div class="col">
                <a class="product-card" href="#">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img class="thumbnail-img" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                                alt="Product">
                            <p class="mt-2 mb-0 text-center">Product Title</p>
                            <p class="bold text-center mb-0">£49.99</p>
                            <div class="text-warning text-center">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="product-card" href="#">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img class="thumbnail-img" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                                alt="Product">
                            <p class="mt-2 mb-0 text-center">Product Title</p>
                            <p class="bold text-center mb-0">£49.99</p>
                            <div class="text-warning text-center">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="product-card" href="#">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img class="thumbnail-img" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                                alt="Product">
                            <p class="mt-2 mb-0 text-center">Product Title</p>
                            <p class="bold text-center mb-0">£49.99</p>
                            <div class="text-warning text-center">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="product-card" href="#">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img class="thumbnail-img" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                                alt="Product">
                            <p class="mt-2 mb-0 text-center">Product Title</p>
                            <p class="bold text-center mb-0">£49.99</p>
                            <div class="text-warning text-center">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="product-card" href="#">
                    <div class="card mb-4">
                        <div class="card-body">
                            <img class="thumbnail-img" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                                alt="Product">
                            <p class="mt-2 mb-0 text-center">Product Title</p>
                            <p class="bold text-center mb-0">£49.99</p>
                            <div class="text-warning text-center">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <!-- End of Similiar Products -->
@endsection

@section('script')
    <script>
        var $loupe = $(".loupe"),
            loupeWidth = $loupe.width(),
            loupeHeight = $loupe.height();

        $(document).on("mouseenter", ".image", function(e) {
            var $currImage = $(this),
                $img = $('<img/>')
                .attr('src', $('img', this).attr("src"))
                .css({
                    'width': $currImage.width() * 2,
                    'height': $currImage.height() * 2
                });

            $loupe.html($img).fadeIn(100);

            $(document).on("mousemove", moveHandler);

            function moveHandler(e) {
                var imageOffset = $currImage.offset(),
                    fx = imageOffset.left - loupeWidth / 2,
                    fy = imageOffset.top - loupeHeight / 2,
                    fh = imageOffset.top + $currImage.height() + loupeHeight / 2,
                    fw = imageOffset.left + $currImage.width() + loupeWidth / 2;

                $loupe.css({
                    'left': e.pageX - 75,
                    'top': e.pageY - 75
                });

                var loupeOffset = $loupe.offset(),
                    lx = loupeOffset.left,
                    ly = loupeOffset.top,
                    lw = lx + loupeWidth,
                    lh = ly + loupeHeight,
                    bigy = (ly - loupeHeight / 4 - fy) * 2,
                    bigx = (lx - loupeWidth / 4 - fx) * 2;

                $img.css({
                    'left': -bigx,
                    'top': -bigy
                });

                if (lx < fx || lh > fh || ly < fy || lw > fw) {
                    $img.remove();
                    $(document).off("mousemove", moveHandler);
                    $loupe.fadeOut(100);
                }
            }
        });
    </script>
@endsection
