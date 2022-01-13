-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 jan. 2022 à 01:53
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_b2`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `auteur` int NOT NULL,
  `categorie` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auteur` (`auteur`),
  KEY `categorie` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `date_creation`, `auteur`, `categorie`) VALUES
(3, 'Maman ndiaye', 'je t\'aime \"', '2021-11-30 21:33:55', 1, 'electronique'),
(4, 'Sénegal', 'mon pays', '2021-11-30 21:37:23', 1, 'electronique'),
(5, 'Magatte', 'la saint louisienne', '2021-11-30 21:38:13', 1, 'electronique'),
(8, 'coupe d\'afrique', 'une coupe pour le senegal', '2022-01-03 21:36:23', 2, 'restauration');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `login` varchar(15) NOT NULL,
  `mdp` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `prenom`, `nom`, `login`, `mdp`) VALUES
(1, 'Julie', 'Dupond', '', '0'),
(2, 'Harouna', 'Kane', '', '0'),
(3, 'Jean', 'Pierre', '', '0'),
(4, 'kknknlm:', 'kknknlm:', 'bineta ', '0'),
(5, 'amama', 'wone', 'bineta ', '$2y$10$zecXL'),
(6, 'MAMAMA', 'Wooooo', 'mamadouwone2016', '$2y$10$h734z'),
(7, 'fdthdhgdgh', 'ggdfhbc', 'MAMOUDOU', '$2y$10$HDd/E'),
(8, 'mkghghjvbvbnvvvnhnbv', 'wikkjhg', 'bineta ', '$2y$10$MK2hd'),
(9, 'SAmbaa', 'wone', 'ilci', '$2y$10$u0C.AD5Doz/6gITLqs2LrOlA2I2RawvtsKnon8h5/izjv01U3SOlS'),
(10, 'bhjbkjqc', ' N', '', '$2y$10$9r1Jq3tqtsl3qWrt4VacdOkEidWGVb1OUKyxvQcJhY5v7at6RLIWe'),
(11, 'SAmba', 'mlmknk', 'ibre', '$2y$10$0X9bY3SKGlD.bHExbh8Lduu936Z0XV2Lv739evNoRgvsZ1u.N.kT.'),
(12, '', '', 'mama', '$2y$10$aOfJray5w37ZyCyxV4Wi/OcG7bhXdxm/UnzpOA0foplRWKCglrPyG'),
(13, '', '', 'mama', '$2y$10$M42bK45cOBGKkm7QrohNOe37r0q3/t9H0QVD8HeAgyX2GGHYyVnda'),
(14, 'MAMAD', 'Wone', 'senegal', '$2y$10$FXvX3/QJxR1wxZZdKCH1.uxIgDaN5EEyXl4eDTRCJm/1oEI/GScuC'),
(17, 'Can', 'Senegal', 'coupe', '$2y$10$Ko7t11z4yFQdIHYfZ3nl.ug2QloO96e/fNzdhGUeobVh2JHo9cHWO');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`nom`) VALUES
('electronique'),
('informatique'),
('restauration');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `article` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `contenu`, `date_creation`, `article`) VALUES
(4, 'jbkn ', 'hbvhjbhjb', '2021-11-30 21:35:51', 3),
(5, 'chvcbh n', 'gcghcb vhvh', '2021-11-30 21:36:17', 3),
(6, 'gcfgfcgyvhj', 'chgvhgjbjkn,;', '2021-11-30 21:36:28', 3),
(7, 'vbn bhbhbn,; ', 'hjv v,bnn; n;,n,', '2021-11-30 21:36:48', 3),
(8, 'mamadou', 'un jeune renoi', '2021-12-01 15:02:40', 3),
(9, 'Rassoul Diaw', 'le Con', '2021-12-01 15:03:22', 3),
(10, 'MAmadou', 'elle est gentille', '2021-12-01 15:06:24', 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`auteur`) REFERENCES `auteur` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`nom`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
