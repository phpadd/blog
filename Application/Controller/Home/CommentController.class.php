<?php
namespace Controller\Home;

class CommentController extends \Controller\Home\BaseController
{
    public function addAction()
    {
        if (IS_POST) {
            $uid = $_SESSION['userinfo']['id'];
            if (!$uid) $this->error('请登录后再发表评论', 'index.php?p=home&c=login&a=login');

            $pid = (int)$_POST['pid'];
            $aid = (int)$_POST['aid'];
            $content = $this->htmlpurifier->purify($_POST['content']);

            $commentModel = new \Model\CommentModel;
            $rs = $commentModel->add($pid, $uid, $aid, $content);

            if ($rs){
                $articleModel = new \Model\ArticleModel;
                $articleModel->updateComment($aid);
                $this->success('评论发布成功', 'index.php?p=home&c=article&a=detail&id='.$aid);
            } else {
                $this->error('评论发布失败', 'index.php?p=home&c=article&a=detail&id='.$aid);
            }

        }
    }
}