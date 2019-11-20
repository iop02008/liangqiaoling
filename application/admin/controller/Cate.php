<?php
namespace app\admin\controller;



class Cate extends Base{
    //栏目列表
    public function list(){
        $cates=model('Cate')->order('sort','asc')->paginate(10);
        //定义一个模板数据变量
        $viewData=[
            'cates'=>$cates,
        ];
        $this->assign($viewData);
        return view();
    }

    //栏目添加
    public function add(){
        if(request()->isAjax()){
            $data=[
                'catename'=>input('post.cate_name'),
                'sort'=>input('post.cate_sort')
            ];

            $result=model('Cate')->add($data);
            if($result == 1){
                $this->success('添加成功','admin/cate/list');
            }else{
                $this->error($result);
            }
        }
        return view();
    }

    //栏目排序
    public function sort(){
        $data=[
            'id'=>input('post.id'),
            'sort'=>input('post.sort')
        ];

        $result = model('Cate')->sort($data);
        if($result == 1){
            $this->success('修改排序成功','admin/cate/list');
        }else{
            $this->error($result);
        }
    }

    //栏目编辑
    public function edit(){
        $cateInfo=model('Cate')->find(input('id'));

        //模板 变量

        $viewData=[
            'cateInfo'=>$cateInfo
        ];
        if(request()->isAjax()){
            $data=[
                'id'=>input('post.id'),
                'catename'=>input('post.catename'),
                'sort'=>input('post.sort')
            ];
            $result=model('Cate')->edit($data);
            if($result == 1){
                $this->success('栏目修改成功','admin/cate/list');
            }else{
                $this->error($result);
            }
        }
        $this->assign($viewData);
        return view();
    }

    //栏目删除
    public function del(){
        if(request()->isAjax()){
            $data=[
                'id'=>input('post.id')
            ];
            $result=model('Cate')->del($data);
            if($result == 1){
                $this->success('栏目删除成功','admin/cate/list');
            }else{
                $this->error($result);
            }
        }
    }
}