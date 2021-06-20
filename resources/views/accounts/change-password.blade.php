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
                <form class="text-dark" method="post" action="{{ route('accounts.updatePassword') }}">

                    {!! session('message') !!}

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="mb-0" for="current">Current Password*</label>
                            <input type="password" name="current_password"
                                class="form-control @error('current_password') is-invalid @else border-text @enderror"
                                id="current" placeholder="Current Password">
                            @error('current_password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="mb-0" for="new">New Password*</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @else border-text @enderror" id="new"
                                placeholder="New Password">
                            @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label class="mb-0" for="confirm">Confirm Password*</label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @else border-text @enderror"
                                id="confirm" placeholder="Confirm New Password">
                            @error('password_confirmation') <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>

                    <div class="text-right">
                        @csrf
                        <button class="btn btn-secondary ml-auto">Change Password</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
