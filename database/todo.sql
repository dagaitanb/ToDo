CREATE DATABASE todo;

use todo;

CREATE TABLE todo (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  description text NOT NULL,
  creation_date timestamp NOT NULL DEFAULT current_timestamp(),
  modification_date timestamp NOT NULL DEFAULT current_timestamp(),
  status tinyint(1) NOT NULL DEFAULT 1
);
