-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 5.7.16-log - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               9.4.0.5142
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk b_kuliah
CREATE DATABASE IF NOT EXISTS `b_kuliah` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `b_kuliah`;

-- membuang struktur untuk table b_kuliah.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nrp` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `kode_pin` varchar(50) NOT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel b_kuliah.mahasiswa: ~2 rows (lebih kurang)
DELETE FROM `mahasiswa`;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`nrp`, `nama`, `alamat`, `no_telp`, `kode_pin`) VALUES
	('152014043', 'Gilang septya', 'Bandung', '088712345678', 'fa1cbe6dcd20e16215c07ba00b1a99d3'),
	('152014070', 'Himawan sutanto', 'Bandung', '088907654567', 'fdee47d278f1a2697b096f61f3ca6e3b');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- membuang struktur untuk table b_kuliah.matakuliah
CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode_mk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mk` varchar(30) NOT NULL DEFAULT '0',
  `sks` int(1) NOT NULL DEFAULT '0',
  `nrp` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_mk`),
  KEY `FK_Matakuliah_mahasiswa` (`nrp`),
  CONSTRAINT `FK_matakuliah_mahasiswa` FOREIGN KEY (`nrp`) REFERENCES `mahasiswa` (`nrp`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel b_kuliah.matakuliah: ~2 rows (lebih kurang)
DELETE FROM `matakuliah`;
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `sks`, `nrp`) VALUES
	(1, 'rekweb', 4, '152014070'),
	(2, 'matematika', 3, '152014043');
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
