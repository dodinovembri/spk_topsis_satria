-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 04:29 PM
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
-- Database: `spk_topsis_imam`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `id_jenis_alternatif` int(11) NOT NULL,
  `kode_alternatif` varchar(100) DEFAULT NULL,
  `nama_alternatif` varchar(100) DEFAULT NULL,
  `latitude` double(18,6) DEFAULT NULL,
  `longitude` double(18,6) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `gambar_panorama` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `id_jenis_alternatif`, `kode_alternatif`, `nama_alternatif`, `latitude`, `longitude`, `gambar`, `gambar_panorama`, `keterangan`) VALUES
(1, 1, 'PK', 'Pulau Kemaro', -2.977540, 104.817285, '60ea56a4ab812.jpg', '60eab05112aee.jpg', 'Pulau Kemaro, merupakan sebuah delta kecil di Sungai Musi, terletak sekitar 6 km dari Jembatan Ampera. Pulau Kemaro terletak di daerah industri, yaitu di antara Pabrik Pupuk Sriwijaya dan Pertamina Plaju dan Sungai Gerong. Posisi Pulau Kemaro adalah agak ke timur dari pusat Kota Palembangs.'),
(2, 1, 'PKU', 'Punti Kayu', -2.943501, 104.728295, '60ea56b8a6213.jpg', '60eac9b19c9e4.jpg', 'Taman Wisata Alam (TWA) Punti Kayu adalah sebuah kawasan pelestarian alam yang dimanfaatkan untuk kegiatan pariwisata alam dan rekreasi di Palembang, Sumatra Selatan . Terletak di tengah kota Palembang - tepatnya di kawasan Km.7 Palembang, Punti Kayu menjadi tempat liburan favorit yang ramai dikunjungi warga kota Palembang khususnya pada akhir pekan dan hari-hari libur. Kawasan ini dilengkapi dengan fasilitas flying fox, taman bermain, miniatur 7 keajaiban dunia, danau, waterpark, dan berbagai hiburan lainnya'),
(3, 2, 'PBP', 'Palembang Bird Park', -3.036287, 104.788212, '60ea56cc95438.jpg', NULL, 'Taman wisata Palembang Bird Park terletak di kawasan OPI Mall Jakabaring Palembang, tidak jauh dari OPI Water Fun Jakabaring. Di sini menjadi taman burung karena menyediakan lebih dari 100 jenis burung, seperti burung parkit, jalak, kakak tua, kenari, zebra, dan jenis lainnya. Wisata ini cocok sebagai pilihan keluarga, terutama untuk anak-anak'),
(4, 2, 'KI', 'Kambang Iwak', -2.989808, 104.746852, '60ea56dc2c2cd.jpg', NULL, 'Taman Wisata Kambang Iwak Besak, salah satu jejak peninggalan Kompeni Belanda di Kota Palembang adalah Taman Wisata Kambang Iwak'),
(5, 3, 'BKB', 'Benteng Kuto Besak', -2.991089, 104.759293, '60ea56e6c5665.jpg', NULL, 'Kuto Besak, also Benteng Kuto Besak (Indonesian \"Kuto Besak Fortress\") is an 18th-century kraton (Indonesian forted palace) in Palembang, South Sumatra. Kuto Besak was the center of the Sultanate of Palembang before its abolition by the Dutch colonial government. The fort was constructed in 1780 and took seventeen years to complete.[1] Kuto Besak was inaugurated in 1797,[1] marked by the transfer of the royal residence from the older Kuto Lamo to Kuto Besak'),
(6, 3, 'TWKS', 'Taman Kerajaan Sriwijaya', -3.014968, 104.734365, '60ea56f00811b.jpg', NULL, 'Taman Purbakala Kerajaan Sriwijaya atau sebelumnya dikenal dengan nama Situs Karanganyar adalah taman purbakala bekas kawasan permukiman dan taman yang dikaitkan dengan kerajaan Sriwijaya yang terletak tepi utara Sungai Musi di kota Palembang, Sumatra Selatan'),
(7, 2, 'AQ', 'Al Quran AlAkbar', -3.010961, 104.704040, '60ea56f9cad77.jpg', NULL, 'Al Quran Al-Akbar atau yang juga sering disebut Al Quran Raksasa yang berada di kota Palembang beralamat di Pondok Pesantren Al Ihsaniyah Gandus Palembang. Terdapat 30 juz ayat suci Al-Quran yang berhasil dipahat/diukir ala khas Palembang dalam lembar kayu dan menghabiskan kurang lebih 40 meter kubik kayu tembesu dengan biaya tidak kurang Rp 2 miliar, dimana masing-masing lembar ukuran halamannya 177 x 140 x 2,5 sentimeter dan tebal keseluruhannya termasuk sampul mencapai 9 meter'),
(8, 2, 'MCH', 'Masjid Cheng Ho', -3.024269, 104.780050, '60ea5717acf5b.jpeg', NULL, 'Masjid Cheng Hoo Palembang sebenarnya bernama Masjid Al Islam Muhammad Cheng Hoo Sriwijaya Palembang adalah Masjid bernuansa Muslim Tionghoa yang berlokasi di Jakabaring Palembang'),
(9, 3, 'KAA', 'Kampung Arab AlMunawar', -2.987499, 104.773202, '60ea57213460c.jpg', NULL, 'Kampung Arab Al Munawar terletak di kota Palembang, kampung di Sumatra Selatan yang menarik. Bukan hanya karena tergolong tua, destinasi wisata ini nilai sejarahnya juga tak luput dari perhatian. Desa wisata yang terletak di tepi Sungai Musi yang disebut \"Laot\" atau laut oleh masyarakt, kampung ini memiliki banyak kejutan dan pesona.Di kampung ini terdapat berbagai keturunan diantaranya ada keturunan Assegaf, Al-Habsy, Al-Kaaf, Hasny, Syahab.[1] Kampung yang menjadi pusat wisata ini pada tahun 2018 sempat diubah dengan menarik untuk menonjolkan wisata di daerah sana. Pada ajang Asian Games 2018 kampung ini diubah untuk lebih memperkenalkan etnis dan budaya keturunan Arab di lingkungan masyarakat'),
(10, 3, 'MA', 'Masjid Agung', -2.987821, 104.760310, '60ea572a605a3.jpg', NULL, 'Masjid Agung Sultan Mahmud Badaruddin I Jayo Wikramo atau biasa disebut Masjid Agung Palembang adalah sebuah masjid paling besar di Kota Palembang, Sumatra Selatan. Masjid ini didirikan pada abad ke-18 oleh Sultan Mahmud Badaruddin I Jayo Wikramo');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_alternatif`
--

CREATE TABLE `gambar_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar_alternatif`
--

INSERT INTO `gambar_alternatif` (`id`, `id_alternatif`, `gambar`, `status`) VALUES
(1, 1, '60eaa8abe59b1.jpg', 1),
(2, 1, '60eaa8fc60abd.jpg', 1),
(3, 1, '60eaa90557f36.jpg', 1),
(5, 1, '60eaaacf31bb7.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_alternatif`
--

