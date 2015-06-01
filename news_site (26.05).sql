-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 26 2015 г., 22:56
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `news_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `arrImg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `arrImg`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, ''),
(32, '[]'),
(33, '["523303384.jpg","glavn999.jpg","flakon1418.png"]'),
(34, '["523303415.jpg","glavn764.jpg","flakon1779.png"]'),
(35, '["523303183.jpg","glavn811.jpg","flakon1565.png"]'),
(36, '[]'),
(37, '[]'),
(38, '["atp002026lg655.png","glavn625.jpg","fl1241.png"]'),
(39, '[]'),
(40, '["523303892.jpg","glavn124.jpg"]'),
(41, '[]'),
(42, '[]'),
(43, '[]'),
(44, '[]'),
(45, '["fl3743.png"]');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mini_text` text NOT NULL,
  `all_text` text NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(200) NOT NULL,
  `arrImg` text NOT NULL,
  PRIMARY KEY (`id_news`),
  KEY `author` (`author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2150 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `name`, `mini_text`, `all_text`, `date`, `author`, `arrImg`) VALUES
(2142, 'Школа будущего первоклассника', '0', '20 декабря традиционно распахнула свои двери «Школа будущего первоклассника». Театрализованное представление и первые уроки не оставили равнодушными самых требовательных родителей.', '2014-12-23 20:50:07', 'сош3', '["r179.jpg","r2365.jpg"]'),
(2143, 'Моя Родина — Россия', '0', 'С 19 по 23 декабря в школе проводился финал проекта «Моя Родина — Россия». В ходе работы над проектом ребята знакомились с историей, культурой, бытом и традициями нашей страны.\r\nС чего начинается Россия? Что она значит для подрастающего поколения? Ответы на эти вопросы искали старшеклассники.\r\n\r\nОбучающиеся 5-6 классов продемонстрировали свои знания истории и быта древней Руси  на брейн-ринге  «Я люблю тебя, Россия!» А на «Деревенских посиделках»  ученики  7-8 классов рассказывали  о традициях и культуре нашей страны.\r\n\r\nДанный проект завершил цикл школьных мероприятий, посвященных\r\nГоду культуры.', '2014-12-27 20:54:21', 'сош3', '["200141.jpg","300670.jpg"]'),
(2144, 'Неделя иностранных языков', '0', 'С 18 по 25 декабря 2014 года в школе прошла неделя иностранных  языков.  В преддверии Рождества, которое отмечается в Европейских странах 25 декабря, и Нового года все мероприятия были посвящены этим событиям. С 18 по 23 декабря прошел смотр-конкурс рождественских и новогодних поделок среди учеников  2-7 классов. Благодаря этому кабинет иностранных языков стал самым нарядным кабинетом во всей школе. На следующий день состоялся конкурс чтецов, на котором ученики декламировали стихотворения английских, немецких и французских поэтов. А завершилась неделя Рождественским концертом, который состоялся 25 декабря. В теплой и праздничной обстановке ученики представили подготовленные ими номера на трех языках, познакомились с рождественскими традициями Англии, Германии и Франция. А самые активные участники концертной программы получили сладкие призы.', '2015-01-04 21:13:56', 'сош3', '["5203.jpg","6708.jpg"]'),
(2145, '«Дом, в котором мы живём»', '0', 'С 27 по 31 января в школе проводился фестиваль искусств «Дом, в котором мы живём». Это одно из традиционных мероприятий.Оно посвящено дню рождения нашей школы, которая открыла свои двери для детей в январе 1961 года.\r\nШкола — это тот маленький мир, в котором наши ученики проживают 11 лет, и традиции школы для них — это когдакаждый нашел себе дело по душе, испытал ответственность за его результаты, чувство успеха и уверенность в себе, реализовал себя как индивидуальность. Их благотворное влияние мы чувствуем и в праздники и в повседневной школьной жизни.\r\nФестиваль проходил по нескольким номинациям: «Подарим праздник школе», «Старая сказка на школьный лад», «А напоследок я…»\r\nУченики 1-8 классов показывали концертную программу, состоящую из номеров разных жанров. А старшеклассники — театрализованные представления.', '2015-02-03 21:16:56', 'сош3', '["1681.jpg","2520.jpg","3971.jpg"]'),
(2146, 'Призёры муниципального этапа всероссийской олимпиады школьников', '0', 'Поздравляем призеров муниципального этапа всероссийской олимпиады школьников и учителей, подготовивших призеров!\r\n\r\nЛогинова Никиту (10 класс) – призера олимпиады по физической культуре, учитель – Соловьев Михаил Александрович.\r\nБарановскую Дарью (11 класс) – призера олимпиад по истории и праву, учителя – Панькевич Марина Александровна и Антонова Елена Алексеевна.\r\nМарченкову Карину и Московцеву Екатерину (8 класс) – призеров олимпиады по биологии, учитель – Солдатенкова Светлана Ярославна.\r\nЯскевич Алесю (10 класс) – призера олимпиады по ОБЖ, учитель – Андреенков Иван Степанович.\r\nГришина Владислава (10 класс) и Бизюкову Викторию (9 класс) – призеров олимпиады по биологии, учитель – Ракитская Наталья Афанасьевна.\r\nСавенко Георгия (9 класс) – призера  олимпиады по географии, учитель – Гавриленкова Наталья Николаевна.', '2015-02-04 21:45:34', 'сош3', '["7145.jpg"]'),
(2147, 'Школьная научная конференция', '0', '15 апреля 2015 года в школе прошла научная конференция учащихся, посвящённая Году литературы и 70-летию Великой Победы. В рамках конференции работало 2 секции: общественно-гуманитарная и естественно-математическая. Обучающиеся 5-10 классов представили свои работы, в которых прослеживалась взаимосвязь  истории, физики, химии и математики с литературой. По итогам конференции победителям, призёрам и участникам вручены дипломы.', '2015-04-23 21:47:40', 'сош3', '["7322.jpg"]'),
(2148, '«Сирень Победы»', '0', '23 апреля 2015 года в городе прошла акция  «Сирень Победы». Нашей школе посчастливилось  стать участниками этого памятного события, посвящённого 70-летию Великой Победы.\r\nВ парке «Реадовка» молодое поколение  и ветераны войны высадили молодые саженцы сирени. Никто не забыт и ничто не забыто…', '2015-04-23 22:02:02', 'сош3', '["siren433.jpg","siren2708.jpg"]'),
(2149, 'Международная научная конференция', '0', '20 мая в городе Могилёв прошла Международная научная конференция учащихся старших классов студентов, магистрантов и аспирантов «Память о Великой победе против фальсификации истории Великой Отечественной войны»,  посвященной     70-летию со дня Победы над гитлеровской Германией и её союзниками.\r\n\r\nНаша школа приняла участие в этой конференции. Ученик 9 класса «А» Савенко Георгий занял первое место. Поздравляем победителя и его научного руководителя — учителя истории Терещенкову Марину Владимировну!', '2015-05-23 22:07:41', 'сош3', '["gramota599.jpg","men191.jpg"]');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `static` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `text`, `visible`, `updated_at`, `created_at`, `static`) VALUES
(24, 'root меню123', '<p>те12</p>\r\n', 1, '2015-05-17 10:48:05', '2015-03-19 12:07:47', 0),
(25, 'test root 2222', 'те12', 1, '2015-03-24 06:38:55', '2015-03-19 12:08:13', 0),
(29, 'подменю доч24го', 'те12', 1, '2015-03-24 13:49:08', '2015-03-19 12:19:06', 0),
(30, 'доч25го', '111', 1, '2015-03-24 06:40:06', '2015-03-19 12:26:53', 0),
(35, ' ''test'' ', '', 1, '2015-05-26 16:47:33', '2015-04-23 19:48:12', 0),
(36, 'мама ''э''ыла "раму"111', '<p>ТЗ можно скачать здесь:</p>\r\n\r\n<p><a href="/upload/files/TZ%20-%20kopiya.doc">/upload/files/TZ%20-%20kopiya.doc</a></p>\r\n\r\n<p><img alt="" src="http://cool.ru/images/442-99ea7261d3b5ec9371361b3acf6c89f4.jpg" style="height:195px; width:200px" /></p>\r\n', 1, '2015-05-26 13:19:22', '2015-04-26 17:13:32', 0),
(41, '123:dmnfd;''fkjhsdj"', 'dfsd', 1, '2015-05-01 14:08:41', '2015-05-01 14:08:41', 0),
(44, 'Карта сайта', '', 1, '2015-05-26 16:46:58', '2015-05-17 11:19:16', 1),
(45, 'Телефоны доверия', '<p><span style="font-family: georgia, ''bitstream charter'', serif; font-size: 14px; line-height: 1.6em;">65-28-85 &mdash; Уполномоченный по правам человека в Смоленской области Капустин Александр Михайлович</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px"><span style="font-family:georgia,bitstream charter,serif">38-00-81 &mdash; Уполномоченный по правам ребенка в Смоленской области Михайлова Наталья Александровна</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">39-54-30 &mdash; Служба сопровождения социально-психолого-педагогической деятельности образовательных учреждений (ул. Витебское шоссе, д.42). Консультации психолога, социального педагога, логопеда</span></p>\r\n\r\n<p><span style="font-size:14px">32-11-86 &mdash; СОГОУ &laquo;Центр психолого-медико-социального сопровождения&raquo; (ул. Неверовского, д.26). Помощь оказывают специалисты: психологи, социальные педагоги, врачи-наркологи, юрисконсульт с 9.00 до 18.00 кроме субботы, воскресенья</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">38-04-15 &mdash; Управление опеки и попечительства Администрации г. Смоленска (ул. Дзержинского, д.9), правовой сектор</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">38-84-03 &mdash; МБОУ ДОД ДПЦ &laquo;Смоленские дворы&raquo; (ул. Дзержинского, д.19). Консультации психолога, социального педагога.&nbsp;&nbsp;Телефон доверия &mdash; 32-12-72</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">27-08-28 &mdash; ОГУЗ &laquo;Смоленский областной наркологический диспансер&raquo; (ул. Большая Советская, д.4).</span></p>\r\n\r\n<p><br />\r\n<span style="font-size:14px">27-09-98 &mdash; заместитель главного врача Трушина Елена Николаевна.</span></p>\r\n\r\n<p><br />\r\n<span style="font-size:14px">38-25-34 &mdash; неотложная наркологическая помощь, телефон доверия.</span></p>\r\n\r\n<p><br />\r\n<span style="font-size:14px">38-44-44 &mdash; дополнительная информация</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">27-10-35 &mdash; ОГУЗ &laquo;Смоленский областной центр по профилактике и борьбе со СПИД&nbsp;и инфекционными заболеваниями&raquo; (ул. Фрунзе, д.40). &nbsp;Анонимное (бесплатное, добровольное) обследование на ВИЧ-инфекцию, телефон доверия, консультации психолога, эпидемиолога.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">64-40-00 &mdash; Смоленский областной врачебно-физкультурный диспансер, ОЦПЧ &laquo;Млада&raquo;, телефон доверия.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">38-45-10 &mdash; Центр охраны здоровья детей (ул. Докучаева, д.1). Запись на прием к специалистам: медицинский психолог, психотерапевт, логопед, психиатр.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">27-07-73&nbsp;&mdash; Подразделение по делам несовершенно летних (ул. Витебское шоссе, д.3/20, ком. №3)</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">65-69-29&nbsp;&mdash; Прокурор Заднепровского района Никулин Александр Николаевич</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">64-91-49 &mdash; Управление Федеральной Службы Российской Федерации по контролю за оборотом наркотиков по Смоленской области, телефон доверия.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">27-14-47 &mdash; УМВД России по городу Смоленску (ул.&nbsp;Ново-Московская д.31).</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">31-06-15 &mdash; Отделение по делам несовершеннолетних.</span></p>\r\n', 1, '2015-05-26 13:21:39', '2015-05-17 18:24:14', 1),
(46, 'Контакты ', '<p>тут будут телефоны</p>\r\n', 1, '2015-05-17 18:36:37', '2015-05-17 18:36:22', 1),
(47, 'Основные сведения', '<p><span style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; font-style: italic; line-height: 24px;">МБОУ &laquo;СШ № 3&raquo; была создана в 1960 году. Приказ ГОРОНО №157/01 от 15.10.1960 года.</span><br style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; font-style: italic; line-height: 24px;" />\r\n<span style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; font-style: italic; line-height: 24px;">214006, Смоленск, ул. Фрунзе, д. 62а</span><br style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; font-style: italic; line-height: 24px;" />\r\n<span style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; font-style: italic; line-height: 24px;">тел/факс:8(4812)41-31-71; 27-05-07</span><br style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; font-style: italic; line-height: 24px;" />\r\n<span style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; font-style: italic; line-height: 24px;">эл. почта:shkol3-pokrovka@mail.ru</span></p>\r\n\r\n<p><strong style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Учредитель</strong></p>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Учредителем и собственником имущества Школы является город Смоленск.<br />\r\nФункции и полномочия Учредителя (собственника имущества) в отношении Школы осуществляются органом местного самоуправления &mdash; Администрацией города Смоленска.</p>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Местонахождение Учредителя: Российская Федерация, 214000, город Смоленск, улица Октябрьской Революции, дом 1/2.</p>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Управление образования и молодежной политики Администрации города Смоленска в пределах своей компетенции обеспечивает осуществление функций Администрации города Смоленска в сфере образования и молодежной политики на территории города Смоленска</p>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><strong style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">Режим работы</strong></p>\r\n\r\n<ul style="border: 0px; margin: 0px 0px 24px 1.5em; padding-right: 0px; padding-left: 0px; vertical-align: baseline; list-style: square; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">Понедельник &mdash; суббота с 7.30 до 19.40</li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">Воскресенье &mdash; выходной.</li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">Учебные занятия организованы в две смены</li>\r\n</ul>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><strong style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">График работы в 2014/2015 учебном году</strong></p>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Учебный год начинается 1 сентября 2014 года и заканчивается:</p>\r\n\r\n<ul style="border: 0px; margin: 0px 0px 24px 1.5em; padding-right: 0px; padding-left: 0px; vertical-align: baseline; list-style: square; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">25 мая 2015 года для 1, 9, 11 классов</li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">30 мая 2014 года для 2-8, 10 классов</li>\r\n</ul>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Каникулы:</p>\r\n\r\n<ul style="border: 0px; margin: 0px 0px 24px 1.5em; padding-right: 0px; padding-left: 0px; vertical-align: baseline; list-style: square; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">осенние &mdash; 3.11.14 &mdash; 9.11.14</li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">зимние &mdash; 30.12.14 &mdash; 11.01.15</li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">весенние &mdash; 20.03.15 &mdash; 29.03. 15</li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">дополнительно для 1 классов &mdash; 9.02.15 &mdash; 15.02.15</li>\r\n</ul>\r\n\r\n<p style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><span style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px;">Расписание&nbsp;</span><a href="/upload/files/raspisaniezvonkov.pdf" target="_blank">звонков</a><span style="font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px;">.</span></p>\r\n\r\n<p style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">&nbsp;</p>\r\n\r\n<table style="border: 0px; margin: 0px 0px 20px; padding: 0px; vertical-align: baseline; border-collapse: collapse; border-spacing: 0px; text-align: center; width: 639px; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">\r\n	<tbody style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">\r\n		<tr style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">Уровни образования</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">Классы</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">Численность обучающихся</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">Срок обучения</td>\r\n		</tr>\r\n		<tr style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">начальное общее образование</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">1-4 класс</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">321</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">4 года</td>\r\n		</tr>\r\n		<tr style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">основное общее образование</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">5-9 класс</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">335</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">5 лет</td>\r\n		</tr>\r\n		<tr style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;">\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">среднее общее образование</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">10-11 класс</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">86</td>\r\n			<td style="border: 1px solid rgb(153, 153, 153); margin: 0px; padding: 6px 20px; vertical-align: baseline; background: transparent;">2 года<br />\r\n			&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Формы обучения: очная, очно-заочная, заочная.</p>\r\n\r\n<p style="border: 0px; margin: 0px 0px 24px; padding: 0px; vertical-align: baseline; font-family: Georgia, ''Bitstream Charter'', serif; font-size: 16px; line-height: 24px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">Образование ведется на русском языке.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2015-05-26 18:35:20', '2015-05-26 18:35:20', 0),
(48, 'Структура и органы управления образовательной организацией', '<p><img alt="" src="/upload/images/struktura1.jpg" style="width: 600px; height: 500px;" /></p>\r\n', 1, '2015-05-26 18:39:46', '2015-05-26 18:37:48', 0),
(49, 'документы', '', 1, '2015-05-26 18:40:49', '2015-05-26 18:40:49', 0),
(50, 'Учредительные документы', '<ul>\r\n	<li><a href="/upload/files/USTAV.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;" target="_blank">УСТАВ</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="/upload/files/litsenziya1.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;" target="_blank">Лицензия на осуществление &nbsp;образовательной деятельности</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="http://school03.smoladmin.ru/wp-content/uploads/2014/11/akkreditatsiya.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;" target="_blank">Свидетельство о государственной аккредитации</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="http://school03.smoladmin.ru/wp-content/uploads/2014/11/svidetelstvo.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;">Свидетельство о постановке на учет в налоговом органе</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="http://school03.smoladmin.ru/DswMedia/sv-voovneseniizapisivedinyiygosyureestryuridicheskixlic.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;" target="_blank">Свидетельство о внесении записи в Единый гос. реестр юридических лиц</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="http://school03.smoladmin.ru/DswMedia/sv-voovneseniivreestrmunicipal-nogoimushaestva.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;" target="_blank">Свидетельство о внесении в Реестр муниципального имущества</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="http://school03.smoladmin.ru/wp-content/uploads/2014/11/zaklyuchenie.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;">Санитарно-эпидемиологическое заключение</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="http://school03.smoladmin.ru/wp-content/uploads/2014/11/Kollektivnyj-dogovor-na-2015-2018-god.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;">КОЛЛЕКТИВНЫЙ ДОГОВОР &nbsp;на 2015-2018 год</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="http://school03.smoladmin.ru/wp-content/uploads/2014/11/Pravila-vnutrennego-trudovogo-rasporyadka.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;">ПРАВИЛА &nbsp;внутреннего трудового распорядка для работников&nbsp;</a></li>\r\n	<li style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; background: transparent;"><a href="http://school03.smoladmin.ru/wp-content/uploads/2014/11/pravila-vnutrennego-rasporyadka-uchashhihsya.pdf" style="border: 0px; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(116, 51, 153); background: transparent;">ПРАВИЛА внутреннего распорядка учащихся</a></li>\r\n</ul>\r\n', 1, '2015-05-26 18:50:06', '2015-05-26 18:41:59', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pages_treepath`
--

CREATE TABLE IF NOT EXISTS `pages_treepath` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ancestor` int(11) NOT NULL,
  `descendant` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=153 ;

--
-- Дамп данных таблицы `pages_treepath`
--

INSERT INTO `pages_treepath` (`id`, `ancestor`, `descendant`, `level`) VALUES
(51, 24, 24, 1),
(52, 25, 25, 1),
(60, 24, 29, 2),
(61, 29, 29, 2),
(63, 25, 30, 2),
(64, 30, 30, 2),
(87, 24, 41, 2),
(88, 41, 41, 2),
(101, 43, 43, 1),
(103, 35, 35, 1),
(130, 36, 36, 1),
(135, 46, 46, 1),
(145, 45, 45, 1),
(146, 44, 44, 1),
(147, 47, 47, 1),
(148, 48, 48, 1),
(149, 49, 49, 1),
(150, 49, 50, 2),
(151, 50, 50, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `question` text NOT NULL,
  `mail` varchar(70) NOT NULL,
  `answer` text NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id`, `author`, `question`, `mail`, `answer`, `visible`) VALUES
(1, 'Алеша', 'Вопрос завучу Почему дети не доедают в столовой?', 'morozova@web-canape.com', 'потому что', 1),
(2, 'Настенька', 'Вопрос директору Хочу спросить: когда будет куплена машинка? очень хочется машинку', 'morozova@web-canape.com', 'когда заработаешь', 1),
(3, 'Алеша', 'Тема: ТЕМА Вопрос: хочу спросить, я вот такой любопытный и накатал вопрос больше, чем 20 символов.  нормально? хороший вопрос? работает функция аннонс?', 'morozova@web-canape.com', 'хороший вопрос, функция работает', 1),
(4, 'Анастасия', 'Тема: Директору. Меня заколебало писать этот сайт.', 'nika@yandex.ru', 'Пиши молча, не выпендривайся.', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
