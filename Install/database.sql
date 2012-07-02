-- ---------------
-- Create Database
-- ---------------

DROP DATABASE IF EXISTS `benchmark`;
CREATE DATABASE `benchmark`;
USE benchmark;
-- --------------
-- Create tables
-- --------------

CREATE  TABLE `image` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `filename` VARCHAR(45) NOT NULL ,
  `path` VARCHAR(120) NULL ,
  `content` BLOB NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB

