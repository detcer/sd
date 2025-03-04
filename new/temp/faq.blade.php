@extends( 'layouts.public' )
@section ( "styles" )
    <link href="{{ asset( 'category.css' ) }}" rel="stylesheet">
    <link href="{{ asset( 'faq.css' ) }}" rel="stylesheet">
@endsection
@section ( "agentstyles" )
    <link href="{{ asset( 'category.css' ) }}" rel="stylesheet">
@endsection
@section( 'content' )
    <main class="container">
        <h1 style="text-align: center; margin-bottom: 7.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">
            <span lang="EN-US" style="">{{ $page->h1 }}</span></h1>
        <!--  <pre style="    white-space: pre-line;
         font-family: Geneva, Arial, Helvetica, sans-serif;"> -->

        <div class="container">

            <h4>Here are the most frequently asked questions. If you didn’t find your question here, you can text to
                our support and we will answer all your questions!</h4>

        </div>
        <div class="container">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="false" aria-controls="collapseOne">
                                What’s the price of advertisement?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <strong>Regular Ad</strong> in 1 category and in 1 city - 10$<br>
                            +1 category – +2$<br>
                            +1 city – +2$<br>

                            <strong>Premium Ad</strong> in 1 category and in 1 city - 60$ per month
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                Regular Ad vs Premium Ad?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            You can bump Premium Ad every hour for free and it looks more eye catching in the
                            listing than Regular ad.<br>
                            So you will have more clients from Premium Ad.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                What types of payment do we accept?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                         data-parent="#accordion">
                        <div class="card-body">
                            Bitcoin.<br>
                            We are for anonymity!<br>
                            <!-- But if you have gift cards (Walmart or HomeDepot) you can text to support and we will
                            credit your balance. -->
                        </div>
                    </div>
                </div>
               <!--  <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can I pay by credit/debit card?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                            You can buy gift card online.<br>
                            HomeDepot <a rel="nofollow"
                                    href="https://homedepot.cashstar.com/store/recipient?ref=THD1&cm_sp=1c02838b-899c-4dd4-8b5f-8d3f4ab1ba78&locale=en-us">here</a><br>
                            Walmart <a rel="nofollow"
                                    href="https://giftcards.walmart.com/ip/Basic-Blue-Walmart-eGift-Card/653984410">here</a><br>
                            Send the card to our support and we will credit your balance!
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </main>
@endsection

@section ( "styles-footer" )
    <link href="{{ asset( 'new-index.css' ) }}" rel="stylesheet">
@endsection