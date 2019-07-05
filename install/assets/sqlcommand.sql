-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2019 at 04:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `appinfo`
--

CREATE TABLE `appinfo` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appinfo`
--

INSERT INTO `appinfo` (`id`, `name`, `value`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'AppName', 'Pembelajaran', NULL, NULL, '2019-06-27 03:14:15', 2, '2019-07-05 14:36:44');

--
-- Triggers `appinfo`
--
DELIMITER $$
CREATE TRIGGER `PreventDeleteAppInfo` BEFORE DELETE ON `appinfo` FOR EACH ROW BEGIN

  IF old.id IN (1,2) THEN -- Will only abort deletion for specified IDs
    SIGNAL SQLSTATE '45000' -- "unhandled user-defined exception"
      -- Here comes your custom error message that will be returned by MySQL
      SET MESSAGE_TEXT = 'This record is sacred! You are not allowed to remove it!!';
  END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_appinfo_update` BEFORE UPDATE ON `appinfo` FOR EACH ROW BEGIN
          IF (old.name='AppName' AND old.name<>new.name) THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'You can not update this record';
          END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `applogs`
--

CREATE TABLE `applogs` (
  `id` bigint(20) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appmenu`
--

CREATE TABLE `appmenu` (
  `id` tinyint(4) NOT NULL,
  `label` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `modul_id` tinyint(4) DEFAULT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appmenu`
--

INSERT INTO `appmenu` (`id`, `label`, `link`, `icon`, `modul_id`, `parent_id`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Dasbor', '', 'mdi-home', 1, NULL, 1, NULL, '2019-06-25 10:46:35', NULL, NULL),
(2, 'Manajemen Pengguna', 'auth', 'mdi-account', 2, NULL, 2, NULL, '2019-06-25 10:46:35', NULL, NULL),
(6, 'Pengaturan', '', 'mdi mdi-settings', NULL, NULL, 6, NULL, '2019-06-25 11:35:34', NULL, NULL),
(7, 'Menu', 'menu-manager', NULL, 4, 6, 6, NULL, '2019-06-25 11:36:19', NULL, NULL),
(15, 'Modul', 'modul-manager', NULL, 5, 6, NULL, 2, '2019-06-26 13:07:07', NULL, NULL),
(19, 'Info', 'appinfo', NULL, 27, 6, NULL, 2, '2019-06-27 04:44:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appmodul`
--

CREATE TABLE `appmodul` (
  `id` tinyint(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appmodul`
--

INSERT INTO `appmodul` (`id`, `name`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'App', NULL, '2019-06-25 10:47:44', NULL, NULL),
(2, 'Auth', NULL, '2019-06-25 10:47:44', NULL, NULL),
(4, 'Menu_manager', NULL, '2019-06-25 11:31:34', NULL, NULL),
(5, 'Modul_manager', NULL, '2019-06-25 11:39:02', NULL, NULL),
(27, 'Appinfo', 2, '2019-06-27 04:41:36', NULL, NULL),
(29, 'Test', 2, '2019-06-27 12:07:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, '2019-04-03 14:43:35', NULL, '0000-00-00 00:00:00'),
(2, 'members', 'General User', NULL, '2019-04-03 14:43:35', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `group_auth`
--

CREATE TABLE `group_auth` (
  `group_id` tinyint(4) NOT NULL,
  `modul_id` tinyint(4) NOT NULL,
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_auth`
--

INSERT INTO `group_auth` (`group_id`, `modul_id`, `readonly`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 0, NULL, '2019-05-13 08:59:04', 2, '2019-06-27 04:44:15'),
(1, 2, 0, NULL, '2019-05-13 08:59:04', 2, '2019-06-27 04:44:15'),
(1, 4, 0, 2, '2019-06-25 11:37:03', 2, '2019-06-27 04:44:15'),
(1, 5, 0, 2, '2019-06-25 11:41:48', 2, '2019-06-27 04:44:15'),
(1, 27, 0, 2, '2019-06-27 04:44:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` tinyint(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'App', NULL, '2019-06-25 10:47:44', NULL, NULL),
(2, 'Auth', NULL, '2019-06-25 10:47:44', NULL, NULL),
(4, 'Menu_manager', NULL, '2019-06-25 11:31:34', NULL, NULL),
(5, 'Modul_manager', NULL, '2019-06-25 11:39:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `picture` varchar(100) NOT NULL DEFAULT 'default.png',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `picture`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, '127.0.0.1', 'admin@admin.com', '$2y$08$tvqhgH8WCozyaDKyEssjv.ZExYTPHVDNdMjTiwcdeCAalylr9Rij6', NULL, 'admin@admin.com', NULL, NULL, NULL, NULL, 1532259611, 1562337390, 1, 'Herpan', 'Safari', 'PT. SSI', '085697775111', 'default.png', NULL, '2019-04-03 14:43:35', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` tinyint(3) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(28, 2, 1, NULL, '2019-07-05 14:28:40', NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appinfo`
--
ALTER TABLE `appinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `applogs`
--
ALTER TABLE `applogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `appmenu`
--
ALTER TABLE `appmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `appmenu_ibfk_1` (`modul_id`);

--
-- Indexes for table `appmodul`
--
ALTER TABLE `appmodul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `group_auth`
--
ALTER TABLE `group_auth`
  ADD PRIMARY KEY (`group_id`,`modul_id`),
  ADD KEY `modul_id` (`modul_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appinfo`
--
ALTER TABLE `appinfo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applogs`
--
ALTER TABLE `applogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appmenu`
--
ALTER TABLE `appmenu`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `appmodul`
--
ALTER TABLE `appmodul`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appinfo`
--
ALTER TABLE `appinfo`
  ADD CONSTRAINT `appinfo_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appinfo_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `applogs`
--
ALTER TABLE `applogs`
  ADD CONSTRAINT `applogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `appmenu`
--
ALTER TABLE `appmenu`
  ADD CONSTRAINT `appmenu_ibfk_1` FOREIGN KEY (`modul_id`) REFERENCES `appmodul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appmenu_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `appmenu` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `group_auth`
--
ALTER TABLE `group_auth`
  ADD CONSTRAINT `group_auth_ibfk_1` FOREIGN KEY (`modul_id`) REFERENCES `appmodul` (`id`),
  ADD CONSTRAINT `group_auth_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `group_auth_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `group_auth_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_groups_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `users_groups_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
