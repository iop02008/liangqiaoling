<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Whisper extends Model{

    use SoftDelete;

    //关联微语评论表
    public function whisperComs(){
        return $this->hasMany('WhisperCom','whisper_id','id');
    }

    //添加微语

    public function add($data){
        $validate=new \app\common\validate\Whisper();
        if(!$validate->scene("add")->check($data)){
            return $validate->getError();
        }
        $data["image"]="/static/images/whisper/".$data["image"];
        $result=$this->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return "发布失败了呢~";
        }
    }

    //编辑微语

    public function edit($data){
        $validate=new \app\common\validate\Whisper();
        if(!$validate->scene("edit")->check($data)){
            return $validate->getError();
        }
        $whisperInfo=$this->find($data["id"]);
        $whisperInfo->content=$data["content"];
        $whisperInfo->image=$data["image"];
        $result=$whisperInfo->save();
        if($result){
            return 1;
        }else{
            return "修改失败啦~";
        }
    }
    
}