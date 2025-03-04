<?php

namespace App\Http\Controllers;

use App\params_services;
use Illuminate\Http\Request;
use App\cities as City;
use App\adsItem as Model;
use App\states as State;
use App\Category;



class SiteMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $citiesArr = [];
    public $urls = [];
    public $modelsArr = [];
    protected $limit = 5000000;
    // protected $limit = 5;
    public $catsArr = [];
    protected function fillCats() {
        return true;
        $cats = Category::take( $this -> limit ) -> get();
        foreach ( $cats as $key => $value ) {
            $this -> catsArr[ $value -> slug ] = $value -> slug;
            $this -> urls[] = [
                'url' => env( 'APP_URL' ) . "/" . $value -> slug,
                'priority' => '0.9'
            ];
        }
    }
    protected function fillCities() {
        $cities = City::with( 'state' ) -> take( $this -> limit ) -> get();
        foreach ( $cities as $key => $value ) {
            $this -> citiesArr[ $value -> slug ] = $value -> slug;
            if ( $value -> state == null ) {
                $pps[] = $value -> id;
            } else {
                $this -> urls[] = [
                    'url' => env( 'APP_URL' ) . "/" . $value -> state -> slug . "-" . $value -> slug ,
                    'priority' => '0.9'
                ];
            }
        }
    }
    protected function fillModels () {
        $models = Model::take( $this -> limit ) -> get();
        foreach ( $models as $key => $value ) {
            $this -> urls[] = [
                'url' => env( 'APP_URL' ) . "/" . "model-" . $value -> slug ,
                'priority' => '0.9'
            ];
        }
    }
    
    protected function fillServices () {
        $models = params_services::take( $this -> limit ) -> get();
        foreach ( $models as $key => $value ) {
            $this ->urls[] = [
                'url' => env( 'APP_URL' ) . "/services/".$value ->name_id ,
                'priority' => '0.9'
            ];
        }
    }
    protected function fillStatic() {
        $this -> urls[] = [
            'url' => env( 'APP_URL' ) . '/' ,
            'priority' => '1'
        ];
        $pages = [
            // '',
            'info' ,
            'terms-and-conditions' ,
            'privacy-policy',
            'services'
        ];
        foreach ( $pages as $page ) {
            $this -> urls[] = [
                'url' => env( 'APP_URL' ) . '/' . $page ,
                'priority' => '0.8'
            ];
        }
    }
    public function index() {
        $this -> fillStatic();
        $this -> fillCities();
        $this -> fillModels();
        $this -> fillServices();
        // $this -> fillCats();
        $xml = "<?" . view( 'new.sitemap' , [ 'urls' => $this -> urls ] ) -> render();
        file_put_contents( public_path() . '/sitemap.xml' , $xml );
        exit();
        dd($this -> urls);
        exit;
        dd($states);
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
