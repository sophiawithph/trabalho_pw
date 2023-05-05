
CREATE DATABASE trabpw;

CREATE TABLE `usuarios` (
  `id` int(255) UNSIGNED NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `ativo` tinyint(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS `trabpw`.`arquivos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` INT UNSIGNED NOT NULL,
  `arquivo` VARCHAR(255) NULL,
  `data` DATETIME NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`))
ENGINE = InnoDB;

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
COMMIT;


  // FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`))