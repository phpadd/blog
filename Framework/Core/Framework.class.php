<?php
// 定义系统常量
define("DS", DIRECTORY_SEPARATOR);       //目录分隔符（Linux兼容处理）
define("ROOT_PATH", getcwd() . DS);                //定义项目根目录
define("APP_PATH", ROOT_PATH . 'Application' . DS); //定义应用目录
define("FRAMEWORK_PATH", ROOT_PATH . 'Framework' . DS); //定义框架目录

define("CORE_PATH", FRAMEWORK_PATH . 'Core' . DS);      //定义框架核心文件目录
define("LIB_PATH", FRAMEWORK_PATH . 'Libs' . DS);    	//定义扩展类库目录

define("CONTROLLER_PATH", APP_PATH . 'Controller' . DS);   //定义控制器目录
define("MODEL_PATH", APP_PATH . 'Model' . DS);             //定义控制器目录
define("CONFIG_PATH", APP_PATH . 'Config' . DS);            //定义配置文件目录
define("VIEW_PATH", APP_PATH . 'View' . DS);             	//定义视图目录

// 定义当前请求的系统常量
define('REQUEST_METHOD',$_SERVER['REQUEST_METHOD']);
define('IS_GET',        REQUEST_METHOD == 'GET' ? true : false);
define('IS_POST',       REQUEST_METHOD == 'POST' ? true : false);

class Framework
{
    /**
     * run方法，初始化框架
     */
    public static function run()
    {
        self::initConfig(); //初始化框架配置文件信息
        self::initConst();   //初始化平台常量信息
        self::initSmarty();  //初始化引入Smarty
        self::initHtmlpurifier(); //初始化Htmlpurifier
        self::autoload();   //注册自动函数
        self::dispatch();   //分配路由
    }

    /**
     * 初始化引入Smarty
     */
    public static function initSmarty()
    {
        require LIB_PATH . 'Smarty' . DS . 'Smarty.class.php';
    }

    /**
     * 初始化引入Htmlpurifier
     */
    public static function initHtmlpurifier()
    {
        require LIB_PATH . 'Htmlpurifier' . DS . 'HTMLPurifier.includes.php';
    }

    /**
     * 初始化平台常量信息
     */
    public static function initConst()
    {
        //定义平台名称
        $platformName = isset($_GET['p']) ? ucfirst(strtolower($_GET['p'])) : ucfirst(strtolower($GLOBALS['configs']['web']['platform']));
        define("PLATFORM_NAME", $platformName);
        //定义当前控制器名
        $controllerName = isset($_GET['c']) ? ucfirst(strtolower($_GET['c'])) : ucfirst(strtolower($GLOBALS['configs']['web']['controller']));
        define("CONTROLLER_NAME", $controllerName);
        //定义当前方法名
        $actionName = isset($_GET['a']) ? strtolower($_GET['a']) : strtolower($GLOBALS['configs']['web']['action']);
        define("ACTION_NAME", $actionName);
    }

    /**
     * 初始化框架配置文件信息
     */
    public static function initConfig()
    {
        $GLOBALS['configs'] = require CONFIG_PATH . 'Config.php';
        define('__PUBLIC__', $GLOBALS['configs']['__PUBLIC__']);
        define('__UPLOAD__', $GLOBALS['configs']['__UPLOAD__']);
        define('__FACE__', $GLOBALS['configs']['__FACE__']);
    }

    /**
     * 注册自动函数
     */
    public static function autoload()
    {
        spl_autoload_register('self::autoloadClass');
    }

    /**
     * 自动加载
     * @param  string $className 命名空间名称和类名
     */
    public static function autoloadClass($className)
    {
        $name = basename($className);
        $type = basename(dirname($className));
        if ($type == 'Core' || $type == 'Libs') {
            //require "./Framework/$type/$name.class.php";
            require  FRAMEWORK_PATH . $type . DS . "$name.class.php";
        } else if ($type == 'Model') {
            //require "./Application/Model/$name.class.php";
            require MODEL_PATH . "$name.class.php";
        } else {
            //$platformName = isset($_GET['p']) ? ucfirst(strtolower($_GET['p'])) : "Admin";
            //require "./Application/Controller/$platformName/$name.class.php";
            require CONTROLLER_PATH . PLATFORM_NAME . DS ."$name.class.php";
        }
    }

    /**
     * 分配路由
     */
    public static function dispatch()
    {
        $controller = "\\Controller\\".PLATFORM_NAME."\\".CONTROLLER_NAME."Controller";
        $action = ACTION_NAME . 'Action';
        $obj = new $controller;
        $obj->$action();
    }
}