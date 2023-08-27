<?php
error_reporting(0);
@date_default_timezone_set('Asia/Shanghai');
@header('Content-Type: text/html; charset=UTF-8');
define('VERSION', '1027');
include_once "functions.php";
include_once "360_safe3.php";
$classversion = "1.2.7";
$cloudversion = file_get_contents("http://bqyj.qq-bq.cn/classmate/CloudUpdate.php"); //最新版本API
$updatemsg = get_curl("http://bqyj.qq-bq.cn/classmate/UpdateMsg.php"); //更新日志API
$download = file_get_contents("http://bqyj.qq-bq.cn/classmate/Download.php"); //下载地址API
$sddownload = $download; //下载地址API
$gonggao = get_curl("http://bqyj.qq-bq.cn/classmate/GongGao.php"); //程序公告API
if(!isset($_SESSION['authcode'])) {
	$query=file_get_contents('http://www.mzan.me/check.php?url='.$_SERVER['HTTP_HOST']);
	if($query=json_decode($query,true)) {
		if($query['code']==1)$_SESSION['authcode']=true;
		else exit('<h3>'.$query['msg'].'</h3>');
	}
}
$domain = $_SERVER['HTTP_HOST'];
$mysql = (require "config.php");
try {
$db = new PDO("mysql:host=" . $mysql['DB_HOST'] . ";dbname=" . $mysql['DB_NAME'] . ";port=" . $mysql['DB_PORT'], $mysql['DB_USER'], $mysql['DB_PWD']);
} catch (Exception $e) {
exit('链接数据库失败:' . $e->getMessage());
}
$db->exec("set names utf8");
$prefix = $mysql['DB_PREFIX'];
if ($rows = $db->query('select * from ' . $prefix . 'webconfigs')) {
    while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
        $webconfig[$row['vkey']] = $row['value'];
    }
    C($webconfig);
}
$cookiesid = $_COOKIE['bqyj_sid'];
if (preg_match('/^[0-9a-z]{32}$/i', $cookiesid)) {
    $stmt = $db->prepare("select * from {$prefix}users where sid =:sid limit 1");
    $stmt->execute(array(':sid' => safestr($cookiesid)));
    if ($cookiesid && ($userrow = $stmt->fetch(PDO::FETCH_ASSOC))) {
        C('loginuser', $userrow['user']);
        C('loginuid', $userrow['uid']);
    }
}
?>