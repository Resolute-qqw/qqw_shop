<?php

namespace App\Models\Goods;

use Illuminate\Database\Eloquent\Model;

class Goods_cart extends Model
{
    protected $fillable = ['goods_id','goods_name','user_id','goods_count'];
    public static function add($data){
        
        $str = "";
        foreach($data['sku_name'] as $k=>$v){   
            $str .= $v.":".$data['sku_value'][$k].";";
        }

        $cart = self::where("goods_id",$data['goods_id'])
        ->where("goods_sku",$str)
        ->first();
        
        if($cart){
            $cart->goods_count = $data['goods_count']+$cart->goods_count;
            $cart->goods_price = $data['goods_price'];

            $cart->save();

            return $cart->id;

        }else{
            $goods_cart = new self;
            $goods_cart->fill($data);
            $goods_cart->goods_price = $data['goods_count'] * $data['goods_price'];
            $goods_cart->goods_sku = $str;
            $goods_cart->save();
           
            return $goods_cart->id;
        }
        
    }
}
