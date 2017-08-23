<?php
namespace Libs;

/**
 * 验证码类
 */
class Captcha
{
    private $len;   //验证码长度
    private $font;  //字号大小 1,2,3,4,5
    private $width; //验证码图片宽度
    private $height;//验证码图片高度

    public function __construct($width=0, $height=0, $len=4, $font=5)
    {
        $this->initParam($width, $height, $len, $font);
    }

    /**
     * 初始化成员属性
     * @param int $width  验证码图片宽度
     * @param int $height 验证码图片高度
     * @param int $len    验证码长度
     * @param int $font   字号大小 1,2,3,4,5
     */
    private function initParam($width, $height, $len, $font)
    {
        $this->width = $width;
        $this->height = $height;
        $this->len = $len;
        $this->font = $font;
    }

    /**
     * 生成随机字符串
     * @return string
     */
    private function createCode()
    {
        $char_array = array_merge(range('a','z'),range('A','Z'),range(0,9));
        $index_array = array_rand($char_array,4);
        shuffle($index_array);
        $str='';
        foreach ($index_array as $index) {
            $str .= $char_array[$index];
        }
        $_SESSION['captcha'] = $str;
        return $str;
    }

    /**
     * 生成验证码
     */
    public function generalVerify()
    {
        //获取随机字符串
        $str =  $this->createCode();
        $img = imagecreate($this->width,$this->height);
        imagecolorallocate($img,255,0,0);                               //给图片分配背景色
        $x = (imagesx($img)-imagefontwidth($this->font)*strlen($str))/2;//起始位置x
        $y = (imagesy($img)-imagefontheight($this->font))/2;	        //起始位置y
        $color = imagecolorallocate($img,255,255,255);	                //验证码上字的颜色
        imagestring($img,$this->font,$x,$y,$str,$color);
		ob_start();
        ob_clean();                         //清空缓存
        header('content-type:image/jpeg');	//告知浏览器用jpeg格式解析
        imagejpeg($img);			        //将图片按jpeg格式显示
        imagedestroy($img);			        //销毁图片资源
    }

    /**
     * 检测验证码
     * @param $code
     * @return bool
     */
    public static function checkVerify($code)
    {
        return strtoupper($code) == strtoupper($_SESSION['captcha']);
    }
}
