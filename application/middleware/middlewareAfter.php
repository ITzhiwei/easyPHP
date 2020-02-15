<?php
namespace index\middleware;
class middlewareAfter
{
    /**
     * 一级目录入口后置中间件，即该目录下的所有控制器都会执行该中间件
     * @param object $obj
     * @param mixed $data 程序执行完返回的数据，可能被全局中间件所修改
     * @param mixed $oldData 程序执行完返回的数据，未被任何修改
     */
    public function handle($obj, $data, $oldData){
        echo '<hr/>amg';
        var_dump(__DIR__);
    }
}