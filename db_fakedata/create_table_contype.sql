CREATE TABLE `invoicesys`.`contype` ( 
    `id` INT(2) NOT NULL AUTO_INCREMENT , 
    `type` VARCHAR(2) NOT NULL , 
    `desCH` VARCHAR(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;