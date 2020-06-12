<?php
class hookAfter
{
    /**
     * 全局后置钩子，在控制器方法执行完毕后的位置，但是在 userAccessEndExecute 前面； userAccessEndExecute 是用户获取请求数据完成后后台执行的位置
     * @param object $obj
     * @param mixed $data 程序执行完返回的数据
     */
    public function handle($obj, $data){
        var_dump('全局后置钩子，控制器方法执行完毕后的位置');
    }
}