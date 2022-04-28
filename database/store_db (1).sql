-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-04-2022 a las 06:59:53
-- Versión del servidor: 8.0.24
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoris`
--

DROP TABLE IF EXISTS `categoris`;
CREATE TABLE IF NOT EXISTS `categoris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_categori` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `categoris`
--

INSERT INTO `categoris` (`id`, `name_categori`) VALUES
(1, 'Maquetas'),
(2, 'Figuras'),
(3, 'Plomo'),
(4, 'Pinturas'),
(5, 'Nuevas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `province` varchar(255) NOT NULL,
  `location_order` varchar(255) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `status_order` varchar(100) NOT NULL,
  `date_order` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `province`, `location_order`, `direction`, `total_price`, `status_order`, `date_order`) VALUES
(11, 4, 'Barcelona', 'Barcelona', 'cami ral', 44, 'confirm', '2022-04-25'),
(12, 4, 'El Masnou', 'El Masnou', 'capitans comelles,27', 44, 'sended', '2022-04-25'),
(13, 4, 'Barcelona', 'Barcelona', 'cami ral', 44, 'preparation', '2022-04-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `units` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_details_orders` (`order_id`),
  KEY `fk_order_details_products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `units`) VALUES
(3, 11, 5, 1),
(4, 11, 6, 1),
(5, 12, 5, 1),
(6, 12, 6, 1),
(7, 13, 5, 1),
(8, 13, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name_product` varchar(175) NOT NULL,
  `description_product` text,
  `price` float(5,2) NOT NULL,
  `stock` int NOT NULL,
  `offer` float(5,2) DEFAULT NULL,
  `date_publish` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categoris` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name_product`, `description_product`, `price`, `stock`, `offer`, `date_publish`, `image`) VALUES
(4, 2, 'Soldado Marine', 'Soldado', 17.00, 1, NULL, '2022-04-11', 'war2.jpg'),
(5, 1, 'Goblin Grande', 'safas', 22.00, 1, NULL, '2022-04-11', 'war4.jpg'),
(6, 2, 'Storm Soldier', 'Soldado', 22.00, 1, NULL, '2022-04-11', 'war1.jpg'),
(7, 4, 'Tiranido', 'asfas2', 22.00, 4, NULL, '2022-04-11', 'war3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_user` varchar(75) NOT NULL,
  `lastname` varchar(125) DEFAULT NULL,
  `email` varchar(125) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `rol` varchar(75) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name_user`, `lastname`, `email`, `password_user`, `rol`, `img`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', 'admin', NULL),
(2, 'admin', 'admin', 'lluis@lluis.com', '$2y$04$.ng7v7/cXaSWUP75gvsHAeGI8hqM6mnAYBU9nNcmGdqN.jxyt/uZG', 'admin', ''),
(4, 'lluis2', 'lluis2', 'lluis.casamajor@nacex.com', '$2y$04$xCeKkeeb5mOebVbhq3EO2.7y9paDSD0Okz8bdYnFKI/3V364//kuC', 'admin', '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order_details_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categoris` FOREIGN KEY (`category_id`) REFERENCES `categoris` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
