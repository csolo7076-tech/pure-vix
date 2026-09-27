-- MySQL Workbench Forward Engineering


-- -----------------------------------------------------
-- Schema PureSkin
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema PureSkin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PureSkin` DEFAULT CHARACTER SET utf8 ;
USE `PureSkin` ;

-- -----------------------------------------------------
-- Table `PureSkin`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PureSkin`.`Productos` (
  `CodigoProductos` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre` VARCHAR(100) NULL,
  `Descripcion` VARCHAR(150) NULL,
  `Precio` DECIMAL(10,2) NULL,
  `Stock` INT NULL
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PureSkin`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PureSkin`.`usuario` (
  `ciusuario` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre` VARCHAR(100) NULL,
  `Direccion` VARCHAR(150) NULL,
  `Celular` VARCHAR(20) NULL,
  `Rol` VARCHAR(45) NULL,
  `Estado` VARCHAR(45) NULL
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PureSkin`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PureSkin`.`ventas` (
  `idventas` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Fecha` DATE NULL,
  `Producto` VARCHAR(100) NULL,
  `Stock` INT NULL,
  `Cliente` VARCHAR(100) NULL
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PureSkin`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PureSkin`.`Pedidos` (
  `idPedidos` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre` VARCHAR(100) NULL,
  `Fecha` DATE NULL,
  `Estado` VARCHAR(45) NULL,
  `NombreVendedor` VARCHAR(100) NULL
  )
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `PureSkin`.`Carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PureSkin`.`Carrito` (
  `Productos_CodigoProductos` INT NOT NULL,
  `Pedidos_idPedidos` INT NOT NULL,
  `Cantidad` INT NULL,
  `CostoTotal` DECIMAL(10,2) NULL,
  PRIMARY KEY (`Productos_CodigoProductos`, `Pedidos_idPedidos`),
  INDEX `fk_Productos_has_Pedidos_Pedidos1_idx` (`Pedidos_idPedidos` ASC),
  INDEX `fk_Productos_has_Pedidos_Productos_idx` (`Productos_CodigoProductos` ASC),
  CONSTRAINT `fk_Productos_has_Pedidos_Productos`
    FOREIGN KEY (`Productos_CodigoProductos`)
    REFERENCES `PureSkin`.`Productos` (`CodigoProductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_has_Pedidos_Pedidos1`
    FOREIGN KEY (`Pedidos_idPedidos`)
    REFERENCES `PureSkin`.`Pedidos` (`idPedidos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

