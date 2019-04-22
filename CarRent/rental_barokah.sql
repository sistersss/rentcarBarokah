-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2019 pada 08.54
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_mobil`
--

CREATE TABLE `jenis_mobil` (
  `id_jenis` int(5) NOT NULL,
  `nama_jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_mobil`
--

INSERT INTO `jenis_mobil` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Minibus'),
(2, 'Sedan'),
(3, 'Sport'),
(4, 'Truk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`keterangan`) VALUES
('<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>Membawa Bukti Transaksi</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li>Membawa KTP Asli</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<ul>\r\n				<li>Membawa Fotokopi KK</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li>Membawa Foto 4x6 (2 lembar)</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
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
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_subjenis`, `merk_mobil`, `warna`, `deskripsi`, `no_polisi`, `tahun_pembuatan`, `kuota_mobil`, `harga_sewa`, `created_at`, `gambar`) VALUES
(5, 1, 'Avanza Veloz', 'putih', 'bdashxbkasbxywbhckasdghsabkchbsahbckhsabkhxba\r\nsadshabxhjabshvcashbxkhasbkhcvhkvash\r\nsascsahcbshabchbsajbcsabhxbkjasbxjk\r\nsacbhsabjbsah\r\nsahdbsakjjsabdbaskbdjksakjnxjasbhcbskjacjksancs\r\nsadsajbdjsabjkcbsjakncjknsajkbcjksabjc', 'N 2333 AG', 2015, 7, 2000000, '2019-03-28 16:17:52', 'avanza_veloz1.jpg'),
(6, 5, 'Ferrari Gallardo', 'Hitam', 'sjdhsakjdhjashd\r\nsadjhsakdjsakjxnjasjkcbsjaknxsanjx\r\nsadjhsakjdhsjkahdkashjdas\r\nasdjhsakjdhksjahdjbsabckjnsakjcnjksajcnsjacjnsajbcsabj\r\nsadsadsjabdjsanjncsajkcjsabchjbsacbjsab\r\nascsajbdjsahjdsajcjsnajcskajhdjsakjdhkwjhdjaskjc\r\nsacjsbajkdjshajdkhasjbckjasnxuwnj', 'N 3444 UH', 2017, 2, 5000000, '2019-03-28 16:19:36', 'xenia1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notif`, `id_transaksi`, `created_at`) VALUES
(1, 25, '2019-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `nama_pelanggan` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `email`, `no_telp`, `username`, `password`) VALUES
(1, 'andhika adjie pradhana', 'Malang', 'andhikaadjie@gmail.com', '2147483647', 'adjie', 'adjie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subjenis`
--

CREATE TABLE `subjenis` (
  `id_subjenis` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_subjenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subjenis`
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
-- Struktur dari tabel `transaction`
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
  `status` int(11) NOT NULL COMMENT '0 : belum diambil, 1 : sudah diambil, 2 : expired'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id_transaksi`, `id_pelanggan`, `id_mobil`, `tgl_sewa`, `lama_sewa`, `tgl_kembali`, `total_biaya`, `denda`, `status`) VALUES
(1, 1, 5, '2019-03-13 00:00:00', 2, '2019-03-15 00:00:00', 5000000, 0, 1),
(2, 1, 5, '2019-03-16 00:00:00', 5, '2019-03-21 00:00:00', 12500000, 0, 1),
(3, 1, 6, '2019-03-23 00:00:00', 3, '2019-03-26 00:00:00', 7500000, 0, 1),
(4, 1, 5, '2019-04-10 00:00:00', 4, '2019-04-08 15:48:46', 8000000, 0, 1),
(5, 1, 6, '2019-04-08 00:00:00', 5, NULL, 25000000, NULL, 0),
(6, 1, 6, '2019-04-08 00:00:00', 5, NULL, 25000000, NULL, 0),
(7, 1, 5, '2019-04-01 00:00:00', 5, NULL, 10000000, NULL, 0),
(8, 1, 5, '2019-04-09 00:00:00', 5, NULL, 10000000, NULL, 0),
(9, 1, 5, '2019-04-03 00:00:00', 2, NULL, 4000000, NULL, 0),
(10, 1, 5, '2019-04-01 00:00:00', 5, '2019-04-08 16:00:18', 10000000, 200000, 1),
(11, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(12, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(13, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(14, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(15, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(16, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(17, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(18, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(19, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(20, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(21, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(22, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(23, 1, 5, '2019-04-15 00:00:00', 5, NULL, 10000000, NULL, 0),
(24, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(25, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 2),
(26, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(27, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(28, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(29, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(30, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(31, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(32, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(33, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(34, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(35, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(36, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(37, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(38, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(39, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(40, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(41, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(42, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(43, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(44, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(45, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(46, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(47, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(48, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(49, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(50, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(51, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(52, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(53, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(54, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(55, 1, 5, '2019-04-15 00:00:00', 12, NULL, 24000000, NULL, 0),
(56, 1, 5, '2019-04-15 00:00:00', 2, NULL, 4000000, NULL, 0),
(57, 1, 5, '2019-04-15 00:00:00', 2, NULL, 4000000, NULL, 0),
(58, 1, 5, '2019-04-15 00:00:00', 2, NULL, 4000000, NULL, 0),
(59, 1, 6, '2019-04-15 00:00:00', 2, NULL, 10000000, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_subjenis` (`id_subjenis`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `subjenis`
--
ALTER TABLE `subjenis`
  ADD PRIMARY KEY (`id_subjenis`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_mobil`
--
ALTER TABLE `jenis_mobil`
  MODIFY `id_jenis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `subjenis`
--
ALTER TABLE `subjenis`
  MODIFY `id_subjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`id_subjenis`) REFERENCES `subjenis` (`id_subjenis`);

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaction` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `subjenis`
--
ALTER TABLE `subjenis`
  ADD CONSTRAINT `subjenis_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_mobil` (`id_jenis`);

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
