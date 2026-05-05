CREATE DATABASE IF NOT EXISTS mvc;
USE mvc;

CREATE TABLE mvc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    personas VARCHAR(255) DEFAULT NULL
);
CREATE TABLE personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) DEFAULT NULL
);

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texto VARCHAR(255) DEFAULT NULL,
    estado ENUM('pendiente', 'iniciada', 'finalizada') DEFAULT NULL,
    autor VARCHAR(255) DEFAULT NULL,
    tema VARCHAR(255) DEFAULT NULL,
    fecha_limite DATE DEFAULT NULL,
    prioridad INT DEFAULT NULL
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) DEFAULT NULL,
    password VARCHAR(255) DEFAULT NULL,
    rol ENUM('admin', 'user', 'observador', 'supervisor') DEFAULT NULL
);

CREATE USER 'dama'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON mvc.* TO 'dama'@'localhost';
FLUSH PRIVILEGES;
