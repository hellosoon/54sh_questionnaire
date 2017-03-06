SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS `mytest_20170301`;
CREATE TABLE `mytest_20170301` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增健',
  `id_key` varchar(32) NOT NULL COMMENT '加密id，对外访问可以用',
  `type` varchar(255) NOT NULL,
  `suggestion_type` varchar(32) DEFAULT NULL COMMENT '类型',
  `title` varchar(32) DEFAULT NULL COMMENT '标题',
  `phone` varchar(32) DEFAULT NULL COMMENT '联系方式',
  `content` text NOT NULL COMMENT '内容',
  `time` varchar(64) NOT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
