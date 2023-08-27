<?php
require_once('common.php');
C('webtitle', '网站管理后台');
C('pageid', 'index');
$index = '1';
include_once 'head.php';
$dt = round(@disk_total_space(".") / (1024 * 1024 * 1024), 3); //总
$df = round(@disk_free_space(".") / (1024 * 1024 * 1024), 3); //可用
$du = $dt - $df; //已用
$hdPercent = (floatval($dt) != 0) ? round($du / $dt * 100, 2) : 0;
if ($do = $_POST['do']) {
    foreach ($_POST as $k => $value) {
        if (safestr($k) == 'web_separate_gg' && $isdomain) {
            exit("<script language='javascript'>alert('保存失败！您不能修改分站公告');window.location.href='index.php';</script>");
        }
        $db->query("insert into {$prefix}webconfigs set vkey='" . safestr($k) . "',value='" . safestr($value) . "' on duplicate key update value='" . safestr($value) . "'");
    }
    if ($rows = $db->query('select * from ' . $prefix . 'webconfigs')) {
        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $webconfig[$row['vkey']] = $row['value'];
        }
        C($webconfig);
    }

    echo "<script language='javascript'>alert('保存成功！');window.location.href='index.php';</script>";
}
?>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-users fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg"><?= get_count('users', "1=:1", "uid", array(":1" => "1")) ?></div>
                            <p class="m0">网站用户数</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="panel-footer bg-gray-dark bt0 clearfix btn-block">
                    <span
                        class="pull-left">查看详情</span>
                        <span class="pull-right">
                           <em class="fa fa-chevron-circle-right"></em>
                        </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-qq fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg"><?= get_count('users', "adddate=:date", "qq", array(":date" => date("Y-m-d"))) ?></div>
                            <p class="m0">今日注册数</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="panel-footer bg-gray-dark bt0 clearfix btn-block">
                    <span
                        class="pull-left">查看详情</span>
                        <span class="pull-right">
                           <em class="fa fa-chevron-circle-right"></em>
                        </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-tasks fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg"><?php echo date("Y-m-d", time()); ?></div>
                            <p class="m0">当前日期</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="panel-footer bg-gray-dark bt0 clearfix btn-block">
                    <span class="pull-left">查看详情</span>
                        <span class="pull-right">
                           <em class="fa fa-chevron-circle-right"></em>
                        </span>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-support fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg"><?php echo date("H:i:s", time()); ?></div>
                            <p class="m0">当前时间</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="panel-footer bg-gray-dark bt0 clearfix btn-block">
                    <span class="pull-left">查看详情</span>
                        <span class="pull-right">
                           <em class="fa fa-chevron-circle-right"></em>
                        </span>
                </a>
            </div>
        </div>
<div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    作业设置
                </div>
                <div class="panel-body">
                    <form action="?xz=zy" class="form-horizontal tasi-form" method="post">
                        <input type="hidden" name="do" value="zy">
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">语文作业：</div>

                                <input class="form-control" type="text" name="ywzy" value="<?= C('ywzy') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">数学作业：</div>

                                <input class="form-control" type="text" name="sxzy" value="<?= C('sxzy') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">英语作业：</div>

                                <input class="form-control" type="text" name="yyzy" value="<?= C('yyzy') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">物理作业：</div>

                                <input class="form-control" type="text" name="wlzy" value="<?= C('wlzy') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">化学作业：</div>

                                <input class="form-control" type="text" name="hxzy" value="<?= C('hxzy') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">历史作业：</div>

                                <input class="form-control" type="text" name="lszy" value="<?= C('lszy') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">政治作业：</div>

                                <input class="form-control" type="text" name="zzzy"
                                       value="<?= C('zzzy') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">其他作业：</div>

                                <input class="form-control" type="text" name="qtzy"
                                       value="<?= C('qtzy') ?>">
                            </div>
                        </div>
                       

                        <div class="list-group-item">
                            <button class="btn btn-primary btn-block" type="submit" name="submit" value="1">保存设置
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">函数检测</div>
                <div class="panel-body">
                    被禁用函数：<?= ("" == ($disFuns = get_cfg_var("disable_functions"))) ? "无" : str_replace(",", "<br />", $disFuns) ?>
                    <br><br>
                    php运行方式：<?php echo $_SERVER['SERVER_SOFTWARE']; ?><br><br>
                    服务器IP：<?php echo $_SERVER['SERVER_NAME']; ?>(<?php if ('/' == DIRECTORY_SEPARATOR) {
                        echo $_SERVER['SERVER_ADDR'];
                    } else {
                        echo @gethostbyname($_SERVER['SERVER_NAME']);
                    } ?>)<br><br>
                    操作系统：<?php $os = explode(" ", php_uname());
                    echo $os[0]; ?> &nbsp;内核版本：<?php if ('/' == DIRECTORY_SEPARATOR) {
                        echo $os[2];
                    } else {
                        echo $os[1];
                    } ?><br><br>
                    总空间：<?php echo $dt; ?>&nbsp;G，
                    已用：<font color='#333333'><span id="useSpace"><?php echo $du; ?></span></font>&nbsp;G，
                    空闲：<font color='#333333'><span id="freeSpace"><?php echo $df; ?></span></font>&nbsp;G，
                    使用率：<span id="hdPercent"><?php echo $hdPercent; ?></span>%
                    <br><br>
                    Cookies支持：<?php echo isset($_COOKIE) ? '<font color="green">√</font>' : '<font color="red">×</font>'; ?>
                    <br><br>
                    PHP 版本：</b><?php echo phpversion() ?><?php if (ini_get('safe_mode')) {
                        echo '线程安全';
                    } else {
                        echo '非线程安全';
                    } ?><br><br>
                    程序最大运行时间：<?php echo ini_get('max_execution_time') ?>s<br><br>
                    POST许可：<?php echo ini_get('post_max_size'); ?><br><br>
                    文件上传许可：<?php echo ini_get('upload_max_filesize'); ?><br>
                </div>
            </div>
			    
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    函数检测
                </div>
                <ul class="list-group sortable">
                    <li class="list-group-item" role="option" aria-grabbed="false" draggable="true"><em class="<?php
                        $ver = phpversion();
                        if ($ver < 5.3) {
                            echo 'fa fa-fw fa-times mr';
                        } else {
                            echo 'fa fa-fw fa-check mr';
                        }
                        ?>"></em>空间要求 php版本5.3
                    </li>
                    <li class="list-group-item" role="option" aria-grabbed="false" draggable="true"><em
                            class="<?php echo checkfunc('curl_exec', true); ?>"></em>访问网页 获取信息
                    </li>
                    <li class="list-group-item" role="option" aria-grabbed="false" draggable="true"><em
                            class="<?php echo checkfunc('file_get_contents', true); ?>"></em>读取文件 读取信息权限
                    </li>
                    <li class="list-group-item" role="option" aria-grabbed="false" draggable="true"><em
                            class="<?php echo checkclass('ZipArchive'); ?>"></em>ZIP解压 后台在线升级
                    </li>
                    <li class="list-group-item" role="option" aria-grabbed="false" draggable="true"><em
                            class="<?php if (is_writable('./')) {
                                echo 'fa fa-fw fa-check mr';
                            } else {
                                echo 'fa fa-fw fa-times mr';
                            } ?>"></em>写入文件(1/2)
                    </li>
                    <li class="list-group-item" role="option" aria-grabbed="false" draggable="true"><em
                            class="<?php echo checkfunc('file_put_contents'); ?>"></em>写入文件(2/2)
                    </li>
                </ul>
            </div>
        </div>
    </div>

<?php
include_once 'foot.php';
?>