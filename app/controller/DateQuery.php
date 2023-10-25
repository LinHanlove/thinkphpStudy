<?php
namespace app\controller;
use think\facade\Db;

/**
 * 传统方式
 * 使用>,<...筛选时间数据
 * where('create_date','>','2018-1-1') -> select()
 * 使用between设置时间区间
 * whereBetween('create_date',['2018-1-1','2019-1-1']) -> select()
 * 
 * 
 * 快捷方式 (默认的 > 可以省略)
 * 使用whereTime('create_date','>','2018-1-1') -> select()
 * whereBetweenTime('create_date','2018-1-1','2018-1-1') -> select()
 * 
 * 
 * 固定查询
 * 使用whereYear 查询去年 今年 某一年的数据   last year  '2016'
 * whereYear('create_date') -> select()
 * 使用whereMonth 查询上月 这月 某一月的数据   last month  '2016-8'
 * whereMonth('create_date','2023-6')
 * 使用whereDay 查询昨天 几天 某一天的数据   last day  '2016-8-27'
 * 
 * 
 * 其他查询
 * 指定时间内的数据 比如两个小时内
 * whereTime('create_date','-2 hours') -> select()
 * 
 * 查询两个时间字段有效期的数据，比如会员开始与结束的日期
 * whereBetweenTimeField('start_time','end_time') -> select()
 */


class DateQuery{
  public function time()
  {
    // $user = Db::name('user') -> whereBetween('create_date',['2023-09-10','2023-09-11']) -> select();
    $user = Db::name('user') -> whereYear('create_date','2023') -> select();

    return json($user);
  }
}