@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['allDiscount' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">
                <form class="text-dark" method="post" action="{{ route('discounts.update', $discount->id) }}">

                    <div class="form-group">
                        <label class="mb-0" for="name">Name*</label>
                        <input type="text" class="form-control @error('discount_name') is-invalid @else border-text @enderror" id="name" name="discount_name" value="{{ old('discount_name') ?? $discount->name }}">
                        @error('discount_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="type">Type*</label>
                        <select class="custom-select @error('type') is-invalid @else border-text @enderror" name="type" id="type">
                            <option value="" @if(old('type') == "") selected @endif>Choose Type</option>
                            <option value="0" @if(old('type') == 0 && is_numeric(old('type'))) selected @elseif($discount->type == 0) selected @endif>Fixed</option>
                            <option value="1" @if(old('type') == 1) selected @elseif($discount->type == 1) selected @endif>Percent</option>
                        </select>
                        @error('type') <div class="invalid-feedback"> {{ $message }} </div>  @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="amount">Amount*</label>
                        <input type="text" class="form-control @error('amount') is-invalid @else border-text @enderror" id="amount" name="amount" value="{{ old('amount') ?? $discount->amount }}">
                        @error('amount') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="mb-0" for="date">Expiry Date</label>
                        <input type="date" class="form-control @error('date') is-invalid @else border-text @enderror" id="date" name="date" value="{{ old('date') ?? $discount->expiry_date ? $discount->expiry_date->format('Y-m-d') : $discount->expiry_date }}">
                        @error('date') <div class="invalid-feedback"> {{ $message }} </div> @enderror
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
