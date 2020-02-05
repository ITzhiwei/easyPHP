<?php
// +----------------------------------------------------------------------
// | 路由设置
// +----------------------------------------------------------------------

return [
    // URL伪静态后缀，一维数组
    'urlHtmlSuffix'         => ['html', 'htm'],
    //路由自定义  例子： 'urlHtmlCustomize'      => [ '*' => ['indes/:id'=>'index/index/index2/index', 'uinfo'=>'index/index/user/info'] ],
    'urlHtmlCustomize'      => [
        //所有域名
        '*'=>[],
        //指定域名，如果指定域名与所有域名存在冲突，则自动以指定域名的为准（指定域名的设置优先）
        'www.wei.com'=>['indes/:id'=>'index/index/index']
    ],
    //自动路由一级目录入口白名单；
    'door'                  => [
                                'index'=>__DIR__.'/../application/',
                                'application2'=>__DIR__.'/../application2/',
                               ],
    //域名指定一目录入口
    'urlEntranceData'       => [
        //所有域名默认
        '*'=>'index',
        //指定入口
        'www.weia.com'=>'application2'
    ]

];
