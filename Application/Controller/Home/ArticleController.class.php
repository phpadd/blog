<?php
namespace Controller\Home;

/**
 * Class ArticleController 文章控制器
 * @package Controller\Home
 */
class ArticleController extends \Controller\Home\BaseController
{
    /**
     * 显示文章列表
     */
    public function listAction()
    {
        $cid = isset($_GET['cid']) ? $_GET['cid'] : 0;
        if (!$cid) $this->error('非法访问', 'index.php?p=home&c=index&a=index');

       // 【分类信息】
        $categoryModel = new \Model\CategoryModel;
        $categoryList = $categoryModel->getAll();
        \Libs\Tools::getTree($categoryList, $cid);

        $cids = array();
        $cids[] = $cid;
        if (!empty($GLOBALS['tree'])){
            foreach($GLOBALS['tree'] as $v){
                $cids[] = $v['id'];
            }
        }
        $cidStr = implode(',', $cids);

        \Libs\Tools::getTree($categoryList);
        $this->smarty->assign('categoryList', $GLOBALS['tree']);

       // 【文章信息】
        $pageno = isset($_GET['pageno']) ? (int)$_GET['pageno'] : 1;
        $articleModel = new \Model\ArticleModel;
        $datatotal = $articleModel->getCount(array('cid'=>$cidStr));
       // 创建分页模型对象
        $page = new \Libs\Page($pageno, 2, $datatotal);

       // 查询文章数据
        $limit = array('startno' => $page->startno, 'pagesize' => $page->pagesize);
        $where = array('cid'=>$cidStr);
        $articleList = $articleModel->getAll($limit, $where);
        $this->smarty->assign('articleList', $articleList);
       // 输出分页页码
        $pageshow = $page->show(array('cid'=>$cid));
        $this->smarty->assign('pageshow', $pageshow);

        $this->smarty->display('list.html');
    }

    /**
     * 显示文章详情
     */
    public function detailAction()
    {
       // 【分类信息】
        $categoryModel = new \Model\CategoryModel;
        $categoryList = $categoryModel->getAll();
        \Libs\Tools::getTree($categoryList);
        $this->smarty->assign('categoryList', $GLOBALS['tree']);

       // 【文章信息】
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if (!$id) $this->error('非法访问', 'index.php?p=home&c=index&a=index');
        $articleModel = new \Model\ArticleModel;
        $articleInfo = $articleModel->getOne($id);
        $this->smarty->assign('articleInfo', $articleInfo);

        //【评论信息】
        $commentModel = new \Model\CommentModel;
        $commentList = $commentModel->getAll($id);
        $GLOBALS['tree'] = array();
        \Libs\Tools::getTree($commentList);
        $this->smarty->assign('commentList', $GLOBALS['tree']);

        $articleModel->updateRead($id);

        $this->smarty->display('detail.html');
    }

    public function searchAction()
    {
        // 【分类信息】
        $categoryModel = new \Model\CategoryModel;
        $categoryList = $categoryModel->getAll();
        \Libs\Tools::getTree($categoryList);
        $this->smarty->assign('categoryList', $GLOBALS['tree']);

        // 【文章信息】
        $pageno = isset($_GET['pageno']) ? (int)$_GET['pageno'] : 1;
        $keyword = $this->htmlpurifier->purify($_GET['keyword']);
        $articleModel = new \Model\ArticleModel;
        $where = array('keyword'=>$keyword);
        $datatotal = $articleModel->getCount($where);
        // 创建分页模型对象
        $page = new \Libs\Page($pageno, 2, $datatotal);

        // 查询文章数据
        $limit = array('startno' => $page->startno, 'pagesize' => $page->pagesize);
        $articleList = $articleModel->getAll($limit, $where);
        $this->smarty->assign('articleList', $articleList);
        // 输出分页页码
        $pageshow = $page->show(array('keyword' => $keyword));
        $this->smarty->assign('pageshow', $pageshow);

        $this->smarty->assign('span', '<span style="color:#f00;">'.$keyword.'</span>');

        $this->smarty->display('search.html');
    }
}