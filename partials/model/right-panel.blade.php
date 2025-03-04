
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
                                    <!-- <div class="box-text">
                                        <p class="card-info-title calendar">Publication date:</p>
                                        <p class="card-info-text">{{ date('m/d/Y', strtotime($model['created_at'])) }}</p>
                                    </div> -->
                                    <div class="box-text mb-2">
                                        <p class="card-info-title map" style="vertical-align: text-bottom;">Location:</p>
                                        <div class="card-info-text">
                                            <p class="mb-0" style="font-size: 1.125rem;vertical-align: text-bottom;">
                                                <b>
                                                    {{ $model['state_name']}}
                                                </b>
                                            </p>
                                            <p class="card-info-text mb-0">
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
                                        <p class="card-info-title">District:</p>
                                        <p class="card-info-text">{{$model['district']}}</p>
                                    </div>
                                    <div class="box-text">
                                        <p class="card-info-title">Services:</p>
                                            @php
                                                $services = '';

                                                if($model['bodyrubs']){     $services .= 'Body Rubs,          ';     }
                                                if($model['dommination']){   $services .= 'Domination & Fetish, ';     }
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

                                        if($model['USD']){ $typeCurrency .= 'USD, ';     }
                                        if($model['GBP']){ $typeCurrency .= 'GBP, ';     }
                                        if($model['EUR']){ $typeCurrency .= 'EUR, ';     }

                                        $typeCurrency = rtrim(trim($typeCurrency), ',');
                                    @endphp

                                    <p class="card-info-text">  {{$typeCurrency}} </p>
                                    <span>&nbsp;</span>

                                </div>
                                <div class="box-text">
                                    <p class="card-info-title">Payment accepted:</p>
                                        @php
                                            $typePayments = '';

                                            if($model['currency_visa']){                $typePayments .= 'VISA, ';     }
                                            if($model['currency_mastercard']){          $typePayments .= 'MasterCard, ';     }
                                            if($model['currency_ameerican_express']){   $typePayments .= 'American Express, ';     }
                                            if($model['currency_discover']){            $typePayments .= 'Discover, ';     }
                                            if($model['currency_cash']){                $typePayments .= 'Cash, ';     }
                                            if($model['currency_btc']){                 $typePayments .= 'Bitcoin, ';     }
                                            if($model['currency_other']){               $typePayments .= $model['custom_currency'];     }

                                            $typePayments = rtrim(trim($typePayments), ',');
                                        @endphp
                                        <span class="card-info-text" style="word-break: break-word;">  {{$typePayments}} </span>
                                </div>
                                @if($model['social_site'] || $model['social_fb'] || $model['social_twitter'] || $model['social_instagam'] || $model['social_google_plus'])
                                    <div class="box-text" style="    margin-top: 18px;     align-items: baseline;">
                                        <p class="card-info-title">Find me here:</p>

                                        <div>

                                            @if($model['social_site'])

                                                <div class="box-text">
                                                    <p class="card-info-text"><a rel="nofollow" target="_blank" href="{{$model['social_site']}}">{{parse_url($model['social_site'])['host']}}</a></p>

                                                </div>
                                            @endif
                                            <div class="card-info-icon">

                                                @if($model['social_fb'])
                                                    <a rel="nofollow" target="_blank" href="https://www.facebook.com/{{$model['social_fb']}}">
                                                        <img src="{{asset('img/icon/fb-dark.svg')}}" alt="">
                                                    </a>
                                                @endif
                                                @if($model['social_twitter'])
                                                    <a rel="nofollow" target="_blank" href="https://twitter.com/{{$model['social_twitter']}}">
                                                        <img src="{{asset('img/icon/tw-dark.svg')}}" alt="">
                                                    </a>
                                                @endif
                                                @if($model['social_instagam'])
                                                    <a rel="nofollow" target="_blank" href="https://www.instagram.com/{{$model['social_instagam']}}">
                                                        <img src="{{asset('img/icon/in-dark.svg')}}" alt="">
                                                    </a>
                                                @endif
                                                @if($model['social_google_plus'])
                                                    <a rel="nofollow" target="_blank" href="{{$model['social_google_plus']}}">
                                                        <img src="{{asset('img/icon/go-dark.svg')}}" alt="">
                                                    </a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>