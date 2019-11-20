<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller{

	//禁止重复登陆
	
	public function initialize(){
        if(session('?admin.id')){
            $this->redirect('admin/home/index');
        }
    }
	
	//后台登录
	
	public function login(){
		if(request()->isAjax()){
			$data=[
				'username'=>input('post.username'),
				'password'=>md5(input('post.password')),
			];
			$ret=model('Admin')->login($data);
			if($ret == 1){
				$this->success('欢迎回来~','admin/home/index');
			}else{
				$this->error($ret);
			}
		}
		return view();
	}

	//注册方法
	public function register(){

		if(request()->isAjax()){
			$data=[
				'username'=>input('post.username'),
				'password'=>input('post.passowrd'),
				'repassword'=>input('post.repassword'),
				'nickname'=>input('post.nickname'),
				'email'=>input('post.email')
			];
			$result = model('Admin')->register($data);
			if($result == 1){
				$this->success('恭喜注册成功','admin/index/login');
			}else{
				$this->error($result);
			}
		}
	}

	//忘记密码
	public function forget(){
		if(request()->isAjax()){
			$code=mt_rand(1000,9999);
			session('code',$code);
			$headers='From: 肥猪博客<webmaster@upupw.net>';

			$result=mail(input('post.email'),'请查收你的验证码','验证码为'.$code,$headers);
			if($result){
				$this->success('验证码发送成功');
			}else{
				$this->error('验证码发送失败');
			}
		}
		return view();
	}

	//重置密码

	public function resetPassword(){
		
		$data=[
			'code'=>input('post.code'),
			'email'=>input('post.email')
		];
		
		
			$result=model('Admin')->resetPassword($data);
			if($result ==1 ){
				$this->success('密码重置成功,请登陆邮箱查看新密码','admin/index/login');
			}else{
				$this->error($result);
			}
		
		

		
	}

	
}