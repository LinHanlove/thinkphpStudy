<?php

namespace app\controller;

use app\model\UserModel;
use think\facade\Db;


/**
 * 模型查找范围-----------------
 * 1. 在模型端创建应该封装的查询或写入方法 方便控制器端调用
 * 2. 控制器端调用模型方法
 * 3. 查询封装可以传递参数，例如通过邮箱查找某人
 *  public function scopeEmail($query,$value) {  ---模型端
 *  $query -> where('email','like','%'.$value.'%')
 * }
 * UserModel::scope('scope','xiao') ->select()
 *
 * 4. 也可以实现多个模型封装连缀查询
 * 5. 查询只能使用find() select()
 *
 * 6. 全局范围查询，就是在此模型下不管怎么查询都会加上全局条件
 * //定义全局的范围查询
 * protected $globalScope = ['status']
 * // 全局范围
 * public function scopeStatus($query) {
 *  $query -> where('status',1)
 * }
 *
 * 7. 在定义了全局查询后，可以使用 UserModel::withoutGlobalScope() 取消这个查询的所有查询
 * 8. 可以添加指定的参数取消这个查询的部分全局查询 UserModel::withoutGlobalScope(['status '])
 */
class QueryScopeModel
{
    public function scopeModel()
    {
        $data = [
            'name' => '林寒',
            'age' => 18,
            'remark' => '我是张三',
            'create_time' => '2023-09-10',
            'end_time' => '2023-09-10'
        ];
        return UserModel::insertAll($data);
//        $user = UserModel::scope('age')->select();
//        return json($user);
    }
}