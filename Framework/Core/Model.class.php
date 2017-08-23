<?php
namespace Core;

/**
 * 定义基础模型
 */
class Model
{
    /**
     * 用来保存pdo实例
     * @var object
     */
    protected $mypdo;

    /**
     *  使用构造函数初始化pdo
     */
    public function __construct()
    {
        $this->mypdo =  MySQLPDO::getInstance();
    }
}