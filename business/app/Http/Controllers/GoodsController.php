<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods_brand;
use App\Models\Goods_categorie;

class GoodsController extends Controller
{
    public function index(){
        return view('goods.index');
    }
    public function create(){
        $brand =Goods_brand::get();
        $categorie = Goods_categorie::where('parent_id',0)->get();

        return view('goods.add_goods',[
            'brand'=>$brand,
            'categorie'=>$categorie,
        ]);
    }
    public function category_ajax(){
        $categorie = Goods_categorie::where('parent_id',$_GET['id'])->get();
        $data = $categorie->all();
        return $data;
    }
}
