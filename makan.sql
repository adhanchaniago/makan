-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2018 pada 17.36
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makan`
--
CREATE DATABASE IF NOT EXISTS `makan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `makan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `hak_akses`) VALUES
(1, 'root', '7b24afc8bc80e548d66c4e7ff72171c5', 'full');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_produk`, `jumlah`, `sub_total`, `bayar`, `tanggal_pesan`) VALUES
(38, 2, 1, 1, 10000, 0, '2018-10-03'),
(41, 1, 7, 2, 20000, 1, '2018-10-03'),
(42, 2, 7, 1, 10000, 0, '2018-10-03'),
(44, 3, 12, 1, 10000, 1, '2018-10-03'),
(46, 3, 6, 2, 20000, 1, '2018-10-03'),
(73, 2, 3, 1, 10000, 0, '2018-10-04'),
(74, 1, 6, 1, 10000, 1, '2018-10-05'),
(75, 1, 13, 1, 15000, 1, '2018-10-05'),
(76, 4, 11, 56, 560000, 1, '2018-10-05'),
(77, 1, 10, 2, 20000, 1, '2018-10-07'),
(78, 3, 6, 2, 20000, 1, '2018-10-08'),
(80, 5, 8, 2, 30000, 1, '2018-10-09'),
(81, 1, 8, 3, 45000, 1, '2018-10-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `total_pesan` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `metode_bayar` varchar(50) NOT NULL,
  `status_pesan` varchar(150) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `alamat`, `kode_pos`, `total_pesan`, `total_bayar`, `metode_bayar`, `status_pesan`, `tanggal_bayar`) VALUES
(7, 2, 'wiradesa', 51152, 3, 30000, 'BRI', 'Selesai', '2018-10-04'),
(8, 2, 'sdfdf', 0, 3, 30000, 'BRI', 'Selesai', '2018-10-04'),
(9, 1, 'wiradesa', 51152, 2, 20000, 'BRI', 'Selesai', '2018-10-05'),
(11, 1, 'qwerty', 12345, 4, 45000, 'BNI', 'Selesai', '2018-10-05'),
(12, 4, 'Jl.jalan', 51173, 56, 560000, 'Mandiri', 'Menunggu Pengiriman', '2018-10-05'),
(14, 3, 'wrd', 51152, 3, 30000, 'BRI', 'Selesai', '2018-10-08'),
(15, 3, 'bjg', 434432, 5, 50000, 'BNI', 'Menunggu Pembayaran', '2018-10-08'),
(16, 5, 'wiradesa', 51152, 2, 30000, 'BRI', 'Selesai', '2018-10-09'),
(17, 1, 'qwer', 12345, 9, 110000, 'BRI', 'Menunggu Pembayaran', '2018-10-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` varchar(200) NOT NULL,
  `foto_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `foto_produk`) VALUES
(1, 'Bakso Bulat', 10000, 'Bakso bulat, bulat seperti bakso', 'bakso.jpg'),
(2, 'Bandeng Presto', 15000, 'Bandeng yang dipresto, Mantull', 'bandeng-presto.jpg'),
(3, 'Gado-Gado', 10000, 'Gado-gado digadoin', 'gado2.jpg'),
(6, 'Kerak Telor', 10000, 'Telur yang dibiarkan sampai mengerak', 'keraktelor.jpg'),
(7, 'Mie Aceh', 10000, 'Mie dari Aceh, jauuuuhhhh', 'mie-aceh.jpg'),
(8, 'Nasi Goreng', 15000, 'Nasi udah mateng tapi di goreng', 'nasi-goreng.jpg'),
(9, 'Nasi Gudeg', 10000, 'Nasi Gudeg asli Jogja, Istimewa pokoknya...', 'nasi-gudeg.jpg'),
(10, 'Pempek Palembang', 10000, 'Pempek asli Palembang', 'pempek.jpg'),
(11, 'Pepes Ikan', 10000, 'Pepes ikan, ikan yang di pepes', 'pepes.jpg'),
(12, 'Rawon', 10000, 'Rawon loh ya..', 'rawon.jpeg'),
(13, 'Rendang', 15000, 'Rendang rasanya nendang', 'rendang.jpg'),
(14, 'Sate Ayam', 20000, 'Ayam yang disate', 'sate.jpg'),
(15, 'Soto Ayam Ponorogo', 15000, 'Soto Ayam khas Ponorogo, jauuuh....', 'soto-ayam-ponorogo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `passwd_user` varchar(50) NOT NULL,
  `nohp_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `email_user`, `passwd_user`, `nohp_user`) VALUES
(1, 'zulfi izzulhaq', 'zulfi', 'zulfi@gmail.com', 'zulfi', 1234),
(2, 'qweasd', 'qwe', 'qwe@qwe', 'qwe', 123),
(3, 'z', 'z', 'z@zz', 'z', 123),
(4, 'Longinus', 'long', 'longinus@mail.co', '123', 87322311),
(5, 'izzulhaq', 'izzul', 'izzul@gmail.com', '1234', 98765);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
