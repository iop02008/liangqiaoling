<?php
namespace app\index\controller;

class Message extends Base{
    public function Message(){
        $messageInfo=model('Message')->with('member')->order('create_time','desc')->paginate(5);
        $nav=3;
        $viewData=[
            'messageInfo'=>$messageInfo,
            'nav'=>$nav
        ];
        $this->assign($viewData);
        return view();
    }

    public function speek(){
        if(request()->isAjax()){
            $data=[
                'member_id'=>input('post.member_id'),
                'content'=>input('post.content')
            ];
            $result=model('Message')->speek($data);
            if($result == 1){
                $this->success('留言成功囖~我会尽快查看的~');

            }else{
                $this->error($result);
            }
        }
    }
}