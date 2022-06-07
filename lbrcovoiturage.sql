-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 07 juin 2022 à 08:35
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

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
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `PhotoProfil` mediumblob,
  `Description` text,
  `isVerif` tinyint(1) NOT NULL DEFAULT '0',
  `DateCreation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`IdCompte`, `Nom`, `Prenom`, `Email`, `telephone`, `motDePasse`, `isAdmin`, `PhotoProfil`, `Description`, `isVerif`, `DateCreation`) VALUES
(1, 'THUILLIER', 'Maxime', 'tuile0834@gmail.com', 612345678, 'ff', 0, NULL, 'test', 0, '2001-06-22'),
(2, 'dsd', 'dsd', 'dsd@d', 1111111111, 'Testv3@test', 0, NULL, 'ds', 0, '2001-06-22'),
(3, 'zdzez', 'ezezeze', 'zezez@ezez', 1111111111, 'TestV4@test', 0, NULL, '', 0, '2001-06-22'),
(4, 'sds', 'sd', 'sd@sds', 1111111111, '$2y$10$wifG1peUi3i5SkXGIjW.zOcqSTDSKlsXFCeTkcfCnArHlLzxKWhvu', 0, NULL, '', 0, '2001-06-22'),
(9, 'Test', 'Ayuu', 'azerty@qsd', 1111111111, '$2y$10$tXXrCjBNpqVHcYtkCGYhi.k/vIxePAaywMghZZCNRm4bvVXgb6C0y', 0, NULL, 'petit test', 0, '2001-06-22'),
(10, 'test2', 'Ayuu', 'qwerty@aze', 1111111111, '$2y$10$e767oV44p68Woi9DKerdK.VjZZkMC9vpNAvsdrSr1jRQexBrQGvq6', 0, NULL, 'petit test', 0, '2001-06-22'),
(11, 'QSDQS', 'QSDQSD', 'sdsqdq@dqsd', 1111111111, '$2y$10$7nu5QsXtE.L1JoR9cCWvHejy1jdOjRw5ApIx8doVibcchO6NuI8KO', 0, NULL, '', 0, '2001-06-22'),
(14, 'test', 'test', 'test@aled', 1111111111, '$2y$10$TcAMAlZz8GN6wR0YYauvVuCpnH2pTbC.m6IMm2kprfkN6hmPkDtHS', 0, NULL, '', 0, '2001-06-22'),
(15, 'test', 'test', 'test@test', 1111111111, '$2y$10$zG4D342C77FzV9L9Uv5X3uSrovQXrpGHdRZRNCS1j91ehVS/PSL/i', 0, NULL, '', 0, '2002-06-22'),
(17, 'Pinateau', 'Sabine', 'Sabine@pineau.fr', 652806325, '$2y$10$8MKUrpDp4l5HmJyF.FVBDuTytY9IMjp6sigGvjqapbEt7/IkNuStm', 0, 0x5961676f6f2046462050502e6a7067, ' Smurfing from high rank', 0, '2002-06-22'),
(18, 'qdsqd', 'qsd', 'qsd@dq', 312345678, '$2y$10$rXkDcSWJ.NHSrLJYwalEAeuhj3j18DYm5aGTJIp3p1g.LRPwX2pRq', 0, NULL, '', 0, '2002-06-22');

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
  `LongitudeDepart` float DEFAULT NULL,
  `LatitudeDepart` float NOT NULL,
  `LieuArrivee` varchar(50) NOT NULL DEFAULT 'Wervicq-Sud',
  `AdresseArrivee` varchar(150) NOT NULL DEFAULT '21 Rue de Linselles',
  `LongitudeArrivee` float NOT NULL,
  `LatitudeArrivee` float NOT NULL,
  `DateDepart` date NOT NULL,
  `DateArrivee` date DEFAULT NULL,
  `HeureDepart` time(4) DEFAULT NULL,
  `HeureArrivee` time(4) DEFAULT NULL,
  `DateAjout` date NOT NULL,
  `NbPassagers` int(10) NOT NULL,
  `NbReservations` int(10) NOT NULL DEFAULT '0',
  `Prix` int(10) NOT NULL DEFAULT '0',
  `DisplayTel` tinyint(1) DEFAULT NULL,
  `AnneeEdition` int(10) NOT NULL,
  `IdCompte` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`IdTrajet`, `TypeTrajet`, `isDemande`, `Description`, `LieuDepart`, `AdresseDepart`, `LongitudeDepart`, `LatitudeDepart`, `LieuArrivee`, `AdresseArrivee`, `LongitudeArrivee`, `LatitudeArrivee`, `DateDepart`, `DateArrivee`, `HeureDepart`, `HeureArrivee`, `DateAjout`, `NbPassagers`, `NbReservations`, `Prix`, `DisplayTel`, `AnneeEdition`, `IdCompte`) VALUES
(1, 'Aller', 0, 'fucklessymboles', 'Lille', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-05-25', NULL, NULL, NULL, '2025-05-22', 2, 0, 5, 0, 2022, 1),
(2, 'Aller', 0, 'J\'aime le RGB', 'Lille', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-05-25', NULL, NULL, NULL, '2025-05-22', 3, 0, 5, 0, 2022, 1),
(4, 'Retour', 0, 'CA MARCHE BILLY', 'Wervicq-Sud', '21 Rue de Linselles,', NULL, 0, 'Charleville-Mézières', '21 Rue de Linselles,', 0, 0, '2022-09-22', NULL, '17:20:00.0000', NULL, '2025-05-22', 3, 0, 30, 1, 2022, 1),
(5, 'Aller', 0, 'test', 'Lille', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-24', NULL, '09:04:00.0000', NULL, '2026-05-22', 1, 0, 5, 1, 2022, 1),
(6, 'Aller', 0, 'test', 'Charleville-Mézières', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-22', NULL, '10:15:00.0000', NULL, '2030-05-22', 4, 0, 25, 1, 2022, 1),
(7, 'Aller', 0, 'testv2', 'Charleville-Mézières', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-22', NULL, '10:15:00.0000', NULL, '2030-05-22', 4, 0, 23, 0, 2022, 1),
(8, 'Aller', 1, 'pitié', 'Charleville-Mézières', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-20', NULL, '15:24:00.0000', NULL, '2030-05-22', 3, 0, 0, 0, 2022, 1),
(9, 'Aller', 0, '?', 'Lille', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-17', NULL, '16:47:00.0000', NULL, '2030-05-22', 5, 0, 11, 0, 2022, 1),
(10, 'Aller', 0, 'zdz', 'Lille', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-22', NULL, '14:02:00.0000', NULL, '2030-05-22', 2, 0, 4, 0, 2022, 1),
(11, 'Aller', 0, 'zfdqfq', 'Charleville-Mézières', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-21', NULL, '13:03:00.0000', NULL, '2030-05-22', 2, 0, 4, 0, 2022, 1),
(12, 'Aller', 0, 'zfdqfq', 'Charleville-Mézières', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-21', NULL, '13:03:00.0000', NULL, '2030-05-22', 2, 0, 4, 0, 2022, 1),
(13, 'Retour', 0, 'TestV?', 'Wervicq-Sud', '21 Rue de Linselles,', NULL, 0, 'Charleville-Mézières', '21 Rue de Linselles,', 0, 0, '2022-09-27', NULL, '18:00:00.0000', NULL, '2030-05-22', 1, 0, 27, 0, 2022, 1),
(14, 'Retour', 0, 'TestV??', 'Wervicq-Sud', '21 Rue de Linselles,', NULL, 0, 'Charleville-Mézières', '21 Rue de Linselles,', 0, 0, '2022-09-27', NULL, '18:00:00.0000', NULL, '2030-05-22', 1, 0, 27, 0, 2022, 1),
(15, 'Retour', 0, 'TestV?????', 'Wervicq-Sud', '21 Rue de Linselles,', NULL, 0, 'Charleville-Mézières', '21 Rue de Linselles,', 0, 0, '2022-09-27', NULL, '18:00:00.0000', NULL, '2030-05-22', 1, 0, 27, 0, 2022, 1),
(16, 'Retour', 0, '&lt;h1&gt;RATIO&lt;/h1&gt;', 'Wervicq-Sud', '21 Rue de Linselles,', NULL, 0, 'Rouen', '21 Rue de Linselles,', 0, 0, '2022-09-29', NULL, '09:30:00.0000', NULL, '2030-05-22', 3, 0, 15, 0, 2022, 1),
(17, 'Aller', 1, '', 'Lille', '21 Rue de Linselles,', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles,', 0, 0, '2022-09-22', NULL, '11:21:00.0000', NULL, '2001-06-22', 3, 0, 0, 0, 2022, 1),
(18, 'Aller', 0, '', 'Charleville-Mézières', '06 place de la gare', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles', 0, 0, '2022-09-17', NULL, '14:34:00.0000', NULL, '2002-06-22', 3, 0, 25, 0, 2022, 1),
(19, 'Aller', 0, '', 'tete', 'dqsdqs', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles', 0, 0, '2022-09-29', NULL, '17:49:00.0000', NULL, '2002-06-20', 3, 0, 12, 0, 2022, 17),
(20, 'Retour', 0, '', 'Wervicq-Sud', '21 Rue de Linselles', NULL, 0, 'Lille', '41 boulevard Vauban', 0, 0, '2022-09-22', NULL, '14:25:00.0000', NULL, '2022-06-02', 1, 0, 5, 0, 2022, 17),
(21, 'Aller', 0, 'ff', 'Charleville-Mézières', '40 avenue jean jaures', NULL, 0, 'Wervicq-Sud', '21 Rue de Linselles', 0, 0, '2022-09-21', NULL, '11:29:00.0000', NULL, '2022-06-02', 4, 0, 4, 0, 2022, 17);

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
  MODIFY `IdCompte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `IdTrajet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
