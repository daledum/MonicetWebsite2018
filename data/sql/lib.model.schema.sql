
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- news_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `news_article`;


CREATE TABLE `news_article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`is_published` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
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
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
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
