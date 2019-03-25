<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络 <http://www.twothink.cn>
// +----------------------------------------------------------------------

namespace app\user\controller;
use app\common\controller\UcApi;
use app\common\logic\DocumentArticle;
use app\user\model\Member;

/**
 * 用户控制器
 */
class User extends Base {
    /**
     * 修改密码提交
     * @author 艺品网络  <twothink.cn>
     */
    public function profile(){
		if ( !is_login() ) {
			$this->error( '您还没有登陆',url('User/login') );
		}
        if ($this->request->isPost()) {
            //获取参数
            $uid        =   is_login();
            $data = input('param.'); 
            $password   =  $data['old'];;
            $repassword = $data['repassword'];
            $data['password'] = $data['password'];
            empty($password) && $this->error('请输入原密码');
            empty($data['password']) && $this->error('请输入新密码');
            empty($repassword) && $this->error('请输入确认密码');

            if($data['password'] !== $repassword){
                $this->error('您输入的新密码与确认密码不一致');
            }

            $Api = new UcApi();
            $res = $Api->updateInfo($uid, $password, $data);
            if($res['status']){
                $this->success('修改密码成功！');
            }else{
                $this->error($res['info']);
            }
        }else{
            return $this->fetch();
        }
    }


    public function my(){
        if(is_login()){
            $user = Member::find(is_login())->toArray();
            $this->assign('name',$user['nickname']);
            return $this->fetch();
        }else{
           return view('user/login');
        }
    }

    public function forme(){
        $list = DocumentArticle::find(143)->toArray();
        $this->assign('content',$list['content']);
        return $this->fetch();
    }
}
