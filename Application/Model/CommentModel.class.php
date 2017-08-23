<?php
namespace Model;

class CommentModel extends \Core\Model
{
    public function add($pid, $uid, $aid, $content)
    {
        $time = time();
        $sql = "insert into comment
        (pid, uid, aid, content, created_time, updated_time)
        VALUES 
        ($pid, $uid, $aid, '$content', $time, $time)
        ";
        return $this->mypdo->exec($sql);
    }

    public function getAll($aid)
    {
        $sql = "select c.*,u.username,u.avatar from comment c left join user u on c.uid = u.id where c.aid = $aid";
        return $this->mypdo->fetchAll($sql);
    }
}