-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2022 pada 15.04
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun_pengguna`
--

CREATE TABLE `tb_akun_pengguna` (
  `id_akun` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akun_pengguna`
--

INSERT INTO `tb_akun_pengguna` (`id_akun`, `username`, `password`, `level`, `foto`) VALUES
(3, 'Petugas', '$2y$10$fDh3MbYilnYLLj4t38fBC.mdFI3rDrb4oFeKMcdKFecN0eYJHwW8O', 'Petugas', 'aku.png'),
(20, '2020081018', '$2y$10$8CqznCigEBpfy8qpwTeAfe4xCGgSv/e4EEOv7cVdYd16rTthh2dUu', 'siswa', 'aku4.png'),
(24, '2020081019', '$2y$10$OO6xPPZUqcAL9d.t7nCJH.sNaaEBOEWREzesid1pTVIIUKJv8pryq', 'siswa', 'IMG_20210623_230957_755.jpg'),
(100, '12345678', '$2y$10$qn52ef7/uMi5MoPcDvWFDetkfSH3WXEhvMVQ8659d.NPx8jCgjfMW', 'siswa', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_petugas`
--

CREATE TABLE `tb_data_petugas` (
  `nip` int(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_akun` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_petugas`
--

INSERT INTO `tb_data_petugas` (`nip`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `no_hp`, `jabatan`, `id_akun`) VALUES
(12345, 'Darso', 'laki - laki', 'Ngerompak', '0853310794', 'Petugas Tata Usaha', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_siswa`
--

CREATE TABLE `tb_data_siswa` (
  `nisn` int(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `wali_murid` varchar(50) NOT NULL,
  `id_akun` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `id_jurusan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data_siswa`
--

INSERT INTO `tb_data_siswa` (`nisn`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `no_hp`, `wali_murid`, `id_akun`, `id_kelas`, `id_jurusan`) VALUES
(12345678, 'Coba Bismillah', 'Perempuan', 'Jatisrono', '12345678910', 'coba', 100, 2, 2),
(2020081018, 'Putut Budiutomo', 'Laki-Laki', 'Jatisrono, Tasikhargo, Kutolawas', '085331079441', 'Saiman', 20, 2, 1),
(2020081019, 'Budi', 'Laki-Laki', 'Ngerompak', '081234567890', 'Tarso', 24, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(20) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `as_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`, `as_jurusan`) VALUES
(1, 'Teknik Gambar Bangunan', 'TGB'),
(2, 'Teknik Kendaraan Ringan', 'TKR'),
(3, 'Teknik Permesinan', 'TPM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(20) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(20) NOT NULL,
  `nominal_bayar` int(100) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bukti_bayar` text NOT NULL,
  `id_tagihan` int(20) NOT NULL,
  `kd_spp` int(20) NOT NULL,
  `nisn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `nominal_bayar`, `tgl_bayar`, `bukti_bayar`, `id_tagihan`, `kd_spp`, `nisn`) VALUES
(12, 150000, '2022-05-22', 'v4-728px-Start-Learning-Computer-Programming-Step-1-Version-4.jpg', 122, 1, 2020081018),
(13, 150000, '2022-05-22', '20190116-003.jpg', 123, 2, 2020081018),
(14, 150000, '2022-05-22', 'bukti.jpg', 124, 3, 2020081018),
(15, 150000, '2022-05-28', 'aku2.png', 125, 4, 2020081018),
(16, 150000, '2022-05-28', 'aku.png', 126, 5, 2020081018),
(17, 150000, '2022-05-29', 'IMG_20210623_230957_755.jpg', 127, 6, 2020081018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `kd_spp` int(20) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nominal` int(100) NOT NULL,
  `batas_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_spp`
--

INSERT INTO `tb_spp` (`kd_spp`, `bulan`, `nominal`, `batas_pembayaran`) VALUES
(1, 'Januari ', 150000, '2023-01-31'),
(2, 'Februari ', 150000, '2023-02-28'),
(3, 'Maret', 150000, '2023-03-31'),
(4, 'April ', 150000, '2023-04-30'),
(5, 'Mei', 150000, '2023-05-31'),
(6, 'Juni', 150000, '2023-06-30'),
(7, 'Juli', 150000, '2023-07-31'),
(8, 'Agustus', 150000, '2023-08-31'),
(9, 'September ', 150000, '2023-09-30'),
(10, 'Oktober', 150000, '2023-10-31'),
(11, 'November ', 150000, '2023-05-31'),
(12, 'Desember ', 150000, '2023-12-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(20) NOT NULL,
  `nisn` int(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `kd_spp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `nisn`, `keterangan`, `kd_spp`) VALUES
(122, 2020081018, 'Lunas', 1),
(123, 2020081018, 'Lunas', 2),
(124, 2020081018, 'Lunas', 3),
(125, 2020081018, 'Lunas', 4),
(126, 2020081018, 'Menunggu Konfirmasi', 5),
(127, 2020081018, 'Menunggu Konfirmasi', 6),
(128, 2020081018, 'Belum Bayar', 7),
(129, 2020081018, 'Belum Bayar', 8),
(130, 2020081018, 'Belum Bayar', 9),
(131, 2020081018, 'Belum Bayar', 10),
(132, 2020081018, 'Belum Bayar', 11),
(133, 2020081019, 'Belum Bayar', 1),
(134, 2020081019, 'Belum Bayar', 2),
(135, 2020081019, 'Belum Bayar', 3),
(136, 2020081019, 'Belum Bayar', 4),
(137, 2020081019, 'Belum Bayar', 5),
(138, 2020081019, 'Belum Bayar', 6),
(139, 2020081019, 'Belum Bayar', 7),
(140, 2020081019, 'Belum Bayar', 8),
(141, 2020081019, 'Belum Bayar', 9),
(142, 2020081019, 'Belum Bayar', 10),
(143, 2020081019, 'Belum Bayar', 11),
(144, 2020081019, 'Belum Bayar', 12),
(145, 2020081018, 'Bayar', 12),
(146, 12345678, 'Belum Bayar', 1),
(147, 12345678, 'Belum Bayar', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun_pengguna`
--
ALTER TABLE `tb_akun_pengguna`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tb_data_petugas`
--
ALTER TABLE `tb_data_petugas`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_data_siswa`
--
ALTER TABLE `tb_data_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `kd_spp` (`kd_spp`),
  ADD KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`kd_spp`);

--
-- Indeks untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `kd_spp` (`kd_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akun_pengguna`
--
ALTER TABLE `tb_akun_pengguna`
  MODIFY `id_akun` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `kd_spp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_data_petugas`
--
ALTER TABLE `tb_data_petugas`
  ADD CONSTRAINT `tb_data_petugas_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun_pengguna` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_data_siswa`
--
ALTER TABLE `tb_data_siswa`
  ADD CONSTRAINT `tb_data_siswa_ibfk_3` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_siswa_ibfk_4` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_siswa_ibfk_5` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun_pengguna` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_3` FOREIGN KEY (`kd_spp`) REFERENCES `tb_spp` (`kd_spp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_4` FOREIGN KEY (`nisn`) REFERENCES `tb_data_siswa` (`nisn`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`kd_spp`) REFERENCES `tb_spp` (`kd_spp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tagihan_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `tb_data_siswa` (`nisn`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
