CREATE TABLE `invoicesys`.`invoice` ( 
    `i_id` INT(8) NOT NULL AUTO_INCREMENT , 
    `i_code` VARCHAR(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `i_num` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `i_date` DATE NOT NULL , 
    `i_year` INT(4) NOT NULL , 
    `i_period` INT(1) NOT NULL , 
    `i_amount` INT(7) NOT NULL , 
    `i_type` INT(2) NOT NULL , 
    `i_store` INT(2) NOT NULL , 
    `i_other` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `i_acc` VARCHAR(10) NOT NULL , 
    PRIMARY KEY (`i_id`)) ENGINE = InnoDB;
