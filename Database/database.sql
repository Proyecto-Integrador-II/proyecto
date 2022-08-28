SET GLOBAL log_bin_trust_function_creators = 1;

CREATE TABLE IF NOT EXISTS permisos
(
    id     INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45) NOT NULL,
    CONSTRAINT permisos_nombre_unico UNIQUE (nombre)
);

INSERT INTO permisos (nombre)
VALUES ('VENDEDORES'),
       ('COMPRADORES'),
       ('ADMINISTRADORES');

DELIMITER @@
CREATE FUNCTION get_permisos_id(nombre_permiso VARCHAR(45)) RETURNS INT
BEGIN
    SELECT id INTO @resultado FROM permisos WHERE nombre = nombre_permiso LIMIT 1;
    RETURN @resultado;
END;
@@
DELIMITER ;

-- Se crea la tabla usuarios con los respectivos datos personales --
CREATE TABLE IF NOT EXISTS usuarios
(
    id              INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    permisos_id     INT          NOT NULL,
    nombre          VARCHAR(100) NOT NULL,
    correo          VARCHAR(200) NOT NULL,
    contrasena      VARCHAR(500) NOT NULL,
    habilitado      BOOLEAN      NOT NULL DEFAULT true,
    CONSTRAINT usuarios_correo_unique UNIQUE (correo),
    CONSTRAINT fk_permisos_vendedores_permisos_id FOREIGN KEY (permisos_id) REFERENCES permisos (id)
);

CREATE TABLE IF NOT EXISTS lugares
(
    id     INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    CONSTRAINT nombre_unique UNIQUE (nombre)
);

INSERT INTO lugares (nombre)
VALUES ('UPB'),
       ('Delacuesta'),
       ('Parque caracoli');

DELIMITER @@
CREATE FUNCTION get_lugares_name(v_id_lugares INT)
    RETURNS VARCHAR(255)
    LANGUAGE SQL
    NOT DETERMINISTIC
BEGIN
    SELECT nombre INTO @result FROM lugares WHERE id = v_id_lugares;
    return @result;
END;
@@

CREATE FUNCTION get_lugares_id(v_nombre_lugares VARCHAR(255))
    RETURNS INT
    LANGUAGE SQL
    NOT DETERMINISTIC
BEGIN
    SELECT id INTO @result FROM lugares WHERE nombre = v_nombre_lugares;
    return @result;
END;
@@

DELIMITER ;

-- -- Inventario -- --
CREATE TABLE IF NOT EXISTS inventario
(
    id             INT            NOT NULL PRIMARY KEY AUTO_INCREMENT,
    lugar_id       INT            NOT NULL,
    usuario_id     INT            NOT NULL,
    cantidad       INT            NOT NULL DEFAULT 0,
    nombre         VARCHAR(255)   NOT NULL,
    descripcion    VARCHAR(10000) NOT NULL,
    precio         DOUBLE         NOT NULL,
    imagen         LONGBLOB       NOT NULL,
    habilitado     BOOLEAN        NOT NULL DEFAULT true,
    CONSTRAINT fk_id_lugares FOREIGN KEY (lugar_id) REFERENCES lugares (id),
    CONSTRAINT fk_id_usuarios FOREIGN KEY (usuario_id) REFERENCES usuarios (id)
);

CREATE FUNCTION update_product(
    v_id            INT,
    v_lugar_id      INT,
    v_usuario_id    INT,
    v_cantidad      INT,
    v_nombre        VARCHAR(255),
    v_descripcion   VARCHAR(10000),
    v_precio        DOUBLE,
    v_imagen        LONGBLOB,
    v_habilitado    BOOLEAN
    
)
    RETURNS BOOLEAN
    LANGUAGE SQL
    NOT DETERMINISTIC
BEGIN
    SELECT id,
           lugar_id,
           usuario_id,
           cantidad,
           nombre,
           descripcion,
           precio,
           imagen,
           habilitado
           
    INTO @id_producto, @id_lugar, @id_usuario, @cantidad_producto, @nombre_producto, @descripcion_producto, @precio_producto, @imagen_producto,@habilitado_producto
    FROM inventario
    WHERE id = v_id;
    IF @id_producto IS NULL THEN
        RETURN false;
    END IF;
    IF @id_lugar != v_lugar_id THEN
        UPDATE
            inventario
        SET lugar_id = v_lugar_id
        WHERE id = v_id;
    END IF;
    IF @cantidad_producto != v_cantidad THEN
        UPDATE
            inventario
        SET cantidad = v_cantidad
        WHERE id = v_id;
    END IF;
    IF @nombre_producto != v_nombre THEN
        UPDATE
            inventario
        SET nombre = v_nombre
        WHERE id = v_id;
    END IF;
    IF @descripcion_producto != v_descripcion THEN
        UPDATE
            inventario
        SET descripcion = v_descripcion
        WHERE id = v_id;
    END IF;
    IF @precio_producto != v_precio THEN
        UPDATE
            inventario
        SET precio = v_precio
        WHERE id = v_id;
    END IF;
    IF @imagen_producto != v_imagen THEN
        UPDATE
            inventario
        SET imagen = v_imagen
        WHERE id = v_id;
    END IF;
    IF @habilitado_producto != v_habilitado THEN
        UPDATE
            inventario
        SET activo = v_activo
        WHERE id = v_id;
    END IF;
    RETURN true;
END;
@@