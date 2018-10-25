<div style="width:70%;display: inline-block;margin: 5px;margin-top:35px;  position: absolute;">
<div class="layui-tab layui-tab-card" style="background: #fff;">
  <ul class="layui-tab-title">
    <li class="layui-this">添加文章</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		<!--内容开始-->
		<form class="form-horizontal" method = "post" action = "<?php echo site_url('Article/insertart');?>">
		<div class="form-group">
			<label for="exampleInputTitle" class="control-label col-sm-2">所属栏目：</label>
			<div class="col-sm-4">
				<select name="category" style="width:90px;height:30px;">
					<?php foreach($category as $val){?>
					<option value="<?php echo $val['cid']?>"><?php echo $val['catename'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputTitle" class="control-label col-sm-2">文章标题：</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="exampleInputTitle" name = "title">
			</div>
			<label for="exampleInputAuthor" class="control-label col-sm-2">文章作者：</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="exampleInputAuthor" name = "author">
			</div>
			
		</div>
		<div class="form-group">
			<label for="exampleInputDesc" class="control-label col-sm-2">描述内容：</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="2" name = "description"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputContent" class="control-label col-sm-2">文章内容：</label>
			<div class="col-sm-10">
				<script id="container" name="content" type="text/plain" style="width:100%;"></script>
			</div>
		</div>
    <!-- 配置文件 -->
    <script type="text/javascript" src="<?php echo base_url();?>/public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo base_url();?>/public/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
		initialFrameHeight:350,//设置编辑器高度
		scaleEnabled:true//设置不自动调整高度
		//scaleEnabled {Boolean} [默认值：false]//是否可以拉伸长高，(设置true开启时，自动长高失效)
		});
    </script>
	<div class="col-sm-offset-6">
	<button class="layui-btn layui-btn-normal" type = "submit"><i class="layui-icon" style="font-size: 16px; color: #eee;">&#xe609;</i>   发布</button>
	</div>
	</form>
		<!--内容结束-->
    </div>
  </div>
</div>
</div>



	












