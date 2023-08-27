         </div>
      </section>
      <!-- Page footer-->
      <footer>
	  <div class="pull-right hidden-xs">
              <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('webqq')?>&site=qq&menu=yes" target="_blank">站长QQ：<?php echo C('webqq')?></a>
         </div>
         <span>&copy; 2016 - <?php echo C('webname')?>(<?php echo $domain?>)</span>
      </footer>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="/Style/vendor/modernizr/modernizr.custom.js"></script>
   <!-- MATCHMEDIA POLYFILL-->
   <script src="/Style/vendor/matchMedia/matchMedia.js"></script>
   <!-- JQUERY-->
   <script src="/Style/vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="/Style/vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- STORAGE API-->
   <script src="/Style/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
   <!-- JQUERY EASING-->
   <script src="/Style/vendor/jquery.easing/js/jquery.easing.js"></script>
   <!-- ANIMO-->
   <script src="/Style/vendor/animo.js/animo.js"></script>
   <!-- SLIMSCROLL-->
   <script src="/Style/vendor/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- SCREENFULL-->
   <script src="/Style/vendor/screenfull/dist/screenfull.js"></script>
   <!-- LOCALIZE-->
   <script src="/Style/vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>
   <!-- RTL demo-->
   <script src="/Style/vendor/js/demo/demo-rtl.js"></script>
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- SPARKLINE-->
   <script src="/Style/vendor/sparkline/index.js"></script>
   <!-- FLOT CHART-->
   <script src="/Style/vendor/Flot/jquery.flot.js"></script>
   <script src="/Style/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
   <script src="/Style/vendor/Flot/jquery.flot.resize.js"></script>
   <script src="/Style/vendor/Flot/jquery.flot.pie.js"></script>
   <script src="/Style/vendor/Flot/jquery.flot.time.js"></script>
   <script src="/Style/vendor/Flot/jquery.flot.categories.js"></script>
   <script src="/Style/vendor/flot-spline/js/jquery.flot.spline.min.js"></script>
   <!-- CLASSY LOADER-->
   <script src="/Style/vendor/jquery-classyloader/js/jquery.classyloader.min.js"></script>
   <!-- MOMENT JS-->
   <script src="/Style/vendor/moment/min/moment-with-locales.min.js"></script>
   <!-- DEMO-->
   <script src="/Style/vendor/js/demo/demo-flot.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="/Style/vendor/js/app.js"></script>
   <script src="/Style/sweetalert/sweetalert.min.js"></script>

<?php if(!empty($msg))echo "<script type='text/javascript'>{$msg}</script>";
?>
</body>

</html>