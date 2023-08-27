<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="冰清玉洁同学录程序自带人性化系统,能够离线为网友提供许多云功能">
   <meta name="keywords" content="QZONE助手,QQ空间红人必备神奇,QQ空间点赞插件,QQ助手,微商必备工具">
   <title><?=C('webtitle')?> - <?=C('webname')?></title>
   <link rel="shortcut icon" href="/favicon.ico">
   <link rel="stylesheet" href="/Style/vendor/fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="/Style/vendor/simple-line-icons/css/simple-line-icons.css">
   <link rel="stylesheet" href="/Style/vendor/animate.css/animate.min.css">
   <link rel="stylesheet" href="/Style/vendor/whirl/dist/whirl.css">
   <link rel="stylesheet" type="text/css" href="/Style/sweetalert/sweetalert.css"/>
   <link rel="stylesheet" href="/Style/vendor/weather-icons/css/weather-icons.min.css">
   <link rel="stylesheet" href="/Style/vendor/css/bootstrap.css" id="bscss">
   <link rel="stylesheet" href="/Style/vendor/css/app.css" id="maincss">
</head>

<body>
   <div class="wrapper">
      <!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav role="navigation" class="navbar topnavbar">
            <!-- START navbar header-->
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
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
               <!-- START Left navbar-->
               <ul class="nav navbar-nav">
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a href="#" data-trigger-resize="" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                     </a>
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                     </a>
                  </li>
                  <!-- START User avatar toggle-->
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a href="/admin/ulist.php" title="用户列表">
                        <em class="icon-user"></em>
                     </a>
                  </li>
                  <!-- END User avatar toggle-->
                  <!-- START lock screen-->
                  <li>
                     <a href="/Class/logout.php" title="注销登陆">
                        <em class="icon-lock"></em>
                     </a>
                  </li>
                  <!-- END lock screen-->
                  <!-- START qqlist-->
                  <!-- END qqlist-->
               </ul>
               <!-- END Left navbar-->
               <!-- START Right Navbar-->
               <ul class="nav navbar-nav navbar-right">
                  <!-- Search icon-->
                  <!-- Fullscreen (only desktops)-->
                  <li class="visible-lg">
                     <a href="#" data-toggle-fullscreen="">
                        <em class="icon-size-fullscreen"></em>
                     </a>
                  </li>
                  <!-- START Alert menu-->
                  <li class="dropdown dropdown-list">
                     <a href="#" data-toggle="dropdown">
                        <em class="icon-bell"></em>
                     </a>
                     <!-- START Dropdown menu-->
                     <ul class="dropdown-menu animated flipInX">
                        <li>
                           <!-- START list group-->
                           <div class="list-group">
                              <!-- list item-->
                              <a href="/admin/ulist.php" class="list-group-item">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-users fa-2x text-info"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">用户列表</p>
                                       <p class="m0 text-muted">
                                          <small>管理全站的用户</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- list item-->
                              
                              <!-- last list item-->
                              <a href="#" class="list-group-item">
                                 <small>更多功能 ....</small>
                                 <span class="label label-danger pull-right">N+</span>
                              </a>
                           </div>
                           <!-- END list group-->
                        </li>
                     </ul>
                     <!-- END Dropdown menu-->
                  </li>
                  <!-- END Alert menu-->
                  <!-- START Offsidebar button-->
                  <li>
                     <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                     </a>
                  </li>
                  <!-- END Offsidebar menu-->
               </ul>
               <!-- END Right Navbar-->
            </div>
            <!-- END Nav wrapper-->
         </nav>
         <!-- END Top Navbar-->
      </header>
      <!-- sidebar-->
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <div class="aside-inner">
            <nav data-sidebar-anyclick-close="" class="sidebar">
               <!-- START sidebar nav-->
               <ul class="nav">
                  <!-- START user info-->
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
                      <span class="user-block-role">超级管理员</span>
                   </div>
                </div>

                  </li>
                  <!-- END user info-->
                  <!-- Iterates over all sidebar items-->
                  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.HEADER">导航</span>
                  </li>
                  <li <?php if(C('pageid')=='index'){ echo'class="active"';}?>>
                     <a href="#dashboard" title="后台管理" data-toggle="collapse">
                        <em class="icon-speedometer"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">后台管理</span>
                     </a>
                     <ul id="dashboard" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">后台管理</li>
						<?php if($userrow['active']==9){?>
                        <li <?php if(C('pageid')=='index'){ echo'class="active"';}?>>
                           <a href="/admin/index.php" title="后台首页">
                              <span>后台首页</span>
                           </a>
                        </li>
						<?php } ?>
                        <li <?php if(C('pageid')=='user'){ echo'class="active"';}?>>
                           <a href="/Class/index.php" title="用户中心">
                              <span>用户中心</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li <?php if(C('pageid')=='adminset' or C('pageid')=='template'){ echo'class="active"';}?>>
                     <a href="#set" title="系统管理" data-toggle="collapse">
                        <em class="fa fa-cog"></em>
                        <span data-localize="sidebar.nav.SET">系统管理</span>
                     </a>
                     <ul id="set" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">系统管理</li>
                        <li>
                           <a href="/admin/set.php" title="网站设置">
                              <span>网站设置</span>
                           </a>
                        </li>
						<li>
                           <a href="/admin/template.php" title="界面管理">
                              <span>界面管理</span>
                           </a>
                        </li>
						<li>
                           <a href="/admin/ggset.php" title="公告管理">
                              <span>公告管理</span>
                           </a>
                        </li>
						<li>
                           <a href="/admin/weblink.php" title="友情链接">
                              <span>友情链接</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li <?php if(C('pageid')=='adminuser' or C('pageid')=='adminqq'){ echo'class="active"';}?>>
                     <a href="#user" title="用户管理" data-toggle="collapse">
                        <em class="fa fa-users"></em>
                        <span data-localize="sidebar.nav.USER">用户管理</span>
                     </a>
                     <ul id="user" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">用户管理</li>
                        <li>
                           <a href="/admin/ulist.php" title="网站设置">
                              <span>用户列表</span>
                           </a>
                        </li>
                     </ul>
                  </li>
				  <li class="nav-heading ">
                     <span data-localize="sidebar.heading.MORE">更多</span>
                  </li>
                  <li <?php if(C('pageid')=='qd' or C('pageid')=='reginfo' or C('pageid')=='mzlist' or C('pageid')=='auth' or C('pageid')=='qiuqiu'){ echo'class="active"';}?>>
                     <a href="#charts" title="其他功能" data-toggle="collapse">
                        <em class="icon-grid"></em>
                        <span data-localize="sidebar.nav.chart.CHART">其他功能</span>
                     </a>
                     <ul id="charts" class="nav sidebar-subnav collapse">
                        <li class="sidebar-subnav-header">其他功能</li>
                        <li>
                           <a href="/admin/update.php" title="程序升级">
                              <span data-localize="sidebar.nav.chart.FLOT">程序升级</span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li>
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
				  <li><a href="/admin/index.php" title="返回后台首页">主页</a></li>
			</ol>
			</h3>