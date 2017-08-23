<?php
namespace Controller\Home;

class BaseController extends \Core\Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['userinfo']) && !empty($_COOKIE['userinfo_id'])){
            $uid = unserialize($_COOKIE['userinfo_id']);
            $userModel = new \Model\UserModel;
            $userInfo = $userModel->getOne($uid);
            if ($userInfo && $_COOKIE['userinfo_data'] == md5($userInfo['id'].$userInfo['username'].$userInfo['password'])){
                $_SESSION['userinfo'] = $userInfo;
            }
        }
    }
}