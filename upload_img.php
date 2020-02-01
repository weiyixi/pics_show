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
move_uploaded_file($_FILES["img"]["tmp_name"],$path);
file_put_contents(file_get_contents($path),$path2);
$a = ob_get_clean();
echo json_encode(['status'=>'ok','msg'=>'success']);die;

//{"status": "ok", "msg": "success"}