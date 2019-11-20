<?php
namespace app\admin\controller;

class System extends Base{
    //系统设置

    public function set(){
        if(request()->isAjax()){
            $data=[
                'id'=>input('post.id'),
                'webname'=>input('post.webname'),
                'copyright'=>input('post.copyright'),
                "username"=>input("post.username"),
                "age"=>input("post.age"),
                "career"=>input("post.career"),
                "interest"=>input("post.interest"),
                "wechat"=>input("post.wechat"),
                "phone"=>input("post.phone"),
                "qq"=>input("post.qq"),
                "email"=>input("post.email"),
                "url"=>input("post.url"),
                "record"=>input("post.record"),

            ];
            $result=model('System')->set($data);
            if($result == 1){
                return $this->success('系统设置修改成功','admin/system/set');
            }else{
                return $this->error($result);
            }
        }
        $webInfo=model('System')->find();
        $viewData=[
            'webInfo'=>$webInfo
        ];
        $this->assign($viewData);
        return view();
    }
}