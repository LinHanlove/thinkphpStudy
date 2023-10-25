<?php

namespace app\controller;

use app\model\UserModel;


/**
 * 模型的类型转换
 * 系统可以通过模型端设置写入或读取时对字段就行类型转换
 * 在模型端可以设置你想要类型转换的字段
 * protected $type = ['status' => 'boolean','price' => 'int']
 *
 * 数据库查询的字段好多都是字符串类型的，我们可以转换成如下类型：
 * int float boolean array object serialize json timestamp(时间戳) datetime
 *
 * 废弃字段
 * protected $disuse = ['uid']
 *
 * 数据库JSON---------------------------------------------------
 * JSON字段
 * UserModel::json(['list'])->insert($data); 新增
 * UserModel::where('id', 23)->json(['list'])->find() 查询
 *
 * 修改
 * $data['list'] = ['update' => '修改hahah '];
 * UserModel::where('id', 23)->json(['list'])->update($data)
 *
 * 修改某一个
 * $date['list => name'] = 'linhan'
 *
 * 模型JSON-------------------见模型端---------------------------
 * 写入
 * protected $json = ['list']
 * 使用模型方法新增包含json的字段
 *
 * 通过对象调用方式，直接获取json里面的数据
 * $user = UserModel::find(23);
 * return $user -> list -> name
 *
 * 获取一条数据
 * $user = UserModel::where('list -> name','linhan') -> find()
 * return $user -> list -> email
 *
 * 更新json数据，直接通过对象方式即可
 * $user = UserModel::find(23)
 * $user -> list -> name = 'linhan'
 * $user -> save()
 *
 */
class modelType
{
    public function type()
    {
//        $data = [
//            'name' => '山鬼',
//            'age' => 25,
//            'remark' => '若有人兮山之阿',
//            'list' => ['name' => '山鬼',
//                'age' => '25',
//                'remark' => '若有人兮山之阿']
//
//        ];
//        $data['list'] = ['update' => '修改hahahas '];
//        UserModel::json(['list'])->insert($data);
//        return json(UserModel::where('id', 23)->json(['list'])->find());
//        return json(UserModel::where('id', 23)->json(['list'])->update($data));
//        $user = UserModel::where('list -> name', '山鬼')->find();
//        echo $user->list->name;
    }
}