CREATE TABLE `invoicesys`.`award` ( 
    `id` INT(4) NOT NULL AUTO_INCREMENT , 
    `year` INT(4) NOT NULL , 
    `period` INT(1) NOT NULL , 
    `num` VARCHAR(8) NOT NULL , 
    `type` VARCHAR(2) NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;