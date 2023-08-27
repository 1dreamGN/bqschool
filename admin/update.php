<?php
require_once('common.php');
C('pageid', 'update');
C('webtitle', '网站升级');
include_once 'head.php';
if($_POST['type'] == 'update'){
    if($_POST['submit'] == '返回首页')header('Location:../install/update.php');
    $RemoteFile = $download;
    $ZipFile = 'update.zip';
	copy($RemoteFile, $ZipFile) || showmsg("无法下载更新包文件{$download}", false, '', true);
    if(zipExtract($ZipFile, $_SERVER['DOCUMENT_ROOT'])){
		$upcode = 0;
        unlink($ZipFile);
        echo "<script language='javascript'>alert('升级完成');window.location.href='../install/update.php';</script>";
    }else{
        echo "<script language='javascript'>alert('无法解压文件');window.location.href='../index.php';</script>";
		$upcode = 0;
        if(file_exists($ZipFile))unlink($ZipFile);
    }
}
function zipExtract ($src, $dest){
	$zip = new ZipArchive();
	if ($zip->open($src)===true){
		$zip->extractTo($dest);
		$zip->close();
		return true;
	}
	return false;
}
?>
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><center>检测更新</center></h5>
            </div>
            <div class="panel-body">	
<?php
if(!isset($_SESSION['authcode'])) {
	$query=file_get_contents('http://www.mzan.me/check.php?url='.$_SERVER['HTTP_HOST']);
	if($query=json_decode($query,true)) {
		if($query['code']==1)$_SESSION['authcode']=true;
		else exit('
<h4>
<P><center>'.$query['msg'].'</center></P>
</h4>');
	}
}
else if ($cloudversion>$classversion){
echo '<center><h4><p><font color="red">发现新版本</font></p><p><font color="green">最新版本为：V'.$cloudversion.'</font></p></h4></center>';
}else {
echo '<center><h4><p><font color="green">您使用的已是最新版本！</font></p><p>当前版本：V'.$classversion.' (Build '.VERSION.')</p></h4></center>';
}
?>
</div>
</div>
</div>
<?php
if ($cloudversion>$classversion){
echo '<div class="col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h5><center>日志详情</center></h5>
</div>
<div class="panel-body">
<form action="?" class="form-horizontal" method="post">
<input type="hidden" value="update" name="type" >
<P><center>'.$updatemsg.'</center></P>
<div class="list-group-item">
<div class="form-group text-right"><button class="btn btn-primary btn-block" type="submit" name="submit">点击升级</button></div>
</form>
</div>
</div>
</div>
<div class="col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h5><center>更新须知</center></h5>
</div>
<div class="panel-body">
<h4>
<p><center>如果无法正常更新，可以进行手动下载更新。</center></p>
<p><center>更新包下载地址：<a href='.$sddownload.'> '.$sddownload.' </a></center></p>
</h4>
</div>
</div>
</div>';
}
?>
<div class="col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h5><center>程序公告</center></h5>
</div>
<div class="panel-body">
<h4>
<P><center><?php echo $gonggao; ?></center></P>
</h4>
</div>
</div>
</div>
<?php
include_once 'foot.php';
?>