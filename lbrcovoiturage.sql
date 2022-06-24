-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 juin 2022 à 23:45
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
(50, 'Mareel', 'Adrien', 'mareel.adri@yahoo.com', 601020304, '$2y$10$WKCeEXdO596oRTLXdcVqGu3.4cPxzPIjGKZDH7PKMuFKeg6nUzZRO', 0, 0x35302e6a7067, NULL, 1, '2022-06-23 22:00:00', '87f699e611b99c979a19366522c75dc4', '2022-06-23 22:00:00', '', ''),
(51, 'Zhou', 'Lucas', 'adrien.mareel@student.junia.com', 610121314, '$2y$10$RqRTPgx6w/nmelErCpTMC.5OtdSQXA4zO55yg.DyO7qvZ73nvl5zy', 0, 0x35312e6a7067, '', 1, '2022-06-23 22:00:00', '7b268df33abbe2844472ed8e02c7d24c', '2022-06-23 22:00:00', '', ''),
(52, 'Pinateau', 'Pierre', 'mareel.adri1@gmail.com', 711121314, '$2y$10$R0se9DqphHO3IEPr09h5k.BKs33NgKKH09Idb/8cvkNRvAuNAb9Si', 0, 0x35322e6a7067, '', 1, '2022-06-23 22:00:00', 'b9cf2faf6561d1870f0069da73d7a685', '2022-06-23 22:00:00', '', '');

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
  `idDemande` int(10) NOT NULL,
  `idTrajet` int(11) NOT NULL,
  `typeTrajet` varchar(15) NOT NULL,
  `anneeEdition` int(10) NOT NULL,
  `idCompteConducteur` int(11) NOT NULL,
  `nomConducteur` varchar(50) NOT NULL,
  `isAccepted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `proposition`
--

INSERT INTO `proposition` (`idProposition`, `idDemande`, `idTrajet`, `typeTrajet`, `anneeEdition`, `idCompteConducteur`, `nomConducteur`, `isAccepted`) VALUES
(37, 35, 34, 'Aller', 2022, 50, 'MareelAdrien', 0);

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

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `idTrajet`, `nbPassagersReservation`, `typeTrajet`, `anneeEdition`, `idCompteReservation`, `isAccepted`, `nomPassager1`, `nomPassager2`, `nomPassager3`, `nomPassager4`, `nomPassager5`, `nomPassager6`) VALUES
(37, 34, 2, 'Aller', 2022, 51, 0, 'Lucas', 'Vianney', '', '', '', '');

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
(34, 'Aller', 0, '', 'Lille', 'Rue nationale', 3.05952, 50.6328, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-24', '2022-09-24', '10:00:00.0000', '10:31:00.0000', '2022-06-24', 4, 4, 4, 1, 2022, 50),
(35, 'Aller', 1, '', 'Lille', 'Rue nationale', 3.05952, 50.6328, 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, '2022-09-24', '2022-09-24', '11:00:00.0000', '11:31:00.0000', '2022-06-24', 1, 1, 0, 1, 2022, 52),
(36, 'Retour', 1, '', 'Wervicq-Sud', '21 Rue de Linselles', 3.1134, 50.7364, 'Marcq-en-Baroeul', 'Avenue Foch', 3.09819, 50.6691, '2022-09-24', '2022-09-24', '19:00:00.0000', '19:22:00.0000', '2022-06-24', 1, 1, 0, 1, 2022, 50);

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
  MODIFY `IdCompte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `proposition`
--
ALTER TABLE `proposition`
  MODIFY `idProposition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `IdTrajet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
