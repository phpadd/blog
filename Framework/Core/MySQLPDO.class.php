<?php
namespace Core;

use PDO;
use PDOException;

//定义PDO单例模式数据库类
class MySQLPDO
{
    private $host;              //主机地址
    private $port;              //端口号
    private $dbname;            //数据库名称
    private $charset;           //字符编码
    private $user;              //数据库用户名
    private $pwd;               //数据库密码

    /**
     * 保存当前PDO对象
     * @var object
     */
    private $pdo;

    /**
     * 保存当前对象实例
     * @var object
     */
    private static $instance;

    /**
     * 禁实例化 和 初始化对象
     */
    private function __construct($param)
    {
        $this->initParam($param); //初始化参数
        $this->initPDO();       //创建PDO对象
    }

    /**
     * 初始化参数
     * @return [type] [description]
     */
    private function initParam($param)
    {
        $this->host = isset($param['host']) ? $param['host'] : $GLOBALS['configs']['database']['host'];
        $this->user = isset($param['user']) ? $param['user'] : $GLOBALS['configs']['database']['user'];
        $this->pwd = isset($param['pwd']) ? $param['pwd'] : $GLOBALS['configs']['database']['pwd'];
        $this->port = isset($param['port']) ? $param['port'] : $GLOBALS['configs']['database']['port'];
        $this->charset = isset($param['charset']) ? $param['charset'] : $GLOBALS['configs']['database']['charset'];
        $this->dbname = isset($param['dbname']) ? $param['dbname'] : $GLOBALS['configs']['database']['dbname'];
    }

    /**
     * 创建PDO对象
     * @return [type] [description]
     */
    private function initPDO()
    {
        try {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname.';charset='.$this->charset.';port='.$this->port;
            $this->pdo = new PDO($dsn, $this->user, $this->pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex) {
            $this->showException($ex);
        }
    }

    /*
     * 显示异常信息
     */
    private function showException($ex,$sql='')
    {
        if($sql!='')
            echo 'SQL语句执行失败<br>错误的SQL语句是：'.$sql,'<br>';
        echo '错误编号：'.$ex->getCode(),'<br>';
        echo '错误行号：'.$ex->getLine(),'<br>';
        echo '错误文件：'.$ex->getFile(),'<br>';
        echo '错误信息：'.$ex->getMessage(),'<br>';
        exit;
    }

    /**
     * 执行数据操作语句
     * @param  string $sql 执行操作SQL语句
     * @return int  成功-受影响的行数，失败-fasle（ps. SQL执行成功影响行数0）
     */
    public function exec($sql)
    {
        try{
            return $this->pdo->exec($sql);
        } catch (PDOException $ex) {
            $this->showException($ex);
        }
    }

    /**
     * 返回自增的ID
     * @return int
     */
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    /**
     * 获取所有数据
     * @param  string $sql  查询的SQL语句
     * @param  string $type 返回的数组类型
     * @return array
     */
    public function fetchAll($sql, $type = 'assoc')
    {
        try {
			//1.获取pdostatement对象
			$stmt = $this->pdo->query($sql);
			//2.获取所有数据
			return $stmt->fetchAll($this->switchDataType($type));
        }catch(PDOException $ex) {
            $this->showException($ex);
        }
    }

    /**
     * 获取一条数据
     * @param  string $sql  查询的SQL语句
     * @param  string $type 返回的数组类型
     * @return array
     */
    public function fetchOne($sql, $type = 'assoc')
    {
        try {
			//1.获取pdostatement对象
			$stmt = $this->pdo->query($sql);
			//2.获取一条数据
			return $stmt->fetch($this->switchDataType($type));
        }catch(PDOException $ex) {
            $this->showException($ex);
        }
    }

    /**
     * 切换返回的数据类型
     * @param  string $type 种类：assoc-关联，num-索引，obj-对象，both-关联和索引
     * @return string
     */
    private function switchDataType($type)
    {
        switch ($type) {
            case 'assoc':
                return PDO::FETCH_ASSOC;
                break;
            case 'num':
                return PDO::FETCH_NUM;
                break;
            case 'obj':
                return PDO::FETCH_OBJ;
                break;
            case 'both':
                return PDO::FETCH_BOTH;
                break;
            default:
                return PDO::FETCH_ASSOC;
        }
    }

    /**
     * 禁克隆
     */
    private function __clone() {}

    public static function getInstance($param = array())
    {
        //作用：instanceof检测指定对象是否指定类的实例
        //语法：对象 instanceof  类名
        if (!self::$instance instanceof self) {
            self::$instance = new self($param);
        }
        return self::$instance;
    }

    public function addQuote($data)
    {
        return $this->pdo->quote($data);
    }

}