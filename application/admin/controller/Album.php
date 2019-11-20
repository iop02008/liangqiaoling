<?php
namespace app\admin\controller;

class Album extends Base{

    //相册列表
    public function all(){
        $albums=model("Album")->order("create_time","desc")->paginate(10);
        $viewData=[
            "albums"=>$albums
        ];
        $this->assign($viewData);
        return view();
    }

    //相册删除

    public function del(){
        if(request()->isAjax()){
            $albums=model("Album")->get(input("id"));
            if($albums->delete()){
                return $this->success("删除相片成功~");
            }else{
                return $this->error("删除照片失败~");
            }
        
        }
    }

    //上传照片
    public function add(){

        return view();
    }

    //批量上传接口

    public function upload(){
        $files=request()->file("image");
        $data=array();
        foreach($files as $file){
            $info=$file->move("static/images/album");
            if($info){
                array_push($data,array("path"=>"/static/images/album/".$info->getSaveName(),
                "picdesc"=>"今天心情很好呢~",
                "map"=>"广东惠州"));
                

            }else{
                echo $file->getError();
            }
        }
        if($result=model("Album")->add($data)){
            return $this->success("上传成功~","admin/album/add");
            dump($data);
        }else{
            return $this->error("上传失败~");
        }
    }

    //单张上传接口
    public function uploadone(){
        if(request()->isAjax()){
            $file=request()->file('image');
            $info=$file->move('static/images/album');
            if($info){
                return $this->success("/static/images/album/".$info->getSaveName());
            }else{
                return $this->error($file->getError());
            }
        }
    }

    //相片编辑
    public function edit(){
        if(request()->isAjax()){
            $data=[
                "id"=>input("post.id"),
                "path"=>input("post.path"),
                "picdesc"=>input("post.picdesc"),
                "map"=>input("post.map")
            ];
            $result=model("Album")->edit($data);
            if($result == 1){
                return $this->success("修改成功啦~");

            }else{
                return $this->error($result);
            }
        }
        $alubmInfo=model("Album")->get(input("id"));
        $viewData=[
            "albumInfo"=>$alubmInfo
        ];
        $this->assign($viewData);
        return view();
    }

}