# HXCblog博客 v1.0 主要基于Codeigniter + layui开发，是一套简练简介的个人博客程序，并一同开发了该系统APP客户端。
基于CI+layui开发的个人博客系统
##博客系统简介

* HXC v1.0主要基于Codeigniter + layui开发
* 版本：HXC v1.0 简要版
* 时间：2017年8月
* 托管于阿里云 ECS
* 服务器环境为： centos 6.8 + Apache + Mysql 

####博客地址：
[胡新春博客:www.huxinchun.com](http://www.huxinchun.com)

邮箱：hi@huxinchun.com
> 说明：本人非php程序员，技术粗浅，该博客系统还有许多不够完善和有待开发和优化的部分，暂时发布该简要版只为方便分享和交流。

##后台主要功能
* 内容管理：文章的增、删、改、查。
* 栏目设置：可添加，修改，删除文章分类与栏目。
* 名片设置：展示博主信息。
* 用户管理：后台管理员账号和密码修改。
* 版本计划：为方便后期更新，提供的更新计划增加与修改。
* 友情链接：更新计划中。
* 留言板：完成。
* 时间轴：更新计划中。
* 页面标签：更新计划中。

##前台主题
清新简约的原创主题，自适应，兼容性好，在不同设备上都有较优的体验感。

##安装使用说明
后台使用CodeIgniter框架开发，安装步骤和ci基本类似。

* 1、解压缩安装包，将HXCblog文件夹及里面的文件上传到服务器，index.php 文件将位于网站的根目录.
* 2、使用文本编辑器打开 application/config/config.php 文件设置你网站的根URL
* 3、如果你打算使用数据库，打开 application/config/database.php 文件设置数据库参数。修改为自己的数据库地址，账户，密码，及数据库。
* 4、将hxcblog.sql文件导入数据库中或者复制数据库使用SQL语句添加创建。
* 5、默认用户名和密码都是：admin 。
* 6、ci框架详细安装说明，及安全增强配置请参考：https://codeigniter.org.cn/user_guide/installation/index.html

##HXC v1.0 文件目录

##CI 流程控制图
* 1、index.php 文件作为前端控制器，初始化运行 CodeIgniter 所需的基本资源；
* 2、Router 检查 HTTP 请求，以确定如何处理该请求；
* 3、如果存在缓存文件，将直接输出到浏览器，不用走下面正常的系统流程；
* 4、在加载应用程序控制器之前，对 HTTP 请求以及任何用户提交的数据进行安全检查；
* 5、控制器加载模型、核心类库、辅助函数以及其他所有处理请求所需的资源；
* 6、最后一步，渲染视图并发送至浏览器，如果开启了缓存，视图被会先缓存起来用于 后续的请求。
##其他设置：

移除 URL 中的 index.php
默认情况，你的 URL 中会包含 index.php 文件:
`example.com/index.php/news/article/my_article`
如果你的 Apache 服务器启用了 mod_rewrite ，你可以简单的通过一个 .htaccess 文件再加上一些简单的规则就可以移除 index.php 了。  
下面是这个文件的一个例子， 其中使用了 "否定条件" 来排除某些不需要重定向的项目：

* RewriteEngine On  
* RewriteCond %{REQUEST_FILENAME} !-f  
* RewriteCond %{REQUEST_FILENAME} !-d  
* RewriteRule ^(.*)$ index.php/$1 [L]

在上面的例子中，除已存在的目录和文件，其他的 HTTP 请求都会经过你的 index.php 文件。
ci官方手册：`https://codeigniter.org.cn/user_guide/general/urls.html`

* apache服务器开始rewrite模块详解：`https://yq.aliyun.com/ziliao/48568`

设置默认路由（路由规则定义在 `application/config/routes.php`文件里）

`$route['default_controller'] = 'home' `为首页，
其中“home”替换为你的首页控制器名
参考：`http://codeigniter.org.cn/user_guide/general/routing.html`
##后台界面预览：

