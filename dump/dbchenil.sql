-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 18 juin 2022 à 13:11
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
-- Base de données : `dbchenil`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexe` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sterilise` tinyint(1) NOT NULL,
  `puce` int NOT NULL,
  `naissance` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `person_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `nom`, `sexe`, `sterilise`, `puce`, `naissance`, `type`, `person_id`) VALUES
(175, 'Kiki la terreur', 'Mâle', 1, 12, '1997-01-15', 'Chat', 65),
(176, 'Croquette le désosseur', 'Mâle', 0, 489, '2018-04-21', 'Chat', 61),
(177, 'Bibiche le foudrayant', 'Mâle', 0, 618623, '2015-03-12', 'Oiseau', 65),
(180, 'Chouquette le marteau-piqueur', 'Mâle', 0, 2642, '2021-02-14', 'Chien', 61),
(182, 'Pepette la malicieuse', 'Mâle', 1, 4641, '1997-01-11', 'Oiseau', 19);

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `naissance` date NOT NULL,
  `mail` varchar(30) NOT NULL,
  `telephone` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`id`, `nom`, `prenom`, `naissance`, `mail`, `telephone`) VALUES
(19, 'Grauwmans', 'Jordan', '1997-01-11', 'j.naga@outlook.com', 472462400),
(61, 'Grauwmans', 'Kevin', '1991-07-13', 'kevin.g@live.be', 477777777),
(65, 'Leblicq', 'Carine', '1965-11-29', 'rine1@live.fr', 476643031);

-- --------------------------------------------------------

--
-- Structure de la table `sejours`
--

DROP TABLE IF EXISTS `sejours`;
CREATE TABLE IF NOT EXISTS `sejours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `animal_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `animal_id` (`animal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sejours`
--

INSERT INTO `sejours` (`id`, `date`, `animal_id`) VALUES
(210, '2024-05-14', 175),
(216, '2022-06-23', 176),
(217, '2022-06-23', 182),
(218, '2022-06-30', 180),
(219, '2022-06-30', 175),
(220, '2022-06-30', 177);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `sejours`
--
ALTER TABLE `sejours`
  ADD CONSTRAINT `sejours_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
