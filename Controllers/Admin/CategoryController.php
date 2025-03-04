<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $title = 'Категории';
        return view( 'admin.category.index' , compact( 'categories' , 'title' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create () {
        $title = 'Создать категорию';
        $categories = Category::all();
        return view( 'admin.category.create' , compact( 'categories' , 'title' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( CategoryRequest $req ) {
        $save = Category::create( $req -> except( '_token' ) );
        return redirect() -> route( 'admin.categories.index' ) -> with( 'status' , 'saved' );
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
    public function edit ( $id ) {
        $categories = Category::all();
        $title = 'Редактировать категорию';
        $category = Category::findOrFail( $id );
        return view( 'admin.category.edit' , compact( 'title' , 'category' , 'categories' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( CategoryRequest $req , $id ) {
        Category::where( 'id' , $id ) -> update( $req -> except( '_token' , '_method' ) );
        return redirect() -> route( 'admin.categories.index' ) -> with( 'status' , 'updated' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        Category::where( 'parent_id' , $id ) -> delete();
        Category::destroy( $id );
        return redirect() -> route( 'admin.categories.index' ) -> with( 'status' , 'destroyed' );
    }
}
