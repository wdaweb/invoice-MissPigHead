CREATE TABLE `invoicesys`.`prize` ( 
    `p_id` INT(2) NOT NULL AUTO_INCREMENT , 
    `p_type` VARCHAR(2) NOT NULL , 
    `p_amount` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    PRIMARY KEY (`p_id`)) ENGINE = InnoDB;