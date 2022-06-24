-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 juin 2022 à 13:50
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lbrcovoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `IdCompte` int(10) NOT NULL,
  `Nom` varchar(40) DEFAULT NULL,
  `Prenom` varchar(40) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `motDePasse` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `PhotoProfil` mediumblob DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `isVerif` tinyint(1) NOT NULL DEFAULT 0,
  `DateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  `lien_verif_mail` varchar(255) NOT NULL,
  `date_verif_mail` timestamp NULL DEFAULT NULL,
  `token_reset_password` varchar(255) NOT NULL,
  `expiration_reset_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`IdCompte`, `Nom`, `Prenom`, `Email`, `telephone`, `motDePasse`, `isAdmin`, `PhotoProfil`, `Description`, `isVerif`, `DateCreation`, `lien_verif_mail`, `date_verif_mail`, `token_reset_password`, `expiration_reset_password`) VALUES
(40, 'Mareel', 'Adrien', 'mareel.adri@yahoo.com', 632618822, '$2y$10$agA.fswt33h9HTxJWa.kj.A627OP0y.1M1awm3/olXfyiTVLgvsZe', 0, 0x34302e6a7067, 'yes', 1, '2022-06-21 22:00:00', '87f699e611b99c979a19366522c75dc4', '2022-06-21 22:00:00', '', ''),
(41, 'Mareel', 'Adri', 'mareel.adri1@gmail.com', 632618822, '$2y$10$SlF73NrPRipXo6Ht7cd70ejoDkg5mpnq0O1sgXLBU7XYRq1/HhyEi', 0, 0x34312e6a7067, NULL, 1, '2022-06-22 22:00:00', 'b9cf2faf6561d1870f0069da73d7a685', '2022-06-22 22:00:00', '', ''),
(42, 'Mar', 'Adr', 'adrien.mareel@student.junia.com', 632618822, '$2y$10$CD.cXTTv35UOE9VNR0BouegXOZDyjJ1JiTAj3sDGx1r0eI7TBCV8y', 0, NULL, NULL, 1, '2022-06-22 22:00:00', '7b268df33abbe2844472ed8e02c7d24c', '2022-06-22 22:00:00', '', ''),
(43, 'zhou', 'lucas', 'lucz1640@gmail.com', 712131415, '$2y$10$Invpmttf4td3SIYPuLpAZO6kb2qV8mDrFh9x3lOcW1N1aXN4e5zh6', 0, NULL, NULL, 1, '2022-06-23 22:00:00', '3eaf2674ce972b81a673dd6f23699343', '2022-06-23 22:00:00', '', ''),
(44, 'Zou', 'Luka', 'zhou.lucas1@gmail.com', 812131415, '$2y$10$SozT0qJHbYosjjleKCDu9OINYl9C7/dzEnFW13jD8/oIaFhYHLgOq', 0, NULL, NULL, 1, '2022-06-23 22:00:00', 'ee32c59c70e8377a76d20925dea5d491', '2022-06-23 22:00:00', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

CREATE TABLE `edition` (
  `AnnéeEdition` int(10) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `HeureDebut` time(4) NOT NULL,
  `HeureFin` time(4) NOT NULL,
  `Lieu` varchar(4) NOT NULL,
  `Description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `proposition`
--

CREATE TABLE `proposition` (
  `idProposition` int(11) NOT NULL,
  `idTrajet` int(11) NOT NULL,
  `typeTrajet` varchar(15) NOT NULL,
  `anneeEdition` int(10) NOT NULL,
  `idCompteConducteur` int(11) NOT NULL,
  `nomConducteur` varchar(50) NOT NULL,
  `isAccepted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `idTrajet` int(11) NOT NULL,
  `nbPassagersReservation` int(10) NOT NULL,
  `typeTrajet` varchar(15) NOT NULL,
  `anneeEdition` int(10) NOT NULL,
  `idCompteReservation` int(10) NOT NULL,
  `isAccepted` tinyint(1) NOT NULL DEFAULT 0,
  `nomPassager1` varchar(50) NOT NULL,
  `nomPassager2` varchar(50) NOT NULL,
  `nomPassager3` varchar(50) NOT NULL,
  `nomPassager4` varchar(50) NOT NULL,
  `nomPassager5` varchar(50) NOT NULL,
  `nomPassager6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `IdTrajet` int(10) NOT NULL,
  `TypeTrajet` varchar(50) NOT NULL,
  `isDemande` tinyint(1) DEFAULT NULL,
  `Description` varchar(255) NOT NULL DEFAULT '',
  `LieuDepart` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `AdresseDepart` varchar(150) NOT NULL DEFAULT '21 Rue de Linselles',
  `LongitudeDepart` float DEFAULT 3.1134,
  `LatitudeDepart` float NOT NULL DEFAULT 50.7364,
  `LieuArrivee` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `AdresseArrivee` varchar(150) NOT NULL DEFAULT '21 Rue de Linselles',
  `LongitudeArrivee` float NOT NULL DEFAULT 3.1134,
  `LatitudeArrivee` float NOT NULL DEFAULT 50.7364,
  `DateDepart` date NOT NULL,
  `DateArrivee` date DEFAULT NULL,
  `HeureDepart` time(4) DEFAULT NULL,
  `HeureArrivee` time(4) DEFAULT NULL,
  `DateAjout` date NOT NULL,
  `NbPassagers` int(10) NOT NULL,
  `PlacesRestantes` int(10) NOT NULL DEFAULT 0,
  `Prix` int(10) NOT NULL DEFAULT 0,
  `DisplayTel` tinyint(1) DEFAULT NULL,
  `AnneeEdition` int(10) NOT NULL,
  `IdCompte` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`IdTrajet`, `TypeTrajet`, `isDemande`, `Description`, `LieuDepart`, `AdresseDepart`, `LongitudeDepart`, `LatitudeDepart`, `LieuArrivee`, `AdresseArrivee`, `LongitudeArrivee`, `LatitudeArrivee`, `DateDepart`, `DateArrivee`, `HeureDepart`, `HeureArrivee`, `DateAjout`, `NbPassagers`, `PlacesRestantes`, `Prix`, `DisplayTel`, `AnneeEdition`, `IdCompte`) VALUES
(12, 'Retour', 1, 'C\'est luka, je veux rentrer', 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, 'Amiens', '33 rue de Beauvais', 2.293, 49.8925, '2022-09-21', '2022-09-21', '13:00:00.0000', '14:51:00.0000', '2022-06-24', 1, 1, 0, 0, 2022, 44),
(15, 'Retour', 0, 'C\'est lulu, viens à bord de mon bolide', 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, 'Amiens', '24 rue de LaFayette', 2.2163, 49.8998, '2022-09-21', '2022-09-21', '19:00:00.0000', '20:55:00.0000', '2022-06-24', 4, 4, 5, 0, 2022, 43);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`IdCompte`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Index pour la table `proposition`
--
ALTER TABLE `proposition`
  ADD PRIMARY KEY (`idProposition`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`IdTrajet`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `IdCompte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `proposition`
--
ALTER TABLE `proposition`
  MODIFY `idProposition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `IdTrajet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
