-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 01 fév. 2024 à 18:39
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `esgi_nicook`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240124091638', '2024-01-24 09:18:19', 71),
('DoctrineMigrations\\Version20240124092355', '2024-01-24 09:24:07', 42),
('DoctrineMigrations\\Version20240124100712', '2024-01-24 10:07:25', 43),
('DoctrineMigrations\\Version20240126074045', '2024-01-26 07:40:59', 31),
('DoctrineMigrations\\Version20240126075321', '2024-01-26 07:53:30', 70),
('DoctrineMigrations\\Version20240126075925', '2024-01-26 07:59:41', 51),
('DoctrineMigrations\\Version20240126080351', '2024-01-26 08:03:57', 25),
('DoctrineMigrations\\Version20240126132132', '2024-01-26 13:21:41', 45),
('DoctrineMigrations\\Version20240126132612', '2024-01-26 13:26:29', 65),
('DoctrineMigrations\\Version20240126133627', '2024-01-26 13:36:40', 107),
('DoctrineMigrations\\Version20240126152107', '2024-01-26 15:21:14', 29),
('DoctrineMigrations\\Version20240128124302', '2024-01-28 12:43:14', 14),
('DoctrineMigrations\\Version20240128124505', '2024-01-28 12:45:13', 61),
('DoctrineMigrations\\Version20240131202152', '2024-01-31 20:22:01', 55);

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(5, 'Poulet'),
(6, 'Beurre'),
(7, 'Pommes de terre'),
(8, 'Huile d\'olive'),
(9, 'Sel'),
(10, 'Poivre'),
(11, 'Parmesan'),
(12, 'Pâtes'),
(13, 'Lardons'),
(14, 'Jaune d\'oeuf'),
(15, 'Sel'),
(16, 'Poivre');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `user_id_id`, `title`, `description`, `img_link`, `created_at`) VALUES
(120, 5, 'Poulet rôti', 'Un poulet rôti, c\'est toujours un régal !', '1.jpeg', '2024-02-01 18:36:07'),
(121, 5, 'Pâtes à la carbonara', 'Un classique de la cuisine italienne !', '2.jpeg', '2024-02-01 18:36:07');

-- --------------------------------------------------------

--
-- Structure de la table `recipe_ingredient`
--

