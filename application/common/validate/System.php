<?php
namespace app\common\validate;

use think\Validate;

class System extends Validate{
    protected $rule=[
        'webname|网站名称'=>'require',
        'copyright|版权信息'=>'require',
        "username|名字"=>"require",
        "age|年龄"=>"require",
        "career|职业"=>"require",
        "interest|爱好"=>"require",
        "phone|电话"=>"require",
        "wechat|微信"=>"require",
        "qq|QQ"=>"require",
        "email|邮箱"=>"require",
        "url|域名地址"=>"require",
        "record|备案信息"=>"require"
    ];

    public function sceneSet(){
        return $this->only(['webname','copyright',"username","age","career","interest","phone","qq","email","url","wechat","record"]);
    }
}