CREATE TABLE `invoicesys`.`prize` ( 
    `id` INT(2) NOT NULL AUTO_INCREMENT , 
    `type` VARCHAR(2) NOT NULL , 
    `name` VARCHAR(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `amount` INT(8) NOT NULL , 
    `amountCH` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;