<?php

namespace App\Models\Business;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Business extends Model
{
    // 商家表
    protected $table = 'business';
    protected $fillable = ['login_name','login_pwd','shop_name','company_name','company_phone','company_address','contacts_name','contacts_qq','contacts_phone','contacts_email','b_l_n','t_r_c','o_c_c','l_r','l_r_id','n_o_a_b','bank_branch','bank_account'];

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
                    'business'=>$status->id,
                    'login_name'=>$status->login_name,
                    'shop_name'=>$status->shop_name,
                ]);
                return true;
            }
        }else{
            return false;
        }

    }
}
