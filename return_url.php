<?php
/**
 * 在线要饭系统
 *
 * @copyright  Copyright (c) 2018 不忘初心 (https://www.bwcx.pro)
 * @license    GNU General Public License 2.0
 * @version    V1.8
 */
include("./core/common.php");
require_once(SYSTEM_ROOT."lib/notify.class.php");
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {
$out_trade_no = $_GET['out_trade_no'];
$trade_no = $_GET['trade_no'];
$trade_status = $_GET['trade_status'];
$type = $_GET['type'];
if($_GET['trade_status'] == 'TRADE_SUCCESS') {
}else{
echo "trade_status=".$_GET['trade_status'];
}
echo '<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script><title>施舍成功！</title></head><body></body><script type="text/javascript">swal({title: "施舍成功",text: "谢谢你，好人有好报！", type: "success"},function(){ window.location.href="./";});</script></body></html>';
}else{
echo '<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script><title>施舍失败！</title></head><body></body><script type="text/javascript">swal({title: "施舍失败",text: "嘤嘤嘤，又吃不到饭饭了！", type: "error"},function(){ window.location.href="./";});</script></body></html>';
}
?>