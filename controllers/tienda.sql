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
direccion VARCHAR(255) NOT NULL
);

CREATE TABLE producto(
id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
nombre VARCHAR(64) NOT NULL,
webp VARCHAR(100) NOT NULL,
jpeg VARCHAR(100) NOT NULL,
precio INT(10),
stock INT(12)
);

-- Insertar un usuario administrador
INSERT INTO usuario (nombre, apellido, email, phone, user_password, administrador, direccion)
VALUES ('Kevin', 'Nañez', 'kevinn2304@gmail.com', '8126944690', '$2y$10$XpXGoNicmXhy27FWnXMEu.EFtLfmy/9oWtzgABG7SE9O6QSYVxcBi', '1', 'Reynosa 268, Mitras Nte., 64320 Monterrey, N.L.'),
('Usuario', 'Usuario', 'usuario@1.com', '1234567890', '$2y$10$5znPrCYimVzxacaNwmKXqOkFFJcN2keX2fS5PYPoA5../w1SYe.N.', '0', 'FIME, UANL, EDIFICIO 4');

INSERT INTO producto (nombre, webp, jpeg, precio, stock)
VALUES 
('Playera 1', '/build/img/1.webp', '/build/img/1.jpeg', 301, 10),
('Playera 2', '/build/img/2.webp', '/build/img/2.jpeg', 302, 11),
('Playera 3', '/build/img/3.webp', '/build/img/3.jpeg', 303, 12),
('Playera 4', '/build/img/4.webp', '/build/img/4.jpeg', 304, 13),
('Playera 5', '/build/img/5.webp', '/build/img/5.jpeg', 305, 14),
('Playera 6', '/build/img/6.webp', '/build/img/6.jpeg', 306, 15),
('Playera 7', '/build/img/7.webp', '/build/img/7.jpeg', 307, 16),
('Playera 8', '/build/img/8.webp', '/build/img/8.jpeg', 308, 17),
('Playera 9', '/build/img/9.webp', '/build/img/9.jpeg', 309, 18),
('Playera 10', '/build/img/10.webp', '/build/img/10.jpeg', 310, 19),
('Playera 11', '/build/img/11.webp', '/build/img/11.jpeg', 311, 20),
('Playera 12', '/build/img/12.webp', '/build/img/12.jpeg', 312, 21),
('Playera 13', '/build/img/13.webp', '/build/img/13.jpeg', 313, 22);



select * from usuario;
select * from producto;



