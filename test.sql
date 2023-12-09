-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.25-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk ecommerce
CREATE DATABASE IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ecommerce`;

-- membuang struktur untuk table ecommerce.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel ecommerce.kategori: ~2 rows (lebih kurang)
INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
	(1, 'Elektronik'),
	(2, 'Perlengkapan Rumah');

-- membuang struktur untuk table ecommerce.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stock` int(3) NOT NULL,
  `photo` mediumblob DEFAULT NULL,
  `kategori_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_kategori` (`kategori_id`),
  CONSTRAINT `FK_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel ecommerce.produk: ~1 rows (lebih kurang)
INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `harga`, `stock`, `photo`, `kategori_id`) VALUES
	(1, 'Test', 'Test', 20000.00, 100, NULL, 2);

-- membuang struktur untuk table ecommerce.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel ecommerce.users: ~3 rows (lebih kurang)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
	(1, 'admin', 'admin@test.com', '$2y$10$cJEomM4M3qWalE5a5R0lLe07yv.OBc2YRUW1wK/3mvTxKbPYPnzZy', 1),
	(2, 'user', 'user@test.com', '$2y$10$5vT0c8IpUOn3v1NXhc0tWurwJqPZr8GhtF0Vb7sOoX59WM0Gp0jbS', 0),
	(17, 'test', 'test@mail.com', '$2y$10$wkfbTzskhRwPPwVRdYn.z.kXDG3MVafN4T9ODLtawtI14tWBufsbG', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
