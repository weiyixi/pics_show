<?php
/**
 * Created by PhpStorm.
 * User: weiyixi
 * Date: 2020/2/1
 * Time: 11:04 AM
 */
function http_get_data($url)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    ob_start();
    curl_exec($ch);
    $return_content = ob_get_contents();
    ob_end_clean();

    $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return $return_content;
}

for ($i=1;$i<=99;$i++) {
    $i=str_pad($i,2,"0",STR_PAD_LEFT);
    $file = "./static/img/menu$i";
    for ($j=1;;$j++) {
        $j = str_pad($j, 3, "0", STR_PAD_LEFT);

        $filename2 = "./static/img/menu$i/menu{$i}_{$j}.jpg";

        $url2 = "http://www.nanshijue.com/static/img/menu$i/menu{$i}_{$j}.jpg";


        $return_content2 = http_get_data($url2);

        if (strlen($return_content2) < 1000) {
            break;
        }
        file_put_contents($filename2, $return_content2); //写入文件
        echo $url2, "\r\n";
        echo strlen($return_content2) . $filename2, "\r\n";
    }
}