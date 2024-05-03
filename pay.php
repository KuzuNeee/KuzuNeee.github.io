<?php
/**
 * 在线要饭系统
 *
 * @copyright  Copyright (c) 2018 不忘初心 (https://www.bwcx.pro)
 * @license    GNU General Public License 2.0
 * @version    V1.8
 */
include("./core/common.php");
require_once(SYSTEM_ROOT."lib/submit.class.php");
$out_trade_no = $_POST['WIDout_trade_no'];
$type = $_POST['type'];
$name = $conf['liuyan'];
$money = $_POST['WIDtotal_fee'];
$parameter = array(
		"pid" => trim($alipay_config['partner']),
		"type" => $type,
		"out_trade_no"	=> $out_trade_no,
		"name"	=> $name,
		"money"	=> $money,
		"sitename"	=> $conf['sitename'],
		"notify_url"	=> $siteurl.'notify_url.php',
		"return_url"	=> $siteurl.'return_url.php'
);
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter);
echo $html_text;
?>