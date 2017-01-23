-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2016 at 04:39 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `kode_absensi` int(11) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `kode_kehadiran` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `masuk` varchar(10) DEFAULT NULL,
  `pulang` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`kode_absensi`, `kode_karyawan`, `kode_kehadiran`, `tanggal`, `bulan`, `tahun`, `masuk`, `pulang`) VALUES
(61, 'KR-004', 'MSK', '2016-07-22', 'Juli', '2016', '11:24 PM', '11:28 PM'),
(62, 'KR-003', 'MSK', '2016-07-22', 'Juli', '2016', '11:27 PM', '11:28 PM'),
(63, 'KR-001', 'MSK', '2016-07-22', 'Juli', '2016', '11:27 PM', '11:28 PM');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `kode_divisi` varchar(5) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kode_divisi`, `nama_divisi`) VALUES
('AGR', 'Anggaran'),
('AKT', 'Akuntansi'),
('ENG', 'Engineering'),
('HKP', 'Harkan Kapal'),
('KEU', 'Keuangan'),
('KPN', 'Kapal Niaga'),
('KPP', 'Kapal Perang'),
('LGU', 'Logistik & Umum'),
('PKB', 'Pembuatan Kapal Baru'),
('PKH', 'Pemasaran & Kerjasama Harkan'),
('PPK', 'Perencanaan Produksi Kapal Baru'),
('RDH', 'Rendal Harkan'),
('SDM', 'Sumber Daya Manusia'),
('SKK', 'SK & K3LH'),
('SKT', 'Sekretaris'),
('SPI', 'SPI');

-- --------------------------------------------------------

--
-- Table structure for table `eventkehadiran`
--

CREATE TABLE `eventkehadiran` (
  `kode_event` varchar(10) NOT NULL,
  `kode_kehadiran` varchar(5) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `batasan` int(11) NOT NULL,
  `keterangan` varchar(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventkehadiran`
--

