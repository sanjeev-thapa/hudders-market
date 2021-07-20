@extends('layouts.app')

@section('content')
<form class="container mt-5" method="post" action="{{ route('checkouts.store') }}">
    <div class="col-lg-6 mt-3">

        {!! session('message') !!}

        <h2 class="text-dark text-left bold">Collection Slot</h2>

        <div class="row">
            <div class="form-group col">
                <label class="mb-0 mt-4" for="day">Collection Day*</label>
                <select class="custom-select @error('day_id') is-invalid @else border-text @enderror" id="day"
                    name="day_id">
                    <option value="">Choose Day</option>
                    @foreach ($days as $day)
                    <option value="{{ $day->id }}" {{ $day->disabled ? 'disabled' : '' }}
                        {{ $day->selected ? 'selected' : '' }}>
                        {{ $day->day }}</option>
                    @endforeach
                </select>
                @error('day_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col">
                <label class="mb-0 mt-2" for="time">Collection Time*</label>
                <select class="custom-select @error('time_id') is-invalid @else border-text @enderror mb-2" id="time"
                    name="time_id">
                    {{-- <option value="">Choose Time</option> --}}
                    {{-- @foreach ($times as $time)
                    <option value="{{ $time->id }}" @if($time->start_time == get_collection_time()->start_time)
                    selected
                    @endif @if($time->start_time < get_collection_time()->start_time) disabled @endif>
                        {{ $time->start_time . '-' . $time->end_time }}
                        </option>
                        @endforeach --}}
                </select>
                @error('time_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-lg-8 mt-3">
            <h2 class="text-left bold @error('payment_method') text-danger @else text-dark  @endif">Payment Gateway
            </h2>
            <div id="menu">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <input type="radio" name="payment_method" value="0" class="d-none" id="paypal">
                        <label for="paypal">
                            <img src="{{ asset('assets/images/paypal.png') }}"
                                class="border border-2 cursor-pointer rounded img-fluid" width="200">
                        </label>
                    </div>
                    <div class=" col-lg-4 mt-4">
                        <input type="radio" name="payment_method" value="1" class="d-none" id="stripe">
                        <label for="stripe">
                            <img src="{{ asset('assets/images/stripe.png') }}"
                                class="border border-2 cursor-pointer rounded img-fluid" width="200">
                        </label>
                    </div>
                </div>
                @error('payment_method') <div class="text-danger text-sm"> {{ $message }} </div> @enderror
            </div>

            <div>
                @csrf
                <button class="btn btn-primary btn-block py-2 mt-4 col-lg-3 bold">Place Order</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script')
<script>
    function getTime(day = ''){
        if(day == ''){
            day = '{{ now()->format('l') }}';
        }
        $.ajax({
            type: "GET",
            url: 'checkout/api/time/' + day,
            success: function(times){
                // console.log(times);
                $('#time').html('<option value="">Choose Time</option>');
                times.forEach(time => {
                    $('#time').append(`<option value="${time.id}" ${time.disabled ? 'disabled' : ''}>${time.start_time}-${time.end_time}</option>`);
                });
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    getTime();
    $('#day').change(function(){
        getTime($('#day option:selected').text().trim());
    });

    $('#paypal').click(function(){
        $(this).parent().children().children().eq(0).addClass('border-secondary');
        $('#stripe').parent().children().children().eq(0).removeClass('border-secondary');
    });
    $('#stripe').click(function(){
        $(this).parent().children().children().eq(0).addClass('border-secondary');
        $('#paypal').parent().children().children().eq(0).removeClass('border-secondary');
    });
</script>
@endsection
