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

#-----------------------------------------------------------------------------
#-- pattern
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pattern`;


CREATE TABLE `pattern`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`specie_id` INTEGER,
	`image_tail` VARCHAR(255),
	`lines_tail` INTEGER default 1 NOT NULL,
	`columns_tail` INTEGER default 1 NOT NULL,
	`image_dorsal_left` VARCHAR(255),
	`lines_dorsal_left` INTEGER default 1 NOT NULL,
	`columns_dorsal_left` INTEGER default 1 NOT NULL,
	`image_dorsal_right` VARCHAR(255),
	`lines_dorsal_right` INTEGER default 1 NOT NULL,
	`columns_dorsal_right` INTEGER default 1 NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `pattern_I_1`(`specie_id`),
	CONSTRAINT `pattern_FK_1`
		FOREIGN KEY (`specie_id`)
		REFERENCES `specie` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;