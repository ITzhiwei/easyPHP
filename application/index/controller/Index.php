<?php
namespace index\index\controller;
use mjxAPP\doukuaitui\controller\userInfo;
use wei\controller;
use tcwei\Db\Db;
use wei\Factory;
use tcwei\configClass\Config;
use extend\Test;
use tcwei\smallTools\Page;

class Index extends controller{

    public function index(/*Index3 $index3, Test $Test*/){

        var_dump('Hello World!');
/*
         //控制反转模式
        $index3->hi();
        //$Test = Factory::get('extend\Test');
        $Test->index();
        //smg()里面自动注入了 index\index\controller\Index2
        $Test->smg();
        */
        /*
        echo '<h2>使用扩展库</h2>';
        $Test = Factory::get(Test::class);
        $Test->index();

        echo '<br/><hr/><h2>打印pathInfo参数</h2>';
        var_dump($this->param);

        //分页
        echo '<br/><hr/><h2>分页</h2>';
        $pageClass = new Page();
        $totle = 1000;
        $pageHtml = $pageClass->getPageHtml($totle, 10, 7, true, true, true, true, true);
        echo $pageHtml;
        // 调用其他控制器示例  Factory 第一个参数是控制器地址，第2个参数是单列管理中的别名，后面的参数是传入第一个参数的参数（即 ...index2 控制器的参数）
        echo '<br/><hr/><h2>在 Index 控制器内访问其他控制器</h2>';
        */
        $Index2 = Factory::get('index\index\controller\Index2');

        /** 此种方法执行可模拟 url 访问执行并自动依赖注入
        //该控制器的调用不执行前置钩子，默认为 true
        $Index2->runHookBefore = false;
        //该控制器的调用不执行后置钩子，默认为 true
        $Index2->runHookAfter = false;
        $Index2->fucName = 'hello';
        //如果存在fucArr，将用户请求结束后需要执行的内容交出来执行,然后必须重置为[]
        if(!empty($Index2->fucArr)) {
            foreach ($Index2->fucArr as $value) {
                $this->fucArr[] = $value;
            }
            //重置为[]
            $Index2->fucArr = [];
        }
        $Index2->run();
        **/

        /**
         * 也可以直接访问，但是这样只能自动依赖注入  Index2 的构造函数，其他方法需要自行注入依赖；同时该种方法不会执行默认前后置钩子
         * 一般情况下这样使用更加简单，可以在构造函数里面进行自动依赖注入管理
         */
        $Index2->hello();


        /*
        echo '<br/><hr/><h2>视图文件使用</h2>';
        return $this->view(['aaa']);
        */


    }
    
    
    
    
}