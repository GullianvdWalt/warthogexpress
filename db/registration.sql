CREATE DATABASE `usersDB`;
USE `users_database`;
CREATE TABLE
IF NOT EXISTS `registration`
(
  `saID` INT NOT NULL,
  `name` VARCHAR
(255) NOT NULL,
  `email` VARCHAR
(255) NOT NULL,
  `cell` VARCHAR
(15) NOT NULL,
  PRIMARY KEY
(`saID`),
  UNIQUE INDEX `saID_UNIQUE`
(`saID` ASC) VISIBLE
);
