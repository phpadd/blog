<?php
namespace Controller\Admin;

class CategoryController extends \Controller\Admin\BaseController
{
    /**
     * 显示分类信息
     */
    public function listAction()
    {
        $categoryModel = new \Model\CategoryModel();
        $category_list = $categoryModel->getAll();
        \Libs\Tools::getTree($category_list);
        $this->smarty->assign('category_list', $GLOBALS['tree']);
        $this->smarty->display('list.html');
    }

    /**
     * 添加分类
     */
    public function addAction()
    {
        if (IS_POST){
            $pid = (int)$_POST['pid'];
            $sort = (int)$_POST['sort'];
            $name = $this->htmlpurifier->purify($_POST['name']);
            if (!($name && $pid)){
                $this->error('分类信息不完整，添加失败', 'index.php?p=admin&c=category&a=add');
            }

            $categoryModel = new \Model\CategoryModel();
            if ($sort) {
                $rs = $categoryModel->insert($pid, $name ,$sort);
            } else {
                $rs = $categoryModel->insert($pid, $name);
            }

            if ($rs){
                $this->success('添加成功', 'index.php?p=admin&c=category&a=list');
            } else {
                $this->error('添加失败', 'index.php?p=admin&c=category&a=add');
            }
        } else {
            $categoryModel = new \Model\CategoryModel();
            $categoryList = $categoryModel->getAll();
            \Libs\Tools::getTree($categoryList);
            $this->smarty->assign('categoryList', $GLOBALS['tree']);
            $this->smarty->display('add.html');
        }
    }

    /**
     * 修改分类
     */
    public function updateAction()
    {
        if (IS_POST){
            $id = (int)$_POST['id'];
            $pid = (int)$_POST['pid'];
            $sort = (int)$_POST['sort'];
            $name = $this->htmlpurifier->purify($_POST['name']);
            $categoryModel = new \Model\CategoryModel();

            if ($pid == $id){
                $this->error('不能以分类本身为所属分类', 'index.php?p=admin&c=category&a=update&id='.$id);
            }

            $categoryList = $categoryModel->getAll();
            \Libs\Tools::getTree($categoryList, $id);
            if (!empty($GLOBALS['tree'])){
                foreach ($GLOBALS['tree'] as $son) {
                    if ($son['id'] ==$pid){
                        $this->error('不能以分类本身的子类为所属分类', 'index.php?p=admin&c=category&a=update&id='.$id);
                    }
                }
            }

            $rs = $categoryModel->update($id, $pid, $name, $sort);

            if ($rs) {
                $this->success('更改成功', 'index.php?p=admin&c=category&a=list');
            } else {
                $this->error('更改失败', 'index.php?p=admin&c=category&a=update&id='.$id);
            }
        } else {
            $categoryModel = new \Model\CategoryModel();
            $categoryList = $categoryModel->getAll();
            \Libs\Tools::getTree($categoryList);
            $this->smarty->assign('categoryList', $GLOBALS['tree']);

            $id = (int)$_GET['id'];
            $rs = $categoryModel->getOne($id);
            $this->smarty->assign('categoryInfo', $rs);

            $this->smarty->display('update.html');
        }
    }

    /**
     * 删除分类
     */
    public function deleteAction()
    {
        $id = (int)$_GET['id'];
        $categoryModel = new \Model\CategoryModel;

        if ($categoryModel->isSon($id)) {
            $this->error("删除失败，请先删除分类的子级", 'index.php?p=admin&c=category&a=list');
        }

        $articleModel = new \Model\ArticleModel();
        $rs = ($articleModel->deleteByCid($id)) && ($categoryModel->delete($id));

        if ($rs){
            $this->success('删除成功', 'index.php?p=admin&c=category&a=list');
        } else {
            $this->error('删除失败', 'index.php?p=admin&c=category&a=list');
        }
    }
}