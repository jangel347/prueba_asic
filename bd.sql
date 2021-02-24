CREATE DATABASE jeison_angel;

USE jeison_angel;

CREATE TABLE programador(
    cedula VARCHAR(100) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido  VARCHAR(100) NOT NULL,
    correo VARCHAR(50),
    lenguajes VARCHAR(500),
    fecha_creacion datetime CURRENT_TIMESTAMP,
)
