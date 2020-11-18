CREATE TABLE `invoicesys`.`awards` ( 
`id` INT(4) NOT NULL AUTO_INCREMENT , 
`payment_year` INT(2) NOT NULL , 
`payment_period` INT(1) NOT NULL , 
`inv_number` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
`type` INT(1) NOT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB;
