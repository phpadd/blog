<?php
namespace Controller\Home;

class LoginController extends \Core\Controller
{
    public function loginAction()
    {
        if (IS_POST) {
            $username = $this->htmlpurifier->purify($_POST['username']);
            $password = $this->htmlpurifier->purify($_POST['password']);

            $userModel = new \Model\UserModel;
            $rs = $userModel->getUserinfo($username, $password);

            if ($rs){
                $_SESSION['userinfo'] = $rs;

                if (!empty($_POST['chkRemember'])){
                    setcookie('userinfo_id', serialize($rs['id']), time()+3600*24*7);
                    setcookie('userinfo_data', md5($rs['id'].$rs['username'].$rs['password']), time()+3600*24*7);
                }
                $this->success('登录成功', 'index.php?p=home&c=index&a=index');
            } else {
                $this->error('登录失败', 'index.php?p=home&c=login&a=login');
            }

        } else {
            $this->smarty->display('login.html');
        }
    }
    /**
     * 安全退出
     */
    public function loginoutAction()
    {
        setcookie('userinfo_id','',time()-1);
        session_unset();
        session_destroy();
        $this->success('退出成功', 'index.php?p=home&c=index&a=index');
    }
}