@include('head.head')

<body>
<div class="wrapper" id="wrapper">
@include('head.header')
<main>
    <section class="title-box">
        <div class="container">
            <h1 class="title-xl">Favourites</h1>
        </div>
    </section>
    <section class="worker-girls">
        <div class="container">
            <div class="row">

                @foreach($models as $model)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="worker-girls-box">
                            <a href="{{route('viewModel',['id' => $model->id ])}}">
                                @if(isset($model->src_foto[0]) && $model->src_foto[0] != '')
                                    <img src=" {{ asset('storage')  }}/{{$model->src_foto[0]}}" class="photo-girls" alt="worker">
                                @endif
                            </a>
                            @if($model->rate == 'premium')
                                <img src="{{asset('img/icon/prime-smal.svg')}}" class="prime-class" alt="prime">
                            @endif
                            <div class="worker-spec">
                                <a href="tel:{{$model->phone}}">
                                    <img src="{{asset('img/icon/Phone.svg')}}" alt="icon">
                                </a>
                                <a href="#" data-id="{{$model->id}}"
                                   class="BigLike to__favorite added">
                                </a>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#userComplaint">
                                    <img src="{{asset('img/icon/Flag.svg')}}" alt="icon">
                                </a>
                                <a href="{{route('viewModel',['id' => $model->id ])}}?comment=true#pills-tabContent">
                                    <span class="messages">{{$model->comments}}</span>
                                    <img src="{{asset('img/icon/Message.svg')}}" alt="icon">
                                </a>
                            </div>
                            <div class="worker-name-box">
                                <p class="worker-name">{{$model->district}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="userComplaint" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="forgot-title-box">
                        <h3 class="forgot-title">User complaint</h3>
                    </div>
                </div>
                <div class="modal-body">
                    <br>
                    <form  >
                        <p class="forgot-text">Describe the violation and the administration will punish the offender</p>
                        <div class="input-box">
                            <input type="text" name="user_complaint_text" class="input-disabled" placeholder="User complaint"
                                   minlength="3" required>
                        </div>
                        <div class="button-send-wrap">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

@include('footer.footer')
