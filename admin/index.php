<?php
/**
 * 在线要饭系统
 *
 * @copyright  Copyright (c) 2018 不忘初心 (https://www.bwcx.pro)
 * @license    GNU General Public License 2.0
 * @version    V1.8
 */
$mod='blank';
include("../core/common.php");
$title='要饭系统后台管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">后台管理</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="./"><span class="glyphicon glyphicon-user"></span> 平台首页</a>
          </li>
		  <li>
           
          </li>
		  <li><a href="./set.php"><span class="glyphicon glyphicon-cog"></span> 系统设置</a></li>
		  <li><a href="../"><span class="glyphicon glyphicon-home"></span> 返回首页</a></li>
          <li><a href="./login.php?logout"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
<?php
$count=$DB->count("SELECT count(*) from bwcx_log WHERE siteid='$siteid'");
$mysqlversion=$DB->count("select VERSION()");
$fz=$DB->count("SELECT domain(*) from bwcx_domain WHERE domain='$domain'");
 
		$sql=" `km`='{$_GET['kw']}'";
	$numrows=$DB->count("SELECT count(*) from bwcx_domain WHERE 1");
?>                 
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">后台管理首页</h3></div>
           <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b> <?=$date?></li>
             </ul>
          <li class="list-group-item"><span class="glyphicon glyphicon-check"></span> <b>程序版本：</b> V1.8   <a href="#" onclick="checkresult()" class="btn btn-xs btn-success">检测更新</a></li>
             </ul>                              
               <li class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> <b><a href="./set.php" class="btn btn-default btn-sm">网站设置</a>
    </div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">服务器信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>PHP 版本：</b><?php echo phpversion() ?>
			<?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
		</li>
		<li class="list-group-item">
			<b>MySQL 版本：</b><?php echo $mysqlversion ?>
		</li>
		<li class="list-group-item">
			<b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?>
		</li>
		
		<li class="list-group-item">
			<b>程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>s
		</li>
		<li class="list-group-item">
			<b>POST许可：</b><?php echo ini_get('post_max_size'); ?>
		</li>
		<li class="list-group-item">
			<b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?>
		</li>
	</ul>
</div>
    </div>
  </div>
<script src="//cdn.bootcss.com/layer/3.1.0/layer.js"></script>
<script>
function checkresult() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "https://www.bwcx.pro/yaofanver.php",
            data: {ver: "1.8"}, //请求数据
            timeout: 10000, //ajax请求超时时间10s
            success: function (data, textStatus) {
                //从服务器得到数据，显示数据并继续查询
                if (data.code == 1) {
				           	layer.alert('发现新版本，点击确定前往烟雨博客下载新版本~', {skin: 'layui-layer-lan',closeBtn: 0,anim: 1,maxWidth: 320,title: '检测更新',btn: ['确定', '取消']},function() {window.location.href = 'https://www.bwcx.pro/1812.html';});
                }else{
                layer.msg('您使用的已经是最新版本啦~');
                }
            },
            //Ajax请求超时，继续查询
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                layer.msg('更新服务器开小差了~');
            }
        });
    }
</script>