<?php
namespace Controller\Admin;

/**
 * 首页控制器
 */
class IndexController extends \Controller\Admin\BaseController
{
    /**
     * 显示首页
     */
    public function indexAction()
    {
        $this->smarty->display('index.html');
    }

    /**
     * 显示欢迎页
     */
    public function welcomeAction()
    {
        $this->smarty->display('welcome.html');
    }
}