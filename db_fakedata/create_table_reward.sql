CREATE TABLE `invoicesys`.`reward` ( 
    `id` INT(4) NOT NULL AUTO_INCREMENT , 
    `acc` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `num` VARCHAR(8) NOT NULL , 
    `year` INT(4) NOT NULL , 
    `period` INT(1) NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;