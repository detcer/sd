<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\adsItem as Model;
use App\Favorite;
use DB;
use Auth;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function show($name = null) {
    if ($name !== strtolower($name)) abort(404);
    
    // Ищем модель по имени вместо slug-возраст
    $model = Model::where('name', $name)->first();
    
    if (null == $model) {
        // Проверяем, может быть передан ID
        $model = Model::whereId($name)->first();
        if (null == $model) abort(404);
    }
    
    $id = $model->id;    
        $model = Model::select(
            "ads_items.*",
            "new_states.title as state_name",
            "new_states.slug as state_slug",
            "params_hair_colors.name as hair_colorName",
            "params_hair_lengths.name as hair_lengthsName",
            "params_ethnicities.name as params_ethnicitiesName",
            "params_heights.name as height",
            "params_brest_sizes.name as brest_size"
        ) -> where( 'ads_items.id' , $id )
            ->join( "new_states" , "ads_items.state" , "new_states.id" )
            ->join("params_hair_colors","ads_items.hair_color","params_hair_colors.id")
            ->join("params_hair_lengths","ads_items.hair_length","params_hair_lengths.id")
            ->join("params_ethnicities","ads_items.ethnicity","params_ethnicities.id")
            ->join("params_heights","ads_items.height","params_heights.id")
            ->join("params_brest_sizes","ads_items.brest_size","params_brest_sizes.id")
            ->get()->toArray();
        $responseUser = '';
        $providerId = $model[ 0 ][ 'user_id' ];
        $comments = DB::select("SELECT
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
        $comments = json_decode( json_encode( $comments ) , 1 );
        foreach ( $comments as &$comment ) {
            $answer = DB::select( "SELECT * FROM `comments` WHERE `answer_for_comment_id` = '$comment[comments_id]'" );
            $comment[ 'answer' ] = $answer;
        }
        $showFormAnsever = false;
        if ( Auth::user() ) {
            $fav = Favorite::where([ 'model_id' => $id , 'user_id' => Auth::user() -> id ]) -> count();
            $userType = Auth::user() -> userType;
            if ( Auth::user() -> userType == 'provider' ) {
                $showFormAnsever = true;
                $responseUser = 'Provider';
            }
        } else {
            $fav = [];
            $userType = 'client';
        }
        $model = $model[ 0 ];
        $model[ 'src_foto' ]  = json_decode( $model[ 'src_foto' ] );
        $cityNames = DB::select("SELECT `title` as `name`, `slug` as `slug` FROM `new_cities` WHERE `id` IN (SELECT `city_id` FROM `users_cities` WHERE `user_id` = $model[id]) ");
        $model[ 'cityName' ] = $cityNames;

        $services = [];
        
        if($model['bodyrubs']){
            $services[] = ['name'=>'Body Rubs', 'slug' => 'bodyrubs'];
        }
        if($model['dommination']){
            $services[] = ['name'=>'Domination', 'slug' => 'dommination'];
        }  
        if($model['femaleescort']){
            $services[] = ['name'=>'Female Escorts', 'slug' => 'femaleescort'];
        } 
        if($model['maleescort']){
            $services[] = ['name'=>'Male Escorts', 'slug' => 'maleescort'];
        
        } 
        if($model['strippers']){
            $services[] = ['name'=>'Strippers', 'slug' => 'strippers'];
        } 
        if($model['transsexual']){
            $services[] = ['name'=>'Transsexual', 'slug' => 'transsexual'];
        }
        $serviceList = '';
        foreach($services as $service){
            $serviceList .= $service['name'].', ';
        }
        
        $serviceList = rtrim(trim($serviceList), ',');
        $cityes = '';
        foreach($cityNames as $city){
            $cityes .= $city->name.', ';
        }
        $cityes = rtrim(trim($cityes), ',');
        $metaTitle = $model['name'] . " Profile Escort in " . $cityes . " | " . ($model['phone']) . " | Secret Desire";

        $metaDescription =  "Discover " . $model['name'] . " profile on Secret Desire. She is providing: ".$serviceList." in " . $cityes . ". She is a " . $model['hair_colorName'] . " escort of " . $model['age'] . " years. Contact Her Now: " . ($model['phone']);

        return view( 'new.model' , [
            'model' => $model,
            'cityes' => $cityes,
            'service' => $services[0],
            'userType' => $userType,
            'user' => Auth::user(),
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'comment' => $comments,
            'favorites' => $fav,
            'showFormAnsever' => $showFormAnsever,
            'responseUser' => $responseUser,
            'providerId' => $providerId,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
