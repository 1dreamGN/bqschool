<?php
require_once('Core/common.php');
if ($_POST['do'] == 'login') {
    $user = safestr($_POST['user']);
    $pwd = safestr($_POST['pwd']);
    if (!$user || !$pwd) {
        $msgs = 'sweetAlert("温馨提示", "账号或密码不能为空", "warning");';
    } elseif (strlen($user) < 5) {
        $msgs = 'sweetAlert("温馨提示", "用户名太短！", "warning");';
    } elseif (strlen($pwd) < 5) {
        $msgs = 'sweetAlert("温馨提示", "密码太简单！", "warning");';
    } else {
        $pwd = md5(md5($pwd) . md5('1340176819'));
        $where = "(user=:user or qq=:user) and pwd=:pwd";
        $stmt = $db->prepare("select * from {$prefix}users where {$where} limit 1");
        $stmt->execute(array(':user' => $user, ':pwd' => $pwd));
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sid = md5(get_sz(4) . uniqid() . rand(1, 1000));
            $now = date("Y-m-d H:i:s");
            $ip = getip();
            $db->query("update {$prefix}users set sid='$sid',lasttime='$now',lastip='$ip' where uid='{$row[uid]}'");
            setcookie("bqyj_sid", $sid, time() + 3600 * 24 * 14, '/');
            header("Location: /Class/index.php");
            exit;
        } else {
            $msgs = 'sweetAlert("温馨提示", "账号或密码错误！", "warning");';
        }
    }
}
if ($_POST['do'] == 'reg') {
    session_start();
    $user = safestr($_POST['user']);
    $qq = safestr($_POST['qq']);
    $pwd = safestr($_POST['pwd']);
    $code = safestr($_POST['code']);
	$classkey = safestr($_POST['classkey']);
    $ip = getip();
	$classkey = safestr($_POST['classkey']);
	$key= C("classkey");
    $stmt = $db->query("select uid from {$prefix}users where qq='{$qq}' or user='{$user}' limit 1");
    if (strlen($user) < 5) {
        $msg = 'sweetAlert("温馨提示", "用户名太短", "warning");';
	} elseif($classkey!==$key){
		$msg = 'sweetAlert("温馨提示", "注册密匙错误，请联系站长'.C("webqq").'解决。", "warning");';
    } elseif (strlen($user) > 10) {
        $msg = 'sweetAlert("温馨提示", "用户名太长", "warning");';
    } elseif (strlen($qq) > 10) {
        $msg = 'sweetAlert("温馨提示", "QQ账号没有10位以上", "warning");';
    } elseif (!$code || strtolower($_SESSION['bqyj_code']) != strtolower($code)) {
        $msg = 'sweetAlert("温馨提示", "验证码错误", "warning");';
    } elseif (strlen($pwd) < 5) {
        $msg = 'sweetAlert("温馨提示", "密码太简单！", "warning");';
    } elseif (strlen($pwd) > 15) {
        $msg = 'sweetAlert("温馨提示", "密码太长！", "warning");';
    } elseif ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $msg = 'sweetAlert("温馨提示", "QQ或用户名已存在", "warning");';
		}else{
        $_SESSION['bqyj_code'] = md5(rand(100, 500) . time());
        $sid = md5(get_sz(4) . uniqid() . rand(1, 1000));
        $pwd = md5(md5($pwd) . md5('1340176819'));
        $now = date("Y-m-d H:i:s");
        $nowdate = date("Y-m-d");
        $city = get_ip_city($ip);
        if ($db->query("insert into {$prefix}users (user,pwd,sid,active,qq,city,regip,lastip,regtime,lasttime,aqproblem,aqanswer,yq,adddate) values ('$user','$pwd','$sid','1','$qq','$city','$ip','$ip','$now','$now','','','0','$nowdate')")) {
            $msg = 'sweetAlert("温馨提示", "注册成功，您的用户名为:' . $user . '", "success");';
        } else {
            $msg = 'sweetAlert("温馨提示", "注册失败，数据处理时出错", "warning");';
        }
    }
}
if ($_GET["do"] != "reg") {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title><?=C("webname")?>    - 用户登录</title>
    <link rel="stylesheet" href="/Style/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Style/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/Style/vendor/css/bootstrap.css" id="bscss">
    <link rel="stylesheet" href="/Style/vendor/css/app.css" id="maincss">
    <link rel="stylesheet" type="text/css" href="/Style/sweetalert/sweetalert.css"/>
 
 

</head>
<body>

   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="/">
				  <img src="/Style/vendor/img/logo.png" alt="Image" height="27" class="block-center img-rounded">
               </a>
            </div>
            <div class="panel-body">
               <p class="text-center pv">用户登陆</p>
			   <form method="post" class="mb-lg" onSubmit="?">
			   <input type="hidden" name="do" value="login"/>
                  <div class="form-group has-feedback">
                     <input name="user" type="text" class="form-control" placeholder="用户名/绑定的QQ" maxlength="16">
                     <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-1"></li></ul>
                     <span class="fa fa-user form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input name="pwd" type="password" class="form-control" placeholder="登陆密码" maxlength="16">
                     <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-2"></li></ul>
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="1" name="remember">
                           <span class="fa fa-check"></span>记住帐号</label>
                     </div>
                     <div class="pull-right"><a href="/find.php" class="text-muted">忘记密码?</a>
                     </div>
                  </div>
                  <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-3"></li></ul>
				  <button type="submit" class="btn btn-block btn-primary mt-lg">Login</button>
               </form>
               <p class="pt-lg text-center">还没有帐号?</p><a href="/login.php?do=reg" class="btn btn-block btn-default">点此注册</a>
            </div>
         </div>
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2017</span>
            <span>-</span>
            <span><?=C("webname")?></span>
            <br>
            <span>最稳定的同学录平台</span>
         </div>
      </div>
   </div>
<script src="/Style/sweetalert/sweetalert.min.js"></script>
<script src="/Style/vendor/modernizr/modernizr.js"></script>
<script src="/Style/vendor/jquery/dist/jquery.js"></script>
<script src="/Style/vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="/Style/vendor/jQuery-Storage-api/jquery.storageapi.js"></script>
<script src="/Style/vendor/parsleyjs/dist/parsley.min.js"></script>
<script src="/Style/vendor/js/app.js"></script>
<?php
if($msgs){
	echo "<script type='text/javascript'>{$msgs}</script>";
}
?>
</body>
</html>
<?php
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Bootstrap Admin App + jQuery">
    <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
    <title><?=C("webname")?> - 账号注册</title>
    <link rel="stylesheet" href="/Style/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Style/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/Style/vendor/css/bootstrap.css" id="bscss">
    <link rel="stylesheet" href="/Style/vendor/css/app.css" id="maincss">
    <link rel="stylesheet" type="text/css" href="/Style/sweetalert/sweetalert.css"/>
</head>
<body>
 
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="/">
				  <img src="/Style/vendor/img/logo.png" alt="Image" height="27" class="block-center img-rounded">
               </a>
            </div>
            <div class="panel-body">
               <p class="text-center pv">帐号注册</p>
			   <form method="post" class="mb-lg" onSubmit="?">
			   <input type="hidden" name="do" value="reg"/>
                  <div class="form-group has-feedback">
                     <input name="user" type="text" class="form-control" placeholder="设置登陆用户名" maxlength="16">
                     <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-1"></li></ul>
                     <span class="fa fa-user form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input name="pwd" type="password" class="form-control" placeholder="设置登陆密码" maxlength="16">
                     <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-2"></li></ul>
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
				   <div class="form-group has-feedback">
                     <input name="classkey" type="text" class="form-control" placeholder="请输入班级密钥" maxlength="16">
                     <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-3"></li></ul>
                     <span class="fa fa-key form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input name="qq" type="text" class="form-control" placeholder="请输入您的QQ号码" maxlength="10" onKeyUp="this.value=this.value.replace(/\D/g,'')" required="">
                     <span class="fa fa-qq form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input name="code" type="text" class="form-control" placeholder="请输入下方验证码" maxlength="5" onKeyUp="if(event.keyCode==32){return false;}" required="">
                     <span class="fa fa-warning form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <img title="点击刷新" src="/ValidateCode.php?+Math.random();" onClick="this.src='/ValidateCode.php?'+Math.random();" class="img-rounded"> <small> 看不清？点击图片更换</small>
						
                     </div>
                  </div>
                  <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-3"></li></ul>
				  <button type="submit" class="btn btn-block btn-primary mt-lg">确认注册</button>
               </form>
               <p class="pt-lg text-center">已有帐号?</p><a href="/login.php" class="btn btn-block btn-default">点此登陆</a>
            </div>
         </div>
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2017</span>
            <span>-</span>
            <span><?=C("webname")?></span>
            <br>
            <span>最稳定的同学录平台</span>
         </div>
      </div>
   </div>
<script src="/Style/sweetalert/sweetalert.min.js"></script>
<script src="/Style/vendor/modernizr/modernizr.js"></script>
<script src="/Style/vendor/jquery/dist/jquery.js"></script>
<script src="/Style/vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="/Style/vendor/jQuery-Storage-api/jquery.storageapi.js"></script>
<script src="/Style/vendor/parsleyjs/dist/parsley.min.js"></script>
<script src="/Style/vendor/js/app.js"></script>
 <?php if(!empty($msg))echo "<script type='text/javascript'>{$msg}</script>";?>
</body>
</html>
<?php
}
?>