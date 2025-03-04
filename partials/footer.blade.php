
@agent()
@else
	@guest
		@include( 'partials.modals.agreement' )
	@endguest
@endagent

<footer>
	<hr style="margin-bottom: 0;">
	@include( 'partials/navbar' )
	<div class="footer bg-main some-padding">
		<div class="container">
			<div class="d-md-flex d-block text-center flex-wrap justify-content-md-end justify-content-center bd-highlight">
				<span class="d-none d-md-block nav-linke align-self-start mr-0 mr-md-auto pt-2 mt-1" style="color: #DAD9D8;">
					&copy; {{ date( 'Y' ) }} secretdesire.co
				</span>
				<a class="nav-linke" href="{{ route( 'page_faq' ) }}">
					FAQ
				</a>
    			<a target="_blank" class="nav-linke" rel="nofollow" href="https://twitter.com/secdesire">
                    Twitter
                </a>
				<a class="nav-linke" href="{{ route( 'page_termsOfService' ) }}">
					Terms of service
				</a>
				<a class="nav-linke"  href="{{ route( 'page_privacyPolicy' ) }}">
					Privacy Policy
				</a>
								<a class="nav-linke"  href="https://blog.secretdesire.co/rubratings-rubmd-alternative">
					Rubmd
				</a>
				<span class="d-md-none nav-linke align-self-start mr-0 mr-md-auto pt-2 mt-1" style="color: #DAD9D8;">
					&copy; {{ date( 'Y' ) }} secretdesire.co
				</span>
			</div>
		</div>
	</div>
</footer>