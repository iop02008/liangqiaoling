<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class System extends Model{
    use SoftDelete;//软删除
    
    //系统设置
    public function set($data){
        $validate=new \app\common\validate\System();
        if(!$validate->scene('set')->check($data)){
            return $validate->getError();
        }
        $webInfo=$this->get($data["id"]);
        
        $webInfo->webname=$data['webname'];
        $webInfo->copyright=$data['copyright'];
        $webInfo->username=$data["username"];
        $webInfo->age=$data["age"];
        $webInfo->career=$data["career"];
        $webInfo->interest=$data["interest"];
        $webInfo->wechat=$data["wechat"];
        $webInfo->phone=$data["phone"];
        $webInfo->qq=$data["qq"];
        $webInfo->url=$data["url"];
        $webInfo->email=$data["email"];
        $webInfo->record=$data["record"];
        
        $result=$webInfo->save();
        if($result){
            return 1;
        }else{
            return '系统设置修改失败';
        }
    }
}