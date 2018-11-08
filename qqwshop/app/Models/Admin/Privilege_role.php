<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Privilege_role extends Model
{
    protected $fillable = ['role_id','privilege_id'];
    // public function get_pri(){
    //     return $this->hasMany(Privilege::class,"id","privilege_id");
    // }
}
