CREATE TABLE `invoicesys`.`reward` ( 
    `r_id` INT(4) NOT NULL AUTO_INCREMENT , 
    `r_acc` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , 
    `r_num` VARCHAR(8) NOT NULL , 
    `r_year` INT(4) NOT NULL , 
    `r_period` INT(1) NOT NULL , 
    PRIMARY KEY (`r_id`)) ENGINE = InnoDB;