<?php
namespace app\common\validate;
use think\Validate;

class Admin extends Validate{
	protected $rule=[
		'username|管理员帐户'=>'min:6|require|unique:admin',
		'password|密码'=>'min:6|require',
		'repassword|确认密码'=>'require|confirm:password',
		'nickname|昵称'=>'require',
		'email|邮箱'=>'require|unique:admin',
		'code|验证码'=>'require|min:4'

	];
	
	
	//登录验证场景
	
	public function sceneLogin(){
		return $this->only(['username','password'])->remove('username','unique');
	}

	//注册场景验证
	public function sceneRegister(){
		return $this->only(['username','password','repassword','nickname','email'])->append('username','unique:admin');
	}

	//重置密码场景
	public function sceneResetPassword(){
		return $this->only(['code']);
	}

	//添加管理员场景
	public function sceneAdd(){
		return $this->only(['username','password','repassword','nickname','email']);
	}

	//编辑管理员场景
	public function sceneEdit(){
		return $this->only(['password','repassword','nickname']);
	}
}