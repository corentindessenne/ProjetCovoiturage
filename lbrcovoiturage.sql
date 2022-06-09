-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour lbrcovoiturage
CREATE DATABASE IF NOT EXISTS `lbrcovoiturage` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `lbrcovoiturage`;

-- Listage de la structure de la table lbrcovoiturage. compte
CREATE TABLE IF NOT EXISTS `compte` (
  `IdCompte` int(10) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(40) DEFAULT NULL,
  `Prenom` varchar(40) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `motDePasse` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `PhotoProfil` mediumblob,
  `Description` text,
  `isVerif` tinyint(1) NOT NULL DEFAULT '0',
  `DateCreation` date DEFAULT NULL,
  PRIMARY KEY (`IdCompte`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table lbrcovoiturage.compte : ~2 rows (environ)
/*!40000 ALTER TABLE `compte` DISABLE KEYS */;
REPLACE INTO `compte` (`IdCompte`, `Nom`, `Prenom`, `Email`, `telephone`, `motDePasse`, `isAdmin`, `PhotoProfil`, `Description`, `isVerif`, `DateCreation`) VALUES
	(1, 'THUILLIER', 'Maxime', 'tuile0834@gmail.com', 612345678, 'ff', 0, NULL, 'test', 0, '2001-06-22'),
	(2, 'Mareel', 'Adrien', 'mareel.adri@yahoo.com', 632618822, '$2y$10$pieQUxNFR3bSoDW49phK8OAgxaz6.iwSxUHTyggcVWAW7mxZFVWry', 0, _binary 0x2E6A7067, '', 0, '2022-06-08');
/*!40000 ALTER TABLE `compte` ENABLE KEYS */;

-- Listage de la structure de la table lbrcovoiturage. edition
CREATE TABLE IF NOT EXISTS `edition` (
  `AnnéeEdition` int(10) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `HeureDebut` time(4) NOT NULL,
  `HeureFin` time(4) NOT NULL,
  `Lieu` varchar(4) NOT NULL,
  `Description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table lbrcovoiturage.edition : ~0 rows (environ)
/*!40000 ALTER TABLE `edition` DISABLE KEYS */;
/*!40000 ALTER TABLE `edition` ENABLE KEYS */;

-- Listage de la structure de la table lbrcovoiturage. trajet
CREATE TABLE IF NOT EXISTS `trajet` (
  `IdTrajet` int(10) NOT NULL AUTO_INCREMENT,
  `TypeTrajet` varchar(50) NOT NULL,
  `isDemande` tinyint(1) DEFAULT NULL,
  `Description` varchar(255) NOT NULL DEFAULT '',
  `LieuDepart` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `AdresseDepart` varchar(150) NOT NULL DEFAULT '21 Rue de Linselles',
  `LongitudeDepart` float DEFAULT '3.1134',
  `LatitudeDepart` float NOT NULL DEFAULT '50.7364',
  `LieuArrivee` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `AdresseArrivee` varchar(150) NOT NULL DEFAULT '21 Rue de Linselles',
  `LongitudeArrivee` float NOT NULL DEFAULT '3.1134',
  `LatitudeArrivee` float NOT NULL DEFAULT '50.7364',
  `DateDepart` date NOT NULL,
  `DateArrivee` date DEFAULT NULL,
  `HeureDepart` time(4) DEFAULT NULL,
  `HeureArrivee` time(4) DEFAULT NULL,
  `DateAjout` date NOT NULL,
  `NbPassagers` int(10) NOT NULL,
  `PlacesRestantes` int(10) NOT NULL DEFAULT '0',
  `Prix` int(10) NOT NULL DEFAULT '0',
  `DisplayTel` tinyint(1) DEFAULT NULL,
  `AnneeEdition` int(10) NOT NULL,
  `IdCompte` int(10) NOT NULL,
  PRIMARY KEY (`IdTrajet`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table lbrcovoiturage.trajet : ~4 rows (environ)
/*!40000 ALTER TABLE `trajet` DISABLE KEYS */;
REPLACE INTO `trajet` (`IdTrajet`, `TypeTrajet`, `isDemande`, `Description`, `LieuDepart`, `AdresseDepart`, `LongitudeDepart`, `LatitudeDepart`, `LieuArrivee`, `AdresseArrivee`, `LongitudeArrivee`, `LatitudeArrivee`, `DateDepart`, `DateArrivee`, `HeureDepart`, `HeureArrivee`, `DateAjout`, `NbPassagers`, `PlacesRestantes`, `Prix`, `DisplayTel`, `AnneeEdition`, `IdCompte`) VALUES
	(1, 'Aller', 0, '', 'Marcq-en-Baroeul', '15 Avenue Foch,Marcq-en-Baroeul', 3.10186, 50.6675, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '16:00:00.0000', '16:20:00.0000', '2022-06-07', 4, 4, 3, NULL, 2022, 1),
	(2, 'Aller', 0, '', 'Lille', '21 Rue de Linselles,', 3.05726, 50.6292, 'Wervicq-Sud', '21 Rue de Linselles,', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '16:47:00.0000', '11:32:46.0000', '2030-05-22', 5, 5, 11, 0, 2022, 4),
	(3, 'Aller', 0, '', 'Charleville-Mézières', '06 place de la gare', 4.7261, 49.7621, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '14:34:00.0000', '11:32:47.0000', '2002-06-22', 3, 3, 25, 0, 2022, 3),
	(4, 'Aller', 0, '', 'Paris', 'Place de l\'étoile', 2.35222, 48.8566, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '15:11:00.0000', '14:17:14.0000', '2022-06-07', 5, 5, 5, 0, 2022, 2);
/*!40000 ALTER TABLE `trajet` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
