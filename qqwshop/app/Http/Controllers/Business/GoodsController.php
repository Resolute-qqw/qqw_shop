<?php

namespace App\Http\Controllers\Business;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GoodsRequest;
use App\Models\Business\Goods_brand;
use App\Models\Business\Goods_categorie;
use App\Models\Business\Goods;
use App\Models\Business\Goods_image;
use App\Models\Business\Goods_attribute;
use App\Models\Business\Goods_sku;
use App\Models\Business\Sku_rule;

class GoodsController extends Controller
{
    public function index(){
        $goods = Goods::list();
        return view('business.goods.index',[
            'goods'=>$goods,
        ]);
    }
    public function create(){
        $brand = Goods_brand::get();
        $categorie = Goods_categorie::where('parent_id',0)->get();
        
        return view('business.goods.add_goods',[
            'brand'=>$brand,
            'categorie'=>$categorie,
        ]);
    }
    public function category_ajax(){
        $categorie = Goods_categorie::where('parent_id',$_GET['id'])->get();
        $data = $categorie->all();
        return $data;
    }
    public function store(GoodsRequest $req){
        
        $id = Goods::add($req);
        $status2 = Goods_image::add($req,$id);
        $status3 = Goods_attribute::add($req,$id);
        $status4 = Goods_sku::add($req,$id);
        if(!($id && $status2 && $status3 && $status4)){
            dd("傻瓜");
        }
        return redirect()->route('business.goods.goods_sku',['id'=>$id])->with('tips','添加成功咯!');
    }
    public function goods_sku($id){
        $data = Goods::goods_sku($id);
        return view("business.goods.goods_sku",[
            'data'=>$data,
            'goods_id'=>$id
        ]);
    }
    public function add_sku_zuhe(Request $req){
        $data = $req->all();
        Goods::goods_add_sku($data);
        return redirect()->route('business.goods.index')->with('tips','规格添加成功啦·······!');
    }
}
