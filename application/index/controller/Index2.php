<?php
namespace index\index\controller;
use wei\controller;
use tcwei\Db\Db;

class Index2 extends controller{
    
    
    public function index(){
       // $row = Db::table('article')->where('id', 1)->select();
       // var_dump($row);
        //echo 'hello2';
        header('HTTP/1.1 500');
        //header("Location:/index");
        echo 123;
    }

    public function hello(){
        echo 'index2 控制器的 hello 访问成功。';
    }
    
    
    
    
}