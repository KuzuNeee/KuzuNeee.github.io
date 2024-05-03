<?php
/**
 * 在线要饭系统
 *
 * @copyright  Copyright (c) 2018 不忘初心 (https://www.bwcx.pro)
 * @license    GNU General Public License 2.0
 * @version    V1.8
 */
function md5Sign($prestr, $key) {
	$prestr = $prestr . $key;
	return md5($prestr);
}
function md5Verify($prestr, $sign, $key) {
	$prestr = $prestr . $key;
	$mysgin = md5($prestr);
	if($mysgin == $sign) {
		return true;
	}
	else {
		return false;
	}
}
?>