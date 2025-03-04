<main>
    <section class="client-lk">
        <div class="container">
            <div class="client-container">
                <div class="logo-client">
                    <img src="{{asset('img/Group2.png')}}" alt="logo">
                </div>
                <p class="text-center blockNameClient">
                        <span>
                            Private Profile
                        </span>
                    <span>
                            of
                        </span>
                    <span>
                        {{Auth::user()->name}}
                        </span>
                </p>

                <p><br></p>
                <p>
                    <br>
                </p>
                <div class="client-buttons">
                    <a href="#" class="button-transparent">Balance: <span class="cash">{{$money}}$</span></a>
                    <a href="{{route('buyBumps')}}" class="button-transparent">Bumps: <span class="cash">{{$bumps}}</span></a>
                    <a href="{{ route('pageMoneyAdd')   }}" class="button-dark">Buy credits</a>
                    <a href="{{ route('new-model') }}" class="button-dark">Post Ad</a>
                    <a href="{{route('ProviderReviews',[ Auth::user()->id,'provider'])}}" class="button-dark">Reviews: <span class="reviews-col">{{$countComments}}</span></a>
                </div>
            </div>
        </div>
    </section>
    <div style="text-align: center;">
    <p >Customers trust verified photos more. Do you want more clients? Verify your photo!
To verify a photo, you need:</p>
<ol>
<li><b>1. Create an ad and upload your photos</b></li>
<li>2. Take a photo with a piece of paper on which it will be written: Secret Desire, the email address you signed up with, today's date.</li>
The photo should be in the mirror. Your face should be clearly visible so that it is not obscured by your phone or piece of paper.
<li>3. Take a photo with a legal ID (drivers license or passport).</li>
<li>4. Photo of the front of the document</li>
<li>5. Photo of the back of the document</li>
In the photo, the document must be completely visible, all its edges.
</ol>
<p>The photo must be clearly visible! Don't wear glasses or a hat. Do not edit photos, do not use filters.</p>
<p>Your photos are never shared with third parties.</p>
<br>
<p>Send your photos to <span style="font-weight: bold;">info@secretdesire.info</span></p>

<p>Please add our addresses info@secretdesire.info and support@secretdesire.co to your address book so our emails do not get caught in your spam folder <br> and you will be aware of the verification status.</p>
</div>
    @foreach ($ADS as $item)
        <section class="profile-short @if($item['rate'] == 'premium') prime @endif ">
            <div class="container">
                <div class="profile-short-container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-3">
                            <div class="profile-box">
                                <h3 class="colorFFF" style="word-break: break-word">{{$item['title']}}</h3>
                                <div class="box-text">
{{--                                    <span class="card-info-title"><strong>Servises:</strong></span>--}}
                                    <div>
                                        @php
                                            $services = '';

                                            if($item['bodyrubs']){     $services .= 'Body Rubs,          ';     }
                                            if($item['dommination']){   $services .= 'Domination & Fetish,';     }
                                            if($item['femaleescort']){ $services .= 'Female Escorts,     ';     }
                                            if($item['maleescort']){   $services .= 'Male Escorts,       ';     }
                                            if($item['strippers']){     $services .= 'Strippers,          ';     }
                                            if($item['transsexual']){   $services .= 'Transsexual         ';     }

                                            $services = rtrim(trim($services), ',');
                                        @endphp


                                        <span class=" colorFFF card-info-text"> {{$services}}</span>

                                    </div>
                                </div>
                                <p> {{$item['phone']}}</p>
                                <p><b> {{$item['state_name']}}, USA</b></p>
                                <p>
                                    @php
                                        $cityes = '';

                                        foreach($item['cityName'] as $city){
                                            $cityes .= $city->title.', ';
                                        }

                                        $cityes = rtrim(trim($cityes), ',');
                                    @endphp
                                        {{$cityes}}
                                </p>

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="profile-box">
                                <form method="POST" class="form-download-photo">
                                    <div class="download-img" style="display: flex; flex-wrap: wrap">
                                        @foreach($item['src_foto'] as $k => $item2)
                                            <div class="model__img">
                                                <span class="delete__button profile__action" data-action="delete_one" data-id="{{$item['id']}}" data-photo="{{$k}}"></span>
                                                <img src="{{ asset('storage')  }}/{{$item2}}" alt="phot">
                                            </div>
                                        @endforeach
                                </div>
                                <form action enctype="multipart/form-data" method="post">
                                    <input style="display: none" type="file" name="src_foto[]" id="file__input" multiple>
                                </form>
                                <button type="submit" class="button-dark upload__action" data-id="{{$item['id']}}" data-action="upload">Upload</button>
                                <a href="#" class="delet-button profile__action" data-id="{{$item['id']}}" data-action="delete_all">Delete all</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        <div class="profile-box">
                            <a href="{{route('modelEdit',['id' => $item['id'] ])}}" class="prifile-link">Edit listing</a>
                            <a href="{{route('viewModel',['slug' => $item['slug'] ])}}" class="prifile-link">View</a>
                            @if($item['status'] == 1)
                            <a href="#" class="prifile-link profile__action" data-id="{{$item['id']}}" data-action="hide_ad" id="hide_ad">Hide from clients</a>
                            @elseif($item['status'] == 0 && $item['block'] != 1)
                            <a href="#" class="prifile-link profile__action" data-id="{{$item['id']}}" data-action="show_ad">Show to clients</a>
                            @endif
                            <button class="prifile-link bumpMoveToTop text-center text-lg-left w-100" data-adsid="{{$item['id']}}" data-toggle="modal" data-target="#exampleModal">Move to top</button>
                            <a href="#" class="prifile-link profile__action" data-id="{{$item['id']}}" data-action="delete_ad">Delete Ad</a>
