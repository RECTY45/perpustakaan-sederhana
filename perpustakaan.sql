-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for perpustakaan
CREATE DATABASE IF NOT EXISTS `perpustakaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `perpustakaan`;

-- Dumping structure for table perpustakaan.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table perpustakaan.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `tahun_terbit` int DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `isbn` varchar(15) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table perpustakaan.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int NOT NULL AUTO_INCREMENT,
  `id_anggota` int DEFAULT NULL,
  `id_buku` int DEFAULT NULL,
  `tanggal_peminjaman` date DEFAULT NULL,
  `tanggal_wajib_dikembalikan` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` enum('Dipinjam','Dikembalikan Tepat Waktu','Terlambat Dikembalikan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pinjam_berapa_hari` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `perpanjangan_peminjaman` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_denda` enum('Tidak Denda','Kena Denda') DEFAULT NULL,
  `catatan_perpustakaan` text,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
