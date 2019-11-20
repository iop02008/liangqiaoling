<?php
namespace app\admin\controller;

class Message extends Base{

    //留言板列表
    public function all(){
        $messages=model("Message")->order("create_time","desc")->paginate(10);
        $viewData=[
            "messages"=>$messages
        ];

        $this->assign($viewData);

        return view();
    }

    //删除留言

    public function del(){
        if(request()->isAjax()){
            $comments=model("Message")->get(input("id"));
            $result=$comments->delete();
            if($result){
                return $this->success("删除成功啦~");
            }else{
                return $this->error("删除失败啦~");
            }
        }
    }
}