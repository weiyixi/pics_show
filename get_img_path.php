<?php
/**
 * Created by PhpStorm.
 * User: weiyixi
 * Date: 2020/2/1
 * Time: 6:59 PM
 */

$menuId = isset($_GET['menuId'])?$_GET['menuId']:'menu01';
$path = __DIR__."/static/img/$menuId";

$file=$path;
// 扫描$con目录下的所有文件
$filename = scandir($file);
// 定义一个数组接收文件名
$conname = array();
foreach($filename as $k=>$v){
    // 跳过两个特殊目录   continue跳出循环
    if($v=="." || $v==".."){continue;}
    //截取文件名，我只需要文件名不需要后缀;然后存入数组。如果你是需要后缀直接$v即可strpos($v,".")
    $conname[] = substr(substr($v,0,strpos($v,".")),strrpos($v,'_')+1);
}
$data = [];
var_dump($conname);
foreach ($conname as $item){
    if(strlen($item)<4){
        continue;
    }
    $data[]=['picId'=>$menuId.'_'.$item.'.jpg','size'=>'1500*1000'];
    $data[]=['picId'=>'mini_'.$menuId.'_'.$item.'.jpg','size'=>'225*150'];
}
$a = ob_get_clean();
echo json_encode(['status'=>'ok','msg'=>'success','data'=>$data]);die;
/**
{
"status":"ok",
"msg":"success",
"data":[
{
"picId":"menu01_028.jpg",
"size":"1500*1000"
},
{
"picId":"menu01_045.jpg",
"size":"1500*1000"
},
{
"picId":"mini_menu01_009.jpg",
"size":"225*150"
},
{
"picId":"mini_menu01_043.jpg",
"size":"150*100"
},
{
"picId":"mini_menu01_026.jpg",
"size":"225*150"
},
{
"picId":"menu01_046.jpg",
"size":"1500*834"
},
{
"picId":"mini_menu01_014.jpg",
"size":"225*150"
}
]
}
 */