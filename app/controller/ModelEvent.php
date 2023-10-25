<?php

namespace app\controller;

use app\BaseController;
use app\model\UserModel;
use think\facade\Db;


/**
 * 模型和数据库的事件
 *
 * 数据库方法
 * 事件可以部署再构造方法里等待激活
 * before_select      select查询前的回调
 * before_find        find查询前的回调
 * after_insert       insert操作成功后的回调
 * after_update       update操作成功后的回调
 * after_delete       delete操作成功后的回调
 *
 * 再控制器端，事件一般可以写在初始化方法里，方便统一管理
 * public function initialize(){
 *     Db:event('before_select',function($query){
 *         echo '执行了批量查询操作！！！'
 *     })
 * }
 *
 * 模型方法------------------------------------
 * after_read         查询前           onAfterRead
 * before_insert      新增前           onBeforeInsert
 * after_insert       新增后           AfterInsert
 * 更新前后                                ...
 * 删除前后
 * before_restore     恢复前
 * after_restore      恢复后
 *
 *
 */
class ModelEvent extends BaseController
{
//    默认执行
    public function initialize()
    {
        Db::event('before_select', function ($query) {
            dump($query);
        });
    }

    public function event()
    {
        $user = UserModel::where('id', '>', 10)->select();
//        return json($user);
    }
}