
@include('head.head')
@include('head.header')
<div class="container" style="min-height: 70vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    {{ __('Before proceeding, please check your email:') }} <strong>{{ Auth::user()->email }}</strong> {{ __('for a verification link. Also check your spam folder.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a> {{ __('or contact to our support info@secretdesire.info') }}.
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer.footer')

