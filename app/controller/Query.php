<?php
namespace app\controller;

use think\facade\Db;

class Query {
  

  /**
   * 比较查询
   * 查询表达式 where('字段名','查询表达式','查询条件')
   * 查询表达式 =,<,>,<=,>=,<> 不等于
   * 区间查询
   * 
   * like 模糊查询
   * where('name','like','notion%') ...之前是notion
   * where('name','like',['notion%','to%'],'or') 加第三个参数 支持数据形式的模糊查询
   * whereLike('name','notion%') 
   * whereNotLike('name','notion%') 两个快捷方式 正向和反向
   * 
   * 
   * between 区间查询
   * where('id','between',[1,2])
   * 快捷方式 ：whereBetween('id',[1,2]) whereNotBetween('id',[1,2])
   * 
   * 
   * in 精确查询
   * where('id','in',[1,2])
   * 快捷方式：whereIn('id',[1,2]) whereNotIn('id',[1,2])
   * 
   * 
   * null 找出null
   * where('name',null)
   * 快捷方式 whereNull('name') whereNotNull('name')
   * 
   * EXP查询
   * 使用exp可以自定义字段sql语句
   * where('id','exp','id+1=3')
   * 
   */
  public function query()
  {
   $user = Db::name('user') -> where('id','<>',2) -> select();
   return json($user);
  }

  public function query2()
  {
    // $user = Db::name('user') -> where('name','like','notion%') -> select();
    // $user = Db::name('user') -> whereLike('name','notion%') -> select();
    // $user = Db::name('user') -> whereBetween('id',[1,5]) -> select();
    $user = Db::name('user') -> whereIn('id',[1,5]) -> select();

    return json($user);
  }
}

