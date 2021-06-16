@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['addDiscount' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form class="text-dark" action="#">

                    <div class="form-group">
                        <label class="mb-0" for="email">Name*</label>
                        <input type="text" class="form-control border-text" id="email" value="Discount Name">
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="gender">Type*</label>
                        <select class="custom-select border-text" name="gender" id="gender">
                            <option value="">Choose Type</option>
                            <option value="0">Fixed</option>
                            <option value="1">Percent</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="phone">Amount*</label>
                        <input type="text" class="form-control border-text" id="phone" value="Discount Amount">
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="date">Expiry Date</label>
                        <input type="date" class="form-control border-text" id="date">
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
