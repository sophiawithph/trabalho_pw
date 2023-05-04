




CREATE TABLE IF NOT EXISTS `trabpw`.`arquivos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` INT UNSIGNED NOT NULL,
  `arquivo` VARCHAR(255) NULL,
  `data` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`))
ENGINE = InnoDB;