<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"E:\PhpStudy\PHPTutorial\WWW\twothink\public/../application/home/view/default/inform\list.html";i:1552981381;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>小区通知</title>

    <!-- Bootstrap -->
    <link href="/homecss/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/homecss/css/style.css" rel="stylesheet">

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
                <p class="navbar-text"><a href="/home/index/index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/service.html" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="faxian.html" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/user/login/index.html" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong><?php echo $title; ?></strong></h3>
        <div class="noticeDetailInfo">发布者:<?php echo $member; ?></div>
        <div class="noticeDetailInfo">发布时间：<?php echo time_format($time); ?></div>
        <div class="noticeDetailContent">
            <?php echo $content; ?>
        </div>
    </div>
    <div>
        <?php
            $time = time();
            if($notice['deadline']==0||$notice['deadline']>=$time&&$notice['category_id'] == 46){
                if(!$num){
                    if($notice['category_id'] == 46 && is_login()){
            ?>
        <a class="btn btn-info" href="<?php echo url('Inform/eve?aid='.$notice['id']); ?>">报名</a>
        <?php
                }}else{
            ?>
        <a class="btn btn-default" href="" disabled="disabled">已报名</a>
        <?php
                }}elseif($notice['category_id'] == 46){
                ?>
        <a class="btn btn-danger" href="" disabled="disabled">活动已结束</a>
        <?php
                }
            ?>
    </div>
</div>
</body>
</html>