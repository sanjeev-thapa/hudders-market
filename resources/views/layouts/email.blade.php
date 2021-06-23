@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url('')])
<img width="250" src="https://cdn.discordapp.com/attachments/840031169319665727/845595910779174922/logo2.0.png"
    alt="{{ config('app.name') }}">
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
