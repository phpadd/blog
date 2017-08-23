<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 15:38:27
         compiled from "D:\www\ip\Application\View\Home\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:17563599a8df36363f2-92431709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f9feba41a3943e39d257b4dd1193dd9d8bc6e84' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Home\\Index\\index.html',
      1 => 1497762821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17563599a8df36363f2-92431709',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'articleList' => 0,
    'article' => 0,
    'pageshow' => 0,
    'categoryList' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_599a8df371cbf7_19426798',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a8df371cbf7_19426798')) {function content_599a8df371cbf7_19426798($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\www\\ip\\Framework\\Libs\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../Commen/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


		<div id="divMain">
 <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articleList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
<div class="post multi">
	<h4 class="post-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['updated_time'],'Y-m-d H:i:s');?>
</h4>
	<h2 class="post-title"><a href="index.php?p=home&c=article&a=detail&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h2>
	<div class="post-body">
		<?php echo $_smarty_tpl->tpl_vars['article']->value['description'];?>

	</div>
	<h5 class="post-tags">
        <?php echo $_smarty_tpl->tpl_vars['article']->value['keywords'];?>

    </h5>
	<h6 class="post-footer">
		作者:<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>
 | 分类:<?php echo $_smarty_tpl->tpl_vars['article']->value['categoryName'];?>
 | 阅读:<?php echo $_smarty_tpl->tpl_vars['article']->value['read_count'];?>
 | 赞:<?php echo $_smarty_tpl->tpl_vars['article']->value['praise_count'];?>
 | 评论:<?php echo $_smarty_tpl->tpl_vars['article']->value['comment_count'];?>
</h6>
</div>
<?php } ?>

<div class="pagebar" >
    <?php echo $_smarty_tpl->tpl_vars['pageshow']->value;?>

  	<!--<span>当前一共有3条记录，当前每页显示8条记录，当前是第1页！</span>&nbsp;&nbsp;		<a href="index.php?module=Index&action=index&page=1">首页</a>&nbsp;&nbsp;-->
		<!--<a href="index.php?module=Index&action=index&page=1">上一页</a>&nbsp;&nbsp;-->
		<!--<a href="index.php?module=Index&action=index&page=1">下一页</a>&nbsp;&nbsp;-->
		<!--<a href="index.php?module=Index&action=index&page=1">末页</a>&nbsp;&nbsp;<a href='index.php?module=Index&action=index&page=1'>1</a>&nbsp;&nbsp;<select onChange="location.href='index.php?module=Index&action=index&page=' + this.value;"><option value='1' selected='selected'>1</option></select>&nbsp;&nbsp;		<form method="GET" action="index.php" style="display:inline">-->
			<!--<input type="hidden" name="module" value="Index"/>-->
			<!--<input type="hidden" name="action" value="index"/>-->
			<!---->
			<!--<input type="text" id="page" name="page" value="1"  style="width:20px" onFocus="input_focus(this)" onBlur="input_blur(this)"/>-->
			<!--<input type="submit" value="提交"/>-->
		<!--</form>-->
		<!--<script>-->
			<!--function input_focus(e){ -->
				<!--if(e.value == e.defaultValue) e.value = '';-->
			<!-- }-->

			<!--function input_blur(e){ -->
				<!--if(e.value == '') e.value = e.defaultValue;-->
			<!-- }-->
		<!--</script>-->
  </div>
		</div>
<div id="divSidebar">
 
<dl class="function" id="divSearchPanel">
<dt class="function_t">文章标题搜索</dt><dd class="function_c">

<div>
	<form name="search" method="get" action="index.php?p=home&c=article&a=search">
		<input type="hidden" name="p" value="home">
		<input type="hidden" name="c" value="article">
		<input type="hidden" name="a" value="search">
		<input type="text" name="keyword" size="11" value=""/>
		<input type="submit" value="搜索" />
	</form>
</div>


</dd>
</dl> 
<dl class="function" id="divCalendar">
<dt style="display:none;"></dt><dd class="function_c">

<div></div>


</dd>
</dl> 
<dl class="function" id="divCatalog">
<dt class="function_t">文章分类</dt><dd class="function_c">
<ul>
    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
			<li >
                <?php echo str_repeat('&nbsp;',$_smarty_tpl->tpl_vars['category']->value['level']*8);?>

                <a href="index.php?p=home&c=article&a=list&cid=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a>
            </li>
    <?php } ?>
</ul>

</dd>
</dl> 
<dl class="function" id="divComments">
<dt class="function_t">最新留言</dt><dd class="function_c">


<ul></ul>

</dd>
</dl> 
<dl class="function" id="divArchives">
<dt class="function_t">文章归档</dt><dd class="function_c">


<ul></ul>

</dd>
</dl> 
<dl class="function" id="divFavorites">
<dt class="function_t">网站收藏</dt><dd class="function_c">


<ul><li><a href="" target="_blank">myblog社区</a></li><li><a href="" target="_blank">myblog应用中心</a></li></ul>

</dd>
</dl> 
<dl class="function" id="divLinkage">
<dt class="function_t">友情链接</dt><dd class="function_c">


<ul><li><a href="" target="_blank" title="myblog开源博客系统">myblog官网</a></li></ul>

</dd>
</dl> 
<dl class="function" id="divMisc">
<dt style="display:none;"></dt><dd class="function_c">


<ul><li><a href="" target="_blank"><img src="image/logo/myblog.gif" height="31" width="88" alt="myblog" /></a></li><li><a href="" target="_blank"><img src="image/logo/rss.png" height="31" width="88" alt="订阅本站的 RSS 2.0 新闻聚合" /></a></li></ul>

</dd>
</dl>		</div>
		<div id="divBottom">
        	<h3 id="BlogCopyRight">
                                            	Copyright © 2008-2028 PHP150912 All Rights Reserved            </h3>
			<h4 id="BlogPowerBy">Powered by <a href="" title="myblog" target="_blank">myblog V1.0 Release 20151116</a></h4>
		</div><div class="clear"></div>
	</div><div class="clear"></div>
	</div><div class="clear"></div>
</div>
</body>
</html><?php }} ?>
