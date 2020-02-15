<?php
class middlewareAfter
{
    /**
     * 全局中间件
     * @param object $obj
     * @param mixed $data 程序执行完返回的数据
     */
    public function handle($obj, $data){
        echo '<hr/>amg';

    }
}