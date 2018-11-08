<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business\Goods_categorie;
use App\Models\Business\Goods;

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

        $goods_list = Goods_categorie::goods_list($id);
        
        return view("goods.index.list",[
            'goods_list'=>$goods_list,
        ]);
    }
    public function item($id){
        $goods_data = Goods::goods_item($id);
        // dd($goods_data['attr']);
        return view("goods.index.item",[
            'goods'=>$goods_data['goods'],
            'images'=>$goods_data['images'],
            'images_one'=>$goods_data['images_one'],
            'attr'=>$goods_data['attr'],
            'sku'=>$goods_data['sku'],

        ]);
    }
    public function cart(Request $req){
        dd($req->all());
    }
}
