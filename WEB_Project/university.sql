-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 28 май 2023 в 22:49
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
(1, 'Mathematics', 1, 1),
(2, 'WEB Design', 3, 1),
(3, 'Base Programming', 5, 1),
(4, 'Electronics', 3, 2),
(5, 'Sport(SSP)', 2, 2),
(6, 'Synthesis and analysis of algorithms', 6, 3),
(7, 'Logic and Automation', 4, 4),
(8, 'English', 6, 4),
(9, 'Discret Structures', 7, 5),
(10, 'Data Base', 1, 5),
(11, 'OOP', 2, 6),
(12, 'Organisation of the Computer ', 6, 7),
(13, 'System analysis', 8, 8),
(14, 'Microprocessor technology', 5, 9);

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
(1, 1, 1, '4.00', '2023-05-05'),
(2, 1, 6, '5.00', '2023-05-03'),
(3, 1, 14, '5.00', '2023-05-17'),
(4, 2, 1, '6.00', '2023-05-06'),
(5, 2, 7, '5.00', '2023-05-17'),
(6, 3, 11, '3.00', '2023-05-18'),
(7, 3, 10, '6.00', '2023-02-16'),
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
(31, 1, 9, '6.00', '2023-05-02'),
(32, 15, 12, '4.00', '2023-05-03'),
(33, 15, 12, '5.00', '2023-05-05'),
(34, 1, 1, '6.00', '2023-05-03'),
(35, 1, 1, '6.00', '2023-05-10');

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
(1, 'Automation, information and control computer systems (AIUKS)'),
(2, 'Automotive Electronics - Intelligent Transport Systems (ITS)'),
(3, 'Automotive Technology (AT)'),
(4, 'Agronomy (A)'),
(5, 'Biomedical Electronics (BME)'),
(6, 'Renewable energy sources (RES)'),
(7, 'Electricity (EE)'),
(8, 'Electronics (E)'),
(9, 'Artificial Intelligence (AI)'),
(10, 'Industrial Design (ID)'),
(11, 'Industrial Management (IM)'),
(12, 'Information and Communication Technologies (ICT)'),
(13, 'Cyber ​​Security (CS)'),
(14, 'Computerized Technologies in Mechanical Engineering (CTM)'),
(15, 'Computer Systems and Technology (CST)'),
(16, 'Software and Internet Technologies (SIT)'),
(17, 'Transport equipment and technologies (TTT)');

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
(1, '21621586', 'Boris Georgiev', 1, 3, 'bgeorgiev02@gmail.com'),
(2, '21121486', 'Alex Orozov', 1, 2, 'gfiogjfiujirfuj@gmail.com'),
(3, '21621611', 'Bogomil Donkov', 1, 6, 'fgjufgikfig@gmail.com'),
(4, '21262176', 'Ivan Todorov', 2, 7, 'hghhkggkhg@gmail.com'),
(5, '31231235', 'Petar Dimitrov', 2, 4, 'hgihjgifjgijf@gmail.com'),
(6, '4324234324', 'Alexandur Robov', 9, 7, 'ghuirfjhgiuf@gmail.com'),
(7, '432423432', 'Alex Shopov', 9, 1, 'gfiogjfiujirfuj@gmail.com'),
(8, '5635345', 'Blagoi Georgiev', 11, 3, 'ghfghfghfghf@gmnai.com'),
(9, '423432432', 'Stanimir Ahilov', 11, 1, 'ghfghfghfghf@gmnai.com'),
(10, '45345345', 'Vasil Ivanov', 13, 5, 'hghhkggkhg@gmail.com'),
(11, '543254325', 'Teodor Todorov', 13, 2, 'fgdfgdsfg@gmail.com'),
(12, '345345', 'Vladimir Vladimirov', 15, 6, 'hhfyrthf@gmail.com'),
(13, '4234234', 'Angel Angelov', 15, 5, 'ghfghfghfghf@gmnai.com'),
(14, '5435345', 'Ivan Pektanov', 16, 5, 'hgihjgifjgijf@gmail.com'),
(15, '53534534', 'Daniel Atanasov', 16, 6, 'fgdfgdsfg@gmail.com');

-- --------------------------------------------------------

--
-- Структура на таблица `teachers`
--

CREATE TABLE `teachers` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `title_id` int(10) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `title_id`, `phone`, `email`) VALUES
(1, 'Hristo Nenov', 1, '345345345', 'fgdfgdsfg@gmail.com'),
(2, 'Violeta Bojikova', 1, '534535345', 'ghuirfjhgiuf@gmail.com'),
(3, 'Geo Kunev', 1, '56353454', 'ghfghfghfghf@gmnai.com'),
(4, 'Ganka Kovacheva', 2, '6456546', 'gfiogjfiujirfuj@gmail.com'),
(5, 'Diqn Dinev', 2, '6435652342', 'fgdfgdsfg@gmail.com'),
(6, 'Ivelin Ivanov', 2, '67546456', 'ghfghfghfghf@gmnai.com'),
(7, 'Antoaneta Dimitrova', 3, '5635435', 'fgjufgikfig@gmail.com'),
(8, 'Velislav Kolesnichenko', 3, '54234324', 'gfdgdfgdf@gmail.com'),
(9, 'Galq Gospodinova', 3, '543635636', 'gfiogjfiujirfuj@gmail.com');

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
  ADD KEY `title_id` (`title_id`);

--
-- Индекси за таблица `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
