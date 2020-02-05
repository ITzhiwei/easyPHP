<?php
// +----------------------------------------------------------------------
// | 路由设置
// +----------------------------------------------------------------------

return [
    // URL伪静态后缀，一维数组
    'urlHtmlSuffix'       => ['html', 'htm'],
    //路由自定义  例子： 'urlHtmlCustomize'      => ['indes/:id'=>'index/index/index2/index', 'uinfo'=>'index/index/user/info'],
    'urlHtmlCustomize'      => [],
    //自动路由多入口白名单；
    'door'                  => [
                                'index'=>__DIR__.'/../application/',
                                'app2'=>__DIR__.'/../application2/',
                               ],
];
