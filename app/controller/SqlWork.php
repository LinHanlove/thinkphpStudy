<?php

namespace app\controller;

use\think\facade\Db;

/**
 * -------------------------------------------
 * 事务处理
 *
 * ----------------------------------------------
 * 获取器  将数据的字段进行转换处理在进行操作
 * 例如： 在获取到的数据邮箱号全部大写
 * withAttr('email',function($value,$data){
 *     return strtoupper($value);
 * }) ->select()
 *-----------------------------------------------
 */
class SqlWork
{
    public function index()
    {
//        自动事务处理
//        Db::Transaction(function () {
//            Db::name('user')->where('id', 18)->save(['age' => Db::raw('age' - 3)]);
//            Db::name('user')->where('id', 19)->save(['age' => Db::raw('age' + 3)]);
//        });
//        手动处理
//        Db::startTrans(); //启动
//        try {
//            Db::name('user')->where('id', 18)->save(['age' => Db::raw('age' - 3)]);
//            Db::name('user')->where('id', 19)->save(['age' => Db::raw('age' + 3)]);
//            Db::commit();//提交事务
//        } catch (\Exception $e) {
//            Db::rollback();//回滚事务
//            echo $e->getMessage();
//        }
        $user = Db::name('user')->withAttr('remark', function ($value, $data) {

            return strtoupper($value);
        })->select();
        return json($user);
    }

    /**
     * 数据集 ---查询后的结果集 返回类似数组
     * 操作类似数组
     * 额外方法
     * isEmpty() 是否为空
     * toArray() 转换为数组
     * shuffle()  随机打乱数组
     * whereIn('id',[1,2,3])  查询结果集
     * all        所有数据
     * merge      合并
     * diff       比较数据返回差集
     * flip       交换数据中的键值
     * intersect   返回交集
     * keys        键
     * pop         删除最后一个元素
     * ...
     */
    public function collection()
    {
        $user = Db::name('user')->select();
//        var_dump($user);
        var_dump($user->toArray());
    }
}


