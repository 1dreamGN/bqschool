<?php
require_once('common.php');
C('webtitle','聊天室');
C('pageid','chat');
include_once 'head.php';
if($_POST['infos']=="ye"){
$info=$_POST['info'];
$qid=$userrow['qq'];
$user=$userrow['user'];
$time=date("Y-m-d H:i:s");
	if($info==""){
    exit("<script language='javascript'>alert('喂喂，说话啊。⊙△⊙？【请输入信息】');window.location.href='chat.php';</script>");
	}else{
		if($db->query("INSERT INTO `{$prefix}chat` (`id`, `uid`, `user`, `info`, `time`, `qid`) VALUES (NULL, '{$row[uid]}', '$user', '$info', '$time', '$qid')")){
			  exit("<script language='javascript'>alert('发表成功！^_^');window.location.href='chat.php';</script>");
				}
			}
}
if($_GET['do']=="info"){
$id = $_GET['id'];
	if($userrow['active']!=9){
		exit("<script language='javascript'>alert('权限不足！');window.location.href='chat.php';</script>");
	}else{
		if(!$id){
			exit("<script language='javascript'>alert('id不能为空！');window.location.href='chat.php';</script>");
		}
		if($db->query("delete from `{$prefix}chat` where id=$id")){
			exit("<script language='javascript'>alert('删除成功！');window.location.href='chat.php';</script>");
		}else{
			exit("<script language='javascript'>alert('删除失败！');window.location.href='chat.php';</script>");
		}
	}
}
?>
 <div class="col-lg-10">
    <div class="panel panel-default">
       <div class="panel-heading">
          <div class="panel-title">CQY聊天室</div>
       </div>
       <div data-height="500" data-scrollable="" class="list-group">
          <div id="liao">
		  <?php
          $rowss = $db->query("select * from {$prefix}chat where 1=1 order by uid desc limit 20");
          ?>
          <?php while ($info = $rowss->fetch(PDO::FETCH_ASSOC)) { ?>
		 <div class="list-group-item bb">
                        <div class="media-box">
                            <div class="pull-left">
                                <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?php echo $info['qid'];?>&amp;spec=100" alt="Image" class="media-box-object img-circle thumb35">
                            </div>
		  <div class="media-box-body clearfix">
		  <a href="?do=info&id=<?php echo $info['id']; ?>" class="label label-info pull-right" style="margin-top:8px;">删除</a>
		  <strong class="media-box-heading text-primary">
          <span class="circle circle-success circle-lg text-left"></span><?php echo $info['user'];?> 说：<?php echo $info['info'] ?> </strong>
          <p class="mb-sm">
          <small><i class="fa fa-clock-o"></i><?php echo $info['time'] ?></small>
          </p>
		  </div>
		  </div>
		  
          </div>
		  <?php
           } 
		  ?>
          </div>
       </div>
       <div class="panel-footer clearfix">
	   <form action="?" method="post"> <input type="hidden" name="infos" value="ye">
          <div class="input-group">
             <input type="text" placeholder="广告\刷屏\封号处理" name="info" maxlength="24" class="form-control input-sm" required="">
             <span class="input-group-btn">
                <button class="btn btn-default btn-sm" type="submit" >发送</button>
             </span>
          </div>
		  </form>
       </div>
       
    </div>
    
</div>
<?php
include_once 'foot.php';
?>