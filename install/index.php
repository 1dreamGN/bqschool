<?php
@header('Content-Type: text/html; charset=UTF-8');
if (file_exists('install.lock')) {
    exit('已经安装完成！如需重新安装，请删除install目录下的install.lock!');
}
$step = isset($_GET['step']) ? $_GET['step'] : 1;
$action = isset($_POST['action']) ? $_POST['action'] : null;
if ($action == 'install') {
    $host = isset($_POST['host']) ? $_POST['host'] : null;
    $port = isset($_POST['port']) ? $_POST['port'] : null;
    $user = isset($_POST['user']) ? $_POST['user'] : null;
    $pwd = isset($_POST['pwd']) ? $_POST['pwd'] : null;
    $database = isset($_POST['database']) ? $_POST['database'] : null;
    if (empty($host) || empty($port) || empty($user) || empty($pwd) || empty($database)) {
        $errorMsg = '请填完所有数据库信息';
    } else {
        $mysql['host'] = $host;
        $mysql['port'] = $port;
        $mysql['database'] = $database;
        $mysql['username'] = $user;
        $mysql['password'] = $pwd;
        try {
            $db = new PDO("mysql:host=" . $mysql['host'] . ";dbname=" . $mysql['database'] . ";port=" . $mysql['port'], $mysql['username'], $mysql['password']);
        } catch (Exception $e) {
            $errorMsg = '链接数据库失败:' . $e->getMessage();
        }
        //获取域名
        $domians = explode('.', $_SERVER['HTTP_HOST']);
        $domians = array_reverse($domians);
        if (empty($errorMsg)) {
            $config['db'] = $mysql;
            $data = "<?php
return array(
	'DB_HOST'               =>  '{$host}',
    'DB_NAME'               =>  '{$database}',
    'DB_USER'               =>  '{$user}',
    'DB_PWD'                =>  '{$pwd}',
    'DB_PORT'               =>  '{$port}',
    'DB_PREFIX'             =>  'bqyj_',
);";
            @file_put_contents("../Core/config.php", $data);
            $db->exec("set names utf8");
            $sqls = file_get_contents('install.sql');
            $sqls = explode(';', $sqls);
            $success = 0;
            $error = 0;
            $errorMsg = null;
            foreach ($sqls as $value) {
                $length = trim($value);
                if (!empty($length)) {
                    if ($db->exec($value) === false) {
                        $error++;
                        $dberror = $db->errorInfo();
                        $errorMsg .= $dberror[2] . "<br>";
                    } else {
                        $success++;
                    }
                }
            }
            $step = 3;
            @file_put_contents('install.lock', '当你看到此页面，说明你已经安装过本程序。');
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title>安装程序 - 冰清玉洁</title>
    <link rel="stylesheet" href="/Style/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Style/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/Style/vendor/css/bootstrap.css" id="bscss">
    <link rel="stylesheet" href="/Style/vendor/css/app.css" id="maincss">
</head>

<body>
<div class="wrapper">
    <div class="block-center mt-xl wd-xl">
        <!-- START panel-->
        <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
                <a href="#">
                    <img src="assets/image/logos.png" alt="Image" class="block-center img-rounded">
                </a>
            </div>
            <?php
            if (isset($errorMsg)) {
                echo '<div class="alert alert-danger text-center" role="alert">' . $errorMsg . '</div>';
            }
            if ($step == 2) {
                ?>
                <div class="panel-body">
                    <p class="text-center pv">冰清玉洁安装程序.</p>
                    <form class="form-horizontal mb-lg" action="#" method="post">
                        <input type="hidden" name="action" class="form-control" value="install">
                        <label for="name">数据库地址:</label>
                        <input type="text" class="form-control" name="host" value="localhost">
                        <label for="name">数据库端口:</label>
                        <input type="text" class="form-control" name="port" value="3306">
                        <label for="name">数据库库名:</label>
                        <input type="text" class="form-control" name="database" placeholder="输入数据库库名">
                        <label for="name">数据库用户名:</label>
                        <input type="text" class="form-control" name="user" placeholder="输入数据库用户名">
                        <label for="name">数据库密码:</label>
                        <input type="password" class="form-control" name="pwd" placeholder="输入数据库密码">
                        <br><input type="submit" class="btn btn-primary btn-block" name="submit" value="确认，下一步">
                    </form>

                </div>
            <?php } elseif ($step == 3) { ?>
                <div class="panel-body" align="center">
                    <div class="form-signin">
                        <div class="login-wrap">
                            <p>网站安装成功</p>
                            <p>共导入<?php echo($success + $error); ?>条数据 成功:<?php echo $success ?>条
                                失败:<?php echo $error ?>条</p>
                            <p>1、管理员账号admin，密码admin，请尽快修改密码。</p>
                            <p><a href="/index.php" class="btn btn-default btn-rounded btn-block">网站首页</a></p>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="panel-body" align="center">
                    <form action="?step=2" class="form-signin" method="post">
                        <div class="form-signin">
                            <div class="login-wrap">
                                <p>冰清玉洁同学录程序说明</p>
                                <p>1.程序二次开发天高云淡,版权由龙魂所有</p>
                                <p>2.本程序禁止外泄 泄露可无理由取消授权</p>
                                <p>3.源码获取后，不可以任何方式进行退款</p>
                                <button type="submit" class="btn btn-primary block full-width">我已阅读,并同意以上条款</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
        <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2016</span>
            <span>-</span>
            <span>冰清玉洁</span>
            <br>
            <span>Days of high Cloud pale</span>
        </div>
    </div>
</div>
<script src="/Style/vendor/modernizr/modernizr.js"></script>
<script src="/Style/vendor/jquery/dist/jquery.js"></script>
<script src="/Style/vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="/Style/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
<script src="/Style/vendor/parsleyjs/dist/parsley.min.js"></script>
<script src="/Style/vendor/js/app.js"></script>
</body>

</html>