<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business\Goods_categorie;
use App\Models\Business\Goods;
use App\Models\Business\Sku_rule;
use App\Models\Goods\Goods_cart;

class GoodsController extends Controller
{
    //
    public function index(){
        $category = Goods_categorie::index_cate();
        
        return view("goods.index.index",[
            'category'=>$category,
        ]);
    }
    public function list($id){

        $goods_list = Goods::goods_list($id);
        foreach($goods_list as $k=>$v){
            $max = Sku_rule::where('goods_id',$v->id)->max('price');
            $min = Sku_rule::where('goods_id',$v->id)->min('price');
            if($max!=$min)
            $v->price = $min."~".$max;
            else
            $v->price = $max;
        }

        return view("goods.index.list",[
            'goods_list'=>$goods_list,
        ]);
    }
    public function item($id){
        $goods_data = Goods::goods_item($id);
        $cart_count = Goods_cart::where("user_id",session('user'))->sum('goods_count');
        
        // dd($goods_data['attr']);
        return view("goods.index.item",[
            'goods'=>$goods_data['goods'],
            'images'=>$goods_data['images'],
            'images_one'=>$goods_data['images_one'],
            'attr'=>$goods_data['attr'],
            'sku'=>$goods_data['sku'],
            'cart_count'=>$cart_count
        ]);
    }
    public function add_cart(Request $req){

        $cart_id = Goods_cart::add($req->all());

        if($cart_id){
            return redirect()->route('goods.success_cart',['cart_id'=>$cart_id,'count'=>$req->goods_count]);
        }else{
            return redirect()->route('user.login')->with('tips','添加失败!');
        }
    }

    public function success_cart($cart_id,$count){
        $data = Goods_cart::where("id",$cart_id)->first();

        $img = Goods::where("id",$data['goods_id'])->value("goods_logo");
        $cart_count = Goods_cart::where("user_id",session('user'))->sum('goods_count');
        
        return view("goods.goods_cart.success_cart",[
            'data'=>$data,
            'count'=>$count,
            'cart_count'=>$cart_count,
            'img'=>$img
        ]);
    }
    public function cart(){
        $goods = Goods_cart::where("user_id",session('user'))->get();
        $count = 0;
        foreach($goods as $v){
            $v->img = Goods::where("id",$v['goods_id'])->value("goods_logo");
            $count + $v->goods_count;
        }
        
        return view("goods.goods_cart.cart",[
            'goods'=>$goods,
            'count'=>$count
        ]);
    }
    public function cart_ajax(Request $req){
        
        if($req->status=="delete"){
            $goods = Goods_cart::where("id",$req->cart_id)->delete();
        }
        if($req->status=="count" || $req->status=="change"){
            $goods = Goods_cart::where("id",$req->cart_id)->first();
            if($req->status=="count")
                $goods->goods_count += $req->value;
            if($req->status=="change")
                $goods->goods_count = $req->value;
            $goods->save();
        }
        if($req->status=="ckeck"){
            $goods = Goods_cart::where("id",$req->cart_id)->first();
            $goods->goods_status = $req->value==0?1:0;
            $goods->save();
            return $goods;
        }

    }
}