<!--                             @if($item['rate'] == 'premium')
                            <a href="#" class="prifile-link profile__action available">Available</a>

                            @endif -->
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="profile-box">
                            <p>Creating Date: <span class="date-prof-1 ">{{ date('m/d/Y', strtotime($item['created_at'])) }}</span></p>
                            <p>Bumped: <span class="date-prof-2">{{$item['lastTimeBamps']}}</span></p>
                            <p>Expired in: <span class="col-days">{{$item['dayFromLastBump']}} days</span></p>
                            @if($item['block'] == 1)
                                <a href="{{route('modelEdit',['id' => $item['id'] ])}}" class="button-dark">Renew Ad</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach;


</main>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color: white;" class="modal-title" id="exampleModalLabel">Bump</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <p class="h4 text-center">
                    Raise your ad in the TOP!
                </p>

                <div class="wrapModalInfo" id="BumpWrapModalInfo">
                    <p>Current account balance - <span class="themeColortext" id="BumpTopBalance"></span></p>
                    <p>Bump cost -               <span class="themeColortext" id="BumpTopCost"></span></p>
                    <p>Balance after purchase -  <span class="themeColortext" id="BumpTopBalanceAfter"></span></p>
                </div>

                <div class="alert text-center alert-success" role="alert" id="bumpSucc" style="display: none;">
                    Successfully! Thank you!
                </div>

                <div class="alert alert-danger" role="alert" id="bumpError" style="display:none;">
                    Something went wrong..
                    Please try again later.
                </div>


                <div class="alert alert-danger" role="alert" id="bumpPremiumNoResurs" style="display:none;">
                    Your free bump is not ready yet.
                    1 free bump per hour.
                </div>

                <div class="wrapModalInfo" id="BumpPremiumYes" style="display:none;">
                    <p>You can take advantage of the free bump!</p>
                    <!-- <p>Click the bump!</p> -->
                </div>



                <div id="modalBumpInfo" class="info" style="display: none;">
                    <div class="alert alert-danger" role="alert">
                        You don’t have enough money, please replenish your account
                    </div>
                    <br>
                    <p class="text-center">
                        <a href="{{ route('pageMoneyAdd')   }}" class="button-dark">Buy credits</a>
                    </p>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class=" themeBG btn btn-primary" id="actionBumpMoveToTop" data-ids="null">Save changes</button>
            </div>
        </div>
    </div>
</div>







