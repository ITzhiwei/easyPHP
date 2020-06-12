<?php
namespace index\index\hook;
class hookAfter
{
    /**
     * @param object $obj
     * @param mixed $data 程序执行完返回的数据，但是可能已经被其他钩子修改过
     * @param mixed $oldData 程序执行完返回的数据，未被其他钩子修改
     */
    public function handle($obj, $data, $oldData){
        var_dump('二级目录后置钩子，控制器方法执行完毕后的位置');
    }
}