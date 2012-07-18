SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `observation_photo_mark_tail`;
DROP TABLE IF EXISTS `observation_photo_mark_dorsal_right`;
DROP TABLE IF EXISTS `observation_photo_mark_dorsal_left`;

#-----------------------------------------------------------------------------
#-- pattern
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pattern`;


CREATE TABLE `pattern`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`specie_id` INTEGER,
	`image_tail` VARCHAR(255),
	`image_dorsal_left` VARCHAR(255),
	`image_dorsal_right` VARCHAR(255),
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
#-- pattern_cell_tail
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pattern_cell_tail`;


CREATE TABLE `pattern_cell_tail`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`pattern_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`points` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `pattern_cell_tail_I_1`(`pattern_id`),
	CONSTRAINT `pattern_cell_tail_FK_1`
		FOREIGN KEY (`pattern_id`)
		REFERENCES `pattern` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- pattern_cell_dorsal_left
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pattern_cell_dorsal_left`;


CREATE TABLE `pattern_cell_dorsal_left`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`pattern_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`points` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `pattern_cell_dorsal_left_I_1`(`pattern_id`),
	CONSTRAINT `pattern_cell_dorsal_left_FK_1`
		FOREIGN KEY (`pattern_id`)
		REFERENCES `pattern` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- pattern_cell_dorsal_right
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `pattern_cell_dorsal_right`;


CREATE TABLE `pattern_cell_dorsal_right`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`pattern_id` INTEGER  NOT NULL,
	`name` VARCHAR(255)  NOT NULL,
	`points` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `pattern_cell_dorsal_right_I_1`(`pattern_id`),
	CONSTRAINT `pattern_cell_dorsal_right_FK_1`
		FOREIGN KEY (`pattern_id`)
		REFERENCES `pattern` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;