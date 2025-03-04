<?php

namespace App\Http\Controllers;

use App\bump_history;
use App\money_history;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\order_history;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderHistory extends Controller
{
    static public function addOrder(){
        $order = new order_history;
        $order->user = Auth::User()->id;
        $order->save();
        return $order->id;
    }

    static public function addHistoryMoney($money){
        $order = new money_history;
        $order->count = $money;
        $order->order = self::addOrder();
        $order->save();
        return $order->id;
    }

    static public function paymentHistory(){
        return DB::select("SELECT p.*, u.name as name  FROM payments p JOIN users u  ON  p.user_id = u.id");
    }

    static public function totalPayAllTime(){
        return DB::select("SELECT SUM(`amount_usd`) as amount_usd, SUM(`amount_btc`) as amount_btc FROM `payments` WHERE `status_id` =2 ");
    }

    static public function totalPayToDay(){
        $time   =  strtotime('-1 day');
        $res = DB::select("SELECT SUM(`amount_usd`) as amount_usd, SUM(`amount_btc`) as amount_btc FROM `payments` WHERE `status_id` = 2 AND updated_at = $time ");

        if($res[0]->amount_btc == null){
            $res[0]->amount_btc = 0;
        }
        if($res[0]->amount_usd == null){
            $res[0]->amount_usd = 0;
        }

        return $res;
    }


    /*
     * $type = 'sale' || 'buy';
     *
     * */
    static public  function addHistoryBump($bump ,$type){
        $order = new bump_history;
        $order->order = self::addOrder();
        $order->type  = $type;
        $order->count = $bump;
        $order->save();
        return $order->id;
    }

    public static function getTotalMoney(){
      $res = DB::select('SELECT SUM(count) as sum FROM money_histories ');
      return $res[0];
    }

    public function getMoneyByDay(){

    }

    public static function newOrders(){
        return order_history::whereDate('created_at', Carbon::today())->count();
    }


    public static function getTotalBumpSold(){
        $res = DB::select("SELECT sum(count) as count FROM `bump_histories` WHERE type = 'sale'");
        if(count($res)){
            return    $res[0]->count;
        }else{
            return 0;
        }
    }

    public static function getBumpToDaySold(){
        return bump_history::where('type','sale')->whereDate('created_at', Carbon::today())->sum('count');
    }

    public static function getTotalBumpBuy(){
        $res = DB::select("SELECT sum(count) as count FROM `bump_histories` WHERE type = 'buy'");
        if(count($res)){
            return    $res[0]->count;
        }else{
            return 0;
        }
    }

    public static function getBumpToDayBuy(){
        return bump_history::where('type','buy')->whereDate('created_at', Carbon::today())->sum('count');
    }


    public function getBumpByDay(){

    }

    public function getAllMoneyUser(){

    }

    public function getAllMoneyUserToDay(){

    }




}
