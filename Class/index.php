<?php
require_once('common.php');
C('webtitle','用户中心');
C('pageid','user');
include_once 'head.php';
for ($i = 0; $i < 9; $i++) {
    $j = $i + 1;
    $userrs.=get_count('users', "adddate=:date", "uid", array(
        ":date" => date("Y-m-d", strtotime("-{$j} day"))
    )).",";
}
?>

<div class="col-lg-12">
    <div class="panel panel-default panel-demo">
        <div class="panel-heading">
            <div class="panel-title">平台公告</div>
        </div>
        <div class="panel-body bg-gonggao-p">
            <div class="col-lg-12 bg-gonggao">
                <?php
                $rows = $db->query("select * from {$prefix}gonggao where 1=1 order by id desc");
                while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <p><?=$row['con'] ?>[<?=$row['addtime'] ?>]</p>
                    <?php
                } ?>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8">
    <div class="panel panel-default panel-demo">
        <div class="panel-heading">
            <div class="panel-title"> <?php echo date('m-d') ?>班级作业 <small class="m-l-sm">看看班级都有些什么新鲜事呢！</small></div>
        </div>
        <div class="panel-body bg-gonggao-p">
            <div class="col-lg-12 bg-gonggao">

                    <p>语文作业：<?= C('ywzy') ?></p>
					<p>数学作业：<?= C('sxzy') ?></p>
                    <p>英语作业：<?= C('yyzy') ?></p>
					<p>物理作业：<?= C('wlzy') ?></p>
					<p>化学作业：<?= C('hxzy') ?></p>
					<p>历史作业：<?= C('lszy') ?></p>
					<p>政治作业：<?= C('zzzy') ?></p>
					<p>其他作业：<?= C('qtzy') ?></p>
            </div>
            <div class="col-md-4"><a href="classlist.php" title="同学交友墙"><p class="bg-primary-light"> [热]同学交友墙，可以交友哦</p></a></div>
            <div class="col-md-4"><a href="classmate.php" title="同学录"><p class="bg-primary-light"> [热]同学录,去看看</p></a></div>
            <div class="col-md-4"><a href="qqmusic.php" title="QQ音乐"><p class="bg-primary-light"> [new] 一键完成QQ音乐加速任务</p></a></div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <!-- START widget-->
    <div class="panel widget">
        <div class="panel-body">
            <div class="row row-table">
                <div class="col-xs-6 text-center">
                    <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?=$userrow['qq'] ?>&spec=100" alt="Image" class="img-circle thumb96">
                </div>
                <div class="col-xs-6">
                    <h3 class="mt0"><?=$userrow['user'] ?></h3>
                    <ul class="list-unstyled">
                        <li class="mb-sm">
                            <em class="fa fa-twitter fa-fw"></em>姓名:<?=$userrow['xm']?></li>
                        <li class="mb-sm">
                            <em class="fa fa-users fa-fw"></em> UID:<?=$userrow['uid'] ?></li>
                        <li class="mb-sm">
                            <em class="fa fa-qq fa-fw"></em>绑定QQ:<?=$userrow['qq'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
	<div class="panel-body bg-inverse">
            <div class="row row-table text-center">
                <div class="col-xs-4">
                    <h5><?=$userrow['gxqm'] ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>



 

	<div class="col-lg-4">
                        <!-- START widget-->
                        <div class="panel widget">
                           <div class="panel-body">
                              <div class="clearfix">
                                 <h3 class="pull-left text-muted mt0">今天注册用户数：<?=get_count('users', "adddate=:date", "uid", array(":date" => date("Y-m-d"))) ?></h3>
                                 <em class="pull-right text-muted fa fa-users fa-2x"></em>
                              </div>
                              <div data-sparkline="" data-type="line" data-height="80" data-width="100%" data-line-width="2" data-line-color="#7266ba" data-spot-color="#888" data-min-spot-color="#7266ba" data-max-spot-color="#7266ba" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" data-values="<?=$userrs?><?=get_count('users', "adddate=:date", "uid", array(":date" => date("Y-m-d"))) ?>" data-resize="true" class="pv-lg"><canvas width="344" height="80" style="display: inline-block; width: 344px; height: 80px; vertical-align: top;"></canvas></div>
                              <p>
                                 <small class="text-muted">近10天注册趋势</small>
                              </p>
                              <div class="clearfix">
                                 <h3 class="pull-left text-muted mt0">今天添加用户数：<?=get_count('users', "adddate=:date", "uid", array(":date" => date("Y-m-d"))) ?></h3>
                                 <em class="pull-right text-muted fa fa-qq fa-2x"></em>
                              </div>
                              <div data-sparkline="" data-type="line" data-height="80" data-width="100%" data-line-width="2" data-line-color="#7266ba" data-spot-color="#888" data-min-spot-color="#7266ba" data-max-spot-color="#7266ba" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" data-values="<?=$userrs?><?=get_count('users', "adddate=:date", "uid", array(":date" => date("Y-m-d"))) ?>" data-resize="true" class="pv-lg"><canvas width="344" height="80" style="display: inline-block; width: 344px; height: 80px; vertical-align: top;"></canvas></div>
                              <p>
                                 <small class="text-muted">近10天添加趋势</small>
                              </p>
                           </div>
                        </div>
                        <!-- END widget-->
	</div>
<?php
include_once 'foot.php';
?>