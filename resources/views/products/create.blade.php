@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['addProduct' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form class="text-dark" action="{{ route('products.store') }}" method="post"
                    enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="mb-0" for="name">Name*</label>
                        <input type="text" class="form-control @error('name') is-invalid @else border-text @enderror"
                            id="name" name="name" placeholder="Product Name" value="{{ old('name') }}">
                        @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="product_type_id">Product Type*</label>
                        <select class="custom-select @error('product_type_id') is-invalid @else border-text @enderror"
                            name="product_type_id" id="product_type_id">
                            <option value="">Product Type</option>

                            @foreach ($productTypes as $productType)
                            <option value="{{ $productType->id }}" @if($productType->id == old('product_type_id'))
                                selected @endif> {{ $productType->name }} </option>
                            @endforeach

                        </select>
                        @error('product_type_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="description">Description*</label>
                        <textarea class="form-control @error('description') is-invalid @else border-text @enderror"
                            id="description" name="description" rows="5"
                            placeholder="Product Description">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label class="mb-0" for="price">Price*</label>
                            <input type="text"
                                class="form-control @error('price') is-invalid @else border-text @enderror" id="price"
                                name="price" placeholder="Product Price" value="{{ old('price') }}">
                            @error('price') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="form-group col">
                            <label class="mb-0" for="stock">Stock*</label>
                            <input type="number"
                                class="form-control @error('stock') is-invalid @else border-text @enderror" id="stock"
                                name="stock" placeholder="Product Stock" value="{{ old('stock') }}">
                            @error('stock') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label class="mb-0" for="minimum">Minimum*</label>
                            <input type="number"
                                class="form-control @error('minimum') is-invalid @else border-text @enderror"
                                id="minimum" name="minimum" placeholder="Minimum Quantity" value="{{ old('minimum') }}">
                            @error('minimum') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="form-group col">
                            <label class="mb-0" for="maximum">Maximum*</label>
                            <input type="number"
                                class="form-control @error('maximum') is-invalid @else border-text @enderror"
                                id="maximum" name="maximum" placeholder="Maximum Quantity" value="{{ old('maximum') }}">
                            @error('maximum') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="allergy_info">Allergy Info</label>
                        <textarea class="form-control @error('allergy_info') is-invalid @else border-text @enderror"
                            id="allergy_info" name="allergy_info" rows="2"
                            placeholder="Allergy Information">{{ old('allergy_info') }}</textarea>
                        @error('allergy_info') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <label class="mb-0" for="image">Image*</label>
                    <div class="custom-file mb-3">
                        <input type="file" style="border: 1px solid black"
                            class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                        <label class="custom-file-label" for="validatedCustomFile">Choose File</label>
                        @error('image') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="discount_id">Discount</label>
                        <select class="custom-select @error('discount_id') is-invalid @else border-text @enderror"
                            id="discount_id" name="discount_id" value="{{ old('discount_id') }}">
                            <option value="">Choose Discount</option>

                            @foreach ($discounts as $discount)
                            <option value="{{ $discount->id }}" @if($discount->id == old('discount_id')) selected
                                @endif> {{ $discount->name }} </option>
                            @endforeach

                        </select>
                        @error('discount_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="text-right">
                        @csrf
                        <button class="btn btn-secondary ml-auto">Create</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
