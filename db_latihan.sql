-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2020 at 02:56 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` text NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `level`) VALUES
(1, 'admin', 'bakhtiar', 'Bakhtiar Ramadhan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(150) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `title`, `content`, `tags`, `date`, `creator`) VALUES
(1, 'DTS VSGA Web Developer', 'Hai Temen temen, wah udah habis aja nih pelatihan DTS VSGA padahal masih banyak yang mau di ajarkan, namun kita sebagai siswa didalam DTS tetap semangat ya, cukup sekian terima kasih', 'Pelatihan DTS VSGA 2020', '2020-10-16 15:24:51', 0),
(2, 'Website untuk belajar programming', 'Untuk kalian yang baru belajar tentang programming kalian bisa kunjungi situs situs berikut ini\r\n\r\nhttps://w3schools.com/\r\nhttps://www.petanikode.com/\r\nhttps://sekolahkoding.com/\r\n\r\nitulah situs situs yang bisa saya rekomendasikan kepada kalian', 'referensi programming', '2020-10-18 01:29:41', 1),
(3, 'Text editor', 'Untuk kalian yang mau mencari text editor modern yang memudahkan kalian dalam pengetikan program saya ada beberapa nih \r\n\r\n\r\nSublime Text(https://www.sublimetext.com/)\r\nVisual Studio Code(https://code.visualstudio.com/)\r\nNetbeans(https://netbeans.org/)\r\nDream Weaver(https://www.adobe.com/sea/products/dreamweaver.html?sdid=1FJDDK6F&mv=search&ef_id=CjwKCAjwrKr8BRB_EiwA7eFapmmq5VxmlTTxq4IRNGAED9zzSQl_5kaSx8t24EYLXSKjP_kt_XvGXxoCDBoQAvD_BwE:G:s&s_kwcid=AL!3085!3!472466938546!e!!g!!dreamweaver)\r\n\r\nitu saha yang bisa saya berikan\r\n', 'Text Editor', '2020-10-18 01:29:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `tags` varchar(150) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creator` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `title`, `content`, `tags`, `date`, `creator`) VALUES
(1, 'Hosting di id.00webhosting.com', '1. Temen temen silahkan buka https://id.00webhosting.com\r\n2. Buat akun disana \r\n3. buat zip website yang telah kalian buat\r\n4. upload file tersebut di menu file manager\r\n5. selesai website anda sudah jadi', 'hosting, hosting gratis, website', '2020-10-16 15:20:38', 1),
(2, 'Install XAMPP sebagai Web Server Secara Lokal', '1. Download Xampp di internet atau bisa kunjungi situs ini https://www.apachefriends.org/index.html\r\n2. Buka File Installer Xampp\r\n3. Klik next next aja bagi yang belum tau (jangan lupa baca ReadME :D)\r\n4. Setelah selesai bakalan ada tampilan awal untuk memulai xampp sebagai server', 'xampp, web server', '2020-10-18 00:36:01', 1),
(3, 'Cara membuat file html', '1. Buka text editor kesukaan anda bisa juga gunakan notepad atau nano(kalau menggunakan linux)\r\n2. buatlah script markup seperti berikut\r\n<html>\r\n<body>\r\n<h1>File html saya</h1>\r\n</body>\r\n</html>\r\n3. save file tersebut dengan extensi.html di akhir filenamenya( untuk notepad save as all files dan ketik nama_file.html)\r\n4. buka di browser kalian dengan klik 2 kali file tersebut', 'html', '2020-10-18 00:45:54', 1),
(4, 'Cara membuat php', '1. Buka text editor kesukaan anda bisa juga gunakan notepad atau nano(kalau menggunakan linux)\r\n2. buatlah script markup seperti berikut\r\n<?php\r\n echo \"program pertama saya\";\r\n?>\r\n3. save file tersebut dengan extensi .php di akhir filenamenya( untuk notepad save as all files dan ketik nama_file.php)\r\n4. buka di browser kalian dengan klik 2 kali file tersebut\r\nNote: untuk melihat file ini kalian perlu menjalankan xampp sebagai webserver', 'php, xampp', '2020-10-18 00:48:23', 1),
(5, 'cara install sublime text ', '1. Download sublime text di halaman https://www.sublimetext.com/\r\n2. buka file installer\r\n3. klik next aja sampai selesai ( jangan lupa lihat perjanjian pengguna)\r\n4. setelah selesai anda akan ditampilkan dengan kesederhanaan text editor sublime text', 'sublime', '2020-10-18 00:50:50', 1),
(6, 'cara memudahkan pengetikan html di sublime', 'setelah anda install sublime text ada beberapa hal yang bisa memudahkan kalian dalam mengetik tags html\r\nyaitu dengan menambahkan package cara installasinya mudah\r\n\r\npergi ke tab tools>package control dan tunggu hingga process selesai(lihat bagian kiri bawah)\r\nsetelah selesai anda bisa masuk ke tab preferences>package control\r\ndisinilah anda bisa menemukan package yang dapat memudahkan pengetikan tag html kalian\r\ncontoh packagenya adalah emmet', 'sublime', '2020-10-18 00:54:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `fullname` text NOT NULL,
  `gender` varchar(1) NOT NULL,
  `address` text,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `gender`, `address`, `date`) VALUES
(1, 'bakhti', 'password', 'Bakhtiar Ramadhan', 'L', 'JL. Suka Maju, Penajam', '2020-10-16 14:11:44'),
(4, 'username', 'password', 'Username', 'L', 'JL. Server', '2020-10-16 14:11:44'),
(5, 'adam', 'password', 'adam damara lorenz', 'L', 'Jakarta', '2020-10-17 22:30:23'),
(6, 'diana', 'password', 'Diana Marinda', 'P', 'Surabaya', '2020-10-17 22:31:06'),
(7, 'dion', 'password', 'Dion malendra', 'L', 'JL. suka suka', '2020-10-17 22:32:40'),
(8, 'Lidya', 'password', 'Maulidya', 'P', 'JL. sana sini', '2020-10-17 22:33:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
