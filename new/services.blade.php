@extends( 'layouts.public' )
@section ( "styles" )
    <link href="{{ asset( 'category.css?v=12' ) }}" rel="stylesheet">
@endsection
@section( 'content' )

    <section class="worker-girls">
<div class="container">
		<div class="contaiener-box">
			<h1 class="info-big-title"><strong>Services</strong></h1>
		</div>
	 <ol class="breadcrumb mb-2" itemscope="" itemtype="https://schema.org/BreadcrumbList">
			<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
			  <a itemtype="https://schema.org/Thing" itemprop="item" href="{{url('')}}">
				<span itemprop="name" style="color: #212529">Home</span></a>
				<span class="after"></span>
			   <meta itemprop="position" content="1" />
			</li>
			 <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
				<span itemprop="name" style="color: #212529">Services</span>
			   <meta itemprop="position" content="2" />
			</li>
			
		 </ol>

	<div class="row">
		@foreach($services as $service)
            <div class="col-xl-4 col-lg-4 col-md-6 col-12 text-center text-lg-left">

			<div class="worker-girls-box" >
			<a class="" href="{{ route('service', $service->name_id) }}">
				<img src="{{$service->image}}" style="object-fit: contain"
                     class=" photo-girls" alt="{{$service->name_id}} ">
						</a>
					
			<div class="worker-name-box">
				<h2 class="worker-name">{{$service->name}}</h2>
				<small>{{$service->description}}</small>
			</div>
			</div>
   
			</div>
    @endforeach
	</div>
<div class="container">
		<div class="contaiener-box mt-5">
<h2>Escort Services at Secret Desire</h2> 
<p>Welcome to Secret Desire, the escort directory service that understands your desires and keeps your secrets- so you can have the best experience possible when searching for escorts in your areas. As a provider of escort advertisements and listings, we offer you a massive selection of any escort or associated professional you may be looking for. We specialized in female escorts, male escorts, gay and transgender escorts, strippers, sensual massage, and domination & fetish professionals. All local to you, wherever you may be. </p>
			<h2>Finding Escort Services Near Me</h2> 

			<p>Finding the perfect escort or adult services professional is a breeze on Secret Desire. We offer a targeted search function that allows you to not only search for a provider directly in the area you are in currently, but you can also search for providers in other areas- making it simple to plan ahead for future travel. </p>
			<h2>Secret Desire’s Dedication to Our Clients</h2> 
			<p>Our search function also allows you to search for specific types of providers, conveniently narrowing down your search and only showing you the most relevant listings in your chosen area. This helps to cut your time in half, so you can get on to bigger and better things. Each escort service ad that we host is regularly updated with all of the crucial information you will need in order to make an informed choice when selecting the type of company you will be booking.  </p>

			<p>We understand the importance of your confidence, so for us, it’s equally important to build that trust. We offer fully confidential services to our clients, as well as several options to ensure that booking the escort services you most want, remains a simple task. We offer a client profile that allows you to save your favorite providers and receive personalized reviews from providers you have already worked with.</p>

			<p>Receive enough reviews and you will no longer need to submit to additional pre-screenings for appointments. Which will not only save you valuable time, but exclude you from further hassle in the future. We also allow you to review providers, so you can share your experiences with other prospective clients. </p>
			<h2>Secret Desire’s Dedication to Our Providers</h2>
			<p>We will also always handle your billing with the utmost discretion, ensuring your privacy and never sharing your details with anyone. Each provider is a professional, which means they will always respect your privacy. </p>

			<p>At Secret Desire, we have melded years of industry knowledge from both escorts and clients alike, allowing us to create a synergistic portal that not only supports our clients, but also supports our providers. Our escort services ads are always pocket friendly, meaning as a provider, you have the ability to control your business the way you see fit. Allowing you to review clients, regularly update profile information, as well as help create useful and profitable client reviews for yourself. </p>

			<p>We offer competitive pricing and excellent services to ensure that your ad stays at the top of the game. We also offer our providers access to our 24/7 customer support team- that will happily assist you with any problems or questions you might have. Helping you to run your business more smoothly and embrace your entrepreneurship. We always use only the most discreet methods of payments, so you never have to worry about your information falling into the wrong hands. We are confident in your skills, so you’ll never have to deal with frustrating regulations about what you offer or how you offer it! Share as much or as little as you would like. It’s your community, we just help you build it. </p>


			<!-- <script type="application/javascript" src="https://syndication.realsrv.com/splash.php?idzone=4384242&capping=0"></script> -->
</div>
		</div>
	</div>
	
	</section>


	
@endsection