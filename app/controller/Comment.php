<?php

namespace app\controller;


/**
 * 域名映射  C:\Windows\System32\drivers\etc\hosts
 * 在此可以添加二级域名，127.0.0.1 news.notion.com
 *
 * 限制在特定域名下才有效--使用域名路由闭包的形式
 * 也可以用数组的形式限制多个二级域名
 * Route::domain('news.notion.com',function(){
 *     Route::rule('details/:id','address/details')
 * })
 *
 * 可以作为方法进行二级域名开发部分的检测，或完整域名检测
 * 同样也支持ext pattern append 等路由参数方法的操作
 *  Route::rule('details/:id','address/details') -> domain('news.notion.com')
 *
 * --------------------跨域请求-----------------------------
 * 解除跨域请求的限制
 * Route::rule('details/:id','address/details') -> ext('html') -> allowCrossDomain()
 * 限制跨域请求的域名
 * Route::rule('details/:id','address/details')
 *      -> allowCrossDomain([
 *          'Access-Control-Allow-Origin' => 'http://notion.top'
 *       ])
 * ---------------------路由分组-----------------------------------
 *  路由分组将相同前缀的路由合并分组，这样可以简化路由定义 提高匹配效率
 *  1.  group() 分组路由的注册
 *  Route::group('address',function(){
 *      Route::rule(':/id','address/details'),
 *      Route::rule(':/name','address/details'),
 *  }) -> ext('html') -> pattern(['id' => '\d+','name' => '\w+'])
 *
 *  2. 可以省去第一参数，更加灵活
 * Route::group(function(){
 *       Route::rule(':/id','address/details'),
 *       Route::rule(':/name','address/details'),
 *   }) -> ext('html') -> pattern(['id' => '\d+','name' => '\w+'])
 *
 * 3. prefix() 省略分组地址里的控制器
 * 使用append 可以额外传入参数
 * Route::group('address',function(){
 *       Route::rule(':/id','details'),
 *       Route::rule(':/name','details'),
 *   }) -> ext('html') -> prefix('Address/') -> pattern(['id' => '\d+','name' => '\w+'])
 * 注意：路由规则加载解析时会消耗较多的资源
 * 我们可以在route.php中延迟解析
 *  'url_lazy_route' => true
 *
 * ------------------------MISS路由--------------------------------------
 * 全局 miss类似开启强制路由功能，匹配到不同规则时自动跳转到miss
 * Route::miss('public/miss')
 *
 * 分组miss可以在分组中使用miss方法，当不满足匹配规则时跳转到这里
 * Route::miss('miss')
 *
 * -------------------------资源路由-----------------------------------------
 * 采用固定的方法来简化URL功能
 * Route::resource('ads','Address');
 *
 * 快速生成一个资源控制器,从生成的多个方法，包含了显示，增删查改等多个操作方法
 * php think make:controller Bolg
 *
 * 在路由定义文件下创建一个资源路由，资源名称自定义
 * Router::resource('blog','Blog');   blog表示资源规则名称，Blog表示路由访问路径
 *
 * 资源注册成功后会自动提供一下方法
 * GET -> index create read edit
 * POST -> save
 * PUT -> update
 * DELETE -> delete
 *
 * 可以通过only() 限制系统提供的资源方法
 *  -> only(['index','save'])
 *
 * except()  排除系统提供的方法
 * -> only(['index','save'])
 *
 * rest() 修改系统提供的方法  请求方式 地址  操作
 * Route::rest('create',['GET','/:id/add' , 'add'])
 *
 * 批量修改
 * Route::rest([
 *      'create',['GET','/:id/add' , 'add'],
 *      'update',['PUT','/:id/add' , 'save']
 *     ])
 *
 * 创建嵌套路由，可以让上级资源对下级资源进行操作，创建Comment资源
 *
 * Route::resource('blog.common','Comment')
 *
 * 嵌套路由规则
 * http://localhost:8000/blog/:blog_id/comment/:id
 * http://localhost:8000/blog/:blog_id/comment/:id/edit
 *
 *
 * 嵌套资源生成的上级资源默认id为blog_id,可以通过vars修改
 * Route.resource('blog.common','Comment') -> vars(['blog' => 'blog_id'])
 *
 */
class Comment
{
    /**
     * @param $id
     * @param $blog_id
     *
     */
    public function read($id, $blog_id)
    {
        return '评论id：' . $id . '帖子id:' . $blog_id;
    }

    /**
     * @param $id
     * @param $blog_id
     * @return string
     */
    public function edit($id, $blog_id)
    {
        return '评论id：' . $id . '帖子id:' . $blog_id;
    }
}