CREATE TABLE `invoicesys`.`invoice` ( 
    `id` INT(8) NOT NULL AUTO_INCREMENT , 
    `code` VARCHAR(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `num` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `date` DATE NOT NULL , 
    `year` INT(4) NOT NULL , 
    `period` INT(1) NOT NULL , 
    `amount` INT(7) NOT NULL , 
    `type` INT(2) NOT NULL , 
    `store` INT(2) NOT NULL , 
    `other` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `acc` VARCHAR(10) NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;
