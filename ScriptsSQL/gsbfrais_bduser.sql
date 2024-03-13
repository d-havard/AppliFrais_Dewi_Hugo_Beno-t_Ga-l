-- création de la base de données
DROP DATABASE IF EXISTS `gsbfrais`;
CREATE DATABASE IF NOT EXISTS `gsbfrais`
  CHARACTER SET utf8 COLLATE utf8_general_ci;

-- création d'un login et affectation à ce login de tous les droits sur la base 
-- de données GenDongsbfraisnees

CREATE USER userGsb@'localhost' IDENTIFIED BY 'secret';
GRANT ALL ON gsbfrais.* TO userGsb@'localhost' ;