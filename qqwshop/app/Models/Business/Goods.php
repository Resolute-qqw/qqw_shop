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
                $goods->goods_logo = $goods_logo;

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
                $img->resize(200,200);
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
            ->select('sku_name','sku_value')
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
    // 商品详情页信息
    public static function goods_item($id){
        $data['goods'] = Goods::where("id",$id)->first();
        $data['images'] = Goods_image::where("goods_id",$id)->get();
        $data['images_one'] = Goods_image::where("goods_id",$id)->first();
        $data['attr'] = Goods_attribute::where("goods_id",$id)->select('attr_name','attr_value')->get();

        $sku = Goods_sku::where("goods_id",$id)
        ->where("status",1)
        ->groupBy('sku_name')
        ->select('sku_name',DB::raw('GROUP_CONCAT(sku_value SEPARATOR "&&") sku_value'))
        ->get();
        foreach($sku as $v){
            $v->sku_value = explode("&&",$v->sku_value);
        }
        $data['sku'] = $sku;

        return $data;
    }
    // 分类下de商品
    public static function goods_list($id){
        $data = Goods::where("goods_type_id",$id)
                ->orwhere("goods_type_id2",$id)
                ->orwhere("goods_type_id3",$id)
                ->where('is_sku',1)
                ->select('id','goods_name','goods_logo','is_sku')
                ->get();

        return $data;
    }

    public static function goods_sku($id){
        $data = Goods_sku::where("goods_id",$id)
        ->groupBy("sku_name")
        ->select("*",DB::raw('GROUP_CONCAT(sku_value SEPARATOR "&&") sku_vals'),DB::raw('GROUP_CONCAT(id SEPARATOR "&&") ids'))
        ->get();
        foreach($data as $v){
            $v->sku_vals = explode("&&",$v->sku_vals);
            $v->ids = explode("&&",$v->ids);
        }
        return $data;
    }
    
    public static function goods_add_sku($data){
        $data['status_id'] = json_decode($data['status_id']);
        $data['sku_zuhe'] = json_decode($data['sku_zuhe']);

        // 获取sku表 将选中的规格设置为1 否则0
        $goods_sku = Goods_sku::where("goods_id",$data['goods_id'])->get();
        foreach($goods_sku as $v){
            if(in_array($v->id,$data['status_id'])){
                Goods_sku::where('id',$v->id)->update(['status'=>1]);
            }else{
                Goods_sku::where('id',$v->id)->update(['status'=>0]);
            }
        }
        // 往Sku_rules表里 插入规格
        foreach($data['sku_zuhe'] as $k=>$v){
            $setSku = new Sku_rule;
            $setSku->goods_id = $data['goods_id'];
            $setSku->sku_value = $v;
            $setSku->Inventory = $data['Txt_PriceSon'][$k];
            $setSku->price = $data['Txt_CountSon'][$k];
            $setSku->save();
        }
        // 更新商品表is_sku状态
        Goods::where("id",$data['goods_id'])->update(['is_sku'=>1]);

    }
}
