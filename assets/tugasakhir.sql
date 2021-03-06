-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 10:28 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(4) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `pass`, `foto`) VALUES
(1, 'joko', 'widodo', 'joko.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` varchar(11) NOT NULL,
  `nm_dosen` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `fakultas` int(4) DEFAULT NULL,
  `jurusan` int(4) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nm_dosen`, `username`, `pass`, `fakultas`, `jurusan`, `foto`) VALUES
('1', 'Ekko', 'ekko', 'untag', 1, 1, 'macan.jpg'),
('2', 'Yani', 'yani', 'untag', 2, 4, 'img_Yani_1510496683.png'),
('3', 'Fais', 'fais', 'untag', 1, 1, 'img_Fais_1520608227.jpg'),
('4', 'Reni', 'reni', 'untag', 2, 6, 'jarangoyang.jpg'),
('7', 'Laila Jamila', 'laila', 'untag', 2, 4, 'img_9_1528033852.jpg'),
('9', 'Hasanah', 'Ana', 'untag', 2, 4, 'img_9_15197373231.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `kd_fakultas` int(4) NOT NULL,
  `nm_fakultas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`kd_fakultas`, `nm_fakultas`) VALUES
(1, 'Teknik'),
(2, 'Sastra'),
(3, 'Hukum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_soal`
--

CREATE TABLE `tb_jenis_soal` (
  `id_j_soal` int(4) NOT NULL,
  `nm_j_soal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_soal`
--

INSERT INTO `tb_jenis_soal` (`id_j_soal`, `nm_j_soal`) VALUES
(1, 'Pilihan Ganda'),
(2, 'Mengurutkan'),
(3, 'Benar Salah'),
(4, 'Isian'),
(5, 'Menjodohkan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_ujian`
--

CREATE TABLE `tb_jenis_ujian` (
  `id_j_ujian` int(4) NOT NULL,
  `nm_ujian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_ujian`
--

INSERT INTO `tb_jenis_ujian` (`id_j_ujian`, `nm_ujian`) VALUES
(1, 'UAS'),
(2, 'UTS'),
(4, 'Pre Test'),
(5, 'Post Test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `kd_jurusan` int(4) NOT NULL,
  `nm_jurusan` varchar(50) DEFAULT NULL,
  `fakultas` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`kd_jurusan`, `nm_jurusan`, `fakultas`) VALUES
(1, 'Informatika', 1),
(2, 'Mesin', 1),
(3, 'Industri', 1),
(4, 'Inggris', 2),
(5, 'Indonesia', 2),
(6, 'jepang', 2),
(8, 'politik', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jwb_mhs`
--

CREATE TABLE `tb_jwb_mhs` (
  `id_jwb_mhs` int(4) NOT NULL,
  `riwayat` varchar(4) DEFAULT NULL,
  `id_soal` int(4) DEFAULT NULL,
  `jwb_mhs` bigint(8) DEFAULT NULL,
  `jwb_isian_mhs` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jwb_mhs`
--

INSERT INTO `tb_jwb_mhs` (`id_jwb_mhs`, `riwayat`, `id_soal`, `jwb_mhs`, `jwb_isian_mhs`) VALUES
(1, '1', 3, 1, NULL),
(2, '1', 6, NULL, 'jawaban'),
(3, '1', 7, 51234, NULL),
(4, '1', 8, 1, NULL),
(5, '1', 16, 12345, NULL),
(6, '2', 3, 8, NULL),
(7, '2', 6, NULL, 'jawaban'),
(8, '2', 7, 12534, NULL),
(9, '2', 8, 1, NULL),
(10, '2', 16, 23415, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(4) NOT NULL,
  `nm_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nm_kelas`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H');

-- --------------------------------------------------------

--
-- Table structure for table `tb_krs`
--

CREATE TABLE `tb_krs` (
  `id_krs` int(4) NOT NULL,
  `id_matkul` int(4) DEFAULT NULL,
  `nbi` varchar(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_krs`
--

INSERT INTO `tb_krs` (`id_krs`, `id_matkul`, `nbi`, `status`) VALUES
(1, 4, '1', 'disetujui'),
(8, 2, '3', 'belum dikonfirmasi'),
(9, 5, '1', 'disetujui'),
(10, 5, '3', 'ditolak'),
(11, 6, '1', 'disetujui'),
(12, 4, '3', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nbi` varchar(11) NOT NULL,
  `nm_mahasiswa` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `fakultas` int(4) DEFAULT NULL,
  `jurusan` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nbi`, `nm_mahasiswa`, `pass`, `foto`, `fakultas`, `jurusan`) VALUES
('1', 'paijo', 'untag', 'user.png', 1, 1),
('2', 'dono', 'untag', 'tata-surya2.jpg', 2, 6),
('3', 'paimen', 'untag', '2.jpg', 1, 1),
('4', 'tukiyem', 'untag', '1.jpg', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_matkul` int(4) NOT NULL,
  `nm_matkul` varchar(100) DEFAULT NULL,
  `fakultas` int(4) DEFAULT NULL,
  `jurusan` int(4) DEFAULT NULL,
  `kelas` int(4) DEFAULT NULL,
  `dosen` varchar(11) DEFAULT NULL,
  `tgl` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `nm_matkul`, `fakultas`, `jurusan`, `kelas`, `dosen`, `tgl`) VALUES
(1, 'Algoritma', 1, 1, 1, '3', '2018-02-07 13:25:55'),
(2, 'Pancasila', 2, 5, 2, '4', '2018-02-07 13:25:55'),
(4, 'Pemrogaman Lanjut', 1, 1, 3, '1', '2018-02-07 13:25:55'),
(5, 'Kalkulus', 1, 1, 4, '3', '2018-02-07 13:25:55'),
(6, 'Aljabar Linier', 1, 1, 2, '1', '2018-02-07 13:25:55'),
(7, 'Bahasa Inggris', 2, 4, 2, '2', '2018-02-07 13:25:55'),
(8, 'Bahasa Indonesia', 2, 5, 4, '2', '2018-02-07 13:25:55'),
(9, 'Jepang', 2, 6, 5, '4', '2018-02-07 13:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` varchar(4) NOT NULL,
  `nbi` varchar(11) DEFAULT NULL,
  `id_test` int(4) DEFAULT NULL,
  `nilai` int(4) DEFAULT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_riwayat`, `nbi`, `id_test`, `nilai`, `tgl`) VALUES
('1', '1', 1, 60, '2018-06-08 14:30:45'),
('2', '3', 1, 40, '2018-06-22 12:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(4) NOT NULL,
  `soal` text,
  `pil_a` text,
  `pil_b` text,
  `pil_c` text,
  `pil_d` text,
  `pil_e` text,
  `pil_f` text,
  `pil_g` text,
  `pil_h` text,
  `pil_i` text,
  `pil_j` text,
  `jawaban` bigint(8) DEFAULT NULL,
  `id_test` int(4) NOT NULL,
  `pembuat` int(4) DEFAULT NULL,
  `id_j_soal` int(4) DEFAULT NULL,
  `jawaban_isian` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `soal`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_e`, `pil_f`, `pil_g`, `pil_h`, `pil_i`, `pil_j`, `jawaban`, `id_test`, `pembuat`, `id_j_soal`, `jawaban_isian`) VALUES
(2, '<p>Beliau bernama lengkap Bob Sadino. Lahir di Lampung tanggal 9 Maret , wafat pada tanggal 19 januari 2015. Beliau akrab dipanggil dengan sebutan &lsquo;Om Bob&rsquo;. Ia adalah pengusaha asal indonesia yang berbisnis dibidang pangan dan peternakan. Ia adalah pemilik dari jaringan usaha kemfood dan Kemchik. Pada tahun 1967, Bob dan keluarga kembali ke Indonesia setelah beberapa tahun tinggal di Belanda. Jakarta Selatan sementara yang lain tetap ia simpan.<br />\r\nIa membawa serta 2 mercendes miliknya, buatan tahun 1960-an. Salah satunya ia jual untuk membeli sebidang tanah di Keman, Setelah beberapa lama tinggal dan hidup di Indonesia, Bob memutuskan untuk keluar dari pekerjaanya karena ia memiliki tekad untuk bekerja secara mandiri. Sebagai peternak ayam, Bob dan istrinya, setiap hari menjual beberapa kilogram telur. Dalam tempo satu setengah tahun, ia dan istrinya memiliki banyak langganan, terutama orang asing, karena mereka fasih berbahasa inggris. Bob dan istrinya tinggal di daerah Kemang Jakarta, tempat orang asing banyak menetap. Tidak jarang pasangan tersebut dihardik pelanggan, membantu orang asing sekalipun. Namun, mereka mengaca pada diri mereka sendiri, memperbaiki pelayanan. Perubahan drastis pu terjadi pada diri Bob, dari pribadi feodal menjadi pelayan. Setelah itu, lama-kelamaan Bob yang berambut perak, menjadi pemilik tunggal supermarket (pasar swalayan) Kemchik. Ia selalu tampil sederhana dengankemeja lengan pendek dan celanan pendek. (Sumber:www.biografiku.com/2009/12/biografi-bab-sadino diakses 2 Oktober 2016 pada pukul 16.50 WIB)</p>\r\n\r\n<p>Hal yang patut diteladani dri tokoh tersebut adalah . . .</p>\r\n', '<p>Menjadi pemilik jaringan usaha Kemfood dan Kemchik.</p>\r\n', '<p>Memutuskan keluar dari pekerjaanya dan bertekad menjadi mandiri.</p>\r\n', '<p>Memiliki banyak pelanggan orang asing di Jakarta.</p>\r\n', '<p>Tidak jarang dihardik pelanggan, pembantu orang asing sekalipun.</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 3, 1, NULL),
(3, '<p>Beliau bernama lengkap Bob Sadino. Lahir di Lampung tanggal 9 Maret , wafat pada tanggal 19 januari 2015. Beliau akrab dipanggil dengan sebutan &lsquo;Om Bob&rsquo;. Ia adalah pengusaha asal indonesia yang berbisnis dibidang pangan dan peternakan. Ia adalah pemilik dari jaringan usaha kemfood dan Kemchik. Pada tahun 1967, Bob dan keluarga kembali ke Indonesia setelah beberapa tahun tinggal di Belanda. Jakarta Selatan sementara yang lain tetap ia simpan.<br />\r\nIa membawa serta 2 mercendes miliknya, buatan tahun 1960-an. Salah satunya ia jual untuk membeli sebidang tanah di Keman, Setelah beberapa lama tinggal dan hidup di Indonesia, Bob memutuskan untuk keluar dari pekerjaanya karena ia memiliki tekad untuk bekerja secara mandiri. Sebagai peternak ayam, Bob dan istrinya, setiap hari menjual beberapa kilogram telur. Dalam tempo satu setengah tahun, ia dan istrinya memiliki banyak langganan, terutama orang asing, karena mereka fasih berbahasa inggris. Bob dan istrinya tinggal di daerah Kemang Jakarta, tempat orang asing banyak menetap. Tidak jarang pasangan tersebut dihardik pelanggan, membantu orang asing sekalipun. Namun, mereka mengaca pada diri mereka sendiri, memperbaiki pelayanan. Perubahan drastis pu terjadi pada diri Bob, dari pribadi feodal menjadi pelayan. Setelah itu, lama-kelamaan Bob yang berambut perak, menjadi pemilik tunggal supermarket (pasar swalayan) Kemchik. Ia selalu tampil sederhana dengankemeja lengan pendek dan celanan pendek. (Sumber:www.biografiku.com/2009/12/biografi-bab-sadino diakses 2 Oktober 2016 pada pukul 16.50 WIB)</p>\r\n\r\n<p>Keistimewaan tokoh tersebut adalah . . .</p>\r\n', '<p>Beliau akrab dipanggil &lsquo;Om Bobi&rsquo;</p>\r\n', '<p>menjadi seorang pengusaha asal Indonesia di bidang pangan dan peternakan</p>\r\n', '<p>mau kembali ke Indonesia setelah lama tinggal di luar negeri.</p>\r\n', '<p>menjadi seorang pelayan.</p>\r\n', '<p>pelaut</p>\r\n', NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 1, NULL),
(5, '<p>Soal</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, 4, 'jawaban isian'),
(6, '<p>soal isian</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 'jawaban isi'),
(7, '<p>soal urutkan</p>\r\n', 'urut 1\r\n', 'urut 2\r\n', 'urut 3\r\n', 'urut 4', 'urut 5', NULL, NULL, NULL, NULL, NULL, 53421, 1, 1, 2, NULL),
(8, '<p>Nyobak benar salah men</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 3, NULL),
(16, '<p>cocokkan</p>\r\n', 'a', 'b', 'c', 'd', 'e', '1', '2', '3', '4', '5', 51234, 1, 1, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_test`
--

CREATE TABLE `tb_test` (
  `id_test` int(4) NOT NULL,
  `nm_test` varchar(50) DEFAULT NULL,
  `matkul` int(4) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `start` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_test`
--

INSERT INTO `tb_test` (`id_test`, `nm_test`, `matkul`, `jenis`, `waktu`, `start`) VALUES
(1, 'Bab 1', 4, 4, 60, 1),
(2, 'Bab 3', 7, 2, 60, NULL),
(4, 'Bab 1', 5, 5, 60, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`kd_fakultas`);

--
-- Indexes for table `tb_jenis_soal`
--
ALTER TABLE `tb_jenis_soal`
  ADD PRIMARY KEY (`id_j_soal`);

--
-- Indexes for table `tb_jenis_ujian`
--
ALTER TABLE `tb_jenis_ujian`
  ADD PRIMARY KEY (`id_j_ujian`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`kd_jurusan`),
  ADD KEY `fakultas` (`fakultas`);

--
-- Indexes for table `tb_jwb_mhs`
--
ALTER TABLE `tb_jwb_mhs`
  ADD PRIMARY KEY (`id_jwb_mhs`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD KEY `id` (`id_krs`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nbi`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tb_test`
--
ALTER TABLE `tb_test`
  ADD PRIMARY KEY (`id_test`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `kd_fakultas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_jenis_soal`
--
ALTER TABLE `tb_jenis_soal`
  MODIFY `id_j_soal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_jenis_ujian`
--
ALTER TABLE `tb_jenis_ujian`
  MODIFY `id_j_ujian` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `kd_jurusan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_jwb_mhs`
--
ALTER TABLE `tb_jwb_mhs`
  MODIFY `id_jwb_mhs` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `id_krs` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id_matkul` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_test`
--
ALTER TABLE `tb_test`
  MODIFY `id_test` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
