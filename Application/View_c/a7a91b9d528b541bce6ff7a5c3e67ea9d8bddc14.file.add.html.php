<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 15:38:16
         compiled from "D:\www\ip\Application\View\Admin\Article\add.html" */ ?>
<?php /*%%SmartyHeaderCode:11431599a8de8271e65-92469995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7a91b9d528b541bce6ff7a5c3e67ea9d8bddc14' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Admin\\Article\\add.html',
      1 => 1499086165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11431599a8de8271e65-92469995',
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
  'unifunc' => 'content_599a8de8364d53_42542853',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a8de8364d53_42542853')) {function content_599a8de8364d53_42542853($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/css/ch-ui.admin.css">
	<link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/font/css/font-awesome.min.css">
    <style type="text/css">
        table.add_tab tr [style]{ line-height: 20px !important; }
    </style>
</head>
<body onload="document.form.title.focus()">
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="index.php?p=admin&c=index&a=index">首页</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

    <div class="result_wrap">
        <form action="#" method="post" enctype="multipart/form-data" name="form">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="cid">
                                <option value="">==请选择==</option>
                                <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                                    <?php echo str_repeat('&nbsp;',$_smarty_tpl->tpl_vars['category']->value['level']*4);?>

                                    <?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

                                </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="title">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th>缩略图：</th>
                        <td>
                            <input type="file" onchange="previewImage(this)" name="image">
                            <div id="preview" style="display: none;">
                                <img id="imghead" border=0 src='<<?php ?>%=request.getContextPath()%<?php ?>>/images/defaul.jpg'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>作者：</th>
                        <td>
                            <input type="text" name="author" value="<?php echo $_SESSION['userinfo']['username'];?>
">
                        </td>
                    </tr>
                    <tr>
                        <th>关键字：</th>
                        <td>
                            <textarea name="keywords"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <textarea class="lg" name="content" id="content"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th title="推荐将在首页显示">是否推荐：</th>
                        <td>
                            <label for=""><input type="radio" name="is_recommend" value="1">推荐</label>
                            <label for=""><input type="radio" name="is_recommend" value="0" checked>不推荐</label>
                        </td>
                    </tr>
                    <tr>
                        <th>是否显示：</th>
                        <td>
                            <label for=""><input type="radio" name="display" value="0">隐藏</label>
                            <label for=""><input type="radio" name="display" value="1" checked>显示</label>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="button" value="提交" onclick="confirm('确定提交吗？')?form.submit():''">
                            <input type="button" class="back" onclick="confirm('取消本次添加，直接返回文章列表吗？')?window.location.href='index.php?p=admin&c=article&a=list':''" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script type="text/javascript" charset="utf-8" src="<?php echo @constant('__PUBLIC__');?>
common/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo @constant('__PUBLIC__');?>
common/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript">
        UE.getEditor('content',{
            initialFrameWidth:800,
            initialFrameHeight:400
        });
    </script>
    <script type="text/javascript">

        function previewImage(file)
        {
            var MAXWIDTH  = 100;
            var MAXHEIGHT = 100;
            var div = document.getElementById('preview');
            if (file.files && file.files[0])
            {
                div.innerHTML ='<p style="font-size: 14px;">缩略图预览：</p><img id=imghead>';
                var img = document.getElementById('imghead');
                img.onload = function(){
                    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                    img.width  =  rect.width;
                    img.height =  rect.height;
                    img.style.marginLeft = rect.left+'px';
                    img.style.marginTop = rect.top+'px';
                };
                var reader = new FileReader();
                reader.onload = function(evt){ img.src = evt.target.result; };
                reader.readAsDataURL(file.files[0]);
                div.style.display = "block";
            }
        }

        function clacImgZoomParam( maxWidth, maxHeight, width, height )
        {
            var param = { top:0, left:0, width:width, height:height };
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;

                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }

            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
    </script>
</body>
</html><?php }} ?>
