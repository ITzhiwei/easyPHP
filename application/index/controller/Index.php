<?php
namespace index\index\controller;
use mjxAPP\doukuaitui\controller\userInfo;
use wei\controller;
use lipowei\Db\Db;
use wei\Factory;
use lipowei\configClass\Config;
use extend\Test;
use lipowei\smallTools\Page;

class Index extends controller{

    public function index(){

        echo '<h2>使用扩展库</h2>';
        $Test = new Test();
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
        $a = Factory::get('index\index\controller\Index2', 0, $this->param);
        $a->runHookBefore = false;
        $a->fucName = 'hello';
        //将用户请求结束后需要执行的内容交出来执行,然后必须重置为[]
        foreach ($a->fucArr as $value){
            $this->fucArr[] = $value;
        }
        //重置为[]
        $a->fucArr = [];
        $a->run();

        echo '<br/><hr/><h2>视图文件使用</h2>';
        return $this->view(['aaa']);



    }
    
    
    
    
}