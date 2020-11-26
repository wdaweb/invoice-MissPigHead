CREATE TABLE `invoicesys`.`user` ( 
    `u_id` INT(2) NOT NULL AUTO_INCREMENT , 
    `u_acc` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `u_pw` VARCHAR(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `u_birth` DATE NOT NULL , 
    `u_tel` VARCHAR(10) NOT NULL , 
    `u_email` VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    PRIMARY KEY (`u_id`)) ENGINE = InnoDB;
