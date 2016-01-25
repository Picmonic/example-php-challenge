SETUP

1 - Install /yii and /source into a web accessible directory.
2 - Create a mysql database and note the name.  Ensure you have a user with access to the new database.
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

4 - Edit source/api/protected/config/database.php with the database host, name, user and credentials

5 - Edit source/js/services/CommitsService.js to ensure you are using the correct webroot to your server

