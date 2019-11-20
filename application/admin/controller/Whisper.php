<?php
namespace app\admin\controller;

class Whisper extends Base{

    //微语列表
    public function all(){
        $whisperInfo=model("Whisper")->order("create_time","desc")->paginate(10);
        $viewDate=[
            "whisperInfo"=>$whisperInfo
        ];
        $this->assign($viewDate);
        return view();
    }

    //删除微语
    public function del(){
        if(request()->isAjax()){
            $id=input("post.id");
            $whisperInfo=model("Whisper")->with("whisperComs")->find($id);
            $result=$whisperInfo->together("whisperComs")->delete();
            if($result){
                return $this->success("删除成功喽~");
            }else{
                return $this->error("删除失败了呢~");
            }
        }
    }

    //添加微语
    public function add(){
        if(request()->isAjax()){
            $data=[
                "image"=>input("post.image"),
                "content"=>input("post.content")
            ];
            $result=model("Whisper")->add($data);
            if($result == 1){
                return $this->success("发布成功啦~");
            }else{
                return $this->error($result);
            }
        }
        return view();
    }

    //配图上传
    public function upload(){
        if(request()->isAjax()){
            $file=request()->file('image');
            $info=$file->move('static/images/whisper');
            if($info){
                return $this->success("/static/images/whisper/".$info->getSaveName());
            }else{
                return $this->error($file->getError());
            }
        }
    }

    //编辑微语
    public function edit(){
        if(request()->isAjax()){
            $data=[
                "id"=>input("post.id"),
                "content"=>input("post.content"),
                "image"=>input("post.image")
            ];
            $result=model("Whisper")->edit($data);
            if($result == 1){
                return $this->success("修改成功啦~");
            }else{
                return $this->error($result);
            }
        }
        $id=input("id");
        $whisperInfo=model("Whisper")->get($id);
        $viewData=[
            "whisperInfo"=>$whisperInfo
        ];
        $this->assign($viewData);
        return view();
    }
}