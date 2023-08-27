<?php
require_once('common.php');
C('webtitle', 'QQ拉圈圈99+');
C('pageid', 'quanz');
include_once 'head.php';
?>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading portlet-handler ui-sortable-handle">QQ拉圈圈99+提示</div>
            <div class="panel-wrapper">
                <div class="list-group-item bb">加速成功但没加速的，请手动打开QQ即可完成任务。</div>
                <div class="list-group-item bb">全站用户可免费使用，无需QQ密码即可一键拉圈圈。</div>
				<div class="list-group-item bb">一次可供QQ的个性名片全部99+。</div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading portlet-handler ui-sortable-handle">QQ拉圈圈99+控制台</div>
            <div class="panel-wrapper">
                <div class="list-group-item">
                    <div class="input-group">
                        <div class="input-group-addon">拉圈圈账号</div>
                        <input type="text" class="form-control" id="qq" placeholder="请输入您要拉圈圈的QQ" value="">
                    </div>
                </div>
                <div class="list-group-item">
                    <button class="btn btn-primary btn-block music" style="font-size:12px;">提交</button>
                </div>
            </div>
        </div>
    </div>
<?php
include_once 'foot.php';
?>
<script type="text/javascript">
    $(".music").click(function () {
        var qq = $("#qq").val();
        layer.load(1, {shade: [0.1, '#fff']});
        var url = "/Other/qtool/qqz.php?type=quanz";
        htk.postData(url, "qq=" + qq, function (d) {
            layer.closeAll('loading');
            if (d.code == 1) {
                swal({title: d.msg, type: "success"})
                setTimeout(function () {
                    window.location.href = "quanz.php";
                }, 1000);
            } else {
                prompts(d)
            }
        });
    });

</script>