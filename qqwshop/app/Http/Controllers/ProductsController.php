<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

use App\Models\Goods_brand;
use App\Models\Goods_categorie;


class ProductsController extends Controller
{
    public function products_list(){
        return view("products.products_list");
    }
    public function brand_manage(){
        $brand = Goods_brand::paginate(10);
        return view("products.brand_manage",[
            'brand'=>$brand,
        ]);
    }
    public function category_manage(){
        $goods_categorie = Goods_categorie::list();
        return view("products.category_manage",[
            'goods_categorie'=>$goods_categorie,
        ]);
    }
    public function category_add(){
        return view("products.products_category_add");
    }
    public function add(){
        return view("products.products_add");
    }
    public function brand_create(){
        return view("products.add_brand");
    }
    public function brand_store(BrandRequest $req){

        $status = Goods_brand::add($req);
        if($status){
            return redirect()->route('brandManage')->with('tips','添加成功!');
        }else{
            return back()->with('tips','账号或密码错误');
        }
    }
}