INSERT INTO `eventkehadiran` (`kode_event`, `kode_kehadiran`, `satuan`, `batasan`, `keterangan`, `denda`) VALUES
('EV-001', 'TLB', 'Menit', 30, 'POT I', 10000),
('EV-002', 'TLB', 'Menit', 30, 'POT II', 25000),
('EV-003', 'TLB', 'Menit', 30, 'POT III', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `kode_gaji` int(11) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `master` varchar(10) NOT NULL,
  `data_master` varchar(10) NOT NULL,
  `sub_master` varchar(10) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `nilai` int(11) NOT NULL,
  `id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`kode_gaji`, `kode_karyawan`, `master`, `data_master`, `sub_master`, `bulan`, `tahun`, `nilai`, `id`) VALUES
(338, 'KR-001', 'PEG', 'PTT', 'KUA', 'Juni', '2016', 100000, 'PEG-001'),
(339, 'KR-001', 'PEG', 'PTT', 'RSK', 'Juni', '2016', 100000, 'PEG-001'),
(340, 'KR-001', 'POG', 'PTG', 'KPR', 'Juni', '2016', 100000, 'POG-001'),
(341, 'KR-001', 'POG', 'PTG', 'PRS', 'Juni', '2016', 100000, 'POG-001'),
(342, 'KR-001', 'POG', 'PTG', 'DPS', 'Juni', '2016', 100000, 'POG-001'),
(343, 'KR-001', 'POG', 'PTG', 'BNK', 'Juni', '2016', 100000, 'POG-001'),
(344, 'KR-001', 'POG', 'PTG', 'LLN', 'Juni', '2016', 100000, 'POG-001'),
(345, 'KR-001', 'POG', 'IRN', 'SP', 'Juni', '2016', 100000, 'POG-001'),
(346, 'KR-001', 'POG', 'IRN', 'KPS', 'Juni', '2016', 100000, 'POG-001'),
(347, 'KR-001', 'POG', 'IRN', 'JMS', 'Juni', '2016', 100000, 'POG-001'),
(348, 'KR-001', 'POG', 'IRN', 'PIK', 'Juni', '2016', 100000, 'POG-001'),
(349, 'KR-001', 'POG', 'IRN', 'LIN', 'Juni', '2016', 100000, 'POG-001'),
(362, 'KR-001', 'POG', 'PTG', 'KPR', 'Juli', '2016', 5000, 'POG-003'),
(363, 'KR-001', 'POG', 'PTG', 'PRS', 'Juli', '2016', 5000, 'POG-003'),
(364, 'KR-001', 'POG', 'PTG', 'DPS', 'Juli', '2016', 5000, 'POG-003'),
(365, 'KR-001', 'POG', 'PTG', 'BNK', 'Juli', '2016', 4000, 'POG-003'),
(366, 'KR-001', 'POG', 'PTG', 'LLN', 'Juli', '2016', 1000, 'POG-003'),
(367, 'KR-001', 'POG', 'IRN', 'SP', 'Juli', '2016', 3000, 'POG-003'),
(368, 'KR-001', 'POG', 'IRN', 'KPS', 'Juli', '2016', 0, 'POG-003'),
(369, 'KR-001', 'POG', 'IRN', 'JMS', 'Juli', '2016', 5000, 'POG-003'),
(370, 'KR-001', 'POG', 'IRN', 'PIK', 'Juli', '2016', 6000, 'POG-003'),
(371, 'KR-001', 'POG', 'IRN', 'LIN', 'Juli', '2016', 2000, 'POG-003'),
(372, 'KR-001', 'PEG', 'PTT', 'KUA', 'Juli', '2016', 0, 'PEG-003'),
(373, 'KR-001', 'PEG', 'PTT', 'RSK', 'Juli', '2016', 2000, 'PEG-003'),
(374, 'KR-003', 'POG', 'PTG', 'KPR', 'Juli', '2016', 50000, 'POG-004'),
(375, 'KR-003', 'POG', 'PTG', 'PRS', 'Juli', '2016', 50000, 'POG-004'),
(376, 'KR-003', 'POG', 'PTG', 'DPS', 'Juli', '2016', 50000, 'POG-004'),
(377, 'KR-003', 'POG', 'PTG', 'BNK', 'Juli', '2016', 50000, 'POG-004'),
(378, 'KR-003', 'POG', 'PTG', 'LLN', 'Juli', '2016', 50000, 'POG-004'),
(379, 'KR-003', 'POG', 'IRN', 'SP', 'Juli', '2016', 50000, 'POG-004'),
(380, 'KR-003', 'POG', 'IRN', 'KPS', 'Juli', '2016', 50000, 'POG-004'),
(381, 'KR-003', 'POG', 'IRN', 'JMS', 'Juli', '2016', 50000, 'POG-004'),
(382, 'KR-003', 'POG', 'IRN', 'PIK', 'Juli', '2016', 50000, 'POG-004'),
(383, 'KR-003', 'POG', 'IRN', 'LIN', 'Juli', '2016', 50000, 'POG-004'),
(384, 'KR-003', 'PEG', 'PTT', 'KUA', 'Juli', '2016', 0, 'PEG-004'),
(385, 'KR-003', 'PEG', 'PTT', 'RSK', 'Juli', '2016', 0, 'PEG-004'),
(386, 'KR-004', 'POG', 'PTG', 'KPR', 'Juli', '2016', 20000, 'POG-005'),
(387, 'KR-004', 'POG', 'PTG', 'PRS', 'Juli', '2016', 20000, 'POG-005'),
(388, 'KR-004', 'POG', 'PTG', 'DPS', 'Juli', '2016', 20000, 'POG-005'),
(389, 'KR-004', 'POG', 'PTG', 'BNK', 'Juli', '2016', 20000, 'POG-005'),
(390, 'KR-004', 'POG', 'PTG', 'LLN', 'Juli', '2016', 20000, 'POG-005'),
(391, 'KR-004', 'POG', 'IRN', 'SP', 'Juli', '2016', 20000, 'POG-005'),
(392, 'KR-004', 'POG', 'IRN', 'KPS', 'Juli', '2016', 20000, 'POG-005'),
(393, 'KR-004', 'POG', 'IRN', 'JMS', 'Juli', '2016', 20000, 'POG-005'),
(394, 'KR-004', 'POG', 'IRN', 'PIK', 'Juli', '2016', 20000, 'POG-005'),
(395, 'KR-004', 'POG', 'IRN', 'LIN', 'Juli', '2016', 20000, 'POG-005'),
(396, 'KR-004', 'PEG', 'PTT', 'KUA', 'Juli', '2016', 0, 'PEG-005'),
(397, 'KR-004', 'PEG', 'PTT', 'RSK', 'Juli', '2016', 0, 'PEG-005');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `kode_golongan` varchar(10) NOT NULL,
  `nama_golongan` varchar(50) NOT NULL,
  `gajipokok` int(11) NOT NULL,
  `tperumahan` int(11) NOT NULL,
  `tkesehatan` int(11) NOT NULL,
  `ttransport` int(11) NOT NULL,
  `uangmakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`kode_golongan`, `nama_golongan`, `gajipokok`, `tperumahan`, `tkesehatan`, `ttransport`, `uangmakan`) VALUES
