-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 06:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlytrungtamta`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `description`, `duration`, `start_date`, `end_date`, `img`) VALUES
('BASIC', 'Tiếng anh cơ bản 1', ' Khóa học giúp bạn cải thiện trình độ tiếng anh của mình một cách nhanh chóng bắt đầu từ con số 0', 3, '2024-05-01', '2024-05-31', 'https://luanvan24.com/wp-content/uploads/2021/02/hinh-anh-de-tai-nghien-cuu-khoa-hoc-mon-tieng-anh-2.jpg'),
('hahaha', 'Khóa học ảo ma  ', '    Xem video bài giảng youtube của các anh Ấn Độ không hề khó khăn sau khi học xong khóa học này', 3, '2024-04-29', '2024-05-28', 'https://th.bing.com/th/id/OIP.jAfEStIV4bbWs1gpPZNp2wHaDp?rs=1&pid=ImgDetMain'),
('HELLO', 'Hello World', '          bạn sẽ biết hello worlddd', 4, '2024-05-23', '2024-05-29', 'public/img/R.jpg'),
('PRO', 'Khóa học tiếng anh nâng cao', 'Cải thiện trình độ tiếng anh của bạn chỉ trong 6 tháng cùng các chuyên gia đến từ ấn độ', 6, '2024-05-01', '2024-05-31', 'https://imgk.timesnownews.com/story/english.png'),
('Profesionn', 'Khóa học vippro', ' Khóa học do Nguyễn Tùng Sk phụ trách giảng dạy sẽ đưa bạn đến một tầm cao mới trong công cuộc học hỏi một loại ngoại ngữ mới ', 4, '2024-05-20', '2024-06-08', 'public/img/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` varchar(32) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `teacher_id` varchar(4) NOT NULL,
  `day_of_week` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `course_id`, `teacher_id`, `day_of_week`, `start_time`, `end_time`) VALUES
('BASIC18', 'BASIC', 'GV01', 'monday, sunday', '14:47:00', '16:47:00'),
('Profesionn08', 'Profesionn', 'GV01', 'monday, tuesday, wednesday', '11:42:00', '23:42:00'),
('Profesionn09', 'Profesionn', 'GV46', 'monday, tuesday, saturday', '13:47:00', '15:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `address`, `phone`, `email`) VALUES
('HV01', 'Nguyễn Văn Tùng', 'Đại Bản - An Dương - Hải Phòng', '0392604345', 'tung95182@gmail.com'),
('HV24', 'Nguyễn Tùng Lâm', 'Hảo Hảo - Chua Cay - Mật Ngọt', '0392604345', 'saikornguyen@gmail.com'),
('HV34', 'Nguyễn Tùng Sk', 'Hảo Hảo - Chua Cay - Mật Ngọt', '0392604345', 'skfreelancer2004@gmail.com'),
('HV92', 'Nguyễn Hữu dương', 'Hảo Hảo - Chua Cay - Mật Ngọt', '8303139613', '12341234@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` varchar(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `address`, `phone`, `email`) VALUES
('GV01', 'Nguyễn Hạnh Phúc', 'Hải phòng', '0123456789', 'nguyenhanhphuc@gmail.com'),
('GV02', 'Lê thế Anh', 'hà nội', '0123456789', 'letheanh@gmail.com'),
('GV46', 'Phạm Trung Hưng', 'Đại Bản - An Dương - Hải Phòng', '432112341', '1234@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
