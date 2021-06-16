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
                <form class="text-dark" action="#">

                    <div class="form-group">
                        <label class="mb-0" for="name">Name*</label>
                        <input type="text" class="form-control border-text" id="name" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="type">Product Type*</label>
                        <select class="custom-select border-text" name="gender" id="type">
                            <option value="">Product Type</option>
                            <option value="0"></option>
                            <option value="1"></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="description">Product Description*</label>
                        <textarea class="form-control border-text" id="description" rows="5"
                            placeholder="Product Description"></textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label class="mb-0" for="first">Price*</label>
                            <input type="text" class="form-control border-text" id="first" placeholder="Product Price">
                        </div>

                        <div class="form-group col">
                            <label class="mb-0" for="last">Stock*</label>
                            <input type="text" class="form-control border-text" id="last" placeholder="Product Stock">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label class="mb-0" for="first">Minimum*</label>
                            <input type="text" class="form-control border-text" id="first" placeholder="Minimum Price">
                        </div>

                        <div class="form-group col">
                            <label class="mb-0" for="last">Maximum*</label>
                            <input type="text" class="form-control border-text" id="last" placeholder="Maximum Price">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="description">Allergy Info*</label>
                        <textarea class="form-control border-text" id="description" rows="2"
                            placeholder="Allergy Information"></textarea>
                    </div>

                    <label class="mb-0" for="image">Image*</label>
                    <div class="custom-file mb-3">
                        <input type="file" style="border: 1px solid black" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="validatedCustomFile">Choose File</label>
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="type">Discount*</label>
                        <select class="custom-select border-text" name="gender" id="type">
                            <option value="">Choose Discount</option>
                            <option value="0"></option>
                            <option value="1"></option>
                        </select>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-secondary ml-auto">Create</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
