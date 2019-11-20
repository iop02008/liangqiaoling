<?php
namespace app\admin\controller;

use think\Controller;

class Home extends Base{
    //后台首页
    public function index(){
        return view();
    }

    //欢迎页
    public function welcome(){
        $articles=model('Article')->count();
        $users=model('Member')->count();
        $admins=model('Admin')->count();
        $comments=model('Comment')->count();
        $cates=model('Cate')->count();
        $whispers=model("Whisper")->count();
        $viewData=[
            'articles'=>$articles,
            'users'=>$users,
            'admins'=>$admins,
            'comments'=>$comments,
            'cates'=>$cates,
            "whispers"=>$whispers
        ];
        $this->assign($viewData);
        return view();
    }

    //退出登录

	public function outLogin(){
		session(null);
		$this->success('退出成功','admin/index/login');
	}
}