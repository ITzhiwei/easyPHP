<?php
namespace index\index\controller;
use wei\controller;
use lipowei\Db\Db;

class index2 extends controller{
    
    
    public function index(){
        $row = Db::table('article')->where('id', 1)->select();
       // var_dump($row);
        echo 'hello2';
    }
    
    
    
    
}