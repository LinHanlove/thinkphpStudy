<?php
namespace app\controller;
use think\facade\Db;

/**
 * 聚合查询
 * count() 可以求出所查询数据的数量
 * 可以设置指定id 比如有null的就不会纳入数量
 * max() 求出所查询字段的最大值 可以通过第二个参数强制转换
 * min() 求出所查询字段的最小值 可以强制转换
 * avg() 求出查询字段的平均值
 * sum() 求出查询字段的总和
 * 
 * 
 * 子查询 可以做两个表之间的联动查询
 * fetchSql() 可以设置不执行SQL 而是返回SQL语句 默认true
 * fetchSql(true) -> select()
 * buildSql() 返回SQL语句 不需要再执行select() 并且有括号
 * buildSql()
 * 
 * 
 * 原生查询
 * query() 进行原生查询 适于读取操作，SQL错误返回false
 * query('select * from user')
 * 
 * execute 进行原生SQL写入，sql错误返回false
 * execute('update user set username="孙悟空" where id=29 ')
 */


 class QueryThree
 {
  public function poly()
  {
    // 子查询
    // $user =  Db::name('user') -> fetchSql(true) -> select();
    // 求出所有男的的id
    // $subQuery = Db::name('sex') -> field('id') -> where('sex','男') -> buildSql(true);
    // $result = Db::name('user') -> where('id','exp','IN' . $subQuery) ->select();

    // $result = Db::name('user') -> where('id','in',function($query){
    //   $query -> name('sex') -> field('id') -> where('sex','男');
    // }) -> select();

    $user = Db::query('select * from user where id=5');
    return json($user);
  }

  
 }