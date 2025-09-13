-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: sept. 13, 2025 la 06:50 PM
-- Versiune server: 9.1.0
-- Versiune PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `masinibd`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `baterii`
--

DROP TABLE IF EXISTS `baterii`;
CREATE TABLE IF NOT EXISTS `baterii` (
  `id_baterie` int NOT NULL AUTO_INCREMENT,
  `tehnologie_stocare` varchar(40) DEFAULT NULL,
  `capacitate_bruta` double DEFAULT NULL,
  `autonomie_electrica` int DEFAULT NULL,
  `locatie_baterie` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_baterie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `baterii`
--

INSERT INTO `baterii` (`id_baterie`, `tehnologie_stocare`, `capacitate_bruta`, `autonomie_electrica`, `locatie_baterie`) VALUES
(1, 'Litiu-ion', 4.4, NULL, 'Sub portbagaj'),
(2, 'Hidrură de nichel-metal', 1.6, NULL, 'Sub scaunele din spate'),
(3, 'Litiu-ion', 17.7, NULL, 'Sub scaunele din față'),
(4, 'Litiu-polimer', 8.9, NULL, 'Sub scaunele din spate'),
(5, 'Litiu-polimer', 8.9, NULL, 'Sub scaunele din spate'),
(6, 'Hidrură de nichel-metal', 1.9, NULL, 'Sub scaunele din spate'),
(7, 'Hidrură de nichel-metal', 1.3, NULL, 'Sub scaunele din spate'),
(8, 'Litiu-ion', 17.9, NULL, 'Sub portbagaj'),
(9, 'Litiu-ion', 90, 505, 'Sub podea'),
(10, 'Litiu-ion', 98.7, 500, 'Sub podea'),
(11, 'Litiu-ion', 105, 557, 'Sub Podea'),
(12, 'Litiu-ion', 93.4, 452, 'Sub podea'),
(13, 'Litiu-ion', 94.8, 490, 'Sub Podea'),
(14, 'Litiu-ion', 26.8, 230, 'Sub scaunele din spate'),
(15, 'Litiu-ion', 0.13, NULL, 'In compartimentul motorului'),
(16, 'Litiu-Ion', 412, 69, 'Sub podea');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `consumuri`
--

DROP TABLE IF EXISTS `consumuri`;
CREATE TABLE IF NOT EXISTS `consumuri` (
  `id_motor` int NOT NULL,
  `consum_oras` double DEFAULT NULL,
  `consum_extern` double DEFAULT NULL,
  `consum_mixt` double DEFAULT NULL,
  PRIMARY KEY (`id_motor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `consumuri`
--

INSERT INTO `consumuri` (`id_motor`, `consum_oras`, `consum_extern`, `consum_mixt`) VALUES
(1, 7.7, 5.2, 6.2),
(2, 4.5, 3.4, 3.8),
(3, 8.2, 5.6, 6.6),
(4, 5.5, 4.4, 4.8),
(5, 6.6, 4.9, 5.5),
(6, 8.2, 6.1, 6.9),
(7, 7.9, 4.9, 6),
(8, 15, 8.4, 10.8),
(9, 7.1, 5, 5.8),
(10, 6.8, 4.8, 5.6),
(11, 11, 6.1, 7.9),
(12, 14.7, 8.1, 10.5),
(15, 6.3, 4.5, 5.2),
(16, 9.4, 5.7, 7.1),
(17, NULL, NULL, 7.1),
(18, NULL, NULL, 7),
(19, NULL, NULL, 9.9),
(20, NULL, NULL, 9.3),
(21, 13, 8, 9.9),
(22, 9.1, 5.4, 6.8),
(23, NULL, NULL, 2.1),
(25, NULL, NULL, 1.7),
(26, NULL, NULL, 1.1),
(27, NULL, NULL, 1.3),
(28, 5.8, 5.5, 5.7),
(29, 4.4, 4.5, 4.5),
(30, NULL, NULL, 2.8),
(31, 5.1, 4.9, 5),
(33, 5.5, 3.2, 4.1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `dimensiuni`
--

DROP TABLE IF EXISTS `dimensiuni`;
CREATE TABLE IF NOT EXISTS `dimensiuni` (
  `id_model` int NOT NULL,
  `lungime` int DEFAULT NULL,
  `latime` int DEFAULT NULL,
  `ampatament` int DEFAULT NULL,
  `garda_sol` int DEFAULT NULL,
  PRIMARY KEY (`id_model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `dimensiuni`
--

INSERT INTO `dimensiuni` (`id_model`, `lungime`, `latime`, `ampatament`, `garda_sol`) VALUES
(1, 4254, 1825, 2578, 140),
(2, 4456, 1796, 2637, 140),
(3, 4388, 1831, 2603, 170),
(4, 4204, 1759, 2578, 142),
(5, 4767, 1832, 2791, 145),
(6, 4765, 1820, 2709, 114),
(7, 4833, 1817, 2761, 139),
(8, 4689, 1829, 2680, 139),
(9, 4825, 1820, 2775, 105),
(10, 4835, 1825, 2775, 105),
(11, 5330, 1800, 3085, 293),
(12, 4698, 1814, 2685, 165),
(13, 4480, 1745, 2700, 140),
(14, 4605, 1845, 2660, 177),
(15, 4703, 1866, 2701, NULL),
(16, 4470, 1820, 2700, 140),
(17, 4355, 1805, 2700, 160),
(18, 4640, 1845, 2660, 175),
(19, 4630, 1781, 2700, 130),
(20, 5006, 1995, 2995, 208),
(21, 4979, 1964, 2960, 140),
(22, 4743, 1881, 2984, 130),
(23, 4962, 1966, 2900, 128),
(24, 4989, 1964, 2898, 128),
(25, 4965, 1970, 3000, 202),
(26, 3734, 1579, 2423, 151),
(27, 3653, 1643, 2300, 150),
(28, 4387, 1790, 2607, 135);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `dimensiuni_jante`
--

DROP TABLE IF EXISTS `dimensiuni_jante`;
CREATE TABLE IF NOT EXISTS `dimensiuni_jante` (
  `id_dimensiune` int NOT NULL,
  `id_janta` int NOT NULL,
  PRIMARY KEY (`id_dimensiune`,`id_janta`),
  KEY `id_janta` (`id_janta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `dimensiuni_jante`
--

INSERT INTO `dimensiuni_jante` (`id_dimensiune`, `id_janta`) VALUES
(1, 1),
(20, 1),
(23, 1),
(24, 1),
(23, 2),
(22, 3),
(25, 3),
(15, 4),
(21, 4),
(24, 4),
(20, 6),
(20, 7),
(20, 8),
(15, 9),
(28, 9),
(12, 10),
(14, 10),
(18, 10),
(10, 11),
(17, 11),
(18, 11),
(2, 12),
(11, 13),
(13, 14),
(27, 14),
(3, 15),
(5, 15),
(6, 15),
(7, 15),
(9, 15),
(10, 15),
(12, 15),
(16, 15),
(17, 15),
(27, 15),
(8, 16),
(10, 16),
(14, 16),
(4, 17),
(19, 17),
(27, 18),
(26, 19);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `dimensiuni_pneuri`
--

DROP TABLE IF EXISTS `dimensiuni_pneuri`;
CREATE TABLE IF NOT EXISTS `dimensiuni_pneuri` (
  `id_dimensiune` int NOT NULL,
  `id_pneu` int NOT NULL,
  PRIMARY KEY (`id_dimensiune`,`id_pneu`),
  KEY `id_pneu` (`id_pneu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `dimensiuni_pneuri`
--

INSERT INTO `dimensiuni_pneuri` (`id_dimensiune`, `id_pneu`) VALUES
(1, 1),
(2, 2),
(7, 2),
(16, 2),
(3, 3),
(11, 3),
(4, 4),
(13, 4),
(19, 4),
(5, 5),
(9, 5),
(10, 5),
(6, 6),
(10, 6),
(10, 9),
(17, 9),
(12, 10),
(17, 10),
(12, 11),
(14, 12),
(18, 12),
(15, 13),
(15, 14),
(18, 15),
(20, 16),
(20, 17),
(20, 18),
(20, 19),
(21, 20),
(22, 21),
(23, 21),
(24, 21),
(23, 22),
(24, 23),
(26, 25),
(27, 26),
(27, 27),
(27, 28),
(28, 29);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `informatii_modele`
--

DROP TABLE IF EXISTS `informatii_modele`;
CREATE TABLE IF NOT EXISTS `informatii_modele` (
  `denumire_model` varchar(50) NOT NULL,
  `generatie` varchar(50) NOT NULL,
  `cod_generatie` varchar(50) NOT NULL,
  `facelift` int NOT NULL,
  `numar_usi` int NOT NULL,
  `format_caroserie` varchar(50) NOT NULL,
  `an_incepere_prod` int NOT NULL,
  `an_sfarsit_prod` int DEFAULT NULL,
  PRIMARY KEY (`denumire_model`,`generatie`,`cod_generatie`,`facelift`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `informatii_modele`
--

INSERT INTO `informatii_modele` (`denumire_model`, `generatie`, `cod_generatie`, `facelift`, `numar_usi`, `format_caroserie`, `an_incepere_prod`, `an_sfarsit_prod`) VALUES
('A3', 'clubsport', '8P', 2008, 2, 'Hatchback', 2008, 2008),
('A3', 'sedan', '8V', 0, 4, 'Sedan', 2014, 2016),
('Astra', 'J Sports Tourer', 'necunoscuta', 2012, 5, 'Break', 2012, 2015),
('Aurion', 'I', 'XV40', 2009, 4, 'Sedan', 2009, 2012),
('Aurion', 'II', 'XV50', 2014, 4, 'Sedan', 2014, 2017),
('Carolla', 'XII', 'E210', 0, 4, 'Sedan', 2019, 2022),
('CR-V', 'VI', 'necunoscuta', 0, 4, 'SUV', 2023, NULL),
('e-tron GT', 'necunoscuta', 'necunoscuta', 0, 4, 'Grand Tourer', 2021, 2024),
('e:Ny1', 'necunoscuta', 'necunoscuta', 0, 4, 'SUV', 2023, NULL),
('Ford Mustang Mach-E', 'necunoscuta', 'necunoscuta', 0, 4, 'Coupe', 2020, NULL),
('Golf', 'V', 'necunoscuta', 0, 4, 'Hatchback', 2004, 2008),
('Hilux', 'Double Cab VIII', 'necunoscuta', 2017, 4, 'Pick-up', 2017, 2020),
('IONIQ', 'necunoscuta', 'necunoscuta', 0, 4, 'Liftback', 2017, 2019),
('iX', 'necunoscuta', 'i20 LCI', 2025, 4, 'SUV', 2025, NULL),
('Model S', 'necunoscuta', 'necunoscuta', 2016, 4, 'Liftback', 2016, 2017),
('Niro', 'I', 'necunoscuta', 0, 4, 'SUV', 2017, 2019),
('NX', 'i', 'AZ10', 2017, 4, 'SUV', 2017, 2021),
('Octavia', 'IV', 'necunoscuta', 0, 4, 'Liftback', 2021, 2023),
('Panda', 'III', '319', 2020, 4, 'Hatchback', 2020, NULL),
('Passat', 'necunoscuta', 'B6', 0, 4, 'Sedan', 2008, 2010),
('Passat', 'Variant', 'B8', 0, 5, 'Station wagon', 2015, 2018),
('Prius', 'III', 'ZVW30', 0, 4, 'Liftback', 2012, 2015),
('Q3', 'Q3', '8U', 2014, 4, 'SUV', 2014, 2018),
('Q8', 'necunoscuta', '4M', 0, 4, 'SUV', 2020, 2022),
('RAV4', 'IV', 'necunoscuta', 2015, 4, 'SUV', 2015, 2018),
('Spring', 'necunoscuta', 'necunoscuta', 2022, 4, 'Crossover', 2022, 2024),
('Superb', 'II Combi', 'necunoscuta', 2013, 4, 'Break', 2013, 2015),
('Taycan', 'necunoscuta', 'Y1A', 2024, 4, 'Sedan', 2024, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `jante`
--

DROP TABLE IF EXISTS `jante`;
CREATE TABLE IF NOT EXISTS `jante` (
  `id_janta` int NOT NULL AUTO_INCREMENT,
  `latime_janta_inch` decimal(3,1) NOT NULL,
  `profil_buza` varchar(2) NOT NULL DEFAULT 'J',
  `diametru_janta_inch` int NOT NULL,
  PRIMARY KEY (`id_janta`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `jante`
--

INSERT INTO `jante` (`id_janta`, `latime_janta_inch`, `profil_buza`, `diametru_janta_inch`) VALUES
(1, 9.0, 'J', 20),
(2, 9.0, 'J', 21),
(3, 8.0, 'J', 20),
(4, 8.0, 'J', 19),
(5, 8.5, 'J', 20),
(6, 8.5, 'J', 19),
(7, 10.0, 'J', 21),
(8, 10.0, 'J', 22),
(9, 7.0, 'J', 18),
(10, 7.0, 'J', 17),
(11, 7.5, 'J', 18),
(12, 7.0, 'J', 16),
(13, 6.0, 'J', 16),
(14, 6.0, 'J', 15),
(15, 6.5, 'J', 16),
(16, 6.5, 'J', 17),
(17, 6.5, 'J', 15),
(18, 5.5, 'J', 14),
(19, 4.5, 'J', 14),
(20, 7.5, 'J', 19);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `legatura_modele`
--

DROP TABLE IF EXISTS `legatura_modele`;
CREATE TABLE IF NOT EXISTS `legatura_modele` (
  `id_model` int NOT NULL AUTO_INCREMENT,
  `denumire_marca` varchar(50) NOT NULL,
  `denumire_model` varchar(50) NOT NULL,
  `generatie` varchar(50) DEFAULT NULL,
  `cod_generatie` varchar(50) DEFAULT NULL,
  `facelift` int DEFAULT NULL,
  PRIMARY KEY (`id_model`),
  UNIQUE KEY `denumire_marca` (`denumire_marca`,`denumire_model`,`cod_generatie`,`facelift`),
  UNIQUE KEY `uniq_model_generatie` (`denumire_model`,`generatie`,`cod_generatie`,`facelift`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `legatura_modele`
--

INSERT INTO `legatura_modele` (`id_model`, `denumire_marca`, `denumire_model`, `generatie`, `cod_generatie`, `facelift`) VALUES
(1, 'Audi', 'A3', 'clubsport', '8P', 2008),
(2, 'Audi', 'A3', 'sedan', '8V', 0),
(3, 'Audi', 'Q3', 'Q3', '8U', 2014),
(4, 'Volkswagen', 'Golf', 'V', 'necunoscuta', 0),
(5, 'Volkswagen', 'Passat', 'Variant', 'B8', 0),
(6, 'Volkswagen', 'Passat', 'necunoscuta', 'B6', 0),
(7, 'Skoda', 'Superb', 'II Combi', 'necunoscuta', 2013),
(8, 'Skoda', 'Octavia', 'IV', 'necunoscuta', 0),
(9, 'Toyota', 'Aurion', 'I', 'XV40', 2009),
(10, 'Toyota', 'Aurion', 'II', 'XV50', 2014),
(11, 'Toyota', 'Hilux', 'Double Cab VIII', 'necunoscuta', 2017),
(12, 'Opel', 'Astra', 'J Sports Tourer', 'necunoscuta', 2012),
(13, 'Toyota', 'Prius', 'III', 'ZVW30', 0),
(14, 'Toyota', 'RAV4', 'IV', 'necunoscuta', 2015),
(15, 'Honda', 'CR-V', 'VI', 'necunoscuta', 0),
(16, 'Hyundai', 'IONIQ', 'necunoscuta', 'necunoscuta', 0),
(17, 'Kia', 'Niro', 'I', 'necunoscuta', 0),
(18, 'Lexus', 'NX', 'i', 'AZ10', 2017),
(19, 'Toyota', 'Carolla', 'XII', 'E210', 0),
(20, 'Audi', 'Q8', 'necunoscuta', '4M', 0),
(21, 'Tesla', 'Model S', 'necunoscuta', 'necunoscuta', 2016),
(22, 'Ford', 'Ford Mustang Mach-E', 'necunoscuta', 'necunoscuta', 0),
(23, 'Porsche', 'Taycan', 'necunoscuta', 'Y1A', 2024),
(24, 'Audi', 'e-tron GT', 'necunoscuta', 'necunoscuta', 0),
(25, 'BMW', 'iX', 'necunoscuta', 'i20 LCI', 2025),
(26, 'Dacia', 'Spring', 'necunoscuta', 'necunoscuta', 2022),
(27, 'Fiat', 'Panda', 'III', '319', 2020),
(28, 'Honda', 'e:Ny1', 'necunoscuta', 'necunoscuta', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `marci`
--

DROP TABLE IF EXISTS `marci`;
CREATE TABLE IF NOT EXISTS `marci` (
  `denumire_marca` varchar(50) NOT NULL,
  `tara_origine` varchar(30) DEFAULT NULL,
  `an_fondare` int DEFAULT NULL,
  PRIMARY KEY (`denumire_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `marci`
--

INSERT INTO `marci` (`denumire_marca`, `tara_origine`, `an_fondare`) VALUES
('Audi', 'Germania', 1909),
('BMW', 'Germania', 1916),
('Citroen', 'Franta', 1919),
('Dacia', 'Romania', 1966),
('Fiat', 'Italia', 1899),
('Ford', 'SUA', 1903),
('Honda', 'Japonia', 1948),
('Hyundai', 'Coreea de Sud', 1967),
('Jaguar', 'Marea Britanie', 1922),
('Kia', 'Coreea de Sud', 1944),
('Land Rover', 'Marea Britanie', 1948),
('Lexus', 'Japonia', 1989),
('Mazda', 'Japonia', 1920),
('Mercedes-Benz', 'Germania', 1926),
('Nissan', 'Japonia', 1933),
('Opel', 'Germania', 1862),
('Porsche', 'Germania', 1931),
('Renault', 'Franta', 1899),
('Skoda', 'Cehia', 1895),
('Subaru', 'Japonia', 1953),
('Tesla', 'SUA', 2003),
('Toyota', 'Japonia', 1937),
('Volkswagen', 'Germania', 1937);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `modele_transmisii`
--

DROP TABLE IF EXISTS `modele_transmisii`;
CREATE TABLE IF NOT EXISTS `modele_transmisii` (
  `id_model` int NOT NULL,
  `id_transmisie` int NOT NULL,
  PRIMARY KEY (`id_model`,`id_transmisie`),
  KEY `id_transmisie` (`id_transmisie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `modele_transmisii`
--

INSERT INTO `modele_transmisii` (`id_model`, `id_transmisie`) VALUES
(1, 1),
(4, 1),
(2, 2),
(3, 2),
(6, 2),
(27, 2),
(2, 3),
(6, 3),
(15, 3),
(3, 4),
(8, 4),
(16, 4),
(5, 5),
(7, 5),
(8, 5),
(17, 5),
(4, 6),
(7, 6),
(9, 6),
(10, 6),
(12, 6),
(16, 6),
(17, 6),
(18, 6),
(11, 7),
(19, 7),
(13, 8),
(14, 8),
(15, 8),
(20, 8),
(14, 9),
(18, 9),
(19, 10),
(20, 11),
(21, 12),
(22, 12),
(25, 12),
(23, 13),
(24, 13),
(26, 14),
(28, 14);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `motoare_electrice`
--

DROP TABLE IF EXISTS `motoare_electrice`;
CREATE TABLE IF NOT EXISTS `motoare_electrice` (
  `id_motor_electric` int NOT NULL AUTO_INCREMENT,
  `id_model` int NOT NULL,
  `id_baterie` int NOT NULL,
  `id_transmisie` int DEFAULT NULL,
  `cuplu_motor` int DEFAULT NULL,
  `putere` int DEFAULT NULL,
  `locatie_motor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tip_motor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_motor_electric`),
  KEY `id_model` (`id_model`),
  KEY `id_baterie` (`id_baterie`),
  KEY `id_transmisie` (`id_transmisie`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `motoare_electrice`
--

INSERT INTO `motoare_electrice` (`id_motor_electric`, `id_model`, `id_baterie`, `id_transmisie`, `cuplu_motor`, `putere`, `locatie_motor`, `tip_motor`) VALUES
(1, 13, 1, 8, 207, 82, 'Integrat în transmisie', 'Sincron'),
(2, 14, 2, 8, 270, 143, 'Integrat în transmisie', 'Sincron'),
(3, 15, 3, 8, 335, 184, 'Față, transversală', 'Sincron'),
(4, 16, 4, 6, 170, 61, 'Între motorul cu ardere și transmisie', NULL),
(5, 17, 5, 6, 170, 61, 'Între motorul cu ardere și transmisie', NULL),
(6, 18, 6, 9, 279, 143, 'Integrat în transmisie', 'Sincron'),
(7, 18, 6, 9, 139, 68, 'Axa spate, transversală', 'Sincron'),
(8, 19, 7, 10, 163, 72, 'Integrat în transmisie', 'Sincron'),
(9, 20, 8, 11, 400, 136, 'Între motorul cu ardere și transmisie', NULL),
(10, 21, 9, 12, 650, 503, 'Axa spate, transversală', NULL),
(11, 21, 9, 12, 330, 259, 'Axa fata, transversala', NULL),
(12, 22, 10, 12, NULL, 487, 'Axa spate, transversală', NULL),
(13, 22, 10, 12, NULL, NULL, 'Axa fata, transversala', NULL),
(14, 23, 11, 13, NULL, NULL, 'Axa spate, transversală', 'Sincron'),
(15, 23, 11, 13, NULL, 884, 'Axa fata, transversala', 'Sincron'),
(16, 24, 12, 13, NULL, 238, 'Axa fata, transversala', 'Sincron'),
(17, 24, 12, 13, NULL, 435, 'Axa spate, transversală', 'Sincron'),
(18, 25, 13, 12, 365, 258, 'Axa fata, transversala', 'Sincron'),
(19, 25, 13, 12, 400, 272, 'Axa spate, transversală', 'Sincron'),
(20, 26, 14, 14, 125, 45, 'Puntea din fata', NULL),
(21, 27, 15, 2, NULL, 5, 'Față, transversală', NULL),
(22, 28, 16, 14, 310, 204, 'Integrat în transmisie', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `motoare_termice`
--

DROP TABLE IF EXISTS `motoare_termice`;
CREATE TABLE IF NOT EXISTS `motoare_termice` (
  `id_motor` int NOT NULL AUTO_INCREMENT,
  `id_model` int NOT NULL,
  `id_transmisie` int DEFAULT NULL,
  `cod_motor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `capacitate_ulei_motor` double DEFAULT NULL,
  `id_volum_rezervor_combustibil` int DEFAULT NULL,
  PRIMARY KEY (`id_motor`),
  KEY `id_model` (`id_model`),
  KEY `id_transmisie` (`id_transmisie`),
  KEY `fk_volum` (`id_volum_rezervor_combustibil`),
  KEY `cod_motor` (`cod_motor`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `motoare_termice`
--

INSERT INTO `motoare_termice` (`id_motor`, `id_model`, `id_transmisie`, `cod_motor`, `capacitate_ulei_motor`, `id_volum_rezervor_combustibil`) VALUES
(1, 1, 1, 'CBBB', 4.5, 1),
(2, 2, 2, 'CRKB', 5.2, 2),
(3, 2, 3, 'CJSB', 5.2, 3),
(4, 2, 3, 'CUNA', 4.7, 3),
(5, 3, 2, 'CZDA', 4, 4),
(6, 3, 4, 'CULC', 5.7, 4),
(7, 4, 6, 'BKD', 3.8, 3),
(8, 4, 1, 'CBRA', 5.5, 1),
(9, 5, 5, 'CJSA', 5.2, 5),
(10, 5, 5, 'DADA', 4.3, 6),
(11, 6, 2, 'BPY', 4.6, 7),
(12, 6, 3, 'BWS', 5.5, 8),
(15, 7, 6, 'CFFB', 4.3, 1),
(16, 7, 5, 'CDAA', 4.6, 1),
(17, 8, 4, 'DNNA', 5.7, 3),
(18, 8, 5, 'DNPA', 5.7, 2),
(19, 9, 6, '2GR-FE', 6.1, 7),
(20, 10, 6, '2GR-FE', 6.1, 7),
(21, 11, 7, '2TR-FE', 5.6, 9),
(22, 12, 6, 'A14NET', 4, 10),
(23, 13, 8, '2ZR-FXE', 4.2, 11),
(25, 15, 8, 'LFB16', NULL, 12),
(26, 16, 6, 'G4LE', 3.8, 13),
(27, 17, 6, 'G4LE', 3.8, 13),
(28, 18, 9, '2AR-FXE', 4.4, 10),
(29, 19, 10, '22ZR-FXE', 4.2, 13),
(30, 20, 11, 'DCBE', 7.2, NULL),
(31, 14, 9, '2AR-FXE', 4.4, NULL),
(33, 27, 2, '46341162', 2.5, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pneuri`
--

DROP TABLE IF EXISTS `pneuri`;
CREATE TABLE IF NOT EXISTS `pneuri` (
  `id_pneu` int NOT NULL AUTO_INCREMENT,
  `latime_mm` int NOT NULL,
  `raport_inaltime` int NOT NULL,
  `tip_constructie` varchar(5) NOT NULL,
  PRIMARY KEY (`id_pneu`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `pneuri`
--

INSERT INTO `pneuri` (`id_pneu`, `latime_mm`, `raport_inaltime`, `tip_constructie`) VALUES
(1, 265, 30, 'R'),
(2, 205, 55, 'R'),
(3, 215, 65, 'R'),
(4, 195, 65, 'R'),
(5, 215, 60, 'R'),
(6, 215, 55, 'R'),
(9, 225, 45, 'R'),
(10, 205, 60, 'R'),
(11, 215, 50, 'R'),
(12, 225, 65, 'R'),
(13, 235, 60, 'R'),
(14, 235, 55, 'R'),
(15, 225, 60, 'R'),
(16, 265, 55, 'R'),
(17, 275, 50, 'R'),
(18, 285, 45, 'R'),
(19, 285, 40, 'R'),
(20, 245, 55, 'R'),
(21, 245, 45, 'R'),
(22, 245, 40, 'R'),
(23, 225, 55, 'R'),
(25, 165, 70, 'R'),
(26, 175, 65, 'R'),
(27, 185, 55, 'R'),
(28, 195, 45, 'R'),
(29, 225, 50, 'R');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `specificatii`
--

DROP TABLE IF EXISTS `specificatii`;
CREATE TABLE IF NOT EXISTS `specificatii` (
  `id_model` int NOT NULL,
  `nr_scaune` int NOT NULL,
  `greutate_redusa` int DEFAULT NULL,
  `greutate_maxima` int DEFAULT NULL,
  `viteza_maxima` int DEFAULT NULL,
  `tip_servodirectie` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vol_min_portbagaj` int DEFAULT NULL,
  `vol_max_portbagaj` int DEFAULT NULL,
  PRIMARY KEY (`id_model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `specificatii`
--

INSERT INTO `specificatii` (`id_model`, `nr_scaune`, `greutate_redusa`, `greutate_maxima`, `viteza_maxima`, `tip_servodirectie`, `vol_min_portbagaj`, `vol_max_portbagaj`) VALUES
(1, 5, 1490, 2035, 240, 'electrica', 350, 1150),
(2, 5, 1270, 1820, 203, 'electrica', 425, 880),
(3, 5, 1385, 1985, 204, 'electrică', 460, 1365),
(4, 5, 1351, 1900, 203, 'electrica', 350, 1305),
(5, 5, 1430, 2090, 230, 'electrica', 650, 1780),
(6, 5, 1370, 2050, 235, 'cremaliera si pinion de directie', 565, 1091),
(7, 5, 1631, 2139, 210, 'electrica', 633, 1865),
(8, 5, 1620, 2200, 229, 'electrica', 600, 1555),
(9, 5, 1540, NULL, 230, 'hidraulica', NULL, NULL),
(10, 5, 1505, 2100, 230, 'electrica', NULL, NULL),
(11, 5, 1745, 2780, 175, 'hidraulica', NULL, NULL),
(12, 5, 1370, 2010, 198, 'electrica', 500, 1550),
(13, 5, 1425, 1840, 180, 'electrica', 443, 1543),
(14, 4, 1700, 2270, 180, 'electrica', 501, 1633),
(15, 5, 1900, NULL, 193, 'electrica', 635, NULL),
(16, 5, 1505, 1970, 178, 'electrica', 341, 1401),
(17, 5, 1576, 2000, 172, 'electrica', 324, 1322),
(18, 5, 1860, 2395, 180, 'electrica', 555, 1600),
(19, 5, 1383, NULL, 180, 'electrica', 371, NULL),
(20, 5, 2440, 3055, 240, 'electrica', 505, 1625),
(21, 7, 2196, 2670, 250, 'electrica', 745, 1645),
(22, 5, 2273, 2717, 200, 'electrica', 402, 1420),
(23, 5, 2290, 2880, 260, 'electrica', 366, NULL),
(24, 4, 2276, 2840, 245, 'electrica', 405, NULL),
(25, 5, 2450, 3100, 200, 'electrica', 500, 1750),
(26, 4, 970, 1300, 125, 'electrica', 290, 631),
(27, 5, 980, 1440, 164, 'electrica', 225, 870),
(28, 5, 1730, 2080, 160, NULL, 361, 1176);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `specificatii_motoare_termice`
--

DROP TABLE IF EXISTS `specificatii_motoare_termice`;
CREATE TABLE IF NOT EXISTS `specificatii_motoare_termice` (
  `cod_motor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `putere_motor` int DEFAULT NULL,
  `tip_carburant` varchar(40) DEFAULT NULL,
  `standard_ecologic` varchar(20) DEFAULT 'Euro ',
  `numar_cilindri` int DEFAULT '4',
  `distributie` varchar(30) DEFAULT 'lant de distributie',
  PRIMARY KEY (`cod_motor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `specificatii_motoare_termice`
--

INSERT INTO `specificatii_motoare_termice` (`cod_motor`, `putere_motor`, `tip_carburant`, `standard_ecologic`, `numar_cilindri`, `distributie`) VALUES
('22ZR-FXE', 121, 'benzina', 'California LEV III', 4, 'lant de distributie'),
('2AR-FXE', 155, 'benzina', 'Euro 6', 4, 'lant de distributie'),
('2GR-FE', 272, 'benzina', 'Euro 4', 6, 'lant de distributie'),
('2TR-FE', 166, 'benzina', 'Euro 6', 4, 'curea de distributie'),
('2ZR-FXE', 99, 'benzina', 'Euro 5', 4, 'lant de distributie'),
('46341162', 70, 'benzina', 'Euro 6', 3, 'lant de distributie'),
('A14NET', 140, 'benzina', 'Euro 5', 4, 'lant de distributie'),
('BKD', 140, 'diesel', 'Euro 4', 4, 'lant de distributie'),
('BPY', 200, 'benzina', 'Euro 4', 4, 'lant de distributie'),
('BWS', 300, 'benzina', 'Euro 4', 6, 'lant de distributie'),
('CBBB', 224, 'diesel', 'Euro 5', 4, 'lant de distributie'),
('CBRA', 250, 'benzina', 'Euro 4', 4, 'lant de distributie'),
('CDAA', 160, 'benzina', 'Euro 5', 4, 'lant de distributie'),
('CFFB', 140, 'diesel', 'Euro 5', 4, 'curea de distributie'),
('CJSA', 180, 'diesel', 'Euro 6', 4, 'lant de distributie'),
('CJSB', 180, 'diesel', 'Euro 6', 4, 'lant de distributie'),
('CRKB', 110, 'diesel', 'Euro 6', 4, 'curea de distributie'),
('CULC', 220, 'diesel', 'Euro 6', 4, 'curea de distributie'),
('CUNA', 184, 'diesel', 'Euro 6', 4, 'curea de distributie'),
('CZDA', 150, 'benzina', 'Euro 6', 4, 'curea de distributie'),
('DADA', 150, 'benzina', 'Euro 6', 4, 'curea de distributie'),
('DCBE', 340, 'benzina', 'Euro 6', 6, 'lant de distributie'),
('DNNA', 190, 'benzina', 'Euro 6', 4, 'lant de distributie'),
('DNPA', 245, 'benzina', 'Euro 6', 4, 'lant de distributie'),
('G4LE', 105, 'benzina', 'Euro 6', 4, 'lant de distributie'),
('LFB16', 150, 'benzina', 'China VI', 4, 'lant de distributie');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `specificatii_tip_combustibil`
--

DROP TABLE IF EXISTS `specificatii_tip_combustibil`;
CREATE TABLE IF NOT EXISTS `specificatii_tip_combustibil` (
  `id_specificatie` int NOT NULL,
  `id_tip` int NOT NULL,
  PRIMARY KEY (`id_specificatie`,`id_tip`),
  KEY `id_tip` (`id_tip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `specificatii_tip_combustibil`
--

INSERT INTO `specificatii_tip_combustibil` (`id_specificatie`, `id_tip`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(27, 1),
(13, 2),
(15, 2),
(16, 2),
(17, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(28, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tipuri_combustibil`
--

DROP TABLE IF EXISTS `tipuri_combustibil`;
CREATE TABLE IF NOT EXISTS `tipuri_combustibil` (
  `id_tip` int NOT NULL AUTO_INCREMENT,
  `nume_tip` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tip`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `tipuri_combustibil`
--

INSERT INTO `tipuri_combustibil` (`id_tip`, `nume_tip`) VALUES
(1, 'carburant'),
(2, 'curent electric');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `transmisii`
--

DROP TABLE IF EXISTS `transmisii`;
CREATE TABLE IF NOT EXISTS `transmisii` (
  `id_transmisie` int NOT NULL AUTO_INCREMENT,
  `tractiune` varchar(50) NOT NULL,
  `tip_cutie_viteze` varchar(30) NOT NULL,
  `numar_trepte_viteza` int DEFAULT NULL,
  PRIMARY KEY (`id_transmisie`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `transmisii`
--

INSERT INTO `transmisii` (`id_transmisie`, `tractiune`, `tip_cutie_viteze`, `numar_trepte_viteza`) VALUES
(1, 'integrală', 'manuala', 6),
(2, 'fata', 'manuala', 6),
(3, 'integrala', 'automata', 6),
(4, 'integrala', 'automata', 7),
(5, 'fata', 'automata', 7),
(6, 'fata', 'automata', 6),
(7, 'spate', 'manuala', 5),
(8, 'fata', 'automata e-CVT', NULL),
(9, 'integrala', 'automata e-CVT', NULL),
(10, 'fata', 'automata CVTi', NULL),
(11, 'integrala', 'automata', 8),
(12, 'integrala', 'automata', 1),
(13, 'integrala', 'automata', 2),
(14, 'fata', 'automata', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `volume_rezervor_combustibil`
--

DROP TABLE IF EXISTS `volume_rezervor_combustibil`;
CREATE TABLE IF NOT EXISTS `volume_rezervor_combustibil` (
  `id_volum` int NOT NULL AUTO_INCREMENT,
  `volum` int NOT NULL,
  PRIMARY KEY (`id_volum`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `volume_rezervor_combustibil`
--

INSERT INTO `volume_rezervor_combustibil` (`id_volum`, `volum`) VALUES
(1, 60),
(2, 50),
(3, 55),
(4, 64),
(5, 66),
(6, 59),
(7, 70),
(8, 68),
(9, 80),
(10, 56),
(11, 45),
(12, 46),
(13, 43);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `consumuri`
--
ALTER TABLE `consumuri`
  ADD CONSTRAINT `consumuri_ibfk_1` FOREIGN KEY (`id_motor`) REFERENCES `motoare_termice` (`id_motor`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `dimensiuni`
--
ALTER TABLE `dimensiuni`
  ADD CONSTRAINT `dimensiuni_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `specificatii` (`id_model`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `dimensiuni_jante`
--
ALTER TABLE `dimensiuni_jante`
  ADD CONSTRAINT `dimensiuni_jante_ibfk_1` FOREIGN KEY (`id_dimensiune`) REFERENCES `dimensiuni` (`id_model`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dimensiuni_jante_ibfk_2` FOREIGN KEY (`id_janta`) REFERENCES `jante` (`id_janta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `dimensiuni_pneuri`
--
ALTER TABLE `dimensiuni_pneuri`
  ADD CONSTRAINT `dimensiuni_pneuri_ibfk_1` FOREIGN KEY (`id_dimensiune`) REFERENCES `dimensiuni` (`id_model`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dimensiuni_pneuri_ibfk_2` FOREIGN KEY (`id_pneu`) REFERENCES `pneuri` (`id_pneu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `informatii_modele`
--
ALTER TABLE `informatii_modele`
  ADD CONSTRAINT `fk_legatura_modele` FOREIGN KEY (`denumire_model`,`generatie`,`cod_generatie`,`facelift`) REFERENCES `legatura_modele` (`denumire_model`, `generatie`, `cod_generatie`, `facelift`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `legatura_modele`
--
ALTER TABLE `legatura_modele`
  ADD CONSTRAINT `legatura_modele_ibfk_1` FOREIGN KEY (`denumire_marca`) REFERENCES `marci` (`denumire_marca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `modele_transmisii`
--
ALTER TABLE `modele_transmisii`
  ADD CONSTRAINT `modele_transmisii_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `legatura_modele` (`id_model`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modele_transmisii_ibfk_2` FOREIGN KEY (`id_transmisie`) REFERENCES `transmisii` (`id_transmisie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `motoare_electrice`
--
ALTER TABLE `motoare_electrice`
  ADD CONSTRAINT `motoare_electrice_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `legatura_modele` (`id_model`) ON DELETE CASCADE,
  ADD CONSTRAINT `motoare_electrice_ibfk_2` FOREIGN KEY (`id_baterie`) REFERENCES `baterii` (`id_baterie`) ON DELETE CASCADE,
  ADD CONSTRAINT `motoare_electrice_ibfk_3` FOREIGN KEY (`id_transmisie`) REFERENCES `transmisii` (`id_transmisie`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `motoare_termice`
--
ALTER TABLE `motoare_termice`
  ADD CONSTRAINT `fk_volum` FOREIGN KEY (`id_volum_rezervor_combustibil`) REFERENCES `volume_rezervor_combustibil` (`id_volum`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `motoare_termice_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `legatura_modele` (`id_model`) ON DELETE CASCADE,
  ADD CONSTRAINT `motoare_termice_ibfk_2` FOREIGN KEY (`id_transmisie`) REFERENCES `transmisii` (`id_transmisie`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `motoare_termice_ibfk_3` FOREIGN KEY (`cod_motor`) REFERENCES `specificatii_motoare_termice` (`cod_motor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `specificatii`
--
ALTER TABLE `specificatii`
  ADD CONSTRAINT `specificatii_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `legatura_modele` (`id_model`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `specificatii_tip_combustibil`
--
ALTER TABLE `specificatii_tip_combustibil`
  ADD CONSTRAINT `specificatii_tip_combustibil_ibfk_1` FOREIGN KEY (`id_specificatie`) REFERENCES `specificatii` (`id_model`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specificatii_tip_combustibil_ibfk_2` FOREIGN KEY (`id_tip`) REFERENCES `tipuri_combustibil` (`id_tip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
