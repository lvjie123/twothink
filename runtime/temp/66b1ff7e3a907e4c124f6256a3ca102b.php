<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"D:\phpstudy\PHPTutorial\WWW\0920PHP\twothink\public/../application/home/view/default/index\user.html";i:1552976926;}*/ ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>物业管理系统</title>

    <!-- Bootstrap -->
    <link href="/qiantai/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/qiantai/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/service.html" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/find.html" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/user.html" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">

        <div class="blank"></div>
        <div class="row">
            <div class="col-xs-3">
                <img src="/qiantai/image/5.png" width="60" height="60" />
            </div>
            <div class="col-xs-9">
                admin<br/>

                ID:<span class="text-danger">1</span>
            </div>
        </div>
        <div class="blank"></div>
        <div class="row text-center myLabel nav nav-tabs">
            <div class="col-xs-4 label-danger"><a href="#home" data-toggle="tab"><span class="iconfont">&#xe60b;</span>我的资料</a></div>
            <div class="col-xs-4 label-success"><a href="#ticket" data-toggle="tab"><span class="iconfont">&#xe609;</span>我的报修</a></div>
            <div class="col-xs-4 label-primary"><a href="#activity" data-toggle="tab"><span class="iconfont">&#xe606;</span>报名的活动</a></div>
        </div>

        <div class="blank"></div>
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <ul class="list-group fuwuList">
                    <li class="list-group-item"><a href="#" class="text-danger"><span class="iconfont">&#xe60a;</span>我的缴费账单</a> </li>
                    <li class="list-group-item"><a href="#" class="text-info"><span class="iconfont">&#xe608;</span>我的物业通知</a></li>
                    <li class="list-group-item"><a href="#" class="text-info"><span class="iconfont">&#xe607;</span>我的水电气使用</a></li>
                </ul>
            </div>
            <div class="tab-pane"  role="tabpanel" id="ticket">
                <ul class="list-group fuwuList">
                    <li class="list-group-item"><a href="#" class="text-danger">灯泡坏了</a> </li>
                    <li class="list-group-item"><a href="#" class="text-info">马桶坏了</a></li>
                    <li class="list-group-item"><a href="#" class="text-info">电梯坏了</a></li>
                </ul>


            </div>
            <div class="tab-pane" id="activity">
                <ul class="list-group fuwuList">
                    <li class="list-group-item"><a href="#" class="text-danger">老年跳舞大赛</a> </li>
                    <li class="list-group-item"><a href="#" class="text-info">小区相亲活动</a></li>
                    <li class="list-group-item"><a href="#" class="text-info">残疾人马拉松</a></li>
                </ul>


            </div>
        </div>



    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/qiantai/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/qiantai/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "/static", //项目公共目录地址
            "DEEP"   : "", //PATHINFO分割符
            "MODEL"  : ["", "", "html"],
            "VAR"    : ["", "", ""]
        }
    })();
</script>
<!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->

</div>
</body>
</html>