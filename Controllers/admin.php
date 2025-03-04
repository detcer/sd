<?php

namespace App\Http\Controllers;

use App\adsItem;
use App\comment;
use App\complain;
use App\summernoteeditor;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use function Couchbase\defaultDecoder;


class admin extends Controller
{

    public function addReport(Request $request ){
        $intruder   =   $request->intruder;
        $text       =   $request->text;

        $typeEssenceAutor   = Auth::user()->userType;
        $autor              = Auth::user()->id;

        if($typeEssenceAutor == 'client'){

            $result =   ['error' => 0, 'result' => 1];

        }elseif($typeEssenceAutor == 'provider'){

            $result =   ['error' => 0, 'result' => 1];
        }else{

            $result =   ['error' => 1, 'result' => 0];
        }

        return response()->json($result, 200);
    }

    public function clientManagement(){

        $users = User::all()->where('userType','client');
        $title = 'Clients';
        return view('admin.page.table.client',
            [
                'users'  =>$users,
                'title'  => $title
            ]);
    }



    public function moneyView(){
        $users = User::all()->where('userType','provider');
        $title = 'Providers';
        return view('admin.page.table.bumps',
            [
                'users'  => $users,
                'title'  => $title
            ]);
    }

    public function updateUsdAndBumps(Request $request){
        $user = User::find($request['id']);

        if($user != null){
            $user->money = $request['usd'];
            $user->bumps = $request['bumps'];
            $user->update();
            return response(1,200);
        }else{
            return response(0,400);
        }
    }


    public function providerManagement(){

        $users      = User::all()->where('userType','provider');
        $title      = 'Providers';

        foreach ($users as &$user) {
            $user['ads'] = adsItem::all()->where('user_id',$user->id);
        }

        return view('admin.page.table.provider',
            [
                'users'  =>$users,
                'title'  => $title
            ]);
    }




    public function deleteUser(Request $request){
        $res = User::where('id', $request['id'])->delete();
        return response($res,200);
    }


    public function blockUser(Request $request){

        $user = User::find($request['id']);

        if($user != null){
            $user->block = 1;
            $user->update();

            if($user->userType == 'provider'){
                adsItem::where('user_id',$request['id'])->update(['status' => 0]);
            }


            return response(1,200);
        }else{
            return response(0,400);
        }

    }


    public function showUser(Request $request){

        $user = User::find($request['id']);

        if($user != null){
            $user->block = 0;
            $user->update();

            if($user->userType == 'provider'){
                adsItem::where('user_id',$request['id'])->update(['status' => 1]);
            }
            return response(1,200);
        }else{
            return response(0,400);
        }
    }

