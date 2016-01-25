SETUP

1 - Download and set up Yii framework per the instructions on http://www.yiiframework.com/doc/guide/1.1/en/quickstart.installation
2 - Create a mysql database and note the name
3 - Run the following SQL commands on the created database :

CREATE TABLE `commits` (
  `hash` char(40) NOT NULL,
  `url` varchar(255) NOT NULL,
  `message` blob NOT NULL,
  `author_id` int(11) NOT NULL,
  `committer_id` int(11) NOT NULL,
  `modified` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`hash`),
  KEY `author` (`author_id`),
  KEY `committer` (`committer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1

CREATE TABLE `authors` (
  `id` int(10) unsigned NOT NULL,
  `login` varchar(255) NOT NULL,
  `avatar_url` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1

