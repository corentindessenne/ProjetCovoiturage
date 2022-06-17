-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 juin 2022 à 10:22
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
  `Description` text DEFAULT NULL,
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
(1, 'THUILLIER', 'Maxime', 'tuile0834@gmail.com', 612345678, 'ff', 0, NULL, 'test', 0, '2001-06-21 22:00:00', '', NULL, '', ''),
(2, 'Mareel', 'Adrien', 'mareel.adri@yahoo.com', 632618822, '$2y$10$pieQUxNFR3bSoDW49phK8OAgxaz6.iwSxUHTyggcVWAW7mxZFVWry', 0, 0x2e6a7067, '', 0, '2022-06-07 22:00:00', '', NULL, '', ''),
(20, 'Dessenne', 'Corentin', 'corentin.dessenne@student.junia.com', 627503059, '$2y$10$jeV2ZsT6ZtLhGFkBQzPFiuID0WdEuIGTxgsvK.RaSJXewx.ebwc26', 1, NULL, NULL, 1, '2022-06-15 22:00:00', '310fd08b053a4807c6dc6eae1c43de82', '2022-06-15 22:00:00', '', '');

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
(1, 'Aller', 0, '', 'Marcq-en-Baroeul', '15 Avenue Foch,Marcq-en-Baroeul', 3.10186, 50.6675, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '16:00:00.0000', '16:20:00.0000', '2022-06-07', 4, 4, 3, NULL, 2022, 1),
(2, 'Aller', 0, '', 'Lille', '21 Rue de Linselles,', 3.05726, 50.6292, 'Wervicq-Sud', '21 Rue de Linselles,', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '16:47:00.0000', '11:32:46.0000', '2030-05-22', 5, 5, 11, 0, 2022, 4),
(3, 'Aller', 0, '', 'Charleville-Mézières', '06 place de la gare', 4.7261, 49.7621, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '14:34:00.0000', '11:32:47.0000', '2002-06-22', 3, 3, 25, 0, 2022, 3),
(4, 'Aller', 0, '', 'Paris', 'Place de l\'étoile', 2.35222, 48.8566, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-17', '2022-09-17', '15:11:00.0000', '14:17:14.0000', '2022-06-07', 5, 5, 5, 0, 2022, 2);

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
  MODIFY `IdCompte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `IdTrajet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
