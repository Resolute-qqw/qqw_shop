<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Image;
use File;
use App\Models\Business\Goods_image;
use App\Models\Business\Goods_sku;
use App\Models\Business\Goods_brand;
use App\Models\Business\Goods_attribute;
use App\Models\Business\Goods_categorie;


class Goods extends Model
{
    protected $fillable = ['goods_name','description','goods_type_id','goods_type_id2','goods_type_id3','brand_id'];
    //
    public static function add($req){
        $data = $req->all();
        $goods = new self;
        $goods->fill($data);
        if($req->has('goods_logo') && $req->goods_logo->isValid()) {

            $validator = Validator::make($req->all(), [
                'goods_logo'=>'image|max:2048',
            ]);

            if(!$validator->fails())
            {
                $date = date('Ymd');
                $goods_logo = $req->file('goods_logo')->store('goods_logos/'.$date ,"public");

                $path = "./uploads/logo_thumb/$date";

                if (!file_exists($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                
                $imgpath = $req->file('goods_logo')->path();

                $img = Image::make($imgpath);
                
                $smname = str_replace('goods_logos/'.$date.'/','logo_thumb/'.$date.'/sm_', $goods_logo);
                $img->resize(80,80);
                $img->save('./uploads/'.$smname);

                $mdname = str_replace('goods_logos/'.$date.'/','logo_thumb/'.$date.'/md_', $goods_logo);
                $img->resize(150,150);
                $img->save('./uploads/'.$mdname);

                $bgname = str_replace('goods_logos/'.$date.'/','logo_thumb/'.$date.'/bg_', $goods_logo);
                $img->resize(240,240);
                $img->save('./uploads/'.$bgname);


                $goods->goods_sm_logo = $smname;
                $goods->goods_md_logo = $mdname;
                $goods->goods_bg_logo = $bgname;

            }
            else
            {
                return false;
            }
        }else{
            return false;
        }

        $goods->save();
        return $goods->id;
    }

    public static function list(){
        $goods = Goods::get();

        foreach($goods as $k=>$v){
            $attr = [];
            $sku = [];
            $image = [];
            $category = [];

            // (Ｔ▽Ｔ)
            $attr = DB::table('goods_attributes')
            ->where('goods_id',$v->id)
            ->select('attr_name','attr_value')
            ->get();
            // ヾ(◍°∇°◍)ﾉﾞ
            $sku = DB::table('goods_skus')
            ->where('goods_id',$v->id)
            ->select('sku_name','sku_value','inventory','price')
            ->get();
            // =￣ω￣=
            $image = DB::table('goods_images')
            ->where('goods_id',$v->id)
            ->select('goods_image','goods_sm_img','goods_md_img','goods_bg_img')
            ->get();
            // ヾ(๑╹◡╹)ﾉ"
            $category = DB::table('goods_categories')
            ->where('id',$v->goods_type_id)
            ->orwhere('id',$v->goods_type_id2)
            ->orwhere('id',$v->goods_type_id3)
            ->select('cate_name')
            ->get();
            
            $v->attr = $attr;
            $v->sku = $sku;
            $v->image = $image;
            $v->category = $category;
        }
        
        return $goods;

    }


}
