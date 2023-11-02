/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 110102
 Source Host           : localhost:3306
 Source Schema         : libd

 Target Server Type    : MariaDB
 Target Server Version : 110102
 File Encoding         : 65001

 Date: 01/11/2023 20:42:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for autor
-- ----------------------------
DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL AUTO_INCREMENT,
  `pNombre` varchar(20) NOT NULL,
  `sNombre` varchar(20) DEFAULT NULL,
  `pApellido` varchar(20) NOT NULL,
  `sApellido` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idAutor`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of autor
-- ----------------------------
BEGIN;
INSERT INTO `autor` (`idAutor`, `pNombre`, `sNombre`, `pApellido`, `sApellido`) VALUES (1, 'Gabriel', 'Jose', 'Garcia', 'Marquez');
INSERT INTO `autor` (`idAutor`, `pNombre`, `sNombre`, `pApellido`, `sApellido`) VALUES (15, 'Marco', '', 'Aurelio', '');
INSERT INTO `autor` (`idAutor`, `pNombre`, `sNombre`, `pApellido`, `sApellido`) VALUES (47, 'Santiago', '', 'Sepulveda', '');
COMMIT;

-- ----------------------------
-- Table structure for historico
-- ----------------------------
DROP TABLE IF EXISTS `historico`;
CREATE TABLE `historico` (
  `idHistorico` int(11) NOT NULL AUTO_INCREMENT,
  `idLibro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `leido` int(11) NOT NULL,
  PRIMARY KEY (`idHistorico`),
  KEY `idLibro` (`idLibro`),
  CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of historico
-- ----------------------------
BEGIN;
INSERT INTO `historico` (`idHistorico`, `idLibro`, `fecha`, `leido`) VALUES (1, 1, '2012-12-12', 123);
INSERT INTO `historico` (`idHistorico`, `idLibro`, `fecha`, `leido`) VALUES (2, 1, '2023-10-26', 110);
INSERT INTO `historico` (`idHistorico`, `idLibro`, `fecha`, `leido`) VALUES (3, 1, '2000-01-01', 2);
INSERT INTO `historico` (`idHistorico`, `idLibro`, `fecha`, `leido`) VALUES (5, 1, '2023-10-31', 60);
COMMIT;

-- ----------------------------
-- Table structure for libro
-- ----------------------------
DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `paginas` int(11) NOT NULL,
  `paginasLeidas` int(11) NOT NULL,
  `siguiente` tinyint(1) DEFAULT NULL,
  `biblioteca` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idLibro`),
  KEY `idAutor` (`idAutor`),
  CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of libro
-- ----------------------------
BEGIN;
INSERT INTO `libro` (`idLibro`, `titulo`, `idAutor`, `anio`, `descripcion`, `paginas`, `paginasLeidas`, `siguiente`, `biblioteca`) VALUES (1, '100 años de soledad', 1, 1982, 'Fue catalogada como una de las obras más importantes de la lengua castellana', 471, 295, 0, 1);
INSERT INTO `libro` (`idLibro`, `titulo`, `idAutor`, `anio`, `descripcion`, `paginas`, `paginasLeidas`, `siguiente`, `biblioteca`) VALUES (2, 'La hojarasca', 1, 1955, 'Es conocida por mostrar por primera vez Macondo, el pueblo ficticio hecho famoso en Cien años de soledad.', 340, 0, 0, 0);
INSERT INTO `libro` (`idLibro`, `titulo`, `idAutor`, `anio`, `descripcion`, `paginas`, `paginasLeidas`, `siguiente`, `biblioteca`) VALUES (3, 'El coronel no tiene quien le escriba', 1, 1961, 'Es una de las más célebres de las escritas por el autor', 92, 0, 0, 1);
INSERT INTO `libro` (`idLibro`, `titulo`, `idAutor`, `anio`, `descripcion`, `paginas`, `paginasLeidas`, `siguiente`, `biblioteca`) VALUES (4, 'La mala hora', 1, 1962, 'La mala hora es la tercera novela del escritor colombiano Gabriel García Márquez, publicada en 1962.', 356, 0, 0, 0);
INSERT INTO `libro` (`idLibro`, `titulo`, `idAutor`, `anio`, `descripcion`, `paginas`, `paginasLeidas`, `siguiente`, `biblioteca`) VALUES (5, 'Los funerales de la Mamá Grande', 1, 1962, 'Los funerales de la Mamá Grande es una colección de ocho cuentos', 200, 0, 1, 1);
INSERT INTO `libro` (`idLibro`, `titulo`, `idAutor`, `anio`, `descripcion`, `paginas`, `paginasLeidas`, `siguiente`, `biblioteca`) VALUES (6, 'Crónica de una muerte anunciada', 1, 1981, 'Fue incluida en la lista de las 100 mejores novelas en español del siglo XX del periódico español El Mundo.', 156, 0, 1, 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
