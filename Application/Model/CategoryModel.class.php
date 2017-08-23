<?php
namespace Model;

class CategoryModel extends \Core\Model
{
    /**
     * 根据分类ID，查找子级分类
     * @param int $id 分类ID
     * @return array
     */
    public function isSon($id)
    {
        $sql = "select * from category where pid = $id";
        return $this->mypdo->fetchAll($sql);
    }

    /**
     * 获得一条分类信息
     * @param int $id 分类ID
     * @return array
     */
    public function getOne($id)
    {
        $sql = "select * from category where id = '$id'";
        return $this->mypdo->fetchOne($sql);
    }

    /**
     * 获得所有分类信息
     * @return array
     */
    public function getAll($whereparam = '')
    {
        $whereparam = isset($whereparam) ? $whereparam : '';
        $sql = "select * from category $whereparam";
        return $this->mypdo->fetchAll($sql);
    }

    /**
     * 添加一个新的分类
     * @param int $pid 父级分类ID
     * @param string $name 名称
     * @param int $sort 权重
     * @return int
     */
    public function insert($pid, $name,$sort = 100)
    {
        $time = time();
        $sql = "insert into category values(NULL , '$pid', '$name' ,'$sort', $time, $time, DEFAULT )";
        return $this->mypdo->exec($sql);
    }

    /**
     * 删除分类
     * @param int $id 分类ID
     * @return int
     */
    public function delete($id)
    {
        $sql = "delete from category where id = $id";
        return $this->mypdo->exec($sql);
    }

    /**
     * 更新一条分类的信息
     * @param int $id 分类ID
     * @param int $pid 父级分类ID
     * @param string $name 名称
     * @param int $sort 权重
     * @return int
     */
    public function update($id, $pid, $name, $sort)
    {
        $time = time();
        $sql = "update category set pid = '$pid', name = '$name', sort = '$sort', updated_time = $time where id = '$id'";
        return $this->mypdo->exec($sql);
    }
}