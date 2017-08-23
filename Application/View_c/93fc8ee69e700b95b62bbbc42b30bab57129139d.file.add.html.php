<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 15:39:36
         compiled from "D:\www\ip\Application\View\Admin\Category\add.html" */ ?>
<?php /*%%SmartyHeaderCode:23805599a8e3832e561-87177040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93fc8ee69e700b95b62bbbc42b30bab57129139d' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Admin\\Category\\add.html',
      1 => 1497632998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23805599a8e3832e561-87177040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryList' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_599a8e383bab87_68191353',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a8e383bab87_68191353')) {function content_599a8e383bab87_68191353($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/css/ch-ui.admin.css">
    <link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/font/css/font-awesome.min.css">
</head>
<body onload="document.form.name.focus()">
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="index.php?p=admin&c=index&a=index">首页</a> &raquo; 添加分类
    </div>
    <!--面包屑导航 结束-->

    <div class="result_wrap">
        <form action="index.php?p=admin&c=category&a=add" method="post" name="form">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>所属分类：</th>
                        <td>
                            <select name="pid">
                                <option value="0">==请选择==</option>
                                <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                                    <?php echo str_repeat('&nbsp;',$_smarty_tpl->tpl_vars['category']->value['level']*8);?>

                                    <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                                </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                            <input type="text" class="lg" name="name">
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" name="sort">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="button" value="提交" onclick="confirm('确定提交吗？')?form.submit():''">
                            <input type="button" class="back" onclick="confirm('取消本次添加，直接返回分类列表吗？')?window.location.href='index.php?p=admin&c=category&a=list':''" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
</html><?php }} ?>
