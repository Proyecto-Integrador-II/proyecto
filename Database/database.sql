-- Tabla de permisos para el acceso de los clientes y vendedores --
CREATE TABLE IF NOT EXISTS permisos
(
    id     INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    CONSTRAINT permisos_nombre_unico UNIQUE (nombre)
);

-- Se insertar los 2 tipos de usuarios --
INSERT INTO permisos (nombre)
VALUES ('VENDEDORES'),
       ('CLIENTES');

-- Se obtiene el id del permiso por medio de una función --
DELIMITER @@
CREATE FUNCTION get_permisos_id(nombre_permiso VARCHAR(45)) RETURNS INT
BEGIN
    SELECT id INTO @resultado FROM permisos WHERE nombre = nombre_permiso LIMIT 1;
    RETURN @resultado;
END;
@@
DELIMITER ;

-- Se crea la tabla vendedores con los respectivos datos personales --
CREATE TABLE IF NOT EXISTS vendedores
(
    id              INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    permisos_id     INT          NOT NULL,
    nombre_completo VARCHAR(100) NOT NULL,
    telefono        VARCHAR(20)  NOT NULL,
    correo          VARCHAR(200) NOT NULL,
    hash_contrasena VARCHAR(500) NOT NULL,
    CONSTRAINT vendedores_correo_unique UNIQUE (correo),
    CONSTRAINT fk_permisos_vendedores_permisos_id FOREIGN KEY (permisos_id) REFERENCES permisos (id)
);

-- -- Inventario -- --
CREATE TABLE IF NOT EXISTS inventario
(
    id             INT            NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cantidad       INT            NOT NULL DEFAULT 0,
    nombre         VARCHAR(255)   NOT NULL,
    descripcion    VARCHAR(10000) NOT NULL,
    precio         DOUBLE         NOT NULL,
    imagen         LONGBLOB,
    CONSTRAINT unique_producto UNIQUE (nombre)
);

-- -- Clientes -- --
CREATE TABLE IF NOT EXISTS clientes
(
    id              INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    permisos_id     INT          NOT NULL,
    nombre_completo VARCHAR(100) NOT NULL,
    telefono        VARCHAR(20)  NOT NULL,
    correo          VARCHAR(200) NOT NULL,
    hash_contrasena VARCHAR(500) NOT NULL,
    CONSTRAINT clientes_correo_unique UNIQUE (correo)
);