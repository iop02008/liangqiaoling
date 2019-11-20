<?php
namespace app\common\validate;

use think\Validate;

class Message extends Validate{
    protected $rule=[
        'content|留言内容'=>'require|max:300'
    ];

    public function sceneSpeek(){
        return $this->only(['content']);
    }
}