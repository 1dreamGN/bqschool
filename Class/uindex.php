<?php
require_once ('common.php');
C('webtitle', '用户主页');
C('pageid', 'uindex');
include_once 'head.php';
$uid = is_numeric($_GET['uid']) ? $_GET['uid'] : '0';
if ($_GET['do'] == "search") {
	if (!$_POST['user'] || !$userrows = get_results("select * from {$prefix}users where user=:user limit 1",array(":user"=>$_POST['user']))) {
		exit("<script language='javascript'>alert('用户不存在！');window.location.href='/Class';</script>");
	}
} else {
	if (!$uid || !$userrows = get_results("select * from {$prefix}users where uid=:uid limit 1",array(":uid"=>$uid))) {
		exit("<script language='javascript'>alert('用户不存在！');window.location.href='/Class';</script>");
	}
}
?>
<div class="col-md-6">
    <div class="panel panel-default">
       <div class="panel-heading">
          <div class="panel-title text-center">
              <h4 class="font-bold no-margins" style="margin-bottom:15px;"><?=$userrows['user']?></h4>
              <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?=$userrows['qq']?>&amp;spec=100" width="100" height="100" class="img-circle circle-border m-t-xxs" alt="profile">
              <h5 class="font-bold no-margins">查询时间：<?=date("Y-m-d H:i:s")?></h5>
          </div>
       </div>
       <div class="list-group">
          <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>姓名：<?=$userrows['xm']?></small></div>
                </div>
             </div>
          </div>
		  <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>性别：<?=$userrows['xb']?></small></div>
                </div>
             </div>
          </div>
          <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>个性签名：<?=$userrows['gxqm']?></small></div>
                </div>
             </div>
          </div>
          <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>绑定QQ：<?=$userrows['qq']?></small></div>
                </div>
             </div>
          </div>
		   <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>所在城市：<?=$userrows['zz']?></small></div>
                </div>
             </div>
          </div>
		   <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>口头禅：<?=$userrows['ktc']?></small></div>
                </div>
             </div>
          </div>
		   <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>绰号：<?=$userrows['ch']?></small></div>
                </div>
             </div>
          </div>
		   <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>星座：<?=$userrows['xz']?></small></div>
                </div>
             </div>
          </div>
		   <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>学号：<?=$userrows['xh']?></small></div>
                </div>
             </div>
          </div>
		   <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>联系电话：<?=$userrows['phone']?></small></div>
                </div>
             </div>
          </div>
		  <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>邮箱：<?=$userrows['mail']?></small></div>
                </div>
             </div>
          </div>
		  <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>生日：<?=$userrows['sr']?></small></div>
                </div>
             </div>
          </div>
		  <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>职位：<?=$userrows['zw']?></small></div>
                </div>
             </div>
          </div>
		  <div class="list-group-item but-br">
             <div class="media-box">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>兴趣爱好：<?=$userrows['ah']?></small></div>
                </div>
             </div>
          </div>
          <div class="list-group-item but-br">
             <div class="media-box" style="margin-top:5px;">
                <div class="pull-left" style="margin:auto 5px;">
                   <span class="circle circle-success circle-lg text-left"></span>
                </div>
                <div class="media-box-body clearfix">
                   <div class="media-box-heading m0"><small>用 户 组：
				                    <?php if ($userrows[active] == 9) {
                                                echo '站长 ';
                                            }
                                            if ($userrows[fuzhan] == 1) {
                                                echo '副站长 ';
                                            }
                                            if ($userrows[daili] == 1) {
                                                echo '班委 ';
                                            }
                                            if ($userrows[daili] == 0 && $userrows[fuzhan] == 0 && $userrows[active] == 0) {
                                                echo '学生';
                                            }?></small></div>
                </div>
             </div>
          </div>
       </div>
       <div class="panel-footer clearfix">
          <div class="col-xs-4"><a href="tencent://AddContact/?fromId=45&amp;fromSubId=1&amp;subcmd=all&amp;uin=<?=$userrows['qq']?>&amp;website=www.xkmz.cc" target="_blank" class="btn btn-square btn-primary btn-block btn-xs">加为好友</a></div>
          <div class="col-xs-4"><a href="http://<?=$userrows['qq']?>.qzone.qq.com" target="_blank" class="btn btn-square btn-primary btn-block btn-xs">访问空间</a></div>
          <div class="col-xs-4"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?=$userrows['qq']?>&amp;site=qq&amp;menu=yes" target="_blank" class="btn btn-square btn-primary btn-block btn-xs">联系他/她</a></div>
       </div>
    </div>
 </div>
   <div class="col-md-6">
      <div class="panel panel-primary">
          <div class="panel-heading portlet-handler ui-sortable-handle">搜索用户</div>
          <div class="panel-wrapper">
          <form action="?do=search" role="form" class="form-horizontal ng-pristine ng-valid" method="post">
            <div class="list-group-item bb">
                <div class="input-group">
                  <div class="input-group-addon">用户名</div>
                  <input type="text" class="form-control" name="user" value="" placeholder="输入用户名">
                </div>
            </div>
            
            <div class="list-group-item">
				<button class="btn btn-primary btn-block" type="submit" name="submit" value="1">搜一下</button>
            </div>
          
          </form>
          </div>
      </div>
  </div>
<?php
include_once 'foot.php';
?>