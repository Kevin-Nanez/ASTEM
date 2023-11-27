DROP DATABASE astem;
CREATE DATABASE astem;

USE astem;

CREATE TABLE usuario (
id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
nombre VARCHAR(64) NOT NULL,
apellido VARCHAR(64) NOT NULL,
email VARCHAR(64) NOT NULL,
phone VARCHAR(12) NOT NULL,
user_password VARCHAR(64) NOT NULL,
administrador TINYINT(1) NOT NULL,
  direccion VARCHAR(255)
);

CREATE TABLE producto(
id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
nombre VARCHAR(64) NOT NULL,
webp VARCHAR(100) NOT NULL,
jpeg VARCHAR(100) NOT NULL,
precio INT(10),
stock INT(12)
);

select * from usuario;