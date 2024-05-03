<?php
/**
 * 在线要饭系统
 *
 * @copyright  Copyright (c) 2018 不忘初心 (https://www.bwcx.pro)
 * @license    GNU General Public License 2.0
 * @version    V1.8
 */
error_reporting(0);

include("./core/common.php");

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<title><?php echo $conf['sitename']; ?></title>
<meta name="keywords" content="<?php echo $conf['keywords']; ?>">
<meta name="description" content="<?php echo $conf['description']; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.9">
<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://css.letvcdn.com/lc04_yinyue/201612/19/20/00/bootstrap.min.css">
<style>
.panel{
    border: none;
    border-radius: 10px;
}
.panel{
   box-shadow: 1px 1px 5px 5px rgba(169, 169, 169, 0.35);
    -moz-box-shadow: 1px 1px 5px 5px rgba(169, 169, 169, 0.35);
}
</style>
<body background="https://ww2.sinaimg.cn/large/a15b4afegy1fpp139ax3wj200o00g073.jpg">
<div class="container" style="padding-top:20px;">
<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<div class="panel panel-primary">
<div class="panel-heading" style="background: linear-gradient(to right,#8ae68a,#5ccdde,#b221ff);"><center><font color="#000000"><b><?php echo $conf['panel']; ?></b></font></center></div>
<div class="panel-body">
<center><div class="alert alert-success"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['kfqq']; ?>&site=qq&menu=yes"><img class="img-circle m-b-xs" style="border: 2px solid #1281FF; margin-left:3px; margin-right:3px;" src="https://q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $conf['kfqq']; ?>&spec=100"; width="60px" height="60px" alt="<?php echo $conf['sitename']; ?>"><br></a><?php echo $conf['gg']; ?>
</div></center>
<form name=alipayment action=pay.php method=post target="_blank">
<div class="input-group">			 
<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span> 施舍单号</span>
<input size="30" name="WIDout_trade_no" value="<?php echo date("YmdHis").mt_rand(100,999); ?>"  class="form-control" />
</div>
<br/>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span> 施舍留言</span>
<input size="30" name="WIDsubject" value="<?php echo $conf['liuyan']; ?>" class="form-control" required="required" />
</div>
<br/>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-yen"></span> 施舍金额</span>
<input size="30" name="WIDtotal_fee" value="1" class="form-control" required="required"/>			        
</div>        			
<br/> 
<center><div class="alert alert-warning">选择一种方式进行施舍...</div></center>
<center>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
<div class="btn-group" role="group">
<button type="radio" name="type" value="alipay" class="btn btn-primary">支付宝</button>
</div>
<div class="btn-group" role="group">
<button type="radio" name="type" value="qqpay" class="btn btn-danger">QQ</button>
</div>
<div class="btn-group" role="group">
<button type="radio" name="type" value="wxpay" class="btn btn-success">微信</button>
</div>
<div class="btn-group" role="group">
<button type="radio" name="type" value="tenpay" class="btn btn-info">财付通</button>
</div>
</div>
</div>
</center> 
</div>
</form>
</div>
<?php
$data = curl_get($alipay_config['apiurl'] . "api.php?act=orders&limit=10&pid=" . $alipay_config['partner'] . "&key=" . $alipay_config['key'] . "&url=" . $_SERVER["HTTP_HOST"]);
$arr = json_decode($data, true);
if ($arr["code"] == 0 - 2)sysmsg("易支付配置信息有误！");
echo "<div class=\"col-xs-12 col-sm-10 col-lg-8 center-block\" style=\"float: none;\"><div class=\"panel panel-primary\"><div class=\"panel-heading\" style=\"background: linear-gradient(to right,#b221ff,#14b7ff,#8ae68a);\"><center><font color=\"#000000\"><b>大佬们的施舍记录</b></font></center></div><div class=\"table-responsive\">\r\n<table class=\"table table-striped\">\r\n<thead><tr><th>订单号</th><th>施舍方式</th><th>施舍金额</th><th>状态</th></tr></thead>\r\n<tbody>";
	foreach ($arr["data"] as $res) {
	echo "<tr><td>" . $res["trade_no"] . "</td><td>".($res['type']=='qqpay'?'QQ':null).($res['type']=='wxpay'?'微信':null).($res['type']=='alipay'?'支付宝':null).($res['type']=='tenpay'?'财付通':null).($res['type']=='no'?'未知方式':null).($res['type']==''?'未知方式':null)."</b></td><td>" . $res["money"] . "元</b></td><td>" . ($res["status"] == 1 ? "<font color=green>已完成施舍</font>" : "<font color=red>未完成施舍</font>") . "</td></tr>";
	}
echo "</tbody>\r\n</table>\r\n</div>\r\n\t</div>";
?>
<?php
$data = curl_get($alipay_config['apiurl'] . "api.php?act=yaofan&pid=" . $alipay_config['partner']);
$info=json_decode($data, true);
?>
<div class="panel panel-info">
<div class="panel-heading" style="background: linear-gradient(to right,#14b7ff,#5ccdde,#b221ff);"><center><font color="#000000"><b>站点日志</b></font></center></h3></div>
<table class="table table-bordered">
<tbody>
<tr>
<td align="center"><font color="#808080"><b>今日施舍总数</b></br><code><?php echo $info['orders_today']; ?></code></br>次</font></td>
<td align="center"><font color="#808080"><b>今日施舍金额</b></br><code><?php echo (round($info['order_today'],2))?></code></br>元</font></td>
</tr>
<tr>
<td align="center"><font color="#808080"><b>昨日施舍总数</b></br><code><?php echo $info['orders_lastday']; ?></code></br>次</font></td>
<td align="center"><font color="#808080"><b>昨日施舍金额</b></br><code><?php echo (round($info['order_lastday'],2))?></code></br>元</font></td>
</tr>
<tr height=50>
<td align="center"><font color="#808080"><b>累计施舍总数</b></br><code><?php echo $info['orders']; ?></code></br>次</font></td>
	<td align="center"><font color="#808080"><b>累计施舍金额</b></br><code><?php echo (round($info['order'],2))?></code></br>元</font></td>
<tbody>
</table>
</div>
<p style="text-align:center">&copy; Powered by <a href="<?php echo $siteurl; ?>"><?php echo $conf['copy']; ?></a>!</p>
<audio autoplay="autoplay" height="100" width="100">
<source src="<?php echo $conf['music']; ?>" type="audio/mp3" />
</audio> 
</body>
</html>