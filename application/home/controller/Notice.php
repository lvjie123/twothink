<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/16
 * Time: 14:16
 */

namespace app\home\controller;


use app\home\model\Document;
use app\home\model\Document_article;
use app\home\model\Event;
use app\home\model\Member;
use think\Db;

class Notice extends Home
{
//    public function index($a,$info,$on_page)
//    {
//        if($a==1){
//            $id = 45;
//        }else if($a==2){
//            $id = 46;
//        }else if($a==3){
//            $id = 47;
//        }else if($a==4){
//            $id = 48;
//        }
//        $ask = \app\home\model\Document::where(array('category_id' => $id))->order('create_time','desc')->paginate($on_page);
//        $this->assign('_list', $ask);
//        return $this->fetch();
//    }
    public function index($a,$on_page)
    {
        $map['category_id'] = array('eq',"$a");
        $list=Document::where($map)->where('status','=',1)->order('create_time','desc')->paginate($on_page);
        $count=Document::where($map)->where('status','=',1)->order('create_time','desc')->count();
        $this->assign('_list', $list);
        $this->assign('on_page', $on_page);
        $this->assign('count', $count);
        $this->assign('info', $a);
        if($on_page<$count){
            $this->assign('a',true);
        }
        return $this->fetch();
    }

    public function noticeshow($id)
    {
        $asd = Document::find($id);
        $a = $asd->title;
        $b = Member::find($asd->uid)->nickname;
        $c = $asd->create_time;
        $d = Document_article::find($asd->id)->content;
        $e = $asd->view+1;
        $f = $asd->category_id;
        Db::execute("update Document set `view`='$e' where id = '$id'");
        $date['title'] = $a;
        $date['nickname'] = $b;
        $date['create_time'] = $c;
        $date['content'] = $d;
        $date['category_id'] = $f;
        $uid = is_login();
        $aid= Document::find($id)->category_id;
        $num = Event::where('aid','=',$aid)->where('uid','=',$uid)->count();
        $this->assign('num',$num);
        $this->assign('date', $date);
        return $this->fetch();
    }

    public function getPage($a,$on_page){
        $map['category_id'] = array('eq',"$a");
        $list=Document::where($map)->where('status','=',1)->order('create_time','desc')->paginate($on_page)->toArray();
        $count=Document::where($map)->where('status','=',1)->order('create_time','desc')->count();
        foreach ($list['data'] as $vv){
            $list['data']['on_page']=$on_page;
            $list['data']['count']=$count;
            $list['data']['info']=$a;
        }
        return json_encode($list['data']);
    }

    public function eve($aid = 0)
    {
        $uid=is_login();
        $sql = "insert into event (uid,aid) values ($uid,$aid)";
        Db::name('event')->query($sql);
        return $this->success('报名成功',('Notice/noticeshow?id=140'));
    }


}