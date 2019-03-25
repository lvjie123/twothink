<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:93:"E:\PhpStudy\PHPTutorial\WWW\twothink\public/../application/user/view/default/login\index.html";i:1552636818;s:93:"E:\PhpStudy\PHPTutorial\WWW\twothink\public/../application/user/view/default/base\common.html";i:1552702673;s:90:"E:\PhpStudy\PHPTutorial\WWW\twothink\public/../application/user/view/default/base\var.html";i:1496373782;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo config('WEB_SITE_TITLE'); ?></title>
<link href="__STATIC__/test/boots.css" rel="stylesheet">
<link href="__STATIC__/test/style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
	<script type="text/javascript" src="__STATIC__/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>

	<style>
		.main{margin-bottom: 60px;}
		.indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
	</style>
</head>
<body>
<div class="main">
	
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
      <p class="navbar-text"><a href="/user/login/index.html" class="navbar-link">我的</a></p>
    </div>
  </div>
</nav>

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
          <input type="password" id="inputPassword"  class="form-control" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
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
	<script type="text/javascript">
	    $(function(){
	        $(window).resize(function(){
	            $("#main-container").css("min-height", $(window).height() - 343);
	        }).resize();
	    })
	</script>
	<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "__ROOT__", //当前网站地址
		"APP"    : "__APP__", //当前项目地址
		"PUBLIC" : "__PUBLIC__", //项目公共目录地址
		"DEEP"   : "<?php echo config('URL_PATHINFO_DEPR'); ?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo config('URL_MODEL'); ?>", "<?php echo config('URL_CASE_INSENSITIVE'); ?>", "<?php echo config('URL_HTML_SUFFIX'); ?>"],
		"VAR"    : ["<?php echo config('VAR_MODULE'); ?>", "<?php echo config('VAR_CONTROLLER'); ?>", "<?php echo config('VAR_ACTION'); ?>"]
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
	<?php echo hook('pageFooter', 'widget'); ?>
	<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
		
	</div>

	<!-- /底部 -->
</body>
</html>
