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


$path = __DIR__."/static/img/$menuId/$picId";
file_put_contents($path,$_POST['img']);

$a = ob_get_clean();
echo json_encode(['status'=>'ok','msg'=>'success']);die;

//{"status": "ok", "msg": "success"}