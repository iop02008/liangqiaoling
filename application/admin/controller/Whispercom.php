<?php
namespace app\admin\controller;

class WhisperCom extends Base{

    //微语评论列表
    public function all(){
        $comments=model("WhisperCom")->order("create_time","desc")->paginate(10);
        $viewData=[
            "comments"=>$comments
        ];
        $this->assign($viewData);
        return view();
    }

    //微语评论删除
    public function del(){
        if(request()->isAjax()){
            $comments=model("WhisperCom")->get(input("id"));
            $result=$comments->delete();
            if($result){
                return $this->success("删除成功~");
            }else{
                return $this->error("删除失败啦~");
            }
        }
    }
}