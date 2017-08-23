<?php
namespace Libs;

class Tools
{
    /**
     * 获取分类树
     * @param array $data  所有数据分类数据
     * @param int   $pid   父级ID（pid=0则顶级分类）
     * @param int  $level  层级（level=0则一级，level=1则二级）
     */
    public static function getTree($data, $pid = 0, $level = 0)
    {
        //1.循环数据
        foreach ($data as $arr) {
            //2.默认顶级就进去（脚下留心：两个等号）
            if ($arr['pid'] == $pid) {
                //3.层级level=0则是顶级（一级分类）
                $arr['level'] = $level;
                //4.将当前分类数据，存放到超全局变量中
                $GLOBALS['tree'][] = $arr;
                //5.将当前分类的子级数据，进行递归；目的将当前分类数据追加其后面
                self::getTree($data, $arr['id'], $level+1);
            }
        }
    }

    /**
     * 检测是否是邮箱
     * @param string $email 邮箱
     */
    public static function isEmail($email)
    {

    }

    /**
     * 检测是否是手机号码
     * @param int $tel 手机号码
     */
    public static function isTel($tel)
    {

    }
}