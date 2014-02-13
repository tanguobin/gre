set names utf8;

DROP TABLE IF EXISTS `issue`;
CREATE TABLE `issue` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `argument`;
CREATE TABLE `argument` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `verbal_single_choice`;
CREATE TABLE `verbal_single_choice` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `choices` varchar(255) NOT NULL,
  `answer` varchar(10) NOT NULL,
  `explain` text NOT NULL,
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `verbal_reading_logic`;
CREATE TABLE `verbal_reading_logic` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `question` varchar(255) NOT NULL,
  `choices` text,
  `answer` varchar(10) NOT NULL,
  `explain` text NOT NULL,
  `qtype` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `verbal_reading_twice`;
CREATE TABLE `verbal_reading_twice` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `question1` varchar(255) NOT NULL,
  `choices1` text,
  `q1type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer1` varchar(10) NOT NULL,
  `explain1` text NOT NULL,
  `question2` varchar(255) NOT NULL,
  `choices2` text,
  `q2type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer2` varchar(10) NOT NULL,
  `explain2` text NOT NULL,
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `verbal_reading_third`;
CREATE TABLE `verbal_reading_third` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `question1` varchar(255) NOT NULL,
  `choices1` text,
  `q1type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer1` varchar(10) NOT NULL,
  `explain1` text NOT NULL,
  `question2` varchar(255) NOT NULL,
  `choices2` text,
  `q2type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer2` varchar(10) NOT NULL,
  `explain2` text NOT NULL,
  `question3` varchar(255) NOT NULL,
  `choices3` text,
  `q3type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer3` varchar(10) NOT NULL,
  `explain3` text NOT NULL,
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `verbal_reading_forth`;
CREATE TABLE `verbal_reading_forth` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `question1` varchar(255) NOT NULL,
  `choices1` text,
  `q1type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer1` varchar(10) NOT NULL,
  `explain1` text NOT NULL,
  `question2` varchar(255) NOT NULL,
  `choices2` text,
  `q2type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer2` varchar(10) NOT NULL,
  `explain2` text NOT NULL,
  `question3` varchar(255) NOT NULL,
  `choices3` text,
  `q3type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer3` varchar(10) NOT NULL,
  `explain3` text NOT NULL,
  `question4` varchar(255) NOT NULL,
  `choices4` text,
  `q4type` enum('single', 'multiple', 'select') NOT NULL DEFAULT 'single',
  `answer4` varchar(10) NOT NULL,
  `explain4` text NOT NULL,
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `verbal_multiple_choice`;
CREATE TABLE `verbal_multiple_choice` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `choices` varchar(255) NOT NULL,
  `answer` varchar(10) NOT NULL DEFAULT '',
  `explain` text NOT NULL,
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `quantity_compare`;
CREATE TABLE `quantity_compare` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(512) NOT NULL DEFAULT '',
  `A` text NOT NULL,
  `B` text NOT NULL,
  `answer` char(1) NOT NULL DEFAULT '',
  `explain` text NOT NULL,
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `quantity_select`;
CREATE TABLE `quantity_select` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `choices` text,
  `qtype` enum('single', 'multiple') NOT NULL DEFAULT 'single',
  `answer` varchar (16) NOT NULL DEFAULT '',
  `explain` text NOT NULL,
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `quantity_input`;
CREATE TABLE `quantity_input` (
  `qid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `input` varchar(255) NOT NULL,
  `answer` varchar (16) NOT NULL DEFAULT '',
  `explain` text NOT NULL,
  `type` enum('easy', 'medium', 'hard') NOT NULL DEFAULT 'easy',
  PRIMARY KEY (`qid`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `user_sns`;
CREATE TABLE `user_sns` (
  `uid` char(32) NOT NULL,
  `email` char(40) NOT NULL,
  `username` char(15) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY username (`username`),
  KEY email (`email`)
)ENGINE=MyISAM character set utf8;

INSERT INTO `user_sns` ( `uid`, `email`, `username`, `password` ) VALUES ( '1d9e2c9a7a854a57fe87866888b90cc1', 'tanguobin881026@126.com', 'admin', 'f64bde4f8ab34911f1645f2a9abd9541' );

DROP TABLE IF EXISTS `uc_writing`;
CREATE TABLE `uc_writing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL,
  `dateline` timestamp NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `article` text NOT NULL,
  `type` enum('issue', 'argument') NOT NULL DEFAULT 'issue',
  PRIMARY KEY (`id`)
)ENGINE=MyISAM character set utf8;

DROP TABLE IF EXISTS `uc_reasoning`;
CREATE TABLE `uc_reasoning` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL,
  `dateline` timestamp NOT NULL,
  `startqid` int(10) NOT NULL,
  `qids` varchar(255) NOT NULL,
  `answers` varchar(128) NOT NULL,
  `type` enum('verbal', 'quantity') NOT NULL DEFAULT 'verbal',
  PRIMARY KEY (`id`)
)ENGINE=MyISAM character set utf8;