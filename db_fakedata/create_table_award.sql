CREATE TABLE `invoicesys`.`award` ( 
    `a_id` INT(4) NOT NULL AUTO_INCREMENT , 
    `a_year` INT(4) NOT NULL , 
    `a_period` INT(1) NOT NULL , 
    `a_num` VARCHAR(8) NOT NULL , 
    `a_type` VARCHAR(2) NOT NULL , 
    PRIMARY KEY (`a_id`)) ENGINE = InnoDB;