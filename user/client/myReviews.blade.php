@include('head.head')
@include('head.header')

@dd($reviews)
<main>
     <section class="reviews">
            <div class="container">
                <div class="messages-container">
                    <h2 class="title-xl">My reviews</h2>

                    @foreach($reviews as $item)

                        <h3 class="messages-title">Reviews <a href="{{route('viewModel', ['id' => $item['user_id'] ])}}"><span class="name-girls">{{$item['model_name']}}</span></a></h3>
                    <div class="messages-box">
                        <div class="messages-info">
                            <div class="mes-like">
                                @for($i=1; $i <= $item['ratting']; $i++)
									<span>
										<img src="{{asset('img')}}/icon/Star.svg" alt="icon">
									</span>
                                @endfor
                                <span class="balls">{{$item['ratting']}}</span>
                            </div>
                            <div class="mes-date">
									<span>
										<img src="{{asset('img')}}/icon/calendar-sm.svg" class="calendar" alt="icon">
									</span>
                                <span class="date">
										{{$item['created_at']}}
									</span>
                            </div>
                        </div>
                        <p class="messages-text">
                            {{$item['text']}}
                        </p>
                    </div>

                    @endforeach
                </div>
            </div>
        </section>

    </main>

@include('footer.footer')
