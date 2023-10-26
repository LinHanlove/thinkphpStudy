<?php

namespace app\controller;

use app\model\UserModel;

/**
 * 路由的定义
 * Route::rule('ad','Address/index')  静态路由
 * Route::rule('ad/:id','Address/index')  动态路由
 *
 * 路由定义好后，我们在控制器要创建这个路由地址，可以通过url()方法实现
 * // 不定义标识的做法
 * return url('Address/details',['id'=>10]);
 * // 定义标识法
 * Route::rule('details/:id','Address/detail') -> name('det')
 * return url('det',['id' => 10])
 *
 *
 * 路由地址------------------
 * 1. 路由地址一般为：控制器/操作方法
 * Route::rule('details/:id','Address/details')
 * 2. 多级控制器，并且路由到相应地址   嵌套地址
 *  // 目录为：app\controller\group
 *  namespace app\controller\group;
 *  // 地址为: app\controller\group   域名 - 模块 - 控制器 - 方法
 *  http://localhost:8000/group.blog/details/id/5
 *  // 多级路由
 *  Route::rule('details/:id','group.Blog/details')
 *
 * 3. 对于地址，还有一种完整的路径的方法去执行操作：完整的类名@操作方法
 * 4。 静态方法也可以有完整路径：完整类名::操作方法
 * 5. 路由可以通过::redirect()方法实现重定向跳转，第三参数为状态码
 *  Route::redirect('ds/:id','http://localhost/',302)
 *
 * 路由参数   实施匹配检查和行为执行
 * ext 检测url后缀 比如强制所有url后缀为.html
 * Route::rule('details/:id','address/details') -> ect('html')
 *
 * http方法是检测是否为http请求
 * Route::rule('details/:id','address/details') -> ect('html') -> https()
 *
 * 如果想让全局统一匹配url后缀的话，可以在config/route.php设置
 * 具体值可以是单个或者多个后缀，也可以是任意后缀，false 禁止后缀
 *      ‘url_html_suffix’ => 'html'
 * denyExt方法作用是禁止某些后缀的使用
 * Route::rule('details/:id','address/details') -> denyExt('png|jpeg')
 *
 * domain 方法作用是检测当前域名是否匹配，完整域名和子域名
 * Route::rule('details/:id','address/details')->domain('notion')
 *
 * ajax/pjax/json 检测当前页面是否是以上请求
 * Route::rule('details/:id','address/details') -> ajax()
 *
 * filter 对额外参数进行检测，额外参数可表单提交
 * Route::rule('details/:id','address/details') -> filter(['type' => 1])
 *
 * append() 追加额外参数 这个参数并不需要url传递
 * Route::rule('details/:id','address/details') -> append(['status' => 1])
 *
 *
 * 统一配置多个参数，方便管理，可以使用option方法数组配置
 * Route::rule('details/:id','address/details') -> option([
 *  'ext' => 'html',
 * 'https' => true
 * ])
 *
 */
class  Address
{

    public function index()
    {
        echo 'index';
    }

    public function details($id)
    {
        return json(UserModel::where('id', $id)->find());
    }

    public function url()
    {
        return url('Address/details', ['id' => 5]);
    }
}