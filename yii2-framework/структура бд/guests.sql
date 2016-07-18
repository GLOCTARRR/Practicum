-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 05 2016 г., 10:14
-- Версия сервера: 5.6.29
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `guest_book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `guests`
--

CREATE TABLE IF NOT EXISTS `guests` (
  `id` int(10) unsigned NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `guest_ip` varchar(255) NOT NULL,
  `guest_browser` varchar(255) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guests`
--

INSERT INTO `guests` (`id`, `user_name`, `email`, `homepage`, `text`, `guest_ip`, `guest_browser`, `image`, `file`) VALUES
(163, '2', '233@mail.com', '', '&lt;code&gt;deeeeeeeeeeeeeeee&lt;/code&gt;', '127.0.0.1', 'Chrome 49.0.2623.87', '21467692202.jpg', NULL),
(164, '3', '3@mail.com', '', '&lt;p&gt;ddjhhhhhhhhhhhhhd&lt;/p&gt;', '127.0.0.1', 'Chrome 49.0.2623.87', NULL, NULL),
(165, '4', '4@mail.com', '', '&lt;p&gt;&lt;i&gt;44444&lt;/i&gt;&lt;/p&gt;', '127.0.0.1', 'Chrome 49.0.2623.87', NULL, '41467692326.txt'),
(166, '1', '1@mail.com', '', '&lt;p&gt;&lt;strong&gt;вввввввв&lt;/strong&gt;&lt;/p&gt;', '127.0.0.1', 'Chrome 49.0.2623.87', '11467694576.jpg', NULL),
(167, '5', '5@mail.com', '', '&lt;p&gt;&lt;i&gt;вывыывывыв&lt;/i&gt;&lt;/p&gt;', '127.0.0.1', 'Chrome 49.0.2623.87', '51467695662.jpg', '51467695662.txt');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=168;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
