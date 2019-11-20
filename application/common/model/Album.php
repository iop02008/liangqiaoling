<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Album extends Model{

    use SoftDelete;//软删除

    //照片上传

    public function add($data){
        return $this->allowField(true)->saveAll($data);
    }

    //照片编辑

    public function edit($data){
        $validate=new \app\common\validate\Album();
        if(!$validate->scene("edit")->check($data)){
            return $validate->getError();
        }
        $albumInfo=$this->get($data["id"]);
        $albumInfo->path=$data["path"];
        $albumInfo->picdesc=$data["picdesc"];
        $albumInfo->map=$data["map"];
        
        if($albumInfo->save()){
            return 1;
        }else{
            return "修改失败了呢~";
        }
    }
    
}