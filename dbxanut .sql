-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 05 2021 г., 21:01
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbxanut`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products_name` varchar(64) NOT NULL,
  `score` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_phone` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `products_name`, `score`, `status`, `user_phone`, `created_at`) VALUES
(76, 115, 'product1', 1, 0, 0, '2021-03-11 11:32:29'),
(77, 115, 'product1', 1, 0, 0, '2021-03-11 11:37:28'),
(78, 115, 'product1', 1, 0, 0, '2021-03-11 11:37:53'),
(79, 115, 'product1', 1, 0, 0, '2021-03-11 11:42:05'),
(80, 115, 'product1', 1, 0, 0, '2021-03-11 11:44:19'),
(81, 115, 'product1', 1, 0, 55555555, '2021-03-11 11:48:10'),
(82, 115, 'product1', 1, 0, 55555555, '2021-03-11 12:15:37'),
(83, 91, 'product1', 1, 0, 20201114, '2021-03-16 07:06:48'),
(84, 91, 'product2', 1, 0, 20201114, '2021-03-16 07:06:48'),
(85, 91, 'product3', 1, 0, 20201114, '2021-03-16 07:06:48'),
(86, 91, 'product1', 1, 0, 20201114, '2021-03-16 16:14:16'),
(87, 91, 'nor apranq', 1000, 0, 20201114, '2021-03-16 16:59:03'),
(88, 91, 'nor apranq', 1, 1, 20201114, '2021-03-16 18:41:50'),
(90, 91, 'new product', 100, 0, 20201114, '2021-03-17 05:49:16'),
(91, 91, 'product1', 10, 0, 20201114, '2021-03-17 05:49:17'),
(92, 91, 'product1', 32, 0, 20201114, '2021-03-19 16:44:23'),
(93, 91, 'product1', 20, 0, 20201114, '2021-03-26 04:56:21'),
(94, 91, '9', 10, 0, 20201114, '2021-03-26 10:02:07'),
(95, 91, 'product2', 10, 0, 20201114, '2021-03-26 10:13:57'),
(96, 91, 'product24', 5, 0, 20201114, '2021-03-26 10:13:58'),
(97, 91, 'product2', 10, 0, 20201114, '2021-03-26 10:15:33'),
(98, 91, 'product24', 5, 0, 20201114, '2021-03-26 10:15:33'),
(99, 91, 'product2', 10, 0, 20201114, '2021-03-26 10:17:49'),
(100, 91, 'product24', 5, 0, 20201114, '2021-03-26 10:17:49'),
(101, 91, 'product2', 10, 0, 20201114, '2021-03-26 10:18:26'),
(102, 91, 'product24', 5, 0, 20201114, '2021-03-26 10:18:26');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `created_at`) VALUES
(5, 0, 'hghg', '2018-12-18 10:20:38'),
(8, 0, 'lifehack', '2018-12-14 17:47:31'),
(9, 0, 'music', '2018-12-14 17:50:05'),
(10, 9, 'nature', '2018-12-14 17:53:04'),
(11, 9, 'fitness', '2018-12-14 17:55:01'),
(12, 9, 'marketing', '2018-12-14 17:55:27'),
(13, 0, 'life', '2018-12-14 18:00:20'),
(14, 0, 'health', '2018-12-14 18:18:59'),
(15, 0, 'sport', '2018-12-14 18:35:18'),
(16, 15, 'football', '2018-12-20 10:44:13'),
(17, 15, 'fitness', '2018-12-20 10:44:21'),
(18, 0, 'bvjvhvh', '2020-11-17 13:31:13'),
(21, 0, 'prodct', '2021-03-01 11:29:49'),
(22, 0, 'razval', '2021-03-02 17:45:53');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_code` int(8) NOT NULL,
  `name` varchar(65) NOT NULL,
  `img` varchar(65) DEFAULT NULL,
  `about_pro` varchar(65) NOT NULL,
  `price` varchar(65) NOT NULL,
  `day` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `product_code`, `name`, `img`, `about_pro`, `price`, `day`) VALUES
