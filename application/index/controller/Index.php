<?php
namespace app\index\controller;



class Index extends Base{
    
    //首页
    public function index(){
        $where=[];
        $catename=null;
        $nav=1;
        if(input('?id')){
            $where=[
                'cate_id'=>input('id')
            ];
            
            $catename=model('Cate')->where('id',input('id'))->value('catename');
        }
        $articles=model('Article')->where($where)->order('create_time','desc')->paginate(5);
        $viewData=[
            'articles'=>$articles,
            'catename'=>$catename,
            'cateId'=>$where['cate_id']??0,
            'nav'=>$nav
        ];
        $this->assign($viewData);
        return view();
    }

    //会员注册
    public function register(){
        if(session("index.id")){
            $this->redirect('index/index/index');
        }
        if(request()->isAjax()){
            $data=[
                'username'=>input('post.username'),
                'password'=>input('post.password'),
                'repassword'=>input('post.repassword'),
                'email'=>input('post.email'),
                'nickname'=>input('post.nickname')
            ];
            $result=model('Member')->register($data);
            if($result == 1){
                return $this->success('注册成功，爱你哟~','index/index/index');
            }else{
                return $this->error($result);
            }
        }
        return view();
    }

    //会员登陆
    public function login(){
        if(request()->isAjax()){
            $data=[
                'username'=>input('post.username'),
                'password'=>input('post.password')
            ];
            $result=model('Member')->login($data);
            if($result == 1){
                $this->success('欢迎回来哟~','index/index/index');
            }else{
                $this->error($result);
            }
        }
    }

    //退出登陆
    public function out(){
        if(request()->isAjax()){
            session(null);
            if(session('?index.id')){
                return $this->error('退出失败了呢~');
            }else{
                $this->success('退出成功，欢迎再回来做客哟~','index/index/index');
            }
        }
    }

    //搜索
    public function search(){
        
        $catename=input('keyword');
        $where[]=['title','like','%'.input('keyword').'%'];
        $articles=model('Article')->where($where)->order('create_time','desc')->paginate(5);
            $viewData=[
                'articles'=>$articles,
                'catename'=>$catename,
                'cateId'=>-1
            ];
        $this->assign($viewData);
        return view('index');
    }
}

