CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `psalt` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MariaDB DEFAULT CHARSET=uft8 AUTO_INCREMENT=1 ;