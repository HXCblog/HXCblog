<!--
文件名：后台登录界面
时间：20170816
作者：HXC
-->


<!-- 文档类型声明 -->
<!DOCTYPE html> 
<!-- 文档使用中文 -->                 
<html lang = "zh-cn">
  <head>
	<!-- 网页标题 -->
    <title>Login</title>
	<!-- 设置当前文档的编码格式 -->
	<meta charset = "utf-8">
	<!-- 设置IE浏览器的解析模式 -->
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	<!-- 设置视窗 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/theme/layui/css/layui.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/theme/css/admin.css">
  <!-- Bootstrap -->
  <link href="<?php echo base_url();?>/public/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url();?>/public/theme/layui/css/layui.css"  media="all">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
body{
background: #eee;
}
</style>
</head>
<body>

<div class="login_box">
  <div class="login_title">后台登录</div>
    <form class="layui-form layui-form-pane" method="post" action = "<?php echo site_url('Login/check');?>">
      <div class="layui-form-item">
      <h4 class="text-danger"><?php echo $login_error; ?></h4>
          <label class="layui-form-label">用户名：</label>
          <div class="layui-input-inline">
            <input type="text" name="username" id="username" lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input" value = "<?php echo set_value('username');?>">
          </div>
      </div>
      <!--密码-->
      <div class="layui-form-item">
          <label class="layui-form-label">密&nbsp;&nbsp;&nbsp;码：</label>
          <div class="layui-input-inline">
            <input type="password" name="password" id="password" lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input" value = "<?php echo set_value('password');?>">
          </div>
          <?php echo form_error('password','<p class="help-inline text-danger">','</p>');?>
      </div>

      <!--验证码-->
      <div class="layui-form-item">
          <label class="layui-form-label">验证码：</label>
          <div class="layui-input-inline">
            <input type="text" name="checknum" id="checknum" lay-verify="required" placeholder="请输入验证码" autocomplete="off" class="layui-input" value = "<?php echo set_value('checknum');?>">
          </div>
          <?php echo form_error('checknum','<p class="help-inline text-danger">','</p>');?>
      </div>
      
      <!--按钮-->
      <div class="layui-form-item">
          <div class="layui-input-inline" style="width: 147px;height: 38px;">
			<?php echo $yzm; ?>
          </div>
          <div class="layui-input-inline" style="width: 150px;height: 38px;">
          <button class="layui-btn">登录</button>
          <a href="<?php echo site_url('Home/index');?>" class="layui-btn layui-btn-primary" role = "button">返回</a>
          </div>
      </div>

    </form>
  </div>
</div>

    <!--加载layui-->
  	<script src="<?php echo base_url();?>/public/theme/layui/layui.js" charset="utf-8"></script>
  	<script src="<?php echo base_url();?>/public/theme/js/layuimod.js" charset="utf-8"></script>

    <!-- 2.加载jQuery库，同时加载该库必须在加载bootstrap.min.js之前 -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- 3.加载bootstrap的核心js库 -->
    <script src="<?php echo base_url();?>/public/js/bootstrap.min.js"></script>
  </body>
</html>