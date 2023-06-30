-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 28 2023 г., 13:54
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `miraclepaws`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access_rights`
--

CREATE TABLE `access_rights` (
  `id_access_rights` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `access_rights`
--

INSERT INTO `access_rights` (`id_access_rights`, `name`) VALUES
(1, 'Пользователь'),
(2, 'Администратор'),
(3, 'Волонтер');

-- --------------------------------------------------------

--
-- Структура таблицы `additional_photos_pets`
--

CREATE TABLE `additional_photos_pets` (
  `id_additional_photos_pets` int(11) NOT NULL,
  `id_pets` int(11) NOT NULL,
  `image_pets` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `additional_photos_pets`
--

INSERT INTO `additional_photos_pets` (`id_additional_photos_pets`, `id_pets`, `image_pets`) VALUES
(1, 5, 'lola3.png'),
(2, 5, 'lola4(1).jpg'),
(3, 5, 'lola5(1).jpg'),
(4, 6, 'crads(1).jpeg'),
(5, 6, 'crabs(2).jpeg'),
(6, 6, 'carbs(3).jpeg'),
(9, 1, 'Vampire Cat.jpeg649b74d764955..jpeg'),
(10, 1, '50 Times Cats Acted So Goofy, Their Owners Thought They Were Broken, As Shared By The ‘Cat Virus_Exe’ Page (New Pics).png649b74f54e818..png'),
(12, 1, 'Чёрная кошечка в парке & Чёрные кошечки & Фото.jpeg649b85a2cb0f5..jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `application_for_adoption`
--

CREATE TABLE `application_for_adoption` (
  `id_application_for_adoption` int(11) NOT NULL,
  `sending_date` date NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_application_status` int(11) NOT NULL,
  `id_pets` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `application_for_adoption`
--

INSERT INTO `application_for_adoption` (`id_application_for_adoption`, `sending_date`, `id_users`, `id_application_status`, `id_pets`, `comment`) VALUES
(1, '2023-06-02', 1, 3, 9, ''),
(2, '2023-06-05', 2, 3, 2, ''),
(3, '2023-06-27', 13, 3, 5, 'Я люблю милых животных'),
(4, '2023-06-27', 13, 1, 3, 'Кошки милашки'),
(6, '2023-06-28', 24, 3, 6, 'Британцы лучшие'),
(7, '2023-06-28', 24, 1, 7, 'пппрл');

--
-- Триггеры `application_for_adoption`
--
DELIMITER $$
CREATE TRIGGER `update_adopted_status` AFTER UPDATE ON `application_for_adoption` FOR EACH ROW BEGIN
  IF NEW.id_application_status = 1 AND OLD.id_application_status = 3 THEN
    UPDATE pets SET adopted = 'Да' WHERE id_pets = NEW.id_pets;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `application_status`
--

CREATE TABLE `application_status` (
  `id_application_status` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `application_status`
--

INSERT INTO `application_status` (`id_application_status`, `name`) VALUES
(1, 'Одобрено'),
(2, 'Не одобрено'),
(3, 'В рассмотрении');

-- --------------------------------------------------------

--
-- Структура таблицы `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id_diagnosis` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `diagnosis`
--

INSERT INTO `diagnosis` (`id_diagnosis`, `name`) VALUES
(1, 'Здорово'),
(2, 'Не здорово');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id_employees` int(11) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `date_of_birth` date NOT NULL,
  `id_gender_human` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id_employees`, `surname`, `name`, `middle_name`, `date_of_birth`, `id_gender_human`) VALUES
