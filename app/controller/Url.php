<?php

namespace app\controller;


use think\facade\Route;


/***
 * url生成
 * 创建一个新的控制器类：url.创建一个路由方法和url 可以取别名
 * Route::rule('ds','Url/index') -> name('u')
 *
 * 使用Route::buildUrl('地址'，[参数]) 来获取路由的url地址
 * 地址和路由的定义相辅相成
 * return Route::buildUrl('Url/details',['id'=>'225'])
 *
 * 也可以直接使用路由地址生成URL 并不需要和路由定义向匹配
 * return Route::buildUrl('ds/5'])
 *
 * 我们可以默认设置后缀 .html 生成的url会自动加上后缀
 * return Route::buildUrl('ds/5') -> suffix('shtml')
 *
 *
 * 使用助手函数更简单
 * url('ds/5')
 *
 *
 *
 */
class Url
{
    public function index()
    {
        return Route::buildUrl('ds/5@notion.top');
    }

    public function details($id)
    {
        echo 'Id:' . $id;
    }

    public function test()
    {
        return \app\facade\Test::hello('linhan');
    }
}