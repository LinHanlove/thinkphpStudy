<?php

namespace app\model;

use think\Model;
use think\model\concern\SoftDelete;

/**
 * 定义模型
 * 1. 定义一个和数据表匹配的模型
 * 2. 模型会自动对应数据表，并且有一套自己的命名规则
 * 3. 模型类需要去除表前缀，驼峰式命名
 * 4. 创建空模型后，我们可以在控制器调用，创建对应的控制器  DataModel.php
 * 5. 在控制器内可以直接使用模型名称User:: 调用查询方法
 * 6. 如果担心设置的模型类名和PHP关键字冲突，可以开启应用类后缀
 * 7. 比如设置： class UserModel 则需要更改文件名未UserModel.php
 * 8. 然后设置$name属性未指定的user(表名)
 *
 * 设置模型
 * 1. 默认主键为 id 我们可以设置其他主键 比如：uid
 * 2. 从控制器端调用模型操作，如果控制器类名重复，可以设置别名
 * 3. 在模型定义中，可以设置其他数据表
 * 4. 模型和控制器一样，也有初始化，在这里必须设置static静态方法
 */
class UserModel extends Model
{
//    添加后缀需要设置模型名称
    protected $name = 'user';
//    设置主键
//    protected $pk = 'id';
//    设置表
//    protected $table = 'user';

//    初始化操作
    protected static function init()
    {
        parent::init();
    }

//    设置字段表的信息
    protected $schema = [
        'name' => 'varchar',
        'age' => 'int',
        'remark' => 'text',
        'create_time' => 'date',
        'end_time' => 'date',
        'list' => 'json'
    ];

//    设置json字段
    protected $json = ['list'];

//    开启软删除
//    use SoftDelete;

//    protected $deleteTime = 'delete_time';

//    获取器
//    public function getNameAttr($id)
//    {
//
//        $obj = $this->find($id);
//        return $obj->getAttr('name');
//    }

//    设置修改器
//    public function setAgeAttrs($value): string
//    {
//        $ageArr = [20 => '青年', 30 => '老人'];
//        return $ageArr[$value];
//    }

//    name修改器
//    public function setNameAttr(string $val): string
//    {
//        return strtoupper($val);
//    }

//    模型查询范围 ---筛选所有年龄是偶数的查询，并且只显示5条
//    public function scopeAge($query)
//    {
//        $query->where('age', '<', 25)->limit(5);
//
//    }
//    设置搜索器
    public function searchRemarkAttr($query, $value, $data)
    {
//        dump($query);
//        dump($value);
//        dump($data); //整条语句
        $query->where('remark', 'like', '%' . $value . '%');

    }

    public function searchCreateTimeAttr($query, $value, $data)
    {
//        dump($query);
//        dump($value);
//        dump($data); //整条语句
        $query->whereBetweenTime('create_time', $value[0], $value[1]);

    }


//    连表查询
    public function sex()
    {
//        父表关联子表
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

}