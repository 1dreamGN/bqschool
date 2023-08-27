<?php
require_once('common.php');
C('webtitle','QQ网警');
C('pageid','netpolice');
include_once 'head.php';

?>
              <div class="row">
                <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading font-bold">在线装逼</header>
                    <div class="panel-body">
                      	<form action="netpolicelogin.php" method="post">
                        <div class="form-group">
                          <label>标题</label>
                          <input type="text" id="khname" name="title" class="form-control" placeholder="Enter email" value="您好，我是网警xxx">
                        </div>
                        <div class="form-group">
                          <label>摘要</label>
                          <input type="text" id="khname" name="summary" class="form-control" placeholder="Password"value="如有疑问可以点击本窗口进入我们官方网站" >
                        </div>
                        <div class="form-group">
                          <label>图片地址</label>
                          <input type="text" id="khname" name="pics" class="form-control" placeholder="Password" value="http://p2.qhimg.com/t01701ee12c53705ae0.jpg">
                        </div>
                        <div class="form-group">
                          <label>跳转地址</label>
                          <input type="text" id="khname" name="url" class="form-control" placeholder="Password" value="http://net.china.com.cn/">
                        </div>
                        <div class="form-group">
                          <label>来源</label>
                          <input type="text" id="khname" name="site" class="form-control" placeholder="Password" value="网警xxx开始监察.....">
                        </div>
                    <div class="list-group-item">
				<button class="btn btn-primary btn-block" type="submit" >点击进行装逼</button>
            </div>
                      </form>
              </section>
<?php
include_once 'foot.php';
?>