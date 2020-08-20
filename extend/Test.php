<?php
namespace extend;
use index\index\controller\Index2;
class Test {
    public $index2Class;
    public function __construct(Index2 $index2)
    {
        $this->index2Class = $index2;
    }

    public function index(){

        var_dump('ok');

    }

    public function smg(){
        $index2 = $this->index2Class;
        $index2->hello();
    }
    
    
    
    
}