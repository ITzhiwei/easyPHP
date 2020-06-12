<?php
class hookBefore
{
    public function handle($obj){
        //写代码逻辑
        date_default_timezone_set('PRC');
        if(!session_id()) session_start();
        //...
        var_dump('全局钩子：前置执行');
        return [$obj->param, $obj->post];
    }
}