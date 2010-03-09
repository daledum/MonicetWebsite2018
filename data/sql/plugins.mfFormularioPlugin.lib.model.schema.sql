
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- mf_formulario
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mf_formulario`;


CREATE TABLE `mf_formulario`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`regra` VARCHAR(255)  NOT NULL,
	`visivel` TINYINT default 1,
	`ao_editar` TINYINT default 1,
	`ao_criar` TINYINT default 1,
	`observacoes` TEXT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- mf_formulario_utilizador
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mf_formulario_utilizador`;


CREATE TABLE `mf_formulario_utilizador`
(
	`formulario_id` INTEGER  NOT NULL,
	`utilizador_id` INTEGER  NOT NULL,
	PRIMARY KEY (`formulario_id`,`utilizador_id`),
	KEY `mf_formulario_utilizador_I_1`(`formulario_id`),
	KEY `mf_formulario_utilizador_I_2`(`utilizador_id`),
	CONSTRAINT `mf_formulario_utilizador_FK_1`
		FOREIGN KEY (`formulario_id`)
		REFERENCES `mf_formulario` (`id`),
	CONSTRAINT `mf_formulario_utilizador_FK_2`
		FOREIGN KEY (`utilizador_id`)
		REFERENCES `sf_guard_user` (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
