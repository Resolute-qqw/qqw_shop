<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Role_admin;
use App\Models\Admin\Role;

use Hash;
use DB;

class Admin extends Model
{
    protected $fillable = ['username','password','remarks'];
    public static function dologin($data){
        $admin = new self;
        $user = self::where('username',$data->username)->first();
        
        $position =  DB::table('role_admins as ra')
            ->join('roles as r','r.id',"=","ra.role_id")
            ->join('admins as a','ra.admin_id',"=",'a.id')
            ->where('a.id',"=",$user->id)
            ->select('r.role_name')
            ->get();
        
        if($user){
            if( Hash::check($data->password , $user->password) ){
                $root = Role_admin::where("role_id",1)->where("admin_id",$user->id)->count();
                if($root>0){
                    session([
                        'root'=>"敲级管理员",
                    ]);
                }
                session([
                    'admin'=>$user->id,
                    'username'=>$user->username,
                    'position'=>$position[0]->role_name,
                    'url_path'=>$admin->getUalPath($user->id),
                ]);
                return true;
            }else{
                return false;
            }
        }
    }
    public function getUalPath($adminId)
    {
        $data = DB::table('role_admins as ra')
        ->join('privilege_roles as pr','pr.role_id','ra.role_id')
        ->join('privileges as p','p.id',"=","pr.privilege_id")
        ->where('ra.admin_id',$adminId)
        ->where('p.pri_url',"!="," ")
        ->select(DB::raw('GROUP_CONCAT(p.pri_url) url_paths'))
        ->groupBy('ra.id')
        ->get();

        $res = [];
        foreach($data as $v)
        {
            if(strpos($v->url_paths,',')===false)
            {
                $res[] = $v->url_paths;
            }
            else
            {
                $separate = explode(',', $v->url_paths);
                $res = array_merge($res, $separate);
            }
        }
        return array_unique($res);
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
