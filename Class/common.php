<?php
require_once ('../Core/common.php');

//判断是否登录
if (!C('loginuid')) {
	exit("<script language='javascript'>window.location.href='/login.php';</script>");
} elseif ($userrow['aqproblem'] == '' or $userrow['aqanswer'] == '') {
	if ($aq != 1) exit("<script language='javascript'>alert('请先设置安全问题！');window.location.href='uset.php';</script>");
}

//长时间登陆自动注销登陆
$last_time = $userrow['lasttime'];
$now_time = date("Y-m-d H:i:s");
$Logout_time = date("Y-m-d H:i:s",strtotime("$last_time + 30 minutes"));
if($Logout_time < $now_time){
	$newsid = md5(uniqid() . rand(1, 1000));
	$db->query("update {$prefix}users set sid='$newsid' where uid='{$userrow['uid']}'");
	setcookie("bqyj_sid", "", -1, '/');
	@header("Location:/login.php");
	exit();
}
?>