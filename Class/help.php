<?php
require_once 'common.php';
C('pageid', 'help');
C('webtitle', '新手帮助');
include_once 'head.php';
?>
    <div class="row">
        <div class="col-lg-8 col-sm-10 col-xs-12 center-block" role="main">
            <div class="panel panel-primary">
                <div class="panel-heading w h">
                    <h3 class="panel-title" align="center">为什么选择我们?</h3>
                </div>
                <div class="box">
                        <p class="bg-warning" style="padding: 10px; font-size: 90%;">1、本站采用分布式云端系统实时监控，自动选择最高效的路线</p>
                        <p class="bg-success" style="padding: 10px; font-size: 90%;">2、强大的人性化系统，根据服务器的优良自动分配功能运行
                            支持Php7.0 大大提升运行效率。</p>
                        <p class="bg-purple" style="padding: 10px; font-size: 90%;">3、密码适用MD5 32位小写加密
                            即使数据泄露 也能给敌人增加难度。</p>
                    </li>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading w h"><h3 class="panel-title">功能简介</h3></div>
                <div class="panel-body box"><b>新版特性：</b><br>
                    1、全新界面：基于Bootstrap设计，响应式布局，台式/平板电脑与智能手机两用。<br>
                    2、强大的任务运行机制：分布式任务调度、多线程模式，提升运行效率，并力求将服务器负载降到最低。<br>
                    3、更多的界面风格：可在新版界面和旧版界面自由切换，同时针对两种界面分别预置了多款不同的皮肤供你选择<br>
                    4、安全性保障：360网站卫士全局防SQL注入、IP禁访配置、网址屏蔽配置<br>
                    5、php基本版本已经支持php5.3-php7.0之间可随意切换到运行效率最高的版本<br>
                    6、全新授权机制，高效运行系统，全智能操作无需等待即可使用<br>
                </div>
				</div>

            </div>
            <div class="clearfix"></div>
        </div>
<?php
include_once 'foot.php';
?>