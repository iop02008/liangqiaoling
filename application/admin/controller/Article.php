<?php
namespace app\admin\controller;

use think\File;
class Article extends Base{
    //文章列表
    public function list(){
        $articles=model('Article')->with('cate')->order(['is_top'=>'desc','create_time'=>'desc'])->paginate(10);
        $viewData=[
            'articles'=>$articles
        ];
        $this->assign($viewData);
        return view();
    }

    //文章添加

    public function add(){
        if(request()->isAjax()){
            
            
            $data=[
                'title'=>input('post.title'),
                'author'=>input('post.author'),
                'tags'=>input('post.tags'),
                'is_top'=>input('post.is_top') ?? 0,
                'cate_id'=>input('post.cateid'),
                'desc'=>input('post.desc'),
                'content'=>input('post.content'),
                'image'=>input('post.pic')
            ];
            $result=model('Article')->add($data);

            if($result == 1){
                $this->success('文章添加成功','admin/article/list');
            }else{
                $this->error($result);
            }
            
        }
        $cates=model('Cate')->select();
        $viewData=[
            'cates'=>$cates
        ];
        $this->assign($viewData);
        return view();
    }

    //推荐操作

    public function top(){
        $data=[
            'id'=>input('post.id'),
            'is_top'=>input('post.is_top')?0:1
        ];
        $result=model('Article')->top($data);
        if($result == 1){
            return $this->success('操作成功','admin/article/list');
        }else{
            return $this->error($result);
        }

    }

    //编辑操作

    public function edit(){
        if(request()->isAjax()){
            $data=[
                'id'=>input('post.uid'),
                'title'=>input('post.title'),
                'tags'=>input('post.tags'),
                'is_top'=>input('post.is_top'),
                'cate_id'=>input('post.cateid'),
                'desc'=>input('post.desc'),
                'content'=>input('post.content')
            ];
            $result=model('Article')->edit($data);
            if($result == 1){
                $this->success('修改成功','admin/article/list');
            }else{
                $this->error($result);
            }
        }
        $articles=model('Article')->find(input('id'));
        $cates=model('Cate')->select();
        $viewData=[
            'articles'=>$articles,
            'cates'=>$cates
        ];
        $this->assign($viewData);
        return view();
    }

    //删除操作
    public function del(){
        if(request()->isAjax()){
            $id=input('id');
            $articleInfo=model('Article')->with('comments')->find($id);
            $result=$articleInfo->together('comments')->delete();
            if($result){
                $this->success('删除成功','admin/article/list');
            }else{
                $this->error('删除失败');
            }
        }
    }

    //封面上传
    public function upload(){
        if(request()->isAjax()){
            $file=request()->file('image');
            $info=$file->move('static/images');
            if($info){
                return $this->success($info->getSaveName());
            }else{
                return $this->error($file->getError());
            }
        }
    }
}