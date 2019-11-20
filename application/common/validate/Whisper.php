<?php
namespace app\common\validate;

use think\Validate;

class Whisper extends Validate{

    protected $rule=[
        "image|图片"=>"require",
        "content|内容"=>"require"
    ];

    public function sceneAdd(){
        return $this->only(["image","content"]);
    }

    public function sceneEdit(){
        return $this->only(["content","image"]);
    }
}