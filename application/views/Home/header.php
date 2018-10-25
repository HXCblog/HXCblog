<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>HXC博客v1.0-HXCblogv1.0</title>
  <link rel="stylesheet" href="<?php echo base_url();?>public/theme/layui/css/layui.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/theme/css/home.css">
  <!-- Bootstrap -->
    <link href="<?php echo base_url();?>public/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>public/theme/layui/css/layui.css"  media="all">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
body{background: #eee;font-family: Microsoft YaHei;}
</style>
</head>

<body>
<!--pc导航条开始-->
<div class="nav_bar">			
	<ul class="layui-nav">
		<li id="nav_bar_li" >
			<a href="<?php echo site_url('Home/index')?>">
			<img src="<?php echo base_url();?>public/theme/images/logo.png">
			</a>
		</li>
		
		<li class="layui-nav-item layui-this"><a href="<?php echo site_url('Home/index')?>">首页</a></li>
		<!--其他栏目开始-->
		<?php foreach($category as $val){
			$segments = array('Home','block',$val['cid']);
			$url = site_url($segments);
			echo ' <li class="layui-nav-item"><a href='."{$url}".'>'."{$val['catename']}".'</a></li>';
		}?>
		<li id="nav_bar_li2" ><a href="<?php echo site_url('Login/index')?>">登录</a></li>
		<li id="nav_bar_li3" ><img class="img-circle" src = "<?php echo base_url();?><?php echo $userinfo['photo']?>"></li>
		<!--其他栏目结束-->
	</ul>
</div>
<!--pc导航条结束-->


<!-- 移动导航条开始 -->
<div class="mobile_nav">
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:12px;margin-top: 8px;"><span class="glyphicon glyphicon-th-list"></span></button>
		  <ul class="dropdown-menu" style="margin-top: 40px;">
			  <li class="layui-nav-item layui-this"><a href="<?php echo site_url('Home/index')?>">首页</a></li>
				<!--其他栏目开始-->
				<?php foreach($category as $val){
					$segments = array('Home','block',$val['cid']);
					$url = site_url($segments);
					echo ' <li class="layui-nav-item"><a href='."{$url}".'>'."{$val['catename']}".'</a></li>';
				}?>
				<!--其他栏目结束-->
		  </ul>
		  <span id="mobile_img">
		  	<img src="<?php echo base_url();?>public/theme/images/logo.png">
		  </span>
	</div>	
</div>
<!--移动导航结束-->



	