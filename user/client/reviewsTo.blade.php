@include('head.head')

<body>

@include('head.header')
<div class="wrapper" id="wrapper">
    <main>

        <section class="card-portfolio ">
            <div class="container containerTheme">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(Auth::user())
                        <div class="messages-container">

                            @if($h == 'Reviews by' || $h == 'Reviews to')

                                    <h2 class="title-xl titleClientReview">
                                        {{$h}} <a class="themeColortext" href="{{route('client',['id' => $client->id ]) }}">{{$client->name}}</a>
                                    </h2>
                            @else
                                    <h2 class="title-xl">
                                        {{$h}}
                                    </h2>

                            @endif

                            @foreach($comment as $item)

                                @if($title == 1)

                                    <h3 class="messages-title">
                                        Reviews
                                            {{--to <a href="{{route('viewModel',['id' => $item['user_id']]) }}" class="name-girls">{{ $item['model_name'] }}</a>--}}
                                        by
                                        <a href="{{route('client',['id' => $item['autors_id']]) }}" class="name-girls">{{ $item['autors_name'] }}</a>
                                    </h3>

                                @elseif($title == 2)

                                    <h3 class="messages-title">
                                        Reviews to <a  class="name-girls">{{ $item['userTargetName'] }}</a>
                                    </h3>
                                @elseif($title == 3)

                                        <h3 class="messages-title">
                                            Reviews by <a  class="name-girls">{{ $item['autors_name'] }}</a>
                                        </h3>
                                @elseif($title == 4)
                                        <h3 class="messages-title">
                                            Reviews by <a  class="name-girls">{{ $item['autors_name'] }}</a>
                                        </h3>
                                @endif
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
                                            <span class="balls">
                                                {{$item['ratting']}}
                                            </span>
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

                                    @else
                                        @if($showFormAnsever)
                                            <button class="themeBTN-outline toggle__response__block"
                                                    data-id="{{$item['comments_id']}}" data-user_id="{{$item['userTargetId']}}" data-model_name="{{$item['userTargetName']}}"
                                                    data-autor="{{$item['autors_id']}}" data-autor_name="{{$item['autors_name']}}" data-route="{{route('saveComment')}}"
                                            >Respond to review</button>
                                        @endif
                                    @endif
                                </div>
                            @endforeach


                            @if($showBtn)

                            <button class="themeBTN-outline" id="toggleFormReviews" >Add review</button>

                            <form action="{{route('saveComment')}}" method="POST" class="balls-form" style="display:none;" id="formComment">
                                @csrf

                                <div class="input-box">
                                    <input type="hidden" value="{{$comentForUserId}}"   name="comment_for_user_id">
                                    <input type="text" class="input-disabled"       name="text" minlength="4" required style="    max-width: 500px;
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
                            @endif
                        </div>{{--col-12--}}
                </div>{{--row--}}
            </div>{{--container--}}

        </div>

            </div>
        </section>
    </main>

@include('footer.footer')
