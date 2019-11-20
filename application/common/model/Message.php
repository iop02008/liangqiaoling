<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Message extends Model{
    use SoftDelete;//软删除
    //关联用户表

    public function member(){
        return $this->belongsTo('Member','member_id','id');
    }

    //发表留言

    public function speek($data){
        $validate=new \app\common\validate\Message();
        if(!$validate->scene('speek')->check($data)){
            return $validate->getError();
        }
        $result=$this->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return '留言失败囖，可能是长相问题呢，再试试吧~';
        }
    }
}