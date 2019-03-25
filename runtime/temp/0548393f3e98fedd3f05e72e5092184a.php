<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:102:"D:\phpstudy\PHPTutorial\WWW\0920PHP\twothink\public/../application/home/view/default/notice\index.html";i:1552966778;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>小区通知</title>

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
                <p class="navbar-text"><a href="/home/index/index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/index/123.html" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="faxian.html" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/home/user/user.html" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->
    <div class="container-fluid">
        <div id="test">
            <?php if(is_array($_list) || $_list instanceof \think\Collection || $_list instanceof \think\Paginator): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="row noticeList">
                <a href="<?php echo url('Notice/noticeshow?id='.$vo['id']); ?>">
                    <div class="col-xs-2">
                        <img class="noticeImg" src="/qiantai/image/1.png" />
                    </div>
                    <div class="col-xs-10">
                        <p class="title"><?php echo $vo['title']; ?></p>
                        <p class="intro"><?php echo $vo['description']; ?></p>
                        <p class="info">浏览: <?php echo $vo['view']; ?> <span class="pull-right"><?php echo $vo['update_time']; ?></span> </p>
                    </div>
                </a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div id="a" style="border: 1px solid #cbcbcb;width: 100%;text-align: center;border-radius: 5px">
            <?php
            if($a){
            ?>
            <a onclick="test(<?php echo $count; ?>,<?php echo $on_page; ?>,<?php echo $info; ?>)">点击查看更多</a>
            <?php
                }else{
                ?>
            <a>没有更多了</a>
            <?php
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>
<script src="/qiantai/jquery-1.11.2.min.js"></script>
<script>
    function test($count,$on_page,$a) {
        var new_page = $on_page+1;
        if(new_page>$count){
            new_page =$count;
        }
        var ajax = new XMLHttpRequest();
        ajax.open('get','http://www.tp.test/home/notice/getPage/a/'+$a+'/on_page/'+new_page);
        ajax.send();
        ajax.onreadystatechange=function () {
            if(ajax.readyState=='4'&&ajax.status=='200'){
                $('#test').html('');
                var data =JSON.parse(ajax.responseText);
                for (var i=0;i<data['on_page'];i++){
                    var href = '/home/notice/list/id/'+data[i]["id"]+'.html';
                    $('#test').append(
                        '  <div class="row noticeList">' +
                        '                <a href="'+href+'">' +
                        '                    <div class="col-xs-2">' +
                        '                        <img class="noticeImg" src="/qiantai/image/1.png" />' +
                        '                    </div>' +
                        '                    <div class="col-xs-10">' +
                        '                        <p class="title">'+data[i]['title']+'</p>' +
                        '                        <p class="intro">'+data[i]['description']+'</p>' +
                        '                        <p class="info">浏览: '+data[i]['view']+' <span class="pull-right">'+data[i]['update_time']+'</span> </p>\n' +
                        '                    </div>' +
                        '                </a>' +
                        '            </div>'
                    );
                }
                if(data['on_page']>=$count){
                    data['on_page']=$count;
                    $('#a').html('<a>没有更多了</a>')
                }else{
                    $('#a').html('<a  onclick="test(<?php echo $count; ?>,'+data['on_page']+','+data['info']+')">点击查看更多</a>');

                }console.log(data);console.log($count);console.log($on_page);console.log($a);
            }
        }
    }
</script>