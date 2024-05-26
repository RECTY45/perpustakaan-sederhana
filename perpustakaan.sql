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
DROP DATABASE IF EXISTS `perpustakaan`;
CREATE DATABASE IF NOT EXISTS `perpustakaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `perpustakaan`;

-- Dumping structure for table perpustakaan.anggota
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table perpustakaan.anggota: ~0 rows (approximately)
INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `no_telp`, `email`, `jenis_kelamin`) VALUES
	(3, 'Akbar', 'Jl.Tamanlanrea Indah Blok.6', '08767253723', 'Akbar@gmail.com', '0'),
	(4, 'Nurul Rahmatul Islami', 'Gelora Blok.A2', '085965813234', 'rahma985@gmail.com', '1'),
	(5, 'Ari Tegal Exploiter', 'Jl.Tegal Retas.009', '0817218321', 'banngari12@gmail.com', '0'),
	(6, 'Benjamin Angel', 'Jl.Jermanie', '087863286', 'benjamin08@gmail.com', '0'),
	(7, 'Zhaka Hidayat Yasir', 'Jl.Pajjaiang No.19', '0857756235', 'zhakazx@gmail.com', '0'),
	(8, 'Muhammad Agil', 'Jl.Goa Ria NO.08', '0872387', 'bintang650@gmail.com', '0'),
	(10, 'Aqila Nur Asyifa', 'Jl.Perunnas No.11', '0927397232', 'syifasyantik@gmail.com', '1');

-- Dumping structure for table perpustakaan.buku
DROP TABLE IF EXISTS `buku`;
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

-- Dumping data for table perpustakaan.buku: ~0 rows (approximately)
INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `tahun_terbit`, `genre`, `gambar`, `isbn`, `stok`) VALUES
	(7, ' profile Fullmetal Alchemist', 'Hiromu Arakawa', 2007, 'Romance, Horror, Psikologi', '7.png', '9786020497266', 1500),
	(8, 'Death Note', 'Tsugumi Ohba', 2003, 'Fantasi, Psikologi', '8.png', ' 9784088736213.', 50),
	(9, 'Attack on Titan', 'Hajime Isayama', 2009, 'Romance, Fantasi, Psikologi', '9.png', '0', 900),
	(10, 'Haikyuu', 'Haruichi Furudate', 2012, 'Romance, Fantasi, Komedi', '10.png', '089892323', 300);

-- Dumping structure for table perpustakaan.peminjaman
DROP TABLE IF EXISTS `peminjaman`;
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

-- Dumping data for table perpustakaan.peminjaman: ~0 rows (approximately)
INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `id_buku`, `tanggal_peminjaman`, `tanggal_wajib_dikembalikan`, `tanggal_kembali`, `status_peminjaman`, `pinjam_berapa_hari`, `perpanjangan_peminjaman`, `status_denda`, `catatan_perpustakaan`) VALUES
	(4, 4, 10, '2024-05-26', '2024-05-31', '2024-05-31', 'Dikembalikan Tepat Waktu', '', '0 hari', 'Tidak Denda', 'Tolong Dikembalikan Tepat Waktu '),
	(7, 7, 9, '2024-05-26', '2024-06-01', '2024-06-01', 'Dikembalikan Tepat Waktu', '5 hari', '0 hari', 'Tidak Denda', 'makasih '),
	(8, 3, 7, '2024-05-26', '2024-05-31', '2024-05-31', 'Dikembalikan Tepat Waktu', '5 hari', '0 hari', 'Tidak Denda', 'Terimakasih'),
	(9, 4, 8, '2024-05-26', '2024-05-31', '2024-05-31', 'Dikembalikan Tepat Waktu', '5 hari', '0 hari', 'Tidak Denda', 'Terimakasih Sudah Tepat Waktu');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
