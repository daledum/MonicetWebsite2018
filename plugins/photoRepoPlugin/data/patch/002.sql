
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- photographer
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `photographer`;


CREATE TABLE `photographer`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(255) NOT NULL,
	`name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255),
	`copyright` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- body_part
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `body_part`;


CREATE TABLE `body_part`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- body_part_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `body_part_i18n`;


CREATE TABLE `body_part_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	KEY `body_part_i18n_I_1`(`id`),
	KEY `body_part_i18n_I_2`(`culture`),
	CONSTRAINT `body_part_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `body_part` (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- observation_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo`;


CREATE TABLE `observation_photo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(255)  NOT NULL,
	`file_name` VARCHAR(255)  NOT NULL,
	`photo_date` DATE,
	`photo_time` TIME,
	`individual_id` INTEGER,
	`specie_id` INTEGER,
	`island` VARCHAR(255),
	`body_part_id` INTEGER,
	`gender` VARCHAR(255),
	`age_group` VARCHAR(255),
	`behaviour_id` INTEGER,
	`latitude` VARCHAR(255),
	`longitude` VARCHAR(255),
	`company_id` INTEGER,
	`vessel_id` INTEGER,
	`photographer_id` INTEGER,
	`kind_of_photo` VARCHAR(255),
	`photo_quality` VARCHAR(255),
	`is_best` TINYINT default 0,
	`notes` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `observation_photo_I_1`(`individual_id`),
	KEY `observation_photo_I_2`(`specie_id`),
	KEY `observation_photo_I_3`(`body_part_id`),
	KEY `observation_photo_I_4`(`behaviour_id`),
	KEY `observation_photo_I_5`(`company_id`),
	KEY `observation_photo_I_6`(`vessel_id`),
	KEY `observation_photo_I_7`(`photographer_id`),
	CONSTRAINT `observation_photo_FK_1`
		FOREIGN KEY (`individual_id`)
		REFERENCES `individual` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_2`
		FOREIGN KEY (`specie_id`)
		REFERENCES `specie` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_3`
		FOREIGN KEY (`body_part_id`)
		REFERENCES `body_part` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_4`
		FOREIGN KEY (`behaviour_id`)
		REFERENCES `behaviour` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_5`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_6`
		FOREIGN KEY (`vessel_id`)
		REFERENCES `vessel` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_7`
		FOREIGN KEY (`photographer_id`)
		REFERENCES `photographer` (`id`)
		ON DELETE SET NULL
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- observation_photo_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_i18n`;


CREATE TABLE `observation_photo_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`legend` VARCHAR(255),
	`comments` TEXT,
	PRIMARY KEY (`id`,`culture`),
	KEY `observation_photo_i18n_I_1`(`id`),
	KEY `observation_photo_i18n_I_2`(`culture`),
	CONSTRAINT `observation_photo_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `observation_photo` (`id`)
) ENGINE=MyISAM;


#--ALTER TABLE vessel ADD rec_cet_code VARCHAR(45) after company_id;


# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
