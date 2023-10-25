<?php

namespace app\controller;

use app\model\UserModel;

/**
 * 模型的搜索器和数据集
 *
 * 搜索器适用于封装字段（或搜索标识）的查询表达式 类似查询范围
 * 一个搜索器对应模型的一个特殊方法public
 * 方法名的命名规范为searchFieldAttr()
 *
 * 模型的数据集
 * 数据集也是直接继承collection类所以和数据库方式一样
 * 数据集对象和数组操作方法一样，循环遍历删除元素
 * 判断数据集是否为空，我们需要采用isEmpty()
 * hidden() 可以隐藏某个字段
 * visible() 可以只显示某个字段
 * append() 可以添加某个获取器字段
 * withAttr() 对字段就行函数处理
 *
 *
 * 模型的自动时间戳
 * 全局开启， 在datebase.php中设置为true
 * 'auto_timestamp' => true    自动写入时间戳
 *
 * 只设置某个模型开启，需要特有字段
 *  protected $autoWriteTimeStamp = true   开启自动时间戳
 *
 * 自动时间戳开启后，会自动写入create_time和update_time两个字段
 *
 * 此时默认类型是int 如果是时间类型 可以更改如下
 * auto_timestamp => datetime
 * protected $autoWriteTimestamp = dateTime
 *
 * 自定义新增和修改的时间戳
 * protected $createTime = 'create_at'
 * protected $updateTime = 'update_at'
 *
 * 如果不需要update_time 可以设置单独关闭
 * protected $updateTime = false
 *
 * 也可以动态实现不修改uptime_time
 * $user -> isAutoWriteTimestamp(false) -> save()
 *
 *
 * 模型只读字段
 * 模型中可以设置只读字段就是无法被修改的字段
 * 例如：
 * protected $readonly = ['name','age']
 *
 * 也可以动态修改
 * $user -> readonly(['name']) -> save()
 */
class modelQuery
{
    protected $autoWriteTimeStamp = true;

    public function search()
    {

        $result = UserModel::withSearch(['remark', 'create_time'], [
            'remark' => 'no',

            'create_time' => ['2023-09-07', '2023-10-25']
        ])->select();
        UserModel::insert(['name' => '林寒的猫',
            'age' => 18,
            'remark' => '林寒的猫']);
//        return UserModel::getLastSql();
        return json($result);
    }

}