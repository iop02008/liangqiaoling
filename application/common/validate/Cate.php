<?php
namespace app\common\validate;

use think\Validate;

class Cate extends Validate{

    protected $rule=[
        'catename|栏目名称'=>'require|unique:cate',
        'sort|排序'=>'require|number'
    ];

    protected $message = [
        'catename.require'=>'栏目名称不能为空',
        'catename.unique'=>'栏目名称重复',
        'sort.require'=>'排序不能为空',
        'sort.number'=>'排序必须为数字'
    ];

    public function sceneAdd(){
        return $this->only(['catename','sort']);
    }

    public function sceneSort(){
        return $this->only(['sort']);
    }

    public function sceneEdit(){
        return $this->only(['catename','sort']);
    }
}