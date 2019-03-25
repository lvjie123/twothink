<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:93:"E:\PhpStudy\PHPTutorial\WWW\twothink\public/../application/admin/view/default/inform\add.html";i:1552707614;s:94:"E:\PhpStudy\PHPTutorial\WWW\twothink\public/../application/admin/view/default/public\base.html";i:1496373782;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $meta_title; ?>|TwoThink管理平台</title>
    <link href="__ROOT__/public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/<?php echo \think\Config::get('color_style'); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="__PUBLIC__/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__['main']) || $__MENU__['main'] instanceof \think\Collection || $__MENU__['main'] instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__['main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                <li class="<?php echo (isset($menu['class']) && ($menu['class'] !== '')?$menu['class']:''); ?>"><a href="<?php echo url($menu['url']); ?>"><?php echo $menu['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username'); ?>"><?php echo session('user_auth.username'); ?></em></li>
                <li><a  onclick="go_home();">前台首页</a></li>
                <li><a href="<?php echo url('User/updatePassword'); ?>">修改密码</a></li>
                <li><a href="<?php echo url('User/updateNickname'); ?>">修改昵称</a></li>
                <li><a href="<?php echo url('Admin/delcache'); ?>">更新缓存</a></li>
                <li><a href="<?php echo url('Publics/logout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!(empty($_extra_menu) || (($_extra_menu instanceof \think\Collection || $_extra_menu instanceof \think\Paginator ) && $_extra_menu->isEmpty()))): ?>
                    
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; if(is_array($__MENU__['child']) || $__MENU__['child'] instanceof \think\Collection || $__MENU__['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?>
                    <!-- 子导航 -->
                    <?php if(!(empty($sub_menu) || (($sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator ) && $sub_menu->isEmpty()))): if(!(empty($key) || (($key instanceof \think\Collection || $key instanceof \think\Paginator ) && $key->isEmpty()))): ?><h3><i class="icon icon-unfold"></i><?php echo $key; ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu) || $sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a class="item" href="<?php echo url($menu['url']); ?>"><?php echo $menu['title']; ?></a>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    <?php endif; ?>
                    <!-- /子导航 -->
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!(empty($_show_nav) || (($_show_nav instanceof \think\Collection || $_show_nav instanceof \think\Paginator ) && $_show_nav->isEmpty()))): ?>
            <div class="breadcrumb">
                <span>您的位置:</span>
                <assign name="i" value="1" />
                <?php if(is_array($_nav) || $_nav instanceof \think\Collection || $_nav instanceof \think\Paginator): if( count($_nav)==0 ) : echo "" ;else: foreach($_nav as $k=>$v): if($i == count($_nav)): ?>
                    <span><?php echo $v; ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo $k; ?>"><?php echo $v; ?></a>&gt;</span>
                    <?php endif; ?>
                    <assign name="i" value="$i+1" />
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
            <!-- nav -->
            

            
<div class="main-title">
    <h2><?php echo isset($info['id'])?'编辑':'新增'; ?>后台菜单</h2>
</div>
<div class="tab-wrap">
    <ul class="tab-nav nav">
        <li data-tab="tab1" class="current"><a href="javascript:void(0);">基础</a></li>
        <li data-tab="tab2" ><a href="javascript:void(0);">扩展</a></li>
    </ul>
    <div class="tab-content">
        <!-- 表单 -->
        <form id="form" action="/admin/article/update.html" method="post" class="form-horizontal">
            <!-- 基础文档模型 -->
            <div id="tab1" class="tab-pane in tab1">
                <div class="form-item cf">
                    <label class="item-label">标题<span class="check-tips">（文档标题）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="title" value="">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">文章内容<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="textarea">
                            <textarea name="content"></textarea>

                            <input type="hidden" name="parse" value="0">
                            <script type="text/javascript" charset="utf-8" src="/static/static/ueditor/ueditor.config.js"></script>
                            <script type="text/javascript" charset="utf-8" src="/static/static/ueditor/ueditor.all.js"></script>
                            <script type="text/javascript" charset="utf-8" src="/static/static/ueditor/lang/zh-cn/zh-cn.js"></script>
                            <script type="text/javascript">
                                $('textarea[name="content"]').attr('id', 'editor_id_content');
                                window.UEDITOR_HOME_URL = "/static/ueditor";
                                window.UEDITOR_CONFIG.initialFrameHeight = parseInt('500px');
                                window.UEDITOR_CONFIG.scaleEnabled = true;
                                window.UEDITOR_CONFIG.imageUrl = '/home/addons/editorforadmin/upload/ue_upimg.html';
                                window.UEDITOR_CONFIG.imagePath = '';
                                window.UEDITOR_CONFIG.imageFieldName = 'imgFile';
                                UE.getEditor('editor_id_content');
                            </script>
                        </label>
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">标识<span class="check-tips">（同一根节点下标识不重复）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="name" value="">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">Tags关键词<span class="check-tips">（ 多个之间用空格分隔）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="keywords" value="">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">描述<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="textarea input-large">
                            <textarea name="description"></textarea>
                        </label>
                    </div>
                </div>
            </div>
            <div id="tab2" class="tab-pane  tab2">
                <div class="form-item cf">
                    <label class="item-label">内容类型<span class="check-tips"></span></label>
                    <div class="controls">
                        <select name="type">
                            <option value="1" >目录</option>
                            <option value="2" selected>主题</option>
                            <option value="3" >段落</option>
                        </select>
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">可见性<span class="check-tips"></span></label>
                    <div class="controls">
                        <label class="radio">
                            <input type="radio" value="0"  name="display">不可见                                	</label>
                        <label class="radio">
                            <input type="radio" value="1" checked name="display">所有人可见                                	</label>
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">优先级<span class="check-tips">（越高排序越靠前）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="level" value="0">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">推荐位<span class="check-tips">（多个推荐则将其推荐值相加）</span></label>
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" value="1" name="position[]" >列表推荐                                	</label>
                        <label class="checkbox">
                            <input type="checkbox" value="2" name="position[]" >频道推荐                                	</label>
                        <label class="checkbox">
                            <input type="checkbox" value="4" name="position[]" >首页推荐                                	</label>
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">封面<span class="check-tips">（0-无封面，大于0-封面图片ID，需要函数处理）</span></label>
                    <div class="controls">
                        <div class="controls">
                            <input type="file" id="upload_picture_cover_id">
                            <input type="hidden" name="cover_id" id="cover_id_cover_id"/>
                            <span>建议大小：200*200像素</span>
                            <div class="upload-img-box">
                            </div>
                        </div>
                        <script type="text/javascript">
                            //上传图片
                            /* 初始化上传插件 */
                            $("#upload_picture_cover_id").uploadify({
                                "height"          : 30,
                                "swf"             : "/static/static/uploadify/uploadify.swf",
                                "fileObjName"     : "download",
                                "buttonText"      : "上传图片",
                                "uploader"        : "/admin/file/uploadpicture/session_id/cnau6mb0d3b6uba9nukl6p09sk.html",
                                "width"           : 120,
                                'removeTimeout'	  : 1,
                                'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
                                "onUploadSuccess" : uploadPicturecover_id,
                                'onFallback' : function() {
                                    alert('未检测到兼容版本的Flash.');
                                }
                            });
                            function uploadPicturecover_id(file, data){
                                var data = $.parseJSON(data);
                                var src = '';
                                if(data.status){
                                    $("#cover_id_cover_id").val(data.id);
                                    src = data.url || '' + data.path
                                    $("#cover_id_cover_id").parent().find('.upload-img-box').html(
                                        '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                    );
                                } else {
                                    updateAlert(data.info);
                                    setTimeout(function(){
                                        $('#top-alert').find('button').click();
                                        $(that).removeClass('disabled').prop('disabled',false);
                                    },1500);
                                }
                            }
                        </script>
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">浏览量<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="view" value="0">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">评论数<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="comment" value="0">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">收藏数<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="bookmark" value="0">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">创建时间<span class="check-tips"></span></label>
                    <div class="controls">
                        <input type="text" name="create_time" class="text time" value="" placeholder="请选择时间" />
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">截至时间<span class="check-tips">（0-永久有效）</span></label>
                    <div class="controls">
                        <input type="text" name="deadline" class="text time" value="" placeholder="请选择时间" />
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">外链<span class="check-tips">（0-非外链，大于0-外链ID,需要函数进行链接与编号的转换）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-mid" name="link_id" value="0">
                    </div>
                </div>
                <div class="form-item cf">
                    <label class="item-label">详情页显示模板<span class="check-tips">（参照display方法参数的定义）</span></label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="template" value="">
                    </div>
                </div>
            </div>

            <div class="form-item cf">
                <button class="btn submit-btn ajax-post hidden" id="submit" type="submit" target-form="form-horizontal">确 定</button>
                <a class="btn btn-return" href="/admin/article/index/cate_id/43.html">返 回</a>
                <button class="btn save-btn" url="/admin/article/autosave.html" target-form="form-horizontal" id="autoSave">
                    存草稿
                </button>
                <input type="hidden" name="id" value=""/>
                <input type="hidden" name="pid" value="0"/>
                <input type="hidden" name="model_id" value="2"/>
                <input type="hidden" name="group_id" value=""/>
                <input type="hidden" name="category_id" value="43">
            </div>
        </form>
    </div>
</div>


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.twothink.cn" target="_blank">TwoThink</a>管理平台</div>
                <div class="fr">V<?php echo TWOTHINK_VERSION; ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "__ROOT__", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "__PUBLIC__", //项目公共目录地址
            "DEEP"   : "<?php echo config('pathinfo_depr'); ?>", //PATHINFO分割符
            "MODEL"  : ["3", "<?php echo config('url_convert'); ?>", "<?php echo config('url_html_suffix'); ?>"],//config('URL_MODEL')
            "VAR"    : ["<?php echo config('var_module'); ?>", "<?php echo config('var_controller'); ?>", "<?php echo config('var_action'); ?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="__PUBLIC__/static/think.js"></script>
    <script type="text/javascript" src="__PUBLIC__/admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
        function go_home() {
          window.open("<?php echo url('/'); ?>");
        }
    </script>
    
<script type="text/javascript">
    Think.setValue("pid", <?php echo (isset($info['pid']) && ($info['pid'] !== '')?$info['pid']: 0); ?>);
    Think.setValue("hide", <?php echo (isset($info['hide']) && ($info['hide'] !== '')?$info['hide']: 0); ?>);
    Think.setValue("is_dev", <?php echo (isset($info['is_dev']) && ($info['is_dev'] !== '')?$info['is_dev']: 0); ?>);
    //导航高亮
    highlight_subnav('<?php echo url('index'); ?>');
</script>
<script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "/static", //项目公共目录地址
            "DEEP"   : "/", //PATHINFO分割符
            "MODEL"  : ["3", "1", "html"],//config('URL_MODEL')
            "VAR"    : ["admin", "Ticket", "index"]
        }
    })();
