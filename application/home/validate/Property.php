<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络
// +----------------------------------------------------------------------
namespace app\home\validate;
use think\Validate;
/**
 *  文档模型 自动验证基础模型
 */
class Property extends Validate{
    /*
     * 模型验证规则和验证场景
     * @$fields 模型属性信息
     * ['rule'=>验证规则,scene=>验证场景,scene_fields=>验证字段(array)]
     */
        protected $rule = [
            ['name', 'require','用户名必须'],
            ['title', 'require', '报修单号必须'],
            ['address', 'require', '地址不为空'],
            ['content', 'require', '内容不为空'],
            ['tel', 'require', '电话不为空'],
        ];
}