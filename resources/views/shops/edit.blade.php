@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['allShop' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form method="post" class="text-dark" action="{{ route('shops.update', $shop->id) }}"
                    enctype="multipart/form-data">

                    {!! session('message') !!}

                    <div class="form-group">
                        <label class="mb-0" for="email">Name*</label>
                        <input type="text"
                            class="form-control @error('shop_name') is-invalid @else border-text @enderror"
                            name="shop_name" id="email" placeholder="Shop Name"
                            value="{{ old('shop_name') ?? $shop->name }}">
                        @error('shop_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="mt-4 mb-2">
                        <img width="100"
                            src="{{ $shop->image ? asset($shop->image) : asset('assets/images/thumbnail.png') }}"
                            alt="{{ $shop->name }}">
                    </div>

                    <label style="margin-bottom:0" for="image">Image</label>
                    <div class="custom-file mb-3">
                        <input type="file" style="border: 1px solid black" class="custom-file-input" name="image"
                            id="image">
                        <label class="custom-file-label" for="validatedCustomFile">Choose File</label>
                    </div>

                    <div class="text-right">
                        @csrf
                        @method('put')
                        <button class="btn btn-secondary ml-auto">Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
