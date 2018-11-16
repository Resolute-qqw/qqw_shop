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

    
   
}
