<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 15:50:42
         compiled from "D:\www\ip\Application\View\Admin\Login\login.html" */ ?>
<?php /*%%SmartyHeaderCode:8030599a90d27f3b27-92226751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7616555c6651ed050d5e68a08efd8cb133a48c5' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Admin\\Login\\login.html',
      1 => 1503228498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8030599a90d27f3b27-92226751',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_599a90d2825dd7_30437149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a90d2825dd7_30437149')) {function content_599a90d2825dd7_30437149($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="./Public/login/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="./Public/login/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="./Public/login/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="./Public/login/assets/css/ace.min.css" />
		<link rel="stylesheet" href="./Public/login/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="./Public/login/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="./Public/login/css/style.css"/>
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="./Public/login/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="./Public/login/assets/js/ace-extra.min.js"></script>
		<!--[if lt IE 9]>
		<script src="./Public/login/assets/js/html5shiv.js"></script>
		<script src="./Public/login/assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="./Public/login/js/jquery-1.9.1.min.js"></script>        
        <script src="./Public/login/assets/layer/layer.js" type="text/javascript"></script>
<title>登陆</title>
</head>

<body class="login-layout Reg_log_style">
<div class="logintop">    
    <span>欢迎后台管理界面平台</span>    
    <ul>
    <li><a href="#">返回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    <div class="loginbody">
<div class="login-container">
	<div class="center" style="color:#f7f7f7">
	     <h1>Mr-X的小窝博客</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box widget-box no-border visible">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												管理员登陆
											</h4>

											<div class="login_icon"><img src="./Public/login/images/login.png" /></div>

											<form action="index.php?p=admin&c=login&a=login" method="post" name="login_form">
												<fieldset>
										<ul>
   <li class="frame_style form_error"><label class="user_icon"></label><input name="username" type="text"  id="username"/><i>用户名</i></li>
   <li class="frame_style form_error"><label class="password_icon"></label><input name="password" type="password"   id="userpwd"/><i>密码</i></li>
   <li class="frame_style form_error"><label class="Codes_icon"></label><input name="captcha" type="text"   id="Codes_text" class="code" /><i>验证码</i><div class="Codes_region" style="height:38px;padding:0px;margin:0px;"><img src="\framework\libs\code_math.php?t=" onclick="this.src = this.src + Math.random();" style="cursor: pointer;height: 38px; width:80px;
  padding:0px 1px 0px 0px;margin:0px;" alt=""></div></li>
   
  </ul>
													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace">
															<span class="lbl">保存密码</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary" id="login_btn">
															<i class="icon-key"></i>
															登陆
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110">通知</span>
											</div>

											
										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											

											
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->
							</div><!-- /position-relative -->
						</div>
                        </div>
                        <div class="loginbm">版权所有  2017  后台 Design：Mr-X </div><strong></strong>
</body>
</html>
<script>
$('#login_btn').on('click', function(){
	     var num=0;
		 var str="";
     $("input[type$='text'],input[type$='password']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
	
	});
  $(document).ready(function(){
	 $("input[type='text'],input[type='password']").blur(function(){
        var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_error');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_error');
        }
    });
	$("input[type='text'],input[type='password']").focus(function(){		
		var $el = $(this);
        var $parent = $el.parent();
        $parent.attr('class','frame_style').removeClass(' form_errors');
        if($el.val()==''){
            $parent.attr('class','frame_style').addClass(' form_errors');
        } else{
			 $parent.attr('class','frame_style').removeClass(' form_errors');
		}
		});
	  })

</script><?php }} ?>
