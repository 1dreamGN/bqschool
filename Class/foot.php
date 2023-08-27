</div>
</section>

<footer>
    <div class="pull-right hidden-xs">
        <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('webqq')?>&site=qq&menu=yes"
           target="_blank">站长QQ：<?php echo C('webqq')?></a>
    </div>
    <span>&copy; 2016 - <?php echo C('webname')?>(<?php echo $domain?>)</span>
</footer>
</div>

<script src="/Style/vendor/modernizr/modernizr.custom.js"></script>

<script src="/Style/vendor/user_style/postAndMore.js"></script>

<script src="/Style/vendor/matchMedia/matchMedia.js"></script>

<script src="/Style/vendor/jquery/dist/jquery.js"></script>

<script src="/Style/vendor/bootstrap/dist/js/bootstrap.js"></script>

<script src="/Style/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>

<script src="/Style/vendor/jquery.easing/js/jquery.easing.js"></script>

<script src="/Style/vendor/animo.js/animo.js"></script>

<script src="/Style/vendor/slimScroll/jquery.slimscroll.min.js"></script>

<script src="/Style/vendor/screenfull/dist/screenfull.js"></script>

<script src="/Style/vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>

<script src="/Style/vendor/js/demo/demo-rtl.js"></script>

<script src="/Style/vendor/sparkline/index.js"></script>

<script src="/Style/vendor/Flot/jquery.flot.js"></script>

<script src="/Style/vendor/layer/layer.js"></script>

<script src="/Style/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>

<script src="/Style/vendor/Flot/jquery.flot.resize.js"></script>

<script src="/Style/vendor/Flot/jquery.flot.pie.js"></script>

<script src="/Style/vendor/Flot/jquery.flot.time.js"></script>

<script src="/Style/vendor/Flot/jquery.flot.categories.js"></script>

<script src="/Style/vendor/flot-spline/js/jquery.flot.spline.min.js"></script>

<script src="/Style/vendor/jquery-classyloader/js/jquery.classyloader.min.js"></script>

<script src="/Style/vendor/moment/min/moment-with-locales.min.js"></script>

<script src="/Style/vendor/js/demo/demo-flot.js"></script>

<script src="/Style/vendor/js/app.js"></script>

<script src="/Style/sweetalert/sweetalert.min.js"></script>

<?php if(!empty($msg))echo "<script type='text/javascript'>{$msg}</script>";
?>
<?php if(C("music")=='1'){ ?>
<?php IF(!$pjax){ ?>
    <script src="/Style/pjax/pjax.js"></script>
    <script type="text/javascript">
    $(document).pjax('a[target!=_blank][pjax!=no][href!=#]', '.pjax', {fragment:'.pjax', timeout:5000});
    $(document).on('pjax:send', function() { //pjax链接点击后显示加载动画；
    $(".colorful_loading_frame,.colorful_loading").css("display", "block");
    });
    $(document).on('pjax:complete', function() { //pjax链接加载完成后隐藏加载动画；
    $(".colorful_loading_frame,.colorful_loading").css("display", "none");
	$('#qqjob').modal('hide');
	$('#bind').modal('hide');
    });
    </script>
    <div class="pjax_loading"></div>
    <div class="colorful_loading_frame">
    <div class="colorful_loading"><i class="rect1"></i><i class="rect2"></i><i class="rect3"></i><i class="rect4"></i><i class="rect5"></i></div>
	 <?php } ?>
	  <?php } ?>
<?php if ($userrow['player'] == 1) {?>
<?php IF(!$pjax){ ?>
    <script src="/Style/pjax/pjax.js"></script>
    <script type="text/javascript">
    $(document).pjax('a[target!=_blank][pjax!=no][href!=#]', '.pjax', {fragment:'.pjax', timeout:5000});
    $(document).on('pjax:send', function() { //pjax链接点击后显示加载动画；
    $(".colorful_loading_frame,.colorful_loading").css("display", "block");
    });
    $(document).on('pjax:complete', function() { //pjax链接加载完成后隐藏加载动画；
    $(".colorful_loading_frame,.colorful_loading").css("display", "none");
	$('#qqjob').modal('hide');
	$('#bind').modal('hide');
    });
    </script>
    <div class="pjax_loading"></div>
    <div class="colorful_loading_frame">
    <div class="colorful_loading"><i class="rect1"></i><i class="rect2"></i><i class="rect3"></i><i class="rect4"></i><i class="rect5"></i></div>
	 <?php } ?>
	  <?php } ?>

</body>

</html>