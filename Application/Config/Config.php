<?php
return array(
    /**
     * 连接数据库信息
     * string host 数据库IP
     * string root 用户名
     * string pwd 密码
     * int port 端口号
     * string charset 字符集
     * string dbname 数据库名称
     */
    'database' => array (
        'host' => 'localhost',
        'user' => 'root',
        'pwd' =>  'root',
        'port' => '3306',
        'charset' => 'utf8',
        'dbname' =>   'blog'
    ),
    /**
     * 路由信息
     * string platform 平台名
     * string controller 控制器名
     * string action 方法名
     */
    'web' => array (
        'platform' => 'home',
        'controller' => 'index',
        'action' => 'index'
    ),
    /**
     * 上传文件保存路径
     */
    '__UPLOAD__' => './Public/upload/',
    /**
     * 样式文件路径
     */
    '__PUBLIC__' => './Public/',
    /**
     * 默认头像
     */
    '__FACE__' => '59426d9d03430.png'
);