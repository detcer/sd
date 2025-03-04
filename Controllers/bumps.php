<?php

namespace App\Http\Controllers;

use App\adsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class bumps extends Controller{

    public function buyBumps(){
        return view('buyBumps');
    }

    public function checkBumps(Request $request){

        if($request['bumps'] == 20){
            $request['price'] = 18;
        }else if($request['bumps'] == 30){
            $request['price'] = 26;
        }else if($request['bumps'] == 40){
            $request['price'] = 34;
        } else if($request['bumps'] == 100){
            $request['price'] = 80;
        }else if($request['bumps'] == 200){
            $request['price'] = 150;
        }else {
            $request['price'] = 0;
        }

        $user = Auth::user();

        if($request['price'] != 0 && $user['money'] >= $request['price']){
            $msg = [
                "msg" => "true",
                "money" => $request['price'],
                "bumps" => $request['bumps'],
            ];
        }else{
            $msg = ["msg" => "false"];
        }

        echo json_encode($msg);
    }

    public function payBumps(Request $request){
        $user = Auth::user();

        $user->money = $user->money - $request['money'];
        $user->bumps = $user->bumps + $request['bumps'];

        OrderHistory::addHistoryBump($request['bumps'],'buy');
        OrderHistory::addHistoryMoney($request['money']);


        $user->update();
        $msg = ["msg" => "true"];
        echo json_encode($msg);
    }

    public function moveToTop($ads_id){

        $balanceUSD     =  Auth::user()->money;
        $balanceBumps   =  Auth::user()->bumps;
        $USER           =  Auth::user();

        $countCity      = DB::select("SELECT COUNT(id) as count FROM `users_cities` WHERE `user_id` = $ads_id");
        $countCity      = $countCity[0]->count;
        $countServices  = DB::select("SELECT bodyrubs,dommination,femaleescort,maleescort,strippers,transsexual FROM `ads_items` WHERE `id` = $ads_id");

        $rate           = DB::select("SELECT rate FROM `ads_items` WHERE `id` = $ads_id");
        $rate           = $rate[0]->rate;
        $count          = 0;

        //TODO add this configuration in database table
        $cityBumpPrice = 2;
        $serviceBumpPrice = 2;
        $bumpDiscount = 2;

        $serviceBumpTotalPrice = 0;
        $cityBumpTotalPrice = 0;

        if($rate == 'premium'){

            $result = $this->premiumAdMoveTotop($ads_id,true);
            return response()->json($result, 200);
            die();

        }else{

            foreach ($countServices[0] as $item) {
                $count += $item;
            }

            $countServices  = $count;

            $cityBumpTotalPrice = $countCity * $serviceBumpPrice;
            $serviceBumpTotalPrice = $countServices * $serviceBumpPrice;

            $total = ($cityBumpTotalPrice + $serviceBumpTotalPrice - $bumpDiscount);

            if($total == 0 || $total < 0){
                $total = 1;
            }

            $afterBuyUSD    = ($balanceUSD   - $total);
            $afterBuyBumps  = ($balanceBumps - $total);


            $date = Carbon::now()->format('m/d/Y H:i');

            if($afterBuyBumps == 0 || $afterBuyBumps > 0){


                OrderHistory::addHistoryBump(1,'sale');
                $USER->bumps = $afterBuyBumps;
                $USER->update();

                $res = DB::table('ads_items')->where('id',$ads_id)->update(['lastTimeBamps' => $date]);

                $result = ['error' => 0];

            }elseif($afterBuyUSD == 0 || $afterBuyUSD > 0){

                $USER->money = $afterBuyUSD;
                $USER->update();


                $res = DB::table('ads_items')->where('id',$ads_id)->update(['lastTimeBamps' => $date]);

                $result = ['error' => 0];

            }elseif(($afterBuyUSD < 0 || $afterBuyUSD == 0) && ($afterBuyBumps < 0 || $afterBuyBumps == 0)){

                $result = ['error' => 1];

            }else{

                $result   = ['error' => 1];
            }

        }


        return response()->json($result, 200);

    }

    public function costMoveTop($ads_id){

        $balanceUSD     =  Auth::user()->money;
        $balanceBumps   =  Auth::user()->bumps;

        $countCity      = DB::select("SELECT COUNT(id) as count FROM `users_cities` WHERE `user_id` = $ads_id");
        $countCity      = $countCity[0]->count;
        $countServices  = DB::select("SELECT bodyrubs,dommination,femaleescort,maleescort,strippers,transsexual FROM `ads_items` WHERE `id` = $ads_id");

        $rate           = DB::select("SELECT rate FROM `ads_items` WHERE `id` = $ads_id");
        $rate           = $rate[0]->rate;
        $count          = 0;
        
        //TODO add this configuration in database table
        $cityBumpPrice = 2;
        $serviceBumpPrice = 2;
        $bumpDiscount = 2;

        $serviceBumpTotalPrice = 0;
        $cityBumpTotalPrice = 0;



        foreach ($countServices[0] as $item) {
            $count += $item;
        }
        $countServices  = $count;

        if($rate == 'premium'){

            $result = $this->premiumAdMoveTotop($ads_id);
            return response()->json($result, 200);

        }

        $cityBumpTotalPrice = $countCity * $serviceBumpPrice;
        $serviceBumpTotalPrice = $countServices * $serviceBumpPrice;

        $total = ($cityBumpTotalPrice + $serviceBumpTotalPrice - $bumpDiscount);

        if($total === 0 || $total < 0){
            $total = 1;
        }

        $afterBuyUSD    = ($balanceUSD   - $total);
        $afterBuyBumps  = ($balanceBumps - $total);

        if($afterBuyBumps == 0 || $afterBuyBumps > 0){

            $result   = ['noresurs' => 0,'error' => 0,'balance' => $balanceBumps, 'total' => $total, 'afterBuy' => $afterBuyBumps,'currency' => 'Bumps'];

        }elseif($afterBuyUSD != 0 || $afterBuyUSD > 0){

            $result   = ['noresurs' => 0,'error' => 0,'balance' => $balanceUSD, 'total' => $total, 'afterBuy' => $afterBuyUSD,'currency' => '$'];

        }elseif(($afterBuyUSD < 0 || $afterBuyUSD == 0) && ($afterBuyBumps < 0 || $afterBuyBumps == 0)){

            $result = ['noresurs' => 1,'error' => 0];

        }else{
            $result   = ['error' => 1,'noresurs' => 1];
        }


        return response()->json($result, 200);


    }

    public function croneMoveToTop(){

        $models   = adsItem::where('croneBamp', '!=',0)->get()  ;
        $timeNow  = Carbon::now()->timestamp                    ; // время сейчас
        $date     = Carbon::now()->format('m/d/Y H:i:s');

        foreach ($models as &$res) {

            $lastTimeBupm = strtotime($res->lastTimeBamps)      ;
            $time         = ($timeNow - $lastTimeBupm)          ; // сколько времени прошло споследнего бампа

            if($time == 3600 || $time > 3600){
                $thisModel                  = adsItem::find($res->id);
                $thisModel->lastTimeBamps   = $date;
                $thisModel->croneBamp       = ($thisModel->croneBamp - 1);
                $thisModel->save();
            }

        }

    }

    public function lastDayBump(){

    }

    public function block(){

        $models   = adsItem::all()  ;
        $timeNow  = Carbon::now()->timestamp                    ; // время сейчас

        foreach ($models as &$res) {

            $lastTimeBupm = strtotime($res->lastTimeBamps)      ;
            $time         = ($timeNow - $lastTimeBupm)          ; // сколько времени прошло споследнего бампа

            if($time == 2592000 || $time > 2592000){
                $thisModel              = adsItem::find($res->id);
                $thisModel->status      = 0;
                $thisModel->block       = 1;
                $thisModel->save();
            }

        }
    }


    private function premiumAdMoveTotop($ads_id , $update = false){

        $adsItem      = adsItem::find($ads_id);
        $lastTimeBupm = strtotime($adsItem->lastTimeBamps);
        $timeNow      = Carbon::now()->timestamp            ; // время сейчас
        $time         = ($timeNow - $lastTimeBupm)          ; // сколько времени прошло споследнего бампа

        if($time == 3600 || $time > 3600){

            if($update){
                $date                       = Carbon::now()->format('m/d/Y H:i:s');
                $adsItem                    = adsItem::find($ads_id);
                $adsItem->lastTimeBamps     = $date;
                $adsItem->save();
            }

            $result = [
                'error'     => 0,
                'result'    => 1,
                'noresurs'  => 0,
                'premium'   => 1
            ];

        }else{

            $result = [
                'error'     => 0,
                'result'    => 0,
                'noresurs'  => 1,
                'premium'   => 1
            ];

        }

        return $result;
    }

}
