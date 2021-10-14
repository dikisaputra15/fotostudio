-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2020 at 07:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_foto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` int(10) NOT NULL,
  `id_pesan` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `tgl_konfir` date NOT NULL,
  `dp` int(10) NOT NULL,
  `sisa` int(10) NOT NULL,
  `upload_slip` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `id_pesan`, `user_id`, `id_paket`, `tgl_konfir`, `dp`, `sisa`, `upload_slip`) VALUES
(15, 61, 23, 3, '2020-08-30', 1500000, 0, 'webinar1.png'),
(16, 63, 23, 6, '2020-08-30', 3000000, 0, 'erdkosmetik.png'),
(17, 65, 23, 6, '2020-08-30', 1000000, 2000000, 'danau ranau.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pesan_reg`
--

CREATE TABLE `tb_detail_pesan_reg` (
  `id_pesan` int(10) NOT NULL,
  `id_paket` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `tgl_main` date NOT NULL,
  `jam_main` varchar(20) NOT NULL,
  `total` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pesan_reg`
--

INSERT INTO `tb_detail_pesan_reg` (`id_pesan`, `id_paket`, `user_id`, `tgl_pesan`, `tgl_main`, `jam_main`, `total`, `status`) VALUES
(59, 3, 23, '2020-08-30 22:01:48', '2020-08-30', '10 - 11', 1500000, 0),
(60, 3, 23, '2020-08-30 22:34:27', '2020-08-30', '8 - 9', 1500000, 0),
(61, 3, 23, '2020-08-30 22:36:23', '2020-08-30', '9 - 10', 1500000, 0),
(63, 6, 23, '2020-08-30 23:24:47', '2020-09-01', 'paket', 3000000, 0),
(64, 7, 23, '2020-08-30 23:40:44', '2020-08-30', 'paket', 300000, 0),
(65, 6, 23, '2020-08-30 23:45:46', '2020-09-02', 'paket', 3000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_foto` int(10) NOT NULL,
  `upload_foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `upload_foto`) VALUES
(2, '_DSC1714 copy.jpg'),
(3, '_DSC1797 copy.jpg'),
(4, '_DSC4819 copy.jpg'),
(5, '_DSC1907 copy.jpg'),
(6, '_DSC1889 copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(10) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `rincian` text NOT NULL,
  `jenis` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `harga`, `rincian`, `jenis`) VALUES
(1, 'paket PREWEDDING DI studio', 2000000, '3 Cetak foto + bingkai ukuran 21R5 cetak foto ukuran 4R + bingkaiSoft Copy', 0),
(2, 'prewedd and wedding', 3700000, '', 0),
(3, 'reguler', 1500000, '', 1),
(4, 'foto baby face', 300000, '- 5 pose , 1 tema.- 2 edit1 Bingkai, Cetak ukuran 14 cm x 19cm , 1 CD Soft copy', 1),
(5, 'paket keluarga', 500000, '2 bingkai 20R *(single frame)cetak ukuran 35cm x 45cm&nbsp;1 CD soft Copy', 1),
(6, 'PREWEDDING', 3000000, 'Sesuai lokasi', 0),
(7, 'paket wisuda', 300000, 'cetak sama bingkai 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `user_id`, `nama_penerima`, `no_hp`, `alamat`, `status`) VALUES
(58, 23, 'rahmat', '0846329834', 'pandeglang ijo lumut', 0),
(61, 23, 'rahmat', '0846329834', 'pandeglang besar', 3),
(62, 23, 'rahmat', '0846329834', 'pandeglang', 0),
(63, 23, 'rahmat', '0846329834', 'pandeglang', 3),
(64, 23, 'rahmat', '0846329834', 'pandeglang', 0),
(65, 23, 'rahmat', '0846329834', 'pandeglang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(10) NOT NULL,
  `nama_brand` varchar(300) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama_brand`, `photo`, `keterangan`) VALUES
(1, 'foto studio banten fhdfh', 'profil.jpg', '<p>foto studio terletak di provinsi banten,kami melayani pemesanan&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rek` int(10) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_rek` int(40) NOT NULL,
  `gambar` varchar(400) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rek`, `nama_bank`, `atas_nama`, `no_rek`, `gambar`, `status`) VALUES
(1, 'Bri', 'Eza ', 2147483647, 'logo-bri.png', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('customer','admin') NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama_lengkap`, `alamat`, `email`, `no_telp`, `username`, `password`, `level`, `status`) VALUES
(16, 'diki ', 'serang ', 'dikimistak@gmail.com', '082186099606', 'diki', '43b93443937ea642a9a43e77fd5d8f77', 'customer', 'on'),
(17, 'admin ', 'sempu masjid', 'admin@gmail.com', '082186099606', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'on'),
(18, 'juple', 'serang raya', 'nanang@gmail.com', '970787665', 'juple', 'e61ad86ce2888bd03094ef69e6510e8a', 'customer', 'on'),
(19, 'nanang', 'serang', 'nanang@gmail.com', '0988797', 'nanang', 'cc8839950896aa17b3224887089241ba', 'customer', 'on'),
(20, 'andryan syah', 'pandeglang', 'andreaan.zomelle@gmail.com', '085386473822', 'andryan', '4b947a68a5b5eba0a688f7b89b3ff54d', 'customer', 'on'),
(21, 'nazil', 'tangerang', 'nazil06@gmail.com', '98340202', 'nazil06', '827ccb0eea8a706c4c34a16891f84e7b', 'customer', 'on'),
(22, 'fahmi', 'rangkas ', 'fahmidodol@gmail.com', '-62', 'fahmi', 'f11d50d63d3891a44c332e46d6d7d561', 'customer', 'on'),
(23, 'rahmat', 'pandeglang', 'djhsasjf@gmail.com', '0846329834', 'rahmat', 'af2a4c9d4c4956ec9d6ba62213eed568', 'customer', 'on'),
(24, 'ded', 'pandeglang', 'djhsasjf@gmail.com', '478932022', 'dede', '3278c5c5e6aaa2a7a2163ea942470760', 'customer', 'on'),
(25, 'ian ferdi', 'pandeglang', 'ianferdie@gmail.com', '4857444849', 'ian', '24595ae5d0efcfff2020365dc4032287', 'customer', 'on'),
(26, 'deni m', 'Pandeglang', 'deni94m@gmai.com', '0567474442', 'deni', 'bc1b7b3ea9c0ad959fd9d0309f3931f7', 'customer', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_foto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rek` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
