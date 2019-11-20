<?php
namespace app\index\controller;

class Article extends Base{
    //文章详情

    public function info(){
        $articleInfo=model('Article')->with('comments,comments.member')->find(input('id'));
        $count=$articleInfo['comments']->count();
        $nav=1;
        $viewData=[
            'count'=>$count,
            'articleInfo'=>$articleInfo,
            'nav'=>$nav
            
        ];
        $this->assign($viewData);
        return view();
    }

    //文章评论

    public function comm(){
        if(request()->isAjax()){
            $data=[
                'article_id'=>input('post.article_id'),
                'member_id'=>input('post.member_id'),
                'content'=>input('post.content')
            ];
            $result=model('Comment')->comm($data);
            if($result == 1){
                $this->success('发表成功啦~~~爱你~');
            }else{
                $this->error($result);
            }
        }
    }
}