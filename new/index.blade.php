@extends( 'layouts.public' )
@section( 'content' )
	<div class="info text-center text-md-left">

<!-- Hotjar Tracking Code for My site\\ Would you like to participate in our survey? -->
<!-- <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2719179,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script> -->



<!-- Hotjar Tracking Code for https://secretdesire.co/ -->
<!-- <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:3277473,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script> -->


		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        @include( 'components/bs-select-filter' )
		<div class="container">
        	<h1 class="info-big-title" style="text-align: center; font-family: 'Monserant-bold';">Rubfox</h1>
        </div>
		<div class="container">
			@guest
		<div class="row">
		<div class="col-xl-6 col-12">
		<div class="contaiener-box">
		<p class="info-big-title">Our Benefits for Clients</p>
		<p class="info-small-title">Always Fresh Ads</p>
		<p class="info-text">Our price is so low that every provider can bump her/his ad so many times as she wants.</p>
		<p class="info-small-title">Personal Profile</p>
		<p class="info-text">Register at Rubfox and you will have Personal Profile, where you can save your favourite providers, and keep them not only in your mind, but also in your profile</p>
		<p class="info-small-title">Reviews to You</p>
		<p class="info-text">We know that every client hates to be screened, 
		so we created a new function - Reviews from Providers to Clients.</p> 
		<p class="info-text">Just send a link to your profile and the provider will not have to screen you, 
		because all info about you will be in your Personal Profile.</p>
		<p class="info-text">If you have no reviews yet, send a link to providers which you have already visited and ask them to write a little review about you, 
		we are sure, they will agree to help you!</p>
		<div class="button-send-wrap">
		<button type="button" class="btn btn-main mx-auto mx-xl-0"  id="clients_sign_up">Clients sign up</button>
		</div>
		</div>
		<div class="contaiener-box">
		<p class="info-big-title">Services</p>
		<div class="row">
			@foreach($services as $service)
				<div class="col-xl-4 col-lg-4 col-md-4 col-6 text-center ">
				<a href="{{ route('service', $service->name_id) }}">
									<img class="img-fluid" style="height: 170px; width: auto;"  src="{{$service->image}}" alt="{{$service->name_id}}" />
				</a>
				<div>
					<p class="text-center">{{$service->name}}</p>
				</div>
				</div>
			@endforeach
			</div>
		
	
		</div>
		</div>
		<div class="col-xl-6 col-12">
		<div class="contaiener-box">
		<p class="info-big-title">Our Benefits for Providers</p>
		<p class="info-small-title">Reviews to Clients - is OUR FIRST INNOVATION</p>
		<p class="info-text">Okey, dear provider, we are sure that many of you hate reviews, 
		so our innovation is REVIEWS TO CLIENTS:</p> 
		<p class="info-text">- yes, we would like your business more safe and comfortable</p>
		<p class="info-text">- yes, you don't need to screen a person for a long time, because now 
		clients have their Personal Profile with Reviews from the other Providers. So, just ask the client 
		to send a link to his/her Profile and read reviews</p>
		<p class="info-text">- and of course, you can write your own reviews about your visitors!
		</p>
		<p class="info-small-title">Reviews to You</p>
		<p class="info-text">Reviews are the most significant part of today's adult business, 
		so don't be shame and ask your clients to leave a review for you. Don't worry all Reviews 
		are strictly controlled by our team!
		</p>
		<p class="info-small-title">The amount of Reviews</p>
		<p class="info-text">More Reviews you will have - more clients will believe that your service is 
		really good, more clients will visit you - more money you will get!</p>
		<p class="info-small-title">Privacy is the first Rule of Rubfox</p>
		<p class="info-text">The data of Rubfox is located in Netherlands, so your information is absolutely secured
		</p>
		<p class="info-small-title">All Payments are Anonymous</p>
		<p class="info-text">- don't worry about your bank info</p>
		<p class="info-text">- Rubfox uses only anonymous method of Payment- Bitcoin, which is absolutely safe and easy to use method
		</p>
		<p class="info-small-title">Our rates are available to everyone - only 2$ per bump!</p>
		<p class="info-text">But be sure, that this 2$ is the best investment in your life
		</p>
		<p class="info-small-title">More Bumps - More Clients</p>
		<p class="info-text">Ensure that your Listing is always on the top, and your more potential clients will see your ad! 
		Haven't time to bump your ad regularly? 
		No, problem! We have auto-bumps which can make your work comfortable and save your time!</p>
		<p class="info-text">PACKAGES OF BUMPS - IS OUR SECOND INNOVATION</p>
		<p class="info-text">Rubfox created a new, accessible, effective and easy scheme of bumps, 
		which will help you to save your money!
		</p>
		<p class="info-small-title">Premium Ads</p>
		<p class="info-text">Eye-catching ads, low prices, unlimited bumps
		</p>
		<p class="info-small-title">Multiply cities and multiply services in one ad - IS OUR THIRD INNOVATION</p>
		<p class="info-text">You don't need to make thousands ads and fill in all information million times, you need 
		to make just 1 ad, choose all services, you want and all cities you want! That's all you need to post your ad!
		</p>
		<p class="info-small-title">24/7 support team</p>
		<p class="info-text">Our support team is working every day and night for you! Be free to text them!
		</p>
		<div class="button-send-wrap">
		<button type="button"  class="btn btn-main mx-auto mx-xl-0"id="providers_sign_up">Providers sign up</button>
		</div>
		</div>
		</div>
		</div>
		@endguest
			
		@auth

					<div class="contaiener-box">
		<p class="info-big-title">Services</p>
		<div class="row">
			@foreach($services as $service)
				<div class="col-xl-4 col-lg-4 col-md-4 col-6 text-center ">
				<a href="{{ route('service', $service->name_id) }}">
									<img class="img-fluid" style="height: 170px"  src="{{$service->image}}" alt="{{$service->name_id}}" />
				</a>
				<div>
					<p class="text-center">{{$service->name}}</p>
				</div>
				</div>
			@endforeach
			</div>
		
	
		</div>
@endauth
		</div>

		
		<div class="container">
