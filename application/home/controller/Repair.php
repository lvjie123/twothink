<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 10:40
 */

namespace app\home\controller;



class Repair extends Home
{
    public function index(){
        $name = input('nickname');
        if(is_numeric($name)){
            $map['id|name']=   array('like','%'.$name.'%');
        }else{
            $map['name']    =   array('like', '%'.(string)$name.'%');
        }
        $this->assign('meta_title','报修信息');
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $Repair = model('Repair');
            $post_data=request()->post();
            $validate = validate('Repair');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Repair->create($post_data);
            if($data){
                session('admin_menu_list',null);
                //记录行为
                action_log('update_menu', 'Menu', $data->id, UID);
                $this->success('新增成功', 'home/index');
            } else {
                $this->error($Repair->getError());
            }
        } else {
            $this->assign('meta_title','新增报修');
            return $this->fetch('edit');
        }
    }

    public function del(){
        $id = array_unique((array)input('id/a',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );
        if(\think\Db::name('Repair')->where($map)->delete()){
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    public function edit($id = 0){
        if(request()->isPost()){
            $Repair = model('Repair');
            $post_data=request()->post();
            $validate = validate('Repair');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Repair->update($post_data);
            if($data){
                session('admin_repair_list',null);
                //记录行为
                action_log('update_repair', 'Repair', $data->id, UID);
                $this->success('更新报修信息成功', 'repair/index');
            } else {
                $this->error($Repair->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = \think\Db::name('Repair')->field(true)->find($id);
            if(false === $info){
                $this->error('获取报修信息错误');
            }
//            var_dump($info);exit;
            $this->assign('info', $info);
            $this->assign('meta_title', '编辑报修信息');
            return $this->fetch();
        }
    }



}