@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="#">
                <img class="carousel-img"
                    src="https://cdn.discordapp.com/attachments/840031169319665727/852101919476023327/banner_2nd.png"
                    alt="Banner 1">
            </a>
        </div>

        <div class="carousel-item">
            <a href="#">
                <img class="carousel-img"
                    src="https://cdn.discordapp.com/attachments/840031169319665727/854926972176957460/new.png"
                    alt="Banner 2">
            </a>
        </div>

        <div class="carousel-item">
            <a href="#">
                <img class="carousel-img"
                    src="https://cdn.discordapp.com/attachments/840031169319665727/856715425265090570/Untitled-1-01.png"
                    alt="Banner 3">
            </a>
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
        <div class="col">
            <a class="link-text" href="#">
                <img class="thumbnail-img rounded" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                    alt="Category">
                <p class="bold text-center">Lorem</p>
            </a>
        </div>
        <div class="col">
            <a class="link-text" href="#">
                <img class="thumbnail-img rounded" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                    alt="Category">
                <p class="bold text-center">Ispum</p>
            </a>
        </div>
        <div class="col">
            <a class="link-text" href="#">
                <img class="thumbnail-img rounded" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                    alt="Category">
                <p class="bold text-center">Lorem</p>
            </a>
        </div>
        <div class="col">
            <a class="link-text" href="#">
                <img class="thumbnail-img rounded" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                    alt="Category">
                <p class="bold text-center">Ipsum</p>
            </a>
        </div>
        <div class="col">
            <a class="link-text" href="#">
                <img class="thumbnail-img rounded" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                    alt="Category">
                <p class="bold text-center">Lorem</p>
            </a>
        </div>
        <div class="col">
            <a class="link-text" href="#">
                <img class="thumbnail-img rounded" src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg"
                    alt="Category">
                <p class="bold text-center">Ispum</p>
            </a>
        </div>
    </div>
</div>

<!-- Ad Image -->
<div class="container">
    <a href="#">
        <!-- <img class="ad-img" src="https://www.gyapu.com//b8fd4255d2b965d21b2d57588260e7e7.jpg" alt="Ad Image"> -->
        <img class="ad-img" src="https://cdn.discordapp.com/attachments/840031169319665727/852469652784283648/Ad.png"
            alt="Ad Image">
    </a>
</div>
<!-- End of Ad Image -->

<!-- Deals -->
<div class="container mt-4">
    <div class="d-flex align-items-center">
        <h3 class="mb-0">Deals</h3>
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
<!-- End of Deals -->

<!-- Top Rated -->
<div class="container">
    <div class="d-flex align-items-center">
        <h3 class="mb-0">Top Rated</h3>
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
                            <i class="fas fa-star"></i>
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
                            <i class="fas fa-star"></i>
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
<!-- End of Top Rated -->

<!-- Latest -->
<h3 class="container mt-4 mb-0">Latest</h3>
<div class="container mt-4">
    <div class="row row-cols-lg-5">

        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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
        <div class="col-6 col-md-4">
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

    <button class="btn btn-outline-secondary mx-auto d-block mt-2 bold">View More</button>
</div>
<!-- End of Top Rated -->
@endsection('content')
