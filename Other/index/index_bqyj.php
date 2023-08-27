<?php
require_once('Core/common.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>热爱,你会做得更好 - <?=C('webname')?> - <?=C('webkey')?> - 网站首页</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="冰清玉洁同学录" />

  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
 <link rel="shortcut icon" href="/Style/favicon.ico">
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="/Style/index/css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="/Style/index/css/icomoon.css">
  <!-- Simple Line Icons -->
  <link rel="stylesheet" href="/Style/index/css/simple-line-icons.css">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="/Style/index/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/Style/index/css/owl.theme.default.min.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="/Style/index/css/bootstrap.css">

  <link rel="stylesheet" href="/Style/index/css/style_1_1.css">

  <!-- Styleswitcher ( This style is for demo purposes only, you may delete this anytime. ) -->
  <link rel="stylesheet" id="theme-switch" href="/Style/index/css/style_1_1.css">
  <!-- End demo purposes only -->

  <!-- Modernizr JS -->
  <script src="/Style/index/js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="/Style/index/js/respond.min.js"></script>
  <![endif]-->



  </head>
<body>

	  <header role="banner" id="fh5co-header">
    <div class="container">
      <!-- <div class="row"> -->
          <nav class="navbar navbar-default">
              <div class="navbar-header">
                <!-- Mobile Toggle Menu Button -->
          <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                  <a class="navbar-brand" href="./"><?=C('webname')?> </a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#" data-nav-section="Class"><span>网站首页</span></a></li>
                  <li><a href="#" data-nav-section="services"><span>留言集锦</span></a></li>
                 <?php if(C('loginuid')){?>
				  <li><a href="/Class" class="btn btn-primary btn-sm">欢迎回来，<?=$userrow['user']?></a></li>
				  <?php }else{?>
				 <li><a href="/login.php" class="btn btn-primary btn-sm">登录</a></li>
				  <li><a href="/login.php?do=reg" class="btn btn-primary btn-sm">注册</a></li>
				  <?php }?>
                </ul>
              </div>
          </nav>
      <!-- </div> -->
      </div>
  </header>
	<div id="slider" data-section="Class">
		<div class="owl-carousel owl-carousel-fullwidth">

		    <div class="item" style="background-image:url(/Style/index/images/3.jpg)">
		    	<div class="overlay"></div>
		    	<div class="container" style="position: relative;">
		    		<div class="row">
		    			<div class="col-md-8 col-md-offset-2 text-center">
		    				<div class="fh5co-owl-text-wrap">
						    	<div class="fh5co-owl-text">
		    						<h1 class="fh5co-lead to-animate">web端轻松记录</h1>
									<h2 class="fh5co-sub-lead to-animate">web端同学录，可以在任何时间 地点 打开它，它只需要一台手机或者PC就可任意查看或者记录同学的一切信息！从此放开日记本！</h2>
									<p class="to-animate-2">
					<?php if (C('loginuid')) { ?>
               <a  href="/Class" class="btn btn-primary btn-sm">欢迎回来，<?=$userrow['user']?></a>
				  <?php } else { ?>
				   <a href="/login.php" class="btn btn-primary btn-sm">登录</a>
				     <a href="/login.php?do=reg" class="btn btn-primary btn-sm">注册</a>
				 <?php } ?>   
									</p>
								</div>
							</div>
		    			</div>
		    		</div>
		    	</div>
		    </div>
		    <div class="item" style="background-image:url(http://h2302701417.kuaiyunds.com/h2302701417/20128181071010672.jpg)">
		    	<div class="container" style="position: relative;">
		    		<div class="row">
					    <div class="col-md-7 col-sm-7">
			    			<div class="fh5co-owl-text-wrap">
						    	<div class="fh5co-owl-text">
						    		<h1 class="fh5co-lead to-animate">多功能组合性系统</h1>
									<h2 class="fh5co-sub-lead to-animate">不管是首页还是后台，我们都采用最新的html5扁平化设计！全响应式布局。用户使用起来更加方便好看！从此达到用户需求！
								</h2>
									<p class="to-animate-2">	<?php if (C('loginuid')) { ?>
               <a  href="/Class" class="btn btn-primary btn-sm">欢迎回来，<?=$userrow['user']?></a>
				  <?php } else { ?>
				   <a href="/login.php" class="btn btn-primary btn-sm">登录</a>
				     <a href="/login.php?do=reg" class="btn btn-primary btn-sm">注册</a>
				 <?php } ?>    </p>
						    	</div>
						    </div>
					    </div>
		    		</div>
		    	</div>
		    </div>
		    <div class="item item3" style="background-image:url(http://h2302701417.kuaiyunds.com/h2302701417/opw7xdvzvvvk.jpg)">
		    	<div class="container" style="position: relative;">
		    		<div class="row">
		    			<div class="col-md-7 col-md-push-1 col-md-push-5 col-sm-7 col-sm-push-1 col-sm-push-5">
			    			<div class="fh5co-owl-text-wrap">
						    	<div class="fh5co-owl-text">
						    		<h1 class="fh5co-lead to-animate">全面保护</h1>
									<h2 class="fh5co-sub-lead to-animate"><?=C('webname')?> ，采用php+MySQL进行操作！定期更新！减少bug的数量！系统内部带有最新360安全防御，保证了用户使用安全！</h2>
									<p class="to-animate-2">
										<?php if (C('loginuid')) { ?>
               <a  href="/Class" class="btn btn-primary btn-sm">欢迎回来，<?=$userrow['user']?></a>
				  <?php } else { ?>
				   <a href="/login.php" class="btn btn-primary btn-sm">登录</a>
				     <a href="/login.php?do=reg" class="btn btn-primary btn-sm">注册</a>
				 <?php } ?>   
				 </p>
						    	</div>
						    </div>
					    </div>
		    		</div>
		    	</div>
		    </div>

		</div>
	</div>
    
    <div class="copyrights">Collect from <a href="#" ><?=C('webname')?> </a></div>
	
	<div id="fh5co-our-services" data-section="services">
		<div class="container">
			<div class="row row-bottom-padded-sm">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">同学录</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 to-animate">
							<h3>是记录一个班级或者一个集体同学的家庭地址，联系方式，电话号码，个性语言等等，以达到方便联系，同学之间相互了解，回忆过去的作用。</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="box to-animate">
						<div class="icon colored-5"><span><i class="icon-rocket"></i></span></div>
						<h3>留言集锦</h3>
						<p>梦想这东西和经典一样，永远不会因为时间而褪色，反而更显珍贵。有的人梦想已经实现，。还记得你曾经的梦想吗？那是一朵永不会凋零的花。</p>
					</div>
					<div class="box to-animate">
						<div class="icon colored-4"><span><i class="icon-heart"></i></span></div>
						<h3>留言集锦</h3>
						<p>年少轻狂的自以为是，甜蜜地疯狂地敏感地脆弱地，单薄而无力地形容着。一个温柔甜美而残暴的魔鬼。而我们只能够任凭著他恣意的声线在心中留下止不住的伤悲。</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box to-animate">
						<div class="icon colored-2"><span><i class="icon-screen-desktop"></i></span></div>
						<h3>留言集锦</h3>
						<p>在我们相聚的日子里，有着最珍惜的情谊，在我们年轻的岁月中，有着最真挚的相知，这份缘值得我们珍惜。</p>
					</div>
					<div class="box to-animate">
						<div class="icon colored-1"><span><i class="icon-mustache"></i></span></div>
						<h3>留言集锦</h3>
						<p>我们曾经在一起幻想过美丽的季节。同学啊，同学，分别后不要忘了我们曾经一起走过的日子。我们有过如水的平静，有过激烈的辩论，也有过无声的竞争。</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box to-animate">
						<div class="icon colored-3"><span><i class="icon-user"></i></span></div>
						<h3>留言集锦</h3>
						<p>我们紧靠肩头，紧握双手，拥有一个共同的理想，发出一个共同的心声。无论是得到的，还是失去的，一切都将存留在我记忆的最深处。</p>
					</div>
					<div class="box to-animate">
						<div class="icon colored-6"><span><i class="icon-eye"></i></span></div>
						<h3>留言集锦</h3>
						<p>昨天，有我们在课堂上的争论；昨天，有我们在球场上的奔跑；昨天，有我们在考场上的奋斗；昨天，有我们在烛光中的歌唱。是啊，昨天，多么美好，多么值得回忆！</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    <footer id="footer" role="contentinfo">
        <div class="container">
            <div class="row row-bottom-padded-sm">
                <div class="col-md-12">
                    <p class="copyright text-center">&copy; 2017 <a href="./"><?=C('webname')?> </a>. All Rights Reserved. 来源:<a href="http://blog.qq-bq.cn/" target="_blank">顾念</a></p>
                </div>
            </div>
            <div class="row hide">
                <div class="col-md-12 text-center">
                    <ul class="social social-circle">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                        <li><a href="#"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>



    
    <!-- jQuery -->
    <script src="/Style/index/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="/Style/index/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="/Style/index/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="/Style/index/js/jquery.waypoints.min.js"></script>
    <!-- Owl Carousel -->
    <script src="/Style/index/js/owl.carousel.min.js"></script>

    <!-- For demo purposes only styleswitcher ( You may delete this anytime ) -->
    <script src="/Style/index/js/jquery.style.switcher.js"></script>
    <script>
    $(function(){
        $('#colour-variations ul').styleSwitcher({
            defaultThemeId: 'theme-switch',
            hasPreview: false,
            cookie: {
                expires: 30,
                isManagingLoad: true
            }
        }); 
        $('.option-toggle').click(function() {
            $('#colour-variations').toggleClass('sleep');
        });
    });
    </script>
    <!-- End demo purposes only -->

    <!-- Main JS (Do not remove) -->
    <script src="/Style/index/js/main.js"></script>

    <!-- Add fancyBox main JS and CSS files -->  
    <script src="/Style/index/js/jquery.fancybox.js" type="text/javascript"></script>  
    <link href="/Style/index/css/jquery.fancybox.css" media="screen" rel="stylesheet" type="text/css" />  
    <!-- fancybox_app -->  
    <script src="/Style/index/js/fancybox_app.js" type="text/javascript"></script>  
    <!-- Add mousewheel plugin (this is optional) -->  
    <script src="/Style/index/js/jquery.mousewheel-3.0.6.pack.js" type="text/javascript"></script>  
	</body>
</html>
