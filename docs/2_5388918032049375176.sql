-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Сен 08 2020 г., 08:48
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ledmage`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` int(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts_status`
--

CREATE TABLE `posts_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `id_status` int(11) NOT NULL DEFAULT '1',
  `id_role` int(11) NOT NULL DEFAULT '1',
  `at_created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `age`, `token`, `id_status`, `id_role`, `at_created`) VALUES
(1, 'qwe123@gmail.ru', '200820e3227815ed1756a6b531e7e0d2', 'Вася ', 'Пупкин', '2020-09-01', 'b2974c76b7bb657e1c13905ad14ad33bcb6c4bd9d016b02766c9383d7e203fa4f246877639a830829e3c72154e27f84bbb36', 1, 1, '0000-00-00 00:00:00'),
(3, 'GTR@qwe.com', '6eea9b7ef19179a06954edd0f6c05ceb', 'Влад', 'Совельев', '2020-09-02', NULL, 1, 1, '0000-00-00 00:00:00'),
(4, 'GTR1@qwe.com', '6eea9b7ef19179a06954edd0f6c05ceb', 'Влад', 'Совельев', '2020-09-02', NULL, 1, 1, '0000-00-00 00:00:00'),
(5, 'DWW@wjiefj.qwe', 'b26986ceee60f744534aaab928cc12df', 'qweqwe', '', '2020-09-04', NULL, 1, 1, '0000-00-00 00:00:00'),
(6, 'qwe123@gmaiqwdwddl.ru', '25d55ad283aa400af464c76d713c07ad', 'Ruslanchik', 'Shaigadamchik', '2001-10-31', '835dfdec35cecf58a7fb928be9f3b1b3eed0d87bc0df1c85d52237985333e58f367f9e3ecc6968052051928f03b28cbcf2b7', 1, 1, '0000-00-00 00:00:00'),
(7, 'qwe123@gmail.ja', '1bbd886460827015e5d605ed44252251', 'qwe', 'qwe', '2020-06-03', 'cd1350ec9f33cd9ae094ed85f89ebd1b668006fd2258495067a52cec58e899b1a8cf6dad5faa67cb55e5d539b6b0f162ffb0', 1, 1, '0000-00-00 00:00:00'),
(8, 'GTxx5R@qwe.com', '25f9e794323b453885f5181f1b624d0b', 'Влад', 'Осинцев', '2020-09-01', NULL, 1, 1, '0000-00-00 00:00:00'),
(9, 'GTssxx5R@qwe.com', 'b26986ceee60f744534aaab928cc12df', 'Влад', 'Осинцев', '2020-09-07', '3a9850d6957125a892efbde35fbc54b15705a47fd4590b2b3d9ef29b58b7012d625985e57dbc4094e227ad4eced8b4a0f156', 1, 1, '2020-09-08 03:43:37'),
(10, 'GTssxxddd5R@qwe.com', '25f9e794323b453885f5181f1b624d0b', 'Влад', 'Осинцев', '2020-09-01', 'fcc468f80142318253a5a90b39a0ba231a93bf3cd835b3db6600199ff54c4c77eec61a065b480eb3c5a6597935a827c37ba5', 1, 1, '2020-09-08 03:45:08');

-- --------------------------------------------------------

--
-- Структура таблицы `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_role`
--

INSERT INTO `users_role` (`id`, `name`, `description`) VALUES
(1, 'пользватель', NULL),
(2, 'администратор', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users_status`
--

CREATE TABLE `users_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_status`
--

INSERT INTO `users_status` (`id`, `name`, `description`) VALUES
(1, 'Активный', NULL),
(2, 'БАН', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `posts_status`
--
ALTER TABLE `posts_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `user_ibfk_1` (`id_status`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_status`
--
ALTER TABLE `users_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `posts_status`
--
ALTER TABLE `posts_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users_status`
--
ALTER TABLE `users_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `posts_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `users_status` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
