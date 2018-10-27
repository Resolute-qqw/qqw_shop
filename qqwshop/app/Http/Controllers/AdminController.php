<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Role_admin;

class AdminController extends Controller
{
    // 管理员
    
    public function admin_list(Request $req){
        $data = Admin::list($req);
        $role = Role::get();
        foreach($role as $v){
            $count = Role_admin::where('role_id',$v->id)->count();
            $v->num = $count;
        }
        return view("admin.admin_list",[
            'data'=>$data,
            'AdminNum'=>$data->count(),
            'role'=>$role
        ]);

    }
    public function info(){
        $id = session('admin');
        $info = Admin::where('id',$id)->first();
        
        return view("admin.admin_info",[
            'info'=>$info,
        ]);
    }
    public function login(){
        return view("admin.login");
    }

    public function dologin(Request $req){
        $status = Admin::dologin($req);
        if($status){
            return redirect()->route('adminIndex')->with('tips','登录成功哒!');
        }else{
            return back()->with('tips','账号或密码错误');
        }
    }
    public function logout(Request $req){
        $req->session()->flush();
        return redirect()->route('login');
    }

    public function add(Request $req){
        $status =Admin::add($req);
        if($status['error']){
            return redirect()->route('privilege.index')->with('tips',$status['message']);
        }
        return redirect()->route('adminList');
    }
    public function destroy($id){
        Admin::admin_delete($id);
        return redirect()->route('adminList')->with('tips','删除成功!');

    }
    
}
