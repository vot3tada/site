-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 19 2022 г., 16:45
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `data`
--

-- --------------------------------------------------------

--
-- Структура таблицы `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `user` varchar(32) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stage` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `exercises`
--

INSERT INTO `exercises` (`id`, `user`, `name`, `description`, `stage`) VALUES
(35, 'votetada', 'Абоба', '-Купить абобу\r\n-Удалить абобу\r\n-Иван привет\r\n-хочу кушац\r\n', 1),
(36, 'votetada', 'Тренировка', 'биг дата\r\nшоу юр мотивэшион', 2),
(42, 'votetada', 'Че-нибудь', 'Купить хлеб и масло, вытряхнуть палас', 1),
(44, 'Aboba', 'Я второй пользователь', 'Хочу купить горилки', 0),
(47, 'votetada', 'Дивизия', 'Моя голова стального ведра,\r\nЯ слишком давно стою вот так.\r\nМасленка как знак, в девичьих руках\r\nЯ кажется вляпался как тогда\r\nИ все это бред, и сердца нет\r\nСоломенный дурень сгорит хохоча\r\nНо я не могу, я просто уйду\r\nПо дороге из желтого кирпича…\r\n', 2),
(49, 'votetada', 'Скрипты не работают', '&#60;script&#62;alert(&#34;Привет&#34;);&#60;/script&#62;\r\n&#60;script&#62;alert(&#34;ТУТУТУ&#34;);&#60;/script&#62;', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`) VALUES
('Aboba', '12345'),
('votetada', '1234');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercises_fk` (`user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_fk` FOREIGN KEY (`user`) REFERENCES `users` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
