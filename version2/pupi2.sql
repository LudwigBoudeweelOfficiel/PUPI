-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 fév. 2022 à 14:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pupi2`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `IdReservation` int(11) NOT NULL AUTO_INCREMENT,
  `Salle` int(11) NOT NULL,
  `Debut` time NOT NULL,
  `Fin` time NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prof` varchar(255) DEFAULT NULL,
  `couleur` varchar(255) DEFAULT NULL,
  `etatreservation` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`IdReservation`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`IdReservation`, `Salle`, `Debut`, `Fin`, `type`, `prof`, `couleur`, `etatreservation`, `Date`) VALUES
(26, 2, '08:00:00', '13:30:00', 'RESERVEE', 'MME LECOUFFE', 'red', 'RESERVEE', '2022-02-04'),
(28, 2, '15:30:00', '16:30:00', 'RESERVEE', 'MME ENGRAND', 'red', 'RESERVEE', '2022-02-04'),
(27, 2, '13:30:00', '15:30:00', 'RESERVEE', 'MME DETHOOR', 'red', 'RESERVEE', '2022-02-04');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `IdSalle` int(11) NOT NULL AUTO_INCREMENT,
  `Etat` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdSalle`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`IdSalle`, `Etat`, `nom`) VALUES
(1, 1, 'Pupitre 1'),
(2, 1, 'Pupitre 2'),
(3, 1, 'Techno Plat'),
(4, 1, 'BIM GC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
