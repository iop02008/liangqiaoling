<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;


class Admin extends Model{

	//软删除
	use SoftDelete;
	protected static $deleteTime='delete_time';
	protected $auto=['ip','password'];

	//自动完成IP填写
	public function setIpAttr(){
		return request()->ip();
	}
	
	protected $readonly=[
		'username','email'
	];
	
	//登录校验
	
	public function login($data){
		// $validate=new \app\common\validate\Admin();
		//独立验证
		$validate=new \think\Validate();
		$validate->rule([
			'username|用户名'=>'require',
			'password|密码'=>'require'
		]);
		if(!$validate->check($data)){
			return $validate->getError();
		}
		$ret=$this->where($data)->find();
		if($ret){
			if($ret['status']!=1){
				return '此帐户被禁用';
			}
			$sessionData=[
				'id'=>$ret['id'],
				'nickname'=>$ret['nickname'],
				'is_super'=>$ret['is_super']
			];
			session('admin',$sessionData);
			return 1;
		}else{
			return '用户名或者密码错误';
		}
	}

	//注册管理员

	public function register($data){
		$validate=new \app\common\validate\Admin();
		if(!$validate->scene('register')->check($data)){
			return $validate->getError();
		}
		$result = $this->allowField(true)->save($data);

		if($result){
			
			$headers='From: 肥猪博客<webmaster@upupw.net>';
			mail($data['email'],"恭喜您：".$data['nickname'],'肥猪博客管理员注册成功',$headers);
			return 1;
		}else{
			return '注册失败';
		}


	}

	//重置密码

	public function resetPassword($data){
		$validate=new \app\common\validate\Admin();
		if(!$validate->scene('resetPassword')->check($data)){
			return $validate->getError();
		}
		if($data['code'] != session('code')){
			return '验证码不正确！';
		}
		$adminInfo=$this->where('email',$data['email'])->find();
		$password=mt_rand(100000,999999);
		$adminInfo->password=$password;
		$result=$adminInfo->save();
		if($result){
			$headers='From: 肥猪博客<webmaster@upupw.net>';
			mail($data['email'],"恭喜您，密码重置成功","您的帐户为：{$adminInfo->username}您的新密码为：{$password}",$headers);
			return 1;
		}else{
			return '重置密码失败';
		}
	}

	//添加管理员

	public function add($data){
		$validate=new \app\common\validate\Admin();
		if(!$validate->scene('add')->check($data)){
			return $validate->getError();
		}
		$result=$this->allowField(true)->save($data);
		if($result){
			return 1;
		}else{
			return '添加管理员失败';
		}
	}

	//管理员编辑

	public function edit($data){
		$validate=new \app\common\validate\Admin();
		if(!$validate->scene('edit')->check($data)){
			return $validate->getError();
		}
		$adminInfo=$this->find($data['id']);
		if($adminInfo->password != $data['password']){
			$adminInfo->password=md5($data['password']);
		}
		$adminInfo->nickname=$data['nickname'];
		$adminInfo->is_super=$data['is_super'];
		$adminInfo->status=$data['status'];
		$result=$adminInfo->save();
		if($result){
			return 1;
		}else{
			return '修改管理员信息失败';
		}
	}

	//管理员禁用启用

	public function adminSwitch($data){
		$adminInfo=$this->find($data['id']);
		$adminInfo->status=$data['status'];
		$result=$adminInfo->save();
		if($result){
			return 1;
		}else{
			return '操作失败~';
		}
	}

	//删除管理员

	public function del($id){
		$adminInfo=$this->find($id);
		$result=$adminInfo->delete();
		if($result){
			return 1;
		}else{
			return '删除失败';
		}
	}
}