CREATE TABLE `recipe_ingredient` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recipe_ingredient`
--

INSERT INTO `recipe_ingredient` (`id`, `quantity`, `recipe_id`, `ingredient_id`, `unit`) VALUES
(33, 1, 120, 5, 'unité'),
(34, 50, 120, 6, 'gramme'),
(35, 1, 120, 7, 'kilogramme'),
(36, 2, 120, 8, 'cuillère à soupe'),
(37, 1, 120, 9, 'pincée'),
(38, 1, 120, 10, 'pincée'),
(39, 100, 121, 11, 'gramme'),
(40, 500, 121, 12, 'gramme'),
(41, 200, 121, 13, 'gramme'),
(42, 2, 121, 14, 'unité'),
(43, 1, 121, 15, 'pincée'),
(44, 1, 121, 16, 'pincée');

-- --------------------------------------------------------

--
-- Structure de la table `steps`
--

CREATE TABLE `steps` (
  `id` int(11) NOT NULL,
  `recipe_id_id` int(11) NOT NULL,
  `step_nb` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `steps`
--

INSERT INTO `steps` (`id`, `recipe_id_id`, `step_nb`, `description`) VALUES
(335, 120, 1, 'Préchauffer le four à 180°C (thermostat 6).'),
(336, 120, 2, 'Laver le poulet et le sécher avec du papier absorbant.'),
(337, 120, 3, 'Le saler et le poivrer à l\'intérieur et à l\'extérieur.'),
(338, 120, 4, 'Le mettre dans un plat allant au four.'),
(339, 120, 5, 'Le badigeonner de beurre fondu.'),
(340, 120, 6, 'Enfourner pendant 1h30.'),
(341, 120, 7, 'Pendant ce temps, préparer les pommes de terre.'),
(342, 120, 8, 'Les laver et les couper en deux.'),
(343, 120, 9, 'Les mettre dans un plat allant au four.'),
(344, 120, 10, 'Les arroser d\'huile d\'olive.'),
(345, 120, 11, 'Les saler et les poivrer.'),
(346, 120, 12, 'Les mettre au four pendant 1h30.'),
(347, 120, 13, 'Servir le poulet avec les pommes de terre.'),
(348, 121, 1, 'Découper du parmesan en copeaux.'),
(349, 121, 2, 'Faire cuire les pâtes dans une casserole d\'eau bouillante salée.'),
(350, 121, 3, 'Pendant ce temps, faire revenir les lardons dans une poêle.'),
(351, 121, 4, 'Dans un saladier, mélanger les jaunes d\'oeufs, la crème fraîche et le parmesan.'),
(352, 121, 5, 'Saler et poivrer.'),
(353, 121, 6, 'Quand les pâtes sont cuites, les égoutter et les mettre dans un plat.'),
(354, 121, 7, 'Ajouter les lardons et la préparation.'),
(355, 121, 8, 'Mélanger et servir.');

-- --------------------------------------------------------

--
-- Structure de la table `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tools`
--

INSERT INTO `tools` (`id`, `name`) VALUES
(301, 'Casserole'),
(302, 'Poêle'),
(303, 'Four'),
(304, 'Micro-ondes'),
(305, 'Mixeur'),
(306, 'Batteur'),
(307, 'Fouet'),
(308, 'Balance'),
(309, 'Plat à gratin'),
(310, 'Plat à tarte'),
(311, 'Plat à cake'),
(312, 'Plaques de cuisson');

-- --------------------------------------------------------

--
-- Structure de la table `tools_recipes`
--

CREATE TABLE `tools_recipes` (
  `tools_id` int(11) NOT NULL,
  `recipes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tools_recipes`
--

INSERT INTO `tools_recipes` (`tools_id`, `recipes_id`) VALUES
(301, 121),
(302, 121),
(303, 120),
(308, 120),
(308, 121);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`) VALUES
(5, 'nikolai@gmail.com', '[\"ROLE_USER\"]', '$2y$13$l.jeslPNMNcfe4n54297ROtEtj4F7daRmtOMyCXYEnyMDvb9Y/qsa');

-- --------------------------------------------------------

--
-- Structure de la table `users_recipes`
--

CREATE TABLE `users_recipes` (
  `users_id` int(11) NOT NULL,
  `recipes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A369E2B59D86650F` (`user_id_id`);

--
-- Index pour la table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_22D1FE1359D8A214` (`recipe_id`),
  ADD KEY `IDX_22D1FE13933FE08C` (`ingredient_id`);

--
-- Index pour la table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_34220A7269574A48` (`recipe_id_id`);

--
-- Index pour la table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tools_recipes`
--
ALTER TABLE `tools_recipes`
  ADD PRIMARY KEY (`tools_id`,`recipes_id`),
  ADD KEY `IDX_5C250658752C489C` (`tools_id`),
  ADD KEY `IDX_5C250658FDF2B1FA` (`recipes_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- Index pour la table `users_recipes`
--
ALTER TABLE `users_recipes`
  ADD PRIMARY KEY (`users_id`,`recipes_id`),
  ADD KEY `IDX_5369967F67B3B43D` (`users_id`),
  ADD KEY `IDX_5369967FFDF2B1FA` (`recipes_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT pour la table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `steps`
--
ALTER TABLE `steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT pour la table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `FK_A369E2B59D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD CONSTRAINT `FK_22D1FE1359D8A214` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `FK_22D1FE13933FE08C` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`);

--
-- Contraintes pour la table `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `FK_34220A7269574A48` FOREIGN KEY (`recipe_id_id`) REFERENCES `recipes` (`id`);

--
-- Contraintes pour la table `tools_recipes`
--
ALTER TABLE `tools_recipes`
  ADD CONSTRAINT `FK_5C250658752C489C` FOREIGN KEY (`tools_id`) REFERENCES `tools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5C250658FDF2B1FA` FOREIGN KEY (`recipes_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_recipes`
--
ALTER TABLE `users_recipes`
  ADD CONSTRAINT `FK_5369967F67B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5369967FFDF2B1FA` FOREIGN KEY (`recipes_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
