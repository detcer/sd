@include('head.head')
<body>
<div class="wrapper" id="wrapper">
    @include('head.header')
    <main>
<div id="startCost" style="display: none">
    {{$startCost}}
</div>
        <form method="POST" action="{{ route('modelUpdate',['adsId' => request()->route('id')]) }}" id="formAddUpdate" class=" formModelUpdateAndNewValidate filling-lk" enctype='multipart/form-data'>
            @csrf
            <div class="container containerTheme">
                <div class="about-filling">
                    <div class="row">
                        <div class="col-xl-7 col-lg-6">
                            <div id='file_field_preview' class="wrapPreviewImg">
                                @foreach($model->src_foto as $id => $foto)
                                    <span class="img__container" data-type="saved" id="{{$id}}">
                                        <p class="delete__button"></p>
                                        <img class="thumb fotoMini--m" src="{{ asset('storage')  }}/{{$foto}}" alt="portfolio">
                                    </span>
                                @endforeach
                                    <input type="hidden" name="for_del[]">
                            </div>
                            <div style="margin: 0 0 100px 0;">
                                <div class="file-loading" >
                                    <input id="input-b3" name="src_foto[]" type="file" class="file" multiple
                                           data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload..." >
                                </div>
                            </div>



                            <div class="about-photo-desc">
{{--                                <div class="input-file">--}}
{{--                                    <div id='file_field_preview' class="wrapPreviewImg">--}}
{{--                                        @foreach($model->src_foto as $id => $foto)--}}
{{--                                            <span class="img__container" data-type="saved" id="{{$id}}">--}}
{{--                                                <p class="delete__button"></p>--}}
{{--                                                <img class="thumb fotoMini--m" src="{{ asset('storage')  }}/{{$foto}}" alt="portfolio">--}}
{{--                                            </span>--}}
{{--                                        @endforeach--}}
{{--                                            <input type="hidden" name="for_del[]">--}}
{{--                                    </div>--}}
{{--                                    <label for="file_field" class="labelForUploadFile">--}}
{{--                                        <span>--}}
{{--                                            +--}}
{{--                                        </span>--}}
{{--                                        <p>--}}
{{--                                            Add photo--}}
{{--                                        </p>--}}
{{--                                        <input type="file" name="src_foto[]" maxlength="6"  multiple value="{}"  id="file_field" style="display:none;"/>--}}
{{--                                    </label>--}}

{{--                                </div>--}}

