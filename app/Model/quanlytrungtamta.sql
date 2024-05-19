-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 04:25 PM
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
  `description` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `description`, `duration`, `start_date`, `end_date`, `img`) VALUES
('BASIC', 'Tiếng anh cơ bản', 'Khóa học giúp bạn cải thiện trình độ tiếng anh của mình một cách nhanh chóng bắt đầu từ con số 0', 3, '2024-05-01', '2024-05-31', 'https://luanvan24.com/wp-content/uploads/2021/02/hinh-anh-de-tai-nghien-cuu-khoa-hoc-mon-tieng-anh-2.jpg'),
('hahaha', 'Khóa học ảo ma ', 'các anh ấn độ number 1', 3, '2024-04-29', '2024-05-28', 'https://th.bing.com/th/id/OIP.nrM6kYv7Z3y9eltKzs_DNAHaHa?w=1380&h=1380&rs=1&pid=ImgDetMain'),
('PRO', 'Khóa học tiếng anh nâng cao', 'Cải thiện trình độ tiếng anh của bạn chỉ trong 6 tháng cùng các chuyên gia đến từ ấn độ', 6, '2024-05-01', '2024-05-31', 'https://imgk.timesnownews.com/story/english.png');

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
('HV24', 'Nguyễn Tùng Lâm', 'Hảo Hảo - Chua Cay - Mật Ngọt', '0392604345', 'saikornguyen@gmail.com');

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
('GV46', 'Phạm Trung Hưng', 'Đại Bản - An Dương - Hải Phòng', '432112341', '1234@gmail.com'),
('GV93', 'Nguyễn Tùng Dường', 'Hảo Hảo - Chua Cay - Mật Ngọt', '', '12341234@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
