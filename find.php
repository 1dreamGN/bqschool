<?php
require_once('Core/common.php');
if ($_GET['do'] == 'qrfind') {
    $uin = safestr($_GET['uin']);
    $skey = safestr($_GET['skey']);
    $gtk = getGTK($skey);
    $url = "http://mobile.qzone.qq.com/friend/mfriend_list?g_tk=" . $gtk . "&res_uin=" . $uin . "&res_type=normal&format=json&count_per_page=10&page_index=0&page_type=0&mayknowuin=&qqmailstat=";
    $json = get_curl($url, 0, 'http://m.qzone.com/infocenter?g_ut=3&g_f=6676', 'pt2gguin=o0' . $uin . '; uin=o0' . $uin . '; skey=' . $skey . ';');
    $json = mb_convert_encoding($json, "UTF-8", "UTF-8");
    $arr = json_decode($json, true);
    if (array_key_exists('code', $arr) && $arr['code'] == 0) {
        $_pwd = get_sz(8);
        $pwd = md5(md5(safestr($_pwd)) . md5('1340176819'));
        if ($db->query("update {$prefix}users set pwd='{$pwd}' where qq='{$uin}'")) {
            $msg = 'sweetAlert("温馨提示", "密码已重置，您的新密码为：' . $_pwd . '", "success");';
            $url = '/login.php';
        } else {
            $msg = 'sweetAlert("温馨提示", "密码修改失败，没有找到绑定该QQ的用户", "warning");';
        }
    } else {
        $msg = 'sweetAlert("温馨提示", "验证失败，您貌似不是该账户的主人哦！", "warning");';
    }
?>
    <!DOCTYPE html>
    <!--[if IE 9]>
    <html class="no-js lt-ie10"> <![endif]-->
    <!--[if gt IE 9]><!-->
    <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?= C("webname") ?> - 用户密码找回</title>
        <meta name="Keywords" content="<?= C("webname") ?>,秒赞平台,秒赞网,秒赞,离线秒赞,免费24h秒赞,秒赞吧,爱空间app"/>
        <meta name="Description" content="<?= C("webname") ?>账号找回，24小时不间断离线秒赞空间说说！"/>
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <meta http-equiv="refresh" content="3;url=/login.php">
   <link rel="stylesheet" href="/Style/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Style/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/Style/vendor/css/bootstrap.css" id="bscss">
    <link rel="stylesheet" href="/Style/vendor/css/app.css" id="maincss">
    <link rel="stylesheet" type="text/css" href="/Style/sweetalert/sweetalert.css"/>
    </head>
    <body>

<script src="/Style/sweetalert/sweetalert.min.js"></script>
<script src="/Style/vendor/modernizr/modernizr.js"></script>
<script src="/Style/vendor/jquery/dist/jquery.js"></script>
<script src="/Style/vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="/Style/vendor/jQuery-Storage-api/jquery.storageapi.js"></script>
<script src="/Style/vendor/parsleyjs/dist/parsley.min.js"></script>
<script src="/Style/vendor/js/app.js"></script>
    <?php if (!empty($msg)) echo "<script type='text/javascript'>{$msg}</script>"; ?>
    </body>
    </html>

    <?php
} elseif ($_POST['do'] == 'find') {
    session_start();
    $user = safestr($_POST['user']);
    $aqanswer = safestr($_POST['aqanswer']);
    $pwd = md5(md5(safestr($_POST['pwd'])) . md5('1340176819'));
    $code = safestr($_POST['code']);
    if (!$code || strtolower($_SESSION['bqyj_code']) != strtolower($code)) {
        $msgs = 'sweetAlert("温馨提示", "验证码错误", "warning");';
    } else {
		$stmt = $db->prepare("select * from {$prefix}users where aqanswer=:aqanswer and user=:user limit 1");
        $stmt->execute(array(
            ':aqanswer' => $aqanswer,
            ':user' => $user
        ));
		if($stmt->fetch(PDO::FETCH_ASSOC)){
			if ($db->query("update {$prefix}users set pwd='{$pwd}' where user='{$user}'")) {
				$msgs = 'sweetAlert("温馨提示", "密码修改成功", "success");';
			} else {
				$msgs = 'sweetAlert("温馨提示", "密码修改失败", "warning");';
			}
		} else {
			$msgs = 'sweetAlert("温馨提示", "验证失败，您貌似不是该账户的主人哦！", "warning");';
		}
		        
    }
    ?>

    <!DOCTYPE html>
    <!--[if IE 9]>
    <html class="no-js lt-ie10"> <![endif]-->
    <!--[if gt IE 9]><!-->
    <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?= C("webname") ?> - 用户密码找回</title>
        <meta name="Keywords" content="<?= C("webname") ?>,秒赞平台,秒赞网,秒赞,离线秒赞,免费24h秒赞,秒赞吧,爱空间app"/>
        <meta name="Description" content="<?= C("webname") ?>账号找回，24小时不间断离线秒赞空间说说！"/>
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <meta http-equiv="refresh" content="3;url=/find.php">

  <link rel="stylesheet" href="/Style/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Style/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/Style/vendor/css/bootstrap.css" id="bscss">
    <link rel="stylesheet" href="/Style/vendor/css/app.css" id="maincss">
    <link rel="stylesheet" type="text/css" href="/Style/sweetalert/sweetalert.css"/>
    </head>
    <body>


<script src="/Style/sweetalert/sweetalert.min.js"></script>
<script src="/Style/vendor/modernizr/modernizr.js"></script>
<script src="/Style/vendor/jquery/dist/jquery.js"></script>
<script src="/Style/vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="/Style/vendor/jQuery-Storage-api/jquery.storageapi.js"></script>
<script src="/Style/vendor/parsleyjs/dist/parsley.min.js"></script>
<script src="/Style/vendor/js/app.js"></script>
    <?php if (!empty($msgs)) echo "<script type='text/javascript'>{$msgs}</script>"; ?>
    </body>
    </html>
    <?php
} elseif ($_POST['do'] == 'finds') {
    $user = safestr($_POST['user']);
    $stmt = $db->prepare("select * from {$prefix}users where user=:user limit 1");
    $stmt->execute(array(':user' => $user));
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $aqproblem = $row['aqproblem'];
    } else {
        $msg2 = 'sweetAlert("温馨提示", "该用户不存在", "warning");';
    }
    ?>
    <!DOCTYPE html>
    <!--[if IE 9]>
    <html class="no-js lt-ie10"> <![endif]-->
    <!--[if gt IE 9]><!-->
    <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?= C("webname") ?> - 用户密码找回</title>
        <meta name="Keywords" content="<?= C("webname") ?>,秒赞平台,秒赞网,秒赞,离线秒赞,免费24h秒赞,秒赞吧,爱空间app"/>
        <meta name="Description" content="<?= C("webname") ?>账号找回，24小时不间断离线秒赞空间说说！"/>
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
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
               <p class="text-center pv">密码找回</p>
			    <form id="form-login" method="post" class="mb-lg"onsubmit="?">
                <input type="hidden" name="do" value="find">
				<input type="hidden" name="user" value="<?= $user ?>">
                  <div class="form-group has-feedback">
                     <input type="text" class="form-control" value="<?= $aqproblem ?>" readonly>
                     <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-1"></li></ul>
                     <span class="fa fa-user form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input type="password" name="pwd" class="form-control" placeholder="请输入新密码"
                               onkeydown="if(event.keyCode==32){return false;}" required>
                     <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-2"></li></ul>
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" name="aqanswer" class="form-control" placeholder="请输入密保答案" required
                               autofocus>
                     <span class="fa fa-qq form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                        <input type="text" name="code" maxlength="5" class="form-control" placeholder="输入验证码(不分大小写)"
                               onkeydown="if(event.keyCode==32){return false;}" required>
                     <span class="fa fa-warning form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <img src="/ValidateCode.php?+Math.random();"
                             onclick="this.src='/ValidateCode.php?'+Math.random();" title="点击更换验证码"
                             style="margin-bottom:5px;border: 1px solid #5CAFDE;"> <small> 看不清？点击图片更换</small>
						
                     </div>
                  </div>
                  <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-3"></li></ul>
				  <button type="submit" class="btn btn-block btn-primary mt-lg">确认找回</button>
               </form>
               <p class="pt-lg text-center">已有帐号?</p><a href="/login.php" class="btn btn-block btn-default">点此登陆</a>
            </div>
         </div>
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2016</span>
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
    <?php if (!empty($msg2)) echo "<script type='text/javascript'>{$msg2}</script>"; ?>
    </body>
    </html>
    <?php
} elseif ($_GET['do'] == 'qrlogin') {
    ?>
    <!DOCTYPE html>
    <!--[if IE 9]>
    <html class="no-js lt-ie10"> <![endif]-->
    <!--[if gt IE 9]><!-->
    <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?= C("webname") ?> - 用户密码找回</title>
        <meta name="Keywords" content="<?= C("webname") ?>,秒赞平台,秒赞网,秒赞,离线秒赞,免费24h秒赞,秒赞吧,爱空间app"/>
        <meta name="Description" content="<?= C("webname") ?>账号找回，24小时不间断离线秒赞空间说说！"/>
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

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
             <div class="panel-body" style="text-align: center;">
               <p class="text-center pv">通过QQ扫码找回密码</p>
			    <form id="form-login" method="post" class="mb-lg"onsubmit="?">
                  <div class="form-group has-feedback">
                    <div class="list-group-item"><img
                                src="http://android-artworks.25pp.com/fs01/2015/02/02/11/110_3395e627ca83ae423d7dad98a5768ede.png"
                                width="80px"></div>
                        <div class="list-group-item list-group-item-info" style="font-weight: bold;" id="login">
                            <span id="loginmsg">使用QQ手机版扫描二维码</span><span id="loginload" style="padding-left: 10px;color: #790909;">.</span>
                        </div>
                        <div class="list-group-item" id="qrimg">
                        </div>
               </form>
               <p class="pt-lg text-center">已有帐号?</p><a href="/login.php" class="btn btn-block btn-default">点此登陆</a>
            </div>
         </div>
		 </div>

         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2016</span>
            <span>-</span>
            <span><?=C("webname")?></span>
            <br>
            <span>最稳定的同学录平台</span>
         </div>
      </div>
   </div>
<script src="/Style/sweetalert/sweetalert.min.js"></script>
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="/Style/vendor/modernizr/modernizr.js"></script>
<script src="/Style/user_find/qrlogin/qrlogin.js"></script>
<script src="/Style/vendor/jquery/dist/jquery.js"></script>
<script src="/Style/vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="/Style/vendor/jQuery-Storage-api/jquery.storageapi.js"></script>
<script src="/Style/vendor/parsleyjs/dist/parsley.min.js"></script>
<script src="/Style/vendor/js/app.js"></script>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <!--[if IE 9]>
    <html class="no-js lt-ie10"> <![endif]-->
    <!--[if gt IE 9]><!-->
    <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?= C("webname") ?> - 用户密码找回</title>
        <meta name="Keywords" content="<?= C("webname") ?>,秒赞平台,秒赞网,秒赞,离线秒赞,免费24h秒赞,秒赞吧,爱空间app"/>
        <meta name="Description" content="<?= C("webname") ?>账号找回，24小时不间断离线秒赞空间说说！"/>
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
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
               <p class="text-center pv">密码找回</p>
			   <form id="form-login" method="post" class="mb-lg" onsubmit="?">
                <input type="hidden" name="do" value="finds"/>
                  <div class="form-group has-feedback">
                     <input type="text" name="user" class="form-control" placeholder="请输入需要找回用户账号"
                               onkeydown="if(event.keyCode==32){return false;}" required autofocus>
                     <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-1"></li></ul>
                     <span class="fa fa-user form-control-feedback text-muted"></span>
                  </div>
				  <div class="clearfix">
				  <div class="pull-left">
				  <a href="/find.php?do=qrlogin" class="text-muted">使用QQ扫码找回</a>
                     </div>
					 </div>
                  <ul class="parsley-errors-list filled"><li class="parsley-required" id="parsley-id-3"></li></ul>
				  <button type="submit" class="btn btn-block btn-primary mt-lg">下一步</button>
               </form>
               <p class="pt-lg text-center">已有帐号?</p><a href="/login.php" class="btn btn-block btn-default">点此登陆</a>
            </div>
         </div>
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>2016</span>
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
    </body>
    </html>
<?php } ?>