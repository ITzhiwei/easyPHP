<?php
class middlewareBefore
{
    public function handle($obj){
        //写代码逻辑
        //...
        return [$obj->param, $obj->post];
    }
}