<?php
error_reporting(0);
function get_curl($url, $post = 0, $referer = 0, $cookie = 0, $header = 0, $ua = 0, $nobaody = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if ($header) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }
    if ($cookie) {
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if ($referer) {
        curl_setopt($ch, CURLOPT_REFERER, "http://m.qzone.com/infocenter?g_f=");
    }
    if ($ua) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/5.5 Mobile Safari/533.1");
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}

@header("Content-Type: text/html; charset=UTF-8");
$domain = $_SERVER['HTTP_HOST'];
if($_SERVER['HTTP_REFERER']!="http://{$domain}/Class/qiuqiu.php")exit("Error".$_SERVER['HTTP_REFERER']);
if ($_GET['type'] == "qiu") {
    $url = $_POST['url'];
    if (!$url) {
        exit('{"code":-1,"msg":"邀请链接不能为空"}');
    } else {
        $data = get_curl('http://www.xzfuli.cn/index.php?url='. $url);
        exit('{"code":1,"msg":"领取取棒棒糖和龙蛋成功!"}');
    }
}
?>
