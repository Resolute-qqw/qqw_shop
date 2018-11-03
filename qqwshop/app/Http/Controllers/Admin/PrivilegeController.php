<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PrivilegeRequest;
use App\Models\Admin\Role;
use App\Models\Admin\Admin;
use App\Models\Admin\Privilege;

class PrivilegeController extends Controller
{
    public function index(){
        $roleList = Role::role_list();
        foreach($roleList as $v){
            if($v->admin_id==null){
                $v->number = 0;
                $v->admin_name = "暂无";
            }
            else{
                $v->number = count(explode(",",$v->admin_id));
            }
        }

        return view("admin.admin.admin_privilege",[
            'roleList'=>$roleList,
            'number'=>count($roleList)
        ]);
    }
    public function create(){
        $admin = Admin::get();
        $pri_list = Privilege::pri_list();

        return view("admin.admin.privilege_add",[
            'admin'=>$admin,
            'pri_list'=>$pri_list,
        ]);
    }
    public function store(PrivilegeRequest $req){
        $status = Privilege::pri_add($req->all());
        if($status['error']){
            return redirect()->route('admin.privilege.index')->with('tips',$status['message']);
        }
        return redirect()->route('admin.privilege.index')->with('tips','添加成功!');
    }
    public function edit($id){
        $admin = Admin::get();
        $pri_list = Privilege::pri_list();
        $priInfo = Privilege::pri_get($id);
        $admin_id=[];
        $pri_id=[];
        
        if(isset($priInfo[0]->admin_id)){
            $admin_id[] = explode(",",$priInfo[0]->admin_id);

        }
        if(isset($priInfo[0]->privilege_id)){
            $pri_id[] = explode(",",$priInfo[0]->privilege_id);

        }
        if(!empty($admin_id)){
            $admin_id = array_unique($admin_id[0]);
        }
        if(!empty($pri_id)){
            $pri_id = array_unique($pri_id[0]);
        }
        return view("admin.admin.privilege_edit",[
            'admin'=>$admin,
            'pri_list'=>$pri_list,
            'priInfo'=>$priInfo[0],
            'admin_id'=>$admin_id,
            'pri_id'=>$pri_id,
        ]);
    }
    public function update(Request $req,$id){

        Privilege::pri_update($req->all(),$id);
        return redirect()->route('admin.privilege.index')->with('tips','修改成功!');

    }
    public function destroy($id){
        Privilege::pri_delete($id);
        return redirect()->route('admin.privilege.index')->with('tips','删除成功!');
    }
    
}
