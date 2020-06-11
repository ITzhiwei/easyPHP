<?php
class hookBefore
{
    public function handle($obj){
        //写代码逻辑
        date_default_timezone_set('PRC');
        if(!session_id()) session_start();
        //...
        return [$obj->param, $obj->post];
    }
}