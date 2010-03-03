
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- mf_menu
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mf_menu`;


CREATE TABLE `mf_menu`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255)  NOT NULL,
	`menu_pai_id` INTEGER(11),
	`rota` VARCHAR(255),
	`permissao_id` INTEGER,
	`posicao` INTEGER(11) default 0,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `mf_menu_I_1`(`nome`),
	INDEX `mf_menu_FI_1` (`menu_pai_id`),
	CONSTRAINT `mf_menu_FK_1`
		FOREIGN KEY (`menu_pai_id`)
		REFERENCES `mf_menu` (`id`)
		ON DELETE SET NULL,
	INDEX `mf_menu_FI_2` (`permissao_id`),
	CONSTRAINT `mf_menu_FK_2`
		FOREIGN KEY (`permissao_id`)
		REFERENCES `sf_guard_permission` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
