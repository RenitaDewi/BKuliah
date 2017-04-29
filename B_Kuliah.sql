-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 5.1.49-community - MySQL Community Server (GPL)
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for b_kuliah
CREATE DATABASE IF NOT EXISTS `b_kuliah` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `b_kuliah`;


-- Dumping structure for table b_kuliah.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nrp` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` int(11) NOT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table b_kuliah.mahasiswa: ~0 rows (approximately)
DELETE FROM `mahasiswa`;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;


-- Dumping structure for table b_kuliah.matakuliah
CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode_mk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mk` varchar(30) NOT NULL DEFAULT '0',
  `sks` int(11) NOT NULL DEFAULT '0',
  `nrp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_mk`),
  KEY `FK_Matakuliah_mahasiswa` (`nrp`),
  CONSTRAINT `FK_Matakuliah_mahasiswa` FOREIGN KEY (`nrp`) REFERENCES `mahasiswa` (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table b_kuliah.matakuliah: ~0 rows (approximately)
DELETE FROM `matakuliah`;
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
