<?php

namespace wei;
//PHP错误记录
register_shutdown_function(function(){
        $error = error_get_last();
        if($error !== null){
            $msg = $error['message'];
            $file = $error['file'].':'.$error['line'];
            $Logtime = date('Y-m-d H:i:s', time());
            $errorLog = "【{$Logtime}】".$msg."\r\n".$file;
            $fileName = substr($Logtime,0, 10);
            $myfile = fopen(__DIR__."/../log/php/$fileName.txt", "a");
            fwrite($myfile, $errorLog."\r\n\r\n");
            fclose($myfile);
        };
});
// 加载composer
require __DIR__ . '/../vendor/autoload.php';
// 加载URL处理文件
require __DIR__ . '/../wei/urlAnalyze.php';
require __DIR__ . '/../wei/weiLoader.php';



//获取pathInfo参数 $info[0]为路由  $info[1]为 key=>value  uid/1=['user'=>1]
$info = urlAnalyze::analyze();
$pathArr = explode('/', substr($info[0], 1));

$param = $info[1];
$ObjStr = "\\{$pathArr[0]}\\{$pathArr[1]}\\controller\\{$pathArr[2]}";

$weiObj = new $ObjStr($param);
$weiObj->{$pathArr[3]}();
$weiObj->userAccessEndExecute();



