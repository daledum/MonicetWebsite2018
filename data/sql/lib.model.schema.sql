
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `log`;


CREATE TABLE `log`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`type` VARCHAR(255),
	`message` TEXT(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- option
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `option`;


CREATE TABLE `option`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`value` VARCHAR(255)  NOT NULL,
	`initial` VARCHAR(255) default '',
	`description` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `option_U_1` (`name`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- company
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `company`;


CREATE TABLE `company`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`acronym` VARCHAR(45)  NOT NULL,
	`base_latitude` VARCHAR(45)  NOT NULL,
	`base_longitude` VARCHAR(45)  NOT NULL,
	`telephone` VARCHAR(30),
	`mobile` VARCHAR(30),
	`fax` VARCHAR(30),
	`email` VARCHAR(255),
	`address` TEXT(255),
	`zipcode` VARCHAR(8),
	`country` VARCHAR(225),
	`district` VARCHAR(255),
	`municipality` VARCHAR(255),
	`locality` VARCHAR(255),
	`observations` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- company_user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `company_user`;


CREATE TABLE `company_user`
(
	`company_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`company_id`,`user_id`),
	CONSTRAINT `company_user_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE,
	INDEX `company_user_FI_2` (`user_id`),
	CONSTRAINT `company_user_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- vessel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `vessel`;


CREATE TABLE `vessel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`length` INTEGER,
	`power` FLOAT,
	`height` FLOAT,
	`observations` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `vessel_FI_1` (`company_id`),
	CONSTRAINT `vessel_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- guide
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `guide`;


CREATE TABLE `guide`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`observations` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `guide_FI_1` (`company_id`),
	CONSTRAINT `guide_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- skipper
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `skipper`;


CREATE TABLE `skipper`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`observations` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `skipper_FI_1` (`company_id`),
	CONSTRAINT `skipper_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- general_info
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `general_info`;


CREATE TABLE `general_info`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(45)  NOT NULL,
	`vessel_id` INTEGER,
	`skipper_id` INTEGER,
	`guide_id` INTEGER,
	`company_id` INTEGER  NOT NULL,
	`base_latitude` VARCHAR(45)  NOT NULL,
	`base_longitude` VARCHAR(45)  NOT NULL,
	`date` DATE  NOT NULL,
	`valid` TINYINT  NOT NULL,
	`comments` TEXT,
	`created_by` INTEGER  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `general_info_FI_1` (`vessel_id`),
	CONSTRAINT `general_info_FK_1`
		FOREIGN KEY (`vessel_id`)
		REFERENCES `vessel` (`id`),
	INDEX `general_info_FI_2` (`skipper_id`),
	CONSTRAINT `general_info_FK_2`
		FOREIGN KEY (`skipper_id`)
		REFERENCES `skipper` (`id`)
		ON DELETE CASCADE,
	INDEX `general_info_FI_3` (`guide_id`),
	CONSTRAINT `general_info_FK_3`
		FOREIGN KEY (`guide_id`)
		REFERENCES `guide` (`id`)
		ON DELETE CASCADE,
	INDEX `general_info_FI_4` (`company_id`),
	CONSTRAINT `general_info_FK_4`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE,
	INDEX `general_info_FI_5` (`created_by`),
	CONSTRAINT `general_info_FK_5`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `general_info_FI_6` (`updated_by`),
	CONSTRAINT `general_info_FK_6`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- visibility
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `visibility`;


CREATE TABLE `visibility`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `visibility_U_1` (`code`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- visibility_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `visibility_i18n`;


CREATE TABLE `visibility_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `visibility_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `visibility` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- sea_state
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sea_state`;


CREATE TABLE `sea_state`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sea_state_U_1` (`code`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- sea_state_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sea_state_i18n`;


CREATE TABLE `sea_state_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `sea_state_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `sea_state` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- code
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `code`;


CREATE TABLE `code`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`acronym` VARCHAR(10)  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- code_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `code_i18n`;


CREATE TABLE `code_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `code_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `code` (`id`)
)Type=MyISAM;

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
	`latitude` VARCHAR(45)  NOT NULL,
	`longitude` VARCHAR(45)  NOT NULL,
	`num_vessels` INTEGER default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `record_FI_1` (`code_id`),
	CONSTRAINT `record_FK_1`
		FOREIGN KEY (`code_id`)
		REFERENCES `code` (`id`)
		ON DELETE CASCADE,
	INDEX `record_FI_2` (`visibility_id`),
	CONSTRAINT `record_FK_2`
		FOREIGN KEY (`visibility_id`)
		REFERENCES `visibility` (`id`)
		ON DELETE CASCADE,
	INDEX `record_FI_3` (`sea_state_id`),
	CONSTRAINT `record_FK_3`
		FOREIGN KEY (`sea_state_id`)
		REFERENCES `sea_state` (`id`)
		ON DELETE CASCADE,
	INDEX `record_FI_4` (`general_info_id`),
	CONSTRAINT `record_FK_4`
		FOREIGN KEY (`general_info_id`)
		REFERENCES `general_info` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- association
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `association`;


CREATE TABLE `association`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `association_U_1` (`code`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- association_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `association_i18n`;


CREATE TABLE `association_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `association_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `association` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- behaviour
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `behaviour`;


CREATE TABLE `behaviour`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `behaviour_U_1` (`code`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- behaviour_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `behaviour_i18n`;


CREATE TABLE `behaviour_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `behaviour_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `behaviour` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- specie_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `specie_group`;


CREATE TABLE `specie_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`scientific_name` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- specie_group_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `specie_group_i18n`;


CREATE TABLE `specie_group_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `specie_group_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `specie_group` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- specie
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `specie`;


CREATE TABLE `specie`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`specie_group_id` INTEGER  NOT NULL,
	`code` VARCHAR(10)  NOT NULL,
	`scientific_name` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `specie_FI_1` (`specie_group_id`),
	CONSTRAINT `specie_FK_1`
		FOREIGN KEY (`specie_group_id`)
		REFERENCES `specie_group` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- specie_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `specie_i18n`;


CREATE TABLE `specie_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `specie_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `specie` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- sighting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sighting`;


CREATE TABLE `sighting`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`record_id` INTEGER  NOT NULL,
	`specie_id` INTEGER,
	`behaviour_id` INTEGER,
	`association_id` INTEGER,
	`adults` VARCHAR(45),
	`juveniles` VARCHAR(45),
	`calves` VARCHAR(45),
	`total` INTEGER,
	`comments` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `sighting_FI_1` (`record_id`),
	CONSTRAINT `sighting_FK_1`
		FOREIGN KEY (`record_id`)
		REFERENCES `record` (`id`)
		ON DELETE CASCADE,
	INDEX `sighting_FI_2` (`specie_id`),
	CONSTRAINT `sighting_FK_2`
		FOREIGN KEY (`specie_id`)
		REFERENCES `specie` (`id`)
		ON DELETE CASCADE,
	INDEX `sighting_FI_3` (`behaviour_id`),
	CONSTRAINT `sighting_FK_3`
		FOREIGN KEY (`behaviour_id`)
		REFERENCES `behaviour` (`id`)
		ON DELETE CASCADE,
	INDEX `sighting_FI_4` (`association_id`),
	CONSTRAINT `sighting_FK_4`
		FOREIGN KEY (`association_id`)
		REFERENCES `association` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`birthday` DATE,
	`bi` VARCHAR(30),
	`nif` VARCHAR(30),
	`country` VARCHAR(255) default 'PT',
	`district` VARCHAR(255),
	`municipality` VARCHAR(255),
	`locality` VARCHAR(255),
	`address` VARCHAR(255),
	`zipcode` VARCHAR(8),
	`telephone` VARCHAR(30),
	`mobile` VARCHAR(30),
	`email` VARCHAR(255),
	`lang` VARCHAR(255) default 'pt',
	`photo` VARCHAR(255),
	`observations` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `user_FI_1` (`user_id`),
	CONSTRAINT `user_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- watch_info
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watch_info`;


CREATE TABLE `watch_info`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(45)  NOT NULL,
	`watch_post_id` INTEGER,
	`watchman_id` INTEGER,
	`company_id` INTEGER  NOT NULL,
	`base_latitude` VARCHAR(45)  NOT NULL,
	`base_longitude` VARCHAR(45)  NOT NULL,
	`date` DATE  NOT NULL,
	`valid` TINYINT  NOT NULL,
	`comments` TEXT,
	`created_by` INTEGER  NOT NULL,
	`updated_by` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `watch_info_FI_1` (`watch_post_id`),
	CONSTRAINT `watch_info_FK_1`
		FOREIGN KEY (`watch_post_id`)
		REFERENCES `watch_post` (`id`),
	INDEX `watch_info_FI_2` (`watchman_id`),
	CONSTRAINT `watch_info_FK_2`
		FOREIGN KEY (`watchman_id`)
		REFERENCES `watchman` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_info_FI_3` (`company_id`),
	CONSTRAINT `watch_info_FK_3`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_info_FI_4` (`created_by`),
	CONSTRAINT `watch_info_FK_4`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_info_FI_5` (`updated_by`),
	CONSTRAINT `watch_info_FK_5`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- watch_sighting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watch_sighting`;


CREATE TABLE `watch_sighting`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`watch_info_id` INTEGER  NOT NULL,
	`watch_code_id` INTEGER  NOT NULL,
	`time` TIME  NOT NULL,
	`watch_visibility_id` INTEGER,
	`specie_id` INTEGER,
	`group` VARCHAR(2),
	`total` INTEGER,
	`behaviour_id` INTEGER,
	`direction_id` INTEGER,
	`horizontal` FLOAT,
	`vertical` FLOAT,
	`vessel_id` INTEGER,
	`comments` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `watch_sighting_FI_1` (`watch_info_id`),
	CONSTRAINT `watch_sighting_FK_1`
		FOREIGN KEY (`watch_info_id`)
		REFERENCES `watch_info` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_sighting_FI_2` (`watch_code_id`),
	CONSTRAINT `watch_sighting_FK_2`
		FOREIGN KEY (`watch_code_id`)
		REFERENCES `watch_code` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_sighting_FI_3` (`watch_visibility_id`),
	CONSTRAINT `watch_sighting_FK_3`
		FOREIGN KEY (`watch_visibility_id`)
		REFERENCES `watch_visibility` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_sighting_FI_4` (`specie_id`),
	CONSTRAINT `watch_sighting_FK_4`
		FOREIGN KEY (`specie_id`)
		REFERENCES `specie` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_sighting_FI_5` (`behaviour_id`),
	CONSTRAINT `watch_sighting_FK_5`
		FOREIGN KEY (`behaviour_id`)
		REFERENCES `behaviour` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_sighting_FI_6` (`direction_id`),
	CONSTRAINT `watch_sighting_FK_6`
		FOREIGN KEY (`direction_id`)
		REFERENCES `direction` (`id`)
		ON DELETE CASCADE,
	INDEX `watch_sighting_FI_7` (`vessel_id`),
	CONSTRAINT `watch_sighting_FK_7`
		FOREIGN KEY (`vessel_id`)
		REFERENCES `vessel` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- watchman
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watchman`;


CREATE TABLE `watchman`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`observations` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `watchman_FI_1` (`company_id`),
	CONSTRAINT `watchman_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- watch_code
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watch_code`;


CREATE TABLE `watch_code`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`acronym` VARCHAR(10)  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- watch_code_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watch_code_i18n`;


CREATE TABLE `watch_code_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `watch_code_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `watch_code` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- watch_visibility
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watch_visibility`;


CREATE TABLE `watch_visibility`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `watch_visibility_U_1` (`code`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- watch_visibility_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watch_visibility_i18n`;


CREATE TABLE `watch_visibility_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`description` VARCHAR(255),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `watch_visibility_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `watch_visibility` (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- direction
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `direction`;


CREATE TABLE `direction`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`acronym` VARCHAR(10)  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- watch_post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `watch_post`;


CREATE TABLE `watch_post`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`latitude` VARCHAR(45)  NOT NULL,
	`longitude` VARCHAR(45)  NOT NULL,
	`height` FLOAT,
	`observations` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `watch_post_FI_1` (`company_id`),
	CONSTRAINT `watch_post_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- news_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `news_article`;


CREATE TABLE `news_article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`is_published` TINYINT default 0 NOT NULL,
	`slug` VARCHAR(255)  NOT NULL,
	`image` VARCHAR(1024),
	`enter_date` DATE,
	`exit_date` DATE,
	`publish_date` DATE  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `news_article_U_1` (`slug`)
)Type=MyISAM;

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
		ON DELETE CASCADE
)Type=MyISAM;

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
)Type=MyISAM;

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
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- team
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `team`;


CREATE TABLE `team`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255)  NOT NULL,
	`type` VARCHAR(255)  NOT NULL,
	`name` VARCHAR(512)  NOT NULL,
	`link` VARCHAR(1024),
	`photo` VARCHAR(1024),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `team_U_1` (`slug`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- team_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `team_i18n`;


CREATE TABLE `team_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`about` TEXT,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `team_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `team` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- album
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `album`;


CREATE TABLE `album`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255)  NOT NULL,
	`is_public` TINYINT default 0,
	`publish_date` DATE  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `album_U_1` (`slug`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- album_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `album_i18n`;


CREATE TABLE `album_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(512)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `album_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `album` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `photo`;


CREATE TABLE `photo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255)  NOT NULL,
	`album_id` INTEGER  NOT NULL,
	`image` VARCHAR(1024),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `photo_U_1` (`slug`),
	INDEX `photo_FI_1` (`album_id`),
	CONSTRAINT `photo_FK_1`
		FOREIGN KEY (`album_id`)
		REFERENCES `album` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- photo_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `photo_i18n`;


CREATE TABLE `photo_i18n`
(
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`caption` VARCHAR(512),
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `photo_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `photo` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- content
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `content`;


CREATE TABLE `content`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`section` VARCHAR(255)  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `content_U_1` (`section`)
)Type=MyISAM;

#-----------------------------------------------------------------------------
#-- content_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `content_i18n`;


CREATE TABLE `content_i18n`
(
	`id` INTEGER  NOT NULL,
	`description` TEXT,
	`culture` VARCHAR(7)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `content_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `content` (`id`)
		ON DELETE CASCADE
)Type=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
