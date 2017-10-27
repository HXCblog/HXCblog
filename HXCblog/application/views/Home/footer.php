
<!--脚部开始-->
<div class="footer">
	<div class="container">
		<div class="row">
		<div class="col-md-2" ></div>
		<div class="col-md-8 foot_r">©copyringht 2017年最牛X的博客 HXC-胡新春博客 版权所有</div>
		<div class="col-md-2"></div>
		</div>
	</div>
</div>
<!--脚部结束-->

<!--引入layui-->
<script src="<?php echo base_url();?>public/theme/layui/layui.js" charset="utf-8"></script>
<script src="<?php echo base_url();?>public/theme/js/layuimod.js" charset="utf-8"></script>


 	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 引入bootstrap -->
    <script src="<?php echo base_url();?>public/theme/bootstrap/js/bootstrap.min.js"></script>
	<script type = "text/javascript">
		$(function(){
			$("#art_title").click(function(){
				var aid = $(this).attr('name');
				$.post("<?php echo site_url('Home/viewnum');?>",
					{
						id:aid
					});
			});
		});
	</script>
  </body>
</html>