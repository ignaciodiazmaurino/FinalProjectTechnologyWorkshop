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
