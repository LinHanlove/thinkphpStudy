<?php

namespace app\controller;

/**
 * 注解路由
 * 路由的注解方式，并非系统默认支持，而是可选方案，需要额外安装扩展
 * 安装扩展命令如下
 * composer require topthink/think-annotation
 * 使用use引入
 * use think\annotation\Route
 *
 * 然后在控制器设置注解代码即可，可以使用PHPDOC生成一段，然后添加路由规则
 * 必须使用双引号
 * @params $id
 * @return string
 * @route("datails/:id")
 *
 *
 *
 */
