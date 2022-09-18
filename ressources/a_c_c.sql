-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 sep. 2022 à 15:41
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
-- Base de données : `a.c.c`
--

-- --------------------------------------------------------

--
-- Structure de la table `a.c.c`
--

CREATE TABLE `a.c.c` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accessoire` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `nomanimal` varchar(30) NOT NULL,
  `police` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `répondu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `a.c.c`
--

INSERT INTO `a.c.c` (`id`, `nom`, `prenom`, `email`, `accessoire`, `color`, `nomanimal`, `police`, `commentaire`, `createdAt`, `répondu`) VALUES
(2, 'hrllo', 'bug', 'tdded@gmail.com', 'laisses', '#00ff40', 'titan', 'Arial', 'hkgbkh', '2022-09-06 17:01:21', 0),
(3, '$nom', '$prenom', '$email', '$accessoire', '$color', '$nomanimal', '$police', '$commentaire', '2022-09-06 17:02:33', 0),
(4, 'hrllo', 'bug', 'tdded@gmail.com', 'laisses', '#00ff00', 'titan', 'Arial', 'hgvjg', '2022-09-06 17:04:18', 0),
(5, 'hrllo', 'bug', 'tdded@gmail.com', 'collier', '#004080', 'titan', 'Arial', '1&quot;;DELETE FROM `a.c.c`', '2022-09-06 17:05:30', 0),
(6, 'toto', 'titi', 'tiit@gmail.com', 'panier', 'bleu', 'titan', 'arial', 'sjkhfbergaiogfvhl', '2022-09-07 14:18:16', 0),
(7, 'hrllo', 'elvis', 'tdded@gmail.com', 'harnais', '#0000a0', 'titan', 'Georgia', 'fgnjhh,kgh,', '2022-09-07 14:32:13', 0),
(8, 'toto', 'elvis', 'ytreza@gmail.com', 'gamelle', '#008080', 'bar &#039;fish&#039;', 'Verdana', 'sqcsqcsqc', '2022-09-07 14:41:29', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `a.c.c`
--
ALTER TABLE `a.c.c`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `a.c.c`
--
ALTER TABLE `a.c.c`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
