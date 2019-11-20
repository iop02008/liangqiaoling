<?php
namespace app\common\validate;

use think\Validate;

class WhisperCom extends Validate{

    protected $rule=[
        'content|作妖内容'=>'require'
    ];

    public function sceneSpeek(){
        return $this->only(['content']);
    }
}