CREATE TABLE `invoicesys`.`reward` ( 
    `id` INT(4) NOT NULL AUTO_INCREMENT , 
    `inv_id` INT(8) NOT NULL , 
    `award_id` INT(4) NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;