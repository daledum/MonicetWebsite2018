
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- publication
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `publication`;


CREATE TABLE `publication`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`is_active` TINYINT default 0,
	`order` INTEGER,
	`file_address` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- publication_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `publication_i18n`;


CREATE TABLE `publication_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`title` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`,`culture`),
	KEY `publication_i18n_I_1`(`id`),
	KEY `publication_i18n_I_2`(`culture`),
	CONSTRAINT `publication_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `publication` (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
