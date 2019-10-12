-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 03:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_daftar_revisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_user` varchar(99) NOT NULL,
  `role` enum('admin','pelajar') NOT NULL,
  `token` text NOT NULL,
  `status` enum('login','logout') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `id_user`, `role`, `token`, `status`) VALUES
(213, '1234321', 'admin', 'c4a54618cae4197f9cf7796255a65246', 'login'),
(289, '1234321', 'admin', '7cb459926af44226f4d3395f0e88f1ca', 'logout');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agama`
--

INSERT INTO `tbl_agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Konghuchu'),
(4, 'Hindu'),
(5, 'Budha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `id_kategori`, `judul`, `gambar`, `isi`, `tanggal`) VALUES
(7, 1, 'Contoh artikel 123456', 'Contoh_artikel_123456.png', '<p>Kita dapat merubah nama direktori dengan fungsi&nbsp;<code>rename()</code>. Fungsi ini tidak hanya untuk merubah nama direktori, mengubah nama file juga dapat menggunakan fungsi ini.</p>\r\n\r\n<p>Ada dua parameter yang harus diberikan kepada fungsi ini. Pertama, nama file atau direktori yang akan diubah. Kedua, nama barunya.</p>\r\n\r\n<p>Contoh:</p>\r\n\r\n<pre>\r\n<code><!--?php rename(\"petanikode\", \"“petani_kode_baru\"); ?-->asdasdasdasdasdad</code></pre>\r\n\r\n<p>Percobaan:</p>\r\n', '2017-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id_daftar` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_status_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_daftar`, `nis`, `nama`, `id_jk`, `alamat`, `telp`, `sekolah`, `foto`, `id_status`, `id_status_pesan`) VALUES
(11, '11987231', 'Muhammad Faisal Ramadani', 1, 'Cirebon', '085761996065', 'SMKN 1 CIREBON', '11987231.png', 5, 1),
(12, '55545', 'Ahmad Juned Saepudin', 1, 'Cirbeon', '081312119466', 'SMKN 1 CIREBON', '55545.png', 5, 2),
(13, '876812', 'Juned Awesome', 2, 'Cirebon', '0812314123176', 'SMKN 1 CIREBON', '876812.png', 5, 1),
(14, '5464564', 'Amarrr', 1, 'Cirebon', '08123124', 'SMKN 1 CIREBON', '5464564.png', 5, 2),
(15, '71231', 'SubhanaAllah', 1, 'Cirebon', '0899123123', 'SMK ', '00071231.png', 5, 1),
(16, '99123123', 'Ahmad Junedin', 1, 'Cirebon', '01238102381', 'SMKN 1 Cirebon', '99123123.png', 5, 2),
(17, '923', 'Masha And Bear', 2, 'cirebon', '09123123', 'SMKN 1 JAMBLANG', '923.png', 5, 2),
(18, '0022919010', 'Betrand Reynold', 1, 'Cirebon', '081312119466', 'SMKN 1 CIREBON', '00229190101.jpg', 5, 1),
(19, '0022919011', 'Ronald', 1, 'Cirebon', '08122108615', 'SMKN 1 CIREBON', '0022919011.jpg', 5, 1),
(20, '8777812134', 'Ajsdlhadjlsh', 1, 'ajshdja', '081312119466', 'ASDJAHSD', '8777812134.png', 5, 2),
(21, '1234124124', 'Op', 1, 'ajsdhja', '08131211947', 'AKJDHSJKAH', '1234124124.png', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_ortu`
--

