DROP TABLE IF EXISTS `bwcx_config`;
CREATE TABLE `bwcx_config` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `sitename` varchar(50) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `panel` text NOT NULL,
  `copy` text NOT NULL,
  `liuyan` text NOT NULL,
  `kfqq` varchar(20) NOT NULL,
  `api` varchar(50) NOT NULL,
  `payid` varchar(50) NOT NULL,
  `ms` varchar(50) NOT NULL,
  `gg` varchar(250) NOT NULL,
  `music` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bwcx_config`(`id`, `user`, `pwd`, `sitename`, `keywords`, `description`,`panel`,`copy`,`liuyan`,`kfqq`, `api`,`payid`,`ms`,`gg`,`music`) VALUES
('1', 'admin', '123456', '全自动在线要饭系统', '24H全自动在线要饭系统,全网首发', '24H全自动在线要饭系统,全网首发','一只要饭的小云云...', 'XingKong', '呐～施舍你的！', '12345678', 'http://codepay.fcbwl.com/', '1000', '33267e5dc58fad346e92471c43fcccdc', '大哥哥大姐们啊！你们都是有钱的人呐～谁有那多余的零钱？给我这流浪的人啊...', 'music/yaofan.mp3');