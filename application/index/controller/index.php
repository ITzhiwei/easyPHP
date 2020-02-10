<?php
namespace index\index\controller;
use wei\controller;
use lipowei\Db\Db;
use wei\Factory;

class index extends controller{
    
    
    public function index(){
        //$row = Db::table('article')->where('id', 1)->select();
        //var_dump($row);
        echo 'hello';

        

        var_dump($this->param);


        /*
        $a = Factory::get('index\index\controller\index2', 'sa');
        var_dump($a);
        $a = Factory::get('index\index\controller\index2');
        var_dump($a);
        var_dump(Factory::$classArr);

        echo 'hello';
        /*
        $a = new index2;
        $a->index();
        foreach ($a->fucArr as $value){
            $this->fucArr[] = $value;
        }
        */
    }
    
    
    
    
}