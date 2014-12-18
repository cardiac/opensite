CREATE TABLE `content_users` (
  `id` int(10) NOT NULL auto_increment,
  `username` varchar(25) default NULL,
  `password` varchar(32) default NULL,
  `email` varchar(50) default NULL,
  `im` varchar(25) default NULL,
  `title` varchar(25) default NULL,
  `avatar` varchar(150) default NULL,
  `sex` char(1) default NULL,
  `site` varchar(25) default NULL,
  `siteurl` varchar(150) default NULL,
  `posts` int(10) NOT NULL default '0',
  `comments` int(10) NOT NULL default '0',
  `team` varchar(25) default NULL,
  `skin` varchar(25) default NULL,
  `rights` int(1) default '1',
  `active` int(1) default '1',
  PRIMARY KEY  (`id`)
);
CREATE TABLE `content_categories` (
  `id` int(10) NOT NULL auto_increment,
  `category` varchar(25) default NULL,
  `type` char(1) default NULL,
  PRIMARY KEY  (`id`)
);
CREATE TABLE `content_news` (
  `id` int(10) NOT NULL auto_increment,
  `category` varchar(25) default NULL,
  `title` varchar(40) default NULL,
  `date` int(14) default NULL,
  `author` varchar(20) default NULL,
  `content` text,
  PRIMARY KEY  (`id`)
);
CREATE TABLE `content_comments` (
  `id` int(10) NOT NULL auto_increment,
  `newsid` int(10) NOT NULL default '1',
  `title` varchar(25) default NULL,
  `date` int(14) default NULL,
  `author` varchar(20) default NULL,
  `member` int(1) default NULL,
  `content` text,
  PRIMARY KEY  (`id`)
);
CREATE TABLE `content_ads` (
  `id` int(10) NOT NULL auto_increment,
  `site` varchar(25) default NULL,
  `category` varchar(25) default NULL,
  `url` varchar(100) default NULL,
  `image` varchar(150) default NULL,
  `alt` varchar(50) default NULL,
  `hits` int(10) default NULL,
  PRIMARY KEY  (`id`)
);
CREATE TABLE `content_main` (
  `id` int(10) NOT NULL auto_increment,
  `page` varchar(25) default NULL,
  `cat` varchar(25) default NULL,
  `sub` varchar(25) default NULL,
  `title` varchar(25) default NULL,
  `content` mediumtext,
  `hits` int(10) default NULL,
  PRIMARY KEY  (`id`)
);