-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-04-2022 a las 14:44:52
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(1, 2, 'sdfsd', 'sdfsdf', 3.00, 2, NULL, '2022-04-05', NULL),
(2, 1, 'altos elfos', 'sdfa', 2.00, 3, NULL, '2022-04-08', NULL),
(4, 2, 'war1', 'earrsf', 44.00, 1, NULL, '2022-04-11', 'error.png'),
(5, 1, 'war2', 'safas', 22.00, 1, NULL, '2022-04-11', NULL),
(6, 1, 'war3', 'adfasd', 22.00, 1, NULL, '2022-04-11', NULL),
(7, 1, 'war4', 'asfas', 44.00, 1, NULL, '2022-04-11', NULL);

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
