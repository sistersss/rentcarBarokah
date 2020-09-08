-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 03:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_barokah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(11) NOT NULL,
  `nama_iklan` varchar(150) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `nama_iklan`, `gambar`) VALUES
(4, 'Iklan 1', '1.jpg'),
(5, 'Iklan 2', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_mobil`
--

CREATE TABLE `jenis_mobil` (
  `id_jenis` int(5) NOT NULL,
  `nama_jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_mobil`
--

INSERT INTO `jenis_mobil` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Minibus'),
(2, 'Sedan'),
(3, 'Sport'),
(4, 'Truk');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`keterangan`) VALUES
('<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>Membawa Bukti Transaksi</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li>Membawa KTP Asli</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>Membawa Fotokopi KK</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li>Membawa Foto 4x6 (2 lembar)</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(5) NOT NULL,
  `id_subjenis` int(5) NOT NULL,
  `merk_mobil` varchar(25) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `no_polisi` varchar(15) NOT NULL,
  `tahun_pembuatan` int(5) NOT NULL,
  `kuota_mobil` int(5) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_subjenis`, `merk_mobil`, `warna`, `deskripsi`, `no_polisi`, `tahun_pembuatan`, `kuota_mobil`, `harga_sewa`, `created_at`, `gambar`) VALUES
(5, 1, 'Avanza Veloz', 'putih', 'bdashxbkasbxywbhckasdghsabkchbsahbckhsabkhxba\r\nsadshabxhjabshvcashbxkhasbkhcvhkvash\r\nsascsahcbshabchbsajbcsabhxbkjasbxjk\r\nsacbhsabjbsah\r\nsahdbsakjjsabdbaskbdjksakjnxjasbhcbskjacjksancs\r\nsadsajbdjsabjkcbsjakncjknsajkbcjksabjc', 'N 2333 AG', 2015, 1, 2000000, '2019-03-28 16:17:52', 'avanza_veloz1.jpg'),
(6, 5, 'Ferrari Gallardo', 'Hitam', 'sjdhsakjdhjashd\r\nsadjhsakdjsakjxnjasjkcbsjaknxsanjx\r\nsadjhsakjdhsjkahdkashjdas\r\nasdjhsakjdhksjahdjbsabckjnsakjcnjksajcnsjacjnsajbcsabj\r\nsadsadsjabdjsanjncsajkcjsabchjbsacbjsab\r\nascsajbdjsahjdsajcjsnajcskajhdjsakjdhkwjhdjaskjc\r\nsacjsbajkdjshajdkhasjbckjasnxuwnj', 'N 3444 UH', 2017, 1, 5000000, '2019-03-28 16:19:36', 'xenia1.jpg'),
(7, 1, 'Magnum', 'Biru', '- bensin full\r\n- no mines', 'N 3422 UU', 2013, 0, 2400000, '2019-05-06 19:35:25', 'chico.jpg'),
(8, 2, 'TES', 'putih', 'tes', 'N 7899 AD', 2019, 1, 2500000, '2019-11-27 06:07:22', 'web-dasar.png');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `nama_pelanggan` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 : normal, 1 : blacklist'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `email`, `no_telp`, `username`, `password`, `status`) VALUES
(2, 'nania', 'jl. merapi', 'naniabela25@gmail.com', '085904278931', 'naniabela', 'nania123', 0),
(3, 'alfalus', 'jl. ,,', 'alfalus@gmail.com', '0859123943', 'alfalus', 'alfalus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjenis`
--

CREATE TABLE `subjenis` (
  `id_subjenis` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_subjenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjenis`
--

INSERT INTO `subjenis` (`id_subjenis`, `id_jenis`, `nama_subjenis`) VALUES
(1, 1, 'Avanza'),
(2, 1, 'Ayla'),
(3, 2, 'Mercedes'),
(4, 2, 'Mclaren'),
(5, 3, 'Ferrari'),
(6, 3, 'Pajero Sport'),
(7, 4, 'Hino'),
(8, 4, 'Espass');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_sewa` datetime NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `total_biaya` int(11) NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 : belum diambil, 1 : sudah diambil, 2 : expired, 3 : dibatalkan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaksi`, `id_pelanggan`, `id_mobil`, `tgl_sewa`, `lama_sewa`, `tgl_kembali`, `total_biaya`, `denda`, `status`) VALUES
(5, 2, 8, '2020-09-09 00:00:00', 2, '2020-09-08 03:15:52', 5000000, 0, 1),
(6, 3, 7, '2020-09-18 00:00:00', 2, NULL, 4800000, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indexes for table `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_subjenis` (`id_subjenis`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `subjenis`
--
ALTER TABLE `subjenis`
  ADD PRIMARY KEY (`id_subjenis`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  MODIFY `id_jenis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjenis`
--
ALTER TABLE `subjenis`
  MODIFY `id_subjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`id_subjenis`) REFERENCES `subjenis` (`id_subjenis`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaction` (`id_transaksi`);

--
-- Constraints for table `subjenis`
--
ALTER TABLE `subjenis`
  ADD CONSTRAINT `subjenis_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_mobil` (`id_jenis`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
