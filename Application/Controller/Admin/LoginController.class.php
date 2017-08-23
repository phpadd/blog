<?php
namespace Controller\Admin;

class LoginController extends \Core\Controller
{
    /**
     * 用户登录
     */
    public function loginAction()
    {
        if (!empty($_SESSION['userinfo'])){
            $this->error('请勿重复登录', 'index.php?p=admin&c=index&a=index');
            die;
        }

        if (IS_POST){
            $username = $this->htmlpurifier->purify($_POST['username']);
            $password = $this->htmlpurifier->purify($_POST['password']);
            // 根据验证码类型的不同进行不同的判断
            $captcha = (int)$_POST['captcha'];
            // 1/3 Captcha.class.php 验证码
            // if (!$captcha){
            //     $this->error('请输入验证码', 'index.php?p=admin&c=login&a=login');
            // }
            // elseif(!\Libs\Captcha\Captcha::checkVerify($captcha)){
            //    $this->error('请输入验证码', 'index.php?p=admin&c=login&a=login');
            // }

            // 2/3 code_math.php 验证码
            if (!$captcha){
                $this->error('请输入验证码', 'index.php?p=admin&c=login&a=login');
            }
            elseif($captcha != $_SESSION['helloweba_math']){
                $this->error('验证码不正确', 'index.php?p=admin&c=login&a=login');
            }

            if (empty($username) || empty($password)){
                $this->error('请输入用户名/密码', 'index.php?p=admin&c=login&a=login');
            }

            // 3/3 code_zh.php 验证码
            // $helloweb = iconv('gbk','utf-8',$_SESSION['helloweba_zh']);
            //  if (!$captcha){
            //      $this->error('请输入验证码', 'index.php?p=admin&c=login&a=login');
            //  }
            //  elseif($captcha != $helloweb){
            //     $this->error('请输入验证码', 'index.php?p=admin&c=login&a=login');
            // }

            $loginModel = new \Model\UserModel;
            $rs = $loginModel->getUserInfo($username, $password);
            if ($rs){
                $_SESSION['userinfo'] = $rs;
                $id = $_SESSION['userinfo']['id'];
                $login_time = $_SERVER['REQUEST_TIME'];
                $login_ip = ip2long($_SERVER['REMOTE_ADDR']);
                $loginModel->updateUserInfo($id, $login_time, $login_ip);
                $this->success('登录成功', 'index.php?p=admin&c=index&a=index');
            } else {
                $this->error('登录失败', 'index.php?p=admin&c=login&a=login');
            }
        } else {
            $this->smarty->display('login.html');
        }
    }

    /**
     * 获得验证码图片
     */
    public function captchaAction()
    {
        $captchaObj = new \Libs\Captcha(83,33);
        $captchaObj->generalVerify();
    }

    /**
     * 安全退出
     */
    public function loginoutAction()
    {
        setcookie('userinfo_id','',time()-1);
        session_unset();
        session_destroy();
        $this->success('退出成功', 'index.php?p=admin&c=login&a=login');
    }
}