<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    protected $fillable = ['role_name','describe'];
    public static function role_list(){
        $data = DB::select('SELECT r.*,GROUP_CONCAT(a.username) as username,GROUP_CONCAT(a.id) as admin_id
                            FROM roles r 
                            LEFT JOIN role_admins ra ON r.id=ra.role_id 
                            LEFT JOIN admins a ON ra.admin_id=a.id 
                            GROUP BY role_name');
        return $data;
    }
}
