<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;

class Goods_sku extends Model
{
    public $timestamps = false;
    protected $fillable = ['attr_name','attr_value','inventory','price'];

    public static function add($req,$id){

        foreach($req->sku_name as $k=>$v){

            $goods_sku = new self;
            $goods_sku->goods_id = $id;
            $goods_sku->sku_name = $v;
            $goods_sku->sku_value = $req->sku_value[$k];
            $goods_sku->inventory = $req->inventory[$k];
            $goods_sku->price = $req->price[$k];

            $goods_sku->save();
        }
       
        return true;
    }
}
