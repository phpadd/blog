<?php
namespace Libs;

/**
 * 上传文件类
 */
class Upload
{
    /**
     * 存放错误信息
     * @var array
     */
    private $message = array();

    /**
     * 允许上传图片格式
     * @var array
     */
    private $allowType = array('image/jpeg', 'image/png');

    /**
     * 获取错误信息
     * @return mixed|string
     */
    public function getMessage()
    {
        return isset($this->message[0]) ? $this->message[0] : '';
    }

    /**
     * 上传文件
     * @param  array $image
     * @return bool|string
     */
    public function image($image)
    {
        //1.判断是否通过post上传
        if (!$this->checkIsPost($image['tmp_name'])) return false;
        //2.判断是否有错误
        if (!$this->checkIsError($image['error'])) return false;
        //3.判断上传文件大小
        if (!$this->checkSize($image['size'])) return false;
        //4.判断类型
        if (!$this->checkType($image['type'])) return false;
        //5.获取真实类型判断
        if (!$this->checkRealType($image['tmp_name'])) return false;
        //6.上传文件
        return $this->moveFile($image['name'], $image['tmp_name']);
    }

    /**
     * 上传文件
     * @param string $name      上传文件名称
     * @param string $tmp_name 上传文件临时存放路径
     * @return bool|string
     */
    public function moveFile($name, $tmp_name)
    {
        $newFile = uniqid() . strrchr($name, '.');
        if (move_uploaded_file($tmp_name,  __UPLOAD__ . $newFile)) {
            $this->message = array();
           return $newFile;
        } else {
            $this->message[] = '上传失败';
           return false;
        }
    }

    /**
     * 判断真实类型
     * @param  string  $tmp_name  上传临时文件存放路径
     * @return bool
     */
    public function checkRealType($tmp_name)
    {
        $rs = finfo_open(FILEINFO_MIME_TYPE);
        $realType = finfo_file($rs, $tmp_name);
        if (!in_array($realType, $this->allowType)) {
            $this->message[] = '上传文件格式有误，只能是：'. implode(',', $this->allowType);
            return false;
        }
        return true;
    }

    /**
     * 判断类型
     * @param  string  $type  上传文件类型
     * @return bool
     */
    public function checkType($type)
    {
        if (!in_array($type, $this->allowType)) {
            $this->message[] = '上传文件格式有误，只能是：'. implode(',', $this->allowType);
            return false;
        }
        return true;
    }

    /**
     * 判断上传文件大小
     * @param  int  $size 上传文件真实大小
     * @return bool
     */
    public function checkSize($size)
    {
        if ($size > 1024*1024*2) {
            $this->message[] = '上传文件过大';
            return false;
        }
        return true;
    }

    /**
     * 判断是否有错误
     * @param  int   $error
     * @return bool
     */
    public function checkIsError($error)
    {
        if ($error != 0 ) {
            $this->message[] = '上传文件有瑕疵';
            return false;
        }
        return true;
    }

    /**
     * 判断是否通过post上传
     * @param  string $tmp_name 临时文件
     * @return bool
     */
    public function checkIsPost($tmp_name)
    {
        if (!is_uploaded_file($tmp_name)) {
            $this->message[] = '非法上传';
            return false;
        }
        return true;
    }
}
//
//$upload = new \Libs\Upload($_FILES['image']);
//if(!$upload) {
//    die('上传失败，原因：'. $upload->getMessage());
//}