</script>
<script type="text/javascript" src="/static/static/think.js"></script>
<script type="text/javascript" src="/static/admin/js/common.js"></script>
<script type="text/javascript">
    +function(){
        var $window = $(window), $subnav = $("#subnav"), url;
        $window.resize(function(){
            $("#main").css("min-height", $window.height() - 130);
        }).resize();

        /* 左边菜单高亮 */
        url = window.location.pathname + window.location.search;
        url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
        $subnav.find("a[href='" + url + "']").parent().addClass("current");

        /* 左边菜单显示收起 */
        $("#subnav").on("click", "h3", function(){
            var $this = $(this);
            $this.find(".icon").toggleClass("icon-fold");
            $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
            prev("h3").find("i").addClass("icon-fold").end().end().hide();
        });

        $("#subnav h3 a").click(function(e){e.stopPropagation()});

        /* 头部管理员菜单 */
        $(".user-bar").mouseenter(function(){
            var userMenu = $(this).children(".user-menu ");
            userMenu.removeClass("hidden");
            clearTimeout(userMenu.data("timeout"));
        }).mouseleave(function(){
            var userMenu = $(this).children(".user-menu");
            userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
            userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
        });

        /* 表单获取焦点变色 */
        $("form").on("focus", "input", function(){
            $(this).addClass('focus');
        }).on("blur","input",function(){
            $(this).removeClass('focus');
        });
        $("form").on("focus", "textarea", function(){
            $(this).closest('label').addClass('focus');
        }).on("blur","textarea",function(){
            $(this).closest('label').removeClass('focus');
        });

        // 导航栏超出窗口高度后的模拟滚动条
        var sHeight = $(".sidebar").height();
        var subHeight  = $(".subnav").height();
        var diff = subHeight - sHeight; //250
        var sub = $(".subnav");
        if(diff > 0){
            $(window).mousewheel(function(event, delta){
                if(delta>0){
                    if(parseInt(sub.css('marginTop'))>-10){
                        sub.css('marginTop','0px');
                    }else{
                        sub.css('marginTop','+='+10);
                    }
                }else{
                    if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                        sub.css('marginTop','-'+(diff-10));
                    }else{
                        sub.css('marginTop','-='+10);
                    }
                }
            });
        }
    }();
    function go_home() {
        window.open("/");
    }
</script>

<link href="/static/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<link href="/static/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/static/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/static/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">

    $('#submit').click(function(){
        $('#form').submit();
    });

    $(function(){
        $('.date').datetimepicker({
            format: 'yyyy-mm-dd',
            language:"zh-CN",
            minView:2,
            autoclose:true
        });
        $('.time').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            language:"zh-CN",
            minView:2,
            autoclose:true
        });
        showTab();


    });
</script>

</body>
</html>
