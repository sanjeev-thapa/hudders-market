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
                <form class="text-dark" method="post" action="{{ route('accounts.update') }}">

                    {!! session('message') !!}

                    <div class="row">
                        <div class="form-group col">
                            <label class="mb-0" for="first">First Name*</label>
                            <input type="text"
                                class="form-control @error('first_name') is-invalid @else border-text @enderror"
                                id="first" name="first_name" value="{{ old('first_name') ?? $user->first_name }}">
                            @error('first_name') <span class="invalid-feedback"> {{ $message }} </span> @enderror
                        </div>

                        <div class="form-group col">
                            <label class="mb-0" for="last">Last Name*</label>
                            <input type="text"
                                class="form-control @error('last_name') is-invalid @else border-text @enderror"
                                id="last" name="last_name" value="{{ old('last_name') ?? $user->last_name }}">
                            @error('last_name') <span class="invalid-feedback"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <div class=" row">
                        <div class="form-group col">
                            <label class="mb-0" for="date">Date of Birth*</label>
                            <input type="date"
                                class="form-control @error('date_of_birth') is-invalid @else border-text @enderror"
                                id="date" name="date_of_birth"
                                value="{{ old('date_of_birth') ?? $user->dob->format('Y-m-d') }}">
                            @error('date_of_birth') <span class="invalid-feedback"> {{ $message }} </span> @enderror
                        </div>

                        <div class="form-group col">
                            <label class="mb-0" for="gender">Gender*</label>
                            <select class="custom-select @error('gender') is-invalid @else border-text @enderror"
                                name="gender" id="gender" name="gender">
                                <option value="">Choose Gender</option>
                                <option value="0" @if($user->gender==0 && is_numeric($user->gender)) selected @endif>
                                    Male</option>
                                <option value="1" @if($user->gender==1) selected
                                    @endif>Female</option>
                                <option value="2" @if($user->gender==2) selected
                                    @endif>Other</option>
                            </select>
                            @error('gender') <span class="invalid-feedback"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="phone">Phone Number*</label>
                        <input type="text"
                            class="form-control border-text @error('phone') is-invalid @else border-text @enderror"
                            id="phone" name="phone" value="{{ old('phone') ?? $user->phone }}">
                        @error('phone') <span class="invalid-feedback"> {{ $message }} </span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="email">Email*</label>
                        <input type="text"
                            class="form-control border-text @error('email') is-invalid @else border-text @enderror"
                            id="email" name="email" value="{{ old('email') ?? $user->email }}">
                        @error('email') <span class="invalid-feedback"> {{ $message }} </span> @enderror
                    </div>

                    <div class="text-right">
                        @csrf
                        <button class="btn btn-secondary ml-auto">Update Profile</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection('content')
