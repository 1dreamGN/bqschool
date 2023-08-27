<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="冰清玉洁同学录程序自带HTK人性化系统,能够离线为网友提供许多云功能,HTK概念是达到无需人工手动则达成任务">
   <meta name="keywords" content="QZONE助手,QQ空间红人必备神奇,QQ空间点赞插件,QQ助手,微商必备工具">
   <title><?=C('webtitle')?> - <?=C('webname')?></title>
   <link rel="shortcut icon" href="/favicon.ico">
   <link rel="stylesheet" href="/Style/vendor/fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="/Style/vendor/simple-line-icons/css/simple-line-icons.css">
   <link rel="stylesheet" href="/Style/vendor/animate.css/animate.min.css">
   <link rel="stylesheet" href="/Style/vendor/whirl/dist/whirl.css">
   <link rel="stylesheet" href="/Style/vendor/weather-icons/css/weather-icons.min.css">
   <link rel="stylesheet" href="/Style/vendor/css/bootstrap.css" id="bscss">
   <link rel="stylesheet" href="/Style/vendor/css/app.css" id="maincss">
   <link href="/Style/user/layer/skin/layer.css" rel="stylesheet">
   <link href="/Style/pjax/pjax.css" rel="stylesheet">
   <script src="/Style/user/layer/layer.js"></script>
   <link rel="stylesheet" type="text/css" href="/Style/sweetalert/sweetalert.css"/>
   <?php require_once ('FM.php'); //载入播放器?>
</head>

