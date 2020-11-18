CREATE TABLE `invoicesys`.`invoices` ( 
`id` INT(8) NOT NULL AUTO_INCREMENT , 
`inv_code` VARCHAR(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
`inv_number` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
`payment_date` DATE NOT NULL , 
`payment_year` INT(4) NOT NULL , 
`payment_period` INT(1) NOT NULL , 
`payment_amount` INT(8) NOT NULL , 
`check_code` VARCHAR(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB;