-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 08:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wefund`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `Date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `nb_investisseur` int(11) NOT NULL DEFAULT 0,
  `id_entrepreneur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `Date`, `image`, `nb_investisseur`, `id_entrepreneur`) VALUES
(4, 'Figmaster\r\n\r\n', 'Le plugin Figmaster est un classeur pour Figma qui contient un grand ensemble d\'exercices sur la façon de créer votre système de conception', '2021-05-14 16:58:25', 'book.jpg', 3, 1),
(5, 'Dovetale', 'Dovetale aide les magasins Shopify à recruter, gérer et augmenter les ventes avec des personnes qui aiment leurs produits.', '2021-05-14 16:59:59', 'shopify.png', 0, 1),
(7, 'Coinpath', 'Coinpath est une nouvelle vision du suivi des finances, axée sur le gain de temps développées avec précision permettent d\'ajouter des entrées.', '2021-05-14 17:10:22', 'btc.jpg', 0, 2),
(8, 'New Project', 'lorem lorem lorem lorem lorem loremlorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem ', '2021-05-15 16:36:31', 'tech.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Tél` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Bio` text NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Nom`, `Prénom`, `Email`, `Mdp`, `Tél`, `Ville`, `Bio`, `img`) VALUES
(1, 'Merk', 'Ikram', 'Ikram.merk@gmail.com', '$2y$10$bbpoYg/0AWG3VFXzsAtHwe4bSTTOZUJhHCaaYVM8Yc2uyoX1deduy', '0644393344', 'Marrakech, Maroc', '  ', 'profile.jpg'),
(2, 'Joudar', 'Samia', 'Samia.joudar@gmail.com', '$2y$10$EGJUQnOyeuVXyCikOvs75OPFdW8dsQ.S3rFVtiHytF3uDu5evVv0W', '0644393344', 'Essaouira, Maroc', 'Une smiple desc pour le compte', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entrepreneur` (`id_entrepreneur`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_entrepreneur`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
