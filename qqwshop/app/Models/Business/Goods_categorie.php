<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;
use App\Models\Business\Goods;

class Goods_categorie extends Model
{
    //
    public static function index_cate(){
        $data = self::get();
        
        $data = $data->toArray();
        
        $category = new self;
        $data = $category->grade($data);

        return $data;
    }
    function grade($data,$parent_id=0,$level=0){
        $res=[];
        foreach($data as $v){
            if($v['parent_id']==$parent_id){
                $v['level']=$level;
                $v['child']=$this->grade($data,$v['id'],$level+1);
                $res[]=$v;
            }
        }
        return $res;
    }

    public static function goods_list($id){
        $data = Goods::where("goods_type_id",$id)
                ->orwhere("goods_type_id2",$id)
                ->orwhere("goods_type_id3",$id)
                ->get();
                
        return $data;
    }

   
}