{{--                                <button class="button-transparent" id="deleteAllImg">--}}
{{--                                    Delete all--}}
{{--                                </button>--}}


                                <div class="input-box">
                                    <input type="text" class="input-disabled" name="title" placeholder="Title"
                                           minlength="4" required  value="{{$model->title}}">
                                </div>

                                <div class="input-box">
										<textarea type="text" class=" minlength50 input-disabled" name="description"
                                                  placeholder="Description" minlength="50" required pattern="[a-zA-Z][a-zA-Z0-9\s]*" style="height:300px;">{{$model->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="about-profile">
                                <div class="button-send-wrap">
                                    <a href="{{route('pageMoneyAdd')}}">Buy credits</a>
                                </div>

                                <div class="FLEX-jc--sb">
                                    <div class="select-box selectpickerMyStyle">
                                        <select name="country" required title="Countries" size="5" class="selectpicker" data-live-search="true" >
                                            @foreach($countries as $item)
                                                <option value="{{ $item->id }}"  selected >{{$item->name}}</option>
                                            @endforeach;
                                        </select>

                                    </div>
                                </div>

                                <div class="select-box selectpickerMyStyle">
                                    <select name="state" required title="State" size="5" class="selectpicker" data-account="1" data-live-search="true" id="selectState">
                                        @foreach($statez as $item)

                                            <option value="{{ $item->id }}" @if($item->id == $model->state) selected  @endif>{{$item->title}}</option>
                                        @endforeach;
                                    </select>
                                </div>
                                <div class="select-box selectpickerMyStyle">
                                    <select name="city[]" multiple required title="City" size="5" class="selectpicker" data-account="1" data-live-search="true" id="selectCity" data-selected-text-format="count">
                                        @foreach($city as $item)
                                            <option value="{{ $item->id }}" @if(in_array($item->id, $modelCity)) selected @endif>{{$item->title}}</option>
                                        @endforeach;
                                    </select>
                                </div>

                                <div class="input-box">
                                    <input type="text" class="input-disabled" name="district" placeholder="District"
                                           minlength="4"  required value="{{$model->district}}" >
                                </div>

                                <div class="select-box selectpickerMyStyle">

                                    <select name="servises[]" required="" title="Servises" multiple="" size="5" class="selectpicker" data-live-search="true" data-selected-text-format="count" tabindex="-98" id="inputServises">
                                        <option value="bodyrubs"           @if($model['bodyrubs']     ) selected  @endif>Body Rubs</option>
                                        <option value="dommination"         @if($model['dommination']   ) selected  @endif>Domination &amp; Fetish</option>
                                        <option value="femaleescort"       @if($model['femaleescort'] ) selected  @endif>Female Escorts</option>
                                        <option value="maleescort"         @if($model['maleescort']   ) selected  @endif>Male Escorts</option>
                                        <option value="strippers"           @if($model['strippers']     ) selected  @endif>Strippers</option>
                                        <option value="transsexual"         @if($model['transsexual']   ) selected  @endif>Transsexual</option>
                                    </select>

                                </div>

                                <div class="input-box" style="height:50px">

                                </div>

                                <div class="input-box">
                                    <input type="text" class="input-disabled" name="name" placeholder="Name" required value="{{$model->name}}">
                                </div>

                                <div class="input-box">
                                    <input type="tel" class="input-disabled" value="{{$model->phone}}" name="phone" placeholder="Phone" autocomplete="off" maxlength="12" required id="phone">
                                </div>

                                <div class="select-container selectpickerMyStyle">
                                    <div class="select-box">
                                        <select name="age" required title="Age" size="5" class="selectpicker" data-live-search="true" data-selected-text-format="count">
                                            @for($i = 18; $i <= 70; $i++)
                                                <option value="{{ $i }}" @if($model->age == $i) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="select-container selectpickerMyStyle">
                                    <div class="select-box">
                                        <select name="hair_color" title="Hair color" required class="selectpicker">
                                            @foreach($params_hairColor as $item)
                                                <option value="{{ $item->id }}" @if($item->id == $model->hair_color ) selected @endif >{{$item->name}}</option>
                                            @endforeach;
                                        </select>
                                    </div>
                                    <div class="select-box selectpickerMyStyle">
                                        <select name="hair_length" title="Hair length" required class="selectpicker">
                                            @foreach($params_hairLength as $item)
                                                <option value="{{ $item->id }}"  @if($item->id == $model->hair_length ) selected @endif >{{$item->name}}</option>
                                            @endforeach;
                                        </select>
                                    </div>
                                </div>
                                <div class="select-box w-100 d-block">
                                    <select name="ethnicity" required class="selectpicker w-100 d-block">
                                        @foreach($params_ethnicity as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $model->ethnicity ) selected @endif >{{$item->name}}</option>
                                        @endforeach;
                                    </select>
                                </div>
                                <div class="select-container w-100 d-block">
                                    <div class="select-box w-100">
                                        <select name="height" title="Height" required class="selectpicker w-100">
                                            @foreach($params_height as $item)
                                                <option value="{{ $item->id }}" @if($item->id == $model->height ) selected @endif >{{$item->name}}</option>
                                            @endforeach;
                                        </select>
                                    </div>
                                    <div class="select-box w-100 d-block" style="margin: auto;">
                                        <select name="brest_size" title="Breast size" required class="selectpicker w-100" style="margin: auto;">
                                            @foreach($params_brestSize as $item)
                                                <option value="{{ $item->id }}" @if($item->id == $model->brest_size ) selected @endif >{{$item->name}}</option>
                                            @endforeach;
                                        </select>
                                    </div>
                                </div>
                                <div class="container-checkbox">
                                    <div class="box-checkbox">
                                        <p class="form-sm-title">Incall</p>

                                        <label class="drop__input-box" for="incall_30m">

                                            <input class="checkbox drop__input-trigger" type="checkbox" value="1" id="incall_30m" name="incall_30m"  @if($model->incall_30m != 0) checked @endif>
                                            <span class="checkbox-custom"></span>
                                            <span class="label">30 minutes</span>
                                            <div class="input-box drop__input @if($model->incall_30m == 0) disabled @endif">
                                                <input type="number" class="input-disabled" @if($model->incall_30m != 0) value="{{$model->incall_30m}}" @endif name="incall_30m_rate" placeholder="Rate">
                                            </div>
                                        </label>

                                        <label class="drop__input-box" for="incall_1h">
                                            <input class="checkbox drop__input-trigger" type="checkbox" value="1" id="incall_1h" name="incall_1h" @if($model->incall_1h != 0) checked @endif>
                                            <span class="checkbox-custom"></span>
                                            <span class="label">1 hour</span>
                                            <div class="input-box drop__input @if($model->outcall_1h == 0) disabled @endif">
                                                <input type="number" class="input-disabled" @if($model->incall_1h != 0) value="{{$model->incall_1h }}" @endif  name="incall_1h_rate" placeholder="Rate">
                                            </div>
                                        </label>
                                        <label class="drop__input-box" for="incall_2h">
                                            <input class="checkbox drop__input-trigger" type="checkbox" value="1" id="incall_2h" name="incall_2h" @if($model->incall_2h != 0) checked @endif>
                                            <span class="checkbox-custom"></span>
                                            <span class="label">2 hours</span>
                                            <div class="input-box drop__input @if($model->incall_2h == 0) disabled @endif">
                                                <input type="number" class="input-disabled"  @if($model->incall_2h != 0) value="{{$model->incall_2h }}" @endif  name="incall_2h_rate" placeholder="Rate">
                                            </div>
                                        </label>
                                        <label class="drop__input-box" for="incall_24h">
                                            <input class="checkbox drop__input-trigger" type="checkbox" value="1"  id="incall_24h" name="incall_24h" @if($model->incall_24h != 0) checked @endif>
                                            <span class="checkbox-custom"></span>
                                            <span class="label"> 24 hours</span>
                                            <div class="input-box drop__input @if($model->incall_24h == 0) disabled @endif">
                                                <input type="number" class="input-disabled" @if($model->incall_24h != 0) value="{{$model->incall_24h }}" @endif name="incall_24h_rate" placeholder="Rate">
                                            </div>
                                        </label>
                                    </div>
                                    <div class="box-checkbox">
                                        <p class="form-sm-title">Outcall</p>

                                        <label class="drop__input-box">
                                            <input class="checkbox drop__input-trigger" type="checkbox" value="1" id="outcall_30m" name="outcall_30m" @if($model->outcall_30m != 0) checked @endif>
                                            <span class="checkbox-custom"></span>
                                            <span class="label">30 minutes</span>
                                            <div class="input-box drop__input @if($model->outcall_30m == 0) disabled @endif ">
                                                <input type="number" class="input-disabled" @if($model->outcall_30m != 0) value="{{$model->outcall_30m }}" @endif name="outcall_30m_rate" placeholder="Rate">
                                            </div>
                                        </label>

                                        <label class="drop__input-box">
                                            <input class="checkbox drop__input-trigger" type="checkbox" value="1" id="outcall_1h" name="outcall_1h" @if($model->outcall_1h != 0) checked @endif>
                                            <span class="checkbox-custom"></span>
                                            <span class="label">1 hour</span>
                                            <div class="input-box drop__input @if($model->outcall_1h == 0) disabled @endif">
                                                <input type="number" class="input-disabled" @if($model->outcall_1h != 0) value="{{$model->outcall_1h }}" @endif name="outcall_1h_rate" placeholder="Rate">
                                            </div>
                                        </label>

                                        <label class="drop__input-box">
                                            <input class="checkbox drop__input-trigger" type="checkbox" value="1" id="outcall_2h" name="outcall_2h" @if($model->outcall_2h != 0) checked @endif>
                                            <span class="checkbox-custom"></span>
                                            <span class="label">2 hours</span>
                                            <div class="input-box drop__input @if($model->outcall_2h == 0) disabled @endif">
                                                <input type="number" class="input-disabled"  @if($model->outcall_2h != 0) value="{{$model->outcall_2h }}" @endif name="outcall_2h_rate" placeholder="Rate">
                                            </div>
                                        </label>

                                        <label class="drop__input-box">
                                            <input class="checkbox drop__input-trigger" type="checkbox" value="1" id="outcall_24h" name="outcall_24h" @if($model->outcall_24h != 0) checked @endif>
                                            <span class="checkbox-custom"></span>
                                            <span class="label"> 24 hours</span>
                                            <div class="input-box drop__input @if($model->outcall_24h == 0) disabled @endif">
                                                <input type="number" class="input-disabled" @if($model->outcall_24h != 0) value="{{$model->outcall_24h }}" @endif name="outcall_24h_rate" placeholder="Rate">
                                            </div>
                                        </label>

                                    </div>
                                </div>
                                <p class="form-sm-title">Currency</p>
                            <style type="text/css">.dropdown-menu.show {width:100%;min-width:100%;}</style>
                                <div class="select-container d-block ">
                                    <div class="select-box  d-block  w-100">
                                        <select name="currency[]" title="Currency" required="" multiple="" class="w-100 selectpicker" tabindex="-98">
                                            <option value="USD" @if($model['USD']) selected @endif>USD (United States Dollar)</option>
                                            <option value="GBP" @if($model['GBP']) selected @endif>GBP (Pound Sterling)</option>
                                            <option value="EUR" @if($model['EUR']) selected @endif>EUR (Euro)</option>
                                        </select>
                                    </div>
                                    <div class="select-box  d-block  w-100 ml-0">
                                        <select title="Payment accepted" name="payment_accepted[]" multiple="" required="" class="selectpicker payment__selector w-100" tabindex="-98">

                                            <option value="currency_visa"               @if($model['currency_visa'])                selected @endif >VISA</option>
                                            <option value="currency_mastercard"         @if($model['currency_mastercard'])          selected @endif >MasterCard</option>
                                            <option value="currency_ameerican_express"  @if($model['currency_ameerican_express'])   selected @endif >American Express</option>
                                            <option value="currency_discover"           @if($model['currency_discover'])            selected @endif >Discover</option>
                                            <option value="currency_cash"               @if($model['currency_cash'])                selected @endif >Cash</option>
                                            <option value="currency_btc"                @if($model['currency_btc'])                 selected @endif >Bitcoin</option>
                                            <option value="currency_other"              @if($model['currency_other'])               selected @endif >Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="input-box payment__input @if(!$model['currency_other'])disabled @endif">
                                    <input type="text" @if($model['currency_other']) value="{{$model['custom_currency']}}" @endif class="input-disabled" id="custom_currency" name="custom_currency" placeholder="Enter Your payment accepted" >
                                </div>
                                <p class="form-sm-title">Your website:</p>
                                <div class="input-box">
                                    <input type="url" class="input-disabled" name="social_site" placeholder="https://Your site" value="{{$model->social_site}}">
                                </div>
                                <div class="input-box FLEX">
                                    <img src="{{asset('img/icon/fb-dark.svg')}}" alt="icon">
                                    <input type="text" class="input-disabled" name="social_fb" placeholder="Facebook, e.g. yourNickname"  value="{{$model->social_fb}}">
                                </div>
                                <div class="input-box FLEX">
                                    <img src="{{asset('img/icon/in-dark.svg')}}" alt="icon">
                                    <input type="text" class="input-disabled" name="social_instagam" placeholder="Instagram, e.g. yourNickname" value="{{$model->social_instagam}}">
                                </div>
                                <div class="input-box FLEX">
                                    <img src="{{asset('img/icon/tw-dark.svg')}}" alt="icon">
                                    <input type="text" class="input-disabled" name="social_twitter" placeholder="Twitter, e.g. yourNickname" value="{{$model->social_twitter}}">
                                </div>
                           <!--      <div class="input-box FLEX">
                                    <img src="{{asset('img/icon/go-dark.svg')}}" alt="icon">
                                    <input type="text" class="input-disabled" name="social_google_plus" placeholder="Google plus" value="{{$model->social_google_plus}}">
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-updating">
                    <p class="big-title-bg">Upgrade your Ad</p>
                    <div class="row">
                        <div class="col-xl-7 col-lg-6">
                            <div class="updating-box-1">

                                <div class="blockPremium">
                                    <label>
                                        <input class="checkbox" type="radio" value="premium" name="rate" @if($model['rate'] == 'premium') checked @endif>
                                        <span class="checkbox-custom"></span>
                                        <span class="label">Premium Ad - 60$ per month</span>
                                    </label>
                                    <div class="updating-info-box">
                                        <p class="info-prime">Your ad will be visible in “Prime” and “Regular” sections.
                                        </p>
                                        <p class="info-prime">Bump your listing every 1 hour for FREE.
                                        </p>
                                        <p class="info-prime">Your listing will be bumped in both sections “Prime” and “Regular”.
                                        </p>
                                        <p class="info-prime">Your ad will be on the top of the listing with “SD Prime” sign.
                                        </p>
                                        <p class="info-prime">More clients will see your ad, so you will have more money.
                                        </p>
                                        <p class="info-prime">Beautiful, eye catching ad.
                                        </p>
                                    </div>
                                </div>{{--blockPremium --}}


                                <div class="blockByuBamps">

                                    <h2 class="title-updating">Save your money - buy package of Bumps</h2>
                                    <div class="container-checkbox">
                                        <div class="box-checkbox">
                                            <label>
                                                <input class="checkbox" type="radio" value="20" data-value="18"  name="bamps">
                                                <span class="checkbox-custom"></span>
                                                <span class="label">20 bumps - 18$</span>
                                            </label>
                                            <label>
                                                <input class="checkbox" type="radio" value="30" data-value="26" name="bamps">
                                                <span class="checkbox-custom"></span>
                                                <span class="label">30 bumps - 26$</span>
                                            </label>
                                            <label>
                                                <input class="checkbox" type="radio" value="40" data-value="34" name="bamps">
                                                <span class="checkbox-custom"></span>
                                                <span class="label">40 bumps - 34$</span>
                                            </label>
                                        </div>
                                        <div class="box-checkbox">
                                            <label>
                                                <input class="checkbox" type="radio" value="100" data-value="80" name="bamps">
                                                <span class="checkbox-custom"></span>
                                                <span class="label">100 bumps - 80$</span>
                                            </label>
                                            <label>
                                                <input class="checkbox" type="radio" value="200" data-value="150" name="bamps">
                                                <span class="checkbox-custom"></span>
                                                <span class="label">200 bumps - 150$</span>
                                            </label>

                                            <label>
                                                <input class="checkbox" type="radio" value="0" data-value="0" name="bamps">
                                                <span class="checkbox-custom"></span>
                                                <span class="label">None</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>{{-- blockByuBamps --}}


                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6">

                            <div class="blockRegularAd">
                                <div class="updating-box-2">
                                    <label>
                                        <input class="checkbox" type="radio" value="regular" id="regularRate" name="rate" @if($model['rate'] == 'regular') checked @endif>
                                        <span class="checkbox-custom"></span>
                                        <span class="label">Regular Ad</span>
                                    </label>

                                             <div class="updating-info-box">
                                    <p class="info-prime">1 service and 1 city = 10$, bump = 2$.
                                    </p>
                                    <p class="info-prime">+1 service = +2$.
                                    </p>
                                    <p class="info-prime">+1 city = +2$.
                                    </p>
                             <!--        <p class="info-prime">Your listing will be bumped in both sections “Prime” and “Regular”.
                                    </p>
                                    <p class="info-prime">Your ad will be on the top of the listing with “SD Prime” sign.
                                    </p>
                                    <p class="info-prime">More clients will see your ad, so you will have more money.
                                    </p>
                                    <p class="info-prime">Beautiful, eye catching ad.
                                    </p> -->
                                </div>


                                    <div class="small-checkbox">
                                        <label for="oneMostDollar">
                                            <input class="checkbox" type="checkbox" name="oneMostDollar" id="oneMostDollar" >
                                            <span class="checkbox-custom"></span>
                                            <span class="label">Bump your Ad now</span>
                                        </label>
                                    </div>
                                </div>
                            </div>{{--blockRegularAd--}}

                     <!--        <div class="croneBamps">
                                <label>
                                    <input class="checkbox" type="checkbox" value="1" name="selectCroneBampsFlag" id="selectCroneBampsFlag">
                                    <span class="checkbox-custom"></span>
                                    <span class="label">Move your ad to top of the Regular <br>  listing every hours of the</span>
                                </label>
                                <div class="select-box">
                                    <select name="croneBamps" id="selectCroneBamps">
                                        <option value="1"   >   1   </option>
                                        <option value="2"   >   2   </option>
                                        <option value="3"   >   3   </option>
                                        <option value="4"   >   4   </option>
                                        <option value="5"   >   5   </option>
                                        <option value="6"   >   6   </option>
                                        <option value="7"   >   7   </option>
                                        <option value="8"   >   8   </option>
                                        <option value="9"   >   9   </option>
                                        <option value="10"  >   10  </option>
                                        <option value="11"  >   11  </option>
                                        <option value="12"  >   12  </option>
                                        <option value="13"  >   13  </option>
                                        <option value="14"  >   14  </option>
                                        <option value="15"  >   15  </option>
                                        <option value="16"  >   16  </option>
                                        <option value="17"  >   17  </option>
                                        <option value="18"  >   18  </option>
                                        <option value="19"  >   19  </option>
                                        <option value="20"  >   20  </option>
                                        <option value="21"  >   21  </option>
                                        <option value="22"  >   22  </option>
                                        <option value="23"  >   23  </option>
                                        <option value="24"  >   24  </option>
                                    </select>
                                </div>
                            </div>{{--croneBamps--}} -->
                            <input type="hidden" name="updateTotalPrice" id="updateTotalPrice">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="totalPrice" id="totalPrice" value="0" >
                <div class="send-about">
                    <div class="send-about-text">
                        <p class="pMoney--balanse">Current account balance - <span><span id="pMoney--balanse">{{ Auth::user()->money }}</span>$</span></p>
                        <p class="pMoney--price">Ad cost - <span><span id="pMoney--price">0</span>$</span></p>
                        @php
                            $afterMoney = (Auth::user()->money );
                        @endphp
                        <p class="pMoney--balansLast">Balance after purchase - <span id="afterMoney" class="afterMoney "> <span id="pMoney--balansLast">{{ $afterMoney }}</span>$</span></p>
                    </div>
                    <div class="button-send-wrap">
                        <button type="submit" id="btnSumbit">
                            Post ad
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </main>

<script src="{{ asset( 'new-scripts.js?v=12' ) }}" defer></script>

@include('footer.footer')

