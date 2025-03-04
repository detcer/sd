
@include('head.head')
    @include('head.header')
@if(Auth::user()->userType == 'provider')
        @include('user.provider.providerHome')
    @else
        @include('user.client.clientHome')
@endif

@include('footer.footer')
