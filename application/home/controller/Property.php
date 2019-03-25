<?php

namespace app\home\controller;

use think\Request;

class Property extends Home
{

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $title=  trim(input('title'));
        if($title){
            $map['title'] = array('like',"%{$title}%");
            $list=\think\Db::name("Property")->where($map)->field(true)->paginate(5,false,['query'=>['title'=>$title]]);
//            $list = $this->lists('Property',$map);
        }else{
            $list = \app\admin\model\Property::paginate(5);
//            $map['id'] = array('egt',0);
//            $list = $this->lists('Property',$map);

        }
//       var_dump($map);
        $this->assign('_list', $list);

        Cookie('__forward__',$_SERVER['REQUEST_URI']);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $Property = model('Property');
            $post_data=request()->post();
            $validate = validate('Property');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Property->create($post_data);
            if($data){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_property', 'Property', $data->id, UID);
                $this->success('新增成功', 'home/index');
            } else {
                $this->error($Property->getError());
            }
        } else {
            $this->assign('info',array('pid'=>input('pid')));
            $menus = \think\Db::name('Property')->field(true)->select();
            $menus = model('Common/Tree')->toFormatTree($menus);
            $menus = array_merge(array(0=>array('id'=>0,'title_show'=>'顶级菜单')), $menus);
            $this->assign('Menus', $menus);
            $this->assign('meta_title','新增菜单');
            return $this->fetch('edit');
        }
    }
}
