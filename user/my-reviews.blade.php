@include('head.head')

<body>
<div class="wrapper" id="wrapper">
    @include('head.header')
    <main>
q    <section class="reviews">
        <div class="container">
            <div class="messages-container">
                <h2 class="title-xl">My reviews</h2>
                    @foreach($comments as $item)
                        <h3 class="messages-title">Reviews to
                            <a href="{{route('viewModel',['id' => $item->user_id ])}}" class="name-girls">{{ $item->model_name }}</a>
                            @if(Auth::user()->userType == 'provider')
                                by
                                <a href="{{route('client',['id' => $item->autor])}}" class="name-girls">{{ $item->autor_name }}</a>
                            @endif
                        </h3>
                        <div class="messages-box">
                            <div class="messages-info">
                                <div class="mes-like">
                                    @for($i = 1; $i <= $item->ratting; $i++)
                                        <span>
                                            <img src="{{asset('img')}}/icon/Star.svg" alt="icon">
                                    </span>
                                    @endfor
                                    @if(is_float($item->ratting))
                                        <span>
                                        <img src="{{asset('img')}}/icon/Star0.5.svg" alt="icon">
                                    </span>
                                    @endif
                                    <span class="balls">
                                    {{$item->ratting}}
                                </span>
                                </div>
                                <div class="mes-date">
                                        <span>
                                            <img src="img/icon/calendar-sm.svg" class="calendar" alt="icon">
                                        </span>
                                    <span class="date">
                                    {{$item->created_at}}
                                        </span>
                                </div>
                            </div>
                            <p class="messages-text">
                                {{$item->text}}
                            </p>
                        </div>
                    <div class="response__container">
                        @if(isset($item->answer[0]->comment_for))
                            <div style="margin-left: 30px">
                                <h3 class="messages-title">Respond to
                                    <a href="" class="name-girls">{{ $item->answer[0]->model_name }}</a>
                                    <span class="date">
                                     - {{$item->answer[0]->created_at}}
                                </span>
                                </h3>
                                <div class="messages-box">
                                    <p class="messages-text">
                                        {{$item->answer[0]->text}}
                                    </p>
                                </div>
                            </div>
                        @elseif(!isset($item->answer[0]->comment_for) && $user->userType == 'provider')
                            <button class="themeBTN-outline toggle__response__block"
                                    data-id="{{$item->id}}" data-user_id="{{$item->user_id}}" data-model_name="{{$item->model_name}}"
                                    data-autor="{{$item->autor}}" data-autor_name="{{$item->autor_name}}" data-route="{{route('saveComment')}}"
                            >Respond to review</button>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>

@include('footer.footer')
