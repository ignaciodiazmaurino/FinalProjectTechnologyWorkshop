CREATE DATABASE reservations_db;

USES reservations_db;

CREATE USER 'cabinreservationuser'@'localhost' IDENTIFIED BY 'cabinreservationuser01';
GRANT ALL PRIVILEGES ON reservations_db . * TO 'cabinreservationuser'@'localhost';


/*
 * Create table ROLES
 */

DROP TABLE IF EXISTS `reservations_db`.`ROLES`;

CREATE TABLE `reservations_db`.`ROLES` (
  `ROLE_ID` INT(1) UNSIGNED ZEROFILL NOT NULL,
  `ROLE_NAME` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ROLE_ID`));


/*
 * Create table USERS
 */

DROP TABLE IF EXISTS `reservations_db`.`USERS`;

CREATE TABLE `reservations_db`.`USERS` (
  `USER_ID` INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `USER_NAME` VARCHAR(45) NOT NULL,
  `USER_LAST_NAME` VARCHAR(45) NOT NULL,
  `USER_ROLE_ID` INT(1) UNSIGNED ZEROFILL NOT NULL,
  `USER_PASSWORD` CHAR(32) NOT NULL,
  `USER_EMAIL` VARCHAR(255) NOT NULL,
  `USER_ADDRESS` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`USER_ID`),
  INDEX `fk_USER_ROLE_idx` (`USER_ROLE_ID` ASC),
  CONSTRAINT `fk_USER_ROLE`
    FOREIGN KEY (`USER_ROLE_ID`)
    REFERENCES `reservations_db`.`ROLES` (`ROLE_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


/*
 * Create table CABINS
 */

 DROP TABLE IF EXISTS `reservations_db`.`CABINS`;

CREATE TABLE `reservations_db`.`CABINS` (
  `CABIN_ID` INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `CABIN_NAME` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `CABIN_DESCRIPTION` TEXT CHARACTER SET 'utf8' NOT NULL,
  `CABIN_MAX_OCCUPANCY` INT(1) NOT NULL,
  PRIMARY KEY (`CABIN_ID`));


/*
 * Create table IMAGES
 */
 DROP TABLE IF EXISTS `reservations_db`.`IMAGES`;

CREATE TABLE `reservations_db`.`IMAGES` (
  `IMAGE_ID` INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `CABIN_ID` INT(4) UNSIGNED ZEROFILL NOT NULL,
  `IMAGE_PATH` VARCHAR(255) NOT NULL,
  `IMAGE_ALTERNATE_TEXT` VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`IMAGE_ID`),
  INDEX `fk_CABIN_ID_idx` (`CABIN_ID` ASC),
  CONSTRAINT `fk_CABIN_ID`
    FOREIGN KEY (`CABIN_ID`)
    REFERENCES `reservations_db`.`CABINS` (`CABIN_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


/*
 * Create table AMENITIES
 */

DROP TABLE IF EXISTS `reservations_db`.`AMENITIES`;

CREATE TABLE `reservations_db`.`AMENITIES` (
  `AMENITY_ID` INT(4) ZEROFILL UNSIGNED NOT NULL AUTO_INCREMENT,
  `AMENITY_CABIN_ID` INT(4) UNSIGNED ZEROFILL NOT NULL,
  `AMENITY_TEXT` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`AMENITY_ID`),
  INDEX `fk_AMENITIES_CABIN_ID_idx` (`AMENITY_CABIN_ID` ASC),
  CONSTRAINT `fk_AMENITIES_CABIN_ID`
    FOREIGN KEY (`AMENITY_CABIN_ID`)
    REFERENCES `reservations_db`.`CABINS` (`CABIN_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


/*
 * Create table RESERVATIONS
 */

DROP TABLE IF EXISTS `reservations_db`.`RESERVATIONS`;

CREATE TABLE `reservations_db`.`RESERVATIONS` (
  `RESERVATION_ID` INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `RESERVATION_GUEST_ID` INT(4) UNSIGNED ZEROFILL NOT NULL,
  `RESERVATION_GUEST_NAME` VARCHAR(255) NOT NULL,
  `RESERVATION_GUEST_LASTNAME` VARCHAR(255) NOT NULL,
  `RESERVATION_USER_ID` INT(4) UNSIGNED ZEROFILL NOT NULL,
  `RESERVATION_CABIN_ID` INT(4) UNSIGNED ZEROFILL NOT NULL,
  `RESERVATION_ARRIVAL_DATE` DATE NOT NULL,
  `RESERVATION_DEPARTURE_DATE` DATE NOT NULL,
  `RESERVATION_STATE` ENUM('ACCEPTED', 'CANCELED', 'ON_HOLD') NOT NULL,
  `RESERVATION_GUEST_EMAIL` VARCHAR(255) NOT NULL,
  `RESERVATION_GUEST_ADDRESS` VARCHAR(255) NOT NULL,
  `RESERVATION_QUANTITY` INT(1) NOT NULL,
  `RESERVATION_DETAILS` TEXT CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`RESERVATION_ID`),
  INDEX `fk_RESERVATION_USER_ID_idx` (`RESERVATION_USER_ID` ASC),
  INDEX `fk_RESERVATIONS_GUEST_ID_idx` (`RESERVATION_GUEST_ID` ASC),
  INDEX `fk_RESERVATION_CABIN_ID_idx` (`RESERVATION_CABIN_ID` ASC),
  CONSTRAINT `fk_RESERVATION_USER_ID`
    FOREIGN KEY (`RESERVATION_USER_ID`)
    REFERENCES `reservations_db`.`USERS` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_RESERVATION_GUEST_ID`
    FOREIGN KEY (`RESERVATION_GUEST_ID`)
    REFERENCES `reservations_db`.`USERS` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_RESERVATION_CABIN_ID`
    FOREIGN KEY (`RESERVATION_CABIN_ID`)
    REFERENCES `reservations_db`.`CABINS` (`CABIN_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


/*
 * Create table THUMBNAILS
 */
 DROP TABLE IF EXISTS `reservations_db`.`THUMBNAILS`;

CREATE TABLE `reservations_db`.`THUMBNAILS` (
  `THUMBNAIL_ID` INT(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `CABIN_ID` INT(4) UNSIGNED ZEROFILL NOT NULL,
  `THUMBNAIL_PATH` VARCHAR(255) NULL,
  `THUMBNAIL_ALTERNATE_TEXT` VARCHAR(20) NULL,
  PRIMARY KEY (`THUMBNAIL_ID`),
  INDEX `fk_THUMBNAILS_CABIN_ID_idx` (`CABIN_ID` ASC),
  CONSTRAINT `fk_THUMBNAILS_CABIN_ID`
    FOREIGN KEY (`CABIN_ID`)
    REFERENCES `reservations_db`.`CABINS` (`CABIN_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
