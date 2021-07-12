@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['allProductType' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form class="text-dark" method="POST" action="{{ route('product-types.update', $productType->id) }}"
                    enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="mb-0" for="product_type">Prodcut Type*</label>
                        <input type="text"
                            class="form-control @error('product_type') is-invalid @else border-text  @enderror"
                            name="product_type" id="product_type" placeholder="Product Type"
                            value="{{ old('product_type') ?? $productType->name }}">
                        @error('product_type') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="mt-4 mb-2">
                        <img width="100"
                            src="{{ $productType->image ? asset($productType->image) : asset('assets/images/thumbnail.png') }}"
                            alt="{{ $productType->name }}">
                    </div>

                    <label class="mb-0" for="image">Image*</label>
                    <div class="custom-file mb-3">
                        <input type="file" style="border: 1px solid black"
                            class="custom-file-input @error('image') is-invalid @enderror" name="image" id="image"
                            value="{{ old('image') }}">
                        <label class="custom-file-label" for="validatedCustomFile">Choose File</label>
                        @error('image') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="shop">Shop*</label>
                        <select class="custom-select @error('shop') is-invalid @else border-text @enderror" name="shop"
                            id="shop">
                            <option value="">Choose Shop</option>
                            @foreach ($shops as $shop)
                            <option value="{{ $shop->id }}" @if($shop->id == old('shop')) selected @elseif($shop->id ==
                                $productType->shop_id) selected @endif > {{ $shop->name }} </option>
                            @endforeach
                        </select>
                        @error('shop') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="text-right">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-secondary ml-auto">Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
