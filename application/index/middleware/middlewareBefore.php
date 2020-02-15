<?php
namespace index\index\middleware;
class middlewareBefore
{
    /**
     * @param object $obj 这个参数有可能已经被前面的中间件修改了
     * @param array $oldParam 这个是url中的参数，未被其他中间件修改
     * @param array $oldPost 这个是用户post的参数，未被其他中间件修改
     * @return array
     */
    public function handle($obj, $oldParam, $oldPost){
        return [$obj->param, $obj->post];
    }
}