<!--         	@include( 'components/city-filter-block' )
			@include( 'components/city-filter-block-mobile' ) -->
			<p class="title-flat text-center">United States</p>
  <div class="row">
    <div class="col-md-6">
    <p class="state-xl">Arizona</p>
    <a class="state-sm" href="https://secretdesire.co/arizona-phoenix-bodyrubs">Phoenix</a>

    <p class="state-xl">California</p>
    <a class="state-sm" href="https://secretdesire.co/california-losangeles-bodyrubs">Los Angeles</a>
    <a class="state-sm" href="https://secretdesire.co/california-sacramento-bodyrubs">Sacramento</a>
    <a class="state-sm" href="https://secretdesire.co/california-sanjose-bodyrubs">San Jose</a>

    <p class="state-xl">Colorado</p>
    <a class="state-sm" href="https://secretdesire.co/colorado-denver-bodyrubs">Denver</a>

    <p class="state-xl">Florida</p>
    <a class="state-sm" href="https://secretdesire.co/florida-miami-bodyrubs">Miami</a>
    <a class="state-sm" href="https://secretdesire.co/florida-orlando-bodyrubs">Orlando</a>

    <p class="state-xl">Georgia</p>
    <a class="state-sm" href="https://secretdesire.co/georgia-atlanta-bodyrubs">Atlanta</a>

    <p class="state-xl">Illinois</p>
    <a class="state-sm" href="https://secretdesire.co/illinois-chicago-bodyrubs">Chicago</a>

    <p class="state-xl">Indiana</p>
    <a class="state-sm" href="https://secretdesire.co/indiana-indianapolis-bodyrubs">Indianapolis</a>

    <p class="state-xl">Kentucky</p>
    <a class="state-sm" href="https://secretdesire.co/kentucky-louisville-bodyrubs">Louisville</a>

    <p class="state-xl">Maryland</p>
    <a class="state-sm" href="https://secretdesire.co/maryland-baltimore-bodyrubs">Baltimore</a>

    <p class="state-xl">Massachusetts</p>
    <a class="state-sm" href="https://secretdesire.co/massachusetts-boston-bodyrubs">Boston</a>

    <p class="state-xl">Michigan</p>
    <a class="state-sm" href="https://secretdesire.co/michigan-detroit-bodyrubs">Detroit</a>

    <p class="state-xl">Minnesota</p>
    <a class="state-sm" href="https://secretdesire.co/minnesota-minneapolis-bodyrubs">Minneapolis</a>

    <p class="state-xl">Missouri</p>
    <a class="state-sm" href="https://secretdesire.co/missouri-kansascity-bodyrubs">Kansas City</a>
    <a class="state-sm" href="https://secretdesire.co/missouri-saintlouis-bodyrubs">St Louis</a>

    <p class="state-xl">Nebraska</p>													
																									
					<a class="state-sm" href="https://secretdesire.co/nebraska-omaha-bodyrubs">Omaha</a>																				
																									
																									
					</div>																				
<div class="col-md-6">																									
																						
																									
											<p class="state-xl">Nevada</p>														
																									
					<a class="state-sm" href="https://secretdesire.co/nevada-lasvegas-bodyrubs">Las Vegas</a>																				
																									
																									
																									
																									
											<p class="state-xl">Ohio</p>														
																									
					<a class="state-sm" href="https://secretdesire.co/ohio-cleveland-bodyrubs">Cleveland</a>																				
					<a class="state-sm" href="https://secretdesire.co/ohio-columbus-bodyrubs">Columbus</a>																				
																									
																									
																									
											<p class="state-xl">Oklahoma</p>														
																									
					<a class="state-sm" href="https://secretdesire.co/oklahoma-oklahomacity-bodyrubs">Oklahoma City</a>																				
					<a class="state-sm" href="https://secretdesire.co/oklahoma-tulsa-bodyrubs">Tulsa</a>																				
																									
																									
																<p class="state-xl">Oregon</p>									
																									
					<a class="state-sm" href="https://secretdesire.co/oregon-portland-bodyrubs">Portland</a>																				
																									
																									
														<p class="state-xl">Pennsylvania</p>											
																									
					<a class="state-sm" href="https://secretdesire.co/pennsylvania-philadelphia-bodyrubs">Philadelphia</a>																				
																									
																									
																<p class="state-xl">Tennessee</p>									
																									
					<a class="state-sm" href="https://secretdesire.co/tennessee-memphis-bodyrubs">Memphis</a>																				
					<a class="state-sm" href="https://secretdesire.co/tennessee-nashville-bodyrubs">Nashville</a>																				
																									
																									
											<p class="state-xl">Texas</p>														
																									
					<a class="state-sm" href="https://secretdesire.co/texas-austin-bodyrubs">Austin</a>																				
					<a class="state-sm" href="https://secretdesire.co/texas-dallas-bodyrubs">Dallas</a>																				
					<a class="state-sm" href="https://secretdesire.co/texas-houston-bodyrubs">Houston</a>																				
																									
																									
													<p class="state-xl">Utah</p>												
																									
					<a class="state-sm" href="https://secretdesire.co/utah-saltlakecity-bodyrubs">Salt Lake City</a>																				
																									
																									
														<p class="state-xl">Washington</p>											
																									
					<a class="state-sm" href="https://secretdesire.co/washington-seattle-bodyrubs">Seattle</a>																				
																									
																									
												<p class="state-xl">Washington</p>													
																									
					<a class="state-sm" href="https://secretdesire.co/wisconsin-milwaukee-bodyrubs">Milwaukee</a>																				
																									
																									
													<p class="state-xl">New York</p>												
																									
					<a class="state-sm" href="https://secretdesire.co/newyork-newyorkcity-bodyrubs">New York City</a>																				
																									
																									
														<p class="state-xl">North Carolina</p>											
																									
					<a class="state-sm" href="https://secretdesire.co/northcarolina-charlotte-bodyrubs">Charlotte</a>																				
					<a class="state-sm" href="https://secretdesire.co/northcarolina-raleigh-bodyrubs">Raleigh</a>																				
																									
																									
														<p class="state-xl">Washington DC</p>											
																									
					<a class="state-sm" href="https://secretdesire.co/washingtondc-washingtondc-bodyrubs">Washington DC</a>		
    </div>
  </div>


			<br>


