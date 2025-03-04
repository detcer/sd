<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Helpers\Main as MainHelper;
use App\State;
use App\City;
use App\cities as OldCity;

class TestController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doStates() {
        State::truncate();
        $json = '[{"id":"3919","title":"Alabama"},{"id":"3920","title":"Alaska"},{"id":"3921","title":"Arizona"},{"id":"3922","title":"Arkansas"},{"id":"3924","title":"California"},{"id":"3926","title":"Colorado"},{"id":"3927","title":"Connecticut"},{"id":"3928","title":"Delaware"},{"id":"3930","title":"Florida"},{"id":"3931","title":"Georgia"},{"id":"3932","title":"Hawaii"},{"id":"3933","title":"Idaho"},{"id":"3934","title":"Illinois"},{"id":"3935","title":"Indiana"},{"id":"3936","title":"Iowa"},{"id":"3937","title":"Kansas"},{"id":"3938","title":"Kentucky"},{"id":"3939","title":"Louisiana"},{"id":"3941","title":"Maine"},{"id":"3942","title":"Maryland"},{"id":"3943","title":"Massachusetts"},{"id":"3945","title":"Michigan"},{"id":"3946","title":"Minnesota"},{"id":"3947","title":"Mississippi"},{"id":"3948","title":"Missouri"},{"id":"3949","title":"Montana"},{"id":"3950","title":"Nebraska"},{"id":"3951","title":"Nevada"},{"id":"3952","title":"New Hampshire"},{"id":"3953","title":"New Jersey"},{"id":"3955","title":"New Mexico"},{"id":"3956","title":"New York"},{"id":"3957","title":"North Carolina"},{"id":"3958","title":"North Dakota"},{"id":"3959","title":"Ohio"},{"id":"3960","title":"Oklahoma"},{"id":"3962","title":"Oregon"},{"id":"3963","title":"Pennsylvania"},{"id":"3965","title":"Rhode Island"},{"id":"3966","title":"South Carolina"},{"id":"3967","title":"South Dakota"},{"id":"3969","title":"Tennessee"},{"id":"3970","title":"Texas"},{"id":"3972","title":"Utah"},{"id":"3973","title":"Vermont"},{"id":"3974","title":"Virginia"},{"id":"3975","title":"Washington"},{"id":"3976","title":"West Virginia"},{"id":"3977","title":"Wisconsin"},{"id":"3978","title":"Wyoming"},{"id":"3929","title":"Washington DC"}]';
        $res = json_decode( $json , 1 );
        foreach ( $res as $ke => &$state ) {
            $state[ 'slug' ] = MainHelper::prettyUrl( $state[ 'title' ] );
            $state[ 'sort_order' ] = $ke;
        }
        State::insert( $res );
        exit( 'new states:ok' );
    }
    public function doCities () {
        $final = [];
        $finalWithoutId = [];
        $notFound = [];
        City::truncate();
        $json = file_get_contents( '/var/www/www-root/data/www/secretdesire.co/public/state.json' );
        $res = json_decode( $json , 1 );
        foreach ( $res as $stateTitle => $state ) {
            $statee = State::whereTitle( $stateTitle ) -> first();
            // if ( null == $statee ) dd( 'error cant find state' , $stateTitle );
            foreach ( $state as $key => $city ) {
                $oldCity = OldCity::whereName( $city ) -> where( 'state_id' , $statee -> id ) -> first();
                $row = [
                    'title' => $city,
                    'slug' => MainHelper::prettyUrl( $city ),
                    'sort_order' => $key,
                    'state_id' => $statee -> id,
                ];
                if ( null == $oldCity ) {
                    $notFound[] = $city;
                    $finalWithoutId[] = $row;
                } else {
                    $row[ 'id' ] = $oldCity -> id;
                    $final[] = $row;
                }
            }
        }
        // dd($final);
        City::insert( $final );
        City::insert( $finalWithoutId );
        dd($finalWithoutId);
        exit( 'new cities:ok' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMobile () {
        $states = State::with( 'cities' ) -> take( 20 ) -> get() -> toArray();
        return view( 'new.temp.mobile' , compact( 'states' ) );
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
    public function show($id)
    {
        //
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
