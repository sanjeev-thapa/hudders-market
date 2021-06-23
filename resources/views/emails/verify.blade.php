@extends('layouts.email')

@section('content')
# Hello {{ ucfirst(strtolower($user)) }}

To complete your registration, please verify your email:

@component('mail::button', ['url' => $link, 'color' => 'success'])
Verify Now
@endcomponent

If you did not create account with us, please ignore this mail.

Thanks,<br>
{{ config('app.name') }}

<div style="border-top: 1px solid #b2b0c7; padding-top: 1em;"></div>
<small>If you are having trouble with button above, copy and paste this link
    <a href="{{ $link }}"> {{ $link }} </a>
</small>
@endsection
