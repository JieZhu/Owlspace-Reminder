CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  netid varchar(10) CHARACTER SET utf8 NOT NULL,
  password varchar(64) CHARACTER SET utf8 NOT NULL,
  salt varchar(5) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (netid)
) DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS assignments (
  id int(11) NOT NULL AUTO_INCREMENT,
  selected varchar(1) CHARACTER SET utf8 NOT NULL,
  netid varchar(10) CHARACTER SET utf8 NOT NULL,
  class varchar(20) CHARACTER SET utf8 NOT NULL,
  assignment varchar(20) CHARACTER SET utf8 NOT NULL,
  deadline varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;