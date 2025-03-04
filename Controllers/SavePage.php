<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\summernoteeditor;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class SavePage extends Controller
{
    public function updatePage(Request $request){

        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
        $content = $request->content ? $this->saveHtml($request->content) : '';

        $page = summernoteeditor::find($request->pageId);
        $page->title        = $request->title;
        $page->h1           = $request->h1;
        $page->content      = $content;
        $page->description  = $request->description;
        $page->save();

        return redirect()->back();
    }

    public function pageUpdateState(Request $request){

        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
        $content            = $request->content ? $this->saveHtml($request->content) : '';
        $content_bottom     = $request->content_bottom ? $this->saveHtml($request->content_bottom) : '';

        $page = summernoteeditor::find($request->pageId);
        $page->title            = $request->title;
        $page->h1               = $request->h1;
        $page->content          = $content;
        $page->content_bottom   = $content_bottom;
        $page->description      = $request->description;

        $page->save();

        return redirect()->back();
    }

    public function newPage(Request $request){


        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
        $content                = $request->content ? $this->saveHtml($request->content) : '';
        $page                   = new summernoteeditor;
        $page->pageName         = $request->pageName;
        $page->title            = $request->title;
        $page->h1               = $request->h1;
        $page->content          = $content;
        $page->description      = $request->description;
        $page->custom_page      = 1;

        $page->save();
        $page->id;
        return redirect()->back();
    }


    public function saveHtml($detail){

        // We need this so all weird tags copied from example word are ignored
       // and don' throw exceptions
        libxml_use_internal_errors(true);

        $dom = new \DOMDocument();
        $dom->loadHTML(
            mb_convert_encoding($detail, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');

            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];

                $path = '/upload/' . uniqid('', true) . '.' . $mimeType;

                Image::make($src)
                    ->resize(750, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode($mimeType, 80)
                    ->save(public_path($path));

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($path));
            }
        }




        return $dom->saveHTML();

    }
}
