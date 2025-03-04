<main>

    <section class="client">
        <div class="container">
            <div class="client-container">
                <div class="logo-client">
                    <img src="img/icon/prime-big.svg" alt="logo">
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

                @if(Auth::user()->userType == 'client' )
                <div class="client-buttons">
                    @if(empty($user->phone))
                        <a  style="border-color: #837f82;" class="button-transparent">My reviews ({{$countComments}})</a>
                        <a  style="border-color: #837f82;" class="button-transparent">Reviews about me ({{$countCommentsForMy}})</a>
                        <a  style="border-color: #837f82;" class="button-transparent">Favorites ({{$countFav}})</a>
                    @else
                        <a href="{{route('ProviderReviews',[ Auth::user()->id,'to'])}}" class="button-transparent">My reviews ({{$countComments}})</a>
                        <a href="{{route('ProviderReviews',[ Auth::user()->id,'by'])}}" class="button-transparent">Reviews about me ({{$countCommentsForMy}})</a>
                        <a href="{{route('favorite')}}" class="button-transparent">Favorites ({{$countFav}})</a>
                    @endif
                </div>
                @elseif(Auth::user()->userType == 'provider')
                    <div class="client-buttons">
                        <button class="button-transparent">Report profile</button>
                    </div>
                @endif

                @if(empty($user->phone))
                    <p><br></p>
                    <div class="alert alert-primary" role="alert" style="max-width: 697px;
    margin: 0 auto;
    text-align: center;">
                        Please enter your phone number
                    </div>
                    <p><br></p>
                @endif

                <form action="{{ route('homeUpdate',['id' => $user->id]) }}" method="POST" class="client-form-second" enctype='multipart/form-data'>
                    @csrf
                    <div class="input-box">
                        <input type="text" title="Provider will not see your full number. e.g" class="input-disabled" name="phone" minlength="4"
                               @if(!empty($user->phone))
                                   value="{{$user->phone}}"
                                    disabled
                                @endif
                               placeholder="Provider will not see your full number. e.g. (xxx)-xxx-1256" required>
                    </div>
                    <div class="input-box">
                        <input type="email" class="input-disabled" name="email" minlength="4"
                               placeholder="E-mail"  @if(!empty($user->email))
                               value="{{$user->email}}"
                               disabled
                               @endif
                                required>
                    </div>
                    <div class="input-box">
								<textarea class="input-disabled" name="description" minlength="4"
                                          placeholder="Few words about yourself " >{{$user->description}}</textarea>
                    </div>
                    <button type="submit" class="button-transparent">Save info</button>
                </form>
            </div>
        </div>
    </section>

</main>
