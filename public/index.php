<?php

namespace wei;
//PHP错误记录
require __DIR__ . '/../wei/error.php';
// 加载composer
require __DIR__ . '/../vendor/autoload.php';
// 加载URL处理文件
require __DIR__ . '/../wei/urlAnalyze.php';
require __DIR__ . '/../wei/weiLoader.php';
require __DIR__ . '/../wei/Factory.php';

//获取pathInfo参数 $info[0]为路由  $info[1]为 key=>value  uid/1=['user'=>1]
$info = urlAnalyze::analyze();
$pathArr = explode('/', substr($info[0], 1));
$param = $info[1];
$ObjStr = "\\{$pathArr[0]}\\{$pathArr[1]}\\controller\\{$pathArr[2]}";
$weiObj = Factory::get($ObjStr);
if(method_exists($weiObj, 'run')) {
    $weiObj->run($param, [], $pathArr);
}else{
    $weiObj->{$pathArr[3]}();
}


