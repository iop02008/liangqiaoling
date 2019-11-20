<?php
namespace app\admin\controller;

class Comment extends Base{

    //评论列表
    public function all(){
        $comments=model('Comment')->with('article,member')->order(['create_time'=>'desc'])->paginate(10);
        $viewData=[
            'comments'=>$comments
        ];
        $this->assign($viewData);
        return view();
    }

    //删除评论
    public function del(){
        $id=input('post.id');
        $commentInfo=model('Comment')->find($id);
        $result=$commentInfo->delete();
        if($result){
            return $this->success('评论删除成功','admin/comment/all');

        }else{
            return $this->error('评论删除失败');
        }
    }
}