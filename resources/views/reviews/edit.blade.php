@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">

        <div class="col-12 col-lg-3">

            <!-- Side Navigation -->
            @include('layouts.sidebar', ['myReview' => true])
            <!-- End of Side Navigation -->

        </div>

        <div class="col-12 col-md-9">
            <div class="w-lg-90 ml-auto">

                {!! session('message') !!}

                <p class="mt-2 mb-0">Your Ratings</p>
                <div class="text-left cursor-pointer h5" id="rating">
                    @for($i = 1; $i <= 5; $i++) @if($i <=$review->rating) <i class="fas fa-star text-warning"></i>
                        @else
                        <i class="far fa-star"></i>
                        @endif
                        @endfor
                </div>
                @error('rating') <div class="invalid-feedback mb-2 d-block">{{ $message }}</div> @enderror

                <form method="post" action="{{ route('reviews.update', $review->id) }}">
                    <div class="form-group">
                        <p class="mt-2 mb-0">Your Review</p>
                        <textarea class="form-control @error('comments') is-invalid @else border-dark @enderror"
                            id="Textarea" name="comments" rows="3">{{ old('comments') ?? $review->comments }}</textarea>
                        @error('comments') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mt-1">
                        <div class="d-flex align-items-center">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="rating" id="inputRating" value="{{ $review->rating }}">
                            <a class="btn btn-text" href="{{ url()->previous() }}">Cancel</a>
                            <button class="btn btn-secondary ml-auto">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection('content')

@section('script')
<script>
    $('#rating .fa-star').click(function(){
       let index = $(this).index();
       let parent = $(this).parent();
       for(let i = 0; i <= parent.children().length; i++){
            parent.children().eq(i).removeClass('fas text-warning').addClass('far');
       }
       for(let i = 0; i <= index; i++){
            parent.children().eq(i).removeClass('far').addClass('fas text-warning');
            $('#inputRating').val(i+1);
       }
    });
</script>
@endsection
