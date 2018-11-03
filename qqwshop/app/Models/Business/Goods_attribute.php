<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;

class Goods_attribute extends Model
{
    public $timestamps = false;
    protected $fillable = ['attr_name','attr_value'];

    public static function add($req,$id){

        foreach($req->attr_name as $k=>$v){

            $goods_attribute = new self;
            $goods_attribute->goods_id = $id;
            $goods_attribute->attr_name = $v;
            $goods_attribute->attr_value = $req->attr_value[$k];
            $goods_attribute->save();
        }

        return true;
    }
}
