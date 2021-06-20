create database test;

use test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date_registered` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  PRIMARY KEY  (`id`)
);