(1, 1, 'kevin_tom', 'kevin', 'Kevin', 'Thomas;;;', 'e'),
(2, 2, 'vincy', 'vincy', 'Vincy', 'Jone;;', 'ee;'),
(3, 3, 'tim_lee', 'tim', 'Tim', 'Lee;;', 'eeee;'),
(4, 4, 'jane', 'jane', 'Jane', 'Ferro;;', 'eeee;'),
(5, 1, 'kevin_tom', 'kevin', 'Kevin', 'Thomas;;;', 'e'),
(6, 2, 'vincy', 'vincy', 'Vincy', 'Jone;;', 'ee;'),
(7, 3, 'tim_lee', 'tim', 'Tim', 'Lee;;', 'eeee;'),
(8, 4, 'jane', 'jane', 'Jane', 'Ferro;;', 'eeee;');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `days` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `img`, `days`, `category_id`) VALUES
(1, 'product1', 'tesak1', '15', '603cd383b51d3123055582_266158171496370_5843680920879064990_n.jpg', 80, 5),
(2, 'product2', 'tesak2', '16', '603cd383b51d3123055582_266158171496370_5843680920879064990_n.jpg', 50, 8),
(3, 'product3', 'tesak3', '17', '603cd383b51d3123055582_266158171496370_5843680920879064990_n.jpg', 9, 9),
(4, 'product4', 'tesak4', '18', '603cd383b51d3123055582_266158171496370_5843680920879064990_n.jpg', 10, 10),
(5, 'product1', 'some discription', '20', '603cd383b51d3123055582_266158171496370_5843680920879064990_n.jpg', 5, 5),
(6, 'new product', 'meqena', '6000', '603cd383b51d3123055582_266158171496370_5843680920879064990_n.jpg', 8, 8),
(7, 'product28', 'wefwefe', '12', '603cd383b51d3123055582_266158171496370_5843680920879064990_n.jpg', 0, 5),
(8, 'product29', 'wefwefe', '22', '603cd6fd5b824131932798_251714526549949_2631940259107785522_n.jpg', 0, 8),
(9, 'product24', 'wefwefe', '22', '603cd79c0e7e5131932798_251714526549949_2631940259107785522_n.jpg', 0, 9),
(10, 'product25', 'wefwefe', '22', '603cd7a86307f131932798_251714526549949_2631940259107785522_n.jpg', 0, 9),
(11, 'product12', 'wefwefe', '22', '603cd7c2a676a131932798_251714526549949_2631940259107785522_n.jpg', 0, 15),
(12, 'product9', 'komp', '150', '603ce83c5e78a136380227_1359863144354356_8030651809985770818_n.jpg', 40, 15),
(13, 'product30', 'footbol', '600', '603d2b5719559136380227_1359863144354356_8030651809985770818_n.jpg', 20, 5),
(14, 'gndak', 'loxap', '6000', '603d2c1e6ed04136987188_399022054515862_3552212353639370684_n.jpg', 15, 8),
(15, 'product244', 'knkkn', '22', '603cd383b51d3123055582_266158171496370_5843680920879064990_n.jpg', 111, 5),
(16, 'product15', 'wewvwevwevewvwe', '45', '603f21c7e00ba3.jpg', 10, 5),
(17, 'product22', 'nkaragrutyun', '500', '603f3cf4308d1Layer22.png', 20, 8),
(18, '9', 'wefwefe', '500', '6048e9f80f71f5f86fea10ab725c13f2b035970ArmMus.jpg', 30, 3),
(19, '9', 'nkaragrutyun', '6000', '6050df784c167web6.jpg', 30, 5),
(20, 'nor apranq', 'wvowvnwivnwivnwinviw', '500', '6050e365b87acweb2.jpg', 10, 8),
(21, 'nor2', 'jowdjowed', '5000', '', 10, 8),
(22, 'cccwecwedcccwec', '', '15005', 'kkk.png', 88, 8),
(23, 'tulki', 'fiqefiqjfi', '1500', 'vue.jpg', 70, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8_unicode_ci DEFAULT 'user',
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `role`, `gender`, `avatar`, `email`, `password`, `phone`, `created_at`) VALUES
(90, 'a', 'a', 'admin', 'Male', NULL, 'a@mail.com', '$1$XncupYmS$C5GH05QMBj8mdWmJ6fx4B.', '20201101', '2020-11-07 13:16:36'),
(91, 'hhh', 'hhh', 'user', 'Male', '605af9aeefab0vue.jpg', 'u@mail.com', '$1$dK7xJWgh$gUpMdYVuwEInfOwNDBcvD/', '20201114', '2020-11-07 13:17:08'),
(115, 'p', 'p', 'user', 'Female', '6049fde50842a603cbcd5481f6Layer14.png', 'p@mail.ru', '$1$z.5xSfUO$6VgrbAF3uXzR1kGi3vh9H0', '055555555', '2021-03-11 11:22:40');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
