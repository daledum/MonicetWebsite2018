SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- observation_photo_tail
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_tail`;


CREATE TABLE `observation_photo_tail`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`photo_id` INTEGER  NOT NULL,
	`is_smooth` TINYINT default 0,
	`is_irregular` TINYINT default 0,
	PRIMARY KEY (`id`),
	KEY `observation_photo_tail_I_1`(`photo_id`),
	CONSTRAINT `observation_photo_tail_FK_1`
		FOREIGN KEY (`photo_id`)
		REFERENCES `observation_photo` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- observation_photo_dorsal_left
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_dorsal_left`;


CREATE TABLE `observation_photo_dorsal_left`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`photo_id` INTEGER  NOT NULL,
	`is_smooth` TINYINT default 0,
	`is_irregular` TINYINT default 0,
	PRIMARY KEY (`id`),
	KEY `observation_photo_dorsal_left_I_1`(`photo_id`),
	CONSTRAINT `observation_photo_dorsal_left_FK_1`
		FOREIGN KEY (`photo_id`)
		REFERENCES `observation_photo` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- observation_photo_dorsal_right
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `observation_photo_dorsal_right`;


CREATE TABLE `observation_photo_dorsal_right`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`photo_id` INTEGER  NOT NULL,
	`is_smooth` TINYINT default 0,
	`is_irregular` TINYINT default 0,
	PRIMARY KEY (`id`),
	KEY `observation_photo_dorsal_right_I_1`(`photo_id`),
	CONSTRAINT `observation_photo_dorsal_right_FK_1`
		FOREIGN KEY (`photo_id`)
		REFERENCES `observation_photo` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;