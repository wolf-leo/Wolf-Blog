CREATE TABLE `article` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `desc` varchar(250) NOT NULL DEFAULT '',
  `type` tinyint(3) unsigned NOT NULL,
  `img` varchar(150) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `c_time`  timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`),
  KEY `index_title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
