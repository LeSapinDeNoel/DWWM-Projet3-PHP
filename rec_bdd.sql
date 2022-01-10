-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 30 sep. 2021 à 08:03
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.24

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

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Science-Fiction'),
(2, 'Comédie'),
(3, 'Horreur'),
(4, 'Aventure');

-- --------------------------------------------------------

--
-- Structure de la table `critics`
--

CREATE TABLE `critics` (
  `critic_id` smallint(6) NOT NULL,
  `critic_creator` smallint(6) NOT NULL,
  `critic_title` varchar(200) NOT NULL,
  `critic_content` varchar(1200) NOT NULL,
  `critic_createdate` date NOT NULL,
  `critic_img` varchar(100) NOT NULL,
  `critic_status` int(11) NOT NULL,
  `critic_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `critics`
--

INSERT INTO `critics` (`critic_id`, `critic_creator`, `critic_title`, `critic_content`, `critic_createdate`, `critic_img`, `critic_status`, `critic_cat`) VALUES
(1, 2, 'Edge of tomorrow, le film sous-coté !', 'Un bon film à l\'époque, en le revoyant, il fait partie de mon top 5 des films de science-fiction de tous les temps. J\'ai récemment commencé à apprécier les films utilisant le concept grec ancien du syndrome de Cassandre, le jour de la marmotte étant le plus célèbre. Emily Blunt a obtenu le statut de superstar avec Sicario et Looper. Je pensais qu\'A Quiet Place était surfait, mais c\'était les lauriers de cette trilogie de la perfection. Doug Limon, qui a également réalisé le spectaculaire The Bourne Identity, tisse une intrigue et des effets avec une telle habileté que je suis émerveillé de savoir que je pourrais vivre 1000 ans sans réussir ce qu\'il a fait.', '2021-08-20', 'edge.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `users` (
  `user_id` smallint(6) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_mail` varchar(100) NOT NULL,
  `user_pwd` varchar(250) NOT NULL,
  `user_avatar` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_mail`, `user_pwd`, `user_avatar`, `user_role`) VALUES
(1, 'Dienger', 'Julie', 'julie.dienger@gmail.com', '159753', 'avatarj.jpg', 1),
(2, 'Felbinger', 'Quentin', 'quentin.felbinger@gmail.com', '159753', 'avatarq.jpg', 2),
(3, 'Antoine', 'Yoan', 'yoan.antoine@gmail.com', '159753', 'avatary.jpg', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `critics`
--
ALTER TABLE `critics`
  ADD PRIMARY KEY (`critic_id`),
  ADD KEY `critic_creator` (`critic_creator`),
  ADD KEY `critic_status` (`critic_status`),
  ADD KEY `critic_cat` (`critic_cat`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `critics`
--
ALTER TABLE `critics`
  MODIFY `critic_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
