DROP TABLE IF EXISTS `reservations_db`.`USERS`;

CREATE TABLE `reservations_db`.`USERS` (
  `USER_ID` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `USER_NAME` VARCHAR(45) NOT NULL,
  `USER_LAST_NAME` VARCHAR(45) NOT NULL,
  `USER_ROLE_ID` INT(1) UNSIGNED ZEROFILL NOT NULL,
  `USER_PASSWORD` CHAR(32) NOT NULL,
  `USER_EMAIL` VARCHAR(255) NOT NULL,
  `USER_ADDRESS` VARCHAR(255) NOT NULL,
  `USERScol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`USER_ID`),
  INDEX `fk_USER_ROLE_idx` (`USER_ROLE_ID` ASC),
  CONSTRAINT `fk_USER_ROLE`
    FOREIGN KEY (`USER_ROLE_ID`)
    REFERENCES `reservations_db`.`ROLES` (`ROLE_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);