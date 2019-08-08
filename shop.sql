-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 août 2019 à 13:50
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(25, 'Diesel', '2019-08-08 06:26:54', '2019-08-08 06:26:54'),
(24, '5 Portes', '2019-08-08 06:26:48', '2019-08-08 06:26:48'),
(23, '4 Portes', '2019-08-08 06:26:44', '2019-08-08 09:40:14'),
(22, 'Utilitaire', '2019-08-08 06:26:33', '2019-08-08 06:26:33'),
(21, 'Familial', '2019-08-08 06:26:28', '2019-08-08 06:26:28'),
(20, 'Sport', '2019-08-08 06:26:20', '2019-08-08 06:26:20'),
(19, 'Cabriolet', '2019-08-08 06:26:17', '2019-08-08 06:26:17'),
(18, 'Coupé', '2019-08-08 06:26:12', '2019-08-08 06:26:12'),
(14, 'Luxe', '2019-08-07 22:07:22', '2019-08-07 22:07:22'),
(26, 'Essence', '2019-08-08 06:26:58', '2019-08-08 06:26:58'),
(27, 'Hybride', '2019-08-08 06:27:05', '2019-08-08 06:27:05'),
(28, 'Electrique', '2019-08-08 06:27:10', '2019-08-08 06:27:10'),
(29, 'SUV', '2019-08-08 06:28:12', '2019-08-08 06:28:12'),
(39, 'Tank', '2019-08-08 09:48:07', '2019-08-08 09:48:07'),
(38, 'Pick-Up', '2019-08-08 09:43:12', '2019-08-08 09:43:12'),
(37, 'Exclusivité', '2019-08-08 09:41:18', '2019-08-08 09:41:18');

-- --------------------------------------------------------

--
-- Structure de la table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_product_id_index` (`product_id`),
  KEY `category_product_category_id_index` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`) VALUES
(23, 8, 29),
(22, 8, 26),
(21, 8, 21),
(20, 7, 28),
(19, 7, 23),
(18, 6, 29),
(17, 6, 24),
(15, 5, 29),
(16, 6, 25),
(13, 5, 24),
(12, 5, 25),
(24, 9, 14),
(25, 9, 27),
(26, 9, 37),
(27, 10, 25),
(28, 10, 24),
(29, 10, 26),
(30, 10, 38),
(31, 11, 14),
(32, 11, 26),
(33, 11, 37),
(34, 12, 39);

-- --------------------------------------------------------

--
-- Structure de la table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `features`
--

INSERT INTO `features` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bleu', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(2, 'Mat', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(3, 'Bois', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(4, 'Vert', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(5, 'Rouge', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(6, 'Jaune', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(7, 'Noir', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(8, 'Blanc', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(9, 'Plastique', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(10, 'Acier', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(11, 'Violet', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(12, 'Mauve', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(13, 'Taupe', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(14, 'Cuir', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(15, 'Tissu', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(23, 'Véhicule moyen', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(22, 'Véhicule léger', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(21, 'Aluminium', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(24, 'Véhicule lourd', '2019-08-07 22:00:00', '0000-00-00 00:00:00'),
(25, 'Métallisé', '2019-08-07 22:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `feature_product`
--

DROP TABLE IF EXISTS `feature_product`;
CREATE TABLE IF NOT EXISTS `feature_product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `feature_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `feature_product_product_id_index` (`product_id`),
  KEY `feature_product_feature_id_index` (`feature_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `feature_product`
--

INSERT INTO `feature_product` (`id`, `product_id`, `feature_id`) VALUES
(34, 9, 8),
(33, 9, 2),
(32, 8, 14),
(31, 8, 12),
(29, 7, 13),
(28, 6, 5),
(27, 7, 15),
(26, 7, 9),
(25, 7, 8),
(24, 6, 14),
(30, 8, 10),
(22, 6, 1),
(20, 5, 14),
(19, 5, 13),
(18, 5, 2),
(21, 5, 12),
(35, 9, 14),
(36, 10, 1),
(37, 10, 4),
(38, 10, 14),
(39, 11, 2),
(40, 11, 10),
(41, 11, 14),
(42, 12, 4),
(43, 12, 10),
(44, 12, 24);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2019_08_07_222527_create_categories_table', 1),
(6, '2019_08_07_221832_create_products_table', 1),
(8, '2019_08_08_075247_create_category_product_table', 2),
(9, '2019_08_08_080536_create_features_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Renault Captur', '2019-08-08 09:36:56', '2019-08-08 09:39:15', '2019-08-08 09:39:15'),
(5, 'Renault Captur', '2019-08-08 08:11:02', '2019-08-08 08:22:53', '2019-08-08 08:22:53'),
(7, 'Renault ZOE', '2019-08-08 09:38:08', '2019-08-08 09:38:08', NULL),
(8, 'Renault Captur', '2019-08-08 09:39:47', '2019-08-08 09:39:47', NULL),
(9, 'Nissan Micra', '2019-08-08 09:42:05', '2019-08-08 09:42:05', NULL),
(10, 'Nissan NAVARA', '2019-08-08 09:43:32', '2019-08-08 09:43:32', NULL),
(11, 'Porche PANAMERA', '2019-08-08 09:47:41', '2019-08-08 09:47:41', NULL),
(12, 'Char Leclerc', '2019-08-08 09:48:54', '2019-08-08 09:48:54', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
