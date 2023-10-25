<?php
namespace app\controller;

use think\facade\Db;

class DataTest
{
  public function index()
  {
    $user =  Db::table('user')->select();
    
    
    return json($user);
  }

  // 向数据库添加一条数据 
  /**
   * insert 
   * 添加成功会返回一个1
   * 添加失败会返回一个0
   * 添加不存在的，抛出异常
   * 如果强行新增抛弃不存在的方法，-> strick(false)
   * insertGetId() 返回一个id
  
   */
  public function add() 
  {
    $data = [
      'id' => 0,
      'name' => '张三',
      'age' => 18,
      'remark' => '我是张三',
      'create_date' =>'2023-09-10',
      'end_date'=>'2023-09-10'
    ];
    Db::name('user') -> insert($data);
  }
  /**
   * 批量新增
   * insertAll()
   */
  public function  addAll()
  {
    $data = [];
    for ($i = 0; $i < 10; $i++) {
      $data[] = [
        'id' => $i+10,
        'name' => 'notion',
        'age' => 20 + $i,
        'remark' => 'notions.top',
        'create_date' => '2023-09-10',
        'end_date' => '2023-09-10',
        'password' => '0565858'
    ];
    };
    Db::name('user') -> insertAll($data);
  }
  /**
   * save新增
   * 根据主键是否存在自行判断新增还是修改
   */
  public function save()
  {
    $data = [
    'id' => 1,
    'name' => '林寒',
    'age' => 18,
    'remark' => '我是张三',
    'create_date' =>'2023-09-10',
    'end_date'=>'2023-09-10'
  ];
  return Db::name('user') -> save($data);
  }
  
}