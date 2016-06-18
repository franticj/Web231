CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `password` varchar(40) NOT NULL default '',
  `email` varchar(140) NOT NULL default '',
  `regdate` varchar(30) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `lastdate` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
);

CREATE TABLE `forgot` (
  `username` varchar(30) NOT NULL default '',
  `password` varchar(40) NOT NULL default '',
  `email` varchar(140) NOT NULL default '',
  `regdate` varchar(30) NOT NULL default '',
  `ip` varchar(15) NOT NULL default ''
);