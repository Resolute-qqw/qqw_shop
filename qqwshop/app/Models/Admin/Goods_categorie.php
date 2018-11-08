<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class Goods_categorie extends Model
{
    public $timestamps = false;
    protected $fillable = ['cate_name','parent_id'];
    //
    public static function list(){
        $categorie=  Goods_categorie::orderBy(DB::raw('concat(path,id)'),'asc')
                    ->get();
        foreach($categorie as $v){
            $v->level = count(explode('-', $v['path']))-2;
        }
        return $categorie;
    }
    
    public static function add_cate($req){
        $data = $req->all();

        foreach($data['cate_name'] as $v){
            $category = new Goods_categorie;

            if($data['parent_id']==0){
                $category->path  = "-";
            }else{
                $cate = Goods_categorie::select(DB::raw('concat(path,id,"-") as path'))->where('id',$data['parent_id'])->first();
                $category->path = $cate->path;
            }
            $category->cate_name = $v;
            $category->parent_id = $data['parent_id'];

            $status = $category->save();
        }

        if($status){
            return true;
        }else{
            return [
                'error'=>"添加失败！",
            ];
        }
        
    }
}
