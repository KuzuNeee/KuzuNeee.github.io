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
$verify_result = $alipayNotify->verifyNotify();
if($verify_result) {
$out_trade_no = $_GET['out_trade_no'];
$trade_no = $_GET['trade_no'];
$trade_status = $_GET['trade_status'];
$type = $_GET['type'];
if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
}
echo "success";	
}else{
echo "fail";
}
?>