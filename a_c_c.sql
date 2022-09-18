-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 sep. 2022 à 00:07
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
  `email` varchar(30) NOT NULL,
  `accessoire` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `nomanimal` varchar(30) NOT NULL,
  `police` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `a.c.c`
--

INSERT INTO `a.c.c` (`id`, `nom`, `prenom`, `email`, `accessoire`, `color`, `nomanimal`, `police`, `commentaire`, `createdAt`) VALUES
(1, 'lulu', 'marcel', 'td@gmail.com', 'panier', '#8c15ee', 'titan', 'Franklin Gothic Medium', 'pour mes chats il le faudrait un peut grand', '2022-09-06 23:54:38'),
(2, 'deo', 'marcel', 'gt@gmail.com', 'gamelle', '#6de639', 'TITAN', 'Georgia', 'DELETE id=1 FROM a.c.c', '2022-09-06 23:56:29');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
