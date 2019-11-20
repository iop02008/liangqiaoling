<?php
namespace app\admin\controller;

class Admin extends Base{

    //管理员列表
    public function all(){
        $adminInfo=model('Admin')->order(['is_super'=>'desc','create_time'=>'desc','status'=>'desc'])->paginate(10);
        $viewData=[
            'adminInfo'=>$adminInfo
        ];
        $this->assign($viewData);
        return view();
        
    }

    //管理员添加
    public function add(){
        if(request()->isAjax()){
            $data=[
                'username'=>input('post.username'),
                'password'=>md5(input('post.password')),
                'repassword'=>md5(input('post.repassword')),
                'nickname'=>input('post.nickname'),
                'is_super'=>input('post.is_super')??0,
                'email'=>input('post.email'),
                'status'=>input('post.status')??0
            ];
            $result=model('Admin')->add($data);
            if($result == 1){
                return $this->success('管理员添加成功','admin/admin/all');
            }else{
                return $this->error($result);
            }
        }
        return view();
    }

    //管理员编辑
    public function edit(){
        if(request()->isAjax()){
            $data=[
                'id'=>input('post.id'),
                'username'=>input('post.username'),
                'password'=>input('post.password'),
                'repassword'=>input('post.repassword'),
                'nickname'=>input('post.nickname'),
                'email'=>input('post.email'),
                'is_super'=>input('post.is_super')??0,
                'status'=>input('post.status')??0
            ];
            $result=model('Admin')->edit($data);
            if($result == 1){
                return $this->success('管理员信息修改成功','admin/admin/all');
            }else{
                return $this->error($result);
            }
        }
        $id=input('id');
        $adminInfo=model('Admin')->find($id);
        $viewData=[
            'adminInfo'=>$adminInfo
        ];
        $this->assign($viewData);
        return view();
    }

    //禁用启用管理员
    public function adminSwitch(){
        if(request()->isAjax()){
            $data=[
                'id'=>input('post.id'),
                'status'=>input('post.status')
            ];
            $result = model('Admin')->adminSwitch($data);
            if($result == 1){
                if($data['status']==1){
                    $msg='管理员启用成功';
                }else{
                    $msg='管理员禁用成功';
                }
                return $this->success($msg,'admin/admin/all');
            }else{
                return $this->error($result);
            }
        }
    }

    //删除管理员
    public function del(){
        if(request()->isAjax()){
            $id=input('post.id');
            $result=model('Admin')->del($id);
            if($result == 1){
                return $this->success('删除成功','admin/admin/all');
            }else{
                return $this->error($result);
            }
        }
    }
    
}