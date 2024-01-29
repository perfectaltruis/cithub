-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 12:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `registration_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `name`, `registration_number`) VALUES
(3, 'Hemedi Athumani', 'BCS-01-0105-2022'),
(4, 'Aneth Samwely', 'BCS-01-0146-2022'),
(7, 'Erick Mtalemwa', 'BCS-01-0149-2022'),
(8, 'Jacob Mtei', 'BCS-01-0107-2022'),
(11, 'Aristarick Shayo', 'BCS-01-0111-2022'),
(12, 'Hamisi Kitabala', 'BCS-01-0165-2022'),
(15, 'Jackline Revocatus', 'BCS-01-0131-2022'),
(16, 'Goodluck Lyimo', 'BCS-01-0041-2022');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `user_id`, `title`, `description`, `category`, `created_at`, `region`) VALUES
(1, 1, 'eee', 'eeert3t3t', 'infrastructure', '2024-01-22 19:34:40', ''),
(2, 1, 'abc', 'caucuacuacacaucbaucbac', 'healthcare', '2024-01-22 19:40:34', ''),
(3, 1, 'school fees for njiro students', 'please mheshimiwa pay for my child\'s education support', 'education', '2024-01-22 19:50:07', ''),
(4, 1, 'books 1', 'kllklkl', 'education', '2024-01-22 20:38:36', ''),
(5, 2, 'hey', 'eeeee', 'infrastructure', '2024-01-22 21:07:47', ''),
(6, 4, 'rere', 'rere', 'infrastructure', '2024-01-22 21:17:32', ''),
(7, 4, 'wwww', 'wwww', 'infrastructure', '2024-01-22 21:27:46', 'arusha'),
(8, 4, 'gr', 'grg', 'infrastructure', '2024-01-22 22:24:45', 'arusha');

-- --------------------------------------------------------

--
-- Table structure for table `representatives`
--

CREATE TABLE `representatives` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `region` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `representatives`
--

INSERT INTO `representatives` (`id`, `username`, `password`, `region`, `created_at`, `updated_at`) VALUES
(1, 'aly', '$2y$10$QaETgszbAQv1lqvuEITiQuYet3Enk7paz7irYQ.wo4dvPVcUOGuLS', 'Arusha', '2024-01-22 20:49:55', '2024-01-22 20:49:55'),
(2, 'aly', '$2y$10$nNDsBu72q0SzciLemhwT2ON8LffbZUiKK.YCh4ZMpyKu7N1uea02y', 'Arusha', '2024-01-22 20:52:45', '2024-01-22 20:52:45'),
(3, 'aly', '$2y$10$xqD6q91cMh50Ve84oNRvneShMNkFx6oXvmnQWuwtgTVojEnCEIHpe', 'arusha', '2024-01-22 20:55:28', '2024-01-22 20:55:28'),
(4, 'aly', '$2y$10$fzh7gZR2S29LXX/gv4VMsumB5hywAwUIhARL96ALaKt/Wo7nwCwtu', 'Dar es Salaam', '2024-01-22 21:11:19', '2024-01-22 21:11:19'),
(5, 'admin1', '$2y$10$YQCSmsqchg./g6YliXAniOaxPt8N2VV5hsGukoWEcmfYiLR6YcCjO', 'Dar es Salaam', '2024-01-22 21:16:58', '2024-01-22 21:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `query_id` int(11) NOT NULL,
  `representative_id` int(11) NOT NULL,
  `response_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `query_id`, `representative_id`, `response_text`, `created_at`) VALUES
(1, 7, 1, 'we will work on it', '2024-01-22 22:05:01'),
(2, 7, 1, 'we will work on it', '2024-01-22 22:06:18'),
(3, 7, 1, 'sdaddadad', '2024-01-22 22:06:29'),
(4, 7, 1, 'grgrgrg', '2024-01-22 22:24:22'),
(5, 8, 1, 'grgrgrgrg', '2024-01-22 22:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `region`) VALUES
(1, 'allen', 'allen', 'Ars'),
(2, 'alfa', '$2y$10$jxslpJCChR5IdFCyUwngDuh/YWPYO33aKn3uF7Jsujr9FzzJrieIC', 'Dar es Salaam'),
(3, 'alfa', '$2y$10$4zqu73qZ.hpw9mt6/ttP8OHZirutOorpZ4TdwLewzPhOW.HEFyOni', 'Dar es Salaam'),
(4, 'hr', '$2y$10$tStQUSCKzCIkf5hnIDPeUOm7X4tGl.YvkuarGqr8VUkkrKGfCOBzS', 'Dar es Salaam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `representatives`
--
ALTER TABLE `representatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `query_id` (`query_id`),
  ADD KEY `representative_id` (`representative_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `representatives`
--
ALTER TABLE `representatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`query_id`) REFERENCES `queries` (`id`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`representative_id`) REFERENCES `representatives` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
