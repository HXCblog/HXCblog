<!--
文章列表页
时间：20170726
作者；HXC
-->

<div class="art_list">
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">内容管理</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		<!--栏目列表-->
		<div style="display: inline-block;">
		  <div class="layui-form" style="padding-left: 20px;" >
			  <a class="layui-btn layui-btn-primary">栏目列表</a>
			  <a href = "<?php echo site_url('Article/addarticle'); ?>" role = "button" class="layui-btn">添加文章</a>
		    <table class="layui-table">
				<colgroup>
				<col width="60">
				<col width="300">
				<col width="120">
				<col width="120">
				<col width="200">
					<col width="120">
				</colgroup>

				<thead>
				<tr>
				  <th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose">序号</th>
				  <th>文章标题</th>
				  <th>作者</th>
				  <th>所属栏目</th>
				  <th>创建时间</th>
				  <th>操作选项</th>
				</tr> 
				</thead>

			    <tbody>
			     	<?php 
						$var = 1;
						foreach($article as $val){
					?>
			        <tr>
				        <td><?php echo $var++; ?>.</td>
							<td><?php echo $val['title']; ?></td>
							<td><?php echo $val['author']; ?></td>
							<td><?php echo $val['cid']; ?></td>
							<td><?php echo date('Y-m-d H:i:s',$val['createtime']); ?></td>
							<td><a href = "<?php echo site_url('Article/editart')?>/<?php echo $val['id'];?>">修改</a> | <a href = "<?php echo site_url('Article/delarticle')?>/<?php echo $val['id']; ?>" onclick = "javascript:return del()">删除</a>
						</td>
			        </tr>
			        <?php } ?>
			    </tbody>
		    </table>
		  </div>
		
		<!--文章分页字体色-->
			<style type="text/css">
			.layui-btn a{
				color: #fff;
			}
			.layui-btn-primary a{
				color: #000;
			}
			</style>

			<!--分页开始-->
			<div  style="margin-left: 20px;"><?php echo $links; ?></div>
			<!--分页结束-->

		</div>

    </div>
  </div>
</div>
</div>


