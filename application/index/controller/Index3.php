<?php
namespace index\index\controller;
use wei\controller;
use tcwei\Db\Db;
use extend\Test;

class Index3{

    public $Test = null;

    /**
     * 控制反转
     */
    public function __construct(Test $Test)
    {
        $this->Test = $Test;
    }


    public function hi(){
        $Test = $this->Test;
        $Test->index();
    }

}