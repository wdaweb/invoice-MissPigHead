CREATE TABLE `invoicesys`.`store` ( 
    `id` INT(2) NOT NULL AUTO_INCREMENT , 
    `type` VARCHAR(2) NOT NULL , 
    `name` VARCHAR(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `location` VARCHAR(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;