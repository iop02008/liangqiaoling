<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;
class WhisperCom extends Model{
   use SoftDelete;//软删除
    //关联微语
    public function whisper(){
       return  $this->belongsTo('Whisper','whisper_id','id');
    }

    //关联用户
    public function member(){
       return  $this->belongsTo('Member','member_id','id');
    }

    //发表评论
    public function speek($data){
       $validate=new \app\common\validate\WhisperCom();
       if(!$validate->scene('speek')->check($data)){
          return $validate->getError();
       }
       $result=$this->allowField(true)->save($data);
       if($result){
          return 1;
       }else{
          return '作妖失败啦~~可能是服务器开小差了呢~~';
       }
    }
}