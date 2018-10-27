<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Role_admin;
use App\Models\Role;

use Hash;
use DB;

class Admin extends Model
{
    protected $fillable = ['username','password','remarks'];
    public static function dologin($data){
        $user = self::where('username',$data->username)->first();
        $position =  DB::table('role_admins as ra')
            ->join('roles as r','r.id',"=","ra.role_id")
            ->join('admins as a','ra.admin_id',"=",'a.id')
            ->where('a.id',"=",$user->id)
            ->select('r.role_name')
            ->get();

        if($user){
            if( Hash::check($data->password , $user->password) ){
                session([
                    'admin'=>$user->id,
                    'username'=>$user->username,
                    'position'=>$position[0]->role_name,
                ]);
                return true;
            }else{
                return false;
            }
        }
    }
    public static function list($req){
        $data =  DB::table('admins as a')
                ->join('role_admins as ra','a.id',"=","ra.admin_id")
                ->join('roles as r','ra.role_id',"=","r.id")
                ->select('a.created_at','a.status','a.id','a.username','a.remarks','r.describe',DB::raw('GROUP_CONCAT(r.role_name) role_names'))
                ->groupBy('a.id')
                ->paginate(5);
        if($req->username){
            $data->where('username',$req->username);
        }
        if($req->position){
            $data->where('position',$req->position);
        }
        if($req->created_at){
            $data->where('created_at',"=",$req->created_at);
        }
        if($req->order){
            $data->orderBy('created_at',$req->order);
        }
        
        return $data;
    }
    public static function add($req){
        $data = $req->all();

        $status = Admin::where('username',$data['username'])->first();
        if($status){
            return [
                'error'=>true,
                'message'=>'管理员名字不能重复'
            ];
        }

        $admin = new self;
        $admin->fill($data);
        $admin->password = Hash::make($req->password);
        $admin->save();
        
        $admin_id = $admin->id;
        $role_admin = new Role_admin;
        $role_admin->role_id = $data['position'];
        $role_admin->admin_id = $admin_id;
        $role_admin->save();
    }
    
    public static function admin_delete($id){
        Admin::where('id',$id)->delete();
        Role_admin::where('admin_id',$id)->delete();
    }
}
