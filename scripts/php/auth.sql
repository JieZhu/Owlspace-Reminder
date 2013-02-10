CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `netid` varchar(10) CHARACTER SET latin1 NOT NULL,
  `password` varchar(64) CHARACTER SET latin1 NOT NULL,
  `salt` varchar(5) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`netid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `netid` varchar(10) CHARACTER SET latin1 NOT NULL,
  `class` varchar(20) CHARACTER SET latin1 NOT NULL,
  `assignment` varchar(20) CHARACTER SET latin1 NOT NULL,
  `deadline` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`netid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;