<?php
namespace Controller\Home;

class IndexController extends \Controller\Home\BaseController
{
    /**
     * 显示前台主页
     */
    public function indexAction()
    {
        $pageno = isset($_GET['pageno']) ? (int)$_GET['pageno'] : 1;
//        【文章列表 / 分页】
        $articleModel = new \Model\ArticleModel;
        $whereparam = "where display = 1";
        $datatotal = $articleModel->getCount($whereparam);

//        实例化分页
        $page = new \Libs\Page($pageno, 1, $datatotal);

//        显示数据
        $startno = $page->startno;
        $pagesize = $page->pagesize;
        $limitparam = array('startno' => $startno, 'pagesize' => $pagesize);
        $whereparam = "where a.display = 1 and c.display = 1";
        $articleList = $articleModel->getAll($limitparam, $whereparam);
        $this->smarty->assign('articleList', $articleList);

//        显示分页
        $this->smarty->assign('pageshow', $page->show());

//        【分类信息】
        $categoryModel = new \Model\CategoryModel;
        $whereparam = "where display = 1";
        $categoryList = $categoryModel->getAll($whereparam);
        \Libs\Tools::getTree($categoryList);
        $this->smarty->assign('categoryList', $GLOBALS['tree']);

        /**
         * 加载视图
         */
        $this->smarty->display('index.html');
    }
}