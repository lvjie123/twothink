<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:107:"D:\phpstudy\PHPTutorial\WWW\0920PHP\twothink\public/../application/home/view/default/notice\noticeshow.html";i:1552910490;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

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
                <p class="navbar-text"><a href="<?php echo url('Home/index'); ?>" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->
    <div class="container-fluid">
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong><?php echo $date['title']; ?></strong></h3>
        <div class="noticeDetailInfo">发布者:<?php echo $date['nickname']; ?></div>
        <div class="noticeDetailInfo">发布时间：<?php echo $date['create_time']; ?></div>
        <div class="noticeDetailContent">
            <?php echo $date['content']; ?>
        </div>
        <div>
            <?php
                if(!$num){
                    if($date['category_id'] == 48 && is_login()){
            ?>
            <a class="btn btn-info" href="<?php echo url('Notice/eve?aid='.$date['category_id']); ?>">报名</a>
            <?php
                }}else{
            ?>
            <a class="btn btn-default" href="" disabled="disabled">已报名</a>
            <?php
                }
            ?>
        </div>

    </div>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/qiantai/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/qiantai/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>