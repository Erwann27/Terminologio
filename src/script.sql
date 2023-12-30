-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : database:3306
-- Généré le : sam. 30 déc. 2023 à 09:13
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
('admin', '$2y$10$7bgsMiAQ4xxoMarZTefUWOGd0t/Kvj6DUsy6VCc37pVGRpcSUu6Ie', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Caption`
--
ALTER TABLE `Caption`
  ADD PRIMARY KEY (`pic_id`,`caption_id`),
  ADD KEY `caption_id` (`caption_id`);

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
  ADD PRIMARY KEY (`title`,`default_language`,`category`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `Picture_ibfk_2` (`default_language`);

--
-- Index pour la table `Translation`
--
ALTER TABLE `Translation`
  ADD PRIMARY KEY (`pic_id`,`caption_id`,`language`),
  ADD KEY `language` (`language`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Caption`
--
ALTER TABLE `Caption`
  ADD CONSTRAINT `fk_pic` FOREIGN KEY (`pic_id`) REFERENCES `Picture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Picture`
--
ALTER TABLE `Picture`
  ADD CONSTRAINT `Picture_ibfk_2` FOREIGN KEY (`default_language`) REFERENCES `Language` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category`) REFERENCES `Category` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Translation`
--
ALTER TABLE `Translation`
  ADD CONSTRAINT `Translation_ibfk_1` FOREIGN KEY (`pic_id`) REFERENCES `Picture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Translation_ibfk_2` FOREIGN KEY (`pic_id`,`caption_id`) REFERENCES `Caption` (`pic_id`, `caption_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Translation_ibfk_3` FOREIGN KEY (`language`) REFERENCES `Language` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
