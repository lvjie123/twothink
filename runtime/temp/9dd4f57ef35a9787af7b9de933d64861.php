<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:101:"D:\phpstudy\PHPTutorial\WWW\0920PHP\twothink\public/../application/user/view/default/login\index.html";i:1552894550;}*/ ?>

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
        <p class="navbar-text"><a href="fuwu.html" class="navbar-link">服务</a></p>
      </div>
      <div class="col-xs-3">
        <p class="navbar-text"><a href="faxian.html" class="navbar-link">发现</a></p>
      </div>
      <div class="col-xs-3">
        <p class="navbar-text"><a href="" class="navbar-link">我的</a></p>
      </div>
    </div>
  </nav>
  <!--导航结束-->

  <div class="container-fluid">

    <section>
      <div class="span12">
        <form class="login-form" action="" method="post">
          <div class="form-group">
            <label for="inputEmail">用户名</label>
            <div class="controls">
              <input type="text" id="inputEmail" class="form-control" placeholder="请输入用户名"  ajaxurl="/member/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
            </div>
          </div>
          <div class="form-group">
            <label  for="inputPassword">密码</label>
            <div class="controls">
              <input type="password" id="inputPassword1"  class="form-control" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
            </div>
          </div>
          <div class="form-group">
            <label  for="inputPassword">验证码</label>
            <div class="controls">
              <input type="text" id="inputPassword" class="form-control" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
            </div>
          </div>
          <div class="form-group">
            <label ></label>
            <div class="controls verifyimg">
              <img src="/captcha.html" alt="captcha" />        </div>
            <div class="controls Validform_checktip text-warning"></div>
          </div>
          <div class="form-group">
            <div class="controls">
              <button type="submit" class="btn btn-primary onlineBtn">登 陆</button>
              <p><span><span class="pull-left"><span>还没有账号? <a href="/user/login/register.html">立即注册</a></span> </span></p>

            </div>
          </div>
        </form>
      </div>
    </section>

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

<script type="text/javascript">

    $(document)
        .ajaxStart(function(){
            $("button:submit").addClass("log-in").attr("disabled", true);
        })
        .ajaxStop(function(){
            $("button:submit").removeClass("log-in").attr("disabled", false);
        });


    $("form").submit(function(){
        var self = $(this);
        $.post(self.attr("action"), self.serialize(), success, "json");
        return false;

        function success(data){
            if(data.code){
                window.location.href = data.url;
            } else {
                self.find(".Validform_checktip").text(data.msg);
                //刷新验证码
                $(".verifyimg img").click();
            }
        }
    });

    $(function(){
        //刷新验证码
        var verifyimg = $(".verifyimg img").attr("src");
        $(".verifyimg img").click(function(){
            if( verifyimg.indexOf('?')>0){
                $(".verifyimg img").attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(".verifyimg img").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });
    });
</script>
<!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->

</div>
</body>
</html>