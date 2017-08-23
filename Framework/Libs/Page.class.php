<?php
namespace Libs;

/**
 * Class Page  分页类
 * @package Libs
 */
class Page
{
    private $pageno;    //当前页
    private $pagesize;  //每页显示条数
    private $datatotal; //总条数

    private $startno;    //起始位置
    private $pagetotal;  //总页数
    private $prevno;     //上一页
    private $nextno;     //下一页

    /**
     * 当获取一个不存在的属性或者没有权限的属性时触发
     */
    public function __get($attrName)
    {
        return $this->$attrName;
    }

    /**
     * Page constructor.
     * @param int $pageno    当前页
     * @param int $pagesize  每页显示条数
     * @param int $datatotal 总页数
     */
    //当前页(必须)、每页显示条数(必须)、总条数(必须)、总页（末页）、上一页、下一页、起始位置
    public function __construct($pageno, $pagesize, $datatotal)
    {
        $this->initParam($pageno, $pagesize, $datatotal);
        $this->startno();
        $this->pagetotal();
        $this->prevno();
        $this->nextno();
    }

    /**
     * 上一页
     */
    public function prevno()
    {
        $this->prevno = $this->pageno > 1 ? $this->pageno - 1 : 1;
    }

    /**
     * 下一页
     */
    public function nextno()
    {
        $this->nextno = $this->pageno < $this->pagetotal ? $this->pageno + 1 : $this->pagetotal;
    }

    /**
     * 总页数
     */
    public function pagetotal()
    {
        $this->pagetotal = ceil($this->datatotal / $this->pagesize);
    }

    /**
     * 起始位置
     */
    public function startno()
    {
        $this->startno = ($this->pageno - 1) * $this->pagesize;
    }

    /**
     * 初始化
     * @param int  $pageno    当前页
     * @param int  $pagesize  每页显示条数
     * @param int  $datatotal 总条数
     */
    public function initParam($pageno, $pagesize, $datatotal)
    {
        $this->pageno = $pageno;
        $this->pagesize = $pagesize;
        $this->datatotal = $datatotal;
    }

    /**
     * 创建分页URL地址
     * @param   int   $pageno  页码
     * @param   array $param   where条件
     * @return string
     */
    public function createUrl($pageno, $param = array())
    {
        //index.php?p=平台名&c=控制器名&a=方法名
        $url = 'index.php?p='.PLATFORM_NAME.'&c='.CONTROLLER_NAME.'&a='.ACTION_NAME.'&pageno='.$pageno;
        foreach ($param as $k=>$v) {
            //test.php?pageno=1   &a=1  &b=2  &c=3
            $url .= "&$k=$v";
        }
        return $url;
    }

    /**
     * 显示分页
     * @return string
     */
    public function show($param = array())
    {
        $html = '';
        $html .= "<a href='".$this->createUrl(1, $param)."' >首页</a>";
        $html .= "<a href='".$this->createUrl($this->prevno, $param)."' >上一页</a>";
        $html .= "<a href='".$this->createUrl($this->nextno, $param)."' >下一页</a>";
        $html .= "<a href='".$this->createUrl($this->pagetotal, $param)."' >尾页</a>";
        return $html;
    }
}