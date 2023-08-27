<?php
require_once('common.php');
if ($do = $_POST['do']) {
    foreach ($_POST as $k => $value) {
        if (safestr($k) == 'web_separate_gg' && $isdomain) {
            exit("<script language='javascript'>alert('保存失败！您不能修改分站公告');window.location.href='set.php';</script>");
        }
        $db->query("insert into {$prefix}webconfigs set vkey='" . safestr($k) . "',value='" . safestr($value) . "' on duplicate key update value='" . safestr($value) . "'");
    }
    if ($rows = $db->query('select * from ' . $prefix . 'webconfigs')) {
        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $webconfig[$row['vkey']] = $row['value'];
        }
        C($webconfig);
    }

    echo "<script language='javascript'>alert('保存成功！');window.location.href='set.php';</script>";
}

    C('webtitle', '系统设置');
    C('pageid', 'set');
    include_once 'head.php';
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    基本设置
                </div>
                <div class="panel-body">
                    <form action="?xz=set" class="form-horizontal tasi-form" method="post">
                        <input type="hidden" name="do" value="set">
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">网站名称</div>

                                <input class="form-control" type="text" name="webname" value="<?= C('webname') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">网站介绍</div>

                                <input class="form-control" type="text" name="webkey" value="<?= C('webkey') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">网站域名</div>

                                <input class="form-control" type="text" name="webdomain" value="<?php
                                if (!C('webdomain')) {
                                    echo $_SERVER['HTTP_HOST'];
                                }
                                ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">站长扣扣</div>

                                <input class="form-control" type="text" name="webqq" value="<?= C('webqq') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">会员售后群</div>

                                <input class="form-control" type="text" name="webgroup" value="<?= C('webgroup') ?>">
                            </div>
                        </div>
						<div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">班级密钥</div>

                                <input class="form-control" type="text" name="classkey" value="<?= C('classkey') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">自动加好友</div>

                                <input class="form-control" type="text" name="addqq" value="<?= C('addqq') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">主页音乐外链(网易云)</div>

                                <input class="form-control" type="text" name="index_163music"
                                       value="<?= C('index_163music') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">主页背景一[图片外链]</div>

                                <input class="form-control" type="text" name="index_pic_1"
                                       value="<?= C('index_pic_1') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">主页背景二[图片外链]</div>

                                <input class="form-control" type="text" name="index_pic_2"
                                       value="<?= C('index_pic_2') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">主页背景三[图片外链]</div>

                                <input class="form-control" type="text" name="index_pic_3"
                                       value="<?= C('index_pic_3') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">主页背景四[图片外链]</div>

                                <input class="form-control" type="text" name="index_pic_4"
                                       value="<?= C('index_pic_4') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">主页背景五[图片外链]</div>

                                <input class="form-control" type="text" name="index_pic_5"
                                       value="<?= C('index_pic_5') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">用户中心logo[图片外链]</div>

                                <input class="form-control" type="text" name="index_logo"
                                       value="<?= C('index_logo') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">绚丽彩虹播放器XlchKey</div>

                                <input class="form-control" type="text" name="XlchKey"
                                       value="<?= C('XlchKey') ?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">

                            <div class="form-control-1">
                                <label class="checkbox c-checkbox c-checkbox-rounded"><input type="radio" value="0"
                                                                                             name="txprotect"
                                                                                             checked=""><span
                                        class="fa fa-check"></span>关闭反腾讯检测系统</label>
                            </div>
                            <div class="form-control-1">
                                <label class="checkbox c-checkbox c-checkbox-rounded"><input type="radio" value="1"
                                                                                             name="txprotect" <?php if (C('txprotect') == 1) echo 'checked=""'; ?>><span
                                        class="fa fa-check"></span>开启反腾讯检测系统</label>
                            </div>

                        </div>

                      <div class="list-group-item bb">

                            <div class="form-control-1">
                                <label class="checkbox c-checkbox c-checkbox-rounded"><input type="radio" value="0"
                                                                                             name="music"
                                                                                             checked=""><span
                                        class="fa fa-check"></span>关闭音乐播放器【全部用户】</label>
                            </div>
                            <div class="form-control-1">
                                <label class="checkbox c-checkbox c-checkbox-rounded"><input type="radio" value="1"
                                                                                             name="music" <?php if (C('music') == 1) echo 'checked=""'; ?>><span
                                        class="fa fa-check"></span>开启音乐播放器【全部用户】</label>
                            </div>
              
                        </div>
						<div class="list-group-item bb">
				<span class="help-block m-b-none"><font color=red>不建议开启<br>前台后台一起开启会导致css或js冲突</font></span>
            </div>
                        <div class="list-group-item">
                            <button class="btn btn-primary btn-block" type="submit" name="submit" value="1">保存设置
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <?php

include_once 'foot.php';
?>