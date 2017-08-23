<?php
namespace Core;

/**
 * 基础控制器
 */
class Controller
{
    /**
     * 保存Smarty实例
     * @var \Smarty Object
     */
    protected $smarty;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->initSession();
        $this->initSmarty();
        $this->initHtmlpurifier();
    }

    public function initSession()
    {
        session_start();
    }

    public function initSmarty()
    {
        $this->smarty = new \Smarty;
        $this->smarty->setTemplateDir(VIEW_PATH . PLATFORM_NAME . DS . CONTROLLER_NAME . DS);
        $this->smarty->setCompileDir(APP_PATH . 'View_c');
        $this->smarty->assign('title', 'Mr-X的博客');
    }

    public function initHtmlpurifier()
    {
        $this->htmlpurifier = new \HTMLPurifier;
    }

    /**
     * 跳转成功页面
     * @param string $msg   提示信息
     * @param string $url   跳转网址
     * @param int    $time
     */
    public function success($msg, $url)
    {
        $this->jump($msg, $url, 'success');
    }

    /**
     * 跳转失败页面
     * @param string $msg   提示信息
     * @param string $url   跳转网址
     * @param int    $time
     */
    public function error($msg, $url)
    {
        $this->jump($msg, $url, 'error');
    }

    /**
     * 跳转页面
     * @param string $msg   提示信息
     * @param string $url   跳转网址
     * @param string $state 操作状态：成功-success ，失败-error
     * @param int    $time
     */
    private function jump($msg, $url, $state, $time = 3)
    {
        echo <<<STR
        <!doctype html>
        <html>
        <head>
        <meta charset="utf-8">
        <title>提示页面</title>
        <style type="text/css">
        #img{text-align:center;margin-top:50px;margin-bottom:20px;}
        .info{text-align:center;font-size:24px;font-family:'微软雅黑';font-weight:bold;}
        #success{color:#060;}
        #error{color:#F00;}
        </style>
        </head>
        <body>
            <div id="img"><img src="./Public/img/{$state}.png" width="160" height="200" /></div>
            <div id='{$state}' class="info">{$msg}，<span id="time">{$time}</span>秒以后跳转</div>
            <script language="javascript">
                var sec = {$time}; // 用于保存剩余的秒数
                t = setInterval(change, 1000); // 每隔1秒，执行一次change()函数
                function change(){
                    sec -= 1; // 剩余的秒数减一
                    document.getElementById('time').innerHTML = sec; // 修改显示的剩余秒数
                    if (sec == 0) { // 剩余秒数为 0 时，跳转页面
                        clearInterval(t);
                        window.location.href = "{$url}";
                    }
                }
            </script>
        </body>
        </html>
STR;
        die;
    }
}