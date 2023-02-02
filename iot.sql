-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 fév. 2023 à 18:07
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `iot`
--

-- --------------------------------------------------------

--
-- Structure de la table `boite`
--

CREATE TABLE `boite` (
  `idGroupe` int(11) NOT NULL,
  `idComposant` int(11) NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `boite`
--

INSERT INTO `boite` (`idGroupe`, `idComposant`, `qte`) VALUES
(4, 3, 1),
(4, 4, 1),
(4, 7, 2),
(4, 8, 2),
(4, 9, 3),
(4, 11, 1),
(5, 1, 2),
(5, 2, 2),
(5, 8, 1),
(6, 1, 3),
(6, 2, 2),
(6, 3, 2),
(6, 4, 2),
(6, 7, 2),
(6, 8, 4),
(6, 10, 2),
(6, 13, 2),
(6, 14, 2),
(6, 15, 2);

-- --------------------------------------------------------

--
-- Structure de la table `composant`
--

CREATE TABLE `composant` (
  `idComposant` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `composant`
--

INSERT INTO `composant` (`idComposant`, `nom`, `image`) VALUES
(1, 'Résistance', '201852.png'),
(2, 'LED', '201950.png'),
(3, 'Bouton poussoir', '202018.png'),
(4, 'Potentiomètre', '202052.png'),
(5, 'condensateur', '202121.png'),
(6, 'Interrupteur à glissière', '202201.png'),
(7, 'Platine d\'essai', '202235.png'),
(8, 'Arduino Uno R3', '202322.png'),
(9, 'Capteur de distance par ultrasons', '202415.png'),
(10, 'Pavé numérique 4x4', '202710.png'),
(11, 'Afficheur à 7 segments', '202756.png'),
(12, 'Ecran LCD 16x2', '202903.png'),
(13, 'Connecteur A USB standard', '202950.png'),
(14, 'Capteur de température', '202450.png'),
(15, 'Pile 9V', '210236.png');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `nom_etud1` varchar(255) NOT NULL,
  `prenom_etud1` varchar(255) NOT NULL,
  `annee_etud1` enum('1CP','2CP','1CS','2CS','3CS') NOT NULL,
  `nom_etud2` varchar(255) NOT NULL,
  `prenom_etud2` varchar(255) NOT NULL,
  `annee_etud2` enum('1CP','2CP','1CS','2CS','3CS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `nom_etud1`, `prenom_etud1`, `annee_etud1`, `nom_etud2`, `prenom_etud2`, `annee_etud2`) VALUES
(4, 'Abu al Khayr', 'Ghannam', '2CS', 'Katherine', 'S. Schnell', '2CS'),
(5, 'Erin', 'Heney', '1CS', 'Justin', 'Jersey', '1CS'),
(6, 'Michael', 'Barlow', '3CS', 'Oscar', 'Mehaffey', '3CS');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `idPiece` int(11) NOT NULL,
  `dateAchat` date NOT NULL,
  `etat` enum('disponible','enpanne','perdu') NOT NULL,
  `idComposant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`idPiece`, `dateAchat`, `etat`, `idComposant`) VALUES
(2, '2022-10-09', 'enpanne', 4),
(7, '2022-12-19', 'perdu', 7),
(9, '2022-12-26', 'enpanne', 5),
(10, '2022-06-14', 'enpanne', 6),
(11, '2022-08-08', 'disponible', 7),
(12, '2022-11-04', 'disponible', 8),
(13, '2022-11-13', 'enpanne', 9),
(14, '2022-10-17', 'disponible', 10),
(16, '2022-05-17', 'disponible', 12),
(17, '2022-10-26', 'enpanne', 13),
(18, '2022-08-15', 'enpanne', 14),
(20, '2022-12-20', 'perdu', 8),
(21, '2022-12-21', 'enpanne', 15),
(22, '2022-12-19', 'disponible', 1),
(23, '2012-08-14', 'enpanne', 1),
(24, '2022-12-05', 'perdu', 1),
(25, '2022-12-27', 'disponible', 2),
(26, '2022-12-19', 'disponible', 7),
(27, '2022-12-19', 'perdu', 2),
(28, '2022-12-19', 'disponible', 5),
(29, '2022-12-26', 'disponible', 1),
(30, '2022-12-25', 'perdu', 1),
(31, '2022-10-18', 'disponible', 8),
(32, '2022-12-21', 'enpanne', 15),
(33, '2022-12-19', 'disponible', 1),
(34, '2012-08-14', 'enpanne', 1),
(35, '2022-12-05', 'perdu', 1),
(36, '2022-12-27', 'disponible', 2),
(37, '2022-12-19', 'disponible', 7),
(38, '2022-12-19', 'perdu', 2),
(39, '2022-12-19', 'disponible', 5),
(40, '2022-12-26', 'disponible', 1),
(41, '2022-12-25', 'perdu', 1),
(42, '2022-10-18', 'disponible', 8),
(44, '2022-10-09', 'enpanne', 4),
(45, '2022-08-17', 'perdu', 1),
(46, '2022-12-21', 'enpanne', 1),
(49, '2022-12-19', 'perdu', 7),
(50, '2022-12-13', 'disponible', 3),
(51, '2022-12-26', 'enpanne', 5),
(52, '2022-06-14', 'enpanne', 6),
(55, '2022-11-13', 'perdu', 9),
(60, '2022-08-15', 'enpanne', 14),
(62, '2022-12-20', 'enpanne', 8),
(64, '2022-10-09', 'enpanne', 4),
(65, '2022-08-17', 'perdu', 1),
(66, '2022-12-21', 'enpanne', 1),
(69, '2022-12-19', 'perdu', 7),
(70, '2022-12-13', 'perdu', 3),
(71, '2022-12-26', 'enpanne', 5),
(72, '2022-06-14', 'enpanne', 6),
(80, '2022-08-15', 'enpanne', 14),
(82, '2022-12-20', 'perdu', 8),
(83, '2023-01-01', 'disponible', 5),
(84, '2023-01-01', 'disponible', 15),
(85, '2023-01-01', 'disponible', 3),
(95, '2023-01-01', 'disponible', 7),
(96, '2023-01-01', 'disponible', 2),
(97, '2023-01-01', 'disponible', 13),
(98, '2023-01-01', 'disponible', 14),
(99, '2023-01-01', 'disponible', 4),
(100, '2023-01-01', 'disponible', 3),
(105, '2023-01-01', '', 3),
(106, '2023-01-01', '', 3),
(107, '2023-01-01', 'enpanne', 3),
(108, '2022-12-07', 'perdu', 3),
(109, '2022-12-07', 'enpanne', 3),
(110, '2022-12-05', 'disponible', 3),
(111, '2023-01-01', 'disponible', 12),
(114, '2023-01-01', 'enpanne', 12),
(115, '2023-01-04', 'enpanne', 8),
(116, '2023-01-04', 'enpanne', 8),
(117, '2023-01-04', 'disponible', 9),
(118, '2023-01-04', 'disponible', 9),
(119, '2023-01-04', 'enpanne', 11),
(120, '2023-01-04', 'enpanne', 10),
(121, '2023-01-04', 'enpanne', 10),
(122, '2023-01-04', 'perdu', 13),
(123, '2023-01-15', 'disponible', 1),
(124, '2023-01-17', 'disponible', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boite`
--
ALTER TABLE `boite`
  ADD PRIMARY KEY (`idGroupe`,`idComposant`),
  ADD KEY `idComposant` (`idComposant`,`idGroupe`) USING BTREE;

--
-- Index pour la table `composant`
--
ALTER TABLE `composant`
  ADD PRIMARY KEY (`idComposant`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`idPiece`),
  ADD KEY `idComposant` (`idComposant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `composant`
--
ALTER TABLE `composant`
  MODIFY `idComposant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `idPiece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boite`
--
ALTER TABLE `boite`
  ADD CONSTRAINT `boite_ibfk_1` FOREIGN KEY (`idComposant`) REFERENCES `composant` (`idComposant`),
  ADD CONSTRAINT `boite_ibfk_2` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`);

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`idComposant`) REFERENCES `composant` (`idComposant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
