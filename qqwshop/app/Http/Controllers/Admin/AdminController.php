<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Role;
use App\Models\Admin\Role_admin;

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
        return view("admin.admin.admin_list",[
            'data'=>$data,
            'AdminNum'=>$data->count(),
            'role'=>$role
        ]);

    }
    public function info(){
        $id = session('admin');
        $info = Admin::where('id',$id)->first();
        
        return view("admin.admin.admin_info",[
            'info'=>$info,
        ]);
    }
    public function login(){
        return view("admin.admin.login");
    }

    public function dologin(Request $req){
        $status = Admin::dologin($req);
        if($status){
            return redirect()->route('admin.adminIndex')->with('tips','登录成功哒!');
        }else{
            return back()->with('tips','账号或密码错误');
        }
    }
    public function logout(Request $req){
        $req->session()->flush();
        return redirect()->route('admin.login');
    }

    public function add(Request $req){
        $status =Admin::add($req);
        if($status['error']){
            return redirect()->route('admin.privilege.index')->with('tips',$status['message']);
        }
        return redirect()->route('admin.adminList');
    }
    public function destroy($id){
        Admin::admin_delete($id);
        return redirect()->route('admin.adminList')->with('tips','删除成功!');

    }
    
}
