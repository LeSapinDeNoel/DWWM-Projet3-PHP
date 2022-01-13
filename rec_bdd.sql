-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 jan. 2022 à 20:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rec_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Science-Fiction'),
(2, 'Comédie'),
(3, 'Horreur'),
(4, 'Aventure'),
(5, 'Drame'),
(6, 'Romance'),
(7, 'Action'),
(8, 'Historique'),
(9, 'Western'),
(11, 'Thriller'),
(12, 'Guerre'),
(13, 'Animation');

-- --------------------------------------------------------

--
-- Structure de la table `critics`
--

DROP TABLE IF EXISTS `critics`;
CREATE TABLE IF NOT EXISTS `critics` (
  `critic_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `critic_creator` smallint(6) NOT NULL,
  `critic_title` varchar(200) NOT NULL,
  `critic_content` varchar(1200) NOT NULL,
  `critic_createdate` date NOT NULL,
  `critic_img` varchar(100) NOT NULL,
  `critic_status` int(11) NOT NULL,
  `critic_cat` int(11) NOT NULL,
  PRIMARY KEY (`critic_id`),
  KEY `critic_creator` (`critic_creator`),
  KEY `critic_status` (`critic_status`),
  KEY `critic_cat` (`critic_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `critics`
--

INSERT INTO `critics` (`critic_id`, `critic_creator`, `critic_title`, `critic_content`, `critic_createdate`, `critic_img`, `critic_status`, `critic_cat`) VALUES
(15, 2, 'Edge of Tomorrow, Un film à ne pas manquer !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis cursus erat blandit ultrices tempor. Maecenas sollicitudin scelerisque augue a vestibulum. Aliquam suscipit diam sem, id tristique mi eleifend non. Sed aliquet lectus non nisl tempus volutpat. Praesent tincidunt, risus eu pulvinar tincidunt, quam purus viverra erat, vitae varius quam libero sit amet ante. Maecenas sit amet tincidunt neque. Pellentesque suscipit lorem eu feugiat mattis. Nunc eget interdum justo, vel lacinia velit. Quisque laoreet ornare magna, eget ornare nibh consequat eget.', '2022-01-13', 'premiere_banniere1642103642_307191bf78daa11221ef.jpg.jpg', 1, 1),
(16, 2, 'Shrek', 'Le meilleur film...', '2022-01-13', 'premiere_banniere1642104239_a857ac3dc494f33f978e.jpg.jpg', 1, 4),
(17, 2, 'Spider-Man : No Way Home', 'Pas encore vu...', '2022-01-13', 'premiere_banniere1642104320_113b1377fa3bf026ff9f.jpg.jpg', 3, 1),
(18, 2, 'Boîte noire', 'Un film français avec Pierre Niney mais bon !', '2022-01-13', 'banniere_default.jpg', 1, 5),
(19, 1, 'Harry Potter à l\'école des sorciers', 'Un classique !', '2022-01-13', 'premiere_banniere1642104676_bb417fabbba5c142f12b.jpg.jpg', 1, 1),
(20, 1, 'Une sirène à Paris', 'Une romance française vraiment original !', '2022-01-13', 'premiere_banniere1642104823_0e7eff9de460e8648965.jpg.jpg', 1, 6),
(21, 1, 'Les Schtroumpfs', 'La BD est mieux...', '2022-01-13', 'premiere_banniere1642104961_ebf397710edbde8ed545.jpg.jpg', 1, 13),
(22, 3, 'stars wars un classique', 'Il faut regarder !', '2022-01-13', 'premiere_banniere1642105015_25aa934c04e336e44513.jpg.jpg', 1, 1),
(23, 3, 'Warcraft un manqué pour les fans', 'Dommage...', '2022-01-13', 'premiere_banniere1642105073_caacd3e4ab2aa1bad0d4.jpg.jpg', 1, 7),
(24, 3, 'wolverine: origins - A l\'aide !', 'Dommage Dead pool :)', '2022-01-13', 'premiere_banniere1642105128_79f1c7e23e639305510f.jpg.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'administrateur'),
(2, 'modérateur'),
(3, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(20) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Publié'),
(2, 'En attente'),
(3, 'Non publié');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_mail` varchar(100) NOT NULL,
  `user_pwd` varchar(250) NOT NULL,
  `user_avatar` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_role` (`user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_mail`, `user_pwd`, `user_avatar`, `user_role`) VALUES
(1, 'Dienger', 'Julie', 'julie.dienger@gmail.com', '$2y$10$bXhyRT9qu5syEdrDC1Dy.OWAazaRKFwT7imW8HvoVQOsWA8knH9ey', 'avatarDienger1.jpg', 3),
(2, 'Felbinger', 'Quentin', 'quentin.felbinger@gmail.com', '$2y$10$JA7FSHpxXBnFHdxgSh1TrOk5WVvAIdIUzlZuSiIS3SD5V7DMi1DnG', 'avatarFelbinger2.jpg', 1),
(3, 'Antoine', 'Yoan', 'yoan.antoine@gmail.com', '$2y$10$e7Rw5T5yZWgFnlfuYSVUa.DdHmBqdC6gwxL2INFIao9MEaokpLLma', 'avatarAntoine3.jpg', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `critics`
--
ALTER TABLE `critics`
  ADD CONSTRAINT `critics_ibfk_1` FOREIGN KEY (`critic_creator`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `critics_ibfk_2` FOREIGN KEY (`critic_cat`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `critics_ibfk_3` FOREIGN KEY (`critic_status`) REFERENCES `status` (`status_id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
