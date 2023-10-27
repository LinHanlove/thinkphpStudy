<?php

use think\Facade;

/**
 * 门面模式
 * 为容器的类提供了种静态的调用方式  例如： Request Route Db
 *
 */
class Test extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\Test';
    }
}