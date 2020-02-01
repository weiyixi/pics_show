<?php
/**
 * Created by PhpStorm.
 * User: weiyixi
 * Date: 2020/2/1
 * Time: 6:59 PM
 */

//img: (binary)
$menuId = isset($_POST['menuId'])?$_POST['menuId']:'menu01';
$picId = isset($_POST['picId'])?$_POST['picId']:'mini_menu01_001.jpg';
$picId2  = isset($_POST['picId'])?$_POST['picId']:'menu01_001.jpg';

$path = __DIR__."/static/img/$menuId/$picId";

$path2 = __DIR__."/static/img/$menuId/$picId2";
// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
//move_uploaded_file($_FILES["img"]["tmp_name"],$path);

//$a = ob_get_clean();

if (!empty($_FILES)) {



    // 限制文件大小

    $file_size = $_FILES["file"]["size"];

    // 限制2M大小

    if ($file_size > 1024 * 1024 * 5) {

        $msg  = '文件大小超过限制';


    }



    // 限制文件上传类型

    $file_type = $_FILES["file"]["type"];

    $file_type_arr = ['image/jpg'];

    if (!in_array($file_type, $file_type_arr)) {

        $msg =  '上传文件类型错误';

    }



    // 文件上传到服务器临时文件夹之后的文件名

    $tem_name = $_FILES['img']['tmp_name'];


    // 文件重命名，这里自动生成一个不重复的名字，方便使用

    // 移动文件到指定目录下

    @ move_uploaded_file($tem_name, $path);

sleep(1);
    file_put_contents(file_get_contents($path),$path2);
$msg = 'success';

} else {
    $msg='error';
}
echo json_encode(['status'=>'ok','msg'=>$msg]);die;

//{"status": "ok", "msg": "success"}