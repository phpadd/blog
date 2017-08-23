<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 16:02:16
         compiled from "D:\www\ip\Application\View\Home\Commen\head.html" */ ?>
<?php /*%%SmartyHeaderCode:8248599a8df372af95-28778326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eae0a17e4b22916004946f60ea8885b01afac49c' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Home\\Commen\\head.html',
      1 => 1503301698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8248599a8df372af95-28778326',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_599a8df3754992_90505187',
  'variables' => 
  array (
    'categoryList' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a8df3754992_90505187')) {function content_599a8df3754992_90505187($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Language" content="zh-CN" />
    <title>welcome to 我的博客 </title>
    <link rel="stylesheet" rev="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
/home/style/default.css" type="text/css" media="all"/>
    <script src="<?php echo @constant('__PUBLIC__');?>
/home/script/common.js" type="text/javascript"></script>
</head>
<body class="multi index">

<!-- top bar -->
<div id="top">
    <div class="center">
        <div class="menu-left">
            <ul>
                <li><a href="javascript:;" onclick="setHomepage('#');">设为首页</a></li>
                <li><a href="javascript:;" onclick="addFavorite('#','#')">收藏本站</a></li>
            </ul>
        </div>
        <div class="menu-right">
            <ul id="info">
                <?php if (isset($_SESSION['userinfo']['username'])) {?>
                <li>欢迎 <?php echo $_SESSION['userinfo']['username'];?>
！</li>
                <li><a href="index.php?p=admin&c=index&a=index" target="_blank">管理</a></li>
                <li><a href="index.php?p=home&c=login&a=loginout&s=1">退出</a></li>
                <?php } else { ?>
                <li>欢迎 游客</li>
                <li><a href="index.php?p=home&c=login&a=login" style="color: #f00;">请登录</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>

<div id="divAll">
    <div id="divPage">
        <div id="divMiddle">
            <div id="divTop">
                <h1 id="BlogTitle"><a href="www.phpadd.com/">www.phpadd.com</a></h1>
                <h3 id="BlogSubTitle">Welcome to 我的博客</h3>
            </div>
            <div id="divNavBar">
                <ul>
                    <li id="nvabar-item-index"><a href="index.php?p=home&c=index&a=index">首页</a></li>
                    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['category']->value['pid']==0) {?>
                    <li id="navbar-page-2">
                        <a href="index.php?p=home&c=article&a=list&cid=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                        </a>
                    </li>
                    <?php }?>
                    <?php } ?>
                    <li id="navbar-page-2"><a href="#">留言本</a></li>
                </ul>
            </div><?php }} ?>
