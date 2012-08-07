SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `mark`;

#-----------------------------------------------------------------------------
#-- observation_photo_tail_mark
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_tail_mark`;


CREATE TABLE `observation_photo_tail_mark`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`observation_photo_tail_id` INTEGER  NOT NULL,
	`pattern_cell_tail_id` INTEGER  NOT NULL,
	`is_wide` TINYINT default 0,
	`is_deep` TINYINT default 0,
	`continues_from_cell_id` INTEGER,
	`continues_on_cell_id` INTEGER,
	PRIMARY KEY (`id`),
	KEY `observation_photo_tail_mark_I_1`(`observation_photo_tail_id`),
	KEY `observation_photo_tail_mark_I_2`(`pattern_cell_tail_id`),
	KEY `observation_photo_tail_mark_I_3`(`continues_from_cell_id`),
	KEY `observation_photo_tail_mark_I_4`(`continues_on_cell_id`),
	CONSTRAINT `observation_photo_tail_mark_FK_1`
		FOREIGN KEY (`observation_photo_tail_id`)
		REFERENCES `observation_photo_tail` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_tail_mark_FK_2`
		FOREIGN KEY (`pattern_cell_tail_id`)
		REFERENCES `pattern_cell_tail` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_tail_mark_FK_3`
		FOREIGN KEY (`continues_from_cell_id`)
		REFERENCES `pattern_cell_tail` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_tail_mark_FK_4`
		FOREIGN KEY (`continues_on_cell_id`)
		REFERENCES `pattern_cell_tail` (`id`)
		ON DELETE SET NULL
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- observation_photo_dorsal_left_mark
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_dorsal_left_mark`;


CREATE TABLE `observation_photo_dorsal_left_mark`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`observation_photo_dorsal_left_id` INTEGER  NOT NULL,
	`pattern_cell_dorsal_left_id` INTEGER  NOT NULL,
	`is_wide` TINYINT default 0,
	`is_deep` TINYINT default 0,
	`continues_from_cell_id` INTEGER,
	`continues_on_cell_id` INTEGER,
	PRIMARY KEY (`id`),
	KEY `observation_photo_dorsal_left_mark_I_1`(`observation_photo_dorsal_left_id`),
	KEY `observation_photo_dorsal_left_mark_I_2`(`pattern_cell_dorsal_left_id`),
	KEY `observation_photo_dorsal_left_mark_I_3`(`continues_from_cell_id`),
	KEY `observation_photo_dorsal_left_mark_I_4`(`continues_on_cell_id`),
	CONSTRAINT `observation_photo_dorsal_left_mark_FK_1`
		FOREIGN KEY (`observation_photo_dorsal_left_id`)
		REFERENCES `observation_photo_dorsal_left` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_dorsal_left_mark_FK_2`
		FOREIGN KEY (`pattern_cell_dorsal_left_id`)
		REFERENCES `pattern_cell_dorsal_left` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_dorsal_left_mark_FK_3`
		FOREIGN KEY (`continues_from_cell_id`)
		REFERENCES `pattern_cell_dorsal_left` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_dorsal_left_mark_FK_4`
		FOREIGN KEY (`continues_on_cell_id`)
		REFERENCES `pattern_cell_dorsal_left` (`id`)
		ON DELETE SET NULL
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- observation_photo_dorsal_right_mark
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_dorsal_right_mark`;


CREATE TABLE `observation_photo_dorsal_right_mark`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`observation_photo_dorsal_right_id` INTEGER  NOT NULL,
	`pattern_cell_dorsal_right_id` INTEGER  NOT NULL,
	`is_wide` TINYINT default 0,
	`is_deep` TINYINT default 0,
	`continues_from_cell_id` INTEGER,
	`continues_on_cell_id` INTEGER,
	PRIMARY KEY (`id`),
	KEY `observation_photo_dorsal_right_mark_I_1`(`observation_photo_dorsal_right_id`),
	KEY `observation_photo_dorsal_right_mark_I_2`(`pattern_cell_dorsal_right_id`),
	KEY `observation_photo_dorsal_right_mark_I_3`(`continues_from_cell_id`),
	KEY `observation_photo_dorsal_right_mark_I_4`(`continues_on_cell_id`),
	CONSTRAINT `observation_photo_dorsal_right_mark_FK_1`
		FOREIGN KEY (`observation_photo_dorsal_right_id`)
		REFERENCES `observation_photo_dorsal_right` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_dorsal_right_mark_FK_2`
		FOREIGN KEY (`pattern_cell_dorsal_right_id`)
		REFERENCES `pattern_cell_dorsal_right` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `observation_photo_dorsal_right_mark_FK_3`
		FOREIGN KEY (`continues_from_cell_id`)
		REFERENCES `pattern_cell_dorsal_right` (`id`)
		ON DELETE SET NULL,
	CONSTRAINT `observation_photo_dorsal_right_mark_FK_4`
		FOREIGN KEY (`continues_on_cell_id`)
		REFERENCES `pattern_cell_dorsal_right` (`id`)
		ON DELETE SET NULL
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;