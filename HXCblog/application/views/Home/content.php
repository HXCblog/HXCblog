<!--
文件名：前台文章页
作者：HXC
时间：20170802
-->

<div class="container">
	<div class="row">

		<div class="col-md-12" style="margin-top: 60px;" >
			<div class="box_style">
				<!--标题开始-->
				<div class="content_title">
					<?php echo $content['title'];?>
				</div>
				<!--标题结束-->
				
				<!--作者开始-->
				<div class="list_bottom">
					<div class="content_aut" >
						<span style="float: left;">
							<i style="color: #009688" class="layui-icon" >&#xe612;</i>&nbsp;作者:
							<?php echo $content['author'];?>
						</span>
						<span style="float: right;">
							<i style="color: #ff7600;font-weight: bold;" class="layui-icon" >&#xe60e;</i>&nbsp;发布时间：<?php echo date("Y-m-d H:i:s",$content['createtime']);?>
						</span>
					</div>
				</div>
				<!--作者结束-->

				<!--内容开始-->		
				<div class="content_style">
					<span class="index_description">
						<?php echo $content['content'];?>
					</span>	
				</div>
				<!--内容结束-->
			</div>
		</div>

		<!--留言-->
		<div class="col-md-12 message_box">
			<div class="message_style" >留言区</div>
		</div>

	</div>
</div>

<!--百度UEditor代码高亮编辑器-->
<script type="text/javascript" src="<?php echo base_url();?>public/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>public/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css">
<script type="text/javascript">
    SyntaxHighlighter.all();
</script>


