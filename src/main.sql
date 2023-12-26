-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : database:3306
-- Généré le : dim. 24 déc. 2023 à 11:08
-- Version du serveur : 10.11.2-MariaDB-1:10.11.2+maria~ubu2204
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `main`
--

-- --------------------------------------------------------

--
-- Structure de la table `Caption`
--

CREATE TABLE `Caption` (
  `pic_id` int(11) NOT NULL,
  `caption_id` int(11) NOT NULL,
  `point_X` int(11) DEFAULT NULL,
  `point_Y` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Caption`
--

INSERT INTO `Caption` (`pic_id`, `caption_id`, `point_X`, `point_Y`) VALUES
(9, 1, 370, 94),
(9, 2, 110, 68),
(9, 3, 240, 112),
(10, 1, 309, 328),
(10, 2, 605, 304),
(10, 3, 348, 584),
(11, 1, 514, 66),
(12, 1, 578, 231),
(12, 2, 712, 54),
(12, 3, 86, 616),
(13, 1, 397, 487),
(14, 1, 429, 136),
(14, 2, 619, 67);

-- --------------------------------------------------------

--
-- Structure de la table `Category`
--

CREATE TABLE `Category` (
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Category`
--

INSERT INTO `Category` (`name`) VALUES
('Littérature'),
('Sciences');

-- --------------------------------------------------------

--
-- Structure de la table `Language`
--

CREATE TABLE `Language` (
  `name` varchar(32) NOT NULL,
  `code` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Language`
--

INSERT INTO `Language` (`name`, `code`) VALUES
('Deutsch', 'de'),
('English', 'en'),
('Español', 'es'),
('Français', 'fr'),
('Italiano', 'it');

-- --------------------------------------------------------

--
-- Structure de la table `Picture`
--

CREATE TABLE `Picture` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `default_language` varchar(2) NOT NULL,
  `category` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Picture`
--

INSERT INTO `Picture` (`id`, `title`, `default_language`, `category`) VALUES
(14, 'g', 'de', 'Littérature'),
(12, 'geagyeygegyaeagyea', 'de', 'Littérature'),
(11, 'gueaygeayg', 'de', 'Littérature'),
(13, 'h', 'de', 'Littérature'),
(10, 'Paella', 'es', 'Littérature'),
(9, 'Test', 'fr', 'Sciences');

-- --------------------------------------------------------

--
-- Structure de la table `Translation`
--

CREATE TABLE `Translation` (
  `pic_id` int(11) NOT NULL,
  `caption_id` int(11) NOT NULL,
  `language` varchar(2) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Translation`
--

INSERT INTO `Translation` (`pic_id`, `caption_id`, `language`, `text`) VALUES
(9, 1, 'de', ' cieeeeeel'),
(9, 1, 'en', 'Sky'),
(9, 1, 'es', 'Composant1'),
(9, 1, 'fr', '  Ciel'),
(9, 1, 'it', 'Composant1'),
(9, 2, 'de', 'Composant2'),
(9, 2, 'en', 'Composant2'),
(9, 2, 'es', 'Composant2'),
(9, 2, 'fr', 'Tour'),
(9, 2, 'it', 'Composant2'),
(9, 3, 'de', 'Composant3'),
(9, 3, 'en', ' 3'),
(9, 3, 'es', 'Composant3'),
(9, 3, 'fr', 'eagueyggyea'),
(9, 3, 'it', 'Composant3'),
(10, 1, 'de', 'Composant1'),
(10, 1, 'en', 'Composant1'),
(10, 1, 'es', ' serveur'),
(10, 1, 'fr', 'Composant1'),
(10, 1, 'it', 'Composant1'),
(10, 2, 'de', 'Composant2'),
(10, 2, 'en', 'Composant2'),
(10, 2, 'es', 'a'),
(10, 2, 'fr', 'Composant2'),
(10, 2, 'it', 'Composant2'),
(10, 3, 'de', 'Composant3'),
(10, 3, 'en', 'Composant3'),
(10, 3, 'es', 'eiahehi'),
(10, 3, 'fr', 'Composant3'),
(10, 3, 'it', 'Composant3'),
(11, 1, 'de', 'zguaygz'),
(11, 1, 'en', 'Composant1'),
(11, 1, 'es', 'Composant1'),
(11, 1, 'fr', 'Composant1'),
(11, 1, 'it', 'Composant1'),
(12, 1, 'de', ' TEST'),
(12, 1, 'en', 'Composant1'),
(12, 1, 'es', 'Composant1'),
(12, 1, 'fr', 'Composant1'),
(12, 1, 'it', 'Composant1'),
(12, 2, 'de', 'aaa'),
(12, 2, 'en', 'Composant2'),
(12, 2, 'es', 'Composant2'),
(12, 2, 'fr', 'Composant2'),
(12, 2, 'it', 'Composant2'),
(12, 3, 'de', '3'),
(12, 3, 'en', 'Composant3'),
(12, 3, 'es', 'Composant3'),
(12, 3, 'fr', 'Composant3'),
(12, 3, 'it', 'Composant3'),
(13, 1, 'de', 'h'),
(13, 1, 'en', 'Composant1'),
(13, 1, 'es', 'Composant1'),
(13, 1, 'fr', 'Composant1'),
(13, 1, 'it', 'Composant1'),
(14, 1, 'de', 'l'),
(14, 1, 'en', 'Composant1'),
(14, 1, 'es', 'Composant1'),
(14, 1, 'fr', 'Composant1'),
(14, 1, 'it', 'Composant1'),
(14, 2, 'de', 'a'),
(14, 2, 'en', 'Composant2'),
(14, 2, 'es', 'Composant2'),
(14, 2, 'fr', 'Composant2'),
(14, 2, 'it', 'Composant2');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`username`, `password`, `is_admin`) VALUES
('a', 'b', 0),
('b', '3e23e8160039594a33894f6564e1b1348bbd7a0088d42c4acb73eeaed59c009d', 0),
('eayveayygue', '$2y$10$Xnn6cOFwa1suI6XZICa5lef2n6aPpkeV7/BsgTuMJ6mYHb6CM0fjq', 0),
('F', 'f67ab10ad4e4c53121b6a5fe4da9c10ddee905b978d3788d2723d7bfacbe28a9', 0),
('G', '333e0a1e27815d0ceee55c473fe3dc93d56c63e3bee2b3b4aee8eed6d70191a3', 0),
('guzagugu', 'cd0aa9856147b6c5b4ff2b7dfee5da20aa38253099ef1b4a64aced233c9afe29', 0),
('mp', '$2y$10$tr6WdlTKpz3tEXrH3WAHC.C6OmlhajtfsJrzfR07AgMIPdWhXRaBy', 0),
('p', '$2y$10$4iETKMWEOVLxVgNScarijObOn.MwFc5U306DtqpaR5TK1fXlxmd2u', 0),
('t', 'e3b98a4da31a127d4bde6e43033f66ba274cab0eb7eb1c70ec41402bf6273dd8', 0),
('test', '$2y$10$6IGk1zvqZGkuQ3Eu8UGOpOQMVoZVb5vf/FoOd3IhyUzj7Xa2GIWky', 1),
('zounkla', '$2y$10$Md2.kUl1YZ7RpCbpxDLY6eX1bEU4cByzcSFhm4/y2k4kJr3MU7lvO', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Caption`
--
ALTER TABLE `Caption`
  ADD PRIMARY KEY (`pic_id`,`caption_id`);

--
-- Index pour la table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`name`);

--
-- Index pour la table `Language`
--
ALTER TABLE `Language`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `Picture`
--
ALTER TABLE `Picture`
  ADD PRIMARY KEY (`title`,`category`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `Translation`
--
ALTER TABLE `Translation`
  ADD PRIMARY KEY (`pic_id`,`caption_id`,`language`),
  ADD KEY `fk_language` (`language`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Picture`
--
ALTER TABLE `Picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Picture`
--
ALTER TABLE `Picture`
  ADD CONSTRAINT `Picture_ibfk_2` FOREIGN KEY (`default_language`) REFERENCES `Language` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
