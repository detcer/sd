<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
    <link rel="icon" href="#">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div class="wrapper" id="wrapper">
    @include('head.header')
    <main>

        <section class="card-portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="card-photo-container">
                            <div class="row">
                                @foreach($model['src_foto'] as $foto)
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="card-photo-box">
                                            <img src="{{ asset('storage')  }}/{{$foto}}" alt="portfolio">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <div class="discript">
                                        <p>
                                            {{$model['description']}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="card-info-contaiener">
                            @if($userType == 'provider')
                                <div class="card-button">
                                    <div class="button-send-wrap">
                                        <a href="{{route('newModel')}}">Post new ad</a>
                                    </div>
                                    <div class="button-send-wrap">
                                        <a href="#">Buy credits</a>
                                    </div>
                                </div>
                            @endif
                            <div class="card-text">
                                <h1 class="card-text-title">{{$model['title']}}</h1>
                                <div class="card-text-short">
                                    <div class="box-text">
                                        <p class="card-info-title calendar">Publication date:</p>
                                        <p class="card-info-text">{{ date('m/d/Y', strtotime($model['created_at'])) }}</p>
                                    </div>
                                    <div class="box-text">
                                        <p class="card-info-title map">Location:</p>
                                        <p class="card-info-text">город и штат не сделали, </p>
                                    </div>
                                    <div class="box-text">
                                        <p class="card-info-title">District:</p>
                                        <p class="card-info-text">{{$model['district']}}</p>
                                    </div>
                                    <div class="box-text">
                                        <p class="card-info-title">Servises:</p>
                                        <div>

                                            @if($model['bodyrubs'])    <p class="card-info-text">  Body Rubs             </p> @endif
                                            @if($model['dommination'])  <p class="card-info-text">  Domination & Fetish   </p> @endif
                                            @if($model['femaleescort'])<p class="card-info-text">  Female Escorts        </p> @endif
                                            @if($model['maleescort'])  <p class="card-info-text">  Male Escorts          </p> @endif
                                            @if($model['strippers'])    <p class="card-info-text">  Strippers             </p> @endif
                                            @if($model['transsexual'])  <p class="card-info-text">  Transsexual           </p> @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Providers name:</p>
                                    <p class="card-info-text"></p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Age:</p>
                                    <p class="card-info-text">{{$model['age']}}</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Hair color:</p>
                                    <p class="card-info-text">{{$model['hair_colorName']}}</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Hair length:</p>
                                    <p class="card-info-text">{{$model['hair_lengthsName']}}</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Ethnicity:</p>
                                    <p class="card-info-text">{{$model['params_ethnicitiesName']}}</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Height:</p>
                                    <p class="card-info-text">{{$model['height']}}</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Breast size:</p>
                                    <p class="card-info-text">{{$model['brest_size']}}</p>
                                </div>
                                <h2 class="card-title-sm">Incall</h2>

                                <div class="box-text">
                                    <p class="card-info-title">30 minnutes</p>
                                    <p class="card-info-text">цена откуда?</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">1 hour</p>
                                    <p class="card-info-text">цена откуда?</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">2 hour</p>
                                    <p class="card-info-text">цена откуда?</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">24 hour</p>
                                    <p class="card-info-text">цена откуда?</p>
                                </div>
                                <h2 class="card-title-sm">Outcall</h2>
                                <div class="box-text">
                                    <p class="card-info-title">30 minnutes</p>
                                    <p class="card-info-text"></p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">1 hour</p>
                                    <p class="card-info-text"></p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">2 hour</p>
                                    <p class="card-info-text"></p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">24 hour</p>
                                    <p class="card-info-text"></p>
                                </div>
                                <h2 class="card-title-sm">Currency</h2>
                                <div class="box-text">
                                    <p class="card-info-title">Currency:</p>
                                    <div>
                                        @if($model['USD'])  <p class="card-info-text">  USD </p> @endif
                                        @if($model['GBP'])  <p class="card-info-text">  GBP </p> @endif
                                        @if($model['EUR'])  <p class="card-info-text">  EUR </p> @endif

                                    </div>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Payment accepted:</p>
                                    <div>

                                        @if($model['currency_visa'])              <p class="card-info-text">  VISA </p>  @endif
                                        @if($model['currency_mastercard'])        <p class="card-info-text">  MasterCard </p>  @endif
                                        @if($model['currency_ameerican_express']) <p class="card-info-text">  American Express </p>  @endif
                                        @if($model['currency_discover'])          <p class="card-info-text">  Discover </p>  @endif
                                        @if($model['currency_cash'])              <p class="card-info-text">  Cash </p>  @endif
                                        @if($model['currency_btc'])               <p class="card-info-text">  Bitcoin </p>  @endif
                                        @if($model['currency_other'])             <p class="card-info-text">  Other </p>  @endif

                                    </div>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Publication date:</p>
                                    <div class="card-info-icon">
                                        @if($model['social_fb'])
                                            <a href="{{$model['social_fb']}}">
                                                <img src="{{asset('img/icon/fb-dark.svg')}}" alt="icon">
                                            </a>
                                        @endif
                                        @if($model['social_twitter'])
                                            <a href="{{$model['social_twitter']}}">
                                                <img src="{{asset('img/icon/tw-dark.svg')}}" alt="icon">
                                            </a>
                                        @endif
                                        @if($model['social_instagam'])
                                            <a href="{{$model['social_instagam']}}">
                                                <img src="{{asset('img/icon/in-dark.svg')}}" alt="icon">
                                            </a>
                                        @endif
                                        @if($model['social_google_plus'])
                                            <a href="{{$model['social_google_plus']}}">
                                                <img src="{{asset('img/icon/go-dark.svg')}}" alt="icon">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="card-tab">
            <div class="container">
                <div class="card-tab-container">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link phon" href="tel:{{$model['phone']}}">Phone Number</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link like" href="#">Favorite</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link sms" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link flag" href="#">Report ad</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="messages-container">
                                <h3 class="messages-title">Reviews <span class="name-girls"></span></h3>
                                <div class="messages-box">
                                    <div class="messages-info">
                                        <div class="mes-like">
												<span>
													<img src="img/icon/Star.svg" alt="icon">
												</span>
                                            <span>
													<img src="img/icon/Star.svg" alt="icon">
												</span>
                                            <span>
													<img src="img/icon/Star.svg" alt="icon">
												</span>
                                            <span>
													<img src="img/icon/Star.svg" alt="icon">
												</span>
                                            <span>
													<img src="img/icon/Star0.5.svg" alt="icon">
												</span>
                                            <span class="balls">4.5</span>
                                        </div>
                                        <div class="mes-date">
												<span>
													<img src="img/icon/calendar-sm.svg" class="calendar" alt="icon">
												</span>
                                            <span class="date">
													April 9th
												</span>
                                        </div>
                                    </div>
                                    <p class="messages-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                                <div class="messages-box">
                                    <div class="messages-info">
                                        <div class="mes-like">
													<span>
														<img src="img/icon/Star.svg" alt="icon">
													</span>
                                            <span>
														<img src="img/icon/Star.svg" alt="icon">
													</span>
                                            <span>
														<img src="img/icon/Star.svg" alt="icon">
													</span>
                                            <span>
														<img src="img/icon/Star.svg" alt="icon">
													</span>
                                            <span>
														<img src="img/icon/Star0.5.svg" alt="icon">
													</span>
                                            <span class="balls">4.5</span>
                                        </div>
                                        <div class="mes-date">
													<span>
														<img src="img/icon/calendar-sm.svg" class="calendar" alt="icon">
													</span>
                                            <span class="date">
														April 9th
													</span>
                                        </div>
                                    </div>
                                    <p class="messages-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                                <div class="review-block">
                                    <a href="#" class="review">Add review</a>
                                    <p class="review-text">Review</p>
                                </div>
                                <form action="" method="POST" class="balls-form">
                                    <div class="input-range-box">
                                        <input type="range" class="form-control-range" id="formControlRange" value="20" min="0" max="100" required>
                                        <div class="balls-range">
                                            <p>Awful</p>
                                            <p>Normal</p>
                                            <p>Excellent</p>
                                        </div>
                                    </div>
                                    <div class="button-send-wrap">
                                        <button type="submit" href="#">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="reviews">
            <div class="container">
                <div class="messages-container">
                    <h2 class="title-xl">My reviews</h2>
                    <h3 class="messages-title">Reviews <span class="name-girls">Mary</span></h3>
                    <div class="messages-box">
                        <div class="messages-info">
                            <div class="mes-like">
									<span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                <span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                <span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                <span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                <span>
										<img src="{{asset('img')}}/icon/Star0.5.svg" alt="icon">
									</span>
                                <span class="balls">4.5</span>
                            </div>
                            <div class="mes-date">
									<span>
										<img src="{{asset('img')}}/icon/calendar-sm.svg" class="calendar" alt="icon">
									</span>
                                <span class="date">
										April 9th
									</span>
                            </div>
                        </div>
                        <p class="messages-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </p>
                    </div>
                    <h3 class="messages-title">Reviews <span class="name-girls">Mary</span></h3>
                    <div class="messages-box">
                        <div class="messages-info">
                            <div class="mes-like">
									<span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                <span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                <span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                <span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                <span>
										<img src="{{asset('img')}}/icon/Star0.5.svg" alt="icon">
									</span>
                                <span class="balls">4.5</span>
                            </div>
                            <div class="mes-date">
									<span>
										<img src="{{asset('img')}}/icon/calendar-sm.svg" class="calendar" alt="icon">
									</span>
                                <span class="date">
										April 9th
									</span>
                            </div>
                        </div>
                        <p class="messages-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
        </section>


    </main>

@include('footer.footer')
