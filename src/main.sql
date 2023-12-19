-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : database:3306
-- Généré le : mar. 19 déc. 2023 à 19:44
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
  `title` varchar(255) NOT NULL,
  `start_point_X` int(11) DEFAULT NULL,
  `start_point_Y` int(11) DEFAULT NULL,
  `end_point_X` int(11) DEFAULT NULL,
  `end_point_Y` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `title` varchar(255) NOT NULL,
  `default_language` varchar(2) NOT NULL,
  `category` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Picture`
--

INSERT INTO `Picture` (`title`, `default_language`, `category`) VALUES
('b', 'it', 'Littérature'),
('h', 'de', 'Sciences'),
('Je teste un truc', 'en', 'Sciences'),
('test', 'fr', 'Sciences'),
('test2', 'fr', 'Sciences'),
('test3', 'fr', 'Littérature');

-- --------------------------------------------------------

--
-- Structure de la table `Translation`
--

CREATE TABLE `Translation` (
  `caption` varchar(255) NOT NULL,
  `language` varchar(2) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('F', 'f67ab10ad4e4c53121b6a5fe4da9c10ddee905b978d3788d2723d7bfacbe28a9', 0),
('G', '333e0a1e27815d0ceee55c473fe3dc93d56c63e3bee2b3b4aee8eed6d70191a3', 0),
('guzagugu', 'cd0aa9856147b6c5b4ff2b7dfee5da20aa38253099ef1b4a64aced233c9afe29', 0),
('p', '$2y$10$4iETKMWEOVLxVgNScarijObOn.MwFc5U306DtqpaR5TK1fXlxmd2u', 0),
('t', 'e3b98a4da31a127d4bde6e43033f66ba274cab0eb7eb1c70ec41402bf6273dd8', 0),
('test', 'a', 1),
('zounkla', '$2y$10$DpYzt.X1UNcPbp3ILD6m1OZlCLvigKV.7mIGOODMTp7hpl9brGQfi', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Caption`
--
ALTER TABLE `Caption`
  ADD PRIMARY KEY (`title`) USING BTREE,
  ADD KEY `title` (`title`);

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
  ADD PRIMARY KEY (`title`,`category`,`default_language`) USING BTREE,
  ADD KEY `category` (`category`),
  ADD KEY `Picture_ibfk_2` (`default_language`);

--
-- Index pour la table `Translation`
--
ALTER TABLE `Translation`
  ADD PRIMARY KEY (`caption`,`language`),
  ADD KEY `fk_language` (`language`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`username`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Caption`
--
ALTER TABLE `Caption`
  ADD CONSTRAINT `Caption_ibfk_1` FOREIGN KEY (`title`) REFERENCES `Picture` (`title`);

--
-- Contraintes pour la table `Picture`
--
ALTER TABLE `Picture`
  ADD CONSTRAINT `Picture_ibfk_1` FOREIGN KEY (`category`) REFERENCES `Category` (`name`),
  ADD CONSTRAINT `Picture_ibfk_2` FOREIGN KEY (`default_language`) REFERENCES `Language` (`code`);

--
-- Contraintes pour la table `Translation`
--
ALTER TABLE `Translation`
  ADD CONSTRAINT `fk_caption` FOREIGN KEY (`caption`) REFERENCES `Caption` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_language` FOREIGN KEY (`language`) REFERENCES `Language` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
