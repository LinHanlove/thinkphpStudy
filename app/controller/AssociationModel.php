<?php

namespace app\controller;

use app\model\UserModel;

/**
 *  ---------------------关联模型-----------------------------------
 *  hasOne一对一，通过父表查询子表信息
 *  1. 创建User 和  ProFile 两个空模型
 *  2. 在User端关联Profile
 *   class User extends Model {
 *       public function profile(){
 *           // 一对一关联，参数1 表示父表 参数2 表示外键
 *           return $this -> hasOne(Profile::class,'uid')
 *       }
 *  }
 *
 * hasOne                   一对一
 * $this -> hasOne('关联模型'，'外键','主键')
 *
 * belongsTo                反向一对一
 * $this -> belongsTo('关联模型'，['外键','关联外键'])
 *
 * hasMany                  一对多
 * hasOneThrough            远程一对一
 * hasManyThrough           远程一对多
 * belongsToMany            多对多
 * morphMany                多态一对多
 * morphOne                 多态一对一
 * morphTo                  多态
 *
 * 使用save()方法通过主表修改附表字段
 * $user = UserModel::find(2)
 * $user -> profile -> save (['name' => '/'])
 *
 *
 * 通过 -> profile 属性方式新增数据
 * $user -> profile() -> save (['name' => 'linhan'])
 *
 * 使用hasOne()也能模拟belongsTo()来进行查询
 * 1. $user = UserModel::hasWhere('profile' , ['id' => 2]) -> find()  // 参数1 表示模型UserModel里面的方法
 * 2. 采用闭包，这里是两张表操作，会导致id识别模糊，需要指明表
 *  $user = UserModel::hasWhere('profile' , function($query){
 *      $query -> where('profile.id',2);
 *  }) -> select()
 *
 *
 */
class  AssociationModel
{
    public function index()
    {
        $user = UserModel::find(2);
        return json($user);
    }
}