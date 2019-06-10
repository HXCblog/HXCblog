# HXCblog v1.0-精简版个人博客系统 
主要基于Codeigniter3框架 +前台后台界面layui1.0开发，非常精简的个人博客系统。

## 博客系统简介

* 后台语言:PHP Codeigniter3
* 后台界面：layui1.0
* 前台界面：layui1.0
* 版本：HXCblogv1.0精简版
* 开发时间：2017年8月
* 开发服务器环境为： centos 6.8 + Apache + Mysql
* Codeigniter框架官方开发环境：Apache
* 演示站部署环境：centos6.8+nginx1.14.0+mysql5.7

##### 说明：本人非php程序员，技术粗浅，HXCblogv1.0精简版博客非常方便记笔记和学习之用，程序完整可用，保留该版本只为方便分享和交流。

## 博客地址：  
* [HXCblogv1.0演示站:http://v1.huxinchun.com](http://v1.huxinchun.com/home)
* [HXC博客:www.huxinchun.com](http://www.huxinchun.com)

* 项目地址：
* [HXCblogv1.0](https://github.com/HXCblog/HXCblog)
* [HXCblogv2.0](https://github.com/HXCblog/HXCblogv2.0)
* [HXCblogv2.5](https://github.com/HXCblog/HXCblogv2.5)
* [HXCblog_app](https://github.com/HXCblog/HXCapp)

邮箱：hi@huxinchun.com

## 后台主要功能
* 内容管理：文章的增、删、改、查。
* 栏目设置：可添加，修改，删除文章分类与栏目。
* 名片设置：展示博主信息。
* 用户管理：后台管理员账号和密码修改。
* 版本计划：为方便后期更新，提供的更新计划增加与修改。

## 前台主题

清新简约，速度快，小巧方便，记笔记专用。

##安装使用说明
####后台使用CodeIgniter3框架开发，安装步骤和ci框架基本类似（ci框架基于apache环境开发）。

* 1、解压缩安装包，将HXCblogv1.0文件夹及里面的文件上传到服务器，index.php 文件将位于网站的根目录.
* 2、使用文本编辑器打开 application/config/config.php 文件设置你网站的根URL   

![Asd](https://github.com/HXCblog/myimages/blob/master/img/1503468157321813.png?raw=true)  


* 3、如果你打算使用数据库，打开 application/config/database.php 文件设置数据库参数。修改为自己的数据库地址，账户，密码，及数据库。  

![ABC23](https://github.com/HXCblog/myimages/blob/master/img/1503468165131636.png?raw=true)  

* 4、新建好数据库，将hxcblogv1.0.sql文件导入数据库中或者复制数据库使用SQL语句添加创建。
* 5、默认用户名和密码都是：admin ；前端默认访问地址为：http://localhost/index.php/home(去除index.php路径化，默认访问地址为：http://localhost/home)；后台登录地址默认为：http://localhost/index.php/admin(或http://localhost/admin)
* 6、ci框架详细安装说明，及安全增强配置请参考：https://codeigniter.org.cn/user_guide/installation/index.html

#### nginx环境中配置参数
如果您使用的nginx环境，博客只能正常显示首页，其他页面均为404，这是由于CI框架是在apache环境中开发的，所以您需要百度CI框架在nginx环境中的配置。如下整理了一份简单的nginx环境中的虚拟主机配置，仅供参考。（如果您使用类似phpstudy等集成环境测试，选择好服务环境后一般不会出现太大问题）
<pre>
server
    {
        listen 80;
        server_name www.demo.com; ##网站域名
        index index.html index.php;
        root  /home/www/HXCblogv1; ##网站根目录
   
        location / {
		   root   /home/wwwr/HXCblogv1/; ##网站根目录
		   index  index.php index.html index.htm;
		   if (!-e $request_filename) {  
		   rewrite ^/(.*)$ /index.php?$1 last;  
		   break;  
		   }  
		}
    }
</pre>

### 补充说明
如果正确安装配置后，出现session_start(): Failed to initialize storage module 
原因分析：php5一个安全模式的bug，默认session的save_path是系统的临时目录，这样会要校验权限。
解决办法：
1.升级php版本
2.修改HXCblogv2\system\libraries\Session\Session.php 140行在session_start()函数前加如下代码：
<pre>
ini_set('session.save_handler', 'files');
</pre>



## HXCblogv1.0 文件目录  

![ABCrwe](https://github.com/HXCblog/myimages/blob/master/img/1503466299718568.png?raw=true)  

## CI框架流程控制图  
![ABCee](https://github.com/HXCblog/myimages/blob/master/img/1503466256419052.png?raw=true)
* 1、index.php 文件作为前端控制器，初始化运行 CodeIgniter 所需的基本资源；
* 2、Router 检查 HTTP 请求，以确定如何处理该请求；
* 3、如果存在缓存文件，将直接输出到浏览器，不用走下面正常的系统流程；
* 4、在加载应用程序控制器之前，对 HTTP 请求以及任何用户提交的数据进行安全检查；
* 5、控制器加载模型、核心类库、辅助函数以及其他所有处理请求所需的资源；
* 6、最后一步，渲染视图并发送至浏览器，如果开启了缓存，视图被会先缓存起来用于 后续的请求。
## 其他设置：
HXCblogv2.0已经按照CI框架说明移除 URL 中的 index.php路径
但CI框架默认路由路径中是带有index.php的，如下是相关操作：（仅在发现路径中任然有index.php的情况下操作）
如果：你的 URL 中会包含 index.php 文件:
`example.com/index.php/news/article/my_article`
如果你的 Apache 服务器启用了 mod_rewrite ，你可以简单的通过一个 .htaccess 文件再加上一些简单的规则就可以移除 index.php 了。  
下面是这个文件的一个例子， 其中使用了 "否定条件" 来排除某些不需要重定向的项目：
<pre>
RewriteEngine On  
RewriteCond %{REQUEST_FILENAME} !-f  
RewriteCond %{REQUEST_FILENAME} !-d  
RewriteRule ^(.*)$ index.php/$1 [L]
</pre>
在上面的例子中，除已存在的目录和文件，其他的 HTTP 请求都会经过你的 index.php 文件。
ci官方手册：`https://codeigniter.org.cn/user_guide/general/urls.html`

* apache服务器开始rewrite模块详解：`https://yq.aliyun.com/ziliao/48568`

设置默认路由（路由规则定义在 `application/config/routes.php`文件里）

`$route['default_controller'] = 'home' `为首页，
其中“home”替换为你的首页控制器名
参考：`http://codeigniter.org.cn/user_guide/general/routing.html`


### 前台界面： 

![主页w](https://github.com/HXCblog/myimages/blob/master/img/%E4%B8%BB%E9%A1%B5.png)   

### 文章页  

![主页re](https://github.com/HXCblog/myimages/blob/master/img/%E6%96%87%E7%AB%A0%E9%A1%B5.png) 

## 后台界面预览：   

![主页ds](https://github.com/HXCblog/myimages/blob/master/img/hxc6.png)   

### 内容编辑页
![主页234sd](https://github.com/HXCblog/myimages/blob/master/img/%E5%86%85%E5%AE%B9%E7%BC%96%E8%BE%91.png) 