CREATE TABLE `tbl_detail_ortu` (
  `id_detail_ortu` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `p_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `p_ayah` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `alamat_kantor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pendidikan`
--

CREATE TABLE `tbl_detail_pendidikan` (
  `id_detail_pendidikan` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `d_sekolah` varchar(50) NOT NULL,
  `d_alamat` text NOT NULL,
  `d_jurusan` varchar(50) NOT NULL,
  `d_noijazah` varchar(25) NOT NULL,
  `d_tglijazah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jk`
--

CREATE TABLE `tbl_jk` (
  `id_jk` int(11) NOT NULL,
  `jk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jk`
--

INSERT INTO `tbl_jk` (`id_jk`, `jk`) VALUES
(1, 'laki-laki'),
(2, 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'pendidik'),
(2, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas_pilihan`
--

CREATE TABLE `tbl_kelas_pilihan` (
  `id_kelas_pilihan` int(11) NOT NULL,
  `kelas_pilihan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas_pilihan`
--

INSERT INTO `tbl_kelas_pilihan` (`id_kelas_pilihan`, `kelas_pilihan`) VALUES
(1, 'Reguler'),
(2, 'Extension');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `level`) VALUES
(1, 'super admin'),
(2, 'admin1'),
(3, 'admin2'),
(4, 'pendaftar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marital`
--

CREATE TABLE `tbl_marital` (
  `id_marital` int(11) NOT NULL,
  `marital` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_marital`
--

INSERT INTO `tbl_marital` (`id_marital`, `marital`) VALUES
(1, 'Menikah'),
(2, 'Belum Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kewarganegaraan` varchar(25) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_marital` int(11) NOT NULL,
  `nktp` int(25) NOT NULL,
  `nkk` int(25) NOT NULL,
  `id_studi_pilihan` int(11) NOT NULL,
  `id_kelas_pilihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sbkerja`
--

CREATE TABLE `tbl_sbkerja` (
  `id_sbkerja` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `sbkerja` enum('bekerja','tidak bekerja') NOT NULL,
  `sbnama_perusahaan` varchar(50) NOT NULL,
  `sbinstansi` varchar(50) NOT NULL,
  `sbjabatan` varchar(50) NOT NULL,
  `sbalamat_kantor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `status`) VALUES
(1, 'pendaftar'),
(2, 'calon'),
(3, 'registrasi'),
(4, 'diterima'),
(5, 'dihapus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_pesan`
--

CREATE TABLE `tbl_status_pesan` (
  `id_status_pesan` int(11) NOT NULL,
  `status_pesan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status_pesan`
--

INSERT INTO `tbl_status_pesan` (`id_status_pesan`, `status_pesan`) VALUES
(1, 'terkirim'),
(2, 'belum_terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studi_pilihan`
--

CREATE TABLE `tbl_studi_pilihan` (
  `id_studi_pilihan` int(11) NOT NULL,
  `studi_pilihan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studi_pilihan`
--

INSERT INTO `tbl_studi_pilihan` (`id_studi_pilihan`, `studi_pilihan`) VALUES
(1, 'Bahasa Inggris Plus Ilmu Komputer (S-1)'),
(2, 'Bahasa Jepang Plus Ilmu Komputer (S-1)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_admin`
--

CREATE TABLE `tbl_user_admin` (
  `id_admin` int(11) NOT NULL,
  `nidn` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_admin`
--

INSERT INTO `tbl_user_admin` (`id_admin`, `nidn`, `nama`, `password`, `foto`, `id_level`) VALUES
(1, 1234321, 'Ahmad Zet', '$2y$12$Rg/ZZymbogN2cMcY3WgU2OcxlQJDy2NtQyOQqhPZYnsH2rQjuSham', '1234321.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_daftar`
--

CREATE TABLE `tbl_user_daftar` (
  `id_user` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_jk` (`id_jk`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_status_pesan` (`id_status_pesan`);

--
-- Indexes for table `tbl_detail_ortu`
--
ALTER TABLE `tbl_detail_ortu`
  ADD PRIMARY KEY (`id_detail_ortu`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `tbl_detail_pendidikan`
--
ALTER TABLE `tbl_detail_pendidikan`
  ADD PRIMARY KEY (`id_detail_pendidikan`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `tbl_jk`
--
ALTER TABLE `tbl_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tbl_kelas_pilihan`
--
ALTER TABLE `tbl_kelas_pilihan`
  ADD PRIMARY KEY (`id_kelas_pilihan`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_marital`
--
ALTER TABLE `tbl_marital`
  ADD PRIMARY KEY (`id_marital`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_daftar` (`id_daftar`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_marital` (`id_marital`),
  ADD KEY `id_studi_pilihan` (`id_studi_pilihan`),
  ADD KEY `id_kelas_pilihan` (`id_kelas_pilihan`);

--
-- Indexes for table `tbl_sbkerja`
--
ALTER TABLE `tbl_sbkerja`
  ADD PRIMARY KEY (`id_sbkerja`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_status_pesan`
--
ALTER TABLE `tbl_status_pesan`
  ADD PRIMARY KEY (`id_status_pesan`);

--
-- Indexes for table `tbl_studi_pilihan`
--
ALTER TABLE `tbl_studi_pilihan`
  ADD PRIMARY KEY (`id_studi_pilihan`);

--
-- Indexes for table `tbl_user_admin`
--
ALTER TABLE `tbl_user_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `tbl_user_daftar`
--
ALTER TABLE `tbl_user_daftar`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_daftar` (`id_daftar`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `tbl_agama`
--
ALTER TABLE `tbl_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_detail_ortu`
--
ALTER TABLE `tbl_detail_ortu`
  MODIFY `id_detail_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_detail_pendidikan`
--
ALTER TABLE `tbl_detail_pendidikan`
  MODIFY `id_detail_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jk`
--
ALTER TABLE `tbl_jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kelas_pilihan`
--
ALTER TABLE `tbl_kelas_pilihan`
  MODIFY `id_kelas_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_marital`
--
ALTER TABLE `tbl_marital`
  MODIFY `id_marital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sbkerja`
--
ALTER TABLE `tbl_sbkerja`
  MODIFY `id_sbkerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_status_pesan`
--
ALTER TABLE `tbl_status_pesan`
  MODIFY `id_status_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_studi_pilihan`
--
ALTER TABLE `tbl_studi_pilihan`
  MODIFY `id_studi_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_admin`
--
ALTER TABLE `tbl_user_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user_daftar`
--
ALTER TABLE `tbl_user_daftar`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD CONSTRAINT `tbl_artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Constraints for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD CONSTRAINT `tbl_daftar_ibfk_1` FOREIGN KEY (`id_jk`) REFERENCES `tbl_jk` (`id_jk`),
  ADD CONSTRAINT `tbl_daftar_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tbl_status` (`id_status`),
  ADD CONSTRAINT `tbl_daftar_ibfk_3` FOREIGN KEY (`id_status_pesan`) REFERENCES `tbl_status_pesan` (`id_status_pesan`);

--
-- Constraints for table `tbl_detail_ortu`
--
ALTER TABLE `tbl_detail_ortu`
  ADD CONSTRAINT `tbl_detail_ortu_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tbl_daftar` (`id_daftar`);

--
-- Constraints for table `tbl_detail_pendidikan`
--
ALTER TABLE `tbl_detail_pendidikan`
  ADD CONSTRAINT `tbl_detail_pendidikan_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tbl_daftar` (`id_daftar`);

--
-- Constraints for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD CONSTRAINT `tbl_mhs_ibfk_1` FOREIGN KEY (`id_marital`) REFERENCES `tbl_marital` (`id_marital`),
  ADD CONSTRAINT `tbl_mhs_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `tbl_agama` (`id_agama`),
  ADD CONSTRAINT `tbl_mhs_ibfk_3` FOREIGN KEY (`id_kelas_pilihan`) REFERENCES `tbl_kelas_pilihan` (`id_kelas_pilihan`),
  ADD CONSTRAINT `tbl_mhs_ibfk_4` FOREIGN KEY (`id_studi_pilihan`) REFERENCES `tbl_studi_pilihan` (`id_studi_pilihan`),
  ADD CONSTRAINT `tbl_mhs_ibfk_5` FOREIGN KEY (`id_daftar`) REFERENCES `tbl_daftar` (`id_daftar`);

--
-- Constraints for table `tbl_sbkerja`
--
ALTER TABLE `tbl_sbkerja`
  ADD CONSTRAINT `tbl_sbkerja_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tbl_daftar` (`id_daftar`);

--
-- Constraints for table `tbl_user_admin`
--
ALTER TABLE `tbl_user_admin`
  ADD CONSTRAINT `tbl_user_admin_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`);

--
-- Constraints for table `tbl_user_daftar`
--
ALTER TABLE `tbl_user_daftar`
  ADD CONSTRAINT `tbl_user_daftar_ibfk_1` FOREIGN KEY (`id_daftar`) REFERENCES `tbl_daftar` (`id_daftar`),
  ADD CONSTRAINT `tbl_user_daftar_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
