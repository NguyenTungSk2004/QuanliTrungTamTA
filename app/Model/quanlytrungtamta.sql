-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 04:26 PM
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
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `description`, `duration`, `start_date`, `end_date`, `price`, `img`) VALUES
('BASIC', 'Tiếng anh cơ bản 1', '  Khóa học giúp bạn nâng cao khá năng ngoại ngữ chỉ sau 3 tháng', 3, '2024-05-01', '2024-05-03', 20000, 'https://th.bing.com/th/id/OIP.rzKmLbDrL_jFDjrS2Lni9gHaEK?rs=1&pid=ImgDetMain'),
('DUCCM', 'English của Đức CM', ' Khóa học giúp bạn cải thiện trình độ tiếng anh trở nên thượng thừa với Giảng viên kì cựu Đức CM', 3, '2024-05-07', '2024-05-31', 350000, 'https://th.bing.com/th/id/OIP.-8jnERGR1BmnYRFHXG4-MAHaHa?rs=1&pid=ImgDetMain'),
('LEARN', 'Tiếng anh cho người mới bắt đầu', 'Tiếng anh giao tiếp cơ bản giúp người học có thể giao tiếp cơ bản sau 2 tháng', 2, '2024-05-03', '2024-05-05', 300000, 'https://th.bing.com/th/id/OIP.k5sHBKdRWU_iCgK78k85NgHaDw?rs=1&pid=ImgDetMain'),
('MIDDLE', 'Tiếng anh là tôi', 'Khóa học truyền tải đam mê và niềm yêu thích tiếng anh đến mọi người, lan tỏa sức sống', 4, '2024-05-17', '2024-05-24', 500000, 'https://th.bing.com/th/id/R.d77c69508141d6d0b106391e3fdddce8?rik=Xd4E2A%2fwmTGsIg&riu=http%3a%2f%2fdanview.net%2fwp-content%2fuploads%2f2017%2f08%2fEnglish1-1024x690.jpg&ehk=hjIyPQZ0UmNAymSUc8gGNqinZrrkQMrIQR%2fCLkQef5U%3d&risl=&pid=ImgRaw&r=0'),
('PRO', 'Khóa học tiếng anh nâng cao', 'Cải thiện trình độ tiếng anh của bạn chỉ trong 6 tháng cùng các chuyên gia đến từ ấn độ', 6, '2024-05-01', '2024-05-31', 600000, 'https://imgk.timesnownews.com/story/english.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` varchar(4) NOT NULL,
  `registration_id` varchar(4) NOT NULL,
  `amount_received` int(11) NOT NULL CHECK (`amount_received` >= 0),
  `total_payment` int(11) NOT NULL CHECK (`total_payment` >= 0),
  `received_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `method` varchar(50) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registration_id` varchar(4) NOT NULL,
  `student_id` varchar(4) NOT NULL,
  `schedule_id` varchar(32) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registration_id`, `student_id`, `schedule_id`, `registration_date`) VALUES
('DK07', 'HV05', 'LEARN52', '2024-05-29 10:51:31'),
('DK25', 'HV05', 'PRO36', '2024-05-29 10:51:31'),
('DK38', 'HV05', 'BASIC04', '2024-05-29 10:51:31'),
('DK40', 'HV05', 'BASIC29', '2024-05-29 10:51:31'),
('DK47', 'HV49', 'DUCCM62', '2024-05-27 07:53:46'),
('DK64', 'HV05', 'DUCCM62', '2024-05-29 10:51:31'),
('DK70', 'HV10', 'PRO36', '2024-05-27 07:52:12'),
('DK92', 'HV10', 'LEARN52', '2024-05-27 07:55:42'),
('DK98', 'HV24', 'DUCCM62', '2024-05-27 07:52:01');

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
('BASIC04', 'BASIC', 'GV01', 'monday', '17:21:00', '19:21:00'),
('BASIC29', 'BASIC', 'GV69', 'tuesday, sunday', '16:35:00', '19:35:00'),
('BASIC43', 'BASIC', 'GV01', 'monday', '22:26:00', '21:26:00'),
('DUCCM62', 'DUCCM', 'GV01', 'monday', '14:19:00', '16:15:00'),
('LEARN52', 'LEARN', 'GV10', 'monday, tuesday, wednesday', '13:00:00', '17:00:00'),
('MIDDLE58', 'MIDDLE', 'GV69', 'monday, sunday', '08:59:00', '10:59:00'),
('MIDDLE75', 'MIDDLE', 'GV01', 'monday, tuesday, wednesday', '14:59:00', '16:59:00'),
('PRO36', 'PRO', 'GV01', 'monday, saturday', '21:46:00', '23:42:00');

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
('HV05', 'NGUYỄN VĂN TÙNG', '1234', '0392604345', 'nguyentungsk2004@gmail.com'),
('HV10', 'Nguyễn Tùng Sk', 'Hảo Hảo - Chua Cay - Mật Ngọt', '0392604345', 'skfreelancer2004@gmail.com'),
('HV24', 'Phạm Trung Hưng', 'Đại Bản - An Dương - Hải Phòng', '432112341', '1234@gmail.com'),
('HV49', 'Nguyễn Tùng Dường', 'Hảo Hảo - Chua Cay - Mật Ngọt', '123412343', '12341234@gmail.com');

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
('GV01', 'Nguyễn Hạnh Phúc', 'Hải phòng -Việt Nam', '0123456788', 'nguyenhanhphuc@gmail.com'),
('GV10', 'Nguyễn Tùng Dường', 'Hảo Hảo - Chua Cay - Mật Ngọt', '0243523451', '12341234@gmail.com'),
('GV69', 'Nguyễn Tùng Sk', 'Hảo Hảo - Chua Cay - Mật Ngọt', '0392604345', 'skfreelancer2004@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_users`
--

CREATE TABLE `temporary_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `verification_code` varchar(10) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `username`, `password`, `email`, `phone`, `created_at`) VALUES
('Nguyễn Tùng Lâm', 'nguyentunglam', '81dc9bdb52d04dc20036dbd8313ed055', 'tung95182@st.vimaru.edu.vn', '0392604345', '2024-05-29 13:12:52'),
('Nguyễn Văn Tùng', 'nguyentungsk', '81dc9bdb52d04dc20036dbd8313ed055', 'tung95182@st.vimaru.edu.vn', '0392604345', '2024-05-29 10:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `webregistrations`
--

CREATE TABLE `webregistrations` (
  `STT` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `schedule_id` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webregistrations`
--

INSERT INTO `webregistrations` (`STT`, `name`, `address`, `phone`, `email`, `schedule_id`, `time`) VALUES
(6, 'NGUYỄN VĂN TÙNG', 'fasdf', '0392604345', 'nguyentungsk2004@gmail.com', 'MIDDLE58', '2024-05-29 10:51:31'),
(7, 'NGUYỄN VĂN TÙNG', 'fasdf', '0392604345', 'nguyentungsk2004@gmail.com', 'MIDDLE75', '2024-05-29 10:51:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `registration_id` (`registration_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `schedules_teachers` (`teacher_id`),
  ADD KEY `schedules_course` (`course_id`);

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
-- Indexes for table `temporary_users`
--
ALTER TABLE `temporary_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `webregistrations`
--
ALTER TABLE `webregistrations`
  ADD PRIMARY KEY (`STT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `temporary_users`
--
ALTER TABLE `temporary_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `webregistrations`
--
ALTER TABLE `webregistrations`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`registration_id`);

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_teachers` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
