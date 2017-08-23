<?php
namespace Controller\Admin;

class BaseController extends \Core\Controller
{
    /**
     * 防止翻墙
     * BaseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['userinfo'])){
            $this->error('请登录后再操作', 'index.php?p=admin&c=login&a=login');
        }
    }
}