<?php
namespace index\index\controller;
use wei\controller;
use lipowei\Db\Db;
use wei\Factory;
use lipowei\configClass\Config;

class index extends controller{

    public function index(){
        $a1=array("red","green");
        $a2=array("blue","yellow");
        print_r(array_merge($a1,$a2));
        //return $this->view(['aaa']);

         /* 调用其他控制器示例  Factory 第一个参数是控制器地址，第2个参数是单列管理中的别名，后面的参数是传入第一个参数的参数（即 ...index2 控制器的参数）
         $a = Factory::get('index\index\controller\index2', 0, $this->param);
         $a->routing = 'hello';
         //将用户请求结束后需要执行的内容交出来执行,然后必须重置为[]
         foreach ($a->fucArr as $value){
             $this->fucArr[] = $value;
         }
         //重置为[]
         $a->fucArr = [];
         $a->run();
         */

    }
    
    
    
    
}