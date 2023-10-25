<?php

namespace app\controller;

use app\model\UserModel;

/**
 *  模型的新增----------------------------------------------
 * 1. 使用实例化的方法添加一天数据
 *    $user = new UserModel();
 * 2. 设置要新增的数据 然后保存到数据库中 save(); 返回bool
 * 3. 也可以通过save() 传递数组的方式 来新增数据
 * 4. 使用 allowField() 方法 允许要写入的字段，其余字段就无法写入  -- 选择性写入
 * 5. 模型新增也提供了 replace() 方法来实现REPLACE into 新增
 * 6. 当新增成功后， 使用 $user -> id 可以获得自增 id (主键需要是id)
 * 7. 使用saveAll() 方法 批量新增
 * 8. 模型新增也提供了 insert() 方法来实现 INSERT into 新增
 * 9. 使用 ::create() 静态方法来创建新增的数据
 * 参数1 新增的数据组 必选
 * 参数2 允许写入的字段 可选
 * 参数3 是否为 replace 写入 默认为 false 为 inesert 写入
 *      ::create([...])
 * 模型数据的删除------------------------------------------
 * 1. find(id) -> delete() 通过查询主键得到数据再删除
 * 2。destroy(id) 直接删除主键为id的数据 ---静态方法
 * 3. destroy([1,2,3]) 批量删除
 * 4. where('id' , '>' ,20) -> delete() 删除条件为 id > 20 的数据
 * 6. destroy(function ($query){$query -> where('id' , '>' ,20)})
 *
 * 模型的数据更新 ----------------------------------------
 * 1. find(id) -> save() 更新数据
 * 2. where() -> find() -> save()
 * 3. save() 方法只会更新变化的数据，如果你想强制更新 可以使用 force() 方法
 * 4. raw()执行SQL语句   raw('age + 1')
 * 5. allowField()方法 允许更新的字段，其他字段就无法写入
 * 6. saveAll([['name'=>25],...]) 批量修改数据 但只能通过主键进行更新
 * 7. update() 批量修改
 *     1. 直接修改 2. 使用第二个参数为主键 update(['age'=>20], 'id'=>1)  3. 第三个参数限制哪一个需要修改
 * 8. 模型的新增和修改都是save() 进行执行的，自动识别
 * 9. 实例化后的save()表示新增  查询后的save()表示更新
 * 10. 如果在save() 传入更新修改条件后也表示修改
 *
 * 模型的数据查询---------------------------------------
 * 1. find() 通过主键id查询
 * 2. where() 条件筛选查询  支持连缀查询
 * 3. findOrEmpty() 数据不存在返回空模型
 * 4. isEmpty() 判断模型是否为空
 * 6. select([1,2,3]) 查询指定id的字段
 * 7. where('id',20) -> value('name') || -> column('name','id') 获取某个字段的value或列的column
 *    whereIn('id',[12,15,16]) -> column('name','id')
 * 8. getBy***  支持动态查询 getByName('linhan')
 * 9. max min sum count avg 聚合查询
 * 10. chunk() 方法分批处理 防止一次性查询开销过大
 * 11. 游标查询
 * foreach(UserModel::where('dtatus',1) -> cursor() as $user) {echo $user->name;}
 */
class DataModel
{
    public function index()
    {
        return json(UserModel::find(19));
    }

    public function insert()
    {
        $user = new UserModel();
//        $user->name = '李白';
//        $user->age = 20;
//        $user->remark = '李白说：notion真好！！！';
//        $user->create_date = '2023-10-22';
//        $user->end_date = '2023-10-22';
//        $user->save();
        $user->allowField(['name', 'age', 'remark', 'create_date', 'end_date'])->save([
            'name' => '林寒',
            'age' => 20,
            'remark' => '林寒：notion真好！！！',
            'create_date' => '2023-10-22',
            'end_date' => '2023-10-22',
            'password' => '123456'
        ]);
        $user::create([
            'name' => '阿罪',
            'age' => 20,
            'remark' => '阿罪：notion真好！！！',
            'create_date' => '2023-10-22',
            'end_date' => '2023-10-22',
            'password' => '123456'
        ]);

    }

    public function updata()
    {
        $userUpdate = UserModel::where('id', '<', 15)->update(['name' => '花木兰']);

        return json($userUpdate);
    }

    public function select()
    {
//        分批处理
        UserModel::chunk(5, function ($user) {
            foreach ($user as $v) {
                echo $v->name;
            }
            echo '<hr>';

        });
//        游标查询
        foreach (UserModel::where('age', 20)->cursor() as $user) {
            echo $user->name;
            echo '<hr>' . '游标查询  --->  ';
        }
    }
}