('I-A00', 'Sekolah Dasar', 500000, 700000, 500000, 900000, 50000),
('I-A01', 'Sekolah Dasar', 500000, 700000, 500000, 900000, 50000),
('I-A02', 'Sekolah Dasar', 500000, 700000, 500000, 900000, 50000),
('I-A03', 'Sekolah Dasar', 500000, 700000, 500000, 900000, 50000),
('I-A05', 'Sekolah Dasar', 500000, 700000, 500000, 900000, 50000),
('II-A00', 'Sekolah Menengah Pertama', 500000, 700000, 500000, 900000, 50000),
('II-A01', 'Sekolah Menengah Pertama', 500000, 700000, 500000, 900000, 50000),
('II-A02', 'Sekolah Menengah Pertama', 500000, 700000, 500000, 900000, 50000),
('II-A03', 'Sekolah Menengah Pertama', 500000, 700000, 500000, 900000, 50000),
('II-A04', 'Sekolah Menengah Pertama', 500000, 700000, 500000, 900000, 50000),
('III-A00', 'Sekolah Menengah Kejuruan', 500000, 700000, 500000, 900000, 50000),
('III-A01', 'Sekolah Menengah Kejuruan', 500000, 700000, 500000, 900000, 50000),
('III-A02', 'Sekolah Menengah Kejuruan', 500000, 700000, 500000, 900000, 50000),
('III-A03', 'Sekolah Menengah Kejuruan', 500000, 700000, 500000, 900000, 50000),
('III-A04', 'Sekolah Menengah Kejuruan', 500000, 700000, 500000, 900000, 50000),
('III-B00', 'Strata 1', 1700000, 400000, 500000, 900000, 50000),
('III-B01', 'Strata 1', 1700000, 400000, 500000, 900000, 50000),
('III-B02', 'Strata 1', 1700000, 400000, 500000, 900000, 50000),
('III-B03', 'Strata 1', 1700000, 400000, 500000, 900000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` varchar(5) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `kode_divisi` varchar(5) NOT NULL,
  `insjabatan` int(11) NOT NULL,
  `tjabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`, `kode_divisi`, `insjabatan`, `tjabatan`) VALUES
('DHK', 'Direktur Harkan Kapal', 'HKP', 500000, 1000000),
('DKU', 'Direktur Keuangan', 'KEU', 500000, 1000000),
('DPK', 'Direktur Pembuatan Kapal Baru', 'PKB', 500000, 1000000),
('DSM', 'Direktur Sumber Daya Manusia', 'SDM', 500000, 1000000),
('DSU', 'Direktur SDM & Umum', 'SDM', 500000, 1000000),
('KAG', 'Kepala Divisi Anggaran', 'AGR', 500000, 1000000),
('KAK', 'Kepala Divisi Akuntansi', 'AKT', 500000, 1000000),
('KEG', 'Kepala Divisi Engineering', 'ENG', 500000, 1000000),
('KKN', 'Kepala Divisi Kapal Niaga', 'KPN', 500000, 1000000),
('KKP', 'Kepala Divisi Kapal Perang', 'KPP', 500000, 1000000),
('KKU', 'Kepala Divisi Keuangan', 'KEU', 500000, 1000000),
('KLU', 'Kepala Divisi Logistik & Umum', 'LGU', 500000, 1000000),
('KPK', 'Kepala Divisi Pemasaran & Kerjasama Harkan', 'PKH', 500000, 1000000),
('KPP', 'Kepala Divisi Perencanaan Produksi Kapal Baru', 'PPK', 500000, 1000000),
('KRH', 'Kepala Divisi Rendal Harkan', 'RDH', 500000, 1000000),
('KSD', 'Kepala DIvisi SDM', 'SDM', 500000, 1000000),
('KSK', 'Kepala Divisi SK & K3LH', 'SKK', 500000, 1000000),
('KSP', 'Kepala SPI', 'SPI', 500000, 1000000),
('SKP', 'Sekretaris Perusahaan', 'SKT', 500000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `jamkerja`
--

CREATE TABLE `jamkerja` (
  `id` int(11) NOT NULL,
  `masukkerja` varchar(10) DEFAULT NULL,
  `pulangkerja` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jamkerja`
--

INSERT INTO `jamkerja` (`id`, `masukkerja`, `pulangkerja`) VALUES
(1, '07:30 AM', '16:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `jenispembayaran`
--

CREATE TABLE `jenispembayaran` (
  `kode_jenispembayaran` varchar(5) NOT NULL,
  `nama_jenispembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenispembayaran`
--

INSERT INTO `jenispembayaran` (`kode_jenispembayaran`, `nama_jenispembayaran`) VALUES
('PTP', 'Penghasilan Tetap'),
('PTT', 'Penghasilan Tidak Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `jenispotongan`
--

CREATE TABLE `jenispotongan` (
  `kode_jenispotongan` varchar(5) NOT NULL,
  `nama_jenispotongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenispotongan`
--

INSERT INTO `jenispotongan` (`kode_jenispotongan`, `nama_jenispotongan`) VALUES
('IRN', 'Iuran'),
('PTG', 'Potongan');

-- --------------------------------------------------------

--
-- Table structure for table `jenissubpembayaran`
--

CREATE TABLE `jenissubpembayaran` (
  `kode_jenissubpembayaran` varchar(5) NOT NULL,
  `nama_jenissubpembayaran` varchar(50) NOT NULL,
  `kode_jenispembayaran` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenissubpembayaran`
--

INSERT INTO `jenissubpembayaran` (`kode_jenissubpembayaran`, `nama_jenissubpembayaran`, `kode_jenispembayaran`) VALUES
('KUA', 'Kualifikasi', 'PTT'),
('RSK', 'Resiko', 'PTT');

-- --------------------------------------------------------

--
-- Table structure for table `jenissubpotongan`
--

CREATE TABLE `jenissubpotongan` (
  `kode_jenissubpotongan` varchar(5) NOT NULL,
  `nama_jenissubpotongan` varchar(50) NOT NULL,
  `kode_jenispotongan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenissubpotongan`
--

INSERT INTO `jenissubpotongan` (`kode_jenissubpotongan`, `nama_jenissubpotongan`, `kode_jenispotongan`) VALUES
('BNK', 'Bank', 'PTG'),
('DPS', 'D.Pensiun', 'PTG'),
('JMS', 'Jamsostek', 'IRN'),
('KPR', 'Koperasi', 'PTG'),
('KPS', 'Koperasi Iuran', 'IRN'),
('LIN', 'Lainlain', 'IRN'),
('LLN', 'Lain-Lain', 'PTG'),
('PIK', 'PIK', 'IRN'),
('PRS', 'Perusahaan', 'PTG'),
('SP', 'SP', 'IRN');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kode_karyawan` varchar(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status_kawin` varchar(15) NOT NULL,
  `jumlah_anak` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telpon` varchar(15) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `kode_jabatan` varchar(5) NOT NULL,
  `kode_golongan` varchar(10) NOT NULL,
  `kode_statuskerja` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kode_karyawan`, `nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `jk`, `agama`, `status_kawin`, `jumlah_anak`, `alamat`, `nomor_telpon`, `negara`, `kode_jabatan`, `kode_golongan`, `kode_statuskerja`) VALUES
('KR-001', '201543501315', 'Gunawan Puspa Prajoko', 'Jakarta', '1998-06-20', '30124526489520', 'p', 'is', 'bk', '0', 'Jl. Batu Ampar rt15/02 No 100 Gang Haji Matali', '089689754218', 'Indonesia', 'DSM', 'III-B00', 'ORG'),
('KR-003', '201543501318', 'Anugrah Prastyo', 'Jakarta', '1995-08-26', '191097376238', 'l', 'is', 'bk', '0', 'Jl.  Batu Bulat', '089687737872', 'Indonesia', 'KEG', 'III-B00', 'ORG'),
('KR-004', '201543501319', 'Yaumi Alfadha', 'Jakarta', '1999-05-22', '112399938282', 'l', 'is', 'bk', '0', 'JL. Lenteng Agung', '08965984521', 'Indonesia', 'KAG', 'II-A00', 'HNR');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `kode_kehadiran` varchar(5) NOT NULL,
  `nama_kehadiran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`kode_kehadiran`, `nama_kehadiran`) VALUES
('TLB', 'Terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `koppembayaran`
--

CREATE TABLE `koppembayaran` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_kop` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koppembayaran`
--

INSERT INTO `koppembayaran` (`id`, `kode`, `bulan`, `tahun`, `id_kop`) VALUES
(17, 'KR-001', 'Juni', '2016', 'PEG-001'),
(19, 'KR-001', 'Juli', '2016', 'PEG-003'),
(20, 'KR-003', 'Juli', '2016', 'PEG-004'),
(21, 'KR-004', 'Juli', '2016', 'PEG-005');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturaninput`
--

CREATE TABLE `pengaturaninput` (
  `kode_pengaturan` int(11) NOT NULL,
  `master` varchar(10) NOT NULL,
  `data_master` varchar(10) NOT NULL,
  `sub_master` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturaninput`
--

INSERT INTO `pengaturaninput` (`kode_pengaturan`, `master`, `data_master`, `sub_master`) VALUES
(54, 'POG', 'PTG', 'KPR'),
(55, 'POG', 'PTG', 'PRS'),
(56, 'POG', 'PTG', 'DPS'),
(57, 'POG', 'PTG', 'BNK'),
(58, 'POG', 'PTG', 'LLN'),
(59, 'POG', 'IRN', 'SP'),
(60, 'POG', 'IRN', 'KPS'),
(61, 'POG', 'IRN', 'JMS'),
(62, 'POG', 'IRN', 'PIK'),
(63, 'POG', 'IRN', 'LIN'),
(64, 'PEG', 'PTT', 'KUA'),
(65, 'PEG', 'PTT', 'RSK');

-- --------------------------------------------------------

--
-- Table structure for table `rekamabsensi`
--

CREATE TABLE `rekamabsensi` (
  `id` varchar(20) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `kode_event` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekamabsensi`
--

INSERT INTO `rekamabsensi` (`id`, `kode_karyawan`, `bulan`, `tahun`, `kode_event`) VALUES
('2016-07-22', 'KR-004', 'Juli', '2016', 'EV-003'),
('2016-07-22', 'KR-003', 'Juli', '2016', 'EV-003'),
('2016-07-22', 'KR-001', 'Juli', '2016', 'EV-003');

-- --------------------------------------------------------

--
-- Table structure for table `statuspekerjaan`
--

CREATE TABLE `statuspekerjaan` (
  `kode_statuskerja` varchar(5) NOT NULL,
  `nama_statuskerja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuspekerjaan`
--

INSERT INTO `statuspekerjaan` (`kode_statuskerja`, `nama_statuskerja`) VALUES
('HNR', 'Honorer'),
('KTT', 'Karyawan Tidak Tetap'),
('ORG', 'Organik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `password`, `status`) VALUES
(1, 'administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'SDM', 'sdm', '0192023a7bbd73250516f069df18b500', 2),
(3, 'Direktur SDM', 'dsdm', '0192023a7bbd73250516f069df18b500', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`kode_absensi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode_divisi`);

--
-- Indexes for table `eventkehadiran`
--
ALTER TABLE `eventkehadiran`
  ADD PRIMARY KEY (`kode_event`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`kode_gaji`),
  ADD KEY `kode_karyawan` (`kode_karyawan`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`kode_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`),
  ADD KEY `kode_divisi` (`kode_divisi`);

--
-- Indexes for table `jamkerja`
--
ALTER TABLE `jamkerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenispembayaran`
--
ALTER TABLE `jenispembayaran`
  ADD PRIMARY KEY (`kode_jenispembayaran`);

--
-- Indexes for table `jenispotongan`
--
ALTER TABLE `jenispotongan`
  ADD PRIMARY KEY (`kode_jenispotongan`);

--
-- Indexes for table `jenissubpembayaran`
--
ALTER TABLE `jenissubpembayaran`
  ADD PRIMARY KEY (`kode_jenissubpembayaran`),
  ADD KEY `kode_pembayaran` (`kode_jenispembayaran`);

--
-- Indexes for table `jenissubpotongan`
--
ALTER TABLE `jenissubpotongan`
  ADD PRIMARY KEY (`kode_jenissubpotongan`),
  ADD KEY `kode_potongan` (`kode_jenispotongan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kode_karyawan`),
  ADD KEY `kode_jabatan` (`kode_jabatan`),
  ADD KEY `kode_golongan` (`kode_golongan`),
  ADD KEY `kode_status` (`kode_statuskerja`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`kode_kehadiran`);

--
-- Indexes for table `koppembayaran`
--
ALTER TABLE `koppembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturaninput`
--
ALTER TABLE `pengaturaninput`
  ADD PRIMARY KEY (`kode_pengaturan`);

--
-- Indexes for table `statuspekerjaan`
--
ALTER TABLE `statuspekerjaan`
  ADD PRIMARY KEY (`kode_statuskerja`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `kode_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `kode_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=398;
--
-- AUTO_INCREMENT for table `jamkerja`
--
ALTER TABLE `jamkerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `koppembayaran`
--
ALTER TABLE `koppembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pengaturaninput`
--
ALTER TABLE `pengaturaninput`
  MODIFY `kode_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`kode_karyawan`) REFERENCES `karyawan` (`kode_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`kode_divisi`) REFERENCES `divisi` (`kode_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jenissubpembayaran`
--
ALTER TABLE `jenissubpembayaran`
  ADD CONSTRAINT `jenissubpembayaran_ibfk_1` FOREIGN KEY (`kode_jenispembayaran`) REFERENCES `jenispembayaran` (`kode_jenispembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jenissubpotongan`
--
ALTER TABLE `jenissubpotongan`
  ADD CONSTRAINT `jenissubpotongan_ibfk_1` FOREIGN KEY (`kode_jenispotongan`) REFERENCES `jenispotongan` (`kode_jenispotongan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
