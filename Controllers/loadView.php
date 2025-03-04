<?php

namespace App\Http\Controllers;

use App\summernoteeditor;
use Illuminate\Http\Request;

class loadView extends Controller
{
    public function credits(){
        return view('buyCredits.blade');
    }

    public function page_Info(){

        $res        = summernoteeditor::where('pageName','info')->get();
        $content    = summernoteeditor::find($res[0]->id);

        return view('info_pages.page_default',
            [
                'content'   => $content,
                'metaTitle' => $content->title,
                'metaDescription' => $content->description,
            ]
        );
    }

    public function page_privacyPolicy(){
        $res        = summernoteeditor::where('pageName','privacyPolicy')->get();
        $content    = summernoteeditor::find($res[0]->id);

        return view('info_pages.page_default',
            [
                'content'   => $content,
                'metaTitle' => $content->title,
                'metaDescription' => $content->description,
            ]
        );
    }

    public function page_termsOfService(){
        $res        = summernoteeditor::where('pageName','service')->get();
        $content    = summernoteeditor::find($res[0]->id);

        return view('info_pages.page_default',
            [
                'content'   => $content,
                'metaTitle' => $content->title,
                'metaDescription' => $content->description,
            ]
        );

    }


    public function page_Blog(){
        $res        = summernoteeditor::where('pageName','service')->get();
        $content    = summernoteeditor::find($res[0]->id);

        return view('info_pages.page_default',
            [
                'content'   => $content,
                'metaTitle' => $content->title,
                'metaDescription' => $content->description,
            ]
        );

    }


    public function showPage($name){
        $page = summernoteeditor::where('pageName',$name)->get();
        if($page->count() == 0){

        }else{
            $page = $page[0];
            $arr = [
                'content'   => $page->content,
                'metaTitle' => $page->title,
                'metaDescription' => $page->description,
            ];
            return view('otherPage',$arr);
        }
    }
}
