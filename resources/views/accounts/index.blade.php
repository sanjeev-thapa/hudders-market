@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['myAccount' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form class="text-dark" action="#">

                    <div class="row">
                        <div class="form-group col">
                            <label class="mb-0" for="first">First Name*</label>
                            <input type="text" class="form-control border-text" id="first" value="John">

                        </div>

                        <div class="form-group col">
                            <label class="mb-0" for="last">Last Name*</label>
                            <input type="text" class="form-control border-text" id="last" value="Doe">

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label class="mb-0" for="date">Date of Birth*</label>
                            <input type="date" class="form-control border-text" id="date" value="01/01/1990">

                        </div>

                        <div class="form-group col">
                            <label class="mb-0" for="gender">Gender*</label>
                            <select class="custom-select border-text" name="gender" id="gender">
                                <option value="0" selected>Male</option>
                                <option value="1">Female</option>
                                <option value="2">Other</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="phone">Phone Number*</label>
                        <input type="text" class="form-control border-text" id="phone" value="123456890">
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="email">Email*</label>
                        <input type="text" class="form-control border-text" id="email" value="johndoe@gmail.com">
                    </div>

                    <div class="text-right">
                        <button class="btn btn-secondary ml-auto">Update Profile</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
