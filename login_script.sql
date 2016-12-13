DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username text NOT NULL,
  password text NOT NULL,
  psalt text NOT NULL,
  PRIMARY KEY (`id`)
);