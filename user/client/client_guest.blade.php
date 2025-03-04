@include('head.head')

<body>
<div class="wrapper" id="wrapper">
    @include('head.header')
<main>

    <section class="client">
        <div class="container">
            <div class="client-container">
                <div class="logo-client">
                    <img src="{{asset('img/icon/prime-big.svg')}}" alt="logo">
                </div>


                @if(Auth::user()->userType == 'client' )

                    <p class="text-center blockNameClient">
                        <span>
                            Private Profile
                        </span>
                        <span>
                            of
                        </span>
                        <span>
                            {{$user->name}}
                        </span>
                    </p>

                    <p><br></p>

                @elseif(Auth::user()->userType == 'provider')

                    <p class="text-center blockNameClient">
                        <span>
                            Private Profile
                        </span>
                        <span>
                            of
                        </span>
                        <span>
                            {{$user->name}}
                        </span>
                    </p>

                    <p><br></p>
                @endif

                @if(Auth::user()->userType == 'client' )
                    <div class="client-buttons">
                        <a href="{{route('myReviews')}}" class="button-transparent">My reviews</a>
                        <a href="#" class="button-transparent">Reviews about me</a>
                        <a href="{{route('favorite')}}" class="button-transparent">Favorites</a>
                    </div>
                @elseif(Auth::user()->userType == 'provider')

                    <div class="client-buttons">
                        <button class="button-transparent m10-a" id="reportClient">Report profile</button>
                    </div>

                    <form action="{{route('addReport')}}" id="reportClientForm" class="reportAdd formReport" style="display:none;">
                        @csrf
                        <input type="hidden" name="comment_for_user_id" value="{{$user->id}}">
                        <input type="text" name="text" placeholder="Reason for complaint" minlength="20" requireds>
                        <div class="m10 FLEX" >
                            <div class="button-send-wrap">
                                <button>
                                    Submit
                                </button>
                            </div>
                            <button class="button-transparent" style="    height: 40px;">
                                Cancel
                            </button>
                        </div>
                    </form>

                    <div class="client-buttons">
                        <a href="{{route('clientReviews',[ $user->id,'by'])}}" class="button-transparent">Reviews to Client</a>
                        <a href="{{route('clientReviews',[ $user->id,'to'])}}" class="button-transparent">Reviews by Client</a>
                    </div>

                    <p>
                        <br>
                    </p>
                @endif

                <div  class="client-form-second">

                    <div class="input-box">
                        <p>

                            (xxx)-xxx-{{$user->phone}}
                        </p>
                    </div>
                    <div class="input-box">
                        <p>
                            <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                        </p>
                    </div>
                    <div class="input-box">
                        <p>
                            {{$user->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@include('footer.footer')

