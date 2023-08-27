<?php
require_once ('common.php');
$uid = is_numeric($_GET['uid']) ? $_GET['uid'] : '0';
C('pageid', 'deputyuser');
C('webtitle', '用户列表');
include_once 'head.php';
$p = is_numeric($_GET['p']) ? $_GET['p'] : '1';
$pp = $p + 8;
$pagesize = 10;
$start = ($p - 1) * $pagesize;
if ($_GET['do'] == 'search' && $s = safestr($_GET['s'])) {
	$pagedo = 'seach';
	$users = $db->query("select * from {$prefix}users where uid='{$s}' or user like'%{$s}%' order by (case when uid='{$s}' then 8 else 0 end)+(case when user like '%{$s}%' then 3 else 0 end) desc limit 20");
} else {
	$pages = ceil(get_count('users', '1=:1', 'uid',array(":1"=>"1")) / $pagesize);
	$users = $db->query("select * from {$prefix}users order by uid desc limit $start,$pagesize");
}
if ($pp > $pages) $pp = $pages;
if ($p == 1) {
	$prev = 1;
} else {
	$prev = $p - 1;
}
if ($p == $pages) {
	$next = $p;
} else {
	$next = $p + 1;
}
?>
    <div class="row">
        <?php while ($user = $users->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title text-center">
                            <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?= $user['qq'] ?>&amp;spec=100" width="80"
                                 height="80" class="img-circle circle-border m-t-xxs" alt="profile">
                            <h4 class="font-bold no-margins"><?= $user['user'] ?></h4>
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item but-br">
                            <div class="media-box">
                                <div class="pull-left" style="margin:0;">
                   <span class="fa-stack" style="width:1px;">
                   </span>
                                </div>
                                <div class="media-box-body clearfix">
                                    <div class="media-box-heading text-purple text-center m0" style="line-height:22px;">
                                        #ID : <?= $user['uid'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item but-br">

                            <div class="media-box">
                                <div class="pull-left" style="margin:auto 5px;">
                                    <span class="circle circle-success circle-lg text-left"></span>
                                </div>
                                <div class="media-box-body clearfix">
                                    <div class="media-box-heading m0">
                                        <small>
                                            姓名:<?=$user['xm']?>
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="media-box" style="margin-top:6px;">
                                <div class="pull-left" style="margin:auto 5px;">
                                    <span class="circle circle-success circle-lg text-left"></span>
                                </div>
                                <div class="media-box-body clearfix">
                                    <div class="media-box-heading m0">
                                        <small>注册时间：<?=$user['regtime']?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="media-box" style="margin-top:6px;">
                                <div class="pull-left" style="margin:auto 5px;">
                                    <span class="circle circle-success circle-lg text-left"></span>
                                </div>
                                <div class="media-box-body clearfix">
                                    <div class="media-box-heading m0">
                                        <small>上次登录：<?=$user['lasttime']?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="media-box" style="margin-top:6px;">
                                <div class="pull-left" style="margin:auto 5px;">
                                    <span class="circle circle-success circle-lg text-left"></span>
                                </div>
                                <div class="media-box-body clearfix">
                                    <div class="media-box-heading m0">
                                        <small>QQ账号：<?= $user['qq'] ?></small>
                                    </div>
                                </div>
                            </div>

                            <div class="media-box" style="margin-top:6px;">
                                <div class="pull-left" style="margin:auto 5px;">
                                    <span class="circle circle-success circle-lg text-left"></span>
                                </div>
                                <div class="media-box-body clearfix">
                                    <div class="media-box-heading m0">
                                        <small>等级权限：<?php if ($user[active] == 9) {
                                                echo '站长 ';
                                            }
                                            if ($user[fuzhan] == 1) {
                                                echo '副站长 ';
                                            }
                                            if ($user[daili] == 1) {
                                                echo '班委 ';
                                            }
                                            if ($user[daili] == 0 && $user[fuzhan] == 0 && $user[active] == 0) {
                                                echo '学生';
                                            }?> UID:<?=$user['uid']?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer clearfix">
                        <a href="http://wpa.qq.com/msgrd?v=1&uin=<?=$user['qq']?>&site=houdao.com&menu=yes" title="用户配置"
                           class="btn btn-square btn-primary btn-block btn-xs">添加Ta为好友</a>
                    </div>
					<div class="panel-footer clearfix">
                        <a href="uindex.php?uid=<?=$user['uid']?>" title="用户配置"
                           class="btn btn-square btn-primary btn-block btn-xs">查看完整资料</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php if ($pagedo != 'seach') { ?>
    <div class="panel-footer">
        <div class="row">
            <div class="col-lg-2">
                <form action="?" method="GET">
                    <div class="input-group">
                        <input type="hidden" name="do" value="search">
                        <input type="text" name='s' placeholder="用户uid、用户名" class="form-control">
		<span class="input-group-btn">
		<input type="submit" class="btn btn-primary" value="搜索">
		</span>
                    </div>
                </form>
            </div>
            <div class="col-lg-8"></div>
            <div class="col-lg-2 text-right">
                <ul class="pagination pagination-sm">
                    <li <?php if ($p == 1) {
                        echo 'class="disabled"';
                    } ?>><a href="?p=1">首页</a></li>
                    <li <?php if ($prev == $p) {
                        echo 'class="disabled"';
                    } ?>><a href="?p=<?= $prev ?>">&laquo;</a></li>
                    <?php for ($i = $p; $i <= $pp; $i++) { ?>
                        <li <?php if ($i == $p) {
                            echo 'class="active"';
                        } ?>><a href="?p=<?= $i ?>"><?= $i ?></a></li>
                    <?php } ?>
                    <li <?php if ($next == $p) {
                        echo 'class="disabled"';
                    } ?>><a href="?p=<?= $next ?>">&raquo;</a></li>
                    <li <?php if ($p == $pages) {
                        echo 'class="disabled"';
                    } ?>><a href="?p=<?= $pages ?>">末页</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>
<?php
include_once 'foot.php';
?>