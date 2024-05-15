-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 mai 2024 à 09:49
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddww`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` timestamp NOT NULL DEFAULT current_timestamp(),
  `note` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `pseudo`, `commentaire`, `date_commentaire`, `note`, `user_id`) VALUES
(1, '', 'trés bien, je recommande mywebsite', '2024-05-15 07:08:08', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(2, 4, 1, 2),
(3, 4, 2, 2),
(4, 4, 3, 3),
(5, 6, 2, 2),
(6, 6, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `product_price`) VALUES
(1, 'FORMULE 1', 'SITE WEB VITRINE', 900.00),
(2, 'FORMULE 2', 'SITE WEB MARCHAND', 2500.00),
(3, 'HEBERGEMENT', '80e mensuel', 80.00);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_id`, `login`, `password_hash`, `pseudo`) VALUES
(1, 'pseudo', 'pseudo112@gmail.com', '$2y$10$xM2iWIvli6CXca0VNPvXG.oFoa6Y4blhAQLY.cqAmmHM2jzfWoHke', ''),
(2, 'pseudo11', 'pseudo11@gmail.com', '$2y$10$xLMv9uzspD8Kq9Cjzi9v0eCZaTyYbOSgrHZTXVXPA2nyiMzeKosuK', ''),
(3, '121', '121@gmail.com', '$2y$10$rVFm1dru2g3Do80u1IHfTeuq1mbi2tLgFW3RCV9XPbEJhJ9/IiXLe', ''),
(4, 'pseudotest', 'pseudo@gmail.com', '$2y$10$9ALe4p7gPrbdeMcHpz7wkO8FQUq7b0.ezaod45A1g0Gb0rWGeCSee', ''),
(5, 'testsamere', 'test@gmail.com', '$2y$10$37HnwS6fP5ppIIlhJV.k3OQ2yHANNh3QyUNb7HTjvnSQlPM33o5lW', ''),
(6, '', 'fulltest@gmail.com', '$2y$10$AeUipvi0TmgwZKv/HG.5q.Cngb0sGLjJAM55dd.8gS1qlzCXIVbIi', 'fulltest');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
