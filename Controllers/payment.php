<?php

namespace App\Http\Controllers;
use App\adsItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class payment extends Controller
{

    private $paykassa_merchant_id       = '3777';          // идентификатор мерчанта
    private $paykassa_merchant_password = '5ioDfMS36vlL020';     // пароль мерчанта
    private $DOMAIN                     = 'secretdesire.co';

    function check(Request $request){

        Log::debug('Вот кое-какая полезная информация.');
        $amount_USD = $request->amount;
        $amount_BTC = file_get_contents('https://blockchain.info/tobtc?currency=USD&value='.$request->amount);

        $paykassa_merchant_id           = $this->paykassa_merchant_id       ;     // идентификатор мерчанта
        $paykassa_merchant_password     = $this->paykassa_merchant_password ;     // пароль мерчанта

        $system     = 'bitcoin'  ;
        $currency   = 'BTC'      ;
        $user_id    = Auth::user()->id;
        $order_id   = $user_id. time();
        $comment    = 'comment'  ;

        $paykassa = new PayKassaSCI(
            $paykassa_merchant_id,
            $paykassa_merchant_password
        );

        $system_id = [
            "bitcoin"           => 11, // поддерживаемые валюты BTC
            "ethereum"          => 12, // поддерживаемые валюты ETH
            "litecoin"          => 14, // поддерживаемые валюты LTC
            "dogecoin"          => 15, // поддерживаемые валюты DOGE
            "dash"              => 16, // поддерживаемые валюты DASH
            "bitcoincash"       => 18, // поддерживаемые валюты BCH
            "zcash"             => 19, // поддерживаемые валюты ZEC
            "monero"            => 20, // поддерживаемые валюты XMR
            "ethereumclassic"   => 21, // поддерживаемые валюты ETC
            "ripple"            => 22, // поддерживаемые валюты XRP
            "neo"               => 23, // поддерживаемые валюты NEO
            "gas"               => 24, // поддерживаемые валюты GAS
            "bitcoinsv"         => 25, // поддерживаемые валюты BSV
            "waves"             => 26, // поддерживаемые валюты WAVES
            "tron"              => 27, // поддерживаемые валюты TRX
            "stellar"           => 28, // поддерживаемые валюты XLM
        ];

        $res = $paykassa->sci_create_order_get_data(
            $amount_BTC,    // обязательный параметр, сумма платежа, пример: 1.0433
            $currency,  // обязательный параметр, валюта, пример: BTC
            $order_id,  // обязательный параметр, уникальный числовой идентификатор платежа в вашей системе, пример: 150800
            $comment,   // обязательный параметр, текстовый комментарй платежа, пример: Заказ услуги #150800
            $system_id[$system] // обязательный параметр, пример: 12 - Ethereum
        );
        if ($res['error']) {        // $res['error'] - true если ошибка
            echo $res['message'];   // $res['message'] - текст сообщения об ошибке
            // действия в случае ошибки
        } else {
            $wallet     = $res['data']['wallet']    ;   // Адрес для оплаты
            $amount_BTC     = $res['data']['amount']    ;   // Сумма к оплате, может измениться, если комиссия переведена на клинета

//            if (!empty($tag)) {
//                echo 'Send '.$amount_BTC.' '.$currency.' to this address '.$wallet.'. Tag: '.$tag.'. Balance will be updated automatically.';
//            } else {
//                echo 'Send '.$amount_BTC.' '.$currency.' to this address '.$wallet.'. Balance will be updated automatically.';
//            }

            $new_payment = [
                'user_id'       =>  Auth::user()->id,
                'order_id'      =>  $order_id,
                'amount_btc'    =>  $amount_BTC,
                'amount_usd'    =>  $amount_USD,
                'status_id'     =>  1,
            ];
            //dd($new_payment);
            \App\payment::create($new_payment);

        }
        return redirect($res['data']['url']);

    }

    function success(Request $request){
        Log::debug('success');
        Log::debug($request);
        return view('info_pages.success');
    }

    private function createPayment($user_id,$order_id,$btc,$usd){
    }

    function fail(Request $request){
        Log::debug('fail');
        Log::debug($request);
        return view('info_pages.fail');
    }

    function info(Request $request){
        file_put_contents( __DIR__ . '/payinf.json' , json_encode( $request -> all()) . PHP_EOL , FILE_APPEND);
        $paykassa_merchant_id           = $this->paykassa_merchant_id       ;
        $paykassa_merchant_password     = $this->paykassa_merchant_password ;

        $paykassa = new PayKassaSCI(
            $paykassa_merchant_id,      // идентификатор мерчанта
            $paykassa_merchant_password // пароль мерчанта
        );

        $res = $paykassa->sci_confirm_order();

        Log::debug($res);
        if ($res['error']) {        // $res['error'] - true если ошибка
            die($res['message']); 	// $res['message'] - текст сообщения об ошибке
            // действия в случае ошибки
        } else {
            // действия в случае успеха
            $id = $res["data"]["order_id"];        // уникальный числовой идентификатор платежа в вашей системе, пример: 150800
            //$transaction = $res["data"]["transaction"]; // номер транзакции в системе paykassa: 96401
            //$hash = $res["data"]["hash"];               // hash, пример: bde834a2f48143f733fcc9684e4ae0212b370d015cf6d3f769c9bc695ab078d1
            //$currency = $res["data"]["currency"];       // валюта платежа, пример: DASH
            //$system = $res["data"]["system"];           // система, пример: Dash
            //$address = $res["data"]["address"];         // адрес криптовалютного кошелька, пример: Xybb9RNvdMx8vq7z24srfr1FQCAFbFGWLg
//
            //$partial = $res["data"]["partial"];         // настройка приема недоплаты или переплаты, 'yes' - принимать, 'no' - не принимать
            //$amount = (float)$res["data"]["amount"];    // сумма счета, пример: 1.0000000

//            if ($partial === 'yes') {
//                // сумма заявки может не совпадать с полученной суммой, если включен режим частичной оплаты
//                // актально только для криптовалют, поумолчанию 'no'
//            }

            // ваш код...

            Log::debug($request->order_id);

            $data = [
                'func'          => 'sci_confirm_order',
                //'private_hash'  => '4a2238a387a3951848f013933ac45fa5f40713183d7836848ae928c5fdf34dba',
                'private_hash'  => $request->private_hash,
                'sci_id'        => $this->paykassa_merchant_id,
                'sci_key'       => $this->paykassa_merchant_password,
                'domain'        => $this->DOMAIN,
            ];
            $q = "https://paykassa.app/sci/0.3/index.php?".http_build_query($data);
            $res = json_decode( file_get_contents($q),1);

            if($res['error'] == false){
                // успешная оплата

                $res['data']['order_id'];
                $res['data']['amount'];

                /*== обновляем статус оплаты ==*/
                $result = \App\payment::where('order_id' , $res['data']['order_id'])->update(['status_id' => 2]);

                /*== получаем id пользователя чья оплата прошла ==*/
                $user_id    = \App\payment::where('order_id' , $res['data']['order_id'])->select('user_id')->get()->toArray();

                /*== узнаем на сколько была оплата ==*/
                $amount_usd = \App\payment::where('order_id' , $res['data']['order_id'])->select('amount_usd')->get()->toArray();

                /*== получить остаток на счету ==*/
                $money = DB::table('users')->select('money')->where('id' , $user_id[0]['user_id'])->get()->toArray();

                /*== Добавить на средства на остаток  ==*/
                $money = ($amount_usd[0]['amount_usd'] + $money[0]->money);

                $res = DB::table('users')->where('id',$user_id)->update(['money' => $money]);

                if($res){

                    echo $id.'|success'; // обязательно, для подтверждения зачисления платежа
                }else{
                    echo "ERROR";
                }

            }else{
                echo "ERROR";
            }
        }
    }

    function pageMoneyAdd(Request $request){

        return view('buyCredits');
    }

}
