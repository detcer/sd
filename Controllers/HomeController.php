<?php

namespace App\Http\Controllers;

use App\adsItem;
use App\comment;
use App\favorites;
use App\User;
use App\State;
use App\City;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Location;
use Validator;
use Cache;

use function Couchbase\defaultDecoder;

require_once 'OrderHistory.php';

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(['auth','verified']);
    }


    public function admin(){
        $totalMoney             = OrderHistory::getTotalMoney();
        $newOrders              = OrderHistory::newOrders();
        $getTotalBump           = OrderHistory::getTotalBumpSold();
        $getTotalBumpBuy        = OrderHistory::getTotalBumpBuy();
        $getBumpToDayBuy        = OrderHistory::getBumpToDayBuy();
        $getBumpToDay           = OrderHistory::getBumpToDaySold();
        $payment                = OrderHistory::paymentHistory();
        $totalPay               = OrderHistory::totalPayAllTime();
        $totalPayToDay          = OrderHistory::totalPayToDay();
        $totalCommetnAllTime    = DB::select("SELECT COUNT(id) as total FROM comments");
        $totalCommetnToDay      = comment::whereDate('created_at', Carbon::today())->count();
        $userOnline             = $this->getOnlineUser();
        $usersGeo               = $this->getUserGeo();
        return view('admin.page.home',
            [
                'totalMoney'            => $totalMoney->sum,
                'newOrders'             => $newOrders,
                'userOnline'            => $userOnline,
                'usersGeo'              => $usersGeo,
                'getTotalBump'          => $getTotalBump,
                'bumpToDay'             => $getBumpToDay,
                'getTotalBumpBuy'       => $getTotalBumpBuy,
                'getBumpToDayBuy'       => $getBumpToDayBuy,
                'payment'               => $payment,
                'totalPay'              => $totalPay,
                'totalPayToDay'         => $totalPayToDay,
                'totalCommetnToDay'     => $totalCommetnToDay,
                'totalCommetnAllTime'   => $totalCommetnAllTime

            ]
        );
    }


    public  function  getUserGeo(){

        $time       = strtotime("-5 minutes");
        $users      = DB::select("SELECT s.user_id as id, s.ip_address as ip, u.userType as userType , u.name as name  FROM sessions s LEFT JOIN users u ON u.id = s.user_id  where s.last_activity >= '$time' AND NOT s.user_agent = 'Wget/1.18 (linux-gnu)'");

        foreach ($users as &$user){
            $user->ip = Location::get($user->ip);
            if($user->userType == null){
                $user->userType = 'Guest';
            }
        }

        return $users;
    }

    public function getOnlineUser(){

        $time       = strtotime("-5 minutes");
        $countGuest = DB::select("SELECT count(id) as total FROM sessions where last_activity >= $time AND  user_id is null AND NOT `user_agent` = 'Wget/1.18 (linux-gnu)'");
        $countGuest = $countGuest[0];

        $allUser    = DB::select("SELECT count(id) as total FROM sessions where last_activity >= $time  AND NOT `user_agent` = 'Wget/1.18 (linux-gnu)'");
        $allUser    = $allUser[0];

        $provider   = DB::select("SELECT count(id) as total FROM users WHERE id IN( SELECT `user_id` FROM sessions WHERE last_activity >= $time AND NOT user_id is null) AND  userType = 'provider' ");
        $provider   = $provider[0];

        $client     = DB::select("SELECT count(id) as total FROM users WHERE id IN( SELECT `user_id` FROM sessions WHERE last_activity >= $time AND NOT user_id is null) AND  userType = 'client' ");
        $client     =   $client[0];

        $res = [
            'guest'     => $countGuest,
            'allUser'   => $allUser,
            'provider'  => $provider,
            'client'    => $client,
        ];

        return $res;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->userType == "admin"){

            return redirect()->route('admin-root');
        }

        if(Auth::user()->userType == "client"){

            $user               = Auth::user();
            $countFav           = DB::select("SELECT COUNT(id) as count FROM favorites WHERE user_id = $user->id");
            $countFav           = $countFav[0]->count;

            $countCommentsForMy = DB::select("SELECT COUNT(id) as count FROM comments WHERE comment_for_user_id = $user->id AND author_type = 'provider' AND answer_for_comment_id is null AND block = 0");
            $countCommentsForMy = $countCommentsForMy[0]->count;

            $countComments      = DB::select("SELECT COUNT(id) as count FROM comments WHERE author_id = $user->id AND author_type = 'client' AND answer_for_comment_id is null AND block = 0");
            $countComments      = $countComments[0]->count;



            return view('home', [
                'user'                  => $user,
                'countFav'              => $countFav,
                'countCommentsForMy'    => $countCommentsForMy,
                'countComments'         => $countComments,
            ]);

        }else if(Auth::user()->userType == "provider"){

            $money              = 0;
            $timeNow            = Carbon::now()->timestamp;
            $adsItem = adsItem::where( 'user_id' , Auth::user() -> id ) -> get() -> toArray();
            foreach ( $adsItem as &$userAd ) {
                $userAd[ 'state_name' ] = State::whereId( $userAd[ 'state' ] ) -> first() -> title;
                $userAd[ 'cityName' ] = DB::select( "SELECT `title` FROM `new_cities` WHERE `id` IN (SELECT `city_id` FROM `users_cities` WHERE `user_id` = '" . $userAd[ 'id' ] . "' ) " );
            }
            $userId             = Auth::user()->id;
            $countComments      = DB::select("SELECT COUNT(id) as count FROM `comments` WHERE `comment_for_user_id` = $userId AND answer_for_comment_id is NULL AND block = 0");

            // foreach ($adsItem as &$item) {
            //     $cityNames = DB::select("SELECT `name` FROM `cities` WHERE `id` IN (SELECT `city_id` FROM `users_cities` WHERE `user_id` = $item[id]) ");
            //     $item['cityName'] = $cityNames;
            // }
            foreach ($adsItem as &$item) {
                $item['src_foto'] = json_decode($item['src_foto']);
                //foreach ($item['src_foto'] as &$fileName){
                //    $fileName = public_path("app/public/$fileName");
                //}
                /* == cчитаем сколько дней прошло с последнего бампа */

                $lastTimeBamps           = strtotime($item['lastTimeBamps']);
                $item['dayFromLastBump'] = ($timeNow  - $lastTimeBamps);
                $item['dayFromLastBump'] = round($item['dayFromLastBump'] / (60 * 60 * 24));

                /*== сколько дней осталось пользоваться объялением == */
                $item['dayFromLastBump'] =  (int) round(30 - $item['dayFromLastBump']);
            }
            return view('home',[
                    'ADS'           => $adsItem,
                    'money'         => Auth::user()->money,
                    'bumps'         =>Auth::user()->bumps,
                    'countComments' => $countComments[0]->count
            ]);
        }
    }


    public function myReviews(){
        $id = Auth::user()->id;

        $reviews =comment::where('autor', $id)->get();

        return view('user.client.myReviews', ['reviews' => $reviews]);
    }

    public function update(Request $request, $id){

        $data = $request->all();
        $USER = User::find($id);

        $USER->description = $data['description'] ?? '';

        if(empty($USER->phone)){
            $USER->phone = $data['phone'];
        }
        $USER->update();

        return redirect('home');
    }

    public function favorite(){

        $user   = Auth::user()->id;
        $models = DB::select("SELECT * FROM ads_items WHERE id IN ( SELECT model_id FROM favorites WHERE user_id = '$user')");
        //dd($models);
        foreach ($models as $item){
            $item->src_foto   = json_decode($item->src_foto);
            $item->comments   = comment::where('comment_for_user_id', $item->user_id)->where('answer_for_comment_id',null)->count();
        }
        //dd($models);
        return view('user.client.favorite', ['models' => $models]);
    }

    /**
     * Display a listing of the myform.
     *
     * @return \Illuminate\Http\Response
     */
    public function myform()
    {
        return view('ajax');
    }


    /**
     * Display a listing of the myformPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function myformPost(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'userType'  => ['required'],
        ]);


        if ($validator->passes()) {


            return response()->json(['success'=>'Added new records.']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
