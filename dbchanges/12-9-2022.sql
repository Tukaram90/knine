-- subscriber table created
CREATE TABLE `dogclub`.`subscriber` ( `id` INT NOT NULL AUTO_INCREMENT , `subscriber_email` INT NOT NULL , `subcriber_date` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `subscriber` CHANGE `subscriber_email` `subscriber_email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;