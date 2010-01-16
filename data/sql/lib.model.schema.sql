
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- company
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `company`;


CREATE TABLE `company`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`base_latitude` VARCHAR(45)  NOT NULL,
	`base_longitude` VARCHAR(45)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- guide
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `guide`;


CREATE TABLE `guide`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `guide_FI_1` (`company_id`),
	CONSTRAINT `guide_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- skipper
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `skipper`;


CREATE TABLE `skipper`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `skipper_FI_1` (`company_id`),
	CONSTRAINT `skipper_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- vessel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vessel`;


CREATE TABLE `vessel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `vessel_FI_1` (`company_id`),
	CONSTRAINT `vessel_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- general_info
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `general_info`;


CREATE TABLE `general_info`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`vessel_id` INTEGER  NOT NULL,
	`skipper_id` INTEGER  NOT NULL,
	`guide_id` INTEGER  NOT NULL,
	`base_latitude` VARCHAR(45)  NOT NULL,
	`base_longitude` VARCHAR(45)  NOT NULL,
	`date` DATE  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `general_info_FI_1` (`vessel_id`),
	CONSTRAINT `general_info_FK_1`
		FOREIGN KEY (`vessel_id`)
		REFERENCES `vessel` (`id`),
	INDEX `general_info_FI_2` (`skipper_id`),
	CONSTRAINT `general_info_FK_2`
		FOREIGN KEY (`skipper_id`)
		REFERENCES `skipper` (`id`),
	INDEX `general_info_FI_3` (`guide_id`),
	CONSTRAINT `general_info_FK_3`
		FOREIGN KEY (`guide_id`)
		REFERENCES `guide` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- visibility
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `visibility`;


CREATE TABLE `visibility`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sea_state
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sea_state`;


CREATE TABLE `sea_state`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- code
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `code`;


CREATE TABLE `code`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`acronym` VARCHAR(10)  NOT NULL,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- record
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `record`;


CREATE TABLE `record`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code_id` INTEGER  NOT NULL,
	`visibility_id` INTEGER  NOT NULL,
	`sea_state_id` INTEGER  NOT NULL,
	`general_info_id` INTEGER  NOT NULL,
	`time` TIME  NOT NULL,
	`latitude` VARCHAR(255)  NOT NULL,
	`longitude` VARCHAR(255)  NOT NULL,
	`comments` TEXT,
	PRIMARY KEY (`id`),
	INDEX `record_FI_1` (`code_id`),
	CONSTRAINT `record_FK_1`
		FOREIGN KEY (`code_id`)
		REFERENCES `code` (`id`),
	INDEX `record_FI_2` (`visibility_id`),
	CONSTRAINT `record_FK_2`
		FOREIGN KEY (`visibility_id`)
		REFERENCES `visibility` (`id`),
	INDEX `record_FI_3` (`sea_state_id`),
	CONSTRAINT `record_FK_3`
		FOREIGN KEY (`sea_state_id`)
		REFERENCES `sea_state` (`id`),
	INDEX `record_FI_4` (`general_info_id`),
	CONSTRAINT `record_FK_4`
		FOREIGN KEY (`general_info_id`)
		REFERENCES `general_info` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- association
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `association`;


CREATE TABLE `association`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- behaviour
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `behaviour`;


CREATE TABLE `behaviour`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- specie_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `specie_group`;


CREATE TABLE `specie_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- specie
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `specie`;


CREATE TABLE `specie`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`specie_group_id` INTEGER  NOT NULL,
	`code` VARCHAR(10)  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `specie_FI_1` (`specie_group_id`),
	CONSTRAINT `specie_FK_1`
		FOREIGN KEY (`specie_group_id`)
		REFERENCES `specie_group` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sighting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sighting`;


CREATE TABLE `sighting`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`record_id` INTEGER  NOT NULL,
	`specie_id` INTEGER  NOT NULL,
	`behaviour_id` INTEGER  NOT NULL,
	`association_id` INTEGER  NOT NULL,
	`adults` INTEGER  NOT NULL,
	`juveniles` INTEGER  NOT NULL,
	`cubs` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `sighting_FI_1` (`record_id`),
	CONSTRAINT `sighting_FK_1`
		FOREIGN KEY (`record_id`)
		REFERENCES `record` (`id`),
	INDEX `sighting_FI_2` (`specie_id`),
	CONSTRAINT `sighting_FK_2`
		FOREIGN KEY (`specie_id`)
		REFERENCES `specie` (`id`),
	INDEX `sighting_FI_3` (`behaviour_id`),
	CONSTRAINT `sighting_FK_3`
		FOREIGN KEY (`behaviour_id`)
		REFERENCES `behaviour` (`id`),
	INDEX `sighting_FI_4` (`association_id`),
	CONSTRAINT `sighting_FK_4`
		FOREIGN KEY (`association_id`)
		REFERENCES `association` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- news_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `news_article`;


CREATE TABLE `news_article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`is_published` TINYINT default 0 NOT NULL,
	`slug` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `news_article_U_1` (`slug`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- news_article_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `news_article_i18n`;


CREATE TABLE `news_article_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`headline` VARCHAR(255)  NOT NULL,
	`body` TEXT  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `news_article_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `news_article` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- consorcium_element
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `consorcium_element`;


CREATE TABLE `consorcium_element`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`logotype` VARCHAR(255),
	`link` VARCHAR(500),
	`slug` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `consorcium_element_U_1` (`slug`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- consorcium_element_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `consorcium_element_i18n`;


CREATE TABLE `consorcium_element_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `consorcium_element_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `consorcium_element` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
