-- création de la base de données
DROP DATABASE IF EXISTS `gsbfraisbeta`;
CREATE DATABASE IF NOT EXISTS `gsbfraisbeta`
  CHARACTER SET utf8 COLLATE utf8_general_ci;

-- création d'un login et affectation à ce login de tous les droits sur la base 
-- de données GenDongsbfraisnees

CREATE USER userGsb@'localhost' IDENTIFIED BY 'secret';
GRANT ALL ON gsbfraisbeta.* TO userGsb@'localhost' ;