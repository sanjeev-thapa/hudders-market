@extends('layouts.app')

@section('content')

<h1 class="text-bold text-center mt-5 pt-md-5 bold">OOPS!</h1>
<h1 class="text-dark text-center mt-1 bold">Error 500: Internal Server Error</h1><br><br>
<div class="text-center">
    <a href="{{ url()->previous() }}" class="btn btn-secondary ml-auto mb-4">Go Back</a>
</div>
@endsection('content')
