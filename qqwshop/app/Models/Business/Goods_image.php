<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Image;
use File;

class Goods_image extends Model
{
    public $timestamps = false;
    //
    public static function add($req,$id){
        
        foreach($req->goods_image as $k=>$v){
                
            if($req->has('goods_image') && $v->isValid()) {
                
                $date = date('Ymd');

                $image_path = $v->store( 'goods_images/'.$date ,"public");

                $path = "./uploads/image_thumb/$date";

                if (!file_exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $imgpath = $v->path();

                $img = Image::make($imgpath);
                
                $smname = str_replace('goods_images/'.$date.'/','image_thumb/'.$date.'/sm_', $image_path);
                $img->resize(35,35);
                $img->save('./uploads/'.$smname);

                $mdname = str_replace('goods_images/'.$date.'/','image_thumb/'.$date.'/md_', $image_path);
                $img->resize(80,80);
                $img->save('./uploads/'.$mdname);

                $bgname = str_replace('goods_images/'.$date.'/','image_thumb/'.$date.'/bg_', $image_path);
                $img->resize(240,240);
                $img->save('./uploads/'.$bgname);
                
                $goods_images = new self;
                $goods_images->goods_image = $image_path;
                $goods_images->goods_id = $id;
                $goods_images->goods_sm_img = $smname;
                $goods_images->goods_md_img = $mdname;
                $goods_images->goods_bg_img = $bgname;

                $goods_images->save();
            }else{
                return false;
            }
        }

        return true;
    }
}
