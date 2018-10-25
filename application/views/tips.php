<!--
文件名：信息提示页面
时间：20170814
作者：HXC
-->
<html>
<head>
	<title>信息提示</title>
	<meta http-equiv="refresh" content="0.9;url=<?php echo $route; ?>">
<style type="text/css">
#hxc_box{
	margin: 0 auto;margin-top: 80px; 
	width:420px;height:280px;background: #fff;
	padding: 20px;line-height: 260px;
	text-align: center;
	box-shadow: 2px 2px 2px #5a5a5a;
	border-radius: 3px;font-size: 20px;
}
#hxc_box span{
	position: absolute;
	margin-top: 240px;
	margin-left: 80px;
}

</style>

</head>
<body style="background: #333;">
	<div id="hxc_box">
		<?php echo $tips;?>
		<span><button style="padding: 8px 20px;" type = "submit" id = "addcate" onclick="window.location='<?php echo $route; ?>'">返回</button></span>
	</div>
</body>
</html>