(1, 'Соколова', 'Мария', 'Алексеевна', '2000-06-13', 2),
(2, 'Ермаков', 'Глеб', 'Николаевич', '1997-05-07', 1),
(3, 'Сотникова', 'Каролина', 'Савельевна', '1996-03-04', 2),
(4, 'Кузнецов', 'Артем', 'Алексеевич', '2000-02-25', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `gender_human`
--

CREATE TABLE `gender_human` (
  `id_gender_human` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gender_human`
--

INSERT INTO `gender_human` (`id_gender_human`, `name`) VALUES
(1, 'Мужчина'),
(2, 'Женщина');

-- --------------------------------------------------------

--
-- Структура таблицы `medical_examination`
--

CREATE TABLE `medical_examination` (
  `id_medical_examination` int(11) NOT NULL,
  `date_event` date NOT NULL,
  `id_employees` int(11) NOT NULL,
  `id_pets` int(11) NOT NULL,
  `id_diagnosis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `medical_examination`
--

INSERT INTO `medical_examination` (`id_medical_examination`, `date_event`, `id_employees`, `id_pets`, `id_diagnosis`) VALUES
(1, '2023-06-13', 1, 5, 1),
(2, '2023-05-22', 3, 6, 2),
(3, '2023-04-25', 2, 1, 2),
(5, '2023-06-27', 3, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pets`
--

CREATE TABLE `pets` (
  `id_pets` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `wool` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `history` text NOT NULL,
  `photo_pets` varchar(255) NOT NULL,
  `kinship` varchar(20) NOT NULL,
  `adopted` varchar(3) NOT NULL,
  `arrival_date` date NOT NULL,
  `limit_expiration_date` date NOT NULL,
  `type_pets` varchar(20) NOT NULL,
  `gender_pets` varchar(20) NOT NULL,
  `additional_photos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pets`
--

INSERT INTO `pets` (`id_pets`, `name`, `age`, `weight`, `height`, `wool`, `color`, `history`, `photo_pets`, `kinship`, `adopted`, `arrival_date`, `limit_expiration_date`, `type_pets`, `gender_pets`, `additional_photos`) VALUES
(1, 'Пустырник', 6, 5, 23, 'Короткая', 'Черный', 'Пустырник - это милый и очаровательный кот, который обладает шерстью черного оттенка. Его глаза янтарные и они смотрят на мир с интересом и любопытством.\r\nПустырник очень любит веселиться и играть, особенно с различными игрушками для кошек. Он также любит спать, особенно на мягких и теплых подушках.\r\nПустырник может показаться скромным на первый взгляд, но это лишь первое впечатление. Он очень ласковый и охотно демонстрирует свою любовь каждый раз, когда вы с ним общаетесь.\r\nЕсли вы решите принять Пустырника к себе в дом, то это будет отличное решение, так как вы не только получите замечательного и верного друга, но и надежного стража, который будет охранять вас и ваш дом от злых духов и плохих снов.', 'motherwort.png', 'Есть брат', 'Нет', '2022-10-11', '2025-10-11', 'Кошка', 'Мальчик', 1),
(2, 'Пашка', 1, 5, 26, 'Короткая', 'Бежевый', 'Пашка - это крепкий и умный пес с красивой коричневой шерстью и ярко-карие глазами. Он очень активен и любит заниматься спортом, таким как бег и прыжки. Также Пашка обладает прекрасным чуть резким голосом, который он использует, чтобы защищать свой дом и территорию.\r\nЭта собака очень дружелюбна и имеет легкий характер, поэтому она идеально подходит для жизни в семье с детьми. Пашка всегда рад видеть своих хозяев и старается проявлять внимание и заботу о них.\r\nВ домашних условиях Пашка ласков и дружелюбен. Он любит ласку и общение и всегда готов к игре. Если у него возникают какие-то проблемы, он стремится найти поддержку и защиту у своих хозяев.\r\nПашка является прекрасным спутником, который всегда будет рядом с вами в любых приключениях. Он очень преданный и надежный пес, которого вы можете полюбить и доверять.', 'pashka.png', '', 'Нет', '2022-07-14', '2025-07-14', 'Собака', 'Мальчик', 0),
(3, 'Фиалка', 3, 6, 23, 'Короткая', 'Трехцветная', 'Фиалка - это изящная и очаровательная кошка с трехцветной и бирюзовыми глазами. Она полна грации и аристократичной заносчивости, которые притягивают внимание к ней.\r\nХотя Фиалка может казаться немного нахальной, она на самом деле очень ласковая и любит общаться со своими хозяевами. Она любит уют и комфорт, и часто ищет способы, чтобы устроить свою гнездовую зону на мягкой поверхности, например, на груди своего хозяина.\r\nНесмотря на то, что Фиалка довольно спокойная, она иногда проявляет забавные игривые привычки, такие как прыжки за лазерным лучом или мячиком. Она также может чувствовать себя некомфортно в компании других животных или новых людей, поэтому ей может потребоваться немного времени, чтобы привыкнуть к новой обстановке.\r\nФиалка является идеальным компаньоном для любой жизни, особенно для тех, кто ищет нежную и милую кошку, которая станет настоящим другом и спутником в жизни.', 'fialka.png', 'Есть сестра', 'Да', '2023-04-20', '2026-04-20', 'Кошка', 'Девочка', 0),
(4, 'Ариэль', 7, 5, 24, 'Короткая', 'Трехцветная', 'Ариэль - это очаровательная кошка с мягкой, белоснежной шерстью и карими глазами. Она очень активна и любознательна, всегда исследуя мир вокруг нее. Хотя Ариэль достаточно энергична и любит играть, она также может быть немного застенчивой на первый взгляд.\r\nКогда Ариэль находится в комфортной обстановке, она общительна и ласкова, часто ищет обнимашки и ласки от своих хозяев. Она также очень умная и быстро учиться, что делает ее отличным партнером в играх и тренировках.\r\nАриэль - это кошка, которая любит заботу и внимание. Она может быть застенчивой вокруг новых людей и других животных и может требовать некоторого времени, чтобы привыкнуть к новой обстановке. Однако, ее добродушный и ласковый характер делает ее прекрасным спутником для тех, кто ищет нежную и ласковую кошку.\r\nВ целом, Ариэль является очень активной, умной и заботливой кошкой, которая будет радовать своих хозяев своей привязанностью и энергией.', 'ariel.png', '', 'Нет', '2023-04-11', '2026-04-11', 'Кошка', 'Девочка', 0),
(5, 'Лола', 3, 10, 20, 'Короткая', 'Бежевый', 'Маленькая собачка до старости щенок. Вот и наша Лола, славная и до невозможности милая, ведёт себя, как собачий ребёнок.\r\nВесёлая, жизнерадостная, неунывающая и очень подвижная. Готова прыгать и бегать с утра до вечера. А ещё она очень добрая, нежная и ласковая девочка -подросток.\r\nС очень умными глазами и необыкновенно красивой шубкой. Лола очень любит ласку и даже обнимает лапками, стараясь продлить хоть на миг то счастье, когда рядом человек. Малышка очень смышленая и понимающая.\r\nПолюбуйтесь сами на эту красотку. Она станет для вас самой лучшей, любимой и милой. Отлично ладит с людьми и сородичами. Поверьте, когда вы возьмёте её на ручки, вам больше не захочется её отпускать. Любви и нежности в ней целый океан.\r\nЛола здорова, привита, имеет ветеринарный паспорт. Обработана от паразитов. Стерилизована и чипирована.', 'lola2.png', 'Есть брат', 'Нет', '2023-01-18', '2026-01-18', 'Собака', 'Девочка', 5),
(6, 'Крабс', 5, 8, 25, 'Короткая', 'Серый', 'Крабс - это кот породы британец, который имеет короткую мягкую серую шерсть, круглые зеленые глаза и очень крепкое телосложение.\r\nКак большинство представителей породы британцев, Крабс очень спокоен, неизбалованный и сдержанный. Он очень любит долгие сны на мягкой подушке и ласковое прикосновение своих хозяев.\r\nОднако, Крабс также является довольно игривым и любопытным котом, который обожает играть со своим любимым мячом и осваивать новые пространства в своем доме.\r\nКрабс является невероятно лояльным и привязанным к своим хозяевам. Он может очень сильно заботиться о них и всегда готов прийти на помощь, если владелец почувствует себя не хорошо. Кроме того, он может стать отличным \"ангелом-хранителем\" для своей семьи.\r\nВ целом, Крабс - это очень спокойный, игривый и лояльный кот, который обязательно станет прекрасным другом и компаньоном для всей семьи, особенно для тех, кто ищет домашнего питомца с более невысокими требованиями к уходу и воспитанию.', 'crabs.png', 'Есть брат', 'Нет', '2021-09-23', '2024-09-23', 'Кошка', 'Мальчик', 6),
(7, 'Фиона', 2, 30, 60, 'Длинная', 'Трехцветная', 'Фиона - это прекрасная собака среднего размера, которая обладает мягкой и гладкой шерстью, короткой мордашкой, красивыми карими глазами и длинными ушами. Она имеет спокойный и дружелюбный характер, что делает ее прекрасным компаньоном для всей семьи.\r\nФиона очень умная и быстро обучаемая собака. Она жаждет новых знаний и навыков, поэтому очень хорошо реагирует на обучение и занятия. Фиона является отличным выбором для тех, кто любит заниматься спортом или просто любит долгие прогулки на свежем воздухе, так как она очень энергична и любит движение.\r\nНесмотря на ее энергичность, Фиона также очень ласковая и преданная собака. Она окружает своих хозяев заботой и любовью, и всегда готова прийти на помощь. Она также очень дружелюбна и хорошо ладит с детьми и другими домашними животными.\r\nФиона имеет средние размеры, поэтому хорошо приспосабливается к различным условиям и обстановкам. Она может жить как в квартире, так и в большом доме с большим двором, главное - чтобы было достаточно места для движения.\r\nВ общем, Фиона - это прекрасная собака со спокойным и ласковым характером, которая будет прекрасным другом и компаньоном для всей семьи.', 'fiona.png', '', 'Да', '2022-09-22', '2025-09-22', 'Собака', 'Девочка', 0),
(8, 'Халк', 4, 6, 26, 'Длинная', 'Трехцветный', 'Халк - это крупный, мускулистый кот с густой и мягкой шерстью. У него большие, ярко зеленые глаза, которые заставляют его выглядеть поразительно на фоне его черной шерсти. Халк имеет независимый и спокойный характер, что делает его хорошим компаньоном для тех, кто ценит свою личную свободу и независимость.\r\nХалк - это очень умный и наблюдательный кот. Он быстро замечает все детали и изменения в окружающей обстановке, и всегда готов к действию. Этот кот имеет независимый характер, но при этом он любит получать ласку и внимание своих хозяев. Халк часто проявляет свою любовь к своим хозяевам путем потягивания к ним или ласковыми мурлыканьями.\r\nХалк - это прекрасный охотник, и его громадная мускулатура позволяет ему легко преодолевать большие расстояния. Он часто самостоятельно охотится на свою добычу, но физическая активность и игры с игрушками также помогут ему поддерживать хорошую форму.\r\nХалк не проявляет агрессивности по отношению к другим домашним животным, но он может показывать свою территориальность, особенно в присутствии других котов. Ему может понадобиться некоторое время, чтобы привыкнуть к новым людям и животным в своей новой обстановке.\r\nВ общем, Халк - это независимый, умный и мощный кот, который любит получать внимание своих хозяев и наслаждаться своей свободой. Он будет отличным компаньоном для тех, кто ищет не только красивого, но и независимого кота, который полюбит своих хозяев.', 'halk.png', 'Есть сестра', 'Нет', '2022-12-06', '2025-12-06', 'Кошка', 'Мальчик', 0),
(9, 'Ворчун', 1, 4, 15, 'Короткая', 'Трехцветный', 'Ворчун - это маленький щенок. Он имеет короткую и густую серую шерсть, огромные коричневые глаза и щегольскую улыбку. Несмотря на свою маленькую возрастную категорию, Ворчун уже демонстрирует свой независимый и стойкий характер.\r\nВорчун - это очень активный и любопытный щенок. Он любит исследовать мир, играть с игрушками и принимать участие в различных забавных занятиях. Хотя он может быть довольно настойчивым в своих желаниях, Ворчун также прекрасно слушается своих хозяев и быстро учится новым командам.\r\nВорчун - это щенок с развитым чувством юмора, он часто шутит и любит делать шалости. Большую часть времени он проводит в поисках новых игрушек и занятий, но также очень любит просто лежать на животе и получать ласку.\r\nВ общем, Ворчун - это маленький и энергичный щенок, который обладает огромным чувством юмора и независимым характером. Он будет прекрасным компаньоном для тех, кто любит активный образ жизни и может дать ему достаточно внимания и заботы.', 'vorchyn.png', '', 'Нет', '2023-06-12', '2026-06-12', 'Собака', 'Мальчик', 0),
(11, 'gggg', 3, 6, 24, 'Короткая', 'Серый', 'прлолдорорлдваплав', 'crabs.png6499d2c8eaf0b..png', '', 'Нет', '2020-04-01', '2023-04-01', 'Кошка', 'Девочка', 1),
(12, 'Прикольчик', 3, 6, 24, 'Короткая', 'Рыжий', 'апрпавапр', 'fanta.png6499e18661f91..png', 'Есть сестра', 'Нет', '2020-05-16', '2023-05-16', 'Кошка', 'Мальчик', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `quarantine`
--

CREATE TABLE `quarantine` (
  `id_quarantine` int(11) NOT NULL,
  `arrival_date` date NOT NULL,
  `release_date` date NOT NULL,
  `id_pets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `quarantine`
--

INSERT INTO `quarantine` (`id_quarantine`, `arrival_date`, `release_date`, `id_pets`) VALUES
(1, '2023-05-03', '2023-06-03', 3),
(2, '2023-03-08', '2023-04-08', 6),
(4, '2023-06-22', '2023-07-22', 3),
(7, '2023-06-09', '2023-07-09', 7),
(17, '2023-06-14', '2023-06-25', 4),
(18, '2023-06-01', '2023-06-30', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `email` varchar(64) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo_profile` varchar(255) NOT NULL,
  `id_access_rights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `name`, `surname`, `email`, `telephone`, `login`, `password`, `photo_profile`, `id_access_rights`) VALUES
(1, 'Мария', 'Васеленко', 'mariavaselenko@gmail.com', '79162472901', 'markycha679', '5274938vaselek', '', 1),
(2, 'Руслан', 'Севкаев', 'ruslansev602@gmail.com', '79160898899', 'ruslanN', 'ruslan399', '', 1),
(3, 'Николай', 'Купринов', 'nikolakypri@mail.com', '79996788876', 'nikola', 'nikkk222', '', 2),
(4, 'Григорий', 'Цветочкин', 'grigoricolor@mail.com', '79167895546', 'grigory', '1234567890hf', '1628688063_16-p-kotik-iz-shreka-foto-s-glazami-18.jpg649a0aae40fa9..jpg', 3),
(6, 'Мария', 'Потапенко', 'maria@mail.you', '79995678777', 'maria', '6eea9b7ef19179a06954edd0f6c05ceb', '', 1),
(7, 'Андрей', 'Ефременко', 'andrey@mail.com', '79995678777', 'andrey', 'e807f1fcf82d132f9bb018ca6738a19f', '', 1),
(8, 'Мария', 'Ефременко', 'maria@mail.you', '79995678777', 'mmmm', '12fab7a1eb36dafa990510a527623cd4', '', 1),
(9, 'Мария', 'Ефременко', 'maria@mail.you', '79995678777', 'kkkkkkk', '949a248a33cd003a7e19e6dbeec61677', '', 1),
(10, 'Мария', 'Романенко', 'regif@mail.you', '79995678777', 'hhrhhrh', 'b51df5fedbd65207fcd9e97ce8d1f1cf', '', 1),
(11, 'Регина', 'Карьгина', 'reginavff@mail.you', '79995678777', 'regina', 'b231d98de99e0d77e3207691337f6b45', '', 1),
(12, 'Ирина', 'Каринова', 'kar@gmail.com', '79995678777', 'karina', '3b0f796e863a9ac1228b11758874af70', 'profile_foto.jpeg649a26809b07c..jpeg', 2),
(13, 'Роман', 'Романенко', 'reif@mail.you', '79995557865', 'roma', 'e807f1fcf82d132f9bb018ca6738a19f', 'загрузка.jpeg649a30ce0a584..jpeg', 1),
(14, 'Евгений', 'Лимонов', 'ejjfjjfjj@mail.com', '79998769875', 'kotik', '083f99877420783b7f589c361fad2dd7', 'photo_2022-09-23_23-18-57.jpg649a0c085c67b..jpg', 3),
(20, 'Мария', 'Потапенко', 'regif@mail.you', '79998768798', 'fksks', '477474774747hhh', 'sample-red-200x200.jpeg64998926480f8..jpeg', 3),
(21, 'Маркуша', 'Ефременко', 'regif@mail.you', '79999997777', 'gfggfgfg', '477474774747hhh', 'Vampire Cat.jpeg649bfae3e73d7..jpeg', 3),
(22, 'Елена', 'Игристая', 'elenaIgr@mail.com', '79995678777', 'elenaa', 'a27d3c4945cebd839132d3aa0f675644', '50 Times Cats Acted So Goofy, Their Owners Thought They Were Broken, As Shared By The ‘Cat Virus_Exe’ Page (New Pics).png649b82f7ed0ff..png', 2),
(24, 'Костя', 'Фомин', 'kost@mail.com', '79995678777', 'kosty', '6435592d5f7999a5c730bd7fa118396c', 'загрузка (1).jpeg649bfbb518d61..jpeg', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access_rights`
--
ALTER TABLE `access_rights`
  ADD PRIMARY KEY (`id_access_rights`);

--
-- Индексы таблицы `additional_photos_pets`
--
ALTER TABLE `additional_photos_pets`
  ADD PRIMARY KEY (`id_additional_photos_pets`),
  ADD KEY `id_pets` (`id_pets`);

--
-- Индексы таблицы `application_for_adoption`
--
ALTER TABLE `application_for_adoption`
  ADD PRIMARY KEY (`id_application_for_adoption`),
  ADD KEY `id_application_status` (`id_application_status`),
  ADD KEY `id_pets` (`id_pets`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`id_application_status`);

--
-- Индексы таблицы `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id_diagnosis`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employees`),
  ADD KEY `id_gender_human` (`id_gender_human`);

--
-- Индексы таблицы `gender_human`
--
ALTER TABLE `gender_human`
  ADD PRIMARY KEY (`id_gender_human`);

--
-- Индексы таблицы `medical_examination`
--
ALTER TABLE `medical_examination`
  ADD PRIMARY KEY (`id_medical_examination`),
  ADD KEY `id_diagnosis` (`id_diagnosis`),
  ADD KEY `id_employees` (`id_employees`),
  ADD KEY `id_pets` (`id_pets`);

--
-- Индексы таблицы `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id_pets`),
  ADD KEY `id_type_pets` (`type_pets`),
  ADD KEY `id_gender_pets` (`gender_pets`);

--
-- Индексы таблицы `quarantine`
--
ALTER TABLE `quarantine`
  ADD PRIMARY KEY (`id_quarantine`),
  ADD KEY `id_pets` (`id_pets`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_access_rights` (`id_access_rights`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access_rights`
--
ALTER TABLE `access_rights`
  MODIFY `id_access_rights` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `additional_photos_pets`
--
ALTER TABLE `additional_photos_pets`
  MODIFY `id_additional_photos_pets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `application_for_adoption`
--
ALTER TABLE `application_for_adoption`
  MODIFY `id_application_for_adoption` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `application_status`
--
ALTER TABLE `application_status`
  MODIFY `id_application_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id_diagnosis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employees` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `gender_human`
--
ALTER TABLE `gender_human`
  MODIFY `id_gender_human` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `medical_examination`
--
ALTER TABLE `medical_examination`
  MODIFY `id_medical_examination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `pets`
--
ALTER TABLE `pets`
  MODIFY `id_pets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `quarantine`
--
ALTER TABLE `quarantine`
  MODIFY `id_quarantine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `additional_photos_pets`
--
ALTER TABLE `additional_photos_pets`
  ADD CONSTRAINT `additional_photos_pets_ibfk_1` FOREIGN KEY (`id_pets`) REFERENCES `pets` (`id_pets`);

--
-- Ограничения внешнего ключа таблицы `application_for_adoption`
--
ALTER TABLE `application_for_adoption`
  ADD CONSTRAINT `application_for_adoption_ibfk_1` FOREIGN KEY (`id_application_status`) REFERENCES `application_status` (`id_application_status`),
  ADD CONSTRAINT `application_for_adoption_ibfk_2` FOREIGN KEY (`id_pets`) REFERENCES `pets` (`id_pets`),
  ADD CONSTRAINT `application_for_adoption_ibfk_3` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_gender_human`) REFERENCES `gender_human` (`id_gender_human`);

--
-- Ограничения внешнего ключа таблицы `medical_examination`
--
ALTER TABLE `medical_examination`
  ADD CONSTRAINT `medical_examination_ibfk_1` FOREIGN KEY (`id_diagnosis`) REFERENCES `diagnosis` (`id_diagnosis`),
  ADD CONSTRAINT `medical_examination_ibfk_2` FOREIGN KEY (`id_employees`) REFERENCES `employees` (`id_employees`),
  ADD CONSTRAINT `medical_examination_ibfk_3` FOREIGN KEY (`id_pets`) REFERENCES `pets` (`id_pets`);

--
-- Ограничения внешнего ключа таблицы `quarantine`
--
ALTER TABLE `quarantine`
  ADD CONSTRAINT `quarantine_ibfk_1` FOREIGN KEY (`id_pets`) REFERENCES `pets` (`id_pets`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_access_rights`) REFERENCES `access_rights` (`id_access_rights`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
