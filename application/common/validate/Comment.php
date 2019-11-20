<?php
namespace app\common\validate;

use think\Validate;

class Comment extends Validate{
    protected $rule=[
        'content|评论内容'=>'require',
        
    ];

    //评论场景

    public function sceneComm(){
        return $this->only(['content']);
    }
}