    public function reviewsView(){
        $reviews = DB::select("SELECT
                                    c.id AS id,
                                    c.created_at AS dateCrate,
                                    c.text AS text,
                                    c.ratting AS ratting,
                                    c.author_type AS author_type,
                                    u.name as autor,
                                    u2.userType AS torType,
                                    u2.name as targerUser,
                                    c.comment_for_user_id as comment_for,
                                    c.author_id as author_id,
                                    c.block as block,
                                    c.created_at as created_at
                                FROM
                                    comments c
                                LEFT JOIN users u ON c.author_id = u.id
                                LEFT JOIN users u2 ON c.comment_for_user_id = u2.id
                                
                                WHERE answer_for_comment_id is null 
                                ORDER BY id DESC");
        $title = 'reviews';
        return view('admin.page.table.reviews',
            [
                'reviews'  => $reviews,
                'title'    => $title
            ]);
    }

    public function complaintsView(){
        $complain = DB::select("SELECT
                                    c.id AS id,
                                    c.text AS text,
                                    c.created_at AS created_at,
                                    c.comment_for_user_id AS for_id,
                                    c.author_id AS author_id,
                                    u.name AS for_name,
                                    u.block AS block,
                                    u2.name AS author_name,
                                    u.userType AS for_userType,
                                    u2.userType AS author_userType
                                FROM
                                    complains AS c
                                JOIN users u ON
                                    u.id = c.comment_for_user_id
                                JOIN users u2 ON
                                    u2.id = c.author_id
                                ORDER BY id 
                                DESC 
                                ");
        return view('admin.page.table.complains',
            [
                'complains'  => $complain,
                'title'    => 'Complains'
            ]);

    }

    public function updateReview(Request $request){
        $reviewID   = $request['id'];
        $reviewText = $request['text'];

        $review = comment::find($reviewID);
        $review->text = $reviewText;
        $review->update();
    }

    public function updateReviewRating(Request $request){
        $reviewID   = $request['id'];
        $rating     = $request['rating'];

        $review = comment::find($reviewID);
        $review->ratting = $rating;
        $review->update();

    }


    public function deleteReview(Request $request){
        $reviewID   = $request['id'];
        $res =  comment::where('id',$reviewID)->delete();
        if($res){
            return response(1,200);
        }else{
            return response(0,400);
        }
    }

    public function blockReview(Request $request){

        $reviewID       = $request['id'];
        $review         =  comment::find($reviewID);
        $review->block  = 1;
        $res = $review->update();

        if($res){
            return response(1,200);
        }else{
            return response(0,400);
        }
    }

    public function showReview(Request $request){

        $reviewID       = $request['id'];
        $review         =  comment::find($reviewID);
        $review->block  = 0;
        $res = $review->update();

        if($res){
            return response(1,200);
        }else{
            return response(0,400);
        }
    }

    public function pageEditInfo(){
        $page = summernoteeditor::where('pageName','info')->get();
        //dd($page);
        return view('admin.page.pageEditor.editor',
            [
                'title' => 'info',
                'page' => $page[0],
            ]
        );
    }

    public function pageEdit($id){
        $page = summernoteeditor::where('pageName','info')->get();
        //dd($page);
        return view('admin.page.pageEditor.editor',
            [
                'title' => 'info',
                'page' => $page[0],
            ]
        );
    }

    public function pageOtherEdit($id){

        $page = summernoteeditor::find($id);
        return view('admin.page.pageEditor.editor',
            [
                'title' => 'info',
                'page' => $page
            ]
        );
    }

    public function pageEditPolicy(){

        $page = summernoteeditor::where('pageName','privacyPolicy')->get();
        //dd($page);
        return view('admin.page.pageEditor.editor',
            [
                'title' => 'privacyPolicy',
                'page' => $page[0],
            ]
        );
    }

    public function pageEditService(){

        $page = summernoteeditor::where('pageName','service')->get();
//        dd($page);
        return view('admin.page.pageEditor.editor',
            [
                'title' => 'service',
                'page' => $page[0],
            ]
        );
    }

    public function pageEditState(Request $request){

        $state = $request->state;
        $page  = summernoteeditor::where('state_id',$state)->get();

        if($page->count() == 0 ){

            $pageState =  new summernoteeditor;
            $pageState->pageName    = 'state';
            $pageState->title       = 'state';
            $pageState->content     = '';
            $pageState->state_id    = $state;
            $pageState->save();
            $pageState->id;

            $page  = summernoteeditor::where('state_id',$state)->get();
            return view('admin.page.filter.editorPage',
                [
                    'title' => 'state',
                    'page' => $page[0],
                ]
            );

        }

        return view('admin.page.filter.editorPage',
            [
                'title' => 'service',
                'page' => $page[0],
            ]
        );
    }

    public function pageEditCity(Request $request){
        $state = $request->state;
        $city  = $request->city;
        $page  = summernoteeditor::where('state_id',$state)->where('city_id',$city)->get();

        if($page->count() == 0 ){

            $pageState =  new summernoteeditor;
            $pageState->pageName    = 'state';
            $pageState->title       = $request->get('title');
            $pageState->h1          = $request->get('h1');
            $pageState->content     = $request->get('content');
            $pageState->state_id    = $state;
            $pageState->city_id     = $city;
            $pageState->save();
            $pageState->id;

            $page  = summernoteeditor::where('state_id',$state)->where('city_id',$city)->get();
            return view('admin.page.filter.editorPage',
                [
                    'title' => 'state',
                    'page' => $page[0],
                ]
            );

        }

        return view('admin.page.filter.editorPage',
            [
                'title' => 'service',
                'page' => $page[0],
            ]
        );
    }

    public function pageEditServices(Request $request){
        $state = $request->state;
        $city  = $request->city;
        $service  = $request->service;
        $page  = summernoteeditor::where('state_id',$state)->where('city_id',$city)->where('service', $service)->first();

        if(!$page){
            $pageState =  new summernoteeditor;
            $pageState->pageName    = 'service';
            $pageState->title       = $request->get('title');
            $pageState->h1          = $request->get('h1');
            $pageState->content     = $request->get('content');
            $pageState->state_id    = $state;
            $pageState->city_id     = $city;
            $pageState->service     = $service;
            $pageState->save();
            $pageState->id;

            $page  = summernoteeditor::where('state_id',$state)->where('city_id',$city)->where('service', $service)->first();
            return view('admin.page.filter.editorPage',
                [
                    'title' => 'state',
                    'page' => $page,
                ]
            );

        }

        return view('admin.page.filter.editorPage',
            [
                'title' => 'service',
                'page' => $page,
            ]
        );
    }

    public function pageFilterState(){
        return view('admin.page.filter.state');
    }

    public function pageFilterCity(){
        return view('admin.page.filter.city');
    }

    public function pageFilterServices(){
        $services = ['bodyrubs','dommination','femaleescort','maleescort','strippers','transsexual'];
        return view('admin.page.filter.services', compact('services'));
    }

    public function pageAdd(){
        return view('admin.page.pageEditor.newPage');
    }

    public function pageOther(){
        $pages = summernoteeditor::where('custom_page',1)->get();

        return view('admin.page.table.otherPage',['pages'=>$pages]);
    }

    public function getOnlineUser(){

        $time       = strtotime("-5 minutes");
        $countGuest = DB::select("SELECT count(id) as total FROM sessions where last_activity >= $time AND  user_id is null AND NOT `user_agent` = 'Wget/1.18 (linux-gnu)'");
        $countGuest = $countGuest[0];

        $allUser    = DB::select("SELECT count(id) as total FROM sessions where last_activity >= $time AND NOT `user_agent` = 'Wget/1.18 (linux-gnu)'");
        $allUser    = $allUser[0];

        $provider   = DB::select("SELECT count(id) as total FROM users WHERE id IN( SELECT `user_id` FROM sessions WHERE last_activity >= $time AND NOT user_id is null) AND  userType = 'provider' ");
        $provider   = $provider[0];

        $client     = DB::select("SELECT count(id) as total FROM users WHERE id IN( SELECT `user_id` FROM sessions WHERE last_activity >= $time AND NOT user_id is null) AND  userType = 'client' ");
        $client     =   $client[0];

        // dd($this->getUserGeo());

        $res = [
            'guest'     => $countGuest,
            'allUser'   => $allUser,
            'provider'  => $provider,
            'client'    => $client,
        ];
        return $res;
    }

}
