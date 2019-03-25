<?php

namespace app\home\controller;

use app\home\model\Document;
use think\Db;
use think\Request;

class Rent extends Home
{

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $map['category_id'] = array('eq',48);
        $time = time();
        $cz=Document::where($map)->where('type','=','1')->where('status','=',1)->order('create_time','desc')->select();
        $sm=Document::where($map)->where('type','=','3')->where('status','=',1)->order('create_time','desc')->select();
        $this->assign('cz',$cz);
        $this->assign('sm',$sm);
        return $this->fetch();
    }

    public function list($id){
        $list=Db::name('document')->find($id);
        Document::where("id=$id")->setInc('view');
        $test = Db::name('document_article')->find($id);
        $testr = Db::name('member')->find($list['uid']);
        $this->assign('content',$test['content']);
        $this->assign('time',$list['create_time']);
        $this->assign('title',$list['title']);
        $this->assign('description',$list['description']);
        $this->assign('member',$testr['nickname']);
        $this->assign('notice',$list);
        return $this->fetch();
    }
}
