<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class checkUnicName extends Controller
{

    public function getName(Request $request){
        $name = $request['name'];
        $res =  DB::select("SELECT id FROM users WHERE `name` = '$name'");
        return response()->json(count($res), 200);
    }
}