<?php


/* 
			<h2>Adult Escort & Erotic Massage Near Me</h2>
<p class="info-text">Erotic massages attract clients in a variety of ways. If you are looking for the best erotic massage near me, independent massage therapists have something to surprise you. Private masseuses offer almost all known types of massages. They know exactly how to relax clients and give them maximum pleasure.</p>
<p class="info-text">All types of massage are available on Rubfox! The range of services - from traditional classical and medical procedures to exotic and rare. You can order a massage from masseuses by contacting them as specified in the bullet. They are happy to be at your service 24 hours a day, 7 days a week.</p>
<p class="info-text">Independent massage therapists, men and women, take all necessary measures for a safe and comfortable massage session! Call them now to taste that splendid pleasure!</p>
*/
?>


<?php


/*
 
<h2>Popular Massage & Escort Services</h2>
<p class="info-text">When calling for any massage or escort service, you can be absolutely sure: you wil remember this session as one of the most interesting erotic adventures. The biggest disadvantage of visiting massage salons is no privacy and the way you should get to the place, wait, and then, relaxed and warmed, get home again. </p>
<p class="info-text">Private massage therapists are the best variant. They provide a great opportunity for a wonderful rest - from maximum comfort to complete anonymity.</p>
<h2>Benefits Of Picking Service From Our Bullet Page</h2>
<p class="info-text">All kinds of erotic massage are available to give you the highest pleasure.
Here you can find a masseuse in your area, so as not to go far.
Choosing a masseur is not a problem, there is a large number of certified therapists on Rubfox who perform quality massage at home. Pick a beautiful sexy girl of your taste who will bring you undeniable pleasure, help to relax, and fill you with new strength and energy.
<p class="info-text">The massage room is sterile, filled with a magic atmosphere.</p>
The procedure of ordering a service on this page is simple: choose a master and agree on an appointment.
And also, all masseuses have highly accessible prices.</p>
<h2>Where To Find An Escort Near Me?</h2>
<p class="info-text">Many beautiful ladies offer escort and elite leisure services. The years of experience allows them to professionally fulfill the desires of their respectable clients, delivering the greatest guaranteed pleasure. Feel free to ask for any kind of VIP leisure near you. Pick one of the perfect escort models from the bullet page according to your parameters in one click.</p>
<h2>Where Can I Get An Erotic Massage Near Me?</h2>
<p class="info-text">A high-quality erotic body massage is an easy solution to all your physical and emotional problems. A charming girl will come to your place and will give you an unforgettable erotic massage and complete relaxation with her gentle accurate touches.
For a man, a massage is a very rewarding procedure. You will be in the hands of a wonderful, slender, and beautiful masseuse, you’ve individually chosen. Her velvet and delicate skin will touch your hot body to pleasure a client in any way possible.
Traditionally, erotic massages are, sexually stimulation that copies the sexual act by partners who are advanced in massage techniques.</p>
<h2>Where Can I Find The Best Sensual Massage Near Me?</h2>
<p class="info-text">The sensual massages are different from typical massage sessions. Here, the main intention of the masseuse is to avail the utmost pleasure to the customer. The massages are maintained with the fully naked masseuse’s and client’s body. This type of sensual stimulation helps to reach sexual excitement and orgasm and has a positive impact on clients’ health.
Even health experts also recommended opting for sensual body massages at regular intervals. This pleasant procedure enhances the flow of blood to different parts of the body, mainly to the reproductive parts.</p>
<h2>Where Can I Get A Nuru Massage Near Me?</h2>
The word NURU comes from Japanese and translates to “smooth.” The technique requires a naked masseuse to rub and slide over the client's naked body. Your therapist will use a special body lotion, tasteless and smooth. During the massage, participants will try to get as much physical contact as possible. The charming skilled girl will use her entire body to touch your back, face, and intimate places. Strong tactile sensations work and help relieve stress.</p>
<p class="info-text">Where to get a high-quality nuru massage near me? Trust in the caring hands of a sweet private masseuse, who you can discuss all of your concerns with.</p>
<h2>How To Find Adult Massage Near Me?</h2>
<p class="info-text">An adult massage is an incredibly enjoyable experience. And if you live under stress every day, have a lack of sex, and are willing to experience strong and vivid sensations, this kind of exotic massage near me should definitely be tried.
An adult massage is based on a classic massage that is made by the naked body. The form of this adult massage affects the entire body from the head to the toes. When a professional masseuse with appetite shapes is masterfully rubbing your naked body it makes the procedure especially pleasant. Ask the girl to add a little oil with pheromones to enchant the effect.</p>
<h2>Where Can I Get A Sexual Massage Near Me?</h2>
<p class="info-text">Sexual massage has a spiritual and even healing component. Both Tantra and ancient Taoism related sexual energy to life force and developed massage techniques meant to promote sexual and spiritual health. The sex massage near me usually includes many different types of procedure and is recommended both for individuals and people in relationships. The professional masseuses can help you to remove such psychosexual issues as erectile dysfunction, premature ejaculation, and anorgasmia.</p>
If you’re looking for a sexual massage from an independent massage-therapist, it’s important to understand what your masseuse’s specialty is.
<h2>Types of Sexual Massage</h2>
<p class="info-text">Sexual massage may also be called erotic massage or sensual massage.
A happy ending massage also refers to a traditional full body massage that ends with a sex act designed to cause the client to orgasm.
You can order tantric massage, nuru massage.
Lingam and yoni massage is an intimate procedure that is always in demand.</p>
<h2>Where To Find Strippers Near Me?</h2>
<p class="info-text">A classic adult entertainment involves you looking at a beautifully moving girl and not able to somehow get closer to her tasty body. It’s like serving a hungry table and then taking everything away without giving it a try. Change the situation and call a stripper home.
Private striptize is a pleasure of the highest class: a pleasant atmosphere, no worries about confidentiality, and own rules, which can be agreed in advance.</p>
<h2>How To Order An Outcall Massage Near Me?</h2>
<p class="info-text">Erotic massage can is available at your massesuse’s or your place. Do you want to plunge into the sea of unforgettable pleasures and complete relaxation from erotic massage, especially if your status does not allow you to come to the salon? Any kind of erotic masseuse will come to your place and bring your ecstasy.</p>
<p class="info-text">The offers are very diverse: attractive women of different ages perform not only all types of massage, but also striptize programs, and much more at your request. They are able to find the most sensitive points on your body, their pleasant and gentle touches will delight you, turning your body into a continuous erogenous zone.
How to find a good outcall massage therapist near me? To do this, you need to agree on the price and time of visiting your chosen therapist:</p>
<ul>
<li>Pick a massage specialist.</li>
<li>Review provided services.</li>
<li>Make a call!</li>
</ul>

*/
?>