CREATE TABLE `jenis_alternatif` (
  `id` int(11) NOT NULL,
  `kode_jenis` varchar(100) DEFAULT NULL,
  `nama_jenis` varchar(255) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_alternatif`
--

INSERT INTO `jenis_alternatif` (`id`, `kode_jenis`, `nama_jenis`, `gambar`, `keterangan`) VALUES
(1, 'WA', 'Wisata Alam', '60ea903b1db1e.jpg', NULL),
(2, 'HBM', 'Hasil Buatan Manusia', '60ea9086208b4.jpg', NULL),
(3, 'SB', 'Sejarah dan Budaya', '60ea90a50212e.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode_kriteria` varchar(100) DEFAULT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `jenis_kriteria` varchar(50) DEFAULT NULL,
  `bobot` double(18,2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode_kriteria`, `nama_kriteria`, `jenis_kriteria`, `bobot`, `keterangan`) VALUES
(1, 'C1', 'Biaya', 'Benefit', 5.00, 'Kriteria Biaya'),
(2, 'C2', 'Jarak', 'Cost', 4.00, 'Kriteria Jarak'),
(3, 'C3', 'Fasilitas', 'Benefit', 5.00, 'Kriteria Fasilitas'),
(4, 'C4', 'Aksesibilitas', 'Benefit', 5.00, 'Kriteria Aksesibilitas');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_nilai_kriteria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `id_nilai_kriteria`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 8),
(3, 1, 3, 15),
(4, 1, 4, 16),
(5, 2, 1, 1),
(6, 2, 2, 7),
(7, 2, 3, 15),
(8, 2, 4, 20),
(9, 3, 1, 1),
(10, 3, 2, 8),
(11, 3, 3, 15),
(12, 3, 4, 19),
(13, 4, 1, 1),
(14, 4, 2, 6),
(15, 4, 3, 15),
(16, 4, 4, 19),
(17, 5, 1, 1),
(18, 5, 2, 6),
(19, 5, 3, 15),
(20, 5, 4, 20),
(21, 6, 1, 1),
(22, 6, 2, 7),
(23, 6, 3, 15),
(24, 6, 4, 19),
(25, 7, 1, 1),
(26, 7, 2, 8),
(27, 7, 3, 15),
(28, 7, 4, 18),
(29, 8, 1, 1),
(30, 8, 2, 7),
(31, 8, 3, 14),
(32, 8, 4, 19),
(33, 9, 1, 1),
(34, 9, 2, 6),
(35, 9, 3, 14),
(36, 9, 4, 19),
(37, 10, 1, 1),
(38, 10, 2, 6),
(39, 10, 3, 14),
(40, 10, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id`, `id_kriteria`, `keterangan`, `nilai`) VALUES
(1, 1, '0 - 50 Ribu', 1),
(2, 1, '51 - 100 Ribu', 2),
(3, 1, '101 - 150 ribu', 3),
(4, 1, '151 ribu - 200 ribu', 4),
(5, 1, '>200 ribu', 5),
(6, 2, '0 - 3 km', 5),
(7, 2, '4 - 7 km', 4),
(8, 2, '8 - 11 km', 3),
(9, 2, '12 - 15 km', 2),
(10, 2, '>15 km', 1),
(11, 3, 'Sangat tidak lengkap (tidak memiliki fasilitas)', 1),
(12, 3, 'Tidak lengkap (memiliki 1-2 fasilitas)', 2),
(13, 3, 'Cukup lengkap (memiliki 3-4 fasilitas)', 3),
(14, 3, 'Lengkap (memiliki 5-6 fasilitas)', 4),
(15, 3, 'Sangat lengkap (memiliki lebih dari 7 fasilitas)', 5),
(16, 4, 'Sangat tidak memadai', 1),
(17, 4, 'Tidak memadai', 2),
(18, 4, 'Cukup Memadai', 3),
(19, 4, 'Memadai', 4),
(20, 4, 'Sangat Memadai', 5);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `judul`, `gambar`, `status`) VALUES
(1, 'Daya Tarik Pulau Kemaro yang Melegenda', '60ea7d1ea6140.jpg', 1),
(3, 'Pesona Kambang Iwak Palembang', '60ea80abd1bd1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '60e32ed7a5d52.png', NULL, '$2y$10$iBSBnuXcIO6PIwFduj2/xuqFdnYUoEUrjeSz4w.0pvEYnC61Voiae', NULL, '2021-07-05 05:19:56', '2021-07-06 20:35:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_alternatif` (`id_jenis_alternatif`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_alternatif`
--
ALTER TABLE `gambar_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `jenis_alternatif`
--
ALTER TABLE `jenis_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_nilai_kriteria` (`id_nilai_kriteria`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gambar_alternatif`
--
ALTER TABLE `gambar_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_alternatif`
--
ALTER TABLE `jenis_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_jenis_alternatif`) REFERENCES `jenis_alternatif` (`id`);

--
-- Constraints for table `gambar_alternatif`
--
ALTER TABLE `gambar_alternatif`
  ADD CONSTRAINT `gambar_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`);

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`),
  ADD CONSTRAINT `nilai_alternatif_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`),
  ADD CONSTRAINT `nilai_alternatif_ibfk_3` FOREIGN KEY (`id_nilai_kriteria`) REFERENCES `nilai_kriteria` (`id`);

--
-- Constraints for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
