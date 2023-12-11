-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 11 дек 2023 в 16:54
-- Версия на сървъра: 10.4.27-MariaDB
-- Версия на PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `university`
--

-- --------------------------------------------------------

--
-- Структура на таблица `disciplines`
--

CREATE TABLE `disciplines` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `semester` int(1) NOT NULL,
  `teacher_id` int(6) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `disciplines`
--

INSERT INTO `disciplines` (`id`, `name`, `semester`, `teacher_id`) VALUES
(1, 'Математика', 1, 1),
(2, 'WEB Дизайн', 3, 1),
(3, 'Базово Програмиране', 5, 1),
(4, 'Електроника', 3, 2),
(5, 'Спорт(ССП)', 2, 2),
(6, 'Синтез и анализ на алгоритми', 6, 3),
(7, 'Логика и Автомати', 4, 4),
(8, 'Английски език', 6, 4),
(9, 'Дискретни структури', 7, 5),
(10, 'База Данни', 1, 5),
(11, 'ООП', 2, 6),
(12, 'Организация на комютъра', 6, 7),
(13, 'Системен Анализ', 8, 8),
(14, 'Микропоцесорни технологии', 5, 9);

-- --------------------------------------------------------

--
-- Структура на таблица `grades`
--

CREATE TABLE `grades` (
  `id` int(6) UNSIGNED NOT NULL,
  `student_id` int(6) UNSIGNED DEFAULT NULL,
  `discipline_id` int(6) UNSIGNED DEFAULT NULL,
  `grade` decimal(3,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `discipline_id`, `grade`, `date`) VALUES
(4, 2, 1, '6.00', '2023-05-06'),
(5, 2, 7, '5.00', '2023-05-17'),
(6, 3, 11, '5.00', '2023-05-18'),
(7, 3, 10, '3.00', '2023-02-16'),
(8, 4, 5, '3.00', '2023-05-05'),
(9, 4, 10, '5.00', '2023-05-12'),
(10, 5, 4, '5.00', '2023-05-10'),
(11, 5, 2, '2.00', '2023-05-10'),
(12, 6, 13, '4.00', '2023-05-11'),
(13, 7, 5, '4.00', '2023-05-03'),
(14, 8, 14, '6.00', '2023-05-17'),
(15, 7, 5, '6.00', '2023-05-04'),
(16, 8, 2, '4.00', '2023-05-11'),
(17, 9, 3, '6.00', '2023-05-04'),
(18, 9, 8, '4.00', '2023-05-18'),
(19, 10, 7, '3.00', '2023-05-18'),
(20, 10, 8, '5.00', '2023-05-12'),
(21, 11, 9, '4.00', '2023-05-11'),
(22, 12, 13, '6.00', '2023-05-11'),
(23, 12, 12, '5.00', '2023-05-10'),
(24, 12, 11, '5.00', '2023-05-19'),
(25, 12, 8, '4.00', '2023-05-10'),
(26, 13, 3, '4.00', '2023-05-11'),
(27, 13, 4, '6.00', '2023-02-16'),
(28, 13, 6, '5.00', '2023-05-03'),
(29, 14, 6, '6.00', '2023-04-30'),
(30, 14, 9, '5.00', '2023-05-02'),
(32, 15, 12, '4.00', '2023-05-03'),
(33, 15, 12, '5.00', '2023-05-05'),
(37, 2, 1, '5.00', '2023-12-06'),
(38, 9, 1, '4.00', '2023-12-07'),
(39, 1, 1, '4.00', '2023-12-06'),
(40, 1, 1, '3.00', '2023-12-10'),
(41, 1, 2, '6.00', '2023-12-01'),
(42, 8, 1, '4.00', '2023-12-07'),
(43, 17, 1, '5.00', '2023-12-08'),
(44, 17, 2, '3.00', '2023-12-08'),
(45, 17, 8, '6.00', '2023-12-02');

-- --------------------------------------------------------

--
-- Структура на таблица `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `majors`
--

INSERT INTO `majors` (`id`, `name`) VALUES
(1, 'Автоматика, информационни и управляващи компютърни системи (АИУКС)'),
(2, 'Автомобилна електроника - Интелигентни транспортни системи (ИТС)'),
(3, 'Автомобилна техника (АТ)'),
(4, 'Агрономство (А)'),
(5, 'Биомедицинска електроника (БМЕ)'),
(7, 'Електроенергетика (ЕЕ)'),
(8, 'Електроника (Е)'),
(9, 'Изкуствен интелект (ИИ)'),
(10, 'Индустриален дизайн (ИД)'),
(11, 'Индустриален мениджмънт (ИМ)'),
(12, 'Информационни и комуникационни технологии (ИКТ)'),
(13, 'Киберсигурност (КС)'),
(14, 'Компютъризирани технологии в машиностроенето (КТМ)'),
(15, 'Компютърни системи и технологии (КСТ)'),
(16, 'Software and Internet Technologies (SIT)'),
(17, 'Транспортна техника и технологии (ТТТ)'),
(18, 'Възобновяеми енергийни източници (ВЕИ)'),
(20, 'Топлотехника и инвестиционно проектиране (ТИП)'),
(21, 'Технологично предприемачество и иновации (ТПИ)');

-- --------------------------------------------------------

--
-- Структура на таблица `students`
--

CREATE TABLE `students` (
  `id` int(6) UNSIGNED NOT NULL,
  `faculty_number` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `major_id` int(11) DEFAULT NULL,
  `course` int(1) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `students`
--

INSERT INTO `students` (`id`, `faculty_number`, `name`, `major_id`, `course`, `email`) VALUES
(1, '21621589', 'Борис Георгиев', 16, 3, 'bgeorgiev02@gmail.com'),
(2, '21121486', 'Алекс Орозов', 1, 2, 'gfiogjfiujirfuj@gmail.com'),
(3, '21621611', 'Богомил Донков', 1, 6, 'fgjufgikfig@gmail.com'),
(4, '21262176', 'Иван Тодоров', 2, 7, 'hghhkggkhg@gmail.com'),
(5, '31231235', 'Петър Димитров', 2, 4, 'hgihjgifjgijf@gmail.com'),
(6, '4324234324', 'Александър Робов', 9, 7, 'ghuirfjhgiuf@gmail.com'),
(7, '432423432', 'Алекс Шопов', 9, 1, 'gfiogjfiujirfuj@gmail.com'),
(8, '5635345', 'Благой Георгиев', 11, 3, 'ghfghfghfghf@gmnai.com'),
(9, '423432432', 'Станимир Ахилов', 11, 1, 'ghfghfghfghf@gmnai.com'),
(10, '45345345', 'Васил Иванов', 13, 5, 'hghhkggkhg@gmail.com'),
(11, '543254325', 'Теодор Тодоров', 13, 2, 'fgdfgdsfg@gmail.com'),
(12, '345345', 'Владимир Владимиров', 15, 6, 'hhfyrthf@gmail.com'),
(13, '4234234', 'Ангел Ангелов', 15, 5, 'ghfghfghfghf@gmnai.com'),
(14, '5435345', 'Иван Петканов', 16, 5, 'hgihjgifjgijf@gmail.com'),
(15, '53534534', 'Даниел Атанасов', 16, 6, 'fgdfgdsfg@gmail.com'),
(17, '20621598', 'Дамян Карастоянов', 18, 5, 'damqn@gmail.com');

-- --------------------------------------------------------

--
-- Структура на таблица `teachers`
--

CREATE TABLE `teachers` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `title_id` int(10) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `serial_number`, `title_id`, `phone`, `email`) VALUES
(1, 'Антоанета Иванова Иванова-Димитрова', '10201', 3, '+359 889 22 3344', 'antoaneta.ivanova@example.com'),
(2, 'Велислав Василев Колесниченко', '10514', 3, '+359 885 44 5566', 'velislav.kolesnichenko@example.com'),
(3, 'Виолета Тодорова Божикова', '10205', 2, '+359 886 11 2233', 'violeta.bozhikova@example.com'),
(4, 'Гео Василев Кунев', '10208', 1, '+359 887 33 4455', 'geo.kunev@example.com'),
(5, 'Даниела Иванова Петрова', '10526', 3, '+359 880 66 7788', 'daniela.petrova@example.com'),
(6, 'Димитричка Желева Николаева', '10454', 3, '+359 889 99 0011', 'dimitrichka.nikolaeva@example.com'),
(7, 'Диян Желев Динев', '10487', 2, '+359 882 88 9900', 'diyana.dinev@example.com'),
(8, 'Доника Георгиева Стоянова', '10522', 2, '+359 881 77 6655', 'donika.stoyanova@example.com'),
(9, 'Марияна Цветанова Стоева', '10217', 1, '+359 886 55 6677', 'mariana.stoeva@example.com'),
(10, 'Мая Петрова Тодорова', '10218', 4, '+359 884 11 2233', 'maya.todorova@example.com'),
(11, 'Нели Ананиева Арабаджиева-Калчева', '10354', 2, '+359 880 44 6677', 'neli.kalcheva@example.com'),
(12, 'Росен Стефанов Радков', '10226', 3, '+359 887 55 8899', 'rosen.radkov@example.com'),
(13, 'Стефка Иванова Попова', '10229', 2, '+359 883 33 5566', 'stefka.popova@example.com'),
(14, 'Христо Божидаров Ненов', '10232', 1, '+359 881 22 3344', 'hristo.nenov@example.com');

-- --------------------------------------------------------

--
-- Структура на таблица `titles`
--

CREATE TABLE `titles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `titles`
--

INSERT INTO `titles` (`id`, `name`) VALUES
(1, 'Associate Professor'),
(2, 'Head Assistant'),
(3, 'Assistant'),
(4, 'Teacher');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `identity_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('student','teacher') NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `identity_number`, `password`, `user_type`) VALUES
(1, '10201', '$2y$10$kO/Kv2ob8SOGd4/xvihpCOl6ieO3bMjClQjuNgp4bZfkl..dssGSG', 'teacher'),
(3, '10514', '$2y$10$ID0uRQWEqD1rFga8q1q9HeLxHJCeMtCHskg4FqPBjFJrtHJ2hCwW2', 'teacher'),
(4, '10205', '$2y$10$ePzzvzuDM/Gz9XuRLl4QZ.ZnfIIQiNKMxrpDY3fx3JTHA95ymnOoq', 'teacher'),
(5, '10208', '$2y$10$VIrdyAOs7BPx/6mY3/BfJeZcTLW9k5jZt/0MLBDJFlFSL71Qy9z5e', 'teacher'),
(6, '10526', '$2y$10$4hdxv2kKXAwPUQsQsfnGl.53vABN8zrVsKA9nUF37AnXLV5VRtFrW', 'teacher'),
(7, '10454', '$2y$10$A9R8ydhdrCsIH9/.uCx8.eOKqHEPVs34E4TWgTU/mNB2UL5aOpQ/i', 'teacher'),
(8, '10487', '$2y$10$6Ab7WT8bI4oqPJs3Q9q59OY.LuqvMN99HJBwUNWCe6fT.hHbqdpZq', 'teacher'),
(9, '10522', '$2y$10$An7cBCFYlcg8a44UdvrkuuiF08o9A/e1ceDrjrFjK5pby//lPCCsm', 'teacher'),
(10, '10217', '$2y$10$8ysZYRf.mJCTYNoRabda5utC8OsxaEf1HMfgQM0Uo/NsRlWq0ILGe', 'teacher'),
(11, '10218', '$2y$10$dy.XMTS1c/BQr2DkU30qhuIWw9xegeqkIsX3eofwvlDG26qAze6Ny', 'teacher'),
(12, '10354', '$2y$10$mmRjHgzebGOuQetqeZAY/eMiVz.efZwnUxz2KHdSLMQ1rZyPuUu72', 'teacher'),
(13, '10226', '$2y$10$5m76.KQUT2d7MXzckc3iyutYZyhtqJs6Lf4FpntbOJ0x6imlp4jOW', 'teacher'),
(14, '10229', '$2y$10$26Z6mBcEjIl/ORwGWD1h0eXoy6JcCwuC6c5wdiRzRfNl0zrBY0xiu', 'teacher'),
(15, '10232', '$2y$10$w8y4GiWEMPgoNedBOLc8Wu1PPHsQaDAlf81taKo1uuY.paZcK2YEm', 'teacher'),
(17, '21121486', '$2y$10$JfH29.Xi/VQxF6q/UPBMp.mhm/LRoyFNdyQxdBCWNzyFM/rXVJo6W', 'student'),
(18, '21621611', '$2y$10$IN13iHTxzcJb/WqXPmNjM.D6E0Ka79RDE0EA/0UKPQ5DqjwR9ca4y', 'student'),
(19, '21262176', '$2y$10$Ti2wyLyXcEP9TSAAYsrpQ.I7ZmJVimNWviGQWpPWNmmS7pGY6ujte', 'student'),
(20, '31231235', '$2y$10$O4EwC1OFElXUgUrhca4cU.kVzXGYD/oQvhLNrWm3f9jukLU1IzizG', 'student'),
(21, '4324234324', '$2y$10$3Hyp3e6D3CKoQ17s2KZ6q.P/tK0J.q/BM3olP4l6f4dfEbhqjNkYS', 'student'),
(22, '432423432', '$2y$10$7bKgP4n5LqUwcox8LEWX6u8Equp2td5H/kcODA.0uNx.D2KJE.itG', 'student'),
(23, '5635345', '$2y$10$ochNSaBiSekfA0VAqYpDVuBoyc/BO4vcAQNdgkuBOEF2etqwzcia.', 'student'),
(24, '423432432', '$2y$10$ch6IOjJgA/3i0rmCrVK/bOFOth2IHpDQZkvDdWDG3VNpAoUPkkKAy', 'student'),
(25, '45345345', '$2y$10$6Hw56cav1WJ5Z0yCSHsxO.IPVoNtCvcgU8p3rlZRzPCL3FLIhKDMq', 'student'),
(26, '543254325', '$2y$10$Tt.BFOiWiofbxJsK1YUxeuL5rfjEmHO58LcoYM8dvTarTFJZdn1n2', 'student'),
(27, '345345', '$2y$10$DVmraSet2i3.kWWVSuIoq.OOQfMFuaSo0oZuPQMciSQmeA3XOzSDi', 'student'),
(28, '4234234', '$2y$10$InxNl/a.KD6QCGrgRezxi.bZOrFn8ArZzHeHyGGO9Pk.t2GQfVeQe', 'student'),
(29, '5435345', '$2y$10$HvPLL7gUprdPW.L5cuqpjOloMO4emkdUuem9DVAtUoihD1Gv5p0du', 'student'),
(30, '53534534', '$2y$10$qP13JKErVJLFQN5UMoYLb.YopqQ4UXJif4WiZ6EYUIKHfF4QLWFGe', 'student'),
(33, '21621589', '$2y$10$VIPQxeMtm2akJ.vnmPBtkOZaS4.WM/wTx8tQFYEm8CjAfs2YMCv2S', 'student');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Индекси за таблица `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индекси за таблица `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Индекси за таблица `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_number` (`serial_number`),
  ADD KEY `title_id` (`title_id`);

--
-- Индекси за таблица `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identity_number` (`identity_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `disciplines`
--
ALTER TABLE `disciplines`
  ADD CONSTRAINT `disciplines_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Ограничения за таблица `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`);

--
-- Ограничения за таблица `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`);

--
-- Ограничения за таблица `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`title_id`) REFERENCES `titles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
