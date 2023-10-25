<?php
namespace app\controller;
use think\facade\Db;

/**
 * 链式查询
 *
 * ----------------------------------------------
 *
 * where
 *
 * where('id','<',10) -> select()
 * 关联数组查询 通过键值来对数组键值对匹配
 *
 * where(['id' => '10','age' => 20]) - select()
 * 索引数组查询 通过数组里的数组拼装方式来查询
 *
 * where([['id','=','10'], ['age','=','20']]) -> select()
 * 将复杂的数组组装后，通过变量传递，将增加可读性 例 -> 复杂数组
 *
 * 字符串形式传递，whereRaw() 支持复杂字符串格式
 * whereRaw('id="10" and age in (10,60)') -> select()
 *
 * 采用预处理模式 比如 id=:id
 * whereRaw('id=:id',['id' => 19]) -> select()
 *
 * -----------------------------------------------------------------
 *
 * field() 字段查询 指定要查询的方式
 *
 * filed('id,name,age') -> select()  字符串
 * field(['id','name','age']) -> select()  数组
 *
 * 给指定字段设置别名
 * field('id as id_id') -> select()
 *
 * 直接给字段设置mysql函数
 * fieldRaw('id,SUM(age)') -> select()
 *
 * 显示查询 没用 * 号
 * field(true) -> select()
 *
 * 排除某些字段
 * withoutField('id,name') -> select()
 *
 * 使用field新增时验证字段合法性
 * field('id,name,age') -> insert($data)
 *
 * 使用alias 别名查询
 * alias('a') -> select()
 *
 * ----------------------------------------------------
 *
 * limit 限制输出数据的个数
 * limit(10) -> select()
 *
 * 分页模式 及传递两个参数，第几条开始显示几条
 * limit(10,10) -> select()
 *
 * 实现分页器需要严格计算每页显示的数量
 *
 * 第一页
 * limit(0,10) -> select()
 *
 * 第二页
 * limit(10,10) -> select()
 *
 * ----------------------------------------------------
 * page 分页优化方案 无需计算每页显示的数量
 * 第一页
 * page(1,10) -> select()
 *
 * 第二页
 * page(2,10) -> select()
 *
 * -----------------------------------------------------
 * order 排序 没有指定第二参数  默认asc 升序
 *
 * order('id') -> select()
 * order('id desc') -> select()
 *
 * 支持数组对多个字段排序
 * order(['id' => 'desc','name' => 'asc']) -> select()
 *
 * 使用orderRaw() 排序 支持mysql函数
 * orderRaw('id desc,name asc') -> select()
 *
 * -----------------------------------------------------
 * group 分组查询统计
 * field('id,SUM(age)') -> group('sex') -> select();
 *
 * 多字段查询
 * field('id,SUM(age)') -> group('sex,name') -> select();
 *
 * having() 条件查询
 * field('id,SUM(age)') -> group('sex') -> having('SUM(age) > 100') -> select();
 *
 */


class LinkQuery
{
  public function linkUp()
  {
    // 将复杂数组转换
    // $map[] = ['id','=','10'];
    // $map[] = ['age', '=', 20];
    // $user = Db::name('user') -> where($map) -> select();


    // $user = Db::name('user') -> where('id','<',10) -> select();

    // 使用field() 字段查询 指定要查询的方式
    // $user = Db::name('user') -> field('id,name,age') -> select();
    // $user = Db::name('user') ->  fieldRaw('id,SUM(age)') -> select();
    // $data = [
    //   'id' => 0,
    //   'name' => '张三',
    //   'age' => 18,
    //   'remark' => '我是张三',
    //   'create_date' =>'2023-09-10',
    //   'end_date'=>'2023-09-10'
    // ];
    // $user = Db::name('user') ->alias('a') -> field('id,name,age') -> insert($data);

    // $user = Db::name('user') -> alias('a') -> page(1,10) -> order(['id' => 'desc' ,'age' => 'asc']) -> select();

    // $user = Db::name('user') -> field('id,SUM(age)') -> group('sex') -> select();

    return json($user);
  }

}