<?php
namespace app\common\validate;

use think\Validate;

class Member extends Validate{
    protected $rule=[
        'username|会员名'=>'require|min:6|max:16|unique:member',
        'password|密码'=>'require|min:6|max:16',
        'repassword|确认密码'=>'require|confirm:password',
        'nickname|昵称'=>'require|unique:member',
        'email|邮箱'=>'require|unique:member'
    ];


    //添加场景
    public function sceneAdd(){
        return $this->only(['username','password','repassword','nickname','email']);
    }

    //编辑场景

    public function sceneEdit(){
        return $this->only(['password','nickname','email']);
    }

    //注册场景
    public function sceneRegister(){
        return $this->only(['username','password','repassword','nickname','email']);
    }

    //登陆场景
    public function sceneLogin(){
        return $this->only(['username','password'])->remove('username','unique');
    }
}