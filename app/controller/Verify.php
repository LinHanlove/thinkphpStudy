<?php

namespace app\controller;

use app\validate\User;
use think\exception\ValidateException;

/**
 * 默认情况下，一旦有某个数据的验证规则不符合，就会停止后续数据及规则的验证，如果希望批量进行验证，
 * $result = validate(User::class)->batch(true)->check([
 * 'name'  => 'thinkphp',
 * 'email' => 'thinkphp@qq.com',
 * ]);
 */
class Verify
{
    public function index()
    {
        try {
            $result = validate(User::class)->batch(true)->check([
                'name' => 'linhan',
                'price' => 2088
            ]);

            if (true !== $result) {
                // 验证失败 输出错误信息
                dump($result);
            }
        } catch (ValidateException $e) {
            dump($e->getError());
        }
    }
}