CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE employees (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    puesto VARCHAR(255) NOT NULL
);

CREATE TABLE asistencias (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    empleado_id INT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP
);
