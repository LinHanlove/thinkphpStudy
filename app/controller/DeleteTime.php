<?php

namespace app\controller;

use app\model\UserModel;


/**
 * 模型软删除
 * 1. 在模型端设置软删除的功能，引入SoftDelete 它是trait
 * use SoftDelete;
 * protected $deleteTime = 'delete_time'
 * 2. delete_time默认是null 修改如下：
 * protected $defaultSoftDelete = 0
 *
 * 3. 软删除和真实删除
 * UserModel::destroy(23);
 * UserModel::find(23)->delete()
 *
 * 4.默认情况下，开启软删除功能查询，模型会自动屏蔽被删除的数据
 * $user = UserModel::select()
 * return json($user)
 *
 * 5.开启软删除功能前提下，使用withTrashed()取消屏蔽软删除的数据
 * $user = UserModel::withTrashed() -> select()
 *
 * 6.查询被软删除的数据，使用onlyTrashed()
 * $user = UserModel::onlyTrashed() -> select()
 * return json($user)
 *
 * 7. 让某一条软删除的数据恢复到正常模式 使用 restore()
 *  $user = UserModel::onlyTrashed() -> select()
 *  $user -> restore()
 *
 * 8. 让一条软删除的数据真正删除，在恢复正常后，使用delete(true)
 * $user = UserModel::onlyTrashed() -> find(23)
 * $user -> restore()
 * $user -> force() -> delete()
 *
 * 9. 真实删除，要先还原，再删除
 *
 *
 */
class DeleteTime
{
//    软删除
    public function softDelete()
    {
//        UserModel::insert([
//            'name' => '阿罪啊',
//            'age' => 25
//        ]);
        UserModel::find(26)->delete();
//        默认屏蔽了软删除的显示
        return json(UserModel::select());

    }
}