<?php
namespace Controller\Admin;

class ArticleController extends \Controller\Admin\BaseController
{
    /**
     * 显示文章信息
     */
    public function listAction()
    {
        $articleModel = new \Model\ArticleModel;
        $limit = array();
        if ($_SESSION['userinfo']['user_right'] == 2) {
            $where = array('uid' => $_SESSION['userinfo']['id']);
        } else {
            $where = array();
        }
        $articleList = $articleModel->getAll($limit, $where);
        $this->smarty->assign('articleList', $articleList);

        $categoryModel = new \Model\CategoryModel;
        $categoryList = $categoryModel->getAll();
        $this->smarty->assign('categoryList', $categoryList);

        $this->smarty->display('list.html');
    }

    /**
     * 删除文章
     */
    public function deleteAction()
    {
        $id = (int)$_GET['id'];
        $articleModel = new \Model\ArticleModel;
        if ($_SESSION['userinfo']['user_right'] > 1){
            $articleInfo = $articleModel->getOne($id);
            if (!$articleInfo || $articleInfo['uid'] != $_SESSION['userinfo']['id']){
                $this->error('非法操作', 'index.php?p=admin&c=index&a=index');
            }
        }


        $rs = $articleModel->delete($id);

        if ($rs) {
            $this->success('删除成功', 'index.php?p=admin&c=article&a=list');
        } else {
            $this->error('删除失败', 'index.php?p=admin&c=article&a=list');
        }
    }

    /**
     * 添加文章
     */
    public function addAction()
    {
        if (IS_POST) {
            $uid = (int)$_SESSION['userinfo']['id'];
            $cid = (int)$_POST['cid'];
            $title = $this->htmlpurifier->purify($_POST['title']);
            $image = empty($_FILES['image']['name']) ? '' : $_FILES['image'];
            $author = $this->htmlpurifier->purify($_POST['author']);
            $keywords = $this->htmlpurifier->purify($_POST['keywords']);
            $description = $this->htmlpurifier->purify($_POST['description']);
            $content = $this->htmlpurifier->purify($_POST['content']);
            $is_recommend = (int)$_POST['is_recommend'];
            $display = (int)$_POST['display'];

            if (empty($cid) || empty($title)){
                $this->error('分类/标题不能为空', 'index.php?p=admin&c=article&a=add');
            }

            if ($image){
                $uploadObj = new \Libs\Upload;
                $image = $uploadObj->image($image);
                if (!$image){
                    $this->error('缩略图上传失败，原因：'.$uploadObj->getMessage(), 'index.php?p=admin&c=article&a=add');
                }
            }

            $articleModel = new \Model\ArticleModel;
            $rs = $articleModel->add($uid, $cid, $title, $image, $author, $keywords, $description, $content, $is_recommend, $display);

            if ($rs) {
                $this->success('文章添加成功', 'index.php?p=admin&c=article&a=list');
            } else {
                $this->error('文章添加失败', 'index.php?p=admin&c=article&a=add');
            }
        } else {
            $categoryModel = new \Model\CategoryModel;
            $categoryList = $categoryModel->getAll();
            \Libs\Tools::getTree($categoryList);
            $this->smarty->assign('categoryList', $GLOBALS['tree']);
            $this->smarty->display('add.html');
        }
    }

    /**
     * 修改文章
     */
    public function updateAction()
    {
        if (IS_POST) {
            $id = (int)$_POST['id'];
            $cid = (int)$_POST['cid'];
            $title = $this->htmlpurifier->purify($_POST['title']);
            $image = empty($_FILES['image']['name']) ? '' : $_FILES['image'];
            $author = $this->htmlpurifier->purify($_POST['author']);
            $keywords = $this->htmlpurifier->purify($_POST['keywords']);
            $description = $this->htmlpurifier->purify($_POST['description']);
            $content = $this->htmlpurifier->purify($_POST['content']);
            $is_recommend = (int)$_POST['is_recommend'];
            $display = (int)$_POST['display'];

            if (empty($cid) || empty($title)){
                $this->error('分类/标题不能为空', 'index.php?p=admin&c=article&a=add');
            }

            if ($image){
                $uploadObj = new \Libs\Upload;
                $image = $uploadObj->image($image);
                if (!$image){
                    $this->error('缩略图上传失败，原因：'.$uploadObj->getMessage(), 'index.php?p=admin&c=article&a=add');
                }
            }

            $articleModel = new \Model\ArticleModel;
            $rs = $articleModel->update($id, $cid, $title, $image, $author, $keywords, $description, $content, $is_recommend, $display);

            if ($rs) {
                $this->success('文章修改成功', 'index.php?p=admin&c=article&a=list');
            } else {
                $this->error('文章修改失败', 'index.php?p=admin&c=article&a=update$id='.$id);
            }
        } else {
            $categoryModel = new \Model\CategoryModel;
            $categoryList = $categoryModel->getAll();
            \Libs\Tools::getTree($categoryList);
            $this->smarty->assign('categoryList', $GLOBALS['tree']);

            $articleModel = new \Model\ArticleModel;
            $id = (int)$_GET['id'];
            $articleInfo = $articleModel->getOne($id);
            $this->smarty->assign('articleInfo', $articleInfo);

            $this->smarty->display('update.html');
        }
    }
}