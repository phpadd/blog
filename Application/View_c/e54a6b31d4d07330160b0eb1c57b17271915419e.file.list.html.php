<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 15:38:14
         compiled from "D:\www\ip\Application\View\Admin\Article\list.html" */ ?>
<?php /*%%SmartyHeaderCode:4454599a8de6492694-64356000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e54a6b31d4d07330160b0eb1c57b17271915419e' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Admin\\Article\\list.html',
      1 => 1497630863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4454599a8de6492694-64356000',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'articleList' => 0,
    'article' => 0,
    'categoryList' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_599a8de658b210_72000675',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a8de658b210_72000675')) {function content_599a8de658b210_72000675($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\ip\\Framework\\Libs\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
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
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="index.php?p=admin&c=index&a=index">首页</a> &raquo; 文章列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始  独立开发
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="78">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>-->
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始 独立开发
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>-->
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <!--
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">排序</th>
                        -->
                        <th class="tc">ID</th>
                        <th>缩略图</th>
                        <th>标题</th>
                        <th>所属分类</th>
                        <th>是否显示</th>
                        <th>点击</th>
                        <th>发布人</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articleList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                    <tr>
                        <!--
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="0">
                        </td>
                        -->
                        <td class="tc"><?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
</td>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
                            <img src="<?php echo @constant('__UPLOAD__');?>
<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" style="width: 6em;height: 5em;">
                            <?php }?>
                            <!--<?php echo $_smarty_tpl->tpl_vars['article']->value['image']=='' ? '' : "<img src=".((string)@constant('__UPLOAD__')).((string)$_smarty_tpl->tpl_vars['article']->value['image'])." style='width: 6em;height: 5em;'>";?>
-->
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['article']->value['cid']==0) {?>
                            <td class="tc">/</td>
                        <?php } else { ?>
                        <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['article']->value['cid']==$_smarty_tpl->tpl_vars['category']->value['id']) {?>
                                <td class="tc"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</td>
                            <?php }?>
                        <?php } ?>
                        <?php }?>
                        <td>
                            <?php if ($_smarty_tpl->tpl_vars['article']->value['display']==1) {?>
                            <span style="color: green">显示</span>
                            <?php } else { ?>
                            <span style="color: red">隐藏</span>
                            <?php }?>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['article']->value['read_count'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['updated_time'],'Y-m-d H:i:s');?>
</td>
                        <td>
                            <a href="index.php?p=admin&c=article&a=update&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">修改</a>
                            <a href="javascript:;" onclick="confirm('确定删除“【<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
】及缩略图”吗？') ? window.location.href='index.php?p=admin&c=article&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
' : ''">删除</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

                <div class="page_nav">
                    <div>
                        <a class="first" href="news_list.php?pageno=1">第一页</a>
                        <a class="prev" href="news_list.php?pageno=$prevpage">上一页</a>
                        <a class="num" href="news_list.php?pageno=6">6</a>
                        <a class="num" href="news_list.php?pageno=7">7</a>
                        <span class="current">$pageno</span>
                        <a class="num" href="news_list.php?pageno=9">9</a>
                        <a class="num" href="news_list.php?pageno=10">10</a>
                        <a class="next" href="news_list.php?pageno=$nextpage">下一页</a>
                        <a class="end" href="news_list.php?pageno=$pagenoTotal">最后一页</a>
                        <span class="rows">$dataTotal 条记录</span>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

</body>
</html><?php }} ?>
