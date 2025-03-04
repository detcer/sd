<header class="bg-main bg-main">

    <nav class="navbar container navbar-expand-lg navbar-dark bg-main">
        <a class="navbar-brand py-0 brandy mr-auto" href="{{ url('/') }}">
            <img src="/img/logo.png" class="w-100" alt="Secret Desire Independent Escorts">
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item mb-2 mt-2 mb-lg-0 mt-lg-0 text-center">
            <a class="nav-linke" href="/">Home</a>
        </li>     
        <li class="nav-item mb-2 mt-2 mb-lg-0 mt-lg-0 text-center">
            <a class="nav-linke" href="{{route('services')}}">Services</a>
        </li>
        @guest
        <li class="nav-item mb-2 mb-lg-0 text-center">
        <a class="nav-linke" href="#authModal" data-toggle="modal" data-target="#authModal">
            Log in / Sign up
        </a>
        </li>
        @else
        <li class="nav-item mb-2 mb-lg-0 text-center">
        <a class="nav-linke" href="{{ route( 'home' ) }}">
            My account
        </a>
        </li>
        <li class="nav-item mb-2 mb-lg-0 text-center">
        <a class="nav-linke" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </a>
        </li>
    @endguest
        <li class="nav-item mb-2 mb-lg-0 text-center">
    <a class="nav-linke" href="{{ route( 'page_Info' ) }}">
        Info
    </a>
        </li>    
            <li class="nav-item mb-2 mb-lg-0 text-center">
    <a class="nav-linke" href="https://blog.secretdesire.co/">
        Blog
    </a>
        </li>
<!--         <?php
if ($_SERVER['REQUEST_URI'] === '/') {
    echo '<li class="nav-item mb-2 mb-lg-0 text-center">
              <a class="nav-linke" href="https://www.zodertracker.com/cd7bdf1e-dd8e-4bf3-9a5a-260b101d325b?campid={cID}&varid={crID}&device={device}&geo={geo_country}&cost={actual_cost}&tag={conversions_tracking}" rel="nofollow">
                  MEET&FUCK
              </a>
          </li>';
}
?> -->

    </ul>
</div>

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
  border-radius: 10px;"> -->
<!--   <div class="content">
  <p>Not enough providers of body rubs in your city? Fill out a short form and we will send information to providers that it is time to travel to your city.</p>
  <p>The form is <a rel="nofollow" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSfijBOkjG_wDP7ic0u6qivKHU-GZkrMVLOSVsCChvJZ4RpqBQ/viewform?usp=sf_link" style="color: white; text-decoration: underline;">here</a>.</p>
  <div class="close" style="">&times;</div>
</div>
  <div class="message">Not enough providers of body rubs in your city? Read more...</div>
</div> -->


<!--   <div class="content">
  <p>Create ad and verify profile to get more clients. <a href="https://secretdesire.co/?utm_medium=verified&utm_source=verified&utm_campaign=verified" style="color: white; text-decoration: underline;">Get Verified</a>. </p>
  <div class="close" style="">&times;</div>
</div>
  <div class="message">Create ad and verify profile to get more clients. <a href="https://secretdesire.co/?utm_medium=verified&utm_source=verified&utm_campaign=verified" style="color: white; text-decoration: underline;">Get Verified</a>. </div>

</div> -->

<div class="popup1" style="display: none;
  position: fixed;
  bottom: -300px; /* Initially off-screen */
  left: 10px;
  z-index: 99999; /* Increased z-index */
  background-color: #342336;
  color: #F8F9FA;
  border: 2px solid #342336;
  padding: 20px;
  width: 300px;
  font-size: 16px;
  line-height: 1.5;
  font-family: Arial, sans-serif;
  border-radius: 10px;
  opacity: 0; /* Initially hidden */
  ">
  <div class="content">
    <p>Create ad and verify profile to get more clients. <a href="https://secretdesire.co/?utm_medium=verified&utm_source=verified&utm_campaign=verified" style="color: white; text-decoration: underline;">Get Verified</a>. </p>
  </div>
</div>



</nav>


<!-- 
<nav class="bg-main">
<div class="container">
<div class="row">
<div class="col-md-6 col-12 text-center">
<a class="navbar-brand py-0" href="{{ url('/') }}">
<img src="/img/logo.png" class="">
</a>
</div>
<div class="col-md-6">
<div class="d-flex header-wrapper justify-content-center">
<a class="nav-linke" href="/">
Home
</a>
@guest
<a class="nav-linke" href="#authModal" data-toggle="modal" data-target="#authModal">
Log in / Sign up
</a>
@else
<a class="nav-linke" href="{{ route( 'home' ) }}">
My account
</a>
<a class="nav-linke" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</a>
@endguest
<a class="nav-linke" href="{{ route( 'page_Info' ) }}">
Info
</a>
</div>
</div>
</div>
</div>
</nav> -->


<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Corporation",
        "name": "Secret Desire",
        "alternateName": "secretdesire",
        "url": "https://secretdesire.co/",
        "logo": "https://secretdesire.co/img/logo.png",
        "sameAs": "https://secretdesire.co/"
    }
    </script>

<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "fy4s2bnbpe");
</script>




<!-- <script type="text/javascript">
setTimeout(function() {
  var popup = document.querySelector('.popup1');
  popup.style.animation = 'bounce 0.5s'; // Apply the bounce animation
  popup.style.opacity = '1'; // Fade in
  popup.style.bottom = '10px'; // Ensure the modal stays visible with a 10px margin from the bottom
  popup.style.display = 'block';
}, 10000); // 10 seconds delay




</script> -->


</header>