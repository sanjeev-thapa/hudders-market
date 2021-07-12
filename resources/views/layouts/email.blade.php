@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url('')])
<img width="250" src="{{ asset('assets/images/logo.png') }}" alt="{{ config('app.name') }}">
@endcomponent
@endslot

{{-- Body --}}
@yield('content')

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
{{ config('app.name') }} © {{ date('Y') }} | @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
