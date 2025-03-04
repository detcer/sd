<style type="text/css">
    
    
  .messages-container .review-block {
      margin-bottom: 50px; }
  @media (max-width: 990px) {
      .messages-container .review-block {
          margin-bottom: 30px; } }
  .messages-container .review-block .review {
      display: inline-block;
      color: #8E157C;
      padding: 5px 25px;
      font-family: "Monserant-regular";
      border: 2px solid #8E157C;
      border-radius: 41px;
      opacity: .6;
      margin-bottom: 15px; }
  .messages-container .review-block .review-text {
      color: #342336;
      opacity: .6;
      font-family: "Monserant-regular"; }
  .messages-container .balls-form .input-range-box {
      width: 50%;
      margin-bottom: 20px; }
  @media (max-width: 990px) {
      .messages-container .balls-form .input-range-box {
          width: 100%; } }
  .messages-container .balls-form .input-range-box input {
      margin-bottom: 10px; }
  .messages-container .balls-form .balls-range {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: justify;
      -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
      justify-content: space-between; }
  .messages-container .balls-form .balls-range p {
      display: block;
      font-size: 1rem;
      font-family: "Monserant-regular"; }
  @media (max-width: 990px) {
      .messages-container .balls-form .balls-range p {
          font-size: .87rem; } }
  .messages-container .balls-form .button-send-wrap {
      -webkit-box-pack: start;
      -webkit-justify-content: flex-start;
      -ms-flex-pack: start;
      justify-content: flex-start; }

  input[type='range'] {
      overflow: hidden;
      -webkit-appearance: none;
      background-color: #D7DDE1;
      border-radius: 10px; }

  input[type='range']::-webkit-slider-runnable-track {
      height: 10px;
      -webkit-appearance: none;
      color: #13bba4;
      margin-top: -1px; }

  input[type='range']::-webkit-slider-thumb {
      width: 10px;
      -webkit-appearance: none;
      height: 10px;
      cursor: ew-resize;
      background: #bd1d6d;
      -webkit-box-shadow: -330px 0 0 325px #D590CA;
      box-shadow: -330px 0 0 325px #D590CA; }
  input[type='range']::-webkit-slider-thumb::before {
      content: '12312312312';
      display: block; }

  input[type="range"]::-moz-range-progress {
      background-color: #cab1c6; }

  input[type="range"]::-moz-range-track {
      background-color: #D7DDE1; }

  input[type="range"]::-ms-fill-lower {
      background-color: #D590CA; }

  input[type="range"]::-ms-fill-upper {
      background-color: #D7DDE1; }
  .ratingStarHide {
      display: none;
  }
  .ratingStarActive {
      display: inline-block;
  }
</style>
                                <div class="tab-pane  collapse fade @if(isset($_GET['comment']) && $_GET['comment'] == 'true') active show  @endif" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
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
                                                                        <img src="{{asset('img')}}/icon/Star.svg" alt="">
                                                                </span>
                                                            @endfor
                                                            @if(is_float( rtrim( $item['ratting'] *1 ) * 1))
                                                                <span>
                                                                    <img src="{{asset('img')}}/icon/Star0.5.svg" alt="">
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="mes-date">
                                                            <span>
                                                                <img src="{{asset('img/icon/calendar-sm.svg')}}" class="calendar" alt="">
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

                                                <button class="themeBTN-outline" id="toggleFormReviews" data-toggle='collapse' href="#formComment">Add review</button>

                                                <form action="{{route('saveComment')}}" method="POST" class="balls-form collapse fade" id="formComment">
                                                    @csrf
                                                    <div class="input-box">
                                                        <input type="hidden" value="{{$providerId}}"   name="comment_for_user_id">
                                                        <input type="text" class="input-disabled" name="text" minlength="40" required style="    max-width: 500px;
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
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="">
                                                            </span>
                                                            <span class="ratingStar">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="">
                                                            </span>
                                                            <span class="ratingStar">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="">
                                                            </span>
                                                            <span class="ratingStar">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="">
                                                            </span>
                                                            <span class="ratingStar ratingStarAfter">
                                                                <img src="{{asset('img')}}/icon/Star.svg" alt="">
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
                                                Only registered users can leave reviews
                                            </b>
                                        </h2>
                                        @foreach($comment as $item)

                                            <h3 class="messages-title userReview">Reviews by {{$item['autors_name']}}</h3>
                                            <div class="messages-box">
                                                    <div class="messages-info">
                                                        <div class="mes-like">

                                                            @for($i = 1; $i <= $item['ratting']; $i++)

                                                                <span>
                                                                        <img src="{{asset('img')}}/icon/Star.svg" alt="icon Star">
                                                                </span>
                                                            @endfor
                                                            @if(is_float( rtrim( $item['ratting'] *1 ) * 1))
                                                                <span>
                                                                    <img src="{{asset('img')}}/icon/Star0.5.svg" alt="Star0.5">
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="mes-date">
                                                            <span>
                                                                <img src="{{asset('img/icon/calendar-sm.svg')}}" class="calendar" alt="calendar">
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
                                                @endif
                                                </div>

                                        @endforeach

                                    @endif
                                </div>
<?php
$modelName = $model['name'];
if (isset($item['ratting'])) {
    echo '<div style="display: none;" itemscope itemtype="http://schema.org/Product">
    <span itemprop="name">' . $modelName . '</span>
    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <span itemprop="ratingValue"></span>/ 
    <span itemprop="bestRating">5</span> 
    based on <span itemprop="ratingCount"></span> ratings
   </div> 
</div>' ;
}
  ?>





                                

<script type="text/javascript">
  
// get the number of whole stars                                    
let elementsWithIconAlt = document.querySelectorAll('[alt*="icon Star"]');
let iconStar= elementsWithIconAlt.length;
console.log(`Result: ${iconStar}`);

// get the number of half stars
let elementsWithStar05Alt = document.querySelectorAll('[alt="Star0.5"]');
let count = elementsWithStar05Alt.length;
let result = count / 2;

// sum all stars
let allStars = iconStar + result;
console.log(`Result: ${allStars}`);

// get the number of reviews
let userReviewElements = document.getElementsByClassName('userReview');
let userReviewCount = userReviewElements.length;
console.log(`Number of elements with class "userReview": ${userReviewCount}`);


// substituting the average value of reviews
let ratingValueSpan = document.querySelector('[itemprop="ratingValue"]');

if (ratingValueSpan) {
  ratingValueSpan.textContent = allStars / userReviewCount;
  console.log(`Updated rating value to ${allStars / userReviewCount}`);
} else {
  console.log('Error: No <span> element found with itemprop "ratingValue".');
}

// substituting the number of reviews
let ratingCount = document.querySelector('[itemprop="ratingCount"]');

if (ratingCount) {
  ratingCount.textContent = userReviewCount;
  console.log(`Updated rating value to ${userReviewCount}`);
} else {
  console.log('Error: No <span> element found with itemprop "userReviewCount".');
}


</script>


                               