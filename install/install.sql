DROP TABLE IF EXISTS `bqyj_gonggao`;
CREATE TABLE IF NOT EXISTS `bqyj_gonggao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `con` varchar(1000) DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
 DROP TABLE IF EXISTS `bqyj_link`;
CREATE TABLE IF NOT EXISTS `bqyj_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qq` varchar(1000) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bqyj_chat`;
CREATE TABLE `bqyj_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` text,
  `user` text,
  `info` text,
  `time` text,
  `qid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bqyj_users`;
CREATE TABLE `bqyj_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `sid` varchar(50) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `fuzhan` tinyint(1) DEFAULT '0',
  `player` tinyint(1) DEFAULT '0',
  `login` tinyint(255) DEFAULT '1',
  `mail` varchar(100) DEFAULT NULL,
  `qq` varchar(255) DEFAULT '0',
  `phone` varchar(255) DEFAULT '0',
  `city` varchar(50) DEFAULT NULL,
  `regip` varchar(50) DEFAULT NULL,
  `lastip` varchar(50) DEFAULT NULL,
  `regtime` datetime DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  `aqproblem` varchar(255) DEFAULT NULL,
  `aqanswer` varchar(255) DEFAULT NULL,
  `yq` int(3) DEFAULT '0',
  `adddate` date DEFAULT NULL,
  `ah` text,
  `zz` varchar(255) NOT NULL,
  `lxdh` varchar(255) NOT NULL,
   `tc` varchar(255) NOT NULL,
   `xz` varchar(255) NOT NULL,
   `sr` varchar(255) NOT NULL,
   `xm` varchar(255) NOT NULL,
   `ch` varchar(255) NOT NULL,
   `xb` varchar(255) NOT NULL,
   `xh` varchar(255) NOT NULL,
   `zw` varchar(255) NOT NULL,
   `ktc` varchar(255) NOT NULL,
   `gxqm` varchar(255) NOT NULL,
   `tj` varchar(255) NOT NULL,
   `xtj` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bqyj_webconfigs`;
CREATE TABLE `bqyj_webconfigs` (
  `vkey` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY (`vkey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bqyj_users` VALUES ('1', 'admin','26ff3a5be026305db95aac0adc3ca352', '0b484609853c70cd87c8d1e3b2f5f34a', '9','1','0','1', '2302701417@qq.com', '2302701417','2302701417', '', '127.0.0.1', '127.0.0.1', '2016-07-31 10:33:39', '2016-07-31 10:33:44','','','0','2016-07-31', '动漫', '河南省开封市', '2302701417', 'IT', '水瓶座', '1月2日', '顾念' , '顾念', '男', '11', '无', '下次一定比你强', '梦想是要有的，万一实现了呢？' , '全网最帅', '1');
INSERT INTO `bqyj_webconfigs` VALUES ('index_163music', 'http://music.163.com/outchain/player?type=2&id=28661549&auto=1&height=66');
INSERT INTO `bqyj_webconfigs` VALUES ('do', 'set');
INSERT INTO `bqyj_webconfigs` VALUES ('webindex', 'Other/index/index_bqyj.php');
INSERT INTO `bqyj_webconfigs` VALUES ('submit', '确认修改');
INSERT INTO `bqyj_webconfigs` VALUES ('webfoot', '');
INSERT INTO `bqyj_webconfigs` VALUES ('version', '1027');
INSERT INTO `bqyj_webconfigs` VALUES ('webkey', '');
INSERT INTO `bqyj_webconfigs` VALUES ('webgroup', '');
INSERT INTO `bqyj_webconfigs` VALUES ('number', '0');
INSERT INTO `bqyj_webconfigs` VALUES ('music', '0');
INSERT INTO `bqyj_webconfigs` VALUES ('txprotect', '1');
INSERT INTO `bqyj_webconfigs` VALUES ('XlchKey', '2302701417');
INSERT INTO `bqyj_webconfigs` VALUES ('webname', '冰清玉洁同学录');
INSERT INTO `bqyj_webconfigs` VALUES ('webdomain', '');
INSERT INTO `bqyj_webconfigs` VALUES ('webqq', '2302701417');
INSERT INTO `bqyj_webconfigs` VALUES ('web_ifreg', '1');
INSERT INTO `bqyj_webconfigs` VALUES ('web_iflogin', '1');
INSERT INTO `bqyj_webconfigs` VALUES ('index_pic_1', 'http://img01.sogoucdn.com/app/a/100540002/1042209.jpg?f=download');
INSERT INTO `bqyj_webconfigs` VALUES ('index_pic_2', 'http://img.bizhi.sogou.com/images/2013/12/10/445290.jpg?f=download');
INSERT INTO `bqyj_webconfigs` VALUES ('index_pic_3', 'http://img.bizhi.sogou.com/images/2014/01/21/497238.jpg?f=download');
INSERT INTO `bqyj_webconfigs` VALUES ('index_pic_4', 'http://img.bizhi.sogou.com/images/2014/03/11/540548.jpg?f=download');
INSERT INTO `bqyj_webconfigs` VALUES ('index_pic_5', 'http://img.bizhi.sogou.com/images/2013/12/12/449860.jpg?f=download');
INSERT INTO `bqyj_webconfigs` VALUES ('index_logo', '/Style/vendor/img/logo.png');
INSERT INTO `bqyj_webconfigs` VALUES ('ywzy', '无');
INSERT INTO `bqyj_webconfigs` VALUES ('sxzy', '无');
INSERT INTO `bqyj_webconfigs` VALUES ('wlzy', '无');
INSERT INTO `bqyj_webconfigs` VALUES ('lszy', '无');
INSERT INTO `bqyj_webconfigs` VALUES ('yyzy', '无');
INSERT INTO `bqyj_webconfigs` VALUES ('zzzy', '无');
INSERT INTO `bqyj_webconfigs` VALUES ('qtzy', '无');
INSERT INTO `bqyj_webconfigs` VALUES ('hxzy', '无');
INSERT INTO `bqyj_webconfigs` VALUES ('classkey', '1');