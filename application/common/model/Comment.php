<?php
namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Comment extends Model{
    use SoftDelete;//软删除

    //关联文章
    public function article(){
        return $this->belongsTo('Article','article_id','id');

    }

    //关联用户
    public function member(){
        return $this->belongsTo('Member','member_id','id');
    }

    //评论
    public function comm($data){
        $validate=new \app\common\validate\Comment();
        if(!$validate->scene('comm')->check($data)){
            return $validate->getError();
        }
        $result=$this->allowField(true)->save($data);
        if($result){
            return 1;
        }else{
            return '评论失败了呢~可能是服务器开小差了，再试试吧~';
        }
    }
}