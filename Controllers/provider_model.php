<?php

namespace App\Http\Controllers;
use App\adsItem;
use App\cities;
use App\comment;
use App\countries;
use App\favorites;
use App\params_brestSize;
use App\params_currency;
use App\params_ethnicity;
use App\params_hairColor;
use App\params_hairLength;
use App\params_height;
use App\params_paymentAccepted;
use App\params_services;
use App\Repositories\ServiceRepository;
use App\states;
use App\users_cities;
use http\Client\Curl\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class provider_model extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function prettyUrl ( string $string ) {
        $string = preg_replace( "/[^a-zA-Z0-9]+/" , "" , $string );

        // $string = str_replace( ' ' , "-" , $string );
        $string = strlen($string) > 40 ? substr($string,0,40) : $string;

        return trim(strtolower( $string ));
    }
    public function index(){
    }


    public function getCityByStateId($id){
        $state  =   cities::all()->where('state_id', $id);
        return response()->json($state);
    }

    public function loadPageAdd(){
        // POPULATING SLUTS
            // $items = adsItem::all();
            // foreach ( $items as $key => $value ) {
            //     adsItem::where( 'id' , $value -> id )->update( [ 'slug' => MainHelper::prettyUrl( $value -> title ) . "-" . $value -> age ] );
            // }
            // exit('done');
        // POPULATING SLUTS

        $servicesRepo = new ServiceRepository();
        $services = $servicesRepo->get();
        
        $params_brestSize           =   params_brestSize::all()         ;
        $params_currency            =   params_currency::all()          ;
        $params_ethnicity           =   params_ethnicity::all()         ;
        $params_hairColor           =   params_hairColor::all()         ;
        $params_hairLength          =   params_hairLength::all()        ;
        $params_height              =   params_height::all()            ;
        $params_paymentAccepted     =   params_paymentAccepted::all()   ;
        $params_services            =   $services;
        $countries                  =   countries::all()->where('sortname', 'US');
        $state                      =   states::all()->where('country_id', '231');


        return view('user.provider.new-model',[
            'params_brestSize'          =>  $params_brestSize,
            'params_currency'           =>  $params_currency,
            'params_ethnicity'          =>  $params_ethnicity,
            'params_hairColor'          =>  $params_hairColor,
            'params_hairLength'         =>  $params_hairLength,
            'params_height'             =>  $params_height,
            'params_paymentAccepted'    =>  $params_paymentAccepted,
            'params_services'           =>  $params_services,
            'countries'                 =>  $countries,
            'state'                     =>  $state

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $requst){
        file_put_contents( __DIR__ . '/addes.txt' , json_encode( $requst -> all() ) . PHP_EOL . PHP_EOL , FILE_APPEND );
        $requst['servises']         = array_flip($requst['servises']);
        $requst['currency']         = array_flip($requst['currency']);
        $requst['payment_accepted'] = array_flip($requst['payment_accepted']);

        foreach ($requst['payment_accepted'] as $key => $val){
            $requst[$key] = 1;
        }
        unset($requst['payment_accepted']);


        foreach ($requst['currency'] as $key => $val){
            $requst[$key] = 1;
        }
        unset($requst['currency']);


        foreach ($requst['servises'] as $key => $val){
            $requst[$key] = 1;
        }
        unset($requst['servises']);

        $img = $requst->file('src_foto');
        $arr_lan = count($img);
        $path = [];

            for ($i=0; $i<$arr_lan; $i++){
                $path[$i] = $img[$i]->store('src_foto', 'public');
            }
            $dataPhoto = json_encode($path);


        $userID         = Auth::user()->id      ;
        $balanse        = Auth::user()->money   ;
        $dataRequst     = $requst->all()        ;
        // dd($dataRequst);
        if ( ! isset( $dataRequst[ 'city' ] ) || ! isset( $dataRequst[ 'state' ] ) ) {
            return back() -> withInput() -> withErrors([ 'message' => 'City or State was not set, please fix.' ] );
        }
        $croneBamp      = 0                     ;

        if( isset($dataRequst['selectCroneBampsFlag']) ){
            $croneBamp =  $dataRequst['croneBamps'];
        }else{
            $croneBamp = 0;
        }

        if (($balanse - $dataRequst['totalPrice']) < 0 ){
            return redirect('home');
        }elseif (isset($dataRequst['bamps']) && $dataRequst['bamps'] > 0) {

            OrderHistory::addHistoryBump($dataRequst['bamps'],'buy');
            $user = Auth::user();
            $user->bumps = $user->bumps + $dataRequst['bamps'];
            $user->update();
        }

        $user = Auth::user();
        $user->money = $user->money - $dataRequst[ 'totalPrice' ];
        $user->update();
        if ( ! isset( $dataRequst[ 'description' ] ) ) {
            $dataRequst[ 'description' ] = ' ';
        }
//dd($dataRequst);
        // dd($this -> prettyUrl( $dataRequst[ 'title' ] ) . '-' . $dataRequst[ 'age' ]);
        $data = [
            'slug' => $this -> prettyUrl( $dataRequst[ 'title' ] ) . '-' . $dataRequst[ 'age' ],
            'src_foto'          => $dataPhoto                           ,
            'user_id'           => $userID                              ,
            'name'              => $dataRequst['name']                  ,
            'phone'             => $dataRequst['phone']                 ,
            'title'             => $dataRequst['title']                 ,
            'description'       => $dataRequst['description'] ?? ' '    ,
            'district'          => $dataRequst['district']              ,
            'country'           => $dataRequst['country']               ,
            'state'             => $dataRequst['state']                 ,
            'city'              => 1              ,
            'bodyrubs'         => $bodyrubs       = $dataRequst['bodyrubs']      ?? false   ,
            'dommination'       => $dommination     = $dataRequst['dommination']    ?? false   ,
            'femaleescort'     => $femaleescort   = $dataRequst['femaleescort']  ?? false   ,
            'maleescort'       => $maleescort     = $dataRequst['maleescort']    ?? false   ,
            'strippers'         => $strippers       = $dataRequst['strippers']      ?? false   ,
            'transsexual'       => $transsexual     = $dataRequst['transsexual']    ?? false   ,

            'height'            => $dataRequst['height']            ,
            'age'               => $dataRequst['age']               ,
            'height'            => $dataRequst['height']            ,
            'hair_color'        => $dataRequst['hair_color']        ,
            'hair_length'       => $dataRequst['hair_length']       ,
            'ethnicity'         => $dataRequst['ethnicity']         ,
            'brest_size'        => $dataRequst['brest_size']        ,

            'incall_30m'        => $incall_30m  =   $dataRequst['incall_30m_rate']   ?? false,
            'incall_1h'         => $incall_1h   =   $dataRequst['incall_1h_rate']    ?? false,
            'incall_2h'         => $incall_2h   =   $dataRequst['incall_2h_rate']    ?? false,
            'incall_24h'        => $incall_24h  =   $dataRequst['incall_24h_rate']   ?? false,
            'outcall_30m'       => $outcall_30m =   $dataRequst['outcall_30m_rate']  ?? false,
            'outcall_1h'        => $outcall_1m  =   $dataRequst['outcall_1h_rate']   ?? false,
            'outcall_2h'        => $outcall_2h  =   $dataRequst['outcall_2h_rate']   ?? false,
            'outcall_24h'       => $outcall_24h =   $dataRequst['outcall_24h_rate']  ?? false,

            'currency_visa'                 => $currency_visa               =   $dataRequst['currency_visa']               ?? false,
            'currency_mastercard'           => $currency_mastercard         =   $dataRequst['currency_mastercard']         ?? false,
            'currency_ameerican_express'    => $currency_ameerican_express  =   $dataRequst['currency_ameerican_express']  ?? false,
            'currency_discover'             => $currency_discover           =   $dataRequst['currency_discover']           ?? false,

            'currency_cash'                 => $currency_cash               =   $dataRequst['currency_cash']               ?? false,
            'currency_btc'                  => $currency_btc                =   $dataRequst['currency_btc']                ?? false,
            'currency_other'                => $currency_other              =   $dataRequst['currency_other']              ?? false,

            'custom_currency'     => $dataRequst['custom_currency'] ?? '',

            'USD'  => $dataRequst['USD'] ?? false,
            'GBP'  => $dataRequst['GBP'] ?? false,
            'EUR'  => $dataRequst['EUR'] ?? false,

            'social_site'         => $social_site                 =   $dataRequst['social_site']                 ?? '',
            'social_fb'           => $social_fb                   =   $dataRequst['social_fb']                   ?? '',
            'social_instagam'     => $social_instagam             =   $dataRequst['social_instagam']             ?? '',
            'social_twitter'      => $social_twitter              =   $dataRequst['social_twitter']              ?? '',
            'social_google_plus'  => $social_google_plus          =   $dataRequst['social_google_plus']          ?? '',
            'croneBamp'           => $croneBamp             ,
            'rate'                => $dataRequst['rate']    ,
            'lastTimeBamps'       => Carbon::now()->format('m/d/Y H:i:s'),
            'croneBamp'           => $croneBamp

        ];
        $model = adsItem::create( $data );
        if ( is_array( $dataRequst[ 'city' ] ) ) {
            foreach ( $dataRequst[ 'city' ] as $item ) {
                users_cities::create([
                    'user_id' => $model->id,
                    'city_id' => $item
                ]);
            }
        } else {
            users_cities::create([
                'user_id' => $model -> id,
                'city_id' => $dataRequst[ 'city' ]
            ]);
        }
        return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function saveComment(Request $request){

    /*
     *
     *
     'autor'       => $request->autor, // раньше автором мог быть модель от провайдер
      сейчас поменяли что автором может быть только провайдер от всех моделей
     * */
        $data = [
            'text'                  => $request->text                   ,
            'comment_for_user_id'   => $request->comment_for_user_id    ,
            'ratting'               => $request->ratting                ,
            'author_id'             => Auth::user()->id                 ,
            'author_type'           => Auth::user()->userType           ,
            'block'                 => 0
        ];

        if(isset($request->answer_for_comment_id)){
            $data['answer_for_comment_id'] = $request->answer_for_comment_id;
        }
        comment::create($data);
        return redirect()->back()->withInput();
    }

    public function toggleFavorite(Request $request){

        $user_id = Auth::user()->id;
        $model_id = $request['id'];

	$fav = favorites::where('model_id', $model_id)->where('user_id', $user_id)->count();

        if($fav == 0){
            $data = [
              'user_id' => $user_id,
              'model_id' => $model_id,
            ];
            favorites::create($data);
            $msg = ['msg' => 'add'];
        }else if($fav == 1){
            favorites::where('user_id', $user_id)->where('model_id', $model_id)->delete();
            $msg = ['msg' => 'remove'];
        }else{
            $msg = ['msg' => 'errors'];
        }

        echo json_encode($msg);
    }

    public function reviewsAbouteMy(){
// Дописать
//        $userId        = Auth::user()->id;
//        $comments      = DB::select("SELECT *  FROM `comments` WHERE `user_id` IN (SELECT id FROM ads_items WHERE user_id = $userId)");
//        return view('user.my-reviews',[
//            'comments' => $comments
//        ]);
    }



    public function viewModel( $slut ) {
        if ( $slut !== strtolower( $slut ) ) abort( 404 );
        $id = adsItem::whereSlug( $slut ) -> first();
        if ( null == $id ) $id = adsItem::whereId( $slut ) -> firstOrFail();
        $id = $id -> id;     
        $model       = adsItem::select(
            "ads_items.*",
            "new_states.title as state_name",
            "params_hair_colors.name as hair_colorName",
            "params_hair_lengths.name as hair_lengthsName",
            "params_ethnicities.name as params_ethnicitiesName",
            "params_heights.name as height",
            "params_brest_sizes.name as brest_size"
        )->where('ads_items.id',$id)
            ->join("new_states", "ads_items.state","new_states.id")
            ->join("params_hair_colors","ads_items.hair_color","params_hair_colors.id")
            ->join("params_hair_lengths","ads_items.hair_length","params_hair_lengths.id")
            ->join("params_ethnicities","ads_items.ethnicity","params_ethnicities.id")
            ->join("params_heights","ads_items.height","params_heights.id")
            ->join("params_brest_sizes","ads_items.brest_size","params_brest_sizes.id")
            ->get()->toArray();

        $responseUser    = '';
        $providerId      = $model[0]['user_id'];
        $comments        = DB::select("SELECT
                                                    comments.id as comments_id,
                                                    comments.answer_for_comment_id as answer_for_comment_id,
                                                    comments.text as text,
                                                    comments.ratting as ratting,
                                                    comments.created_at as created_at,
                                                    autors.name as autors_name,
                                                    autors.id as autors_id,
                                                    userTarget.id as userTargetId,
                                                    userTarget.name as userTargetName
                                                FROM
                                                    `comments`
                                                JOIN users AS autors
                                                ON
                                                    autors.id = comments.author_id
                                                JOIN users AS userTarget
                                                ON
                                                    userTarget.id = comments.comment_for_user_id
                                                WHERE
                                                    answer_for_comment_id IS NULL    
                                                    AND 
                                                    comments.block = 0 
                                                    AND comment_for_user_id = $providerId
                                                ORDER BY created_at DESC ");
        $comments = json_decode(json_encode($comments),1);

        foreach ($comments as &$comment){
            $answer             = DB::select("SELECT * FROM `comments` WHERE `answer_for_comment_id` = '$comment[comments_id]'");
            $comment['answer']  = $answer;
        }

        $showFormAnsever    = false;
        if(Auth::user()){

            $fav        = favorites::where('model_id', $id)->where('user_id', Auth::user()->id)->count();
            $userType   = Auth::user()->userType;

            if(Auth::user()->userType == 'provider'){
                $showFormAnsever = true;
                $responseUser    = 'Provider';
            }
        }else{
            $fav = [];
            $userType = 'client';
        }

        $model              = $model[0];
        $model['src_foto']  = json_decode($model['src_foto']);
        $cityNames          = DB::select("SELECT `title` as `name` FROM `new_cities` WHERE `id` IN (SELECT `city_id` FROM `users_cities` WHERE `user_id` = $model[id]) ");
        $model['cityName']  = $cityNames;
        $view               = 'user.provider.card';
        //dd($comments);
        return view($view, [
            'model'             => $model,
            'userType'          => $userType,
            'user'              => Auth::user(),
            'comment'           => $comments,
            'favorites'         => $fav,
            'showFormAnsever'   => $showFormAnsever,
            'responseUser'      => $responseUser,
            'providerId'        => $providerId,
        ]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model       = adsItem::select(
                                        "ads_items.*",
                                        "new_states.title as state_name",
                                        "new_cities.title as city_name",
                                        "params_hair_colors.name as hair_colorName",
                                        "params_hair_lengths.name as hair_lengthsName",
                                        "params_ethnicities.name as params_ethnicitiesName"
                                )->where('ads_items.id',$id)
                                ->join("new_states", "ads_items.state","new_states.id")
                                ->join("new_cities","ads_items.city","new_cities.id")
                                ->join("params_hair_colors","ads_items.hair_color","params_hair_colors.id")
                                ->join("params_hair_lengths","ads_items.hair_length","params_hair_lengths.id")
                                ->join("params_ethnicities","ads_items.ethnicity","params_ethnicities.id")
                                ->get()->toArray();

        $model              = $model[0];
        $model['src_foto']  = json_decode($model['src_foto']);

        return view('user.provider.card', [
            'model'         => $model,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editView($id)
    {

        $servicesRepo = new ServiceRepository();
        $services = $servicesRepo->get();
        $model           = adsItem::find($id);
        $model->src_foto = json_decode($model->src_foto);

        $params_brestSize           =   params_brestSize::all()         ;
        $params_currency            =   params_currency::all()          ;
        $params_ethnicity           =   params_ethnicity::all()         ;
        $params_hairColor           =   params_hairColor::all()         ;
        $params_hairLength          =   params_hairLength::all()        ;
        $params_height              =   params_height::all()            ;
        $params_paymentAccepted     =   params_paymentAccepted::all()   ;
        $params_services            =   $services          ;
        $countries                  =   countries::where('sortname', 'US') -> get() ;
        $state                      =   \App\State::where('country_id', '231') -> get();
        $city                       =   \App\City::where('state_id', $model->state) -> get();
        $modelCities                =   users_cities::select('city_id')->where('user_id',$id)->get()->toArray();
        $modelCity =[];
        foreach ($modelCities as $item) {
            $modelCity[]  = $item['city_id'];
        }


        /*==
            параметры для калькуляции стоимости обновления
            То что переаднно изначально, считать не нужно
        ==*/

        $servicesAmount = 0;
        $citiesAmount   = count($modelCity);

        $servicesAmount += $model->bodyrubs    ;
        $servicesAmount += $model->dommination  ;
        $servicesAmount += $model->femaleescort;
        $servicesAmount += $model->maleescort  ;
        $servicesAmount += $model->strippers    ;
        $servicesAmount += $model->transsexual  ;

        $startCost      = json_encode(['city'=> $citiesAmount, 'services' => $servicesAmount, 'rate' => $model['rate']]);
        /*========================*/
        
        return view('user.provider.modelUpdate', [
            'model'                     =>  $model                  ,
            'params_brestSize'          =>  $params_brestSize       ,
            'params_currency'           =>  $params_currency        ,
            'params_ethnicity'          =>  $params_ethnicity       ,
            'params_hairColor'          =>  $params_hairColor       ,
            'params_hairLength'         =>  $params_hairLength      ,
            'params_height'             =>  $params_height          ,
            'params_paymentAccepted'    =>  $params_paymentAccepted ,
            'params_services'           =>  $params_services        ,
            'countries'                 =>  $countries              ,
            'state'                     =>  $state                  ,
            'city'                      =>  $city                   ,
            'modelCity'                 =>  $modelCity              ,
            'startCost'                 =>  $startCost              ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $requst, $id){

        file_put_contents( __DIR__ . '/edits.txt' , json_encode( $requst -> all() ) . PHP_EOL . PHP_EOL , FILE_APPEND );
        $user         = Auth::user();
        $userID       = $user->id;
        $dataRequst   = $requst->all();
        $countBamps   = $dataRequst['bamps'] ?? 0;
        OrderHistory::addHistoryBump($countBamps,'buy');
        $user->bumps  = ($user->bumps + $countBamps);

        $moneyAfter = ($user->money - $dataRequst['updateTotalPrice']);

        if($moneyAfter < 0){
            return redirect()->back()->withInput();
        }else{
            $user->money = $moneyAfter;
            $user->update();
        }

        $requst['servises']         = array_flip($requst['servises']);
        $requst['currency']         = array_flip($requst['currency']);
        $requst['payment_accepted'] = array_flip($requst['payment_accepted']);

        foreach ($requst['payment_accepted'] as $key => $val){
            $requst[$key] = 1;
        }
        unset($requst['payment_accepted']);


        foreach ($requst['currency'] as $key => $val){
            $requst[$key] = 1;
        }
        unset($requst['currency']);


        foreach ($requst['servises'] as $key => $val){
            $requst[$key] = 1;
        }
        unset($requst['servises']);


        $model           = adsItem::find($id);
        $src_foto = json_decode($model->src_foto, true);

        $for_del = $requst->input('for_del');
        $deleted = json_decode($for_del[0], true);

        if($deleted){
            foreach ($deleted as $k){
                $path = __DIR__ . "/../../../storage/app/public/" . $src_foto[$k];
                if(is_file($path)){
                    //Use the unlink function to delete the file.
                    unlink($path);
                }
                unset($src_foto[$k]);
            }
        }

        $img = $requst->file('src_foto');

        if($img){
            foreach ($img as $photo){
                $path = $photo->store('src_foto', 'public');
                array_push($src_foto, $path);
            }
        }

        $dataPhoto = json_encode($src_foto);

        users_cities::where('user_id', $id)->delete();
        if(isset($requst->selectCroneBampsFlag)){
            $croneBamps = $requst->croneBamps;
        }else{
            $croneBamps = 0;
        }

        $arrFoto = [];
        foreach (json_decode($dataPhoto,1) as $item) {
            $arrFoto[] = $item;
        }
        $dataPhoto = json_encode($arrFoto,1);
        // $requst['description'] = preg_replace('~\\R+~', '', $requst['description']);
        // dd($requst['description']);

        $ASD = adsItem::find($id);
        $descriptions = (string)$requst['description'];
            $ASD->src_foto     = $dataPhoto                     ;
            $ASD->user_id      = $userID                        ;
            $ASD->title        = $requst['title']               ;
            $ASD->name         = $requst['name']                ;
            $ASD->description  = $descriptions  ?? ' ' ;
            $ASD->district     = $requst['district']            ;
            $ASD->state        = $requst['state']               ;
            $ASD->phone        = $requst['phone']               ;

            $ASD->croneBamp    = $croneBamps;

            if(isset($requst['oneMostDollar']) ||  isset($requst['selectCroneBampsFlag'])){
                $ASD->block         = null;
                $date               = Carbon::now()->format('m/d/Y H:i:s');
                $ASD->lastTimeBamps = $date;
            }

            $ASD->bodyrubs      = $requst['bodyrubs']      ?? false   ;
            $ASD->dommination    = $requst['dommination']    ?? false   ;
            $ASD->femaleescort  = $requst['femaleescort']  ?? false   ;
            $ASD->maleescort    = $requst['maleescort']    ?? false   ;
            $ASD->strippers      = $requst['strippers']      ?? false   ;
            $ASD->transsexual    = $requst['transsexual']    ?? false   ;

            $ASD->height         = $requst['height']            ;
            $ASD->age            = $requst['age']               ;
            $ASD->height         = $requst['height']            ;
            $ASD->hair_color     = $requst['hair_color']        ;
            $ASD->hair_length    = $requst['hair_length']       ;
            $ASD->ethnicity      = $requst['ethnicity']         ;
            $ASD->brest_size     = $requst['brest_size']        ;

            /*
             *
             * Если галочка не стоит то записасть false
             *
             * Если галочка стоит, то проверяем установлен ли рейт, если нет то установим false
             *
             * */

            if($requst['incall_30m']){   $incall_30m     = $requst['incall_30m_rate']   ?? false;    }else{ $incall_30m  = false; }
            if($requst['incall_1h']){    $incall_1h      = $requst['incall_1h_rate']    ?? false;    }else{ $incall_1h   = false; }
            if($requst['incall_2h']){    $incall_2h      = $requst['incall_2h_rate']    ?? false;    }else{ $incall_2h   = false; }
            if($requst['incall_24h']){   $incall_24h     = $requst['incall_24h_rate']   ?? false;    }else{ $incall_24h  = false; }
            if($requst['outcall_30m']){  $outcall_30m    = $requst['outcall_30m_rate']  ?? false;    }else{ $outcall_30m = false; }
            if($requst['outcall_1h']){   $outcall_1h     = $requst['outcall_1h_rate']   ?? false;    }else{ $outcall_1h  = false; }
            if($requst['outcall_2h']){   $outcall_2h     = $requst['outcall_2h_rate']   ?? false;    }else{ $outcall_2h  = false; }
            if($requst['outcall_24h']){  $outcall_24h    = $requst['outcall_24h_rate']  ?? false;    }else{ $outcall_24h = false; }

            $ASD->incall_30m    =  $incall_30m  ;
            $ASD->incall_1h     =  $incall_1h   ;
            $ASD->incall_2h     =  $incall_2h   ;
            $ASD->incall_24h    =  $incall_24h  ;
            $ASD->outcall_30m   =  $outcall_30m ;
            $ASD->outcall_1h    =  $outcall_1h  ;
            $ASD->outcall_2h    =  $outcall_2h  ;
            $ASD->outcall_24h   =  $outcall_24h ;

            $ASD->currency_visa                 = $requst['currency_visa']               ?? false;
            $ASD->currency_mastercard           = $requst['currency_mastercard']         ?? false;
            $ASD->currency_ameerican_express    = $requst['currency_ameerican_express']  ?? false;
            $ASD->currency_discover             = $requst['currency_discover']           ?? false;
            $ASD->currency_cash                 = $requst['currency_cash']               ?? false;
            $ASD->currency_btc                  = $requst['currency_btc']                ?? false;
            $ASD->currency_other                = $requst['currency_other']              ?? false;
            $ASD->custom_currency               = $requst['custom_currency']             ?? '';

            $ASD->rate = $requst['rate'];

            $ASD->USD  = $requst['USD'] ?? false;
            $ASD->GBP  = $requst['GBP'] ?? false;
            $ASD->EUR  = $requst['EUR'] ?? false;

            $ASD->social_site         = $requst['social_site']        ?? '';
            $ASD->social_fb           = $requst['social_fb']          ?? '';
            $ASD->social_instagam     = $requst['social_instagam']    ?? '';
            $ASD->social_twitter      = $requst['social_twitter']     ?? '';
            $ASD->social_google_plus  = $requst['social_google_plus'] ?? '';

        $ASD->update();

        foreach ($dataRequst['city'] as $item){
            users_cities::create([
                'user_id' => $id,
                'city_id' => $item
            ]);
        }


        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewСlient($id){

        if(Auth::user()->userType == 'client'){
            return redirect('/');
        }

        $user = DB::table('users')->select('*')->where('id',$id)->where('userType','client')->get();

        if(isset($user[0])){

            $user           = $user[0];
            $user->phone    = substr($user->phone, -4);
            return view('user.client.client_guest', ['user' => $user]);

        }else{
            return back()->withInput();
        }
    }


    public function getPageMoney(Request $request){
        $usd    = $request->usd;
        $result = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=$usd");
    }



    public function clientReviews($id,$type){

        $title              = 'client'      ;
        $responseUser       = 'Client'      ;
        $showBtn            = true          ;
        $showFormAnsever    = false         ;
        $user               = Auth::user()  ;
        $comentForUserId    = null          ;
        $client             = null          ;
        $h                  = null          ;


        if($type == 'to'){

            $comments        = DB::select("SELECT
                                                    comments.id as comments_id,
                                                    comments.answer_for_comment_id as answer_for_comment_id,
                                                    comments.text as text,
                                                    comments.ratting as ratting,
                                                    comments.created_at as created_at,
                                                    autors.name as autors_name,
                                                    autors.id as autors_id,
                                                    userTarget.id as userTargetId,
                                                    userTarget.name as userTargetName
                                                FROM
                                                    `comments`
                                                JOIN users AS autors
                                                ON
                                                    autors.id = comments.author_id
                                                JOIN users AS userTarget
                                                ON
                                                    userTarget.id = comments.comment_for_user_id
                                                WHERE
                                                    answer_for_comment_id IS NULL 
                                                    AND 
                                                    comments.block = 0
                                                    AND 
                                                    author_id = $id
                                                    AND 
                                                    author_type = 'client'
                                                ORDER BY created_at DESC ");

            $responseUser   = 'Provider'            ;
            $showBtn        = false                 ;
            $client         = \App\User::find($id)  ;
            $title          = 2                     ;
            $h              = 'Reviews by'   ;

            if(Auth::user()->userType == 'client'){

                $title              = 2;
                $responseUser       = 'Provider'      ;
                $showFormAnsever    = false         ;
                $h                  = 'My review'   ;
            }

        }elseif($type == 'by'){

            $comments        = DB::select("SELECT
                                                    comments.id as comments_id,
                                                    comments.answer_for_comment_id as answer_for_comment_id,
                                                    comments.text as text,
                                                    comments.ratting as ratting,
                                                    comments.created_at as created_at,
                                                    autors.name as autors_name,
                                                    autors.id as autors_id,
                                                    userTarget.id as userTargetId,
                                                    userTarget.name as userTargetName
                                                FROM
                                                    `comments`
                                                JOIN users AS autors
                                                ON
                                                    autors.id = comments.author_id
                                                JOIN users AS userTarget
                                                ON
                                                    userTarget.id = comments.comment_for_user_id
                                                WHERE
                                                    answer_for_comment_id IS NULL
                                                    AND 
                                                    comments.block = 0 
                                                    AND 
                                                    comment_for_user_id = $id
                                                ORDER BY created_at DESC ");

            $responseUser   = 'Client'              ;
            $showBtn        = true                  ;
            $title          = 4                     ;
            $h              = 'Reviews to'   ;

            if(Auth::user()->userType == 'client'){

                $title              = 3                 ;
                $responseUser       = 'Client'          ;
                $showFormAnsever    = true              ;
                $showBtn            = false             ;
                $h                  = 'Reviews about me';
            }

            $client          = \App\User::find($id);
            $comentForUserId = $client->id;

        }elseif ($type == 'provider'){

            $showBtn            = false;
            $adsIds             = [];
            $responseUser       = 'Provider';
            $title              = 1;
            $showFormAnsever    = true;
            $h                  = 'My review';
            $comments        = DB::select("SELECT
                                                    comments.id as comments_id,
                                                    comments.answer_for_comment_id as answer_for_comment_id,
                                                    comments.text as text,
                                                    comments.ratting as ratting,
                                                    comments.created_at as created_at,
                                                    autors.name as autors_name,
                                                    autors.id as autors_id,
                                                    userTarget.id as userTargetId,
                                                    userTarget.name as userTargetName
                                                FROM
                                                    `comments`
                                                JOIN users AS autors
                                                ON
                                                    autors.id = comments.author_id
                                                JOIN users AS userTarget
                                                ON
                                                    userTarget.id = comments.comment_for_user_id
                                                WHERE
                                                    answer_for_comment_id IS NULL
                                                     AND 
                                                    comments.block = 0 
                                                    AND comment_for_user_id = $id
                                                ORDER BY created_at DESC ");
        }

        $comments = json_decode(json_encode($comments),1);

        foreach ($comments as &$comment){
            $answer             = DB::select("SELECT * FROM `comments` WHERE `answer_for_comment_id` = '$comment[comments_id]'");
            $comment['answer']  = $answer;
        }
        //dd(is_float(4.5));
        return view('user.client.reviewsTo',[
            'comment'           =>   $comments          ,
            'user'              =>   $user              ,
            'showBtn'           =>   $showBtn           ,
            'client'            =>   $client            ,
            'responseUser'      =>   $responseUser      ,
            'title'             =>   $title             ,
            'showFormAnsever'   =>   $showFormAnsever   ,
            'comentForUserId'   =>   $comentForUserId   ,
            'h'                 =>   $h                 ,
        ]);

    }


    public function myReviews(){

        $user        = Auth::user();

        if($user->userType == 'provider'){
            $comments      = DB::select("SELECT *  FROM `comments` WHERE `user_id` IN (SELECT id FROM ads_items WHERE user_id = $user->id) AND comments.block = 0");
        }elseif ($user->userType == 'client'){
            $comments =Comment::select()->where('autor', Auth::user()->id)->get();
        }

        $answers = [];
        foreach ($comments as $comment){
            $answer = DB::select("SELECT * FROM `comments` WHERE `comment_for` = '$comment->id'");
            $comment->answer = $answer;
        }
        return view('user.my-reviews',[
            'comments' => $comments,
            'user' => $user,
        ]);

    }

}

