<!DOCTYPE html>
<html style="height: 100%">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>HXC后台管理</title>
  <link rel="stylesheet" href="<?php echo base_url();?>/public/theme/layui/css/layui.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/theme/css/admin.css">
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>/public/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
a:hover{
	text-decoration: none;
}
</style>
  <script type="text/javascript">
      function del(){
        var msg = confirm("确定删除吗？");
        if(msg == true){
          return true;
        }else{
          return false;
        }
      }
  </script>
  </head>
</head>

<body style="height: 100%;background: #f8f8f8;">

<!--顶部导航开始-->
<div class="nav_top">
	<div class="nav_title">
    <i class="layui-icon" style="font-size: 35px; color: #7eaeea;">&#xe62e;</i>HXC博客管理系统</div>
	<div class="nav_li">
  	<ul class="layui-nav">
  	  <li class="layui-nav-item"><a href="<?php echo site_url('Home/index');?>" target="_blank"><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe632;</i> 网站首页</a></li>
  	  <li class="layui-nav-item"><a href="<?php echo site_url('Admin/index');?>" target="_blank"><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe630;</i> 后台主页</a></li>
  	  <li class="layui-nav-item"><a id = "logout" href="<?php echo site_url('Login/logout');?>"><i class="layui-icon" style="font-size: 15px; color: #009688;">&#x1007;</i> 退出</a></li>
  	</ul>
	</div>
</div>
<!--顶部导航结束-->

<!--左侧导航开始-->
<div class="left_nav" >
  <ul class="layui-nav layui-nav-tree" lay-filter="demo">
    <li class="layui-nav-item layui-nav-itemed">
      <a href="<?php echo site_url('Admin/index');?>"><i class="layui-icon" style="font-size: 15px; color: #fb5151;">&#xe649;</i>  后台主页</a>
    </li>
    <li class="layui-nav-item"><a href="<?php echo site_url('Admin/show');?>"><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe614;</i>  名片设置</a></li>
    <li class="layui-nav-item"><a href="<?php echo site_url('Category/index');?>"><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe62a;</i>  栏目管理</a></li>
    <li class="layui-nav-item"><a href="<?php echo site_url('Article/index');?>"><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe60a;</i>  内容管理</a></li>
    <li class="layui-nav-item"><a href="<?php echo site_url('Admin/pass');?>"><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe612;</i>  用户管理</a></li>
    <li class="layui-nav-item"><a href="<?php echo site_url('Admin/version');?>"><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe61e;</i>  版本计划</a></li>
    <li class="layui-nav-item"><a href=""><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe64c;</i>   友情链接</a></li>
    <li class="layui-nav-item"><a href=""><i class="layui-icon" style="font-size: 15px; color: #009688;">&#xe61f;</i>   扩展功能</a></li>
  </ul>
</div>
<!--左侧导航结束-->


<!--加载layui-->
<script src="<?php echo base_url();?>/public/theme/layui/layui.js" charset="utf-8"></script>
<script src="<?php echo base_url();?>/public/theme/js/layuimod.js" charset="utf-8"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
