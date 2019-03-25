<?php
 
namespace app\home\validate;
use think\Validate; 

class Repair extends Validate{
    // 验证规则
    protected $rule = [
        ['title', 'require', '标题必须填写'],
        ['name', 'require', '用户名必须填写'],
        ['phone', 'require', '电话必须填写'],
        ['address', 'require', '地址必须填写'],
        ['content', 'require', '说明必须填写'],

    ];  

}