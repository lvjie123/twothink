<?php

namespace app\home\controller;

use app\home\model\Document;
use think\Db;
use think\Request;

class Inform extends Home
{

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($info,$on_page)
    {
        if($info!=-1){
            $map['category_id'] = array('eq',"$info");
            $list=Document::where($map)->where('status','=',1)->order('create_time','desc')->paginate($on_page);
            $count=Document::where($map)->where('status','=',1)->order('create_time','desc')->count();
        }else{
            $data = [43,44,45];
            $list=Document::whereIn('category_id',$data)->where('status','=',1)->order('create_time','desc')->paginate($on_page);
            $count=Document::whereIn('category_id',$data)->where('status','=',1)->order('create_time','desc')->count();
        }
        $this->assign('_list', $list);
        $this->assign('on_page', $on_page);
        $this->assign('count', $count);
        $this->assign('info', $info);
        if($on_page<$count){
            $this->assign('a',true);
        }
        return $this->fetch();
    }
    public function getPage($info,$on_page){
        if($info!=-1){
            $map['category_id'] = array('eq',"$info");
            $list=Document::where($map)->where('status','=',1)->order('create_time','desc')->paginate($on_page)->toArray();
            $count=Document::where($map)->where('status','=',1)->order('create_time','desc')->count();
        }else{
            $data = [43,44,45];
            $list=Document::whereIn('category_id',$data)->where('status','=',1)->order('create_time','desc')->paginate($on_page)->toArray();
            $count=Document::whereIn('category_id',$data)->where('status','=',1)->order('create_time','desc')->count();
        }
        foreach ($list['data'] as $vv){
            $list['data']['on_page']=$on_page;
            $list['data']['count']=$count;
            $list['data']['info']=$info;
        }
        return json_encode($list['data']);
    }

    public function list($id){
        $wh['uid'] = is_login();
        $wh['aid'] = $id;
        $num = Db::name('event')->where($wh)->count();
        $this->assign('num',$num);
        $list=Db::name('document')->find($id);
        Document::where("id=$id")->setInc('view');
        $test = Db::name('document_article')->find($id);
        $testr = Db::name('member')->find($list['uid']);
        $this->assign('content',$test['content']);
        $this->assign('time',$list['create_time']);
        $this->assign('title',$list['title']);
        $this->assign('member',$testr['nickname']);
        $this->assign('notice',$list);
        return $this->fetch();
    }

    public function eve($aid = 0)
    {
        $uid=is_login();
        $sql = "insert into twothink_event (uid,aid) values ('$uid','$aid')";
        Db::name('event')->query($sql);
        return $this->success('报名成功',('Inform/list?id='.$aid));
    }

}
