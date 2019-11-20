<?php
namespace app\index\controller;

class Whisper extends Base{
    //微语页面
    public function whisper(){
        
        $whisperInfo=model('Whisper')->order('create_time','desc')->paginate(5);
        $commens=model('WhisperCom')->with('member')->select();
        
        $nav=2;
        $viewData=[
            'whisperInfo'=>$whisperInfo,
            'commens'=>$commens,
            'nav'=>$nav
        ];
        $this->assign($viewData);
        return view();
    }

    //提交评论

    public function speek(){
        if(request()->isAjax()){
            $data=[
                'member_id'=>input('post.member_id'),
                'whisper_id'=>input('post.whisper_id'),
                'content'=>input('post.content')
            ];
            $result=model('WhisperCom')->speek($data);
            if($result == 1){
                return $this->success('作妖成功啦~爱你哟~');
            }else{
                return $this->error($result);
            }
        }
    }
}