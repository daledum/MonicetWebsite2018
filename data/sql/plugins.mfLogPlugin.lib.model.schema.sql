
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- mf_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mf_log`;


CREATE TABLE `mf_log`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tipo` VARCHAR(255),
	`mensagem` TEXT  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
