<?php
namespace Model;

class UserModel extends \Core\Model
{
    /**
     * 获得所有用户信息
     * @return array
     */
    public function getAll()
    {
        $sql = "select * from user order by user_right";
        return $this->mypdo->fetchAll($sql);
    }

    /**
     * 获得一条用户信息
     * @param int $id 用户ID
     * @return array
     */
    public function getOne($id)
    {
        $sql = "select * from user where id = $id";
        return $this->mypdo->fetchOne($sql);
    }

    /**
     * 添加用户
     * @param string $username 用户名
     * @param string $password 密码
     * @param string $avatar 头像
     * @param int $user_right 权限级别
     * @param int $ip 用户IP
     * @return int
     */
    public function add($username, $password, $avatar, $user_right, $ip)
    {
        $time = time();
        $sql = "insert into user values(null, '$username', '$password', '$avatar', default, $time, $ip, $user_right, default, $time, $time)";
        return $this->mypdo->exec($sql);
    }

    /**
     * 删除用户
     * @param int $id 用户ID
     * @return int
     */
    public function delete($id)
    {
        $sql = "delete from user where id = $id";
        return $this->mypdo->exec($sql);
    }

    /**
     * 更新用户
     * @param int $id 用户ID
     * @param string $username 用户名
     * @param string $password 密码
     * @param string $avatar 头像
     * @param int $user_right 权限级别
     */
    public function update($id, $username, $password, $avatar, $user_right)
    {
        $time=time();
        $sql = "update user set username='$username', password='$password', avatar='$avatar', user_right=$user_right, updated_time=$time where id=$id";
        return $this->mypdo->exec($sql);
    }
    /**
     * 获得用户信息
     * @param string $username 用户名
     * @param string $password 密码
     * @return array
     */
    public function getUserInfo($username, $password)
    {
        $username = $this->mypdo->addQuote($username);
        $password = md5($password);
        $sql = "select * from user where username = $username and password = '$password'";
        return $this->mypdo->fetchOne($sql);
    }

    /**
     * 更新用户信息
     * @param int $id 用户ID
     * @param int $login_time 本次登录时间
     * @param int $login_ip 本次登录IP
     */
    public function updateUserInfo($id, $login_time, $login_ip)
    {
        $time = time();
        $sql = "update user set login_count = login_count + 1, login_time = $login_time, login_ip = $login_ip,updated_time=$time where id = $id";
        $this->mypdo->exec($sql);
    }
}