DROP DATABASE IF EXISTS PureSkin;
CREATE DATABASE PureSkin
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE PureSkin;

CREATE TABLE IF NOT EXISTS Productos (
    CodigoProductos INT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Descripcion VARCHAR(250) NOT NULL,
    Precio DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    Stock INT NOT NULL DEFAULT 0,
    imagen VARCHAR(255) NOT NULL,
    PRIMARY KEY (CodigoProductos)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS usuario (
    ciusuario INT NOT NULL,
    Nombre VARCHAR(100) NOT NULL,
    Direccion VARCHAR(150) NOT NULL,
    Celular VARCHAR(20) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    Rol VARCHAR(45) NOT NULL,
    Estado VARCHAR(45) NOT NULL,
    PRIMARY KEY (ciusuario)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Pedidos (
    idPedidos INT NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Fecha DATE NOT NULL,
    Estado VARCHAR(45) NOT NULL DEFAULT 'Pendiente',
    NombreVendedor VARCHAR(100) NOT NULL,
    PRIMARY KEY (idPedidos)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Carrito (
    Productos_CodigoProductos INT NOT NULL,
    Pedidos_idPedidos INT NOT NULL,
    Cantidad INT NOT NULL,
    CostoTotal DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (Productos_CodigoProductos, Pedidos_idPedidos),
    INDEX idx_carrito_pedido (Pedidos_idPedidos),
    CONSTRAINT fk_carrito_producto
        FOREIGN KEY (Productos_CodigoProductos)
        REFERENCES Productos (CodigoProductos)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,
    CONSTRAINT fk_carrito_pedido
        FOREIGN KEY (Pedidos_idPedidos)
        REFERENCES Pedidos (idPedidos)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS ventas (
    idventas INT NOT NULL AUTO_INCREMENT,
    Fecha DATE NOT NULL,
    Producto VARCHAR(100) NOT NULL,
    Stock INT NOT NULL,
    Cliente VARCHAR(100) NOT NULL,
    Total DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    Pedidos_idPedidos INT NULL,
    PRIMARY KEY (idventas),
    INDEX idx_ventas_pedido (Pedidos_idPedidos),
    CONSTRAINT fk_ventas_pedidos
        FOREIGN KEY (Pedidos_idPedidos)
        REFERENCES Pedidos (idPedidos)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

USE PureSkin;

ALTER TABLE Pedidos
    ADD COLUMN Telefono VARCHAR(20) NULL AFTER Nombre,
    ADD COLUMN Direccion VARCHAR(150) NULL AFTER Telefono,
    ADD COLUMN MetodoPago VARCHAR(20) NULL AFTER Direccion;

INSERT IGNORE INTO usuario (ciusuario, Nombre, Direccion, Celular, Rol, Estado) VALUES
(14035615, 'Alejandro', 'Cochabamba', '11111111', 'Administrador', 'Activo'),
(9422750, 'Sara', 'Cochabamba', '11111111', 'Administrador', 'Activo'),
(9453672, 'Natalia', 'Cochabamba', '11111111', 'Administrador', 'Activo'),
(13002889, 'Daira', 'Cochabamba', '70000000', 'Administrador', 'Activo'),
(20000000, 'Vendedor', 'Cochabamba', '71111111', 'Vendedor', 'Activo'),
(30000000, 'cliente', 'Cochabamba', '72222222', 'cliente', 'Activo');

INSERT INTO Productos (CodigoProductos, Nombre, Descripcion, Precio, Stock, imagen)
SELECT 1, 'Mascarilla de Arroz', 'Ayuda a suavizar e iluminar la piel.', 10.00, 30, 'Arroz.webp'
WHERE NOT EXISTS (SELECT 1 FROM Productos WHERE CodigoProductos = 1);
INSERT INTO Productos (CodigoProductos, Nombre, Descripcion, Precio, Stock, imagen)
SELECT 2, 'Mascarilla de Avena', 'Aporta una limpieza suave para la piel.', 10.00, 25, 'avena.jpg'
WHERE NOT EXISTS (SELECT 1 FROM Productos WHERE CodigoProductos = 2);
INSERT INTO Productos (CodigoProductos, Nombre, Descripcion, Precio, Stock, imagen)
SELECT 3, 'Mascarilla de Miel', 'Ayuda a mantener la piel hidratada.', 10.00, 20, 'miel.jpg'
WHERE NOT EXISTS (SELECT 1 FROM Productos WHERE CodigoProductos = 3);
INSERT INTO Productos (CodigoProductos, Nombre, Descripcion, Precio, Stock, imagen)
SELECT 4, 'Mascarilla de Aloe Vera', 'Refresca y ayuda a calmar la piel.', 12.00, 25, 'aloevera.jpg'
WHERE NOT EXISTS (SELECT 1 FROM Productos WHERE CodigoProductos = 4);
INSERT INTO Productos (CodigoProductos, Nombre, Descripcion, Precio, Stock, imagen)
SELECT 5, 'Mascarilla de Pepino', 'Brinda una sensacion refrescante.', 10.00, 18, 'pepino.jpg'
WHERE NOT EXISTS (SELECT 1 FROM Productos WHERE CodigoProductos = 5);
INSERT INTO Productos (CodigoProductos, Nombre, Descripcion, Precio, Stock, imagen)
SELECT 6, 'Mascarilla de Platano', 'hidrata profundamente y suaviza la piel seca gracias a sus vitaminas A, B y E.', 10.00, 0, 'platano.avif'
WHERE NOT EXISTS (SELECT 1 FROM Productos WHERE CodigoProductos = 6);