<?php
// +----------------------------------------------------------------------
// | 路由设置
// +----------------------------------------------------------------------

return [
    // URL伪静态后缀，一维数组
    'url_html_suffix'       => ['html', 'htm'],
    //自动路由多入口白名单；
    'door'                  => [
                                'index'=>__DIR__.'/../application/',
                                'app2'=>__DIR__.'/../application2/',
                               ],
];
