<?php
namespace app\index\controller;

class About extends Base{

    //关于我首页
    public function index(){
        $nav=5;
        $aboutInfo=model("System")->find();
        $viewData=[
            'nav'=>$nav,
            'aboutInfo'=>$aboutInfo
        ];
        $this->assign($viewData);

        return view();
    }
}