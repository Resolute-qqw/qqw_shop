<?php

namespace App\Models\Goods;

use Illuminate\Database\Eloquent\Model;
use Hash;

class User extends Model
{
    protected $fillable = ['login_name','login_pwd','phone'];
    //
    public static function add($data){
        $business = new self;
        $business->fill($data);
        $business->login_pwd = Hash::make($data['login_pwd']);
        $business->save();
    }
    public static function login($data){
        $status = self::where('login_name',$data['login_name'])->first();
        if($status){
            if( Hash::check($data['login_pwd'],$status->login_pwd)){
                session([
                    'user'=>$status->id,
                    'login_name'=>$status->login_name,
                ]);
                return true;
            }
        }else{
            return false;
        }

    }
}
