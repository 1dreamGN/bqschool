<?php
require_once('common.php');
if ($_GET['template']) {
    $path = "Other/index/index_" . $_GET['template'] . ".php";
    $db->query("insert into {$prefix}webconfigs set vkey='webindex',value='$path' on duplicate key update value='$path'");
    echo "<script language='javascript'>alert('模板更换成功！');window.location.href='template.php';</script>";
}
$template = require("../Other/index/config.php");
C('pageid', 'template');
C('webtitle', '模板管理');
include_once 'head.php';
$templates = require("../Other/index/readinfo.php");
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" align="center">当前模板</h3>
                </div>
                <div class="panel-body" align="left">
                    <table cellspacing="20" cellpadding="0" width="80%" border="0">
                        <tr>
                            <td width="42%">
                                <img src="<?= $template['template_img'] ?>" width="240" height="180" border="1"/></td>
                            <td width="58%">
                                <?= ($template['template_name']) ?><br>
                                作者：<a
                                    href="<?= $template['template_url'] ?>"><?= ($template['template_author']) ?></a><br>
                                <?= ($template['template_readme']) ?>
                                <br>
                                <a href="?templates=tg&set=1">设置</a>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" align="center">模板库</h3>
                </div>
                <div class="panel-body" align="left">
                    <table cellspacing="0" cellpadding="0" width="99%" border="0" class="adm_tpl_list">
                        <tr>
                            <?php
                            foreach ($templatename as $key) {
                                echo '<td align="center">
	  <a href="?template=' . $key . '">
	  <img alt="点击使用该模板" src="' . $templatek[$key . '_template_img'] . '" width="180" height="150" border="0" />
	  </a><br />
      ' . ($templatek[$key . '_template_name']) . '      <span> | ' ?><?php if ($key == $template['alias']) { ?> 已设置 <?php } else { ?>
                                    <a href="?template=' . $key . '">使用</a><?php } ?></span>
                                </td>
                            <?php } ?>
                    </table>

                </div>
            </div>
        </div>

    </div>
<?php
include_once 'foot.php';
?>