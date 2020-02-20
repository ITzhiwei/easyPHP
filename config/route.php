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
    //路径映射；自动路由一级目录入口白名单，并设置所指向的目录； 如 www.url.com/index/ 会找到  __DIR__.'/../application/' 一级目录进去
    'door'                  => [
                                'index'=>__DIR__.'/../application/',// door 的第一个键名只能是 index，不能更改；其他键名和键值都可以任意改，这里的键值是路径
                                'application2'=>__DIR__.'/../application2/',
                                'app3'=>__DIR__.'/../app3/',
                               ],
    //域名指定一目录入口 $value 对应 door 的 $key 得到 door的一级目录入口
    'urlEntranceData'       => [
        //所有域名默认入口是 index ； 对应的是 door 中的 index 所映射的目录入口
        //域名指定入口
        'www.weia.com'=>'application2'
    ],
     /*
      * 自定义一级目录入口
      * 若使用自定义入口，url的路由参数是4个，如非自定义是 index/user/info/id/1 自定义是 selectApp2/index/user/info/id/1
      * 第一个值是布尔值，为false时表示只针对某些域名，为 true 时表示所有域名都生效
      * 第2个值是入口（从 door 中映射目录）
      * 第3个值是数组，当第一个值是 false 才有效，表示哪些域名启用这额外的项目
      */
    'assignEntranceData'    => [
        //解释如：selectApp2：当遇到 www.xxx.com/selectApp2(或www.xxx.com/selectApp2/) 的url时触发检测
        'selectApp2'=>[false, 'application2', ['www.wei.com', 'www.weib.com', 'www.weic.com']],
        //所有域名在遇到 www.url.com/lipowei/ 开头的url时，会直接选定 app3 入口；
        'lipowei'=>[true, 'app3']
    ]

];
