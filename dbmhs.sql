-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Feb 2017 pada 10.04
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE `mhs` (
  `Nobp` char(15) NOT NULL,
  `Nama` varchar(16) DEFAULT NULL,
  `Jekel` varbinary(100) DEFAULT NULL,
  `TempatLahir` varchar(16) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Kelas` char(15) DEFAULT NULL,
  `Kode_f` char(13) DEFAULT NULL,
  `Alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`Nobp`, `Nama`, `Jekel`, `TempatLahir`, `TglLahir`, `Kelas`, `Kode_f`, `Alamat`) VALUES
('1001', 'Soekarno', 0x4c616b692d4c616b69, 'Papua new guinie', '1994-12-14', 'Mandiri', '1001', 'Jalan Pegangsaan timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tfakultas`
--

CREATE TABLE `tfakultas` (
  `Kode_f` char(16) NOT NULL,
  `Nama_f` varchar(100) DEFAULT NULL,
  `Nama_PS` char(20) DEFAULT NULL,
  `Status` char(45) DEFAULT NULL,
  `NoSK` char(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tfakultas`
--

INSERT INTO `tfakultas` (`Kode_f`, `Nama_f`, `Nama_PS`, `Status`, `NoSK`) VALUES
('1001', 'Sistem informasi', 'APSI', 'Terakreditasi', '002'),
('1002', 'Kedokteran', 'Dokter gigi', 'Tidak Terakreditasi', '5588');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tkelas`
--

CREATE TABLE `tkelas` (
  `IdKelas` char(4) NOT NULL,
  `Nm_kelas` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tkelas`
--

INSERT INTO `tkelas` (`IdKelas`, `Nm_kelas`) VALUES
('1009', 'Reguler'),
('1010', 'Mandiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmtk`
--

CREATE TABLE `tmtk` (
  `Kode_MK` char(10) DEFAULT NULL,
  `Nama_MK` varchar(100) DEFAULT NULL,
  `Sks` int(11) DEFAULT NULL,
  `Prasyarat1` char(10) DEFAULT NULL,
  `Prasyarat2` char(10) DEFAULT NULL,
  `Prasyarat3` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmtk`
--

INSERT INTO `tmtk` (`Kode_MK`, `Nama_MK`, `Sks`, `Prasyarat1`, `Prasyarat2`, `Prasyarat3`) VALUES
('1003', 'Topologi jaringan', 3, 'mbp994', 'mbp994', 'mbp994');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tnilai`
--

CREATE TABLE `tnilai` (
  `ID` char(16) NOT NULL,
  `NoBp` char(16) DEFAULT NULL,
  `Kode_MK` char(10) DEFAULT NULL,
  `Kode_f` char(3) DEFAULT NULL,
  `Nilai_MID` int(4) DEFAULT NULL,
  `Nilai_UAS` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tnilai`
--

INSERT INTO `tnilai` (`ID`, `NoBp`, `Kode_MK`, `Kode_f`, `Nilai_MID`, `Nilai_UAS`) VALUES
('1223', '0', '0', '0', 90, 90),
('1224', '0', '0', '0', 85, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`Nobp`);

--
-- Indexes for table `tfakultas`
--
ALTER TABLE `tfakultas`
  ADD PRIMARY KEY (`Kode_f`);

--
-- Indexes for table `tkelas`
--
ALTER TABLE `tkelas`
  ADD PRIMARY KEY (`IdKelas`);

--
-- Indexes for table `tnilai`
--
ALTER TABLE `tnilai`
  ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
