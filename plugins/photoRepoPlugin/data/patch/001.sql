#-----------------------------------------------------------------------------
#-- individual
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `individual`;


CREATE TABLE `individual`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`specie_id` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `individual_I_1`(`specie_id`),
	CONSTRAINT `individual_FK_1`
		FOREIGN KEY (`specie_id`)
		REFERENCES `specie` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- individual_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `individual_i18n`;


CREATE TABLE `individual_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description1` TEXT,
	`description2` TEXT,
	`notes` TEXT,
	PRIMARY KEY (`id`,`culture`),
	KEY `individual_i18n_I_1`(`id`),
	KEY `individual_i18n_I_2`(`culture`),
	CONSTRAINT `individual_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `individual` (`id`)
) ENGINE=MyISAM;