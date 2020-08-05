-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2020 at 03:06 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dafi_absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nipd` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jam_masuk` varchar(100) DEFAULT NULL,
  `jam_keluar` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `keterangan` text,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_fakultas`, `id_prodi`, `nipd`, `nama`, `tanggal`, `jam_masuk`, `jam_keluar`, `image`, `keterangan`, `jumlah`) VALUES
(20, 1, 1, 2028017502, 'Liza Efriyanti', '2020-07-21 12:41:19', '12:41:19', '12:41:25', 'image_1595310079.jpeg', '-', 1);

--
-- Triggers `absen`
--
DELIMITER $$
CREATE TRIGGER `jumlah_kehadiran` AFTER INSERT ON `absen` FOR EACH ROW BEGIN 
	UPDATE dosen SET kehadiran = kehadiran+NEW.jumlah
    WHERE nipd = NEW.nipd;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nipd` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `gelar` varchar(100) NOT NULL,
  `keahlian` varchar(100) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `role` int(5) NOT NULL,
  `kehadiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nipd`, `password`, `nama`, `tanggal_lahir`, `jabatan`, `gelar`, `keahlian`, `id_prodi`, `id_fakultas`, `role`, `kehadiran`) VALUES
('', '', 'Fandhy Sikumbang', '1990-12-03', 'Asisten Ahli', 'S. Kom, M. Kom', 'Teknik Informasi', 1, 1, 2, 0),
('12345', '$2y$10$YAVC9x9mBrv68gLwXbxJt.ONtZrWUyqna0zWEGGX4PQwvShS68VD.', 'Admin', '2020-07-19', 'Administrotor', '-', '-', 1, 1, 1, 0),
('123456789', '', 'Amri', '2020-07-21', 'Kajur', 'M.Pd', 'off', 3, 1, 2, 0),
('2002089002', '$2y$10$xCekrXrSAOP.sq5E2zjuieX97vrPKQY3pMFA6OAWNHDwcvvX6WFwa', 'Agus Nur Khomarudin', '1990-08-02', 'Asisten Ahli', 'S.Pd, M.Kom', 'Teknologi Informasi', 1, 1, 2, 0),
('2005107201', '', 'Supriadi', '1972-05-01', 'Lektor', 'S. Ag, M. Pd', 'Adm. Pendidikan', 1, 1, 2, 0),
('20059876', '$2y$10$gjDKnWol65uPYp3ak8rbKOfwP0.R/O76aOGe42KqCg/t0IngirPIa', 'Isnaniah', '1983-02-04', 'Lektor', 'M.Pd', 'Pendidikan', 3, 1, 2, 0),
('2007098301', '', 'Hari Anrtoni Musril', '1983-07-09', 'Lektor', 'S. Kom, M. Kom', 'Teknik Informasi', 1, 1, 2, 0),
('20104017505', '', 'Sarwo Derta', '1975-04-01', 'Asisten Ahli', 'S. Kom, M. Kom', 'Sistem Informasi', 1, 1, 2, 0),
('2017107901', '$2y$10$HhLHd7dirwNiEDUj8XsvSO6g02x.pFAgXuqsmToKrxTKlpDdxJg7S', 'Riri Okra', '1979-05-01', 'Asisten Ahli', 'S. Kom, M. Kom', 'Teknologi Informasi', 1, 1, 2, 0),
('2019087501', '', 'Supratman Zakir', '1975-08-08', 'Lektor', 'M. Pd, M. Kom', 'Teknik Informasi', 1, 1, 2, 0),
('2028017502', '$2y$10$tjIDCiQXOGFI5IIbIz.LC.ekjC/WfRl1RJah1y2r4ApZYl/sXE4Sy', 'Liza Efriyanti', '1975-02-28', 'Lektor', 'S. Ss, M. Kom', 'Teknik Informasi', 1, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL,
  `dekan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `dekan`) VALUES
(1, 'FTIK', 'Dr. Zulfani Sesmiarni, M.Pd'),
(2, 'Ekonomi Dan Bisnis Islam', 'Dr. Iiz Izmuddin, M.A'),
(3, 'Ushuluddin Adab Dan Dakwah', 'Dr. Nunu Burhanudin, L.c, M.Ag');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `informasi` text NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `nama`, `informasi`, `tanggal`) VALUES
(4, 'Agus Nur Khomarudin', 'Bagi yang tidak hadir silahkan masukkan surat izin sakit atau keterangan lainnya', '19 July 2020');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `kajur` varchar(100) NOT NULL,
  `nidn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`, `kajur`, `nidn`) VALUES
(1, 1, 'PTIK', 'Riri Okra, M.Kom', '46436743724737'),
(3, 1, 'PMTK', 'Tasnim Rahmat', '544578658658');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `tahun` varchar(15) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun`, `semester`) VALUES
(1, '2020/2021', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `image`) VALUES
(1, 'dgdg', 'amri@gmail.com', '$2y$10$r1cdX/SP.6sGdkm/jMvj7uFUD87wDAHqBgrb1FbmbfWTHBqW7neti', 'image_1594895865.png'),
(2, 'th', 'dg@hh', '$2y$10$kGPzFesZbt55raP78TCueu2BDbsvZJplAkOBir.g03myzWo/.T8Nm', 'image_1594896012.png'),
(3, 'fb', 'ad@hh', '$2y$10$VspOq40qjaJAzYtITZaYp.Jjomi8n2n2Nfc3A8lbYxIwggwj/mlEW', 'image_1594896049.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nipd`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
