<?php
namespace app\admin\controller;

class Member extends Base{

    //会员列表

    public function all(){
        $memberInfo=model('Member')->order('create_time','desc')->paginate(10);
        $viewData=[
            'memberInfo'=>$memberInfo
        ];
        $this->assign($viewData);
        return view();
    }

    //会员添加

    public function add(){
        if(request()->isAjax()){
            $data=[
                'username'=>input('post.username'),
                'password'=>md5(input('post.password')),
                'repassword'=>md5(input('post.repassword')),
                'nickname'=>input('post.nickname'),
                'email'=>input('post.email')
            ];
            $result=model('Member')->add($data);

            if($result == 1){
                return $this->success('会员添加成功','admin/member/list');
            }else{
                return $this->error($result);
            }
        }
        return view();
    }

    //会员编辑

    public function edit(){
        if(request()->isAjax){
            $data=[
                'id'=>input('post.id'),
                'password'=>input('post.password'),
                'nickname'=>input('post.nickname'),
                'email'=>input('post.email')
            ];

            $result=model('Member')->edit($data);
            if($result == 1){
                return $this->success('会员修改成功','admin/member/list');
            }else{
                return $this->error($result);
            }
        }
        $memberInfo=model('Member')->find(input('id'));
        $viewData=[
            'memberInfo'=>$memberInfo
        ];
        $this->assign($viewData);
        return view();
    }

    //会员删除

    public function del(){
        $memberInfo=model('Member')->with('comments')->find(input('id'));
        $result=$memberInfo->together('comments')->delete();
        if($result){
            return $this->success('会员删除成功','admin/member/list');
        }else{
            $this->error('会员删除失败');
        }
    }
}