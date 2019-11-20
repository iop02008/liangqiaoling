<?php
namespace app\index\controller;



class Album extends Base{
    // 相册主页
    public function index(){
        $nav=4;
        $albumInfo=model("Album")->order("create_time","desc")->paginate(16);
        $viewData=[
            "nav"=>$nav,
            "albumInfo"=>$albumInfo
        ];
        $this->assign($viewData);
        return view();
    }
}