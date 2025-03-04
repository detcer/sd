<?php

namespace App\Http\Controllers;

use App\adsItem;
use App\Http\Helpers\Main as MainHelper;
use App\cities as City;
use App\comment;
use App\favorites;
use App\params_services;
use App\Repositories\ServiceRepository;
use App\states as State;
use App\summernoteeditor;
use App\users_cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeFilterController extends Controller
{
    protected $cityId;
    protected $stateId;
    public function index(){

        //$state              = states::all()->where('country_id', '231');
        //$city               = cities::raw("SELECT * FROM `cities` WHERE `state_id` IN (3919,3920,3921,3922)")->get();
        $state  = null;
        $city   = null;
        $servicesRepo = new ServiceRepository();
        $services = $servicesRepo->get();
        $params_services    = $services;
        //$state_ids          = states::select('id')->where('country_id', '231')->whereNotIn('id',[3919,3920,3921,3922])->get()->toArray();
        $state_ids= null;

        $CITY  = DB::select("SELECT cities.name as city, cities.slug as citySlug,states.slug,cities.state_id, cities.id as cities_id, states.name as states FROM `cities` JOIN states ON states.id = cities.state_id WHERE `state_id` IN (SELECT id FROM states WHERE country_id = 231)");
        $CITY  = json_decode(json_encode($CITY),1);

        $templevel              =   0;
        $newkey                 =   0;
        $grouparr[$templevel]   =   '';

        foreach ($CITY as $key => $val) {
            $val = [
                "cityUrl" => $val[ 'citySlug' ],
                "city" => $val[ 'city' ],
                "states" => $val[ 'states' ],
                "state_id" => $val[ 'state_id' ],
                "cities_id" => $val[ 'cities_id' ],
                "stateUrl" => $val[ 'slug' ],
                // "state_id" => "3919"
                // "cities_id" => "42594"
                // "states" => "Alabama"
            ];
            if ($templevel == $val['states']){
                $grouparr[$val['states']][] = $val;
            } else {
                $grouparr[$val['states']][]=$val;
            }

            $newkey++;

        }

        foreach ($grouparr as $key => $val) {
            if($val  == ''){
                unset($grouparr[$key]);
            }
        }
        $grouparr = array_chunk($grouparr, 12);
        //dd($grouparr[0][0]);
        $arr = [];
//        foreach ($state_ids as $state_id) {
//            $arr[] = $state_id['id'];
//        }
        // dd($grouparr[0][0]);
        $state_ids=$arr;
        // dd($state);
        return view('homeFilter',[
            'state'     => $state,
            'service'   => $params_services,
            'city'      => $city,
            'state_ids' => json_encode($state_ids),
            'cityCol'   => $grouparr
        ]);
    }

    public function getStateById($id_1,$id_2,$id_3,$id_4){

        $state              = DB::table('states')->whereIn('id',[$id_1,$id_2,$id_3,$id_4])->get();
        $city               = cities::raw("SELECT * FROM `cities` WHERE `state_id` IN ($id_1,$id_2,$id_3,$id_4)")->get();

        return view('api.getStateById',[
            'state'     => $state,
            'city'      => $city
        ]);
    }


    private $services = [];


    public function search ( Request $request ) {
        if ( $request -> state == null || $request -> city == null ) {
            return $this -> index();
        }
        if ( null !== $request -> services ) {
            $this -> cityId = $request -> city;
            $this -> stateId = $request -> state;
            $city = \App\City::where( 'id' , $request -> city ) -> firstOrFail();
            $state = \App\State::where( 'id' , $request -> state ) -> firstOrFail();
            $this -> cityId = $city -> id;
            $this -> stateId = $state -> id;
            if ( is_array( $request -> services ) && count( $request -> services ) == 1 ) {
                return redirect() -> route( 'state-city-filter' , [ $state -> slug , $city -> slug , $request -> services[ 0 ] ] );
            }
        } else {
            if ( strtolower( $request -> state ) !== $request -> state ) abort( 404 );
            if ( strtolower( $request -> city ) !== $request -> city ) abort( 404 );
            $this -> cityId = \App\City::whereSlug( $request -> city ) -> firstOrFail() -> id;
            $this -> stateId = \App\State::whereSlug( $request -> state ) -> firstOrFail() -> id;
        }
//         dd($request->all());
        return MainHelper::getFiltered ( $request -> state , $request -> city , $request -> services );
    }

}
