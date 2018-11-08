<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;

class Goods_sku extends Model
{
    public $timestamps = false;
    protected $fillable = ['att_name','att_value','inventory','price'];

    public static function add($req,$id){
        $data = $req->all();
        
        $arr_name =[];
        $arr_value =[];
        $arr_inventory =[];
        $arr_price =[];
        foreach($data as $k=>$v){
            if( substr($k,0,8)=="sku_name" ){
                $arr_k = substr($k,8);
                $arr_name[$arr_k] = $data[$k];
            }
            if( substr($k,0,9)=="sku_value"){
                $arr_k = substr($k,9);
                $arr_value[$arr_k] = $data[$k];
            }
            if( substr($k,0,5)=="price"){
                $arr_k = substr($k,5);
                $arr_price[$arr_k] = $data[$k];
            }
            if( substr($k,0,9)=="inventory"){
                $arr_k = substr($k,9);
                $arr_inventory[$arr_k] = $data[$k];
            }
        }

        foreach($arr_name as $k=>$v){

            foreach($arr_value[$k] as $k2=>$v2){
                $goods_sku = new self;
                $goods_sku->goods_id = $id;
                $goods_sku->sku_name = $v[0];
                $goods_sku->sku_value = $v2;
                $goods_sku->inventory = $arr_inventory[$k][$k2];
                $goods_sku->price = $arr_price[$k][$k2];
                
                $goods_sku->save();
            }

        }
       
        return true;
    }
}
