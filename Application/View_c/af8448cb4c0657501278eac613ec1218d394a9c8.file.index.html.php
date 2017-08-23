<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 15:40:53
         compiled from "D:\www\ip\Application\View\Admin\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:30737599a8e85c5b644-86159589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af8448cb4c0657501278eac613ec1218d394a9c8' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Admin\\Index\\index.html',
      1 => 1503300805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30737599a8e85c5b644-86159589',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_599a8e85cad206_34094196',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a8e85cad206_34094196')) {function content_599a8e85cad206_34094196($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/css/ch-ui.admin.css">
	<link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/font/css/font-awesome.min.css">
	<script type="text/javascript" src="<?php echo @constant('__PUBLIC__');?>
admin/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo @constant('__PUBLIC__');?>
admin/js/ch-ui.admin.js"></script>
</head>
<body>
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">博客管理后台</div>
			<ul>
				<li><a href="index.php?p=admin&c=index&a=index" class="active">后台首页</a></li>
				<li><a href="index.php?p=home&c=index&a=index" target="_blank">前台首页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：<?php echo $_SESSION['userinfo']['username'];?>
</li>
				<!-- 独立开发
				<li><a href="pass.html" target="main">修改密码</a></li>
				-->
				<li><a href="index.php?p=admin&c=login&a=loginout&s=0">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>文章管理</h3>
                <ul class="sub_menu">
                    <li><a href="index.php?p=admin&c=article&a=list" target="main"><i class="fa fa-fw fa-list-ul"></i>文章列表</a></li>
                    <li><a href="index.php?p=admin&c=article&a=add" target="main"><i class="fa fa-fw fa-plus-square"></i>添加文章</a></li>
                </ul>
            </li>
			<?php if ($_SESSION['userinfo']['user_right']<2) {?>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>分类管理</h3>
                <ul class="sub_menu">
                    <li><a href="index.php?p=admin&c=category&a=list" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
                    <li><a href="index.php?p=admin&c=category&a=add" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if ($_SESSION['userinfo']['user_right']==0) {?>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>用户管理</h3>
                <ul class="sub_menu">
                    <li><a href="index.php?p=admin&c=user&a=list" target="main"><i class="fa fa-fw fa-list-ul"></i>用户列表</a></li>
                    <li><a href="index.php?p=admin&c=user&a=add" target="main"><i class="fa fa-fw fa-plus-square"></i>添加用户</a></li>
                </ul>
            </li>
            <?php }?>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="index.php?p=admin&c=index&a=welcome" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2017. Powered By <a href="https://www.phpadd.com/">https://www.phpadd.com</a>.
	</div>
	<!--底部 结束-->
</body>
</html><?php }} ?>
