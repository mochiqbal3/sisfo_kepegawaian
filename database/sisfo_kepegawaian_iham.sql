-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2022 pada 05.14
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `achivement_history`
--

CREATE TABLE `achivement_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `achivement_year` datetime DEFAULT NULL,
  `agency` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `allowance_employee`
--

CREATE TABLE `allowance_employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `data_allowance_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `appreciation_letter`
--

CREATE TABLE `appreciation_letter` (
  `id` int(11) NOT NULL,
  `gift_by` int(11) DEFAULT NULL,
  `receive_by` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `business_trip`
--

CREATE TABLE `business_trip` (
  `id` int(11) NOT NULL,
  `request_by` int(11) DEFAULT NULL,
  `executed_by` int(11) DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `task` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_allowance`
--

CREATE TABLE `data_allowance` (
  `id` int(11) NOT NULL,
  `fee` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `educational_background`
--

CREATE TABLE `educational_background` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `principal` varchar(50) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `certificate_published_date` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `family_member`
--

CREATE TABLE `family_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_experience_abroad`
--

CREATE TABLE `history_experience_abroad` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `native_country` varchar(50) DEFAULT NULL,
  `goals` text DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `financed` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `id` int(11) NOT NULL,
  `nama_cuti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`id`, `nama_cuti`) VALUES
(1, 'Cuti tahunan'),
(2, 'Cuti besar'),
(3, 'Cuti sakit'),
(4, 'Cuti bersalin'),
(5, 'Cuti keguguran'),
(6, 'Cuti haid'),
(7, 'Cuti ayah'),
(8, 'Cuti ibadah'),
(9, 'Cuti penting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_history`
--

CREATE TABLE `job_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `salary_class_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `skp` text DEFAULT NULL,
  `skp_no` text DEFAULT NULL,
  `skp_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `jenis_cuti_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `responsible` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `leave`
--

INSERT INTO `leave` (`id`, `user_id`, `reason`, `jenis_cuti_id`, `start_date`, `end_date`, `status`, `responsible`, `created_date`) VALUES
(1, 1, 'Sakit', 1, '2022-06-16', '2022-06-18', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_role`
--

CREATE TABLE `menu_role` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  `leader_name` varchar(50) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_data`
--

CREATE TABLE `personal_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  `married_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `personal_data`
--

INSERT INTO `personal_data` (`id`, `user_id`, `nik`, `name`, `birth_place`, `birth_date`, `address`, `married_date`) VALUES
(1, 1, '123123123', 'Admin', NULL, NULL, NULL, NULL),
(4, 7, 'D111921138', 'ilham', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rank_history`
--

CREATE TABLE `rank_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `salary_class_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `skp` text DEFAULT NULL,
  `skp_no` text DEFAULT NULL,
  `skp_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reprimand_letter`
--

CREATE TABLE `reprimand_letter` (
  `id` int(11) NOT NULL,
  `provide_by` int(11) DEFAULT NULL,
  `receive_by` int(11) DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `retirement_proposal`
--

CREATE TABLE `retirement_proposal` (
  `id` int(11) NOT NULL,
  `request_by` int(11) DEFAULT NULL,
  `receive_by` int(11) DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `parent_role_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `parent_role_id`, `name`, `description`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, NULL, 'admin', 'admin', NULL, NULL, NULL, NULL),
(2, NULL, 'pegawai', 'pegawai', NULL, NULL, NULL, NULL),
(3, NULL, 'management', 'management', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `salary_class`
--

CREATE TABLE `salary_class` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `salary_submission`
--

CREATE TABLE `salary_submission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `salary_increase` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `certificate_published_date` datetime DEFAULT NULL,
  `address` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `created_date`, `updated_date`) VALUES
(1, 'admin', '$2y$10$0/JCUMAlDLxCeMv6XseZU.2u0LkBcRispGd.R.MH4MxlE.WBKOyDe', 1, NULL, NULL),
(7, 'ilham', '$2y$10$Ee3DLW9R0GG3F/WPhLPS.eD38nGSFWMlnHvznJadCl0/C/cXwMSzO', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `achivement_history`
--
ALTER TABLE `achivement_history`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `allowance_employee`
--
ALTER TABLE `allowance_employee`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `data_allowance_id` (`data_allowance_id`) USING BTREE;

--
-- Indeks untuk tabel `appreciation_letter`
--
ALTER TABLE `appreciation_letter`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `gift_by` (`gift_by`) USING BTREE,
  ADD KEY `receive_by` (`receive_by`) USING BTREE;

--
-- Indeks untuk tabel `business_trip`
--
ALTER TABLE `business_trip`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `request_by` (`request_by`) USING BTREE,
  ADD KEY `executed_by` (`executed_by`) USING BTREE,
  ADD KEY `approver` (`approver`) USING BTREE;

--
-- Indeks untuk tabel `data_allowance`
--
ALTER TABLE `data_allowance`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fee` (`fee`) USING BTREE;

--
-- Indeks untuk tabel `educational_background`
--
ALTER TABLE `educational_background`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `family_member`
--
ALTER TABLE `family_member`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `history_experience_abroad`
--
ALTER TABLE `history_experience_abroad`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `salary_class_id` (`salary_class_id`) USING BTREE;

--
-- Indeks untuk tabel `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `jenis_cuti_id` (`jenis_cuti_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `responsible` (`responsible`) USING BTREE;

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_menu` (`id_menu`) USING BTREE,
  ADD KEY `id_role` (`id_role`) USING BTREE;

--
-- Indeks untuk tabel `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `rank_history`
--
ALTER TABLE `rank_history`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `salary_class_id` (`salary_class_id`) USING BTREE;

--
-- Indeks untuk tabel `reprimand_letter`
--
ALTER TABLE `reprimand_letter`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `provide_by` (`provide_by`) USING BTREE,
  ADD KEY `receive_by` (`receive_by`) USING BTREE,
  ADD KEY `approver` (`approver`) USING BTREE;

--
-- Indeks untuk tabel `retirement_proposal`
--
ALTER TABLE `retirement_proposal`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `request_by` (`request_by`) USING BTREE,
  ADD KEY `receive_by` (`receive_by`) USING BTREE,
  ADD KEY `approver` (`approver`) USING BTREE;

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `parent_role_id` (`parent_role_id`) USING BTREE;

--
-- Indeks untuk tabel `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `salary_class`
--
ALTER TABLE `salary_class`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `salary_submission`
--
ALTER TABLE `salary_submission`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `rol_id` (`role_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `achivement_history`
--
ALTER TABLE `achivement_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `allowance_employee`
--
ALTER TABLE `allowance_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `appreciation_letter`
--
ALTER TABLE `appreciation_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `business_trip`
--
ALTER TABLE `business_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_allowance`
--
ALTER TABLE `data_allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `educational_background`
--
ALTER TABLE `educational_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `family_member`
--
ALTER TABLE `family_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_experience_abroad`
--
ALTER TABLE `history_experience_abroad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `job_history`
--
ALTER TABLE `job_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rank_history`
--
ALTER TABLE `rank_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reprimand_letter`
--
ALTER TABLE `reprimand_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `retirement_proposal`
--
ALTER TABLE `retirement_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `salary_class`
--
ALTER TABLE `salary_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `salary_submission`
--
ALTER TABLE `salary_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `achivement_history`
--
ALTER TABLE `achivement_history`
  ADD CONSTRAINT `achivement_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `allowance_employee`
--
ALTER TABLE `allowance_employee`
  ADD CONSTRAINT `allowance_employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `allowance_employee_ibfk_2` FOREIGN KEY (`data_allowance_id`) REFERENCES `data_allowance` (`id`);

--
-- Ketidakleluasaan untuk tabel `appreciation_letter`
--
ALTER TABLE `appreciation_letter`
  ADD CONSTRAINT `appreciation_letter_ibfk_1` FOREIGN KEY (`gift_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appreciation_letter_ibfk_2` FOREIGN KEY (`receive_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `business_trip`
--
ALTER TABLE `business_trip`
  ADD CONSTRAINT `business_trip_ibfk_1` FOREIGN KEY (`request_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `business_trip_ibfk_2` FOREIGN KEY (`executed_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `business_trip_ibfk_3` FOREIGN KEY (`approver`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `data_allowance`
--
ALTER TABLE `data_allowance`
  ADD CONSTRAINT `data_allowance_ibfk_1` FOREIGN KEY (`fee`) REFERENCES `data_allowance` (`id`);

--
-- Ketidakleluasaan untuk tabel `educational_background`
--
ALTER TABLE `educational_background`
  ADD CONSTRAINT `educational_background_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `family_member`
--
ALTER TABLE `family_member`
  ADD CONSTRAINT `family_member_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `history_experience_abroad`
--
ALTER TABLE `history_experience_abroad`
  ADD CONSTRAINT `history_experience_abroad_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `job_history`
--
ALTER TABLE `job_history`
  ADD CONSTRAINT `job_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `job_history_ibfk_2` FOREIGN KEY (`salary_class_id`) REFERENCES `salary_class` (`id`);

--
-- Ketidakleluasaan untuk tabel `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `leave_ibfk_2` FOREIGN KEY (`responsible`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `leave_ibfk_3` FOREIGN KEY (`jenis_cuti_id`) REFERENCES `jenis_cuti` (`id`);

--
-- Ketidakleluasaan untuk tabel `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `menu_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);

--
-- Ketidakleluasaan untuk tabel `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `personal_data`
--
ALTER TABLE `personal_data`
  ADD CONSTRAINT `personal_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `rank_history`
--
ALTER TABLE `rank_history`
  ADD CONSTRAINT `rank_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rank_history_ibfk_2` FOREIGN KEY (`salary_class_id`) REFERENCES `salary_class` (`id`);

--
-- Ketidakleluasaan untuk tabel `reprimand_letter`
--
ALTER TABLE `reprimand_letter`
  ADD CONSTRAINT `reprimand_letter_ibfk_1` FOREIGN KEY (`provide_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reprimand_letter_ibfk_2` FOREIGN KEY (`receive_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reprimand_letter_ibfk_3` FOREIGN KEY (`approver`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `retirement_proposal`
--
ALTER TABLE `retirement_proposal`
  ADD CONSTRAINT `retirement_proposal_ibfk_1` FOREIGN KEY (`request_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `retirement_proposal_ibfk_2` FOREIGN KEY (`receive_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `retirement_proposal_ibfk_3` FOREIGN KEY (`approver`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `salary_submission`
--
ALTER TABLE `salary_submission`
  ADD CONSTRAINT `salary_submission_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
