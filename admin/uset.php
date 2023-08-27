<?php
require_once('common.php');
$uid = is_numeric($_GET['uid']) ? $_GET['uid'] : '0';
$stmt = $db->query("select * from {$prefix}users where uid='$uid' limit 1");
if (!$uid || !$user = $stmt->fetch(PDO::FETCH_ASSOC)) {
    exit("<script language='javascript'>alert('用户不存在！');window.location.href='ulist.php';</script>");
}
if ($do = $_POST['do']) {
	if ($do == 'update') {
        $mail=safestr($_POST['mail']);
		$phone=safestr($_POST['phone']);
		$xm=safestr($_POST['xm']);
		$sr=safestr($_POST['sr']);
		$xz=safestr($_POST['xz']);
		$zz=safestr($_POST['zz']);
		$tc=safestr($_POST['tc']);
		$ah=safestr($_POST['ah']);
		$xb=safestr($_POST['xb']);
		$ch=safestr($_POST['ch']);
		$xh=safestr($_POST['xh']);
		$zw=safestr($_POST['zw']);
    $ktc=safestr($_POST['ktc']);
    $gxqm=safestr($_POST['gxqm']);
		$set = "xm='{$xm}',sr='{$sr}',xz='{$xz}',ah='{$ah}',tc='{$tc}',zz='{$zz}',xb='{$xb}',ch='{$ch}',xh='{$xh}',zw='{$zw}',mail='{$mail}',ktc='{$ktc}',gxqm='{$gxqm}'";
		if ($_POST['pwd']) {
			$pwd = md5(md5($_POST['pwd']) . md5('1340176819'));
			$set.= ",pwd='{$pwd}'";
		}
		$stmt = $db->prepare("select * from {$prefix}users where phone=:phone and uid!=:uid limit 1");
		$stmt->execute(array(':phone' => $phone, ':uid' => $userrow['uid']));
		if ($stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<script language='javascript'>alert('手机号已存在！');window.location.href='ulist.php';</script>";
		} else {
			$db->query("update {$prefix}users set {$set} where uid='{$userrow['uid']}'");
			echo "<script language='javascript'>alert('修改成功');window.location.href='ulist;</script>";
		}
	}
}
C('webtitle', $user[user] . '-用户修改');
C('pageid', 'adminuser');
include_once 'head.php';
?>
   <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    基本设置
                </div>
                <div class="panel-body">
                        <form action="?xz=quanquan" class="form-horizontal" method="post">
                        <input type="hidden" name="do" value="update">
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">姓名</div>

                                <input class="form-control" type="text" name="xm" value="<?=$userrow['xm']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">个性签名</div>

                                <input class="form-control" type="text" name="gxqm" value="<?=$userrow['gxqm']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">绰号</div>

                                <input class="form-control" type="text" name="ch" value="<?=$userrow['ch']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">学号</div>

                                <input class="form-control" type="text" name="xh" value="<?=$userrow['xh']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">生日</div>

                                <input class="form-control" type="text" name="sr" value="<?=$userrow['sr']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">住址</div>

                                <input class="form-control" type="text" name="zz" value="<?=$userrow['zz']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">联系电话</div>

                                <input class="form-control" type="text" name="phone"
                                       value="<?=$userrow['phone']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">邮箱</div>

                                <input class="form-control" type="text" name="mail"
                                       value="<?=$userrow['mail']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">职位</div>

                                <input class="form-control" type="text" name="zw"
                                       value="<?=$userrow['zw']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">爱好</div>

                                <input class="form-control" type="text" name="ah"
                                       value="<?=$userrow['ah']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">特长</div>

                                <input class="form-control" type="text" name="tc"
                                       value="<?=$userrow['tc']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                            <div class="input-group">
                                <div class="input-group-addon">口头禅</div>

                                <input class="form-control" type="text" name="ktc"
                                       value="<?=$userrow['ktc']?>">
                            </div>
                        </div>
                        <div class="list-group-item bb">
                <div class="input-group">
                    <div class="input-group-addon">性别</div>
					 <div class="form-control-1">
                                <label class="checkbox c-checkbox c-checkbox-rounded"><input type="radio" name="xb" value="男" checked=""><span
                                        class="fa fa-check"></span>男</label>
                            </div>
                            <div class="form-control-1">
                                <label class="checkbox c-checkbox c-checkbox-rounded"><input type="radio" name="xb" value="女" <?php if($userrow['xb']==女) echo 'checked=""';?>><span
                                        class="fa fa-check"></span>女</label>
                            </div>
                </div>
            </div>
			 <div class="list-group-item bb">
                <div class="input-group">
                    <div class="input-group-addon">星座</div>
                     <select class="form-control m-b" name="xz">
                                        <option value="白羊座">白羊座</option>
                                        <option value="金牛座">金牛座</option>
                                        <option value="双子座">双子座</option>
                                        <option value="巨蟹座">巨蟹座</option>
                                         <option value="狮子座">狮子座</option>
                                          <option value="处女座">处女座</option>
                                           <option value="天秤座">天秤座</option>
                                            <option value="天蝎座">天蝎座</option>
                                             <option value="射手座">射手座</option>
                                              <option value="摩羯座">摩羯座</option>
                                               <option value="水瓶座">水瓶座</option>
                                                <option value="双鱼座">双鱼座</option>
                                    </select>
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

    </div>
<?php
include_once 'foot.php';
?>