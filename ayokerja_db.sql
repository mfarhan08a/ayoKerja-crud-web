-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 03:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayokerja_db`
--
CREATE DATABASE IF NOT EXISTS `ayokerja_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ayokerja_db`;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_desc` text NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_status` tinyint(1) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_image_url` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_desc`, `job_type`, `job_status`, `company_name`, `company_image_url`, `salary`, `title`, `company_email`) VALUES
(1, '                                                        Software engineer merupakan salah satu profesi di bidang teknologi informasi. Seorang software engineer bertugas melakukan analisa, membuat rekayasa, menyusun spesifikasi, mengimplementasikan dan memvalidasi suatu rancangan sistem perangkat lunak untuk menjawab suatu permasalahan.                                                ', 'Software engineer', 1, 'Gojek', 'https://d1j87w3j7cc3a6.cloudfront.net/newsroom/media/web/image/brandbook-logo-thumbnail-5.jpg', 18000000, 'Menjadi Android Developer di Gojek', 'gojek@mail.com'),
(5, '                                                                                    Kuli (bahasa Belanda: koelie, bahasa Inggris: coolie) adalah orang yang bekerja dengan mengandalkan kekuatan fisiknya, seperti untuk membongkar muatan kapal atau mengangkut barang dari stasiun, dengan memindahkan barang dari satu tempat ke tempat lain. Istilah lain digunakan untuk menyebut kuli sebagai pekerja kasar. Sekitar tahun 1600-an, istilah tersebut muncul ketika orang Eropa menyebut pekerja asli yang dipekerjakan secara kasar di India dan Tiongkok. Menurut Kamus Inggris Oxford, istilah tersebut berasal dari bahasa Hindi quli yang berarti \"pelayan yang disewa\". Kemudian dipinjam oleh bangsa Portugis yang menggunakannya di India selatan (yang secara kebetulan, kuli dalam bahasa Tamil berarti \"menyewa\") dan Tiongkok.                                                                        ', 'Builder', 0, 'Semen Empat Roda', 'https://static-siplah.blibli.com/data/images/SGOL-0003-00069/79b0b611-4286-436e-8ee9-30687b6c694c.jpg', 5000000, 'Menjadi Kuli Profesional Bersama Semen Empat Roda', 'semen3roda@mail.com'),
(9, 'Programmer adalah sebuah jenis profesi atau pekerjaan yang bertujuan untuk membuat sebuah sistem menggunakan bahasa pemrograman. Seseorang yang memiliki skill menulis kode program (syntax) dan merancang sistem, bisa juga disebut programmer. Kode atau bahasa program yang dimaksud seperti Java, Python, Javascript, PHP, dll.', 'Programmer', 1, 'Nasa', 'https://i.pinimg.com/originals/dd/f5/0e/ddf50e1451baf41d1aa01947fe9452bd.jpg', 20000000, 'Menjadi Programmer di Nasa', 'nasa@mail.com'),
(10, 'Graphic designer adalah orang yang memiliki spesialisasi dalam menginterpretasikan pesan dalam bentuk gambar. Dengan kata lain, seorang graphic designer adalah seorang komunikator visual. Tugasnya untuk menciptakan konsep visual secara manual, atau dapat menggunakan software komputer.', 'Graphic Desginer', 1, 'Gramedia', 'https://cdnwpedutorenews.gramedia.net/wp-content/uploads/2022/02/02083934/Gramedia-World-Karawang.png', 15000000, 'Menjadi Desainer Grafis di Gramedia', 'gramedia@mail.com'),
(11, 'Secara sederhana, animator bisa diartikan sebagai orang yang membuat animasi. Namun, secara khusus, sebenarnya posisi ini memiliki pengertian yang lebih kompleks daripada yang sudah dijelaskan sebelumnya. Animator adalah orang-orang yang membuat gambar. Namun, mereka tidak hanya membuat gambar saja. Mereka membuat satu set gambar, lalu mengombinasikannya menjadi sebuah gambar yang bergerak dan hidup.', 'Animator', 1, 'Kyoto Animation', 'https://images4.alphacoders.com/833/thumb-1920-833981.png', 10000000, 'Menjadi Animator di Kyoto Animation', 'kyoani@mail.com'),
(12, 'Istilah virtual youtuber sendiri pertama kali digunakan oleh Kizuna AI yang membuat konten YouTube untuk pertama kali pada akhir tahun 2016. Popularitasnya kemudian memicu tren VTuber di Jepang dan kemudian di seluruh dunia. Saat ini sudah ada lebih dari 10.000 VTuber yang ‘berkarir’ di YouTube. Tidak hanya menjadi youtuber, mereka juga terlibat dalam proyek-proyek periklanan besar, dan bahkan ditunjuk sebagai perwakilan pemerintah Jepang.', 'Streamer', 1, 'Holostream', 'https://images.microcms-assets.io/assets/5694fd90407444338a64d654e407cc0e/af75f46919bb473a8d3d2e1277471b3a/Aug2022_Audition.jpg?fit=clip&w=800&dpr=2', 13000000, 'Menjadi VTuber di Agensi Holostream', 'holostream@mail.com'),
(13, 'Fotografer adalah seseorang yang kerap dikaitkan dengan kemampuan menangkap momen atau hasil gambar yang berkualitas. Seseorang yang memiliki keahlian dalam memadukan proporsi dalam gambar juga kerap disebut ahli fotografi. Seorang fotografer tidak hanya dituntut untuk memahami angle pemotretan yang proporsional, namun ada beberapa skill lain yang turut dibutuhkan untuk menjadi fotografer andal. Jika kamu tertarik menjadi seorang fotografer, maka ada beberapa keterampilan karier untuk dipertimbangkan. Berikut beberapa informasi terkait tugas fotografer, kemampuan yang dibutuhkan, serta gaji berdasarkan tingkat pengalaman.', 'Photographer', 1, 'Studio 86', 'https://i.rtings.com/assets/pages/wLJxe8ki/best-cameras-for-beginners-medium.jpg', 10500000, 'Menjadi Photographer di Studio 86', 'studio86@mail.com'),
(14, 'Seperti yang sudah disebutkan di atas, social media specialist adalah seseorang yang bertanggung jawab untuk membuat dan membagikan konten digital di berbagai media sosial seperti Facebook, Twitter, Instagram, TikTok, dan Linkedin. Tujuannya dari pembuatan konten digital di media sosial bisa beragam, misalnya untuk membangun kesadaran merek atau brand awareness, mendorong penjualan, membangun hubungan dengan audiens, menjaga loyalitas konsumen, dan lainnya.\r\n\r\nSocial media specialist harus dapat memahami siapa audiens yang menjadi target untuk setiap media sosial agar dapat membuat konten yang sesuai. Selain itu, social media specialist tidak hanya membuat konten untuk satu platform saja, maka kamu harus mengetahui jenis-jenis konten di setiap platform dan cara penyampaian yang tepat. Misalnya, Twitter memiliki jumlah karakter yang terbatas, maka kamu harus mampu meringkas caption yang panjang tapi tidak menghilangkan informasi penting. Atau konten tersebut disampaikan dalam bentuk thread. Begitu juga di media sosial lainnya. ', 'Social Media Specialist', 1, 'Ranz Entertaiment', 'https://jobsoidstorage.blob.core.windows.net/job-images/JobDescription/Image/208-social-media-specialist-20200115111803797.png', 8500000, 'Menjadi Social Media Specialist di Ranz Entertaiment', 'ranzentertaiment@mail.com'),
(19, 'Facebook adalah media sosial dan layanan jejaring sosial online Amerika yang dimiliki oleh Meta Platforms. Didirikan pada tahun 2004 oleh Mark Zuckerberg dengan sesama siswa Harvard College dan teman sekamar Eduardo Saverin, Andrew McCollum, Dustin Moskovitz, dan Chris Hughes, namanya berasal dari direktori buku wajah (face book) yang sering diberikan kepada mahasiswa Amerika. Keanggotaan awalnya terbatas pada mahasiswa Harvard, secara bertahap berkembang ke universitas Amerika Utara lainnya dan, sejak 2006, siapa pun yang berusia di atas 13 tahun. Pada tahun 2020, Facebook mengklaim 2,8 miliar pengguna aktif bulanan, dan menempati peringkat ketujuh dalam penggunaan internet global. Itu yang paling mengunduh aplikasi seluler tahun 2010-an.', 'Software engineer', 0, 'Facebook', 'https://ligo.id/wp-content/uploads/2019/11/Facebook_Wordmark_Cycling.gif', 19500000, 'Menjadi Web Engineer di Facebook', 'facebook@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `img_url`, `email`, `password`) VALUES
(1, 'Muhammad Farhan', 'https://genshin.honeyhunterworld.com/img/tartaglia_033.webp', 'farhan@farhan.com', '12345678'),
(2, 'Xiangling', 'https://genshin.honeyhunterworld.com/img/xiangling_023.webp', 'xiangling@genshin.com', '87654321'),
(3, 'Perangs', 'https://sekolahbethesda.com/wp-content/uploads/2022/07/03c1e01579436385b07bed93624aa2db_dtt.png', 'frans@frans.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
