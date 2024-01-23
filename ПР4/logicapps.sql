-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `work_day` date DEFAULT NULL,
  `started` datetime DEFAULT NULL,
  `finished` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `log` (`id`, `user_id`, `work_day`, `started`, `finished`) VALUES
(1,	3,	'2024-01-07',	'2024-01-08 22:37:07',	'2024-01-08 22:37:16'),
(2,	3,	'2024-01-08',	'2024-01-08 22:46:37',	'2024-01-08 22:46:42');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text COLLATE utf8mb4_unicode_ci,
  `password` text COLLATE utf8mb4_unicode_ci,
  `role` text COLLATE utf8mb4_unicode_ci,
  `days` text COLLATE utf8mb4_unicode_ci,
  `minutes` int(11) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `started` date DEFAULT NULL,
  `finished` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `login`, `password`, `role`, `days`, `minutes`, `hours`, `started`, `finished`) VALUES
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'admin',	NULL,	NULL,	NULL,	NULL,	NULL),
(3,	'1',	'c4ca4238a0b923820dcc509a6f75849b',	'user',	'1,2,3,4,5',	20,	4,	'2024-01-08',	'2024-01-08');

-- 2024-01-08 19:47:36
