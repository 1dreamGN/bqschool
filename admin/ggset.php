<?php
require_once ('common.php');
C('webtitle', '网站管理后台');
C('pageid', 'ggset');
$index = '1';
include_once 'head.php';
if ($_GET['type'] == "add") {
	$con = $_POST['con'];
	$addtime = date('Y-m-d');
	if ($db->query("insert into {$prefix}gonggao (con,addtime) values ('$con','$addtime')")) {
		exit("<script language='javascript'>alert('公告添加成功！');window.location.href='ggset.php';</script>");
	} else {
		exit("<script language='javascript'>alert('添加公告失败');window.location.href='ggset.php';</script>");
	}
}
if ($_GET['type'] == "edits") {
	$id = $_GET['id'];
	$con = $_POST['con'];
	if ($db->query("update {$prefix}gonggao set con='{$con}' where id='$id'")) {
		exit("<script language='javascript'>alert('公告编辑成功！');window.location.href='ggset.php';</script>");
	} else {
		exit("<script language='javascript'>alert('编辑公告失败');window.location.href='ggset.php';</script>");
	}
}
if ($_GET['type'] == 'del') {
	$id = $_GET['id'];
	if (!$db->query("delete from {$prefix}gonggao where id='$id'")) {
		exit("<script language='javascript'>alert('删除公告成功！');window.location.href='ggset.php';</script>");
	}
}
?>
            <div class="row">
			<?php
			if($_GET['type']!="edit"){
			?>
<div class="panel panel-default">
			<div class="panel-heading">
                    发布公告
			</div>
			<div class="panel-body">
			<div class="list-group">
			<form action="?type=add" role="form" class="form-horizontal" method="post">
			<input type="hidden" name="do" value="new">
			<div class="list-group-item">
				<div class="input-group">
					<div class="input-group-addon">公告内容</div>
					<textarea class="form-control" name="con" rows="5" placeholder="输入公告内容"></textarea>
				</div>
			</div>

			<div class="list-group-item">
				<input type="submit" name="submit" value="添加" class="btn btn-primary btn-block">
			</div>
			</form>
		</div>
</div></div>
<?php
			}else{
			$id=$_GET['id'];
			$gg=$db->query("select * from {$prefix}gonggao where id='$id' limit 1");
			if(!$row=$gg->fetch(PDO::FETCH_ASSOC)){
			exit("<script language='javascript'>alert('要编辑的公告不存在！');window.location.href='ggset.php';</script>");
			}
?>
<div class="panel panel-default">
			<div class="panel-heading">
                    公告编辑
			</div>
			<div class="panel-body">
			<div class="list-group">
			<form action="?type=edits&id=<?=$id?>" role="form" class="form-horizontal" method="post">
			<input type="hidden" name="do" value="new">
			<div class="list-group-item">
				<div class="input-group">
					<div class="input-group-addon">公告内容</div>
					<textarea class="form-control" name="con" rows="5" placeholder="编辑公告内容"><?=$row['con']?></textarea>
				</div>
			</div>

			<div class="list-group-item">
				<input type="submit" name="submit" value="修改" class="btn btn-primary btn-block">
			</div>
			</form>
		</div>
</div></div>
<?php
			}
?>
    <div class="panel panel-default panel-demo">
       <div class="panel-heading">
          <div class="panel-title">平台公告</div>
       </div>
       <div class="panel-body bg-gonggao-p">
          <div class="col-lg-12 bg-gonggao">
		  <?php
		  $rows = $db->query("select * from {$prefix}gonggao where 1=1 order by id desc");
		  while($row = $rows->fetch(PDO::FETCH_ASSOC)){
		  ?>
              <p><a href="?type=edit&id=<?=$row['id']?>"> [编辑] </a> <a href="?type=del&id=<?=$row['id']?>"> [删除] </a><?=$row['con']?>[<?=$row['addtime']?>]</p>
		  <?php }?>
		  </div>
       </div>
    </div>
		</div>
	  <?php
include_once 'foot.php';
?>