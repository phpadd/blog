<?php /* Smarty version Smarty-3.1-DEV, created on 2017-08-21 16:15:58
         compiled from "D:\www\ip\Application\View\Admin\User\add.html" */ ?>
<?php /*%%SmartyHeaderCode:5460599a8e2e5058a7-07959404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3228c70500c30df05c0b1bc27ec5c4077ffec40' => 
    array (
      0 => 'D:\\www\\ip\\Application\\View\\Admin\\User\\add.html',
      1 => 1503303347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5460599a8e2e5058a7-07959404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_599a8e2e545538_31459255',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_599a8e2e545538_31459255')) {function content_599a8e2e545538_31459255($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/css/ch-ui.admin.css">
    <link rel="stylesheet" href="<?php echo @constant('__PUBLIC__');?>
admin/font/css/font-awesome.min.css">
</head>
<body onload="document.form.username.focus()">
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="index.php?p=admin&c=index&a=index">首页</a> &raquo; 添加用户
    </div>
    <!--面包屑导航 结束-->

    <div class="result_wrap">
        <form action="#" method="post" enctype="multipart/form-data" name="form">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>用户名：</th>
                        <td>
                            <input type="text" id =require  name="username" title="请输入用户名">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>密码：</th>
                        <td>
                            <input type="password" name="password" title="请输入密码">
                            <!-- <em>6到12个字符</em> -->
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>请再次输入密码：</th>
                        <td>
                            <input type="password" name="password_check" title="请再次输入密码" maxlength="20" minlength="6">
                        </td>
                    </tr>
                    <tr>
                        <th>头像：</th>
                        <td>
                            <input type="file" onchange="previewImage(this)" name="avatar">
                            <div id="preview" style="display: none;">
                                <img id="imghead" border=0 src='<<?php ?>%=request.getContextPath()%<?php ?>>/images/defaul.jpg'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>权限：</th>
                        <td>
                            <select name="user_right">
                                <option value="0">超级管理员</option>
                                <option value="1">管理员</option>
                                <option value="2" selected>普通用户</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="button" value="提交" onclick="confirm('确定提交吗？')?form.submit():''">
                            <input type="button" class="back" onclick="confirm('取消本次添加，直接返回用户列表吗？') ? window.location.href='index.php?p=admin&c=user&a=list':''" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script type="text/javascript">
        function previewImage(file)
        {
            var MAXWIDTH  = 100;
            var MAXHEIGHT = 100;
            var div = document.getElementById('preview');
            if (file.files && file.files[0])
            {
                div.innerHTML ='<p style="font-size: 14px;">头像预览：</p><img id=imghead>';
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

        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
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
