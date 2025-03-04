@include('head.head')

<div class="wrapper" id="wrapper">

@include('head.header')

<h1 style="text-align: center;">Add credits to your balance</h1>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{  route('check') }}" class="form-control formPayment">
                    <input type="number" name="amount" placeholder="Enter replenishment amount" min="20" required class="form-control text-center" >
                    <button type="submit" class="btn btn-success" style="color: #DAD9D8; background: #342336; border-radius: 40px; border: #342336; margin-top: -150px;">
                        Buy
                    </button>
                <!-- <p>You can also buy gift card online.<br>
        HomeDepot <a rel="nofollow" href="https://homedepot.cashstar.com/store/recipient?ref=THD1&cm_sp=1c02838b-899c-4dd4-8b5f-8d3f4ab1ba78&locale=en-us">here</a><br>
        Walmart <a rel="nofollow" href="https://giftcards.walmart.com/ip/Basic-Blue-Walmart-eGift-Card/653984410">here</a><br>
        Send the card to our support and we will credit your balance!</p> -->
                </form>

                <div class="btc-buy" style="margin-top: -250px; text-align: center;">

                    <h2 class="h2">We also accept USDT</h2>
                    <p style="padding-bottom: 20px;">If you would like pay by USDT, please text to our support <a href="mailto:support@secretdesire.co">support@secretdesire.co</a></p>

                        <h2 class="h2">How do I buy Bitcoin?</h2>

                        <p style="padding-bottom: 20px;">You can buy bitcoin from several places:</p>

                        <div>
                            <a target="_blank" rel="noopener noreferrer nofollow" href="https://cash.app/"  >

                                <img  src="/img/icon/btc/cashapp.svg" alt="Cash App" style="padding-right: 20px; padding-bottom: 20px;">
                            </a>
                                
                            <a target="_blank" rel="noopener noreferrer nofollow" href="https://www.coinbase.com/" >
                                
                               
                                <img src="/img/icon/btc/coinbase.svg" alt="Coinbase" style="padding-bottom: 20px;"> 
                            </a>
                                <br>
                            <a target="_blank" rel="noopener noreferrer nofollow" href="https://www.abra.com/" >

                                <img  src="/img/icon/btc/abra.png" alt="Abra" style="padding-right: 20px; padding-bottom: 20px;">
                            </a>
                                
                            <a target="_blank" rel="noopener noreferrer nofollow" href="https://www.bitcoin.com/" >

                                <img src="/img/icon/btc/bitcoin.png" alt="Bitcoin " style=" padding-bottom: 20px;">
                            </a>
                                <br>
                            <a target="_blank" rel="noopener noreferrer nofollow" href="https://brd.com/" style="padding-right: 20px;"> 

                                <img src="/img/icon/btc/brd.png" alt="BRD">
                            </a>
                                
                            <a target="_blank" rel="noopener noreferrer nofollow" href="https://coinatmradar.com/bitcoin-atm-near-me/"  style="color: #5a0e61; font-weight: bold">
                                Bitcoin ATM Machines
                            </a>
                        </div>
                    </div>
            </div>
        </div>

    </main>

@include('footer.footer')
