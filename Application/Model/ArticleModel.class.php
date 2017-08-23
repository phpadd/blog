<?php
namespace Model;

class ArticleModel extends \Core\Model
{
    /**
     * 获得一条文章信息
     * @param int $id 文章ID
     * @return array
     */
    public function getOne($id)
    {
        $sql = "select a.*,c.name categoryName from article a left join category c on a.cid=c.id where a.id=$id";
        return $this->mypdo->fetchOne($sql);
    }

    /**
     * 获得数据条数
     * @return mixed
     */
    public function getCount($where = array())
    {
        $whereStr = isset($where['cid']) ? " where cid in (".$where['cid'].") " : '';
        $whereStr = isset($where['keyword']) ? " where title like '%".$where['keyword']."%' " : '';

        $sql = "select count(*) from article " . $whereStr;
        $rs = $this->mypdo->fetchOne($sql);
        return $rs['count(*)'];
    }

    /**
     * 获得所有文章信息
     * @return array
     */
    public function getAll($limit = array(),$where = array())
    {
        $limitStr = isset($limit['startno']) ? "limit {$limit['startno']},{$limit['pagesize']}" : '';
        $whereStr = "where 1=1 ";
        $whereStr .= isset($where['display']) ? ' and display = 1 ' : '';
        $whereStr .= isset($where['cid']) ? " and a.cid in ({$where['cid']}) " : '';
        $whereStr .= isset($where['uid']) ? " and a.uid = {$where['uid']} " : '';
        $whereStr .= isset($where['keyword']) ? " and a.title like '%{$where['keyword']}%' " : '';

        $sql = "select a.*,c.name as categoryName from article a left join category c on a.cid=c.id 
        $whereStr 
        order by updated_time desc 
        $limitStr";

        return $this->mypdo->fetchAll($sql);
    }

    /**
     * 删除一条文章信息
     * @param int $id 文章ID
     * @return int
     */
    public function delete($id)
    {
        $sql = "select image from article where id=$id";
        $images = array();
        $images[] = $this->mypdo->fetchOne($sql);
        $this->deleteImg($images);

        $sql = "delete from article where id = $id";
        return $this->mypdo->exec($sql);
    }

    /**
     * 根据分类ID，批量删除文章
     * @param int $cid 分类ID
     * @return int
     */
    public function deleteByCid($cid)
    {
        return ($this->deleteImgByCid($cid) && $this->deleteArticleByCid($cid));
    }

    /**
     * 根据传来的cid，判断分类下的文章是否有缩略图，并删除
     * @param int $cid 分类ID
     * @return bool
     */
    public function deleteImgByCid($cid)
    {
        $sql = "select image from article where cid = $cid";
        $rs = $this->mypdo->fetchAll($sql);
        if ($rs && $rs[0]['image']){
            $sql = "select image from article where cid = $cid";
            $images = $this->mypdo->fetchAll($sql);
            return $this->deleteImg($images);
        } else {
            return true;
        }
    }

    /**
     * 根据传来的cid，判断是否分类下是否有文章，并删除
     * @param int $cid 分类ID
     * @return bool|int
     */
    public function deleteArticleByCid($cid)
    {
        $sql = "select id from article where cid = $cid";
        $rs = $this->mypdo->fetchAll($sql);
        if ($rs){
            $sql = "delete from article where cid = $cid";
            return $this->mypdo->exec($sql);
        } else {
            return true;
        }
    }

    /**
     * 批量删除图片文件
     * @param array $images 待删除的图片文件
     */
    public function deleteImg($images)
    {
        if (!isset($images)){
            foreach ($images as $image) {
                $tmp = __UPLOAD__.$image['image'];
                if (file_exists($tmp)) unlink($tmp);
            }
        }
    }

    /**
     * 添加一篇新的文章
     * @param int $uid 用户ID
     * @param int $cid 分类ID
     * @param string $title 名称
     * @param string $image 缩略图名称
     * @param string $author 作者
     * @param string $keywords 关键词
     * @param string $description 描述
     * @param string $content 内容
     * @param int $is_recommend 是否推荐：0-默认不推荐，1-推荐
     * @param int $display 是否显示：0-隐藏，1-默认显示
     * @return int
     */
    public function add($uid, $cid, $title, $image, $author, $keywords, $description, $content, $is_recommend, $display)
    {
        $time = time();
        if ($image){
            $sql = "insert into article
                (uid, cid, title, image, author, keywords, description, content, is_recommend, display, created_time, updated_time)
                values
                ($uid, $cid, '$title', '$image', '$author', '$keywords', '$description', '$content', $is_recommend, $display, $time, $time)";
        } else {
            $sql = "insert into article
                (uid, cid, title, author, keywords, description, content, is_recommend, display, created_time, updated_time)
                values
                ($uid, $cid, '$title', '$author', '$keywords', '$description', '$content', $is_recommend, $display, $time, $time)";
        }
        return $this->mypdo->exec($sql);
    }

    /**
     * 更新一条文章信息
     * @param int $id 文章ID
     * @param int $cid 分类ID
     * @param string $title 名称
     * @param string $image 缩略图名称
     * @param string $author 作者
     * @param string $keywords 关键词
     * @param string $description 描述
     * @param string $content 内容
     * @param int $is_recommend 是否推荐：0-默认不推荐，1-推荐
     * @param int $display 是否显示：0-隐藏，1-默认显示
     * @return int
     */
    public function update($id, $cid, $title, $image, $author, $keywords, $description, $content, $is_recommend, $display)
    {
        $time = time();
        if ($image){
            $sql = "update article set cid=$cid,title='$title', image='$image', author='$author', keywords='$keywords', description='$description', content='$content', is_recommend=$is_recommend, display=$display, updated_time=$time where id = $id";
        } else {
            $sql = "update article set cid=$cid,title='$title', author='$author', keywords='$keywords', description='$description', content='$content', is_recommend=$is_recommend, display=$display, updated_time=$time where id = $id";
        }
        return $this->mypdo->exec($sql);
    }

    public function updateComment($id)
    {
        $sql = "update article set comment_count = comment_count + 1 where id = $id";
        return $this->mypdo->exec($sql);
    }

    public function updateRead($id)
    {
        $sql = "update article set read_count = read_count + 1 where id = $id";
        return $this->mypdo->exec($sql);
    }
}