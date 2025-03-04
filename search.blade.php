@include('head.head')

<body>
<div class="wrapper" id="wrapper">
@include('head.header')
<main>
    <section class="title-box">
        <div class="test"></div>
        <div class="container">
            <h1 class="title-xl">{{$state->name}}, {{$city->name}}</h1>
            {!! $contentTop !!}
        </div>
    </section>
    @foreach($models as $items => $val)
    <section class="date">
        <div class="container">
            <div class="date-container">
                <p class="date-box">{{ $items }}</p>
            </div>
        </div>
    </section>

    <section class="worker-girls">
        <div class="container">
            <div class="row">
                @foreach($models[$items] as $model)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">

                        <div class="worker-girls-box">
                            <a href="{{route('viewModel',['slug' => $model['slug'] ])}}">
                                @if(isset($model['src_foto'][0]) && $model['src_foto'][0] != '')
                                    <img src=" {{ asset('storage')  }}/{{$model['src_foto'][0]}}" class="photo-girls" alt="worker">
                                @endif
                            </a>
                            @if($model['rate'] == 'premium')
                                <img src="{{asset('img/icon/prime-smal.svg')}}" class="prime-class" alt="prime">
                            @endif
                            <div class="worker-spec">
                                <a href="tel:{{$model['phone']}}">
                                    <img src="{{asset('img/icon/Phone.svg')}}" alt="icon">
                                </a>
                                <a href="#" data-id="{{$model['id']}}"
                                   class="BigLike to__favorite @if(in_array($model['id'], $fav)) added @endif">
                                </a>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#userComplaint" class="showModalComplain" data-id="{{$model['user_id']}}">
                                    <img src="{{asset('img/icon/Flag.svg')}}" alt="icon">
                                </a>
                                <a href="{{route('viewModel',['id' => $model['id'] ])}}?comment=true#pills-tabContent">
                                    <span class="messages">{{$model['comments']}}</span>
                                    <img src="{{asset('img/icon/Message.svg')}}" alt="icon">

                                </a>
                            </div>
                            <div class="worker-name-box">
                                <p class="worker-name">{{$model['district']}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
<div class="container">
    <div class="row">
        <div class="col-12 ">
            {!! $contentBottom !!}
        </div>
    </div>
</div>


</main>

@include('footer.footer')
