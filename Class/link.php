<?php
require_once('common.php');
C('pageid', 'link');
C('webtitle', '友情链接管理');
include_once 'head.php';
?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    友情链接
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                               <th>网站名称</th>
                        <th>添加时间</th>
						<th>QQ</th>
                        <th>网站链接</th>
                        <th>点击进入</th>
                            </tr>
                            </thead>
                            <tbody>
 <?php
                $rows = $db->query("select * from {$prefix}link where 1=1 order by id desc");
                while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                         <tr>
                        <td><?=$row['name']?></td>
                        <td><?=$row['addtime']?></td>
                        <td><?=$row['qq']?></td>
                        <td><?=$row['link']?></td>
						<td>
                          <a href="http://<?=$row['link']?>" class="active"><i class="fa fa-pencil text-success"></i></a>
                        </td>
                                </tr>
								<?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'foot.php';
?>