<body>
   <div class="wrapper">
      <header class="topnavbar-wrapper">
         <nav role="navigation" class="navbar topnavbar">
            <div class="navbar-header">
               <a href="#/" class="navbar-brand">
                  <div class="brand-logo">
                     <img src="/Style/vendor/img/logo.png" alt="App Logo" class="img-responsive">
                  </div>
                  <div class="brand-logo-collapsed">
                     <img src="/Style/vendor/img/logo-single.png" alt="App Logo" class="img-responsive">
                  </div>
               </a>
            </div>
            <div class="nav-wrapper">
               <ul class="nav navbar-nav">
                  <li>
                     <a href="#" data-trigger-resize="" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                     </a>
                     <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                     </a>
                  </li>
                  <li>
                     <a href="/Class/uset.php" title="用户信息">
                        <em class="icon-user"></em>
                     </a>
                  </li>
                  <li>
                     <a href="/Class/logout.php" title="注销登陆">
                        <em class="icon-lock"></em>
                     </a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="visible-lg">
                     <a href="#" data-toggle-fullscreen="">
                        <em class="icon-size-fullscreen"></em>
                     </a>
                  </li>
                  <li class="dropdown dropdown-list">
                     <a href="#" data-toggle="dropdown">
                        <em class="icon-bell"></em>
                     </a>
                     <ul class="dropdown-menu animated flipInX">
                        <li>
                           <div class="list-group">
                              <a href="/Class/user.php" class="list-group-item">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-tasks fa-2x text-success"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">资料修改</p>
                                       <p class="m0 text-muted">
                                          <small>查看信息 / 资料修改</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <a href="#" class="list-group-item">
                                 <small>更多功能 ....</small>
                                 <span class="label label-danger pull-right">N+</span>
                              </a>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <aside class="aside">
         <div class="aside-inner">
            <nav data-sidebar-anyclick-close="" class="sidebar">
               <ul class="nav">
                  <li class="has-user-block">
                     <div class="item user-block">
                   <div class="user-block-picture">
                      <div class="user-block-status">
                         <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?=$userrow['qq']?>&spec=100" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                         <div class="circle circle-success circle-lg"></div>
                      </div>
                   </div>
                   <div class="user-block-info">
                      <span class="user-block-name"><?=$userrow['user']?></span>
					  <span class="user-block-role"> QQ:<?=$userrow['qq']?></span>
                   </div>
                </div>

                  </li>
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.HEADER">导航</span>
                  </li>
                  <li <?php if(C('pageid')=='user'){ echo'class="active"';}?>>
                     <a href="#dashboard" title="用户中心" data-toggle="collapse">
                        <em class="icon-home"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">用户中心</span>
                     </a>
                     <ul id="dashboard" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">用户中心</li>
                        <li <?php if(C('pageid')=='user'){ echo'class="active"';}?>>
                           <a href="/Class/index.php" title="用户中心">
                              <span>用户中心</span>
                           </a>
                        </li>
						<?php if($userrow['active']==9){?>
                        <li>
                           <a href="/admin/index.php" title="后台管理">
                              <span>网站后台</span>
                           </a>
                        </li>
						<?php } ?>
                     </ul>
                  </li>
				  <li <?php if(C('pageid')=='link'){ echo'class="active"';}?>>
                     <a href="link.php" title="友情链接">
                        <em class="icon-link"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">友情链接</span>
                     </a>
                  </li>
                  <li <?php if(C('pageid')=='chat'){ echo'class="active"';}?>>
                     <a href="/Class/chat.php" title="聊天交流">
                        <em class="icon-bubbles"></em>
                        <span data-localize="sidebar.nav.WIDGETS">聊天交流</span>
                     </a>
                  </li>
                  <li <?php if(C('pageid')=='classmate'){ echo'class="active"';}?>>
                     <a href="/Class/classmate.php" title="同学录" >
					 <div class="pull-right label label-success"><?=get_count('users',"uid")?></div>
                        <em class="icon-tag"></em>
                        <span data-localize="sidebar.nav.FZZ">同学录</span>
                     </a>
                  </li>
				  <li <?php if(C('pageid')=='classlist'){ echo'class="active"';}?>>
                     <a href="/Class/classlist.php" title="CQY交友" >
                        <em class="fa fa-users"></em>
                        <span data-localize="sidebar.nav.USER">同学交友墙</span>
                     </a>
                  </li>
                  <li <?php if(C('pageid')=='uset' or C('pageid')=='uindex' or C('pageid')=='datamodification'){ echo'class="active"';}?>>
                     <a href="#elements" title="用户资料" data-toggle="collapse">
                        <em class="icon-user"></em>
                        <span data-localize="sidebar.nav.element.ELEMENTS">用户资料</span>
                     </a>
                     <ul id="elements" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">用户资料</li>
                        <li <?php if(C('pageid')=='uset'){ echo'class="active"';}?>>
                           <a href="/Class/uset.php" title="资料修改">
                              <span data-localize="sidebar.nav.element.BUTTON">密保修改</span>
                           </a>
                        </li>
						<li <?php if(C('pageid')=='Datamodification'){ echo'class="active"';}?>>
                           <a href="/Class/datamodification.php" title="资料修改">
                              <span data-localize="sidebar.nav.element.BUTTON">资料修改</span>
                           </a>
                        </li>
                        <li <?php if(C('pageid')=='uindex'){ echo'class="active"';}?>>
                           <a href="/Class/uindex.php?uid=<?=$userrow['uid']?>" title="我的主页">
                              <span data-localize="sidebar.nav.element.NOTIFICATION">我的主页</span>
                           </a>
                        </li>
                     </ul>
                  </li>
               
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.COMPONENTS">插件</span>
                  </li>
				     <li <?php if(C('pageid')=='physics' or C('pageid')=='chemistry'or C('pageid')=='math'){ echo'class="active"';}?>>
                     <a href="#xxgj" title="学习工具" data-toggle="collapse">
                        <em class="icon-note"></em>
                        <span data-localize="sidebar.nav.XXGJ">学习工具</span>
                     </a>
					  <ul id="xxgj" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">学习工具</li>
                        <li <?php if(C('pageid')=='physics'){ echo'class="active"';}?>>
                           <a href="/Class/physics.php" title="物理高中公式">
                              <span>物理高中公式</span>
                           </a>
                        </li>
                        <li <?php if(C('pageid')=='chemistry'){ echo'class="active"';}?>>
                           <a href="/Class/chemistry.php" title="元素周期表">
                              <span>元素周期表</span>
                           </a>
                        </li>
						<li <?php if(C('pageid')=='math'){ echo'class="active"';}?>>
                           <a href="/Class/math.php" title="数学高中公式">
                              <span>数学高中公式</span>
                           </a>
                        </li>
                     </ul>
                  </li>
				  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.MORE">更多</span>
                  </li>
                  <li <?php if(C('pageid')=='qd' or C('pageid')=='reginfo' or C('pageid')=='classlist' or C('pageid')=='auth' or C('pageid')=='qiuqiu'){ echo'class="active"';}?>>
                     <a href="#charts" title="其他功能" data-toggle="collapse">
                        <em class="icon-game-controller"></em>
                        <span data-localize="sidebar.nav.chart.CHART">其他功能</span>
                     </a>
                     <ul id="charts" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">其他功能</li>
                        <li <?php if(C('pageid')=='qiuqiu'){ echo'class="active"';}?>>
                           <a href="/Class/qiuqiu.php" title="球球代点">
                              <span>球球代点</span>
                           </a>
                        </li>
                        <li <?php if(C('pageid')=='qqmusic'){ echo'class="active"';}?>>
                           <a href="/Class/qqmusic.php" title="一键完成QQ音乐加速任务">
                              <span>音乐加速</span>
                           </a>
                        </li>
						 <li <?php if(C('pageid')=='quanz'){ echo'class="active"';}?>>
                           <a href="/Class/quanz.php" title="拉圈圈99+">
                              <span>拉圈圈99+</span>
                           </a>
                        </li>
						<li <?php if(C('pageid')=='pysms'){ echo'class="active"';}?>>
                           <a href="/Class/pysms.php" title="一键完成QQ音乐加速任务">
                              <span>短信炸弹</span>
                           </a>
                        </li>
						<li <?php if(C('pageid')=='netpolice'){ echo'class="active"';}?>>
                           <a href="/Class/netpolice.php" title="QQ网警">
                              <span>QQ网警</span>
                           </a>
                        </li>
                        <li <?php if(C('pageid')=='help'){ echo'class="active"';}?>>
                           <a href="/Class/help.php" title="新手帮助">
                              <span>功能介绍</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class=" ">
                     <a href="/Class/logout.php" title="注销登陆">
                        <em class="icon-logout"></em>
                        <span data-localize="sidebar.nav.DOCUMENTATION">注销登陆</span>
                     </a>
                  </li>
               </ul>
               <!-- END sidebar nav-->
            </nav>
         </div>
         <!-- END Sidebar (left)-->
      </aside>
      <!-- offsidebar-->
      <aside class="offsidebar hide">
         <!-- START Off Sidebar (right)-->
         <nav>
            <div role="tabpanel">
               <!-- Nav tabs-->
               <ul role="tablist" class="nav nav-tabs nav-justified">
                  <li role="presentation" class="active">
                     <a href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
                        <em class="icon-equalizer fa-lg"></em>
                     </a>
                  </li>
                  <li role="presentation">
                     <a href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
                        <em class="icon-user fa-lg"></em>
                     </a>
                  </li>
               </ul>
               <!-- Tab panes-->
               <div class="tab-content">
                  <div id="app-settings" role="tabpanel" class="tab-pane fade in active">
                     <h3 class="text-center text-thin">性能调节</h3>
                     <div class="p">
                        <h4 class="text-muted text-thin">主题</h4>
                        <div class="table-grid mb">
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="/Style/vendor/css/theme-a.css">
                                    <input type="radio" name="setting-theme" checked="checked">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-info"></span>
                                       <span class="color bg-info-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="/Style/vendor/css/theme-b.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-green"></span>
                                       <span class="color bg-green-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="/Style/vendor/css/theme-c.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-purple"></span>
                                       <span class="color bg-purple-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="/Style/vendor/css/theme-d.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-danger"></span>
                                       <span class="color bg-danger-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="table-grid mb">
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="/Style/vendor/css/theme-e.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-info-dark"></span>
                                       <span class="color bg-info"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="/Style/vendor/css/theme-f.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-green-dark"></span>
                                       <span class="color bg-green"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="/Style/vendor/css/theme-g.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-purple-dark"></span>
                                       <span class="color bg-purple"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="/Style/vendor/css/theme-h.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-danger-dark"></span>
                                       <span class="color bg-danger"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <h4 class="text-muted text-thin">布局</h4>
                        <div class="clearfix">
                           <p class="pull-left">固定导航</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">居中显示</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">收起侧边栏</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-collapsed" type="checkbox" data-toggle-state="aside-collapsed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">窗口浮动</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-collapsed-text" type="checkbox" data-toggle-state="aside-collapsed-text">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="app-chat" role="tabpanel" class="tab-pane fade">
                     <h3 class="text-center text-thin">同学QQ列表</h3>
                     <ul class="nav">
                        <!-- START list title-->
                        <li class="p">
                           <small class="text-muted">最新添加</small>
                        </li>
                        <!-- END list title-->
						<?php 
						$rowss = $db->query("select * from {$prefix}users where 1=1 order by uid desc limit 10");
						while($row = $rowss->fetch(PDO::FETCH_ASSOC)){
						?>
                        <li>
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-success circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?=$row['qq']?>&spec=100" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong># <?=$row[qq]?></strong>
                                    <br>
                                    <small class="text-muted"><?=$row[regtime]?></small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- END User status-->
                        </li>
						<?php } ?>
                        <li>
                           <div class="p-lg text-center">
                              <!-- Optional link to list more users-->
                              <a href="#" ui-sref="add" title="See more contacts" class="btn btn-info btn-square btn-block btn-sm">
							  查看更多
							  </a>
                           </div>
                        </li>
                     </ul>
                     <!-- Extra items-->
                  </div>
               </div>
            </div>
         </nav>
         <!-- END Off Sidebar (right)-->
      </aside>
      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper fadeIn ng-scope">
			<h3 style="overflow:hidden;">
			<span class="pull-left"><?=C('webtitle')?></span>
			<div style="width:100%; height:4px;" class="hidden-xs"></div>
			<ol class="breadcrumb pull-right">
                  <?php if(C('pageid')!='user'){ ?>
				  <li class="active"><?=C('webtitle')?></li>
				  <?php } ?>
				  <li><a href="/Class/index.php" title="返回用户中心">主页</a></li>
			</ol>
			</h3>
<div class="container-fluid content pjax">