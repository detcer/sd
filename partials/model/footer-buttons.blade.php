
                <div class="row">
                    <div class="container">
                        <div class="card-tab-container">
                            <br>
                            <p style="text-align: center; color: #8E157C;">Mention you saw this ad on secretdesire.co</p>
                            <ul class="nav nav-pills justify-content-center mt-4" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link phon phone__btn" >Phone Number</a>
                                    <!-- <a class="nav-link phon phone__call disabled" href="tel:{{$model['phone']}}">{{$model['phone']}}</a> -->
                                    <a class="nav-link phon phone__call disabled" href="sms:{{$model['phone']}};?&body=Hi,%20{{$model['name']}}!%20I%20saw%20your%20ad%20on%20Secret%20Desire.%20I%20would%20like%20to%20book%20an%20appointment%20on%20___%20for%20___%20hours.">{{$model['phone']}}</a>
                                    
                                </li>
                                @guest
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link like to__favorite @if($favorites == 1) added @endif" data-id="{{$model['id']}}" href>Favourite</a>
                                    </li>
                                    <li class="nav-item" >
                                        <a class="nav-link flag showModalComplain" data-toggle="modal" data-target="#userComplaint" data-id="{{$model['user_id']}}" href="#">Report ad</a>
                                    </li>
                                @endguest
                                <li class="nav-item">
                                    <a class="nav-link sms reviews__link  reviews__toggle @if(isset($_GET['comment']) && $_GET['comment'] == 'true')  @else collapsed @endif" href="#pills-contact" data-toggle="collapse" >Reviews</a>
                                </li>
                            </ul>
                            <div class="">
                                @include( 'partials.model.reviews' )
                            </div>
                        </div>
                    </div>
                </div>