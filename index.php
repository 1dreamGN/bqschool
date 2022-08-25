<?php

// 自定义应用目录

define('CONN_PATH', __DIR__ . '/Core/');

//检查是否安装并获取数据库信息
if (!file_exists(CONN_PATH ."/config.php")) {
    header("Location:/install");
    exit();
}

//PHP版本支持检测
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    exit('require PHP > 5.3.0 !');
}

// 加载框架引导文件
require CONN_PATH . "/common.php";

if ($_GET['rand'] && $_COOKIE['bqyj_session'] != $_GET['rand']) {
    @header("Location:");
    exit();
}

if (!$_COOKIE['bqyj_session']) {
    if (!getspider()) {
        $session = md5(uniqid() . rand(1, 1000) . '1340176819');
        $_SESSION['bqyj_session'] = $session;
        setcookie("bqyj_session", $session, time() + 3600 * 24 * 14, '/');
        exit("<script language='javascript'>window.location.href='?{$_SERVER['QUERY_STRING']}&rand={$session}';</script>");
    }
}
if (C("version") != "1027") {
    if (!$install) {
        echo '请先完成网站升级！<a href="/install/update.php"><font color=red>点此升级</font></a>';
        exit;
    }
}
// 加载首页
include_once(get_index(C('webindex')));
?>