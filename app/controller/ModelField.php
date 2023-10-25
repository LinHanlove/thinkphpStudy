<?php

namespace app\controller;

use app\model\UserModel;

/**
 * 模型的字段设置---------------------------
 * 1. 模型的字段和表字段是对应的，包括类型
 * 2. 自动获取会增加一次查询，如果在模型中配置字段消息，会减少内存开销
 * 3. 可以在模型设置 $schema 字段 明确定义字段信息，字段需要对应表写完整
 * 4. 系统提供一条命令，生成一个信息缓存，自动生成
 *  php think optimize:schema    ---缓存在runtime -> schema 文件
 * 5. 我们可以把这些键值复制在 $schema属性上 开启 trace 测试效果
 * 6. 这是，在控制器执行查询，会发现少了一次查询 但只对于模型有效
 * 7. config/database.php -> 'field_cache' => true  开启缓存文件后对db类也会同时失效
 *
 * 8. 获取到数据后，需要单独获取数据可以 -> 和数组方法
 * $user = UserModel::find(19)  echo $user -> name || $user[name]
 *
 * 9. 如果我们在模型端把数据这里好，交给控制器直接调用
 *      $obj = $this -> find($id)  ---模型内部
 *      return $obj -> getAttr('name');
 * 模型的获取器和修改器---------------------------------------
 * 1. 作用: 对模型实例做出自动处理
 * 2. 一个获取器对应模型的一个特殊方法 ----public
 * 3. 命名规范： getFieldAttr()
 * 4. 其实就是在模型端自定义用于处理字段的函数
 *
 * 5. 如果定义了获取器，并且还想获取到原始值，可以使用getData()
 *    return $user -> getData('user')
 *    直接输出无参数的getData()->得到原始值，而输出$user则是改变后的值
 * 6. withAttr 在控制器端实现动态获取器，比如设置所有的email为大写
 *      $user = UserModel::withAttr('email',function ($value){
 *          return strtoupper($value);
 *       }) -> select();
 *       return json($user);
 *
 *
 * 模型修改器-----------------------------------
 * 1. 作用： 就是对模型设置对象的值进行修改处理
 * 2. 比如新增数据的时候对数据进行格式化，过滤，等
 * 3. 命名规则 setFieldAttr
 *
 * 例如： public function setEmailAttr($value){
 *        return strtoupper($value);
 *       }
 * 4. 除了新增，会调用修改器，修改更新也会触发修改器
 * 5. 模型修改器只对模型方法有效，调用数据库的方法是无效的 比如 -> insert()
 */
class ModelField
{

    public function fieldModel()

    {
//        $user = new UserModel();
//       UserModel::select();
//        return json($user->setAgeAttrs(20));
        $user = UserModel::withAttr('name', function ($value) {
            return strtoupper($value);
        })->select();
        return json($user);
    }

}