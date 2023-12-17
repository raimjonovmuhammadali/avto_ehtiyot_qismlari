-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 16 2023 г., 18:06
-- Версия сервера: 8.0.33
-- Версия PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `carspare`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `ismi` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `count` int NOT NULL,
  `checked` int NOT NULL DEFAULT '0',
  `p_id` int NOT NULL,
  `narxi` int NOT NULL,
  `product_count` int NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `ismi`, `phone`, `adress`, `count`, `checked`, `p_id`, `narxi`, `product_count`, `time`) VALUES
(2, 'test', '133434', 'test addresss', 1, 1, 4, 215000, 10, '2023-12-16 22:04:26');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `model` varchar(100) NOT NULL,
  `img` varchar(155) NOT NULL,
  `product_count` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `model`, `img`, `product_count`) VALUES
(3, 'Qo\'shimcha diffuzor Gentra, Nexia-3, Lacetti, Kobalt, Matiz avtomobillariga', '\"Golden Caymont\"\r\n\r\nBizning do\'konimizda eng yaxshi sifat va brendlar!\r\n\r\nMahsulot: diffuzor (qo\'shimcha qatlam)\r\n\r\nSifat Xitoy mahsuloti sifatida kafolatlangan.\r\n\r\n\r\n\r\nIssiq kunda konditsioner ishlamayaptimi?\r\n\r\nUnda bu mahsulot siz uchun!', '490000', 'Lacetti Nexia-3 Cobalt', 'ciqm74l6sfhndlbqiv3g.jpg', '9'),
(4, '6D va 7Dgilamcha Spark,Damas,Cobalt,Lacetti,Matiz, Nexia,Tracker2,Onix,Labo salonlariuchun', '6D avtomobil tagliklari ichki qavatni axloqsizlik, aşınma va shikastlanishdan himoya qiluvchi yuqori sifatli va funktsional pol paspaslari. Ular maxsus yengillik va aniq o\'rnatish tufayli sirtga qulay joylashishni ta\'minlaydi.', '215000', 'Matiz Spark Trackerer', 'cj8ue9kvutv1p29kig1g.jpg', '9');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
