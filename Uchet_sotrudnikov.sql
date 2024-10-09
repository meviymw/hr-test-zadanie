-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 09 2024 г., 18:24
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
  `Seria_and_nomer_passporta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Contact_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
(1, 'Трюфелева Ирина Олеговна', '1999-10-10', '88 09 451154', '+7(990)-676-67-45', 'г. Ярославль, ул. Машиностроителей, 5', 'Отдел по обучению и развитию', 'Специалист по обучению и развитию', 70500, '2024-09-04', 'Работает'),
(2, 'Комаров Егор Евгеньевич ', '2000-12-02', '90 65 827386', '+7(999)-688-92-44', 'г. Ярославль, ул. Строительная, 10', 'Отдел кадрового обеспечения', 'Специалист по кадровому обеспечению', 85000, '2020-09-15', 'Работает'),
(3, 'Токнов Егор Дмитриевич', '2004-09-10', '70 55 632125', '+7(980)-210-33-59', 'г. Ярославль, ул. Саукова, 15', 'Отдел по управлению талантами', 'Специалист по управлению талантами', 80000, '2024-10-01', 'Работает'),
(4, 'Котова Елена Александровна', '1999-05-12', '65 65 709553', '+7(980)-781-88-99', 'г. Ярославль, ул. Садовая, 33', 'Отдел по благосостоянию сотрудников', 'Специалист по благосостоянию сотрудников', 95000, '2020-05-03', 'Работает'),
(5, 'Матюхин Сергей Алексеевич', '2001-09-09', '78 55 637482', '+7(988)-665-82-99', 'г. Ярославль, ул. Булочная, 11', 'Отдел по работе с персоналом', 'Специалист по работе с персоналом', 70500, '2024-09-01', 'Работает');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Information_about_sotr`
--
ALTER TABLE `Information_about_sotr`
  ADD PRIMARY KEY (`ID_sotrudnika`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Information_about_sotr`
--
ALTER TABLE `Information_about_sotr`
  MODIFY `ID_sotrudnika` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
