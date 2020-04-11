-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Apr 2020 pada 11.13
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evaluasi_kinerja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_detail_nilai`
--

CREATE TABLE `data_detail_nilai` (
  `kode_detail_nilai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hasil_nilai`
--

CREATE TABLE `data_hasil_nilai` (
  `kode_hasil_nilai` varchar(100) NOT NULL,
  `kd01` double NOT NULL,
  `kd02` double NOT NULL,
  `kd03` double NOT NULL,
  `kd04` double NOT NULL,
  `kd05` double NOT NULL,
  `kd06` double NOT NULL,
  `kd07` double NOT NULL,
  `kd08` double NOT NULL,
  `kd09` double NOT NULL,
  `kd10` double NOT NULL,
  `kd11` double NOT NULL,
  `kd12` double NOT NULL,
  `kd13` double NOT NULL,
  `kd14` double NOT NULL,
  `kd15` double NOT NULL,
  `hasil_akhir` double NOT NULL,
  `tanggal` date NOT NULL,
  `nik_sales` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_hasil_nilai`
--

INSERT INTO `data_hasil_nilai` (`kode_hasil_nilai`, `kd01`, `kd02`, `kd03`, `kd04`, `kd05`, `kd06`, `kd07`, `kd08`, `kd09`, `kd10`, `kd11`, `kd12`, `kd13`, `kd14`, `kd15`, `hasil_akhir`, `tanggal`, `nik_sales`) VALUES
('04_2020_kng0001', 1.017, 1.017, 0.508, 1.017, 1.525, 0.847, 1.017, 0.593, 0.678, 2.373, 1.695, 1.695, 1.695, 1.695, 0.847, 18.22, '2020-04-11', 'kng0001'),
('04_2020_kng0003', 0.508, 1.017, 0.508, 0.508, 1.017, 0.847, 1.525, 1.186, 0.678, 1.186, 0.847, 0.847, 1.695, 0.847, 1.695, 14.915, '2020-04-11', 'kng0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelayakan`
--

CREATE TABLE `data_kelayakan` (
  `kode_kelayakan` varchar(10) NOT NULL,
  `kategori_kelayakan` varchar(20) DEFAULT NULL,
  `kelayakan_1` double DEFAULT NULL,
  `kelayakan_2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kelayakan`
--

INSERT INTO `data_kelayakan` (`kode_kelayakan`, `kategori_kelayakan`, `kelayakan_1`, `kelayakan_2`) VALUES
('SK01', 'Layak', 76, 100),
('SK02', 'Dipertimbangkan', 61, 75),
('SK03', 'Tidak Layak', 0, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(20) DEFAULT NULL,
  `bobot_kriteria` double DEFAULT NULL,
  `ket_kriteria` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kriteria`
--

INSERT INTO `data_kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot_kriteria`, `ket_kriteria`) VALUES
('KP01', 'Kedisiplinan', 60, 'Kompentensi  mengerjakan sesuatu tepat pada waktu yang telah ditentukan, dan kehadiran kerja.'),
('KP02', 'Kerapihan', 60, 'Kompetensi dalam kerapihan berpakaian, dan penampilan.'),
('KP03', 'Sopan Santun', 60, 'Kompetensi sopan dalam perkataan perbuatan.'),
('KP04', 'Komunikatif', 60, 'Kompetensi dalam berkomunikasi dengan baik dan benar, bahasanya mudah dimengerti dan dipahami.'),
('KP05', 'Pemecahan masalah', 60, 'Kompetensi dalam kemampuan memecahkan masalah dalam waktu singkat dan situasi dibawah tekanan, untuk mengatasi berbagai hambatan yang ditemui dalam pekerjaan.'),
('KP06', 'Kejujuran', 100, 'Kompetensi dalam seluruh aspek kegiatan kerja'),
('KP07', 'Proaktif', 60, 'Kompetensi seseorang untuk melakukan lebih dari yang diperlukan (proaktif), mengambil inisiatif, dan untuk mendapat lebih banyak informasi. Ini dilakukannya untuk meningkatkan keberhasilan, mencegah timbulanya permasalahan atau menciptakan peluang '),
('KP08', 'Pelayanan', 70, 'Kompetensi dalam pelayana kepada pelanggan, mulai dari kepuasan pelayanan, komunikasi, dan pendekatan kepada konsumen'),
('KP09', 'Kerjasama', 80, 'Kompetensi untuk melakukan kerjasama dengan sesama, menjadi bagian dari tim. Keanggotaan tim tidak harus secara formal namun bisa jadi berasal dari berbagai fungsi dan tingkatan dimana terjadi komunikasi satu sama lainnya untuk menyelesaikan masalah '),
('KP10', 'Tanggung Jawab', 70, 'Kompetensi profesionalisme dalam melakukan pekerjaannya, memili rasa dalam kepemilikan atas pekerjaan yang ditugaskan, memliki kesanggupan dalam menjalani tugas.'),
('KP11', 'Call', 100, 'Pencapaian target kunjungan sales perharinya kepada konsumen atau reseller atau retail '),
('KP12', 'Effective Call', 100, 'Pencapaian target kunjungan yang terdapat transaksi penjualan produk prioritas kepada konsumen atau reseller atau retail '),
('KP13', 'Avability', 100, 'Pencapaian target ketersediaan produk prioritas yang sudah ada kepada konsumen atau reseller atau retail.'),
('KP14', 'Omset Produk', 100, 'Pencapaian target keseluruhan jumlah produk yang terjual'),
('KP15', 'Omset Nominal', 100, 'Pencapaian target keseluruhan jumlah uang dari hasil penjualan produk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai`
--

CREATE TABLE `data_nilai` (
  `kode_nilai` varchar(10) NOT NULL,
  `kategori_nilai` varchar(20) DEFAULT NULL,
  `nilai_1` double DEFAULT NULL,
  `nilai_2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_nilai`
--

INSERT INTO `data_nilai` (`kode_nilai`, `kategori_nilai`, `nilai_1`, `nilai_2`) VALUES
('SP01', 'Sangat Baik', 91, 100),
('SP02', 'Baik', 76, 90),
('SP03', 'Cukup', 61, 75),
('SP04', 'Kurang', 51, 60),
('SP05', 'Sangat Kurang', 0, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sales`
--

CREATE TABLE `data_sales` (
  `nik_sales` varchar(10) NOT NULL,
  `nama_sales` varchar(50) DEFAULT NULL,
  `area_penempatan` varchar(100) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `alamat` text,
  `ktp` varchar(20) DEFAULT NULL,
  `sim` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `pas_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_sales`
--

INSERT INTO `data_sales` (`nik_sales`, `nama_sales`, `area_penempatan`, `tanggal_masuk`, `tanggal_keluar`, `alamat`, `ktp`, `sim`, `tanggal_lahir`, `no_hp`, `keterangan`, `pas_foto`) VALUES
('kng0001', 'Cepi ', 'Ciawigebang', '2020-01-01', '0000-00-00', 'Ciniru, Jalaksana', '3208091111111111', '930111111111', '1993-04-06', '081111111111', 'Tidak ada', 'cepi-.JPG'),
('kng0002', 'Cepot', 'Lebakwangi', '2020-01-01', '0000-00-00', 'Bandorasa Wetan, Cilimus', '3208022222222222', '930222222222', '1994-06-09', '082222222222', 'Tidak ada', 'cepot.JPG'),
('kng0003', 'Keyo', 'Kramatmulya', '2020-01-01', '0000-00-00', 'Jalaksana, Jalakasana', '3209033333333333', '930333333333', '1994-03-31', '083333333333', 'Tidak ada', 'keyo.JPG'),
('kng0004', 'Opah', 'Ciawigebang', '2020-01-01', '0000-00-00', 'Cijoho, Kuningan', '3208044444444444', '940444444444', '1995-06-20', '084444444444', 'Tidak ada', 'opah.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `nik_user` varchar(10) NOT NULL,
  `jabatan` varchar(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`nik_user`, `jabatan`, `nama`, `username`, `password`) VALUES
('BDG1', 'Pimpinan', 'Reza kasep pimpinan', 'pimpinan', '90973652b88fe07d05a4304f0a945de8'),
('CRB1', 'HRD', 'Reza kasep hrd', 'hrd', '4bf31e6f4b818056eaacb83dff01c9b8'),
('CRB2', 'Leader', 'Reza kasep leader', 'leader', 'c444858e0aaeb727da73d2eae62321ad');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_detail_nilai`
--
ALTER TABLE `data_detail_nilai`
  ADD PRIMARY KEY (`kode_detail_nilai`);

--
-- Indeks untuk tabel `data_hasil_nilai`
--
ALTER TABLE `data_hasil_nilai`
  ADD PRIMARY KEY (`kode_hasil_nilai`);

--
-- Indeks untuk tabel `data_kelayakan`
--
ALTER TABLE `data_kelayakan`
  ADD PRIMARY KEY (`kode_kelayakan`);

--
-- Indeks untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indeks untuk tabel `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indeks untuk tabel `data_sales`
--
ALTER TABLE `data_sales`
  ADD PRIMARY KEY (`nik_sales`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nik_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_detail_nilai`
--
ALTER TABLE `data_detail_nilai`
  MODIFY `kode_detail_nilai` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
