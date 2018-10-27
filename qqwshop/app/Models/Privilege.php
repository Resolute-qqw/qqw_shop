<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\Privilege;
use App\Models\Privilege_role;
use App\Models\Role_admin;
use DB;

class Privilege extends Model
{
    public static function pri_list(){
        $data = self::get();
        $data = $data->toArray();

        $privilege = new Privilege;
        $data = $privilege->grade($data);
        
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

    public static function pri_add($data){
        $roleModel = new Role;
        
        $status = Role::where('role_name',$data['role_name'])->first();
        if($status){
            return [
                'error'=>true,
                'message'=>'权限名称不能重复'
            ];
        }

        $role = $roleModel->fill($data);
        $role->save();
        $role_id = $role->id;
        
        if(isset($data['admin'])){
            foreach($data['admin'] as $v){
                DB::table('role_admins')->insert([
                    'role_id' => $role_id, 'admin_id' =>$v
                ]);
            }
        }
        if(isset($data['pri_admin'])){
            foreach($data['pri_admin'] as $v){
                DB::table('privilege_roles')->insert([
                    'role_id' => $role_id, 'privilege_id' =>$v
                ]);
            }
        }
    }

    public static function pri_get($id){
        
        $data = DB::select("SELECT r.id,r.role_name,r.describe,p.privilege,p.pri_url,GROUP_CONCAT(p.id) as privilege_id,GROUP_CONCAT(a.id) as admin_id
                            FROM roles r 
                            LEFT JOIN role_admins ra ON r.id=ra.role_id 
                            LEFT JOIN admins a ON ra.admin_id=a.id
                            LEFT JOIN privilege_roles pr ON pr.role_id=r.id
                            LEFT JOIN privileges p ON p.id=pr.privilege_id 
                            WHERE r.id=$id
                            GROUP BY r.id");
        return $data;
    }
    public static function pri_update($data,$id){

        $roleModel = Role::find($id);
        $roleModel->fill($data);
        $roleModel->save();

        Privilege_role::where('role_id',$id)->delete();
        Role_admin::where('role_id',$id)->delete();
        
        // dd($data['pri_admin']);
        if(isset($data['pri_admin'])){
            foreach($data['pri_admin'] as $v){
                $pri_role = new Privilege_role;
                $pri_role->role_id=$id;
                $pri_role->privilege_id=$v;
                $pri_role->save();
            }
        }
        if(isset($data['admin'])){
            foreach($data['admin'] as $v){
                $role_admin = new Role_admin;
                $role_admin->role_id=$id;
                $role_admin->admin_id=$v;
                $role_admin->save();
            }
        }

    }
    public static function pri_delete($id){
        Role::destroy($id);
        Privilege_role::where('role_id',$id)->delete();
        Role_admin::where('role_id',$id)->delete();
    }
}
