-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 02:02 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `status`, `no_tlp`, `keterangan`) VALUES
('AGT001', 'modar', 'akdlaskd', '2017-12-31', 'Permpuan', 'Belum Menikah', '0818918392193', 'Aktif'),
('AGT002', 'tewas', 'asjdokaslkd', '2017-12-31', 'Permpuan', 'Belum Menikah', '19203912', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` varchar(50) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `id_pinjaman` varchar(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `besar_pinjaman` varchar(50) NOT NULL,
  `keterangan_angsuran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_anggota`, `id_pinjaman`, `tgl_pembayaran`, `besar_pinjaman`, `keterangan_angsuran`) VALUES
('ASN001', 'AGT001', 'PIJ001', '2017-12-12', '1200', 'SUDAH LUNAS'),
('ASN002', 'AGT002', 'PIJ003', '2017-12-29', '12000', 'SUDAH LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `detail_angsuran`
--

CREATE TABLE `detail_angsuran` (
  `id_detail_angsuran` varchar(50) NOT NULL,
  `id_angsuran` varchar(50) NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `detail_besar_angsuran` varchar(50) NOT NULL,
  `sisa_pinjaman` varchar(50) NOT NULL,
  `sisa_waktu` varchar(50) NOT NULL,
  `angsuran_ke` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_angsuran`
--

INSERT INTO `detail_angsuran` (`id_detail_angsuran`, `id_angsuran`, `tgl_jatuh_tempo`, `detail_besar_angsuran`, `sisa_pinjaman`, `sisa_waktu`, `angsuran_ke`) VALUES
('DTA001', 'ASN001', '2018-02-07', '600', '600', '1', '1'),
('DTA002', 'ASN001', '2018-02-07', '600', '600', '0', '2'),
('DTA003', 'ASN002', '2018-02-12', '6000', '6000', '1', '1'),
('DTA004', 'ASN002', '2018-02-12', '6000', '6000', '0', '2');

-- --------------------------------------------------------

--
-- Table structure for table `detail_simpanan`
--

CREATE TABLE `detail_simpanan` (
  `id_detail_simpanan` varchar(50) NOT NULL,
  `id_simpanan` varchar(50) NOT NULL,
  `tgl_detail_simpanan` date NOT NULL,
  `besar_simpanan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_simpanan`
--

INSERT INTO `detail_simpanan` (`id_detail_simpanan`, `id_simpanan`, `tgl_detail_simpanan`, `besar_simpanan`) VALUES
('DTS001', 'SPN001', '2017-12-11', '2000'),
('DTS002', 'SPN002', '2017-12-12', '200000'),
('DTS003', 'SPN002', '2017-12-19', '2000'),
('DTS004', 'SPN002', '2017-12-19', '1000'),
('DTS005', 'SPN002', '2017-12-20', '20000'),
('DTS006', 'SPN003', '2017-12-20', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pinjaman`
--

CREATE TABLE `kategori_pinjaman` (
  `id_kategori_pinjaman` varchar(50) NOT NULL,
  `nama_kategori_pinjaman` varchar(50) NOT NULL,
  `jangka_waktu` varchar(50) NOT NULL,
  `besar_bunga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_pinjaman`
--

INSERT INTO `kategori_pinjaman` (`id_kategori_pinjaman`, `nama_kategori_pinjaman`, `jangka_waktu`, `besar_bunga`) VALUES
('KTP001', 'SI HURA', '2', '20'),
('KTP002', 'SI MOKA', '2', '4%');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_simpanan`
--

CREATE TABLE `kategori_simpanan` (
  `id_kategori_simpanan` varchar(50) NOT NULL,
  `nama_kategori_simpanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_simpanan`
--

INSERT INTO `kategori_simpanan` (`id_kategori_simpanan`, `nama_kategori_simpanan`) VALUES
('KTS001', 'SI SUKA'),
('KTS002', 'SI MURAH'),
('KTS003', 'SI MUDA');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `level`) VALUES
('PTG002', 'admin', 'admin', 'admin'),
('PTG003', 'petugas', 'petugas', 'petugas'),
('PTG004', 'manajer', 'manajer', 'manajer'),
('PTG005', 'amsdkmad', 'mkmasdmad', 'mkssadmamsd');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(50) NOT NULL,
  `id_kategori_pinjaman` varchar(50) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `besar_pinjaman` varchar(100) NOT NULL,
  `jaminan` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_acc` date NOT NULL,
  `tgl_pelunasan` date NOT NULL,
  `status_pinjaman` varchar(50) NOT NULL,
  `besar_angsuran` varchar(50) NOT NULL,
  `biaya_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_kategori_pinjaman`, `id_anggota`, `besar_pinjaman`, `jaminan`, `tgl_pengajuan`, `tgl_acc`, `tgl_pelunasan`, `status_pinjaman`, `besar_angsuran`, `biaya_admin`) VALUES
('PIJ001', 'KTP001', 'AGT001', '1000', 'Motor', '2017-12-07', '2017-12-14', '2018-02-07', 'SUDAH KONFIRMASI', '600', '100'),
('PIJ003', 'KTP001', 'AGT002', '10000', 'Motor', '2017-12-12', '2017-12-19', '2018-02-12', 'SUDAH KONFIRMASI', '6000', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` varchar(50) NOT NULL,
  `id_kategori_simpanan` varchar(50) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `total_simpanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `id_kategori_simpanan`, `id_anggota`, `nama_petugas`, `tgl_simpanan`, `total_simpanan`) VALUES
('SPN001', 'KTS001', 'AGT001', 'petugas', '2017-12-11', '2000'),
('SPN002', 'KTS002', 'AGT002', 'petugas', '2017-12-20', '223000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `detail_angsuran`
--
ALTER TABLE `detail_angsuran`
  ADD PRIMARY KEY (`id_detail_angsuran`);

--
-- Indexes for table `detail_simpanan`
--
ALTER TABLE `detail_simpanan`
  ADD PRIMARY KEY (`id_detail_simpanan`);

--
-- Indexes for table `kategori_pinjaman`
--
ALTER TABLE `kategori_pinjaman`
  ADD PRIMARY KEY (`id_kategori_pinjaman`);

--
-- Indexes for table `kategori_simpanan`
--
ALTER TABLE `kategori_simpanan`
  ADD PRIMARY KEY (`id_kategori_simpanan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
