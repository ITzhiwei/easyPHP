<?php
namespace index\hook;
class hookAfter
{
    /**
     * 一级目录入口后置钩子，返回数据给用户前的位置，即该目录下的所有控制器都会执行该钩子
     * @param object $obj
     * @param mixed $data 程序执行完返回的数据，可能被全局后置钩子所修改
     * @param mixed $oldData 程序执行完返回的数据，未被任何修改
     */
    public function handle($obj, $data, $oldData){

    }
}