<!--管理员帐号修改页面
时间：20170812
作者：HXC
-->
<div class="pass_box">
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">管理员账号修改</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">

      <div class="pass_form">
        <div class = "text-success" style = "font-size:17px"><?php echo $update_error; ?></div>
        <form class="layui-form layui-form-pane" method="post" action = "<?php echo site_url('Admin/updatepass');?>">
        <!--用户名-->
        <div class="layui-form-item">
            <label class="layui-form-label">用户名：</label>
            <div class="layui-input-inline">
              <input type="text" name="username" lay-verify="required" placeholder="请输入管理员用户名" autocomplete="off" class="layui-input" id="inputName1" name = "username">
            </div>
            <?php echo form_error('username','<p class="help-inline text-danger">','</p>');?>
        </div>
        
        <!--原密码-->
        <div class="layui-form-item">
            <label class="layui-form-label">原密码：</label>
            <div class="layui-input-inline">
              <input type="password" name = "prepass" lay-verify="required" placeholder="请输入原始密码" autocomplete="off" class="layui-input" id="inputPass1" > 
            </div>
            <?php echo form_error('prepass','<p class="help-inline text-danger">','</p>');?>
        </div>
        
        <!--新密码-->
        <div class="layui-form-item">
            <label class="layui-form-label">新密码：</label>
            <div class="layui-input-inline">
              <input type="password" name = "newpass" lay-verify="required" placeholder="请设置新密码" autocomplete="off" class="layui-input" id="inputPass2">
            </div>
            <?php echo form_error('newpass','<p class="help-inline text-danger">','</p>');?>
        </div>
        
        <!--确认新密码-->
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码：</label>
            <div class="layui-input-inline">
              <input type="password" name = "conpass" lay-verify="required" placeholder="请再次输入以确密码" autocomplete="off" class="layui-input" id="inputPass3">
            </div>
            <?php echo form_error('conpass','<p class="help-inline text-danger">','</p>');?>
        </div>
        <div class="col-sm-offset-3">
            <button type="submit" class="layui-btn">提交修改</button>
        </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>


















