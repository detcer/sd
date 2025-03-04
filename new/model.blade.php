@extends( 'layouts.public' )
@section ( "styles" )
    <link rel="stylesheet" type="text/css" href="/model.css?v=12">
    <link rel="stylesheet" type="text/css" href="/css/slider.css">

@endsection
@section ( "agentstyles" )
    <link rel="stylesheet" type="text/css" href="/model.css">
@endsection
@section( 'content' )
    <main>
          <nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
  <ol class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemtype="https://schema.org/Thing" itemprop="item" href="{{url('')}}">
        <span itemprop="name" style="color: #212529">Home</span></a>
        <span class="after"></span>
       <meta itemprop="position" content="1" />
    </li>
    
    @php
        // Выведем отладочную информацию для проверки
        // echo "<!-- State slug: " . $model['state_slug'] . " -->";
        // echo "<!-- City slug: " . $model['cityName'][0]->slug . " -->";
        
        // Формируем строку для проверки
        $stateCitySlug = strtolower($model['state_slug']) . '-' . strtolower($model['cityName'][0]->slug);
        // echo "<!-- Full slug to check: " . $stateCitySlug . " -->";
        
        // Список разрешенных комбинаций
        $allowedStateCity = [
            'california-losangeles',
            'california-sandiego'
        ];
        
        // Проверяем, соответствует ли строка одному из разрешенных значений
        $showStateCity = false;
        foreach ($allowedStateCity as $allowed) {
            if ($stateCitySlug == $allowed || strpos($stateCitySlug, $allowed) === 0) {
                $showStateCity = true;
                break;
            }
        }
        
        // Альтернативная проверка: есть ли эти города/штаты в текущих данных
        if (strtolower($model['state_slug']) == 'california' && 
            (strtolower($model['cityName'][0]->slug) == 'losangeles' || 
             strtolower($model['cityName'][0]->slug) == 'sandiego')) {
            $showStateCity = true;
        }
    @endphp
    
    @if($showStateCity)
      <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemtype="https://schema.org/Thing" itemprop="item" href="{{url($model['state_slug'].'-'.$model['cityName'][0]->slug)}}">
        <span itemprop="name" style="color: #212529">{{$model['cityName'][0]->name}}, {{$model['state_name']}}</span></a>
                <span class="after"></span>
          <meta itemprop="position" content="2" />
      </li>
    @endif
    
    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a itemtype="https://schema.org/Thing" itemprop="item" href="{{url($model['state_slug'].'-'.$model['cityName'][0]->slug). '-'.$service['slug']}}">
        <span itemprop="name" class="left" style="color: #212529"><!-- {{$model['cityName'][0]->name}}  -->{{$service['name']}}</span></a>
        <span class="after"></span>
        <meta itemprop="position" content="{{$showStateCity ? '3' : '2'}}" />    
    </li>
      
    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name" class="left" style="color: #212529"> {{$model['name']}}</span>
        <meta itemprop="position" content="{{$showStateCity ? '4' : '3'}}" />
    </li>
  </ol>
</div>
</nav>

 <section class="title-box">
        <div class="container">
            <h1 class="title-cat" style="font-size: 1.5rem;">{{ $model['name'] . " Profile in " . $cityes . ", " . $model['phone']}}</h1>
            </div>
      </section>

        <section class="card-portfolio">
            <div class="container containerTheme bg-white py-4">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">

                        <div class="card-photo-container">
                            <div class="row">
@foreach($model['src_foto'] as $key => $foto)
    @mobile
    @if ( $key < 2 )
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
        <div class="card-photo-box text-center mb-3">
            <img style="width: 976; height: 549;"  class=" w-100 photos" src="{{ asset('storage')  }}/{{$foto}}" alt="{{ $key == 0 ? $model['name'] . ', ' . $model['age'] . ' years old, ' . $model['phone'] : '' }}">
        </div>
    </div>
    @endif
    @else
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
        <div class="card-photo-box text-center mb-3">
            <img style="width: 976; height: 549;" class=" w-100 photos" src="{{ asset('storage')  }}/{{$foto}}" alt="{{ $key == 0 ? $model['name'] . ', ' . $model['age'] . ' years old, ' . $model['phone'] : '' }}">
        </div>
    </div>
    @endmobile
@endforeach
                                <p class="col-12" style="font-size: small; color: #8E157C;">Click a photo to enlarge</p>
                                <div class="col-12">
                                    <div class="discript">
                                        <p style="    word-break: break-word;">
                                            {{$model['title']}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="discript">
                                        <p style="    word-break: break-word;  white-space: pre-line;">
                                            {{$model['description']}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @mobile
                    @else
                    @include( 'partials.model.right-panel' )
                    @endmobile
                </div>
                @mobile
                @else
                @include( 'partials.model.footer-buttons' )
                @endmobile
            </div>
        </section>
    </main>
@endsection

@agent()
@else
    @section ( "scripts" )
        <script src="{{ asset( 'model.js?v=12' ) }}" defer></script>
        <script src="{{ asset( '/js/slider.js' ) }}" defer></script>

    
    @endsection
    @section ( "modals" )
        @include( 'partials.modals.complain' )
        @include( 'partials.modals.review' )
    @endsection
@endagent
@section ( "styles-footer" )
    <link href="{{ asset( 'new-index.css?v=12' ) }}" rel="stylesheet">

   <!--  <script type="text/javascript">
        // Get the necessary elements
const photos = document.querySelector('.photos');
const body = document.querySelector('body');

// Set initial variables
let prevScrollpos = window.pageYOffset;
const navHeight = 60; // Change this to match your nav's height
let navAdded = false;

// Function to add the new nav
function addNav() {
  // Create the new nav element
  const newNav = document.createElement('nav');
  newNav.style.position = 'fixed';
  newNav.style.top = '0';
  newNav.style.left = '0';
  newNav.style.width = '100%';
  newNav.style.height = `${navHeight}px`;
  newNav.style.display = 'flex';
  newNav.style.alignItems = 'center';
  newNav.style.justifyContent = 'space-between';
  newNav.style.padding = '0 20px';
  newNav.style.background = '#fff';
  newNav.style.zIndex = '9999'; // Add a high z-index value to make the nav appear on top

  // Create the photo element
  const photo = document.createElement('img');
  photo.src = photos.src;
  photo.style.width = '40px';
  photo.style.height = '40px';
  photo.style.borderRadius = '50%';

  // Add the photo to the new nav
  newNav.appendChild(photo);

  // Add the new nav to the page
  body.insertBefore(newNav, body.firstChild);
}

// Event listener for scrolling
window.addEventListener('scroll', () => {
  const currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    // User is scrolling up
    if (navAdded && currentScrollPos <= 420) {
      // Remove the nav if it's already been added and the user has scrolled back up past 50px
      body.removeChild(body.firstChild);
      navAdded = false;
    }
  } else {
    // User is scrolling down
    if (!navAdded && currentScrollPos > 450) {
      // Add the nav if it hasn't been added yet and the user has scrolled down past 30px
      addNav();
      navAdded = true;
    }
  }
  prevScrollpos = currentScrollPos;
});

    </script> -->

<!-- <script type="application/javascript">
(function() {

    //version 1.0.0

    var adConfig = {
    "ads_host": "a.pemsrv.com",
    "syndication_host": "s.pemsrv.com",
    "idzone": 5024370,
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



    
@endsection

<!-- <script type="application/javascript" src="https://syndication.realsrv.com/splash.php?idzone=4384250&capping=0"></script> -->