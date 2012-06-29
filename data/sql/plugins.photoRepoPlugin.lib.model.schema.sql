
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- pr_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pr_user`;


CREATE TABLE `pr_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`role` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `pr_user_I_1`(`user_id`),
	CONSTRAINT `pr_user_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- uploaded_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `uploaded_photo`;


CREATE TABLE `uploaded_photo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`uploader_name` VARCHAR(255)  NOT NULL,
	`uploader_email` VARCHAR(255)  NOT NULL,
	`photo_date` DATE,
	`photo` VARCHAR(255)  NOT NULL,
	`comment` TEXT,
	`processed` TINYINT default 0,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

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

#-----------------------------------------------------------------------------
#-- mark
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mark`;


CREATE TABLE `mark`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`image` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- photographer
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `photographer`;


CREATE TABLE `photographer`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(255)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
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
	`sighting_id` INTEGER,
	`is_best` TINYINT default 0,
	`notes` TEXT,
	`uploaded_at` DATETIME,
	`status` VARCHAR(255),
	`last_edited_by` INTEGER,
	`validated_by` INTEGER,
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
	KEY `observation_photo_I_8`(`sighting_id`),
	KEY `observation_photo_I_9`(`last_edited_by`),
	KEY `observation_photo_I_10`(`validated_by`),
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
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_8`
		FOREIGN KEY (`sighting_id`)
		REFERENCES `sighting` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_9`
		FOREIGN KEY (`last_edited_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_FK_10`
		FOREIGN KEY (`validated_by`)
		REFERENCES `sf_guard_user` (`id`)
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

#-----------------------------------------------------------------------------
#-- observation_photo_mark_tail
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_mark_tail`;


CREATE TABLE `observation_photo_mark_tail`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`photo_id` INTEGER  NOT NULL,
	`mark_id` INTEGER  NOT NULL,
	`line` INTEGER  NOT NULL,
	`column` INTEGER  NOT NULL,
	`observation` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `observation_photo_mark_tail_I_1`(`photo_id`),
	KEY `observation_photo_mark_tail_I_2`(`mark_id`),
	CONSTRAINT `observation_photo_mark_tail_FK_1`
		FOREIGN KEY (`photo_id`)
		REFERENCES `observation_photo` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_mark_tail_FK_2`
		FOREIGN KEY (`mark_id`)
		REFERENCES `mark` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- observation_photo_mark_dorsal_left
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_mark_dorsal_left`;


CREATE TABLE `observation_photo_mark_dorsal_left`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`photo_id` INTEGER  NOT NULL,
	`mark_id` INTEGER  NOT NULL,
	`line` INTEGER  NOT NULL,
	`column` INTEGER  NOT NULL,
	`observation` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `observation_photo_mark_dorsal_left_I_1`(`photo_id`),
	KEY `observation_photo_mark_dorsal_left_I_2`(`mark_id`),
	CONSTRAINT `observation_photo_mark_dorsal_left_FK_1`
		FOREIGN KEY (`photo_id`)
		REFERENCES `observation_photo` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_mark_dorsal_left_FK_2`
		FOREIGN KEY (`mark_id`)
		REFERENCES `mark` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- observation_photo_mark_dorsal_right
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_mark_dorsal_right`;


CREATE TABLE `observation_photo_mark_dorsal_right`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`photo_id` INTEGER  NOT NULL,
	`mark_id` INTEGER  NOT NULL,
	`line` INTEGER  NOT NULL,
	`column` INTEGER  NOT NULL,
	`observation` VARCHAR(255),
	PRIMARY KEY (`id`),
	KEY `observation_photo_mark_dorsal_right_I_1`(`photo_id`),
	KEY `observation_photo_mark_dorsal_right_I_2`(`mark_id`),
	CONSTRAINT `observation_photo_mark_dorsal_right_FK_1`
		FOREIGN KEY (`photo_id`)
		REFERENCES `observation_photo` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_mark_dorsal_right_FK_2`
		FOREIGN KEY (`mark_id`)
		REFERENCES `mark` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
