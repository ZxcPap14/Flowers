-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2024 г., 02:03
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zxcpepega`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id_cont` int NOT NULL,
  `FullName_cont` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email_cont` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Message_cont` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id_cont`, `FullName_cont`, `Email_cont`, `Message_cont`) VALUES
(8, 'sadsda', 'sdasda', 'sdasdadsa'),
(9, 'saddasdsadsa', 'dsadsaadsadsdas@gmail.com', 'asdadsdassaddsadsa'),
(10, 'SADSADSA', 'DSASADSADSDASDA', 'DSDSSAFASHUI');

-- --------------------------------------------------------

--
-- Структура таблицы `Korzina`
--

CREATE TABLE `Korzina` (
  `id_korzina` int NOT NULL,
  `id_user` int NOT NULL,
  `id_tovara` int NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Korzina`
--

INSERT INTO `Korzina` (`id_korzina`, `id_user`, `id_tovara`, `count`) VALUES
(20, 2, 26, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_prod` int NOT NULL,
  `h_prod` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_prod` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_prod` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_prod`, `h_prod`, `text_prod`, `img_prod`) VALUES
(50, 'sdasda', 'sdasda', 'download.jpg'),
(51, 'sadads', 'asddsa', 'download.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `TOVAR`
--

CREATE TABLE `TOVAR` (
  `id` int NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Vid` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `Count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `TOVAR`
--

INSERT INTO `TOVAR` (`id`, `Photo`, `Name`, `Price`, `Country`, `Vid`, `Color`, `Count`) VALUES
(23, 'photo_2024-05-28_22-04-57.jpg', 'GayLord2009', '122', '122', '122', '12', 20),
(26, 'photo_2024-05-27_22-19-16.jpg', 'Илья Незнамов', '12', 'GayLord2009', 'GayLord2009', 'GayLord2009', 15),
(27, 'zxc.png', 'q', '1', 'w', 'e', 'r', 100);

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `name`, `surname`, `patronymic`, `phone_number`, `email`, `login`, `password`, `role`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin44', 'admin'),
(2, 'Денис', 'Казанцев', 'Сергеевич', '89521364256', 'zxcpapi4@gmail.com', 'ZxcPap14', 'ZxcPap14', 'user'),
(3, 'Денис', 'Казанцев', 'Сергеевич', '89521364256', 'zxcpapi4@gmail.com', 'qwe', 'qwe', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `Zakazi`
--

CREATE TABLE `Zakazi` (
  `idd` int NOT NULL,
  `id_user` int NOT NULL,
  `id_tovar` int NOT NULL,
  `count` int NOT NULL,
  `NomerZakaza` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Zakazi`
--

INSERT INTO `Zakazi` (`idd`, `id_user`, `id_tovar`, `count`, `NomerZakaza`, `Status`) VALUES
(10, 2, 23, 9, 'LR8121758692', 'Заказ подтвержден  | 06.06.2024'),
(11, 2, 26, 15, 'LR8121758692', 'Заказ подтвержден  | 06.06.2024'),
(12, 2, 27, 1, 'LR8121758692', 'Заказ подтвержден  | 06.06.2024'),
(13, 2, 23, 6, 'FZ0689554238', 'Отказ по причине - Похуй | 06.06.2024 01:57:48'),
(14, 3, 26, 7, 'WK9154291756', 'Отказ по причине - Похуй x2 | 06.06.2024'),
(15, 3, 23, 5, 'WK9154291756', 'Отказ по причине - Похуй x2 | 06.06.2024'),
(16, 3, 27, 5, 'WK9154291756', 'Отказ по причине - Похуй x2 | 06.06.2024'),
(17, 3, 27, 1, 'SF7006738562', 'Заказ подтвержден  | 06.06.2024'),
(18, 3, 23, 1, 'HB3887064404', 'Заказ подтвержден  | 06.06.2024'),
(19, 3, 23, 6, 'HO6410214873', 'Отказ по причине - Похуй x3 | 06.06.2024');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_cont`);

--
-- Индексы таблицы `Korzina`
--
ALTER TABLE `Korzina`
  ADD PRIMARY KEY (`id_korzina`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_prod`);

--
-- Индексы таблицы `TOVAR`
--
ALTER TABLE `TOVAR`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Zakazi`
--
ALTER TABLE `Zakazi`
  ADD PRIMARY KEY (`idd`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_cont` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `Korzina`
--
ALTER TABLE `Korzina`
  MODIFY `id_korzina` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_prod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `TOVAR`
--
ALTER TABLE `TOVAR`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Zakazi`
--
ALTER TABLE `Zakazi`
  MODIFY `idd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
