<?php

namespace app\controller;

use app\BaseController;

class Test extends BaseController
{
  public function index()
  {
    return 'hello world'.'方法名：'  . $this -> request->action() . '控制器名：' . $this -> request->controller() . '路由名：' . $this -> request->pathinfo() . '实际路径：' . $this -> app->getBasePath();
  }

  public function test()
  {
    $arr = [1, 2, 3, 4, 5];
    halt('哈哈');
    return json($arr);
  }
}
