-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 07 2024 г., 17:57
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Uchet_sotrudnikov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Information_about_sotr`
--

CREATE TABLE `Information_about_sotr` (
  `ID_sotrudnika` int NOT NULL,
  `FIO_sotrudnika` text NOT NULL,
  `Date_birth` date NOT NULL,
  `Seria_and_nomer_passporta` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Contact_info` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Adress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Otdel` text NOT NULL,
  `Doljnost` text NOT NULL,
  `Zarplata` int NOT NULL,
  `Date_prin_na_rab` date NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Information_about_sotr`
--

INSERT INTO `Information_about_sotr` (`ID_sotrudnika`, `FIO_sotrudnika`, `Date_birth`, `Seria_and_nomer_passporta`, `Contact_info`, `Adress`, `Otdel`, `Doljnost`, `Zarplata`, `Date_prin_na_rab`, `Status`) VALUES
(1, 'Комаров Егор Евгеньевич', '2000-12-02', '7890654321', '+79605809926', 'г. Ярославль, ул. Строительная, 10', 'Отдел кадрового обеспечения', 'Специалист по кадровому обеспечению', 85000, '2022-09-15', 'Работает'),
(2, 'Трюфелева Ирина Олеговна', '1999-10-10', '9012724556', '+79705347765', 'г. Ярославль, ул. Машиностроителей, 5', 'Отдел по обучению и развитию', 'Специалист по обучению и развитию', 70500, '2024-09-04', 'Работает');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Information_about_sotr`
--
ALTER TABLE `Information_about_sotr`
  ADD PRIMARY KEY (`ID_sotrudnika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
