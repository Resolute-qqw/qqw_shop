<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Goods_categorie extends Model
{
    protected $fillable = ['cate_name','parent_id'];
    //
    public static function list(){
        $categorie=  Goods_categorie::orderBy(DB::raw('concat(path,id)'),'asc')
                    ->paginate(10);
        foreach($categorie as $v){
            $v->level = count(explode('-', $v['path']))-2;
        }
        return $categorie;
    }
}
