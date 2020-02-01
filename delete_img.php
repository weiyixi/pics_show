<?php
/**
 * Created by PhpStorm.
 * User: weiyixi
 * Date: 2020/2/1
 * Time: 6:59 PM
 */

$menuId = isset($_GET['menuId'])?$_GET['menuId']:'menu01';
$picId = isset($_GET['picId'])?$_GET['picId']:'mini_menu01_001.jpg';
$path = __DIR__."/static/img/$menuId/$picId";
unlink($path);

$a = ob_get_clean();
echo json_encode(['status'=>'ok','msg'=>'success']);die;

//{"status": "ok", "msg": "success"}