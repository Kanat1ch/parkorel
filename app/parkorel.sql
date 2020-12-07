-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 07 2020 г., 15:43
-- Версия сервера: 5.7.24
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `parkorel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', NULL, '2020-12-03 13:11:28');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(11) NOT NULL,
  `codes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Структура таблицы `attr`
--

CREATE TABLE `attr` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `adult` varchar(20) NOT NULL,
  `child` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `places` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `ban` varchar(255) NOT NULL,
  `obligation` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attr`
--

INSERT INTO `attr` (`id`, `title`, `adult`, `child`, `time`, `places`, `age`, `ban`, `obligation`, `img`) VALUES
(4, 'dsdsds', 'dsds', '800', '2 часа', '10', 'dsds', '<p>gddgdgdgd</p>', '<p>gdgdgd</p>', '5fc9122c41a05.png'),
(5, 'vfgdfgf', 'fg', 'fgfgf', 'gfgf', 'gfgfg', 'fgfg', 'gfgfgfg', 'gfgfgf', 'https://via.placeholder.com/150\r\n'),
(6, 'vfgdfgf', 'fg', 'fgfgf', 'gfgf', 'gfgfg', 'fgfg', 'gfgfgfg', 'gfgfgf', 'https://via.placeholder.com/150\r\n'),
(7, 'vfgdfgf', 'fg', 'fgfgf', 'gfgf', 'gfgfg', 'fgfg', 'gfgfgfg', 'gfgfgf', 'https://via.placeholder.com/150\r\n'),
(8, 'Максим пидор', '20 руб.', '100 руб.', '30 мин.', '150', '100', 'Бля, ну Максиму точно нельзя', 'Состаь хуй у Максима', 'https://via.placeholder.com/150'),
(9, 'asasa', 'saa', 'sa', 'sa', 'asa', 'saas', '<p>asasa</p>', '<p>asasasa</p>', '5fc8cfba0ca39.png'),
(10, 'dsdsds', 'dsds', 'sdds', 'dsds', 'dsds', 'dsds', '<p>sddsd</p>', '<p><strong>dsds</strong><em>dsds</em>dsds</p>', '5fc8d202f0539.png'),
(11, 'Бухич на чентральной площади в 21:00', '1000', '800', '2 часа', '10', 'от 12 до 28', '<p>Пить пиво после водки, ну чуть чуть если тока</p>', '<p>Стрельнуть сижку если его попросят, из уважения к организаторам желательно стрельнуть 2 сиги</p>', '5fc8d3b36a9ae.jpg'),
(12, 'asasa', 'аававфы', 'авфафаф', 'фафаф', 'фаафафаф', 'афафафафаф', '<p>-Привет</p>\r\n<p>-Пошел нахуй&nbsp;<strong>пидорас</strong></p>', '<p>-Привет</p>\r\n<p>-Пошел нахуй&nbsp;<strong>пидорас</strong></p>', '5fca12259c2bc.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `clubimg`
--

CREATE TABLE `clubimg` (
  `id` int(11) NOT NULL,
  `cid` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clubimg`
--

INSERT INTO `clubimg` (`id`, `cid`, `img`) VALUES
(5, '1', '5fce3adf76a26.png');

-- --------------------------------------------------------

--
-- Структура таблицы `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clubs`
--

INSERT INTO `clubs` (`id`, `title`, `director`, `phone`, `content`, `img`) VALUES
(1, 'fdfdfd', 'gfghgf', '+7 (903)614 50-77', '<p>авававава&nbsp; авав</p>\r\n<p><strong>авававав</strong></p>', '5fca0ff7520c7.png');

-- --------------------------------------------------------

--
-- Структура таблицы `docs`
--

CREATE TABLE `docs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `docs`
--

INSERT INTO `docs` (`id`, `title`, `link`) VALUES
(8, 'Писюн', 'Задание по инженерному проекту осень 2020 (2).pdf.pdf'),
(9, 'Новый писюн', 'Извещение об организации праздничной торговли 05 августа.docx.docx');

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `title`, `link`, `img`) VALUES
(2, 'MosPolytech', 'https://new.mospolytech.ru/', '5fc93c23cea86.png');

-- --------------------------------------------------------

--
-- Структура таблицы `postimg`
--

CREATE TABLE `postimg` (
  `id` int(11) NOT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `postimg`
--

INSERT INTO `postimg` (`id`, `pid`, `img`) VALUES
(28, '5', '5fcd1c24a44f2.png'),
(30, '5', '5fcd1c32c25f1.png'),
(32, '2', '5fcd1c47b406a.jpg'),
(34, '4', '5fcd1d4342620.jpg'),
(35, '4', '5fcd1d4a7909f.png'),
(36, '4', '5fcd1d682ee17.png'),
(52, '7', '5fce269d19ad0.png'),
(53, '7', '5fce26a2e9d7d.png');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` varchar(256) NOT NULL,
  `start` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `start`, `img`) VALUES
(2, 'gfgfdgfdgdf', '<p>ddggddgdgd</p>', 'gddgdgd', '5fca7821c9c03.jpg'),
(3, 'fdgfdgdf', '<p>gdgdgdgdgdgd</p>', 'gdgdgd', '5fcbd109d42e1.jpg'),
(4, 'dfgfdgdf', '<p>hdhdhdhd</p>', 'gdhdhgdfhd', '5fcbd12041616.png'),
(5, 'gfdgfdgdf', '<p>dgdgdgdg</p>', 'gdgdgdgd', '5fcbd129d46a1.png'),
(6, 'аолвыоалтыволаыв', '<p>кпукпекпек</p>', 'авыолатвгшыаывавы', '5fcbe08a46e5e.png'),
(7, 'авыавыаываываывпварпорпорвпв', '<p>длрдрлдродрдгшлгшд<strong>шгдшгдшг<em>дшгдгшдшг</em>гш</strong>дшгдшгдшгдгшдлгш</p>', 'опрорпорпллорлордордолд', '5fcbf23c14a3c.png');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `vacancy` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `vacancy`, `surname`, `name`, `patronymic`, `phone`) VALUES
(1, 'bgfbgfbgf', 'апавпва', 'пвпва', 'пвапва', 'пвпвпв');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`, `content`, `phone`, `img`) VALUES
(1, 'fsfsafafdas', 'fsafasfasgfgdf', 'hghghg', '5fc949e56048c.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(30) NOT NULL,
  `claim` varchar(255) NOT NULL,
  `abligation` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`id`, `title`, `price`, `claim`, `abligation`, `img`) VALUES
(6, 'hgfhgf', 'jfjf', 'jffj', 'jfjffj', 'fjjfjf'),
(7, 'bgfbgfbgf', 'bgfbgfbgfbgf', '<p>bgfbgfbgf</p>', '<p>bgfbgfbgfbgf</p>', '5fcced7d60864.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Индексы таблицы `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attr`
--
ALTER TABLE `attr`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clubimg`
--
ALTER TABLE `clubimg`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `postimg`
--
ALTER TABLE `postimg`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `attr`
--
ALTER TABLE `attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `clubimg`
--
ALTER TABLE `clubimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `postimg`
--
ALTER TABLE `postimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
