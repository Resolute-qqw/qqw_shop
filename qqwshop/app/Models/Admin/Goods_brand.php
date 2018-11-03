<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Goods_brand extends Model
{
    protected $fillable = ['brand_name','brand_logo','brand_describe'];
    public static function add($req){
        $brand = new self;
        $data = $req->all();
        $brand->fill($data);
        
        if($req->has('brand_logo') && $req->brand_logo->isValid()) {

            $validator = Validator::make($req->all(), [
                'brand_logo'=>'image|max:2048',
            ]);

            if(!$validator->fails())
            {
                $date = date('Ymd');
                $brand_logo = $req->file('brand_logo')->store( 'brand/'.$date ,"public");

                $brand->brand_logo = $brand_logo;
            }
            else
            {
                return false;
            }
        }else{
            return false;
        }
        $brand->save();
        return true;
        
    }
   
}
