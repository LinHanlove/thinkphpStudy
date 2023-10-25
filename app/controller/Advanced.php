<?php

namespace app\controller;

use think\facade\Db;

/**
 * 高级查询
 *
 * 使用|(OR) 或 & (AND) 操作符 来实现where条件的高级查询 where支持多个连缀
 * where('user | email', 'like', '%xiao%') -> where('age & email', '>', 0) -> select()
 *
 * 关联数组方式可以在where进行多个字段的查询
 * where(['id','>',0],['name','=','thinkphp'],['age','>',18]) ->select()
 *
 * 根据之前的，条件字符串复杂组装，比如exp 就是使用raw表达式
 * where(['id','>',0],['age','exp',Db::raw('>80')]) ->select()
 *
 * 如果有多个where 并且条件是分离的$map 而$map本身有多个条件 那么$map条件如果需要先执行输出结果，再和后续条件判断，也就是加上括号
 * 那么需要对$map变量，再加上一个[] 提高优先级
 *
 * 如果条件中多次出现一个字段 并且需要 OR 来左右筛选 可以使用whereOR
 *
 * 闭包查询可以连缀 会自动加上 () 如果是 or 使用whereOr
 *
 * 对于复杂的你不知道如何拼装sql条件，直接使用whereraw()
 *
 * whereRaw() 也支持多参数绑定
 *
 * ----------------------------------------------
 * 快捷查询
 *
 * 比较两个字段 比如时间差
 * whereColumn('create_time', '>', 'update_time') ->select()
 *
 * 根据字段查询 whereFieldName  注意 FieldName是需要查询的字段名 ---查多条
 * whereName()  whereEmail()
 *
 * getByFiledName 查询某个字段的值，注意只能查询一条 不需要find()
 *
 * getFieldByFieldName 查询某个字段的单一值，注意只能查询一条 不需要find()
 * getFieldByName('notion', 'age') 查询名字是notion的age的值
 *
 * -----------------------------------------------
 * when 通过条件判断，执行闭包里的分支查询
 * when(false,
 * function($query){
 *     $query -> where('id','<',20);
 * }),
 *  function($query){
 *      $query -> where('age','<',20);
 *  }) -> sleect()
 *
 *
 */
class Advanced

{
    public function index()
    {
//        $data = Db::table('user')->where('id|name|email', 'like', '%xiao%')->where('age & email', '>', 0)->select();

//        $data = Db::table('user')->where([['id', '>', 0], ['name', '=', 'thinkphp'], ['age', '>', 18]])->select();

//        $data = Db::name('user')->where([['id', '>', 0], ['age', 'exp', Db::raw('>10  ')]])->select();
//        $map = [
//            ['id', '>', 0],
//        ];
//        $map2 = [
//            ['age', 'exp', Db::raw('>10  ')]
//
//        ];
//        $data = Db::name('user')
//            ->where([$map])
//            ->select();
//        $data = Db::name('user')->whereOr([$map, $map2])->select();

//        闭包查询--连缀
//        $data = Db::name('user')->where(function ($query) {
//            $query->where('id', '>', 0);
//        })->where(function ($query) {
//            $query->where('age', '>', 18);
//        })->select();

//        $data = Db::name('user')->whereRaw('name like  "%notion%" and age < 20')->select();
//        $data = Db::name('user')->whereColumn('create_date', '>=', 'end_date')->select();
//        $data = Db::name('user')->whereName('notion')->select();
        $data = Db::name('user')->getFieldByName('notion', 'age');

//        return Db::getLastSql();
        return json($data);

    }
}