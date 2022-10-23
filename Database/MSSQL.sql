USE proyecto2
GO

CREATE TABLE lugares(
id INT NOT NULL IDENTITY(1, 1),
nombre VARCHAR(50) NOT NULL,
UNIQUE (nombre),
PRIMARY KEY (ID)
);

CREATE INDEX index_nombre ON lugares(nombre);

SET IDENTITY_INSERT lugares ON
INSERT INTO lugares (id, nombre) VALUES
(2, 'Delacuesta'),
(3, 'Parque caracoli'),
(1, 'UPB')
SET IDENTITY_INSERT lugares OFF 

CREATE TABLE producto(
codproducto INT NOT NULL IDENTITY(1, 1),
nombre VARCHAR(100) NOT NULL,
precio INT NOT NULL,
lugar INT NOT NULL,
descripcion VARCHAR(1000) NOT NULL,
foto TEXT NOT NULL,
proveedor INT NOT NULL,
habilitado TINYINT NULL DEFAULT 1,
PRIMARY KEY (codproducto)
);

CREATE INDEX index_lugar ON producto(lugar);
CREATE INDEX index_proveedor ON producto(proveedor);

CREATE TABLE razones_reporte (
  id int NOT NULL IDENTITY(1, 1),
  tipo_reporte varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

SET IDENTITY_INSERT razones_reporte ON
INSERT INTO razones_reporte (id, tipo_reporte) VALUES
(1, 'Irrespeto con el vendedor'),
(2, 'No pagó'),
(3, 'No se encontraba en el lugar de pedido'),
(4, 'Canceló el servicio despues de haberse comenzado el proceso')
SET IDENTITY_INSERT razones_reporte OFF 

CREATE TABLE reporte (
  id int NOT NULL IDENTITY(1, 1),
  id_razon int NOT NULL,
  id_reportado int NOT NULL,
  reporte varchar(1000) NOT NULL,
  foto text DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE INDEX index_razon ON reporte(id_razon);
CREATE INDEX index_reportado ON reporte(id_reportado);

CREATE TABLE razones_reporte_vendedor (
  id int NOT NULL IDENTITY(1, 1),
  tipo_reporte varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

SET IDENTITY_INSERT razones_reporte_vendedor ON
INSERT INTO razones_reporte_vendedor (id, tipo_reporte) VALUES
(1, 'Fue irrespetuoso'),
(2, 'No ofreció el producto'),
(3, 'No se encontraba en el lugar de pedido'),
(4, 'El producto estaba en malas condiciones'),
(5, 'No tenía vueltos')
SET IDENTITY_INSERT razones_reporte_vendedor OFF 

CREATE TABLE reporte_vendedor (
  id int NOT NULL IDENTITY(1, 1),
  id_razon int NOT NULL,
  id_reportado int NOT NULL,
  reporte varchar(1000) NOT NULL,
  foto text DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE INDEX index_razon_vendedor ON reporte_vendedor(id_razon);
CREATE INDEX index_reportado_vendedor ON reporte_vendedor(id_reportado);

CREATE TABLE rol (
  idrol int NOT NULL IDENTITY(1, 1),
  rol varchar(20) NOT NULL,
  PRIMARY KEY (idrol)
);

SET IDENTITY_INSERT rol ON
INSERT INTO rol (idrol, rol) VALUES
(1, 'Administradores'),
(2, 'Vendedores'),
(3, 'Compradores')
SET IDENTITY_INSERT rol OFF 

CREATE TABLE usuario (
  idusuario int NOT NULL IDENTITY(1, 1),
  nombre varchar(50) NOT NULL,
  apellido varchar(50) NOT NULL,
  correo varchar(100) NOT NULL,
  clave varchar(100) NOT NULL,
  rol int NOT NULL,
  habilitado tinyint NOT NULL DEFAULT 1,
  calificacion tinyint DEFAULT NULL,
  PRIMARY KEY (idusuario),
  UNIQUE (correo),
);

CREATE INDEX index_rol ON usuario(rol);

SET IDENTITY_INSERT usuario ON
INSERT INTO usuario (idusuario, nombre, apellido, correo, clave, rol, habilitado, calificacion) VALUES
(1, 'Jean', 'Parra', 'Jean@vendedor.com', '1234', 2, 1, NULL),
(2, 'Jean', 'Parra', 'Jean@comprador.com', '1234', 3, 1, NULL),
(3, 'Jean', 'Parra', 'Jean@administrador.com', '1234', 1, 1, NULL),
(4, 'Miguel', 'Mateo', 'Miguel@vendedor.com', '1234', 2, 1, NULL),
(5, 'Miguel', 'Mateo', 'Miguel@comprador.com', '1234', 3, 1, NULL),
(6, 'Miguel', 'Mateo', 'Miguel@administrador.com', '1234', 1, 1, NULL),
(7, 'Armando', 'Cortes', 'Armando@vendedor.com', '1234', 2, 1, NULL),
(8, 'Armando', 'Cortes', 'Armando@comprador.com', '1234', 3, 1, NULL),
(9, 'Armando', 'Cortes', 'Armando@administrador.com', '1234', 1, 1, NULL),
(10, 'Diego', 'Vivas', 'Diego@vendedor.com', '1234', 2, 1, NULL),
(11, 'Diego', 'Vivas', 'Diego@comprador.com', '1234', 3, 1, NULL),
(12, 'Diego', 'Vivas', 'Diego@administrador.com', '1234', 1, 1, NULL),
(13, 'Nicolas', 'Muñoz', 'Nicolas@vendedor.com', '1234', 2, 1, NULL),
(14, 'Nicolas', 'Muñoz', 'Nicolas@comprador.com', '1234', 3, 1, NULL),
(15, 'Nicolas', 'Muñoz', 'Nicolas@administrador.com', '1234', 1, 1, NULL),
(16, 'Daniel', 'Cadena', 'Daniel@vendedor.com', '1234', 2, 1, NULL),
(17, 'Daniel', 'Cadena', 'Daniel@comprador.com', '1234', 3, 1, NULL),
(18, 'Daniel', 'Cadena', 'Daniel@administrador.com', '1234', 1, 1, NULL)
SET IDENTITY_INSERT usuario OFF 

ALTER TABLE usuario
ADD CONSTRAINT FK_usuario_rol FOREIGN KEY (rol) REFERENCES rol (idrol) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE producto
ADD CONSTRAINT FK_producto_lugares FOREIGN KEY (lugar) REFERENCES lugares (id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_producto_usuario FOREIGN KEY (proveedor) REFERENCES usuario (idusuario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE reporte
ADD CONSTRAINT FK_reporte_razon FOREIGN KEY (id_razon) REFERENCES razones_reporte_vendedor (id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_reporte_usuario FOREIGN KEY (id_reportado) REFERENCES usuario (idusuario) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE reporte_vendedor
ADD CONSTRAINT FK_reporte_razon_vendedor FOREIGN KEY (id_razon) REFERENCES razones_reporte (id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_reporte_usuario_vendedor FOREIGN KEY (id_reportado) REFERENCES usuario (idusuario) ON DELETE CASCADE ON UPDATE CASCADE;


GO


