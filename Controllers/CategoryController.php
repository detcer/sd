<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ( $slug ) {
        $category = Category::whereSlug( $slug ) -> first();
        $metaTitle = $category -> title;
        $metaDescription = $category -> description;
        return view( 'new.category' , compact( 'category' , 'metaTitle' , 'metaDescription' ) );
    }
    public function subcat ( $slug , $subSlug ) {
        $parentCategory = Category::whereSlug( $slug ) -> first();
        $category = Category::whereSlug( $subSlug ) -> first();
        $metaTitle = $category -> title;
        $metaDescription = $category -> description;
        return view( 'new.category' , compact( 'category' , 'parentCategory' , 'metaTitle' , 'metaDescription' ) );
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
