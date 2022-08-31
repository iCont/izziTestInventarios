/*
Navicat MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : izzitestinventarios

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-08-30 23:51:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for branches
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of branches
-- ----------------------------
INSERT INTO `branches` VALUES ('1', 'Cuernavaca', '2022-08-28 06:27:32', null);
INSERT INTO `branches` VALUES ('2', 'Yautepec', '2022-08-28 06:27:32', null);
INSERT INTO `branches` VALUES ('3', 'Cuautla', '2022-08-28 06:27:32', null);
INSERT INTO `branches` VALUES ('4', 'Acapulco', '2022-08-28 06:27:32', null);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Electrónica', '2022-08-28 06:25:26', null);
INSERT INTO `categories` VALUES ('2', 'Línea Blanca', '2022-08-28 06:25:26', null);
INSERT INTO `categories` VALUES ('3', 'Deportes', '2022-08-28 06:25:26', null);
INSERT INTO `categories` VALUES ('4', 'Alimentos', '2022-08-28 06:25:26', null);
INSERT INTO `categories` VALUES ('5', 'Jardinería', '2022-08-28 06:25:26', null);

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_product_id_foreign` (`product_id`),
  CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('7', 'fsdfsdfsd', '1', '2', '2022-08-31 03:28:29', '2022-08-31 03:28:29');
INSERT INTO `comments` VALUES ('8', 'fsdfsdfsd', '1', '2', '2022-08-31 03:28:36', '2022-08-31 03:28:36');
INSERT INTO `comments` VALUES ('9', 'fsdfsdfsd', '1', '2', '2022-08-31 03:28:42', '2022-08-31 03:28:42');
INSERT INTO `comments` VALUES ('10', 'fsdfsdfsd', '1', '2', '2022-08-31 04:02:45', '2022-08-31 04:02:45');
INSERT INTO `comments` VALUES ('11', 'fsdfsdfsd', '1', '2', '2022-08-31 04:03:13', '2022-08-31 04:03:13');
INSERT INTO `comments` VALUES ('12', 'fsdfsdfsd', '1', '2', '2022-08-31 04:04:49', '2022-08-31 04:04:49');
INSERT INTO `comments` VALUES ('13', 'fsdfsdfsd', '1', '2', '2022-08-31 04:05:12', '2022-08-31 04:05:12');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2022_08_28_045745_create_profiles_table', '1');
INSERT INTO `migrations` VALUES ('2', '2022_08_28_045931_create_categories_table', '2');
INSERT INTO `migrations` VALUES ('4', '2022_08_28_050040_create_branches_table', '3');
INSERT INTO `migrations` VALUES ('5', '2022_08_28_051902_create_comments_table', '4');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(11,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_purchase` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('2', 'Lap top', 'descripcion', '25', '1', '1', '1', '2022-08-30 22:28:42', '2022-08-29 05:54:23', '2022-08-31 03:28:42', '1');
INSERT INTO `products` VALUES ('3', 'iPhone', 'Iphone 13 256gb', '30', '1', '2', '1', '2022-08-29 05:58:56', '2022-08-29 05:58:56', '2022-08-29 05:58:56', '1');
INSERT INTO `products` VALUES ('4', 'Galaxy Fold', 'Samsung Galaxy Fold', '25000', '1', '4', '1', '2022-08-29 15:44:59', '2022-08-29 15:44:59', '2022-08-29 15:44:59', '1');
INSERT INTO `products` VALUES ('5', 'MacBook Pro', '256GB M1', '35000', '1', '3', '1', '2022-08-29 22:10:05', '2022-08-29 22:10:05', '2022-08-29 22:10:05', '1');
INSERT INTO `products` VALUES ('9', 'Takis fuego', '250gr', '15', '4', '1', '1', '2022-08-29 22:14:39', '2022-08-29 22:14:39', '2022-08-29 22:14:39', '1');
INSERT INTO `products` VALUES ('10', 'Apple Watch Series 6', 'Color azul', '12000', '1', '2', '1', '2022-08-29 22:19:38', '2022-08-29 22:19:38', '2022-08-29 22:19:38', '1');
INSERT INTO `products` VALUES ('11', 'Airpod Pro', 'Blancos', '3500', '1', '1', '1', '2022-08-29 23:38:53', '2022-08-29 23:38:53', '2022-08-29 23:38:53', '1');
INSERT INTO `products` VALUES ('13', 'Disco Duro', 'dadasdasdas', '55555', '1', '2', '1', '2022-08-29 23:48:49', '2022-08-29 23:48:49', '2022-08-29 23:48:49', '1');
INSERT INTO `products` VALUES ('17', 'Audifonos Audiotechnica', 'Audifonos bluetooth con  conector 3.5mm', '2500', '1', '3', '1', '2022-08-30 02:52:04', '2022-08-30 02:52:04', '2022-08-30 02:52:04', '1');
INSERT INTO `products` VALUES ('18', 'Lavadora Mabe', 'Color blanca 25 kg', '8000', '2', '3', '4', '2022-08-31 03:23:07', '2022-08-31 03:23:07', '2022-08-31 03:23:07', '1');

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1', 'Administrador', null, null);
INSERT INTO `profiles` VALUES ('2', 'Capturista', null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` tinyint(1) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Jesús Ivan', 'Mendoza', 'Contreras', 'jesus.mendoza.cont@gmail.com', null, '$2y$10$BgV5BgD5B719CGHod9MeKeknONDNfhY/yn6PPW0rBQLoYQcJQSmNG', '1', '1', null, '2022-08-28 22:22:52', '2022-08-28 22:22:52');
INSERT INTO `users` VALUES ('4', 'Marga Elba', 'Rojas', 'Figueroa', 'moody_2318@gmail.com', null, '$2y$10$xswi8VXEIvHlgl7/HpfpKeKscreSv0df9BXM7Na4Qxt.tROu9AwDS', '1', '2', null, '2022-08-30 03:52:44', '2022-08-30 03:52:44');
