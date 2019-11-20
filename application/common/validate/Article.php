<?php
namespace app\common\validate;

use think\Validate;

class Article extends Validate{
    protected $rule=[
        'title|文章标题'=>'require|unique:article',
        'tags|标签'=>'require',
        'cate_id|所属栏目'=>'require',
        'desc|文章概要'=>'require',
        'content|文章内容'=>'require',
        'is_top|推荐'=>'require',
        'author|作者'=>'require',
        'image|封面'=>'require'
    ];

    public function sceneAdd(){
        return $this->only(['title','author','tags','cate_id','desc','content','image']);
    }

    public function sceneTop(){
        return $this->only(['is_top']);
    }

    public function sceneEdit(){
        return $this->only(['title','tags','cate_id','desc','is_top','content']);
    }
}