-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.1.3:3306
-- Время создания: Апр 28 2020 г., 23:04
-- Версия сервера: 8.0.19
-- Версия PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `foodies_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assignment`
--

CREATE TABLE `assignment` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `assignment`
--

INSERT INTO `assignment` (`id`, `name`) VALUES
(1, 'A 1'),
(2, 'A 2'),
(3, 'A 3'),
(4, 'A 4'),
(5, 'A 5'),
(6, 'A 6');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Cat 1'),
(2, 'Cat 2'),
(3, 'Cat 3'),
(4, 'Cat 4');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `text` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pubtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `user_id`, `text`, `pubtime`) VALUES
(1, 4, 1, 'It\'s comment', '2020-04-26 21:56:06');

-- --------------------------------------------------------

--
-- Структура таблицы `cuisine`
--

CREATE TABLE `cuisine` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cuisine`
--

INSERT INTO `cuisine` (`id`, `name`) VALUES
(1, 'C 1'),
(2, 'C 2'),
(3, 'C 3'),
(4, 'C 4'),
(5, 'C 5'),
(6, 'C 6');

-- --------------------------------------------------------

--
-- Структура таблицы `detail_image`
--

CREATE TABLE `detail_image` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `num` tinyint UNSIGNED NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `detail_image`
--

INSERT INTO `detail_image` (`id`, `post_id`, `num`, `image`, `description`) VALUES
(1, 1, 1, '/users/user_1/post_1/images/1.png', 'fvfdfd'),
(2, 1, 2, '/users/user_1/post_1/images/2.png', 'fvdfdvv');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`) VALUES
(1, 'salt'),
(2, 'sugar'),
(3, 'eggs'),
(4, 'butter'),
(5, 'oil'),
(6, 'olives');

-- --------------------------------------------------------

--
-- Структура таблицы `liked`
--

CREATE TABLE `liked` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `liked`
--

INSERT INTO `liked` (`id`, `post_id`, `user_id`) VALUES
(1, 2, 32),
(2, 2, 38),
(3, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cooktime` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pubtime` datetime NOT NULL,
  `shares` int UNSIGNED NOT NULL,
  `likes` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `proteins` float UNSIGNED NOT NULL,
  `lipids` float UNSIGNED NOT NULL,
  `carbohydrates` float UNSIGNED NOT NULL,
  `calorific` float UNSIGNED NOT NULL,
  `cuisine_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `cooktime`, `image`, `description`, `pubtime`, `shares`, `likes`, `user_id`, `proteins`, `lipids`, `carbohydrates`, `calorific`, `cuisine_id`, `category_id`) VALUES
(1, 'My post 1', '30хв', 'none', 'dfdfgfdgdfbfb\r\ndfbbdfv\r\nbfbdb', '2020-04-20 00:00:00', 12, 13, 1, 23, 44, 22, 124, 1, 2),
(2, 'My post 2', '1 год', 'None', 'vvfdvf', '2020-04-19 00:04:00', 12, 43, 2, 23, 44, 22, 124, 2, 1),
(3, 'Post 3', '33', 'None', 'ddsvsdsvdsvdvs', '2020-04-19 00:00:00', 12, 23, 2, 12, 32, 12, 32, 1, 3),
(4, 'Post 4', '30 хв', 'aaaaaaaaaaaaaaa', 'fdbbnytnnytnytnty', '2020-04-20 13:50:57', 12, 432, 1, 23, 44, 22, 124, 3, 2),
(5, 'Best post 5', '1 год', 'None', 'ffdbukkyuikuyuku', '2020-04-19 14:00:30', 456, 123, 3, 23, 43, 23, 45644, 2, 1),
(6, 'Users post 6', '33', 'None', 'dfgfdfdbfdb', '2020-04-20 14:05:30', 34, 2, 3, 124, 432, 34, 4532, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `post_assignment`
--

CREATE TABLE `post_assignment` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `assignment_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `post_assignment`
--

INSERT INTO `post_assignment` (`id`, `post_id`, `assignment_id`) VALUES
(1, 1, 3),
(2, 1, 3),
(3, 5, 5),
(4, 1, 2),
(5, 4, 2),
(6, 4, 3),
(7, 6, 2),
(8, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `post_ingredient`
--

CREATE TABLE `post_ingredient` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `ingredient_id` int UNSIGNED NOT NULL,
  `amount` float UNSIGNED NOT NULL,
  `unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `post_ingredient`
--

INSERT INTO `post_ingredient` (`id`, `post_id`, `ingredient_id`, `amount`, `unit`) VALUES
(1, 1, 2, 100, 'g'),
(2, 1, 3, 3, 'i'),
(3, 2, 4, 123, 'mg'),
(4, 2, 6, 2, 'st'),
(5, 3, 4, 140, 'g'),
(6, 3, 1, 3, 'sp'),
(7, 4, 4, 100, 'g'),
(8, 6, 2, 3, 'i');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `locale` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `picture`, `locale`, `email`) VALUES
(1, 'Boiko', 'Not selected', 'uk', 'ekva@gmail.com'),
(2, 'serega', 'bdfdbfdb', 'Russia', 'fdfdb'),
(3, 'user', 'None', 'pl', 'user@gmail.com'),
(7, 'SERGEO', 'None', 'Ukraine', 'email@com'),
(32, 'NEWUSER1', 'dfgfdg', 'Ukraine', 'dublemail@com'),
(38, 'New user 1', 'None', 'uk', 'newusder@gmail.com'),
(132, 'В\'ячеслав Бойко', 'https://lh4.googleusercontent.com/-C8idGcU_x9g/AAAAAAAAAAI/AAAAAAAAAAA/AAKWJJNzMIa4YnxJaCtIc5jkPH_rnCyogQ/s96-c/photo.jpg', 'uk', 'bviacheslav.12@gmail.com'),
(141, 'Serega Carbon', 'https://lh3.googleusercontent.com/a-/AOh14Gj3t4Q0FN6vxGlRutvAaLRIa3QC7BdmJO84_g1zDg=s96-c', 'uk', 'ekvaserega@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `detail_image`
--
ALTER TABLE `detail_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Индексы таблицы `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_ibfk_2` (`cuisine_id`),
  ADD KEY `post_ibfk_3` (`category_id`);

--
-- Индексы таблицы `post_assignment`
--
ALTER TABLE `post_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Индексы таблицы `post_ingredient`
--
ALTER TABLE `post_ingredient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `cuisine`
--
ALTER TABLE `cuisine`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `detail_image`
--
ALTER TABLE `detail_image`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `liked`
--
ALTER TABLE `liked`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `post_assignment`
--
ALTER TABLE `post_assignment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `post_ingredient`
--
ALTER TABLE `post_ingredient`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `detail_image`
--
ALTER TABLE `detail_image`
  ADD CONSTRAINT `detail_image_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `liked_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liked_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_assignment`
--
ALTER TABLE `post_assignment`
  ADD CONSTRAINT `post_assignment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_assignment_ibfk_2` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_ingredient`
--
ALTER TABLE `post_ingredient`
  ADD CONSTRAINT `post_ingredient_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ingredient_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
