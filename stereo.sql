-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2019 at 04:52 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.23-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stereo`
--

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `name`, `division`) VALUES
(1, 'School of Credit & Risk', 1),
(2, 'School of Sales & Service', 1);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`) VALUES
(1, 'Learning Center Division');

-- --------------------------------------------------------

--
-- Table structure for table `proktor`
--

CREATE TABLE `proktor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proktor`
--

INSERT INTO `proktor` (`id`, `name`, `user`, `quiz`, `code`) VALUES
(1, 'CMLD Jakarta Barat', 1, 1, 'QWERTY');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_quiz_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `duration`, `date`, `total_quiz_data`) VALUES
(1, 'Assessment CMLD', 60, '2019-10-10', '[{\"id\": \"1\",\"total\": \"2\"}, {\"id\": \"2\",\"total\": \"2\"}, {\"id\": \"3\",\"total\": \"2\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_category`
--

CREATE TABLE `quiz_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `passing_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_category`
--

INSERT INTO `quiz_category` (`id`, `name`, `passing_grade`) VALUES
(1, 'Product Knowledge', 65),
(2, 'Business Process', 65),
(3, 'Policy & Regulation', 65);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_data`
--

CREATE TABLE `quiz_data` (
  `id` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `quiz_category` int(11) NOT NULL,
  `question` text NOT NULL,
  `multiple_answer` text NOT NULL,
  `correct_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_data`
--

INSERT INTO `quiz_data` (`id`, `quiz`, `quiz_category`, `question`, `multiple_answer`, `correct_answer`) VALUES
(1, 1, 1, 'Variabel Analisa Kualitatif dalam pemberian kredit terdiri dari faktor internal dan eksternal. Faktor internal yang harus dianalisis meliputi aspek-spek sebagai berikut :', '[\"Manajemen, Teknis Produksi, Pemasaran, Keuangan, Persaingan Industri dan Agunan\",\"Manajemen, Teknis Produksi, Pemasaran, Keuangan dan Siklus atau Konjungtur Ekonomi\",\"Manajemen, Teknis Produksi, Pemasaran, Keuangan, Amdal dan Fluktuasi Kurs\",\"Manajemen, Teknis Produksi, Pemasaran, Keuangan, Amdal, Agunan dan makro ekonomi\"]', 0),
(2, 1, 1, 'Semakin tinggi posisi leverage perusahaan menujukkan bahwa :', '[\"Pendanaan perusahaan semakin tergantung kepada external financing (hutang kepada pihak ketiga)\",\"Pendanaan perusahaan tidak tergantung kepada external financing (hutang kepada pihak ketiga)\",\"Posisi networth perusahaan yang lebih besar apabila dibandingkan dengan total external financing (hutang kepada pihak ketiga)\",\"Perolehan laba perusahaan yang semakin tinggi\"]', 0),
(3, 1, 1, 'Likuiditas perusahaan dapat dilihat pada laporan arus kas (cash flow statement), pada bagian :', '[\"Operating Cash Flow\",\"Investing Cash Flow\",\"Financial Cash Flow\",\"Surplus Cash Flow\"]', 0),
(4, 1, 2, 'Selain mencerminkan likuiditas perusahaan yang cukup baik, Net Working Capital positif dapat memberi petunjuk bagi Bank yang akan membiayai Kredit Modal Kerja (KMK), bahwa perusahaan tersebut memiliki :', '[\"Solvabilitas yang baik\", \"Profitabilitas yang baik\", \"Ketersediaan self financing atas pembiayaan KMK\", \"Current Ratio yang kurang baik\"]', 2),
(5, 1, 2, 'Selain mencerminkan likuiditas perusahaan yang cukup baik, Net Working Capital positif dapat memberi petunjuk bagi Bank yang akan membiayai Kredit Modal Kerja (KMK), bahwa perusahaan tersebut memiliki :', '[\"Solvabilitas yang baik\",\"Profitabilitas yang baik\",\"Ketersediaan self financing atas pembiayaan KMK\",\"Current Ratio yang kurang baik\"]', 0),
(6, 1, 2, 'Tindakan pemantauan secara dini terhadap kredit dengan kolektibilitas 1 maupun 2, dengan tujuan untuk dapat segera  dilakukan  tindakan  preventif  untuk  mencegah terjadinya down grade kolektibilitas, disebut :', '[\"Annual Review\",\"On the spot\",\"Early Recognition Watch List\",\"Review account watch list\"]', 2),
(7, 1, 3, 'Monitoring atas kredit investasi harus dilakukan Bank secara ketat, khususnya untuk memastikan asumsi yang telah diyakini pada analisis kelayakan proyek. Apabila realisasi pelaksanaan pembangunan proyek mundur dari rencana, hal-hal yang harus menjadi perhatian utama adalah :', '[\"Munculnya risiko penyelesaian proyek (Contrsuction risk)\",\"Bank harus melakukan perubahan Syarat dan Ketentuan Kredit sesuai dengan kondisi terkini\",\"Bank perlu melakukan restrukturisasi kredit\",\"Bank akan menghentikan pencairan kredit\"]', 1),
(8, 1, 3, 'Periodical Review merupakan sarana yang baik untuk melakukan loan monitoring, karena :', '[\"Perkembangan bisnis debitur harus dimonitor secara ketat\",\"Merupakan langkah awal untuk melakukan restrukturisasi kredit\",\"Dapat memantau perkembangan dan kondisi debitur secara periodik, sehingga dapat diantisipasi perubahan yang berpengaruh terhadap pemenuhan kewajiban kredit\",\"Memberi keyakinan pada Bank usaha debitur berjalan sesuai dengan rencana\"]', 2),
(9, 1, 3, 'Manakah dari pernyataan dibawah ini, yang paling benar untuk menjelaskan Debt Service Coverage Ratio (DSCR) :', '[\"DSCR pasti akan lebih besar dari 1x, apabila EBITDA positif\",\"Apabila DSC > 1x, debitur mampu memenuhi seluruh kewajiban kredit, baik angsuran pokok maupun bunga kredit\",\"Apabila DSCR < 1x, maka perusahaan pasti sedang mengalami kerugian (operating icome negatif)\",\"Apabila Free Cash Flow positif, maka DCSR pasti akan lebih besar dari 1x\"]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `role` enum('SUPERADMIN','ADMIN','USER') NOT NULL,
  `departement` int(11) DEFAULT NULL,
  `last_fingerprint` varchar(32) NOT NULL,
  `state` enum('LOGIN','LOGOUT') NOT NULL DEFAULT 'LOGOUT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `name`, `password`, `email`, `role`, `departement`, `last_fingerprint`, `state`) VALUES
(1, 'rukanda', 'Rukanda Faridsi', 'ef88886f6700675eaa11a16174cc00eb', '1wordwar@gmail.com', 'SUPERADMIN', NULL, '4e3484fcf42a60343c22da80e564857d', 'LOGIN');

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz`
--

CREATE TABLE `user_quiz` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `proktor` int(11) NOT NULL,
  `question` text NOT NULL,
  `multiple_answer` text NOT NULL,
  `chosen_answer` text NOT NULL,
  `state` enum('PENDING','EVALUATING','FINISH','') NOT NULL DEFAULT 'PENDING',
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_quiz`
--

INSERT INTO `user_quiz` (`id`, `user`, `proktor`, `question`, `multiple_answer`, `chosen_answer`, `state`, `created_at`) VALUES
(1, 1, 1, '[1,3,5,4,9,8]', '[[1,3,2,0],[2,1,3,0],[3,2,1,0],[3,0,2,1],[0,3,2,1],[3,1,0,2]]', '[{\"index\":2,\"flag\":false},{\"index\":1,\"flag\":false},{\"index\":-1,\"flag\":false},{\"index\":-1,\"flag\":false},{\"index\":-1,\"flag\":false},{\"index\":-1,\"flag\":false}]', 'EVALUATING', '1570951509');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division` (`division`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proktor`
--
ALTER TABLE `proktor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `quiz` (`quiz`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_category`
--
ALTER TABLE `quiz_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_data`
--
ALTER TABLE `quiz_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_category` (`quiz_category`),
  ADD KEY `quiz` (`quiz`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departement` (`departement`);

--
-- Indexes for table `user_quiz`
--
ALTER TABLE `user_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `proktor` (`proktor`),
  ADD KEY `state` (`state`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proktor`
--
ALTER TABLE `proktor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_category`
--
ALTER TABLE `quiz_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_data`
--
ALTER TABLE `quiz_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_quiz`
--
ALTER TABLE `user_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`division`) REFERENCES `division` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `proktor`
--
ALTER TABLE `proktor`
  ADD CONSTRAINT `proktor_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `proktor_ibfk_2` FOREIGN KEY (`quiz`) REFERENCES `quiz` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `quiz_data`
--
ALTER TABLE `quiz_data`
  ADD CONSTRAINT `quiz_data_ibfk_1` FOREIGN KEY (`quiz_category`) REFERENCES `quiz_category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_data_ibfk_2` FOREIGN KEY (`quiz`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`departement`) REFERENCES `departement` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_quiz`
--
ALTER TABLE `user_quiz`
  ADD CONSTRAINT `user_quiz_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_quiz_ibfk_3` FOREIGN KEY (`proktor`) REFERENCES `proktor` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
