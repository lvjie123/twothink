<?php
/**
 * Created by PhpStorm.
 * User: hhzszz
 * Date: 2019/3/15
 * Time: 10:44
 */

namespace app\admin\controller;


class Test extends Admin
{
    public function index(){
        $this->assign('meta_title','管理首页') ;
        return $this->fetch();
    }
}