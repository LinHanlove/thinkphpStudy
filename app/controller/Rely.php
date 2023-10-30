<?php

namespace app\controller;

//use think\Request;
use think\facade\Request;

/**
 * 请求
 * 1.使用依赖注入
 * 2.构造方法保存
 * 3. 使用Facade方法应用与没有进行依赖注入时使用request对象的场合
 * use think\facade\Request;
 * return Request::get('name');
 *
 * 使用助手函数应用与没有进行依赖注入时使用request对象的场合
 * request()->param('name')
 *
 * ------------------请求信息--------------------------
 * host    当前访问域名或者IP
 * scheme    当前访问协议
 * port    当前访问的端口
 * remotePort    当前请求的REMOTE_PORT
 * protocol    当前请求的SERVER_PROTOCOL
 * contentType    当前请求的CONTENT_TYPE
 * domain    当前包含协议的域名
 * subDomain    当前访问的子域名
 * panDomain    当前访问的泛域名
 * rootDomain    当前访问的根域名
 * url    当前完整URL
 * baseUrl    当前URL（不含QUERY_STRING）
 * query    当前请求的QUERY_STRING参数
 * baseFile    当前执行的文件
 * root    URL访问根地址
 * rootUrl    URL访问根目录
 * pathinfo    当前请求URL的pathinfo信息（含URL后缀）
 * ext    当前URL的访问后缀
 * time    获取当前请求的时间
 * type    当前请求的资源类型
 * method    当前请求类型
 * rule    当前请求的路由对象实例
 *
 * -----------------------请求变量------------------------------
 * 可以使用has方法来检测一个变量参数是否设置
 * Request::has('id','get');
 * Request::has('name','post');
 * 变量类型方法包括
 * 方法    描述
 * param    获取当前请求的变量
 * get    获取 $_GET 变量
 * post    获取 $_POST 变量
 * put    获取 PUT 变量
 * delete    获取 DELETE 变量
 * session    获取 SESSION 变量
 * cookie    获取 $_COOKIE 变量
 * request    获取 $_REQUEST 变量
 * server    获取 $_SERVER 变量
 * env    获取 $_ENV 变量
 * route    获取 路由（包括PATHINFO） 变量
 * middleware    获取 中间件赋值/传递的变量
 * file    获取 $_FILES 变量
 * all    获取包括 $_FILES 变量在内的请求变量，相当于param+file
 *
 * PARAM类型变量是框架提供的用于自动识别当前请求的一种变量获取方式，是系统推荐的获取请求参数的方法
 *  获取当前请求的name变量
 * Request::param('name');
 *  获取当前请求的所有变量（经过过滤）
 * Request::param();
 * 获取当前请求未经过滤的所有变量
 * Request::param(false);
 * 获取部分变量
 * Request::param(['name', 'email']);
 *
 *
 *  -------------------获取输入变量的时候，可以支持默认值，------------------------------
 * Request::get('name'); // 返回值为null
 * Request::get('name',''); // 返回值为空字符串
 * Request::get('name','default'); // 返回值为default
 *
 *
 * 变量过滤
 * 框架默认没有设置任何全局过滤规则，你可以在app\Request对象中设置filter全局过滤属性：
 *
 * namespace app;
 *
 * class Request extends \think\Request
 * {
 * protected $filter = ['htmlspecialchars'];
 * }
 *
 * 变量修饰符
 * Request::变量类型('变量名/修饰符');
 * 支持的变量修饰符，包括：
 *
 * 修饰符    作用
 * s    强制转换为字符串类型
 * d    强制转换为整型类型
 * b    强制转换为布尔类型
 * a    强制转换为数组类型
 * f    强制转换为浮点类型
 * 下面是一些例子：
 *
 * Request::get('id/d');
 * Request::post('name/s');
 * Request::post('ids/a')
 *
 *
 * 助手函数
 * 为了简化使用，还可以使用系统提供的input助手函数完成上述大部分功能。
 *
 * 判断变量是否定义
 *
 * input('?get.id');
 * input('?post.name');
 * 获取PARAM参数
 *
 * input('param.name'); // 获取单个参数
 * input('param.'); // 获取全部参数
 * // 下面是等效的
 * input('name');
 * input('');
 * 获取GET参数
 *
 * // 获取单个变量
 * input('get.id');
 * // 使用过滤方法获取 默认为空字符串
 * input('get.name');
 * // 获取全部变量
 * input('get.');
 * 使用过滤方法
 *
 * input('get.name','','htmlspecialchars'); // 获取get变量 并用htmlspecialchars函数过滤
 * input('username','','strip_tags'); // 获取param变量 并用strip_tags函数过滤
 * input('post.name','','org\Filter::safeHtml'); // 获取post变量 并用org\Filter类的safeHtml方法过滤
 * 复制
 * 使用变量修饰符
 *
 * input('get.id/d');
 * input('post.name/s');
 * input('post.ids/a');
 *
 *
 *
 */
class Rely
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(Request $request)
    {
        return $request->param('name');
    }

    public function get()
    {
//        return $this->request->param('name');
//        return Request::param('name');

        dump(Request::has('name'));
    }
}