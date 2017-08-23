<?php
namespace Controller\Admin;

/**
 * 用户控制器
 */
class UserController extends \Controller\Admin\BaseController
{
    /**
     * 显示用户信息列表
     */
    public function listAction()
    {
        $userModel = new \Model\UserModel;
        $userList = $userModel->getAll();
        $this->smarty->assign('userList', $userList);
        $this->smarty->display('list.html');
    }

    /**
     * 添加用户
     */
    public function addAction()
    {
        if (IS_POST){
            $ip = ip2long($_SERVER['REMOTE_ADDR']);
            $username = $this->htmlpurifier->purify($_POST['username']);
            $password = $_POST['password'];
            $password_check = $_POST['password_check'];
            $avatar = empty($_FILES['avatar']['name']) ? '' : $_FILES['avatar'];
            $user_right = (int)$_POST['user_right'];

            if (empty($username)){
                $this->error('用户名不能为空', 'index.php?p=admin&c=user&a=add');
            }

            if ($password !== $password_check){
                $this->error('两次输入的密码不一致', 'index.php?p=admin&c=user&a=add');
            }
            $password = empty($_POST['password'])? '':md5(addslashes($_POST['password']));
            if (empty($password)){
                $this->error('密码不能为空', 'index.php?p=admin&c=user&a=add');
            }

            $userModel = new \Model\UserModel;
            $userList = $userModel->getAll();
            foreach($userList as $user){
                if ($username == $user['username']){
                    $this->error('用户名已经存在', 'index.php?p=admin&c=user&a=add');
                }
            }

            if ($avatar){
                $uploadObj = new \Libs\Upload;
                $avatar = $uploadObj->image($avatar);
                if (!$avatar){
                    $this->error('头像上传失败，原因：'.$uploadObj->getMessage(), 'index.php?p=admin&c=user&a=add');
                }
            } else {
                $avatar = __FACE__;
            }

            $userModel = new \Model\UserModel;
            $rs = $userModel->add($username, $password, $avatar, $user_right, $ip);

            if ($rs) {
                $this->success('用户添加成功', 'index.php?p=admin&c=user&a=list');
            } else {
                $this->error('用户添加失败', 'index.php?p=admin&c=user&a=add');
            }

        }else{
            $this->smarty->display('add.html');
        }
    }

    /**
     * 删除用户
     */
    public function deleteAction()
    {
        $id = (int)$_GET['id'];
        if ($_SESSION['userinfo']['id'] == $id){
            $this->error('不能删除当前用户', 'index.php?p=admin&c=user&a=list');
        }

        $userModel = new \Model\UserModel;
        $rs = $userModel->delete($id);

        if ($rs) {
            $this->success('删除成功', 'index.php?p=admin&c=user&a=list');
        } else {
            $this->error('删除失败', 'index.php?p=admin&c=user&a=list');
        }
    }

    /**
     * 修改用户信息
     */
    public function updateAction()
    {
        if (IS_POST) {
            $id = (int)$_POST['id'];
            $username = $this->htmlpurifier->purify($_POST['username']);
            $ex_password = $this->htmlpurifier->purify($_POST['ex_password']);
            $password = $this->htmlpurifier->purify($_POST['password']);
            $password_check = $this->htmlpurifier->purify($_POST['password_check']);
            $avatar = empty($_FILES['avatar']['name']) ? '' : $_FILES['avatar'];
            $user_right = (int)$_POST['user_right'];

            if (MD5($ex_password) != $_SESSION['userinfo']['password']) {
                $this->error('原密码不正确', 'index.php?p=admin&c=user&a=update&id='.$id);
            }

            if (empty($username)){
            }

            if ($password !== $password_check){
                $this->error('两次输入的密码不一致', 'index.php?p=admin&c=user&a=add');
            }
            $password = empty($_POST['password'])? '':md5(addslashes($_POST['password']));
            if (empty($password)){
                $this->error('密码不能为空', 'index.php?p=admin&c=user&a=update&id='.$id);
            }

            $userModel = new \Model\UserModel;
            $userInfo = $userModel->getOne($id);
            $userList = $userModel->getAll();
            foreach($userList as $user){
                if ($username == $user['username'] && $username!=$userInfo['username']){
                    $this->error('用户名已经存在', 'index.php?p=admin&c=user&a=update&id='.$id);
                }
            }

            if ($avatar){
                $uploadObj = new \Libs\Upload;
                $avatar = $uploadObj->image($avatar);
                if (!$avatar){
                    $this->error('头像上传失败，原因：'.$uploadObj->getMessage(), 'index.php?p=admin&c=user&a=update&id='.$id);
                }
            } else {
                $avatar = $userInfo['avatar'];
            }

            $userModel = new \Model\UserModel;
            $rs = $userModel->update($id, $username, $password, $avatar, $user_right);

            if ($rs) {
                $_SESSION['userinfo']['username'] = $username;
                $_SESSION['userinfo']['avatar'] = $avatar;
                $this->success('修改成功', 'index.php?p=admin&c=user&a=list');
            } else {
                $this->error('修改失败', 'index.php?p=admin&c=user&a=update&id='.$id);
            }
        } else {
            if (empty($_GET['id'])) {
                $this->error('修改失败', 'index.php?p=admin&c=user&a=list');
            }

            $id = (int)$_GET['id'];
            $userModel = new \Model\UserModel;
            $userInfo = $userModel->getOne($id);
            $this->smarty->assign('userInfo', $userInfo);
            $this->smarty->display('update.html');
        }
    }
}