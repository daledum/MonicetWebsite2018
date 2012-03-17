DROP TABLE IF EXISTS `chart_iframe_information`;


CREATE TABLE `chart_iframe_information`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`company_id` INTEGER  NOT NULL,
	`hash` VARCHAR(10)  NOT NULL,
	`graph_type` VARCHAR(10)  NOT NULL,
	`year` INTEGER  NOT NULL,
	`chart_item` VARCHAR(10),
	`chart_type` VARCHAR(10),
	`selected` VARCHAR(10)  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `chart_iframe_information_FI_1` (`company_id`),
	CONSTRAINT `chart_iframe_information_FK_1`
		FOREIGN KEY (`company_id`)
		REFERENCES `company` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;
