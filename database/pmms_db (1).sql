-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 02:34 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation_list`
--

CREATE TABLE `conversation_list` (
  `id` int(30) NOT NULL,
  `subject` text NOT NULL,
  `user_1` int(30) NOT NULL,
  `user_2` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversation_list`
--

INSERT INTO `conversation_list` (`id`, `subject`, `user_1`, `user_2`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Sample 101', 2, 1, 0, '2022-03-29 17:09:16', '2022-03-29 17:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

CREATE TABLE `message_list` (
  `id` int(30) NOT NULL,
  `conversation_id` int(30) NOT NULL,
  `from_user` int(30) NOT NULL,
  `to_user` int(30) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_list`
--

INSERT INTO `message_list` (`id`, `conversation_id`, `from_user`, `to_user`, `message`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 2, 1, '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque augue ligula, congue sit amet aliquam in, consectetur mattis lectus. Nulla tempus vulputate tellus. Aenean feugiat, erat non fermentum mattis, metus lectus fermentum leo, ut cursus turpis justo molestie nisl. Vivamus lobortis luctus facilisis. Duis fermentum euismod quam, sed gravida ligula. Donec sollicitudin neque id arcu tristique convallis. Praesent tincidunt, ante pharetra tempor vestibulum, dui nisi lobortis orci, eget elementum magna erat quis est.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a sodales magna, sed placerat tellus. Nulla tristique mauris in quam suscipit semper nec ac lectus. Maecenas pulvinar ornare tellus at fringilla. Nulla pulvinar bibendum lacus quis tristique. Integer quis ex maximus, lobortis dolor eu, laoreet dui. Praesent ut imperdiet dolor. Donec hendrerit fringilla purus a scelerisque. Nulla facilisi. Aenean mollis lacus nec urna blandit, eu feugiat nisi lacinia. Nulla elementum eleifend tellus, ac euismod nunc suscipit sit amet. Proin et lacus a arcu vestibulum tempus. Nullam rutrum luctus lobortis. Etiam tempus lobortis magna, nec sodales arcu ultricies non.&lt;/p&gt;', 1, '2022-03-29 17:09:16', '2022-03-29 17:09:44'),
(2, 1, 1, 2, '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Sed eleifend tincidunt elit. Etiam suscipit, nunc a sagittis sodales, justo eros blandit felis, vel sagittis lorem enim ut ligula. Nunc iaculis ante at ipsum mattis, et iaculis est bibendum. Nulla aliquet nisl erat, sed scelerisque felis vehicula eget. Phasellus quis tortor odio. Maecenas ornare convallis nisl, id accumsan dolor commodo sed. Curabitur hendrerit nulla ut commodo lacinia. Maecenas consequat interdum laoreet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur id egestas sapien, vitae pharetra nunc. Nam tempor, nulla in ultricies efficitur, tortor nunc egestas eros, in accumsan justo sem a lorem. Praesent eleifend nulla vel lacus porta placerat.</span><br></p>', 1, '2022-03-29 17:09:59', '2022-03-29 17:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Private Messaging System.'),
(6, 'short_name', 'Private Message - PHP'),
(11, 'logo', 'uploads/defaults/logo.png?v=1648173882'),
(14, 'cover', 'uploads/defaults/wallpaper.png?v=1648173974');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `dob`, `username`, `password`, `avatar`, `last_login`, `date_added`, `date_updated`) VALUES
(1, 'Samantha', 'D', 'Jane', 'Female', '1997-10-14', 'sam', '$2y$10$J/G.h1U9dyOGhv.QWe3P8.5ElC.8QQqGrAIa5oDlmI6jX3ikfmMJ.', 'uploads/users/avatar-1.png?v=1648544862', NULL, '2022-03-29 17:07:42', '2022-03-29 17:07:42'),
(2, 'Mark', 'D', 'Cooper', 'Male', '1997-06-23', 'mcooper', '$2y$10$46brlnhblnAIJn0gmoiHFusBPZ.8jC2cEvViNwSsbq1q0gD0xDzyq', 'uploads/users/avatar-2.png?v=1648544904', NULL, '2022-03-29 17:08:24', '2022-03-29 17:08:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation_list`
--
ALTER TABLE `conversation_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_1` (`user_1`),
  ADD KEY `user_2` (`user_2`);

--
-- Indexes for table `message_list`
--
ALTER TABLE `message_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_id` (`conversation_id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation_list`
--
ALTER TABLE `conversation_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_list`
--
ALTER TABLE `message_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation_list`
--
ALTER TABLE `conversation_list`
  ADD CONSTRAINT `convo_fk_user_id_1` FOREIGN KEY (`user_1`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `convo_fk_user_id_2` FOREIGN KEY (`user_2`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_list`
--
ALTER TABLE `message_list`
  ADD CONSTRAINT `convo_id_fk_message` FOREIGN KEY (`conversation_id`) REFERENCES `conversation_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_fk_from_user` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_fk_to_user` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
