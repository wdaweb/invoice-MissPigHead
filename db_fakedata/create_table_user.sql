CREATE TABLE `invoicesys`.`user` ( 
    `id` INT(2) NOT NULL AUTO_INCREMENT , 
    `acc` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `pw` VARCHAR(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `birth` DATE NOT NULL , 
    `tel` VARCHAR(10) NOT NULL , 
    `email` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;
