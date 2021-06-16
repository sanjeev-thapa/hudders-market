@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['changePassword' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form class="text-dark" action="#">

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="mb-0" for="current">Current Password*</label>
                            <input type="password" class="form-control border-text" id="current"
                                placeholder="Current Password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="mb-0" for="new">New Password*</label>
                            <input type="password" class="form-control border-text" id="new" placeholder="New Password">
                        </div>

                        <div class="form-group col-lg-6">
                            <label class="mb-0" for="confirm">Confirm Password*</label>
                            <input type="password" class="form-control border-text" id="confirm"
                                placeholder="Confirm New Password">
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-secondary ml-auto">Change Password</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
