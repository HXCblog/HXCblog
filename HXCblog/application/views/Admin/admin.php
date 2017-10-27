<!--
管理员信息博主名片页
时间：20170726
作者:HXC	
-->
<div class="card_box">
	<div class="layui-tab layui-tab-card admin_bg">
	  <ul class="layui-tab-title">
	    <li class="layui-this">名片设置</li>
	  </ul>
	  <div class="layui-tab-content" >
	    <div class="layui-tab-item layui-show">
			<!--表单-->
			<form class="layui-form layui-form-pane"  method = "post" action = "<?php echo site_url('Admin/updateinfo');?>">
			<!--头像开始-->
			<div class="adminpic">
				<img class="img-circle" src="<?php echo base_url();?><?php echo $info['photo']; ?>" >
			</div>
			<!--头像结束-->

			<div class="card_text">
				<!--昵称开始-->
				  <div class="layui-form-item">
				    <label class="layui-form-label">昵称</label>
				    <div class="layui-input-inline">
				      <input type="text" id="inputName1" name="username" lay-verify="required" value = "<?php echo $info['username']; ?>" placeholder="请输入昵称" autocomplete="off" class="layui-input">
				    </div>
				  </div>
				<!--昵称结束-->

				<!--联系开始-->
				  <div class="layui-form-item">
				    <label class="layui-form-label">联系我</label>
				    <div class="layui-input-inline">
				      <input type="email" id="inputEmail3" value = "<?php echo $info['email']; ?>" name = "email" lay-verify="required" placeholder="输入邮箱" autocomplete="off" class="layui-input">
				    </div>
				  </div>
				<!--联系结束-->
			</div>
			<!--格言开始-->
			  <div class="layui-form-item layui-form-text">
			    <div class="layui-input-block">
			      <textarea placeholder="请输入人生格言" id="inputLocate2" value = "<?php echo $info['location']; ?>" name = "location" class="layui-textarea"></textarea>
			    </div>
			  </div>
			<!--格言结束-->
			<button class="layui-btn layui-btn-normal" id = "changebtn">修改名片</button>
			<button class="layui-btn layui-btn-danger" type = "submit" id = "submit">添加名片</button>
					
		   </form>
	       <!--表单结束-->
	    </div>
	  </div>
	</div>
</div>








