<?php

namespace App\Http\Controllers;

use App\adsItem;
use App\ModelCity;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ( Request $request , $stateId )
    {
        $response = \App\City::whereStateId( $stateId )->orderBy( 'title' )->get();

        if (!$request->get('account')) {
            foreach ($response as $key => $city) {
                $user_id = ModelCity::whereCityId( $city -> id )->pluck( 'user_id' )->toArray();
                $countAds = adsItem::whereIn( 'id' , $user_id )->where( 'status' , 1 )->count();
                if (!$countAds) {
                    unset($response[$key]);
                }
            }
        }

        return response()->json($response);
    }

    public function services(Request $request, $cityId) {
        $fieldsServices = [];

        $user_id = ModelCity::whereCityId($cityId)->pluck('user_id')->toArray();
        $ads = adsItem::whereIn( 'id' , $user_id )->where( 'status' , 1 )->get();

        foreach ($ads as $value) {
            if ($value->bodyrubs && !in_array('bodyrubs', $fieldsServices)) {
                $fieldsServices[] = 'bodyrubs';
            }
            if ($value->dommination && !in_array('dommination', $fieldsServices)) {
                $fieldsServices[] = 'dommination';
            }
            if ($value->femaleescort && !in_array('femaleescort', $fieldsServices)) {
                $fieldsServices[] = 'femaleescort';
            }
            if ($value->maleescort && !in_array('maleescort', $fieldsServices)) {
                $fieldsServices[] = 'maleescort';
            }
            if ($value->strippers && !in_array('strippers', $fieldsServices)) {
                $fieldsServices[] = 'strippers';
            }
            if ($value->transsexual && !in_array('transsexual', $fieldsServices)) {
                $fieldsServices[] = 'transsexual';
            }
        }

        $servicesRepo = new ServiceRepository();
        $services = $servicesRepo->findByNames($fieldsServices)->pluck('name', 'name_id' )->toArray();

        return response()->json ($services);
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
