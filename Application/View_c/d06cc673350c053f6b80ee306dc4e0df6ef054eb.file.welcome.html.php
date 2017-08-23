<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 15:40:54
         compiled from "D:\www\ip\Application\View\Admin\Index\welcome.html" */ ?>
<?php /*%%SmartyHeaderCode:32118599a8e8606ab12-35353045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd06cc673350c053f6b80ee306dc4e0df6ef054eb' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Admin\\Index\\welcome.html',
      1 => 1497630873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32118599a8e8606ab12-35353045',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_599a8e860d5cd0_43822427',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a8e860d5cd0_43822427')) {function content_599a8e860d5cd0_43822427($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\ip\\Framework\\Libs\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/css/ch-ui.admin.css">
	<link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/font/css/font-awesome.min.css">
</head>
<body>
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
		<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
		<i class="fa fa-home"></i> <a href="index.php?p=admin&c=index&a=index">首页</a> &raquo; 欢迎页
	</div>
	<!--面包屑导航 结束-->
	
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="index.php?p=admin&c=article&a=add"><i class="fa fa-plus"></i>新增文章</a>
                <a href="index.php?p=admin&c=category&a=add"><i class="fa fa-plus"></i>新增分类</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap avatar">
        <div class="result_title">
            <img src="<?php echo @constant('__UPLOAD__');?>
<?php echo $_SESSION['userinfo']['avatar'];?>
" width="100px" height="100px" />
        </div>
        <div class="result_content">您好，<?php echo $_SESSION['userinfo']['username'];?>
，
            这是您第<?php echo $_SESSION['userinfo']['login_count'];?>
次登录，上次登录时间：<?php echo smarty_modifier_date_format($_SESSION['userinfo']['login_time'],'Y-m-d H:i');?>
，上次登录的IP：<?php echo long2ip($_SESSION['userinfo']['login_ip']);?>

        </div>
    </div>

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>系统基本信息</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>操作系统</label><span><?php echo php_uname('s');?>
</span>
                </li>
                <li>
                    <label>运行环境</label><span><?php echo Apache_get_version();?>
</span>
                </li>
                <li>
                    <label>上传附件限制</label><span><?php echo ini_get('upload_max_filesize');?>
</span>
                </li>
                <li>
                    <label>北京时间</label><span><?php echo date('Y-m-d H:i:s',time());?>
</span>
                </li>
                <li>
                    <label>服务器域名/IP</label><span><?php echo $_SERVER['SERVER_NAME'];?>
 [ <?php echo $_SERVER['SERVER_ADDR'];?>
 ]</span>
                </li>
            </ul>
        </div>
    </div>
	<!--结果集列表组件 结束-->

</body>
</html><?php }} ?>
