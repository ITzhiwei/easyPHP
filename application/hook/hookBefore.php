<?php
namespace index\hook;
class hookBefore
{
    /**
     * @param object $obj 这个参数有可能已经被前面的钩子修改了
     * @param array $oldParam 这个是url中的参数，未被其他钩子修改
     * @param array $oldPost 这个是用户post的参数，未被其他钩子修改
     * @return array
     */
    public function handle($obj, $oldParam, $oldPost){
        //写代码逻辑
        //...
        var_dump('一级目录前置钩子执行');
        return [$obj->param, $obj->post];
    }
}