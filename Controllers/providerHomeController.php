<?php

namespace App\Http\Controllers;

use App\adsItem;
use Illuminate\Http\Request;

class providerHomeController extends Controller
{

    public function uploadPhoto(Request $request){

        $id = $request['model_id'];

        $model           = adsItem::find($id);
        $src_foto = json_decode($model->src_foto, true);

        $img = $request->file('src_foto');
        if($img){
            foreach ($img as $photo){
                $path = $photo->store('src_foto', 'public');
                array_push($src_foto, $path);
            }
        }
        $model->src_foto = json_encode($src_foto);
        $model->update();

        $msg = ['msg' => "true"];
        echo json_encode($msg);
    }

    public function deletePhoto(Request $request){

        $model = adsItem::find($request['model_id']);
        $src_foto = json_decode($model->src_foto, true);
        $id = $request['photo_id'];

        $path = __DIR__ . "/../../../storage/app/public/" . $src_foto[$id];
        if(is_file($path)){
            //Use the unlink function to delete the file.
            unlink($path);
        }

        unset($src_foto[$id]);

        $src_foto        = array_values($src_foto);
        $model->src_foto = json_encode($src_foto);
        $model->update();

        $msg = ['msg' => "true"];
        echo json_encode($msg);
    }

    public function deleteAllPhoto(Request $request){

        $model = adsItem::find($request['model_id']);
        $src_foto = json_decode($model->src_foto, true);

        foreach ($src_foto as $v){
            $path = __DIR__ . "/../../../storage/app/public/" . $v;
            if(is_file($path)){
                //Use the unlink function to delete the file.
                unlink($path);
            }
        }
        $empty =[];
        $model->src_foto = json_encode($empty);
        $model->update();

        $msg = ['msg' => $request['model_id']];
        echo json_encode($msg);
    }

    public function hideModel(Request $request){

        $model = adsItem::find($request['model_id']);

        $model->status = "0";
        $model->update();

        $msg = ['msg' => "true"];
        echo json_encode($msg);
    }

    public function showModel(Request $request){

        $model = adsItem::find($request['model_id']);

        $model->status = "1";
        $model->update();

        $msg = ['msg' => "true"];
        echo json_encode($msg);
    }

    public function deleteModel(Request $request){

        $model = adsItem::find($request['model_id']);
        if ( null == $model ) {
            $model = adsItem::where('slug',$request['model_id'])->firstOrFail();
        }
        $src_foto = json_decode($model->src_foto, true);

        foreach ($src_foto as $v){
            $path = __DIR__ . "/../../../storage/app/public/" . $v;
            if(is_file($path)){
                //Use the unlink function to delete the file.
                unlink($path);
            }
            unset($v);
        }

        $result = adsItem::where("id", $request['model_id'])->delete();

        if($result == 1){
            $msg = ['msg' => "true"];
        } else {
            $msg = ['msg' => "false"];
        }

        echo json_encode($msg);
    }



}
