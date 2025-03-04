<?php

namespace App\Http\Controllers;

use App\params_services;
use App\Repositories\AdsItemsRepository;
use App\Repositories\SeoRepository;
use App\Repositories\ServiceRepository;
use App\Traits\StatesTrait;
use Illuminate\Http\Request;
use App\Category;



class ServiceController extends Controller
{

    use StatesTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        
        $servicesRepo = new ServiceRepository();
        $services = $servicesRepo->get();
        $seoRepository = new SeoRepository();
        $seoRepository->generateServicesSeo();
        $metaTitle              = $seoRepository->getTitle();
        $metaDescription        = $seoRepository->getDescription();
        return view( 'new.services' , compact( 'services','metaTitle','metaDescription' ) );
    }
    
    public function get(Request $request, $slug){
        
        $page = $request->get('page') ? $request->get('page'): 1;
        
        $service = params_services::where('name_id', $slug )->first();
        
        if(!$service)
            app()->abort(404);
        
        
        $seoRepository = new SeoRepository();
        $seoRepository->generateTitleAndDescriptionForServices($slug);
        $metaTitle              = $seoRepository->getTitle();
        $metaDescription        = $seoRepository->getDescription();
        
        $repo       = new AdsItemsRepository();
        $citiesIds  = $repo->getCitiesIdsByServiceName($slug);
        $ads        = $repo->getAdsFilteredByService($slug, $page, 16);
        
        $models     = $ads['models'];
        $fav        = $ads['fav'];
        $totalPages = $ads['totalPages'];
        
        $cityCol = $this -> getStatesFilteredByCitiesBlock($citiesIds);
        $statesIds = array_keys($cityCol);
        
        $states = \App\State::with( 'cities' )->whereIn('id',$statesIds) -> orderBy( 'title' ) -> get() -> toArray();
        
      
        $cityCol = array_chunk($cityCol, 4); // To divide on 4 columns
        
        
        return view( 'new.service' , compact( 'service' , 'cityCol','states', 'metaTitle','metaDescription','models','fav','page','totalPages' ) );
        
    }
   
}
