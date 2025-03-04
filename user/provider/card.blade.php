@include('head.head')

<body>
<div class="wrapper" id="wrapper">
    @include('head.header')
    <main>

        <section class="card-portfolio ">
            <div class="container containerTheme">
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
                                        <p style="    word-break: break-word;">
                                            {{$model['title']}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="discript">
                                        <p style="    word-break: break-word;">
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
                                        <a href="{{route('new-model')}}">Post new ad</a>
                                    </div>
                                    <div class="button-send-wrap">
                                        <a href="{{ route('pageMoneyAdd') }}">Buy credits</a>
                                    </div>
                                </div>
                            @endif
                            <div class="card-text">
                                <div class="card-text-short">
                                    <div class="box-text">
                                        <p class="card-info-title calendar">Publication date:</p>
                                        <p class="card-info-text">{{ date('m/d/Y', strtotime($model['created_at'])) }}</p>
                                    </div>
                                    <div class="box-text">
                                        <p class="card-info-title map">Location:</p>
                                        <div>

                                            <p style="font-size: 1.125rem;">
                                                <b>
                                                    {{ $model['state_name']}}
                                                </b>
                                            </p>
                                            <p class="card-info-text">
                                                @php
                                                    $cityes = '';

                                                    foreach($model['cityName'] as $city){
                                                        $cityes .= $city->name.', ';
                                                    }

                                                    $cityes = rtrim(trim($cityes), ',');
                                                @endphp
                                                {{$cityes}}
                                            </p>

                                        </div>

                                    </div>
                                    <div class="box-text">
                                        <p class="card-info-title">Districtsssssssssss:</p>
                                        <p class="card-info-text">{{$model['district']}}</p>
                                    </div>
                                    <div class="box-text">
                                        <p class="card-info-title">Services:</p>
                                        <div>
                                            @php
                                                $services = '';

                                                if($model['bodyrubs']){     $services .= 'Body Rubs,          ';     }
                                                if($model['dommination']){   $services .= 'Domination & Fetish,';     }
                                                if($model['femaleescort']){ $services .= 'Female Escorts,     ';     }
                                                if($model['maleescort']){   $services .= 'Male Escorts,       ';     }
                                                if($model['strippers']){     $services .= 'Strippers,          ';     }
                                                if($model['transsexual']){   $services .= 'Transsexual         ';     }

                                                $services = rtrim(trim($services), ',');
                                            @endphp

                                            <p class="card-info-text">
                                                {{$services}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Name:</p>
                                    <p class="card-info-text">{{$model['name']}}</p>
                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Age:</p>
                                    <p class="card-info-text">{{$model['age']}}</p>
                                </div>

                                @if($model['hair_colorName'] != 'N\A')
                                    <div class="box-text">
                                        <p class="card-info-title">Hair color:</p>
                                        <p class="card-info-text">{{$model['hair_colorName']}}</p>
                                    </div>
                                @endif


                                @if($model['hair_lengthsName'] != 'N\A')
                                    <div class="box-text">
                                        <p class="card-info-title">Hair length:</p>
                                        <p class="card-info-text">{{$model['hair_lengthsName']}}</p>
                                    </div>
                                @endif

                                <div class="box-text">
                                    <p class="card-info-title">Ethnicity:</p>
                                    <p class="card-info-text">{{$model['params_ethnicitiesName']}}</p>
                                </div>
                                @if($model['height'] != 'N\A')
                                    <div class="box-text">
                                        <p class="card-info-title">Height:</p>
                                        <p class="card-info-text">{{$model['height']}}</p>
                                    </div>
                                @endif
                                @if($model['brest_size'] != 'N\A')
                                    <div class="box-text">
                                        <p class="card-info-title">Breast size:</p>
                                        <p class="card-info-text">{{$model['brest_size']}}</p>
                                    </div>
                                @endif
                                @if($model['incall_30m'] != 0 || $model['incall_1h'] != 0 || $model['incall_2h'] != 0 || $model['incall_24h'] != 0)
                                    <h2 class="card-title-sm">Incall</h2>
                                @endif
                                @if($model['incall_30m'] != 0)
                                    <div class="box-text">
                                        <p class="card-info-title">30 minutes</p>
                                        <p class="card-info-text">{{$model['incall_30m']}}</p>
                                    </div>
                                @endif
                                @if($model['incall_1h'] != 0)
                                    <div class="box-text">
                                        <p class="card-info-title">1 hour</p>
                                        <p class="card-info-text">{{$model['incall_1h']}}</p>
                                    </div>
                                @endif
                                @if($model['incall_2h'] != 0)
                                    <div class="box-text">
                                        <p class="card-info-title">2 hours</p>
                                        <p class="card-info-text">{{$model['incall_2h']}}</p>
                                    </div>
                                @endif
                                @if($model['incall_24h'] != 0)
                                    <div class="box-text">
                                        <p class="card-info-title">24 hours</p>
                                        <p class="card-info-text">{{$model['incall_24h']}}</p>
                                    </div>
                                @endif
                                @if($model['outcall_30m'] != 0 || $model['outcall_1h'] != 0 || $model['outcall_2h'] != 0 || $model['outcall_24h'] != 0)
                                    <h2 class="card-title-sm">Outcall</h2>
                                @endif

                                @if($model['outcall_30m'] != 0)
                                    <div class="box-text">
                                        <p class="card-info-title">30 minutes</p>
                                        <p class="card-info-text">{{$model['outcall_30m']}}</p>
                                    </div>
                                @endif
                                @if($model['outcall_1h'] != 0)
                                    <div class="box-text">
                                        <p class="card-info-title">1 hour</p>
                                        <p class="card-info-text">{{$model['outcall_1h']}}</p>
                                    </div>
                                @endif
                                @if($model['outcall_2h'] != 0)
                                    <div class="box-text">
                                        <p class="card-info-title">2 hours</p>
                                        <p class="card-info-text">{{$model['outcall_2h']}}</p>
                                    </div>
                                @endif
                                @if($model['outcall_24h'] != 0)
                                    <div class="box-text">
                                        <p class="card-info-title">24 hours</p>
                                        <p class="card-info-text">{{$model['outcall_24h']}}</p>
                                    </div>
                                @endif
                                <h2 class="card-title-sm">Currency</h2>
                                <div class="box-text">
                                    <p class="card-info-title">Currency:</p>

                                    @php
                                        $typeCurrency = '';

                                        if($model['USD']){ $typeCurrency .= 'USD,';     }
                                        if($model['GBP']){ $typeCurrency .= 'GBP,';     }
                                        if($model['EUR']){ $typeCurrency .= 'EUR,';     }

                                        $typeCurrency = rtrim(trim($typeCurrency), ',');
                                    @endphp

                                    <p class="card-info-text">  {{$typeCurrency}} </p>
                                    <span>&nbsp;</span>

                                </div>
                                <div class="box-text">
                                    <p class="card-info-title" style="min-width: 170px;">Payment accepted:</p>
                                    <div style="    display: flex;
    flex-wrap: wrap;
    justify-content: center;">

                                        @php
                                            $typePayments = '';

                                            if($model['currency_visa']){                $typePayments .= 'VISA,';     }
                                            if($model['currency_mastercard']){          $typePayments .= 'MasterCard,';     }
                                            if($model['currency_ameerican_express']){   $typePayments .= 'American Express,';     }
                                            if($model['currency_discover']){            $typePayments .= 'Discover,';     }
                                            if($model['currency_cash']){                $typePayments .= 'Cash,';     }
                                            if($model['currency_btc']){                 $typePayments .= 'Bitcoin,';     }
                                            if($model['currency_other']){               $typePayments .= $model['custom_currency'];     }

                                            $typePayments = rtrim(trim($typePayments), ',');
                                        @endphp

                                            <span class="card-info-text">  {{$typePayments}} </span>
                                            <span>&nbsp;</span>

                                    </div>
                                </div>
                                @if($model['social_fb'] || $model['social_twitter'] || $model['social_instagam'] || $model['social_google_plus'])
                                    <div class="box-text" style="    margin-top: 18px;     align-items: baseline;">
                                        <p class="card-info-title">Find me here:</p>

                                        <div>

                                            @if($model['social_site'])

                                                <div class="box-text">
                                                    <p class="card-info-text"><a href="{{$model['social_site']}}">{{parse_url($model['social_site'])['host']}}</a></p>

                                                </div>
                                            @endif
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="card-tab-container">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link phon phone__btn" href="">Phone Number</a>
                                    <a class="nav-link phon phone__call disabled" href="tel:{{$model['phone']}}">{{$model['phone']}}</a>
                                </li>
                                    <li class="nav-item">
                                        <a class="nav-link like to__favorite @if($favorites == 1) added @endif" data-id="{{$model['id']}}" href>Favourite</a>
                                    </li>
                                <li class="nav-item">
                                    <a class="sms reviews__link  reviews__toggle @if(isset($_GET['comment']) && $_GET['comment'] == 'true') active @endif" href="#pills-contact">Reviews</a>
                                </li>
                                <li class="nav-item" >
                                    <a class="nav-link flag showModalComplain" data-toggle="modal" data-target="#userComplaint" data-id="{{$model['user_id']}}" href="#">Report ad</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade @if(isset($_GET['comment']) && $_GET['comment'] == 'true') active show @endif" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    @if(Auth::user())
                                        <div class="messages-container">
                                            <h2 class="title-xl">
                                                @if($userType == 'provider')
                                                    My reviews
                                                @else
                                                    Reviews
                                                @endif
                                            </h2>
                                            @foreach($comment as $item)

                                                <h3 class="messages-title">Reviews by <a href="{{route('client',['id' => $item['autors_id'] ]) }}" class="name-girls">{{$item['autors_name']}}</a></h3>
                                                <div class="messages-box">
                                                    <div class="messages-info">
                                                        <div class="mes-like">

                                                            @for($i = 1; $i <= $item['ratting']; $i++)

                                                                <span>
                                                                        <img src="{{asset('img')}}/icon/Star.svg" alt="icon">
                                                                </span>
                                                            @endfor
                                                                {{--
        Короче что тут происходит.. Какогото хуя из базы начало приходить число с плавающей точкой в типе данных - строка
        Нужно было срочняк пофиксить. В условии мы умножаем строку на 1, и получаем тип данных - int либо float
        потом проверям, что там за тип данных
    --}}
                                                                @if(is_float( rtrim( $item['ratting'] *1 ) * 1))
                                                                <span>
                                                                    <img src="{{asset('img')}}/icon/Star0.5.svg" alt="icon">
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="mes-date">
                                                            <span>
                                                                <img src="{{asset('img/icon/calendar-sm.svg')}}" class="calendar" alt="icon">
                                                            </span>
                                                            <span class="date">
                                                                    {{ date('m/d/Y',strtotime($item['created_at']))}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p class="messages-text">
                                                        {{$item['text']}}
                                                    </p>
                                                </div>
                                                <div class="response__container">
                                                    @if(isset($item['answer'][0]->answer_for_comment_id))
                                                        <div style="margin-left: 30px">
                                                            <h3 class="messages-title">{{$responseUser}} responded
                                                                {{--                                                <a href="{{route('viewModel',['id' => $item->answer[0]->autor ])}}" class="name-girls">{{ $item->answer[0]->model_name }}</a>--}}
                                                                <span class="date">
                                                                     - ({{date('m.d.Y',strtotime( $item['answer'][0]->created_at))}})
                                                                </span>
                                                            </h3>
                                                            <div class="messages-box">
                                                                <p class="messages-text">
                                                                    {{$item['answer'][0]->text}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @elseif(!isset($item['answer'][0]->comment_for) && $model['user_id'] == Auth::user()->id)
                                                        @if($showFormAnsever)
                                                            <button class="themeBTN-outline toggle__response__block"
                                                                    data-id="{{$item['comments_id']}}" data-user_id="{{$item['userTargetId']}}" data-model_name="{{$item['userTargetName']}}"
                                                                    data-autor="{{$item['autors_id']}}" data-autor_name="{{$item['autors_name']}}" data-route="{{route('saveComment')}}"
                                                            >Respond to review</button>
                                                        @endif
                                                    @endif
                                                </div>

                                            @endforeach

                                            @if($userType == 'client')

                                                <button class="themeBTN-outline" id="toggleFormReviews" >Add review</button>

                                                <form action="{{route('saveComment')}}" method="POST" class="balls-form" style="display:none;" id="formComment">
                                                    @csrf
                                                    <div class="input-box">
                                                        <input type="hidden" value="{{$providerId}}"   name="comment_for_user_id">
                                                        <input type="text" class="input-disabled" name="text" minlength="4" required style="    max-width: 500px;
">
                                                    </div>

                                                    <div class="input-range-box wrapRateCustom">
                                                        <div class="wrapRateCustom--1">
                                                            <input type="range" class="form-control-range" id="formControlRange" value="4.5" step="0.5" min="1" max="5" required name="ratting">
                                                            <div class="balls-range">
                                                                <p>Awful</p>
                                                                <p>Normal</p>
                                                                <p>Excellent</p>
                                                            </div>
                                                        </div>

                                                        <div class="dimacicRateWrap">
                                                            <span class="ratingStar">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="icon">
                                                            </span>
                                                            <span class="ratingStar">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="icon">
                                                            </span>
                                                            <span class="ratingStar">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="icon">
                                                            </span>
                                                            <span class="ratingStar">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="icon">
                                                            </span>
                                                            <span class="ratingStar ratingStarAfter">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="icon">
                                                            </span>

                                                            <div style="margin: 0 0 0 10px" id="countRating">
                                                                4.5
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="button-send-wrap">
                                                        <button type="submit" href="#">Submit</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    @else
                                        <p>
                                            <br>
                                        </p>
                                        <h2 class="text-center">
                                            <b>
                                                Only registered users can watch and leave reviews
                                            </b>
                                        </h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>

@include('footer.footer')
