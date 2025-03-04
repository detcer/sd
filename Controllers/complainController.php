<?php

namespace App\Http\Controllers;

use App\adsItem;
use App\complain;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplainController extends Controller
{
    public function newComplain(Request $request){

        $text                   = $request['text'];
        $comment_for_user_id    = $request['comment_for_user_id'];
        $authorId               = Auth::User()->id;

        complain::create(['text'=>$text, 'author_id' => $authorId,'comment_for_user_id'=>$comment_for_user_id]);
        return response()->json(1, 200);
    }

    public function deleteComplain(Request $request){
        $id = $request['id'];

        $res =  complain::where('id',$id)->delete();
        if($res){
            return response()->json(1, 200);
        }else{
            return response()->json(0, 200);
        }
    }

}
