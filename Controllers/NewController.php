<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Main as MainHelper;
use App\ModelCity;
use App\Repositories\SeoRepository;
use App\Repositories\ServiceRepository;
use App\Traits\StatesTrait;
use Illuminate\Http\Request;
use App\params_services;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\summernoteeditor as SummerNote;
use App\cities as City;
use App\states as State;
use App\adsItem;
use \Auth;
use App\favorites;
use App\summernoteeditor;
use App\comment;

class NewController extends Controller
{

    use StatesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // file_put_contents( __DIR__ . '/aget'  , $_SERVER[ 'HTTP_USER_AGENT' ] . PHP_EOL , FILE_APPEND );
//        $states = \App\State::with( 'cities' ) -> orderBy( 'title' ) -> get() -> toArray();
        $states = \App\State::with('cities')->orderBy( 'title' )->get()->toArray();
        $servicesRepo = new ServiceRepository();
        $params_services = $servicesRepo->get();

        $statesArray = [];
        $stateIds = [];
        $citiesIds = [];
        $i = 0;

        if (Cache::has('state')) {
            $statesArray = Cache::get('state');
            $stateIds = Cache::get('stateIds');
            $citiesIds = Cache::get('ciyIds');
        } else {
            foreach ($states as $state) {
                $statesArray[$i]['id'] = $state['id'];
                $statesArray[$i]['title'] = $state['title'];
                $statesArray[$i]['slug'] = $state['slug'];
                $statesArray[$i]['total'] = 0;
                foreach ($state['cities'] as $city) {
                    $user_id = ModelCity::whereCityId($city['id'])->pluck( 'user_id' )->toArray();
                    $countAds = adsItem::whereIn( 'id' , $user_id )->where( 'status' , 1 )->count();
                    if ($countAds) {
                        $statesArray[$i]['cities'][$city['id']]['title'] = $city['title'];
                        $statesArray[$i]['cities'][$city['id']]['slug'] = $city['slug'];
                        $statesArray[$i]['cities'][$city['id']]['count'] = $countAds;
                        $statesArray[$i]['total'] += $countAds;
                        if (!in_array($state['id'], $stateIds)) {
                            $stateIds[] = $state['id'];
                        }
                        if (!in_array($city['id'], $citiesIds)) {
                            $citiesIds[] = $city['id'];
                        }
                    }
                }
                $i++;
            }

            Cache::put('state', $statesArray, 600);
            Cache::put('stateIds', $stateIds, 600);
            Cache::put('ciyIds', $citiesIds, 600);
        }

        $states = \App\State::whereIn('id', $stateIds)->with('cities')->orderBy( 'title' ) -> get() -> toArray();

        $seoRepository = new SeoRepository();
        $seoRepository->generateIndexSeo();
        $grouparr = $this -> getStatesBlock(1, implode(',', $citiesIds));
//        dd($grouparr);
        return view ( 'new.index' , [
            'citiesIds'  => $citiesIds,
            'statesMobile'  => $statesArray,
            'services'   => $params_services,
            'cityCol'   => $grouparr,
            'states'   => $states,
            'metaTitle'   => $seoRepository->getTitle(),
            'metaDescription'   => $seoRepository->getDescription(),
        ]);
    }
    public function loadStates (Request $request, int $page ) {
        $grouparr = $this -> getStatesBlock ( $page , $request->get('ids'));
        return response() -> json( $grouparr );
    }
    public function new()
    {
        return view( 'new.new' );
    }
    protected function showSummerNotePage ( string $pageName ) {
        $res = SummerNote::where( 'pageName' , $pageName )->first();
        $content = SummerNote::find( $res -> id );
        return $content;
    }
    public function terms() {
        $page = summernoteeditor::where('pageName','service')->first();
        $content =  $this -> showSummerNotePage( 'service' );
        $seoRepository = new SeoRepository();
        $seoRepository->generateTermsConditionsSeo($page);
        return view( 'new.content' , [
                'page' => $page,
                'content' => $content,
                'metaTitle' => $seoRepository->getTitle(),
                'metaDescription' => $seoRepository->getDescription(),
            ]
        );
    }

    public function info() {

        $page = summernoteeditor::where('pageName','info')->first();
        $seoRepository = new SeoRepository();
        $seoRepository->generateInfoSeo($page);
        return view( 'new.temp.info' , [
                'page' => $page,
                'metaTitle' => $seoRepository->getTitle(),
                'metaDescription' => $seoRepository->getDescription(),
            ]
        );
        return view( 'new.temp.info' );
    }

    public function faq() {

        $page = summernoteeditor::where('pageName','faq')->first();
        $seoRepository = new SeoRepository();
        $seoRepository->generateFaqConditionsSeo($page);
        return view( 'new.temp.faq' , [
                'page' => $page,
                'metaTitle' => $seoRepository->getTitle(),
                'metaDescription' => $seoRepository->getDescription(),
            ]
        );
    }

    public function privacy () {
        $page = summernoteeditor::where('pageName','privacyPolicy')->first();
        $content =  $this -> showSummerNotePage( 'privacyPolicy' );
        $seoRepository = new SeoRepository();
        $seoRepository->generatePrivacySeo($page);
        return view( 'new.content' , [
                'page' => $page,
                'content' => $content,
                'metaTitle' => $seoRepository->getTitle(),
                'metaDescription' => $seoRepository->getDescription(),
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slug () {
        // $ll = params_services::all();
        // foreach ($ll as $key => $value) {
        //     dd($ll);
        //     if($value->name_id=='femaleescort') {
        //         params_services::where('id',$value->id)->update(['name_id'=>'femaleescort']);
        //         dd($value->name_id,$value->id);
        //     }
        // }

        // SLUG GENERATION
        // $cities = City::all();
        // foreach ( $cities as $key => $value ) {
        //     City::where( 'id' , $value -> id ) -> update( ['slug' => MainHelper::prettyUrl( $value -> name ) ] );
        // }
        // $states = State::all();
        // foreach ( $states as $key => $value ) {
        //     State::where( 'id' , $value -> id ) -> update( ['slug' => MainHelper::prettyUrl( $value -> name ) ] );
        // }
        // exit('ok');
        // SLUG GENERATION
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
    public function destroy($id) {
        //
    }


    public function filter ( Request $req , $state , $city , $service ) {

        return MainHelper::getFiltered( $state , $city , $service );
    }
}
