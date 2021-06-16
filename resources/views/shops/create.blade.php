@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['addShop' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form class="text-dark" action="#">

                    <div class="form-group">
                        <label class="mb-0" for="email">Name*</label>
                        <input type="text" class="form-control border-text" id="email" value="Discount Name">
                    </div>

                    <label style="margin-bottom:0" for="image">Image*</label>
                    <div class="custom-file mb-3">
                        <input type="file" style="border: 1px solid black" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="validatedCustomFile">Choose File</label>
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