<h2>Discover Local Wellness & Relaxation Services</h2>
<p class="info-text">Experience personalized wellness treatments from certified independent practitioners in your area. Our network of professionals offers a wide range of therapeutic services designed to help you unwind and rejuvenate. Each specialist brings years of experience and expertise to provide customized sessions tailored to your comfort and preferences.</p>

<h2>Available Services & Benefits</h2>
<p class="info-text">Connect with qualified practitioners who deliver professional services in a private, comfortable setting. Avoid the hassle of busy wellness centers - instead, enjoy a personalized experience with carefully selected therapists who prioritize your comfort and relaxation needs.</p>

<h2>Why Choose Independent Practitioners?</h2>
<p class="info-text">Our platform features verified professionals who maintain the highest standards of service:</p>
<p class="info-text">
- Flexible scheduling options<br>
- Private, comfortable settings<br>
- Personalized attention<br>
- Professional, certified specialists<br>
- Convenient booking process<br>
- Competitive rates
</p>

<h2>Finding the Right Specialist</h2>
<p class="info-text">Browse through detailed profiles of qualified practitioners to find someone who matches your specific needs. Each profile includes:</p>
<p class="info-text">
- Professional qualifications<br>
- Areas of expertise<br>
- Service descriptions<br>
- Availability<br>
- Location details<br>
- Client testimonials
</p>

<h2>Specialized Treatment Options</h2>
<p class="info-text">Discover a variety of therapeutic approaches:</p>
<p class="info-text">
- Traditional relaxation techniques<br>
- Swedish techniques<br>
- Deep tissue work<br>
- Asian-inspired methods<br>
- Contemporary wellness practices<br>
- Customized therapeutic sessions
</p>

<h2>Mobile Services Available</h2>
<p class="info-text">Can't make it to a practitioner's location? Many specialists offer mobile services, bringing their expertise directly to you. This convenient option allows you to:</p>
<p class="info-text">
- Save time on travel<br>
- Enjoy services in familiar surroundings<br>
- Maintain privacy<br>
- Relax immediately after your session<br>
- Schedule at your convenience
</p>


<h2>Find Your Ideal Wellness Experience</h2>
<p class="info-text">Whether you're seeking stress relief, relaxation, or therapeutic benefits, our network of independent practitioners can help you achieve your wellness goals. Contact a specialist today to begin your journey to relaxation and renewal.</p>

<h2>Schedule Your Session</h2>
<p class="info-text">Ready to experience professional wellness services? Simply:</p>
<p class="info-text">
1. Select your preferred specialist<br>
2. Review their service menu<br>
3. Make contact to discuss your needs<br>
4. Book your appointment
</p>

<p class="info-text">Start your wellness journey today with certified professionals who prioritize your comfort and satisfaction.</p>


<!-- <p>Rubfox is a website that provides a safe and secure platform for people seeking and providing body rubs and escorts. Providers offer a wide variety of services, from traditional massage therapies to more exotic offerings such as tantric massages. Their selection of experienced professionals ensures that customers can find the perfect match for their needs without any hassle or worry about safety. </p>

<p>Rubfox offers detailed profiles on each escort so that clients can get an accurate idea of what they are getting before contacting them. This helps to ensure there are no surprises when it comes time to meet in person, making Rubfox one of the most reliable sources for finding quality companionship with minimal effort required on the part of its users. Additionally, all payments made through Rubfox are securely encrypted so Providers don’t have to worry about their financial information being stolen or misused in any way.</p> 

<p>Overall, Rubfox is one of the best sites available when it comes to finding professional body rubs and escorts at reasonable prices without sacrificing security or privacy concerns along the way. The range and quality offered by this website make it easy for anyone looking for some private pleasure or companionship from qualified professionals who know exactly how satisfy even your deepest desires!</p> -->








 
<!-- <div class="popup" style="  display: none;
  position: fixed;
  bottom: 10px;
  left: 10px;
  z-index: 9999;
  background-color: #342336;
  color: #F8F9FA;
  border: 2px solid #342336;
  padding: 20px;
  width: 300px;
  font-size: 16px;
  line-height: 1.5;
  font-family: Arial, sans-serif;
  border-radius: 10px;">
  <div class="content">
  <p>Not enough providers of body rubs in your city? Fill out a short form and we will send information to providers that it is time to travel to your city.</p>
  <p>The form is <a rel="nofollow" target="_blank" href="https://docs.google.com/forms/d/1byQg2m8xArLFqYZncscLRN3fAT2ngeBpuCkQXORojcA/edit">here</a>.</p>
  <div class="close" style="">&times;</div>
</div>
  <div class="message">Not enough providers of body rubs in your city?</div>
</div> -->


<!--  <script type="application/javascript" src="https://syndication.realsrv.com/splash.php?idzone=4373852&capping=0"></script>

 <script type="application/javascript">
