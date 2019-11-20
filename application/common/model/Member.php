<?php
namespace app\common\model;

use think\Model;

use think\model\concern\SoftDelete;

class Member extends Model{
    //软删除
    use SoftDelete;
    protected $deleteTime='delete_time';

    //只读字段
    protected $readonly=['username','email'];

    //关联评论
    public function comments(){
        return $this->hasMany('Comment','member_id','id');
    }

    //关联微语评论
    public function whisperComs(){
        return $this->hasMany('WhisperCom','member_id','id');
    }

    //会员添加
    public function add($data){
        $validate=new \app\common\validate\Member();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }
        $result=$this->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return '会员添加失败';
        }
    }

    //会员编辑

    public function edit($data){
        $validate=new \app\common\validate\Member();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
        $memberInfo=$this->find($data['id']);
        if($memberInfo->password != $data['password']){//如果有修改密码再执行
            $memberInfo->password=md5($data['password']);
        }
        
        $memberInfo->email=$data['emali'];
        $memberInfo->nickname=$data['nickname'];
        $result->$memberInfo->save();
        if($result){
            return 1;
        }else{
            return '会员修改失败';
        }
    }

    //会员注册
    public function register($data){
        $validate=new \app\common\validate\Member();
        if(!$validate->scene('register')->check($data)){
            return $validate->getError();
        }
        $result=$this->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return '注册失败了呢~要不再试一次吧~爱你哟';
        }
    }

    //会员登陆
    public function login($data){
        $validate=new \app\common\validate\Member();
        if(!$validate->scene('login')->check($data)){
            return $validate->getError();
        }
        $result=$this->where($data)->find();
        if($result){
            $sessionData=[
                'id'=>$result['id'],
                'nickname'=>$result['nickname']
            ];
            session('index',$sessionData);
            return 1;
        }else{
            return '帐号或密码错误~';
        }
    }
}