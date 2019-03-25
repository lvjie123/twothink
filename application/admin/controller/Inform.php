<?php

namespace app\admin\controller;

use think\Request;

class Inform extends Admin
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
            $list=\think\Db::name("Inform")->where($map)->field(true)->paginate(5,false,['query'=>['title'=>$title]]);
//            $list = $this->lists('Property',$map);
        }else{
            $list = \app\admin\model\Inform::paginate(5);
//            $map['id'] = array('egt',0);
//            $list = $this->lists('Property',$map);
        }
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
                $this->success('新增成功', Cookie('__forward__'));
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
            return $this->fetch('add');
        }
    }

    public function edit($id = 0){
        if(request()->isPost()){
            $Property = model('Property');
            $post_data=request()->post();
            $validate = validate('Property');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Property->update($post_data);
            if($data){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_property', 'Property', $data->id, UID);
                $this->success('更新成功', Cookie('__forward__'));
            } else {
                $this->error($Property->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('Property')->field(true)->find($id);
//            $menus = \think\Db::name('Menu')->field(true)->select();
//            $menus = model('Common/Tree')->toFormatTree($menus);
//
//            $menus = array_merge(array(0=>array('id'=>0,'title_show'=>'顶级菜单')), $menus);
//            $this->assign('Menus', $menus);
//            if(false === $info){
//                $this->error('获取后台菜单信息错误');
//            }
            $this->assign('info', $info);
//            $this->assign('meta_title', '编辑后台菜单');
            return $this->fetch();
        }
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function del()
    {
        $id = array_unique((array)input('id/a',0));
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );

        if(\think\Db::name('Property')->where($map)->delete()){
            session('admin_menu_list',null);
            //记录行为
            action_log('update_property', 'Property', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}
