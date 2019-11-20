<?php
namespace app\common\validate;

use think\Validate;

class Album extends Validate{
    protected $rule=[
        "path|图片"=>"require",
        "picdesc|一句话描述"=>"require",
        "map|地理信息"=>"require"
    ];

    public function sceneEdit(){
        return $this->only(["path","picdesc","map"]);
    }
}