<!--
后台导航
时间：20170721
作者：HXC
-->

<!--系统信息部分样式-->

<div class="home_box" >
  <div class="home_div" >
   <!--后台主页功能模块开始-->

   <!--文章管理-->
    <a href = "<?php echo site_url('Article/addarticle'); ?>" >
    <div class="home_li" >
      <div class="home_img"><i class="layui-icon" style="font-size:72px; color: #1E9FFF;">&#xe609;</i> </div>
       <div class="home_title">文章管理</div>
       <div class="home_con">添加/修改/更新/文章内容</div>
    </div>
    </a>
    
    <!--栏目管理-->
    <a href = "<?php echo site_url('Category/index'); ?>" >
    <div class="home_li" >
      <div class="home_img"><i class="layui-icon" style="font-size:72px; color: #1E9FFF;">&#xe62a;</i> </div>
       <div class="home_title">栏目管理</div>
       <div class="home_con">添加/修改/更新/文章栏目</div>
    </div>
    </a>

    <!--用户管理-->
    <a href = "<?php echo site_url('Admin/pass'); ?>" >
     <div class="home_li" >
      <div class="home_img"><i class="layui-icon" style="font-size:72px; color: #1E9FFF;">&#xe612;</i> </div>
       <div class="home_title">用户管理</div>
       <div class="home_con">添加/修改/更新/用户信息</div>
    </div>
    </a>
    <!--后台主页功能模块结束-->

    <!--信息信息列表开始-->
    <div class="layui-form" style="margin: 10px;">
      <table class="layui-table">
        <colgroup>
          <col width="100">
          <col width="200">
          <col width="200">
          <col width="200">
        </colgroup>
        <thead>
          <tr>
            <th>系统信息：</th>
            <th>HXC博客系统v1.0</th>
            <th></th>
            <th></th>
          </tr> 
        </thead>
        <tbody>
          <tr>
            <td>PHP版本：</td>
            <td><?php echo PHP_VERSION; ?></td>
            <td>MySQL版本：</td>
            <td><?php echo $this->db->version(); ?></td>
          </tr>

          <tr>
            <td>环境配置：</td>
            <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
            <td>上传限制：</td>
            <td><?php $max_upload = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled"; echo $max_upload;?></td>
          </tr>

          <tr>
            <td>操作系统：</td>
            <td><?PHP echo PHP_OS; ?></td>
            <td>开发时间：</td>
            <td>2017年8月</td>
          </tr>
          
          <tr>
            <td>服务器时间：</td>
            <td><?php echo date("Y-m-d H:i:s",time());?></td>
            <td>备注：</td>
            <td>hxc-胡新春博客</td>
          </tr>
        </tbody>
      </table>
    </div>
  <!--信息信息列表结束-->
  </div>
</div>