(function() {

    //version 1.0.0

    var adConfig = {
    "ads_host": "a.realsrv.com",
    "syndication_host": "syndication.realsrv.com",
    "idzone": 4151590,
    "popup_fallback": false,
    "popup_force": false,
    "chrome_enabled": true,
    "new_tab": false,
    "frequency_period": 180,
    "frequency_count": 1,
    "trigger_method": 3,
    "trigger_class": "",
    "only_inline": false,
    "t_venor": false
};

    window.document.querySelectorAll||(document.querySelectorAll=document.body.querySelectorAll=Object.querySelectorAll=function(o,e,t,i,n){var r=document,c=r.createStyleSheet();for(n=r.all,e=[],t=(o=o.replace(/\[for\b/gi,"[htmlFor").split(",")).length;t--;){for(c.addRule(o[t],"k:v"),i=n.length;i--;)n[i].currentStyle.k&&e.push(n[i]);c.removeRule(0)}return e});var popMagic={version:"1.0.0",cookie_name:"",url:"",config:{},open_count:0,top:null,browser:null,venor_loaded:!1,venor:!1,configTpl:{ads_host:"",syndication_host:"",idzone:"",frequency_period:720,frequency_count:1,trigger_method:1,trigger_class:"",popup_force:!1,popup_fallback:!1,chrome_enabled:!0,new_tab:!1,cat:"",tags:"",el:"",sub:"",sub2:"",sub3:"",only_inline:!1,t_venor:!1,cookieconsent:!0},init:function(o){if(void 0!==o.idzone&&o.idzone){for(var e in this.configTpl)this.configTpl.hasOwnProperty(e)&&(void 0!==o[e]?this.config[e]=o[e]:this.config[e]=this.configTpl[e]);void 0!==this.config.idzone&&""!==this.config.idzone&&(!0!==this.config.only_inline&&this.loadHosted(),this.addEventToElement(window,"load",this.preparePop))}},getCountFromCookie:function(){if(!this.config.cookieconsent)return 0;var o=popMagic.getCookie(popMagic.cookie_name),e=void 0===o?0:parseInt(o);return isNaN(e)&&(e=0),e},shouldShow:function(){if(popMagic.open_count>=popMagic.config.frequency_count)return!1;var o=popMagic.getCountFromCookie();return popMagic.open_count=o,!(o>=popMagic.config.frequency_count)},venorShouldShow:function(){return!popMagic.config.t_venor||popMagic.venor_loaded&&"0"===popMagic.venor},setAsOpened:function(){var o=1;o=0!==popMagic.open_count?popMagic.open_count+1:popMagic.getCountFromCookie()+1,popMagic.config.cookieconsent&&popMagic.setCookie(popMagic.cookie_name,o,popMagic.config.frequency_period)},loadHosted:function(){var o=document.createElement("script");for(var e in o.type="application/javascript",o.async=!0,o.src="//"+this.config.ads_host+"/popunder1000.js",o.id="popmagicldr",this.config)this.config.hasOwnProperty(e)&&"ads_host"!==e&&"syndication_host"!==e&&o.setAttribute("data-exo-"+e,this.config[e]);var t=document.getElementsByTagName("body").item(0);t.firstChild?t.insertBefore(o,t.firstChild):t.appendChild(o)},preparePop:function(){if("object"!=typeof exoJsPop101||!exoJsPop101.hasOwnProperty("add")){if(popMagic.top=self,popMagic.top!==self)try{top.document.location.toString()&&(popMagic.top=top)}catch(o){}if(popMagic.cookie_name="zone-cap-"+popMagic.config.idzone,popMagic.config.t_venor&&popMagic.shouldShow()){var o=new XMLHttpRequest;o.onreadystatechange=function(){o.readyState==XMLHttpRequest.DONE&&(popMagic.venor_loaded=!0,200==o.status&&(popMagic.venor=o.responseText))};var e="https:"!==document.location.protocol&&"http:"!==document.location.protocol?"https:":document.location.protocol;o.open("GET",e+"//"+popMagic.config.syndication_host+"/venor.php",!0);try{o.send()}catch(o){popMagic.venor_loaded=!0}}if(popMagic.buildUrl(),popMagic.browser=popMagic.browserDetector.detectBrowser(navigator.userAgent),popMagic.config.chrome_enabled||"chrome"!==popMagic.browser.name&&"crios"!==popMagic.browser.name){var t=popMagic.getPopMethod(popMagic.browser);popMagic.addEvent("click",t)}}},getPopMethod:function(o){return popMagic.config.popup_force?popMagic.methods.popup:popMagic.config.popup_fallback&&"chrome"===o.name&&o.version>=68&&!o.isMobile?popMagic.methods.popup:o.isMobile?popMagic.methods.default:"chrome"===o.name?popMagic.methods.chromeTab:popMagic.methods.default},buildUrl:function(){var o="https:"!==document.location.protocol&&"http:"!==document.location.protocol?"https:":document.location.protocol,e=top===self?document.URL:document.referrer,t={type:"inline",name:"popMagic",ver:this.version};this.url=o+"//"+this.config.syndication_host+"/splash.php?cat="+this.config.cat+"&idzone="+this.config.idzone+"&type=8&p="+encodeURIComponent(e)+"&sub="+this.config.sub+(""!==this.config.sub2?"&sub2="+this.config.sub2:"")+(""!==this.config.sub3?"&sub3="+this.config.sub3:"")+"&block=1&el="+this.config.el+"&tags="+this.config.tags+"&cookieconsent="+this.config.cookieconsent+"&scr_info="+function(o){var e=o.type+"|"+o.name+"|"+o.ver;return encodeURIComponent(btoa(e))}(t)},addEventToElement:function(o,e,t){o.addEventListener?o.addEventListener(e,t,!1):o.attachEvent?(o["e"+e+t]=t,o[e+t]=function(){o["e"+e+t](window.event)},o.attachEvent("on"+e,o[e+t])):o["on"+e]=o["e"+e+t]},addEvent:function(o,e){var t;if("3"!=popMagic.config.trigger_method)if("2"!=popMagic.config.trigger_method||""==popMagic.config.trigger_method)popMagic.addEventToElement(document,o,e);else{var i,n=[];i=-1===popMagic.config.trigger_class.indexOf(",")?popMagic.config.trigger_class.split(" "):popMagic.config.trigger_class.replace(/\s/g,"").split(",");for(var r=0;r<i.length;r++)""!==i[r]&&n.push("."+i[r]);for(t=document.querySelectorAll(n.join(", ")),r=0;r<t.length;r++)popMagic.addEventToElement(t[r],o,e)}else for(t=document.querySelectorAll("a"),r=0;r<t.length;r++)popMagic.addEventToElement(t[r],o,e)},setCookie:function(o,e,t){if(!this.config.cookieconsent)return!1;t=parseInt(t,10);var i=new Date;i.setMinutes(i.getMinutes()+parseInt(t));var n=encodeURIComponent(e)+"; expires="+i.toUTCString()+"; path=/";document.cookie=o+"="+n},getCookie:function(o){if(!this.config.cookieconsent)return!1;var e,t,i,n=document.cookie.split(";");for(e=0;e<n.length;e++)if(t=n[e].substr(0,n[e].indexOf("=")),i=n[e].substr(n[e].indexOf("=")+1),(t=t.replace(/^\s+|\s+$/g,""))===o)return decodeURIComponent(i)},randStr:function(o,e){for(var t="",i=e||"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",n=0;n<o;n++)t+=i.charAt(Math.floor(Math.random()*i.length));return t},isValidUserEvent:function(o){return!!("isTrusted"in o&&o.isTrusted&&"ie"!==popMagic.browser.name&&"safari"!==popMagic.browser.name)||0!=o.screenX&&0!=o.screenY},isValidHref:function(o){if(void 0===o||""==o)return!1;return!/\s?javascript\s?:/i.test(o)},findLinkToOpen:function(o){var e=o,t=!1;try{for(var i=0;i<20&&!e.getAttribute("href")&&e!==document&&"html"!==e.nodeName.toLowerCase();)e=e.parentNode,i++;var n=e.getAttribute("target");n&&-1!==n.indexOf("_blank")||(t=e.getAttribute("href"))}catch(o){}return popMagic.isValidHref(t)||(t=!1),t||window.location.href},getPuId:function(){return"ok_"+Math.floor(89999999*Math.random()+1e7)},browserDetector:{browserDefinitions:[["firefox",/Firefox\/([0-9.]+)(?:\s|$)/],["opera",/Opera\/([0-9.]+)(?:\s|$)/],["opera",/OPR\/([0-9.]+)(:?\s|$)$/],["edge",/Edg(?:e|)\/([0-9._]+)/],["ie",/Trident\/7\.0.*rv:([0-9.]+)\).*Gecko$/],["ie",/MSIE\s([0-9.]+);.*Trident\/[4-7].0/],["ie",/MSIE\s(7\.0)/],["safari",/Version\/([0-9._]+).*Safari/],["chrome",/(?!Chrom.*Edg(?:e|))Chrom(?:e|ium)\/([0-9.]+)(:?\s|$)/],["chrome",/(?!Chrom.*OPR)Chrom(?:e|ium)\/([0-9.]+)(:?\s|$)/],["bb10",/BB10;\sTouch.*Version\/([0-9.]+)/],["android",/Android\s([0-9.]+)/],["ios",/Version\/([0-9._]+).*Mobile.*Safari.*/],["yandexbrowser",/YaBrowser\/([0-9._]+)/],["crios",/CriOS\/([0-9.]+)(:?\s|$)/]],detectBrowser:function(o){var e=o.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile|WebOS|Windows Phone/i);for(var t in this.browserDefinitions){var i=this.browserDefinitions[t];if(i[1].test(o)){var n=i[1].exec(o),r=n&&n[1].split(/[._]/).slice(0,3),c=Array.prototype.slice.call(r,1).join("")||"0";return r&&r.length<3&&Array.prototype.push.apply(r,1===r.length?[0,0]:[0]),{name:i[0],version:r.join("."),versionNumber:parseFloat(r[0]+"."+c),isMobile:e}}}return{name:"other",version:"1.0",versionNumber:1,isMobile:e}}},methods:{default:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;var e=o.target||o.srcElement,t=popMagic.findLinkToOpen(e);return window.open(t,"_blank"),popMagic.setAsOpened(),popMagic.top.document.location=popMagic.url,void 0!==o.preventDefault&&(o.preventDefault(),o.stopPropagation()),!0},chromeTab:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;if(void 0===o.preventDefault)return!0;o.preventDefault(),o.stopPropagation();var e=top.window.document.createElement("a"),t=o.target||o.srcElement;e.href=popMagic.findLinkToOpen(t),document.getElementsByTagName("body")[0].appendChild(e);var i=new MouseEvent("click",{bubbles:!0,cancelable:!0,view:window,screenX:0,screenY:0,clientX:0,clientY:0,ctrlKey:!0,altKey:!1,shiftKey:!1,metaKey:!0,button:0});i.preventDefault=void 0,e.dispatchEvent(i),e.parentNode.removeChild(e),window.open(popMagic.url,"_self"),popMagic.setAsOpened()},popup:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;var e="";if(popMagic.config.popup_fallback&&!popMagic.config.popup_force){var t=Math.max(Math.round(.8*window.innerHeight),300);e="menubar=1,resizable=1,width="+Math.max(Math.round(.7*window.innerWidth),300)+",height="+t+",top="+(window.screenY+100)+",left="+(window.screenX+100)}var i=document.location.href,n=window.open(i,popMagic.getPuId(),e);setTimeout(function(){n.location.href=popMagic.url},200),popMagic.setAsOpened(),void 0!==o.preventDefault&&(o.preventDefault(),o.stopPropagation())}}};
    popMagic.init(adConfig);
})();
</script> -->



<!-- work popunder <script type="application/javascript">
(function() {

    //version 1.0.0

    var adConfig = {
    "ads_host": "a.pemsrv.com",
    "syndication_host": "s.pemsrv.com",
    "idzone": 5030682,
    "popup_fallback": false,
    "popup_force": false,
    "chrome_enabled": true,
    "new_tab": false,
    "frequency_period": 720,
    "frequency_count": 1,
    "trigger_method": 3,
    "trigger_class": "",
    "trigger_delay": 0,
    "only_inline": false,
    "t_venor": false
};

window.document.querySelectorAll||(document.querySelectorAll=document.body.querySelectorAll=Object.querySelectorAll=function o(e,i,t,n,r){var c=document,a=c.createStyleSheet();for(r=c.all,i=[],t=(e=e.replace(/\[for\b/gi,"[htmlFor").split(",")).length;t--;){for(a.addRule(e[t],"k:v"),n=r.length;n--;)r[n].currentStyle.k&&i.push(r[n]);a.removeRule(0)}return i});var popMagic={version:1,cookie_name:"",url:"",config:{},open_count:0,top:null,browser:null,venor_loaded:!1,venor:!1,configTpl:{ads_host:"",syndication_host:"",idzone:"",frequency_period:720,frequency_count:1,trigger_method:1,trigger_class:"",popup_force:!1,popup_fallback:!1,chrome_enabled:!0,new_tab:!1,cat:"",tags:"",el:"",sub:"",sub2:"",sub3:"",only_inline:!1,t_venor:!1,trigger_delay:0,cookieconsent:!0},init:function(o){if(void 0!==o.idzone&&o.idzone){void 0===o.customTargeting&&(o.customTargeting=[]),window.customTargeting=o.customTargeting||null;var e=Object.keys(o.customTargeting).filter(function(o){return o.search("ex_")>=0});for(var i in e.length&&e.forEach((function(o){return this.configTpl[o]=null}).bind(this)),this.configTpl)Object.prototype.hasOwnProperty.call(this.configTpl,i)&&(void 0!==o[i]?this.config[i]=o[i]:this.config[i]=this.configTpl[i]);void 0!==this.config.idzone&&""!==this.config.idzone&&(!0!==this.config.only_inline&&this.loadHosted(),this.addEventToElement(window,"load",this.preparePop))}},getCountFromCookie:function(){if(!this.config.cookieconsent)return 0;var o=popMagic.getCookie(popMagic.cookie_name),e=void 0===o?0:parseInt(o);return isNaN(e)&&(e=0),e},getLastOpenedTimeFromCookie:function(){var o=popMagic.getCookie(popMagic.cookie_name),e=null;if(void 0!==o){var i=o.split(";")[1];e=i>0?parseInt(i):0}return isNaN(e)&&(e=null),e},shouldShow:function(){if(popMagic.open_count>=popMagic.config.frequency_count)return!1;var o=popMagic.getCountFromCookie();let e=popMagic.getLastOpenedTimeFromCookie(),i=Math.floor(Date.now()/1e3),t=e+popMagic.config.trigger_delay;return(!e||!(t>i))&&(popMagic.open_count=o,!(o>=popMagic.config.frequency_count))},venorShouldShow:function(){return!popMagic.config.t_venor||popMagic.venor_loaded&&"0"===popMagic.venor},setAsOpened:function(){var o=1;o=0!==popMagic.open_count?popMagic.open_count+1:popMagic.getCountFromCookie()+1;let e=Math.floor(Date.now()/1e3);popMagic.config.cookieconsent&&popMagic.setCookie(popMagic.cookie_name,`${o};${e}`,popMagic.config.frequency_period)},loadHosted:function(){var o=document.createElement("script");for(var e in o.type="application/javascript",o.async=!0,o.src="//"+this.config.ads_host+"/popunder1000.js",o.id="popmagicldr",this.config)Object.prototype.hasOwnProperty.call(this.config,e)&&"ads_host"!==e&&"syndication_host"!==e&&o.setAttribute("data-exo-"+e,this.config[e]);var i=document.getElementsByTagName("body").item(0);i.firstChild?i.insertBefore(o,i.firstChild):i.appendChild(o)},preparePop:function(){if(!("object"==typeof exoJsPop101&&Object.prototype.hasOwnProperty.call(exoJsPop101,"add"))){if(popMagic.top=self,popMagic.top!==self)try{top.document.location.toString()&&(popMagic.top=top)}catch(o){}if(popMagic.cookie_name="zone-cap-"+popMagic.config.idzone,popMagic.config.t_venor&&popMagic.shouldShow()){var e=new XMLHttpRequest;e.onreadystatechange=function(){e.readyState==XMLHttpRequest.DONE&&(popMagic.venor_loaded=!0,200==e.status&&(popMagic.venor=e.responseText))};var i="https:"!==document.location.protocol&&"http:"!==document.location.protocol?"https:":document.location.protocol;e.open("GET",i+"//"+popMagic.config.syndication_host+"/venor.php",!0);try{e.send()}catch(t){popMagic.venor_loaded=!0}}if(popMagic.buildUrl(),popMagic.browser=popMagic.browserDetector.detectBrowser(navigator.userAgent),popMagic.config.chrome_enabled||"chrome"!==popMagic.browser.name&&"crios"!==popMagic.browser.name){var n=popMagic.getPopMethod(popMagic.browser);popMagic.addEvent("click",n)}}},getPopMethod:function(o){return popMagic.config.popup_force||popMagic.config.popup_fallback&&"chrome"===o.name&&o.version>=68&&!o.isMobile?popMagic.methods.popup:o.isMobile?popMagic.methods.default:"chrome"===o.name?popMagic.methods.chromeTab:popMagic.methods.default},buildUrl:function(){var o,e,i="https:"!==document.location.protocol&&"http:"!==document.location.protocol?"https:":document.location.protocol,t=top===self?document.URL:document.referrer,n={type:"inline",name:"popMagic",ver:this.version},r="";customTargeting&&Object.keys(customTargeting).length&&("object"==typeof customTargeting?Object.keys(customTargeting):customTargeting).forEach(function(e){"object"==typeof customTargeting?o=customTargeting[e]:Array.isArray(customTargeting)&&(o=scriptEl.getAttribute(e)),r+=`&${e.replace("data-exo-","")}=${o}`}),this.url=i+"//"+this.config.syndication_host+"/splash.php?cat="+this.config.cat+"&idzone="+this.config.idzone+"&type=8&p="+encodeURIComponent(t)+"&sub="+this.config.sub+(""!==this.config.sub2?"&sub2="+this.config.sub2:"")+(""!==this.config.sub3?"&sub3="+this.config.sub3:"")+"&block=1&el="+this.config.el+"&tags="+this.config.tags+"&cookieconsent="+this.config.cookieconsent+"&scr_info="+encodeURIComponent(btoa((e=n).type+"|"+e.name+"|"+e.ver))+r},addEventToElement:function(o,e,i){o.addEventListener?o.addEventListener(e,i,!1):o.attachEvent?(o["e"+e+i]=i,o[e+i]=function(){o["e"+e+i](window.event)},o.attachEvent("on"+e,o[e+i])):o["on"+e]=o["e"+e+i]},addEvent:function(o,e){var i;if("3"==popMagic.config.trigger_method){for(r=0,i=document.querySelectorAll("a");r<i.length;r++)popMagic.addEventToElement(i[r],o,e);return}if("2"==popMagic.config.trigger_method&&""!=popMagic.config.trigger_method){var t,n=[];t=-1===popMagic.config.trigger_class.indexOf(",")?popMagic.config.trigger_class.split(" "):popMagic.config.trigger_class.replace(/\s/g,"").split(",");for(var r=0;r<t.length;r++)""!==t[r]&&n.push("."+t[r]);for(r=0,i=document.querySelectorAll(n.join(", "));r<i.length;r++)popMagic.addEventToElement(i[r],o,e);return}popMagic.addEventToElement(document,o,e)},setCookie:function(o,e,i){if(!this.config.cookieconsent)return!1;i=parseInt(i,10);var t=new Date;t.setMinutes(t.getMinutes()+parseInt(i));var n=encodeURIComponent(e)+"; expires="+t.toUTCString()+"; path=/";document.cookie=o+"="+n},getCookie:function(o){if(!this.config.cookieconsent)return!1;var e,i,t,n=document.cookie.split(";");for(e=0;e<n.length;e++)if(i=n[e].substr(0,n[e].indexOf("=")),t=n[e].substr(n[e].indexOf("=")+1),(i=i.replace(/^\s+|\s+$/g,""))===o)return decodeURIComponent(t)},randStr:function(o,e){for(var i="",t=e||"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",n=0;n<o;n++)i+=t.charAt(Math.floor(Math.random()*t.length));return i},isValidUserEvent:function(o){return"isTrusted"in o&&!!o.isTrusted&&"ie"!==popMagic.browser.name&&"safari"!==popMagic.browser.name||0!=o.screenX&&0!=o.screenY},isValidHref:function(o){return void 0!==o&&""!=o&&!/\s?javascript\s?:/i.test(o)},findLinkToOpen:function(o){var e=o,i=!1;try{for(var t=0;t<20&&!e.getAttribute("href")&&e!==document&&"html"!==e.nodeName.toLowerCase();)e=e.parentNode,t++;var n=e.getAttribute("target");n&&-1!==n.indexOf("_blank")||(i=e.getAttribute("href"))}catch(r){}return popMagic.isValidHref(i)||(i=!1),i||window.location.href},getPuId:function(){return"ok_"+Math.floor(89999999*Math.random()+1e7)},browserDetector:{browserDefinitions:[["firefox",/Firefox\/([0-9.]+)(?:\s|$)/],["opera",/Opera\/([0-9.]+)(?:\s|$)/],["opera",/OPR\/([0-9.]+)(:?\s|$)$/],["edge",/Edg(?:e|)\/([0-9._]+)/],["ie",/Trident\/7\.0.*rv:([0-9.]+)\).*Gecko$/],["ie",/MSIE\s([0-9.]+);.*Trident\/[4-7].0/],["ie",/MSIE\s(7\.0)/],["safari",/Version\/([0-9._]+).*Safari/],["chrome",/(?!Chrom.*Edg(?:e|))Chrom(?:e|ium)\/([0-9.]+)(:?\s|$)/],["chrome",/(?!Chrom.*OPR)Chrom(?:e|ium)\/([0-9.]+)(:?\s|$)/],["bb10",/BB10;\sTouch.*Version\/([0-9.]+)/],["android",/Android\s([0-9.]+)/],["ios",/Version\/([0-9._]+).*Mobile.*Safari.*/],["yandexbrowser",/YaBrowser\/([0-9._]+)/],["crios",/CriOS\/([0-9.]+)(:?\s|$)/]],detectBrowser:function(o){var e=o.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile|WebOS|Windows Phone/i);for(var i in this.browserDefinitions){var t=this.browserDefinitions[i];if(t[1].test(o)){var n=t[1].exec(o),r=n&&n[1].split(/[._]/).slice(0,3),c=Array.prototype.slice.call(r,1).join("")||"0";return r&&r.length<3&&Array.prototype.push.apply(r,1===r.length?[0,0]:[0]),{name:t[0],version:r.join("."),versionNumber:parseFloat(r[0]+"."+c),isMobile:e}}}return{name:"other",version:"1.0",versionNumber:1,isMobile:e}}},methods:{default:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;var e=o.target||o.srcElement,i=popMagic.findLinkToOpen(e);return window.open(i,"_blank"),popMagic.setAsOpened(),popMagic.top.document.location=popMagic.url,void 0!==o.preventDefault&&(o.preventDefault(),o.stopPropagation()),!0},chromeTab:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o)||void 0===o.preventDefault)return!0;o.preventDefault(),o.stopPropagation();var e=top.window.document.createElement("a"),i=o.target||o.srcElement;e.href=popMagic.findLinkToOpen(i),document.getElementsByTagName("body")[0].appendChild(e);var t=new MouseEvent("click",{bubbles:!0,cancelable:!0,view:window,screenX:0,screenY:0,clientX:0,clientY:0,ctrlKey:!0,altKey:!1,shiftKey:!1,metaKey:!0,button:0});t.preventDefault=void 0,e.dispatchEvent(t),e.parentNode.removeChild(e),window.open(popMagic.url,"_self"),popMagic.setAsOpened()},popup:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;var e="";if(popMagic.config.popup_fallback&&!popMagic.config.popup_force){var i,t=Math.max(Math.round(.8*window.innerHeight),300),n=Math.max(Math.round(.7*window.innerWidth),300);e="menubar=1,resizable=1,width="+n+",height="+t+",top="+(window.screenY+100)+",left="+(window.screenX+100)}var r=document.location.href,c=window.open(r,popMagic.getPuId(),e);setTimeout(function(){c.location.href=popMagic.url},200),popMagic.setAsOpened(),void 0!==o.preventDefault&&(o.preventDefault(),o.stopPropagation())}}};    popMagic.init(adConfig);
})();


</script> -->



		</div>
	</div>
@endsection

@agent()
@else
	@section ( "scripts" )
		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
	@endsection
@endagent
@section ( "styles-footer" )
    <link href="{{ asset( 'new-index.css' ) }}" rel="stylesheet">
@endsection