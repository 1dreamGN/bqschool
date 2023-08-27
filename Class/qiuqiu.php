<?php
require_once('common.php');
C('webtitle', '球球大作战代点');
C('pageid', 'qiuqiu');
include_once 'head.php';
?>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading portlet-handler ui-sortable-handle">代点提示</div>
            <div class="panel-wrapper">
                <div class="list-group-item bb">链接请输入在球球大作战中的邀请好友链接。</div>
                <div class="list-group-item bb">可每日领取，但每日不能重复领取。</div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading portlet-handler ui-sortable-handle">球球大作战代点控制台</div>
            <div class="panel-wrapper">
                <div class="list-group-item">
                    <div class="input-group">
                        <div class="input-group-addon">邀请链接</div>
                        <input type="text" class="form-control" id="url" placeholder="请输入您的链接" value="">
                    </div>
                </div>
                <div class="list-group-item">
                    <button class="btn btn-primary btn-block qiuqiu" style="font-size:12px;">提交</button>
                </div>
            </div>
        </div>
    </div>
<?php
include_once 'foot.php';
?>
<script type="text/javascript">
    $(".qiuqiu").click(function () {
        var urls = $("#url").val();
        layer.load(1, {shade: [0.1, '#fff']});
        var url = "/Other/qtool/qiuqiu.php?type=qiu";
        htk.postData(url, "url=" + urls, function (d) {
            layer.closeAll('loading');
            if (d.code == 1) {
                swal({title: d.msg, type: "success"})
                setTimeout(function () {
                    window.location.href = "qiuqiu.php";
                }, 1000);
            } else {
                prompts(d)
            }
        });
    });

</script>
