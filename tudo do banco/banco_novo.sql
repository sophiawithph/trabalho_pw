

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


CREATE SCHEMA IF NOT EXISTS `trabpw` DEFAULT CHARACTER SET utf8mb4 ;
USE `trabpw` ;

CREATE TABLE IF NOT EXISTS `trabpw`.`usuarios` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `email` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `username` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `senha` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `ativo` TINYINT(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



CREATE TABLE IF NOT EXISTS `trabpw`.`arquivos` (
  `id_arquivo` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(10) UNSIGNED NOT NULL,
  `arquivo` VARCHAR(255) NULL DEFAULT NULL,
  `data` DATETIME NULL DEFAULT NULL,
`ativo` TINYINT(45) NOT NULL,
  PRIMARY KEY (`id_arquivo`),
  CONSTRAINT `arquivos_ibfk_1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `trabpw`.`usuarios` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


CREATE TABLE IF NOT EXISTS `trabpw`.`arquivos_has_usuarios` (
  `arquivos_id` INT(10) UNSIGNED NOT NULL,
  `usuarios_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`arquivos_id`, `usuarios_id`),
  CONSTRAINT `fk_arquivos_has_usuarios_arquivos1`
    FOREIGN KEY (`arquivos_id`)
    REFERENCES `trabpw`.`arquivos` (`id_arquivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_arquivos_has_usuarios_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `trabpw`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;



START TRANSACTION;
USE `trabpw`;
INSERT INTO `trabpw`.`usuarios` (`id`, `nome`, `email`, `username`, `senha`, `ativo`) VALUES (DEFAULT, 'sophia', 'sophia@gmail.com', 'sophia123', '$2y$10$Wkv7pbaBRpMYCUNd0UFUHuyBbm8d6/H4pGEQAId2CeS0MVJTuwotW', 1);

COMMIT;

