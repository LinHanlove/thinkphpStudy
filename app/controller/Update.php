<?php
namespace app\controller;

use think\facade\Db;


class Update {
  /**
   * 使用update方法来修改数据，修改成功返回影响的行数，没有修改返回0
   * 如果修改数据包含了主键信息 那么可以省略掉where
   * 想让一些字段修改时执行sql 可以使用exp方法
   * 如果要自增自减某个字段可以使用inc/dec方法，并支持自定义步长
   * 使用::row() 方法实现自增自减 简单粗暴
   * 使用save方法进行修改数据，这里必须使用指定主键才能实现修改功能
   * @return void
   */
  public function update () 
  {
    $data= [
      'name' => '李白'
    ];
    Db::name('user') -> where('id',0) -> save([
      'name' => '黑旋风'
    ]);
    return Db::name('user') -> where('id',1) -> inc('age')  -> update($data);
  }

  /**
   * 数据删除 
   * delete 直接根据主键删除，成功返回行数，否则返回0
   * 根据主键删除多条记录
   * 正常情况下根据where()-> delete() 删除
   */
  public function delete ()
  {
    Db::name('user') -> where('id',0) -> delete(1);
  }

}