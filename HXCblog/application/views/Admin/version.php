<!--
版本与计划
时间：20170815
作者:HXC
-->

<div class="plan_box" >
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">版本与计划设置</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		<!--内容更新开始-->
		<form class="layui-form layui-form-pane" method = "post" action = "<?php echo site_url('Admin/addplan');?>" id = "form_plan">
		<!--版本-->
		  <div class="layui-form-item" style="display: inline-block;">
		    <label class="layui-form-label">发布版本</label>
		    <div class="layui-input-inline">
		      <input type="text" name="usedtime" id="inputTime2" lay-verify="required" placeholder="请输入版本号" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		<!--时间-->
		  <div class="layui-form-item" style="display: inline-block;">
		    <label class="layui-form-label">发布时间</label>
		    <div class="layui-input-inline">
		      <input type="text" name = "finished" id="inputDate3" lay-verify="required" placeholder="发布时间" autocomplete="off" class="layui-input" onclick="layui.laydate({elem: this, festival: true})">
		    </div>
		  </div>

		<!--内容-->
			<div class="layui-form-item layui-form-text">
			    <div class="layui-input-block">
			      <textarea placeholder="请输入更新内容" autocomplete="off" name = "planname" id="inputPlan1" class="layui-textarea"></textarea>
			    </div>
			 </div>
			 	 <button class="layui-btn" lay-submit="" lay-filter="demo1" id = "addplan">发布</button>
      			 <button type="submit" class="layui-btn layui-btn-danger">修改</button>
		</form>
		<!--内容更新结束-->

		<!--计划列表开始-->
		<div style="display: inline-block;">
			<div class="layui-form">
			  <table class="layui-table">
			    <colgroup>
			      <col width="150">
			      <col width="150">
			      <col width="300">
			      <col width="150">
			      <col>
			    </colgroup>
			    <thead>
			      <tr>
			        <th>发布版本</th>
			        <th>发布时间</th>
			        <th>更新内容</th>
			        <th>操作</th>
			      </tr> 
			    </thead>
			     <?php foreach($plan as $val){?>
			    <tbody>
			      <tr>
			       <td class = "<?php echo $val['id']?>" name = "usedtime"><?php echo $val['usedtime'];?></td>
			       <td class = "<?php echo $val['id']?>" name = "finished"><?php echo $val['finished'];?></td>
			       <td class = "<?php echo $val['id']?>" name = "planname"><?php echo $val['planname'];?></td>
			       <td><a href = "#" class = "changeplan" id = "<?php echo $val['id']; ?>">修改</a> | <a href="<?php echo site_url(array('Admin','delplan',$val['id']));?>" onclick = "javascript:return del()">删除</a></td>
			      </tr>
			    </tbody>
			    <?php } ?>
			  </table>
			</div>
		</div>
		<!--计划列表结束-->

    </div>
  </div>
</div>
</div>


<!--时间选择-->
<script src="<?php echo base_url();?>/public/theme/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->


<!--layui 表单自动获取时间-->
<script>
layui.use('laydate', function(){
  var laydate = layui.laydate;
  
  var start = {
    min: laydate.now()
    ,max: '2099-06-16 23:59:59'
    ,istoday: false
    ,choose: function(datas){
      end.min = datas; //开始日选好后，重置结束日的最小日期
      end.start = datas //将结束日的初始值设定为开始日
    }
  };
  
  var end = {
    min: laydate.now()
    ,max: '2099-06-16 23:59:59'
    ,istoday: false
    ,choose: function(datas){
      start.max = datas; //结束日选好后，重置开始日的最大日期
    }
  };
  
  document.getElementById('LAY_demorange_s').onclick = function(){
    start.elem = this;
    laydate(start);
  }
  document.getElementById('LAY_demorange_e').onclick = function(){
    end.elem = this
    laydate(end);
  }
  
});
</script>



  

