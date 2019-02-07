/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.6.20 : Database - sims
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `pemberitahuan_surat` */

DROP TABLE IF EXISTS `pemberitahuan_surat`;

CREATE TABLE `pemberitahuan_surat` (
  `id_balasan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemberitahuan` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `keterangan_disposisi` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `tanggal_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id_balasan`),
  KEY `id_pemberitahuan` (`id_pemberitahuan`),
  KEY `id_penerima` (`id_penerima`),
  KEY `id_balasan` (`id_balasan`),
  CONSTRAINT `pemberitahuan_surat_ibfk_1` FOREIGN KEY (`id_pemberitahuan`) REFERENCES `tb_pemberitahuan` (`id_pemberitahuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pemberitahuan_surat_ibfk_2` FOREIGN KEY (`id_penerima`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pemberitahuan_surat` */

/*Table structure for table `tb_jabatan` */

DROP TABLE IF EXISTS `tb_jabatan`;

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jabatan` */

insert  into `tb_jabatan`(`id_jabatan`,`nama_jabatan`) values 
(4,'Admin Sekolah'),
(5,'Kepala Sekolah'),
(6,'Wakil Direktur'),
(7,'Guru');

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`nama_kategori`) values 
(1,'Surat Masuk'),
(2,'Surat Keluar');

/*Table structure for table `tb_kode_disposisi` */

DROP TABLE IF EXISTS `tb_kode_disposisi`;

CREATE TABLE `tb_kode_disposisi` (
  `id_kode_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_disposisi` varchar(1) NOT NULL,
  `nama_kode_disposisi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kode_disposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kode_disposisi` */

insert  into `tb_kode_disposisi`(`id_kode_disposisi`,`kode_disposisi`,`nama_kode_disposisi`) values 
(1,'A','Dinas Pendidikan'),
(2,'B','Muhammadiyah/Yayasan'),
(5,'C','Umum'),
(6,'D','Universitas Lain');

/*Table structure for table `tb_level` */

DROP TABLE IF EXISTS `tb_level`;

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(100) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_level` */

insert  into `tb_level`(`id_level`,`nama_level`) values 
(1,'Admin'),
(2,'Operator'),
(3,'Guest');

/*Table structure for table `tb_nomor_agenda` */

DROP TABLE IF EXISTS `tb_nomor_agenda`;

CREATE TABLE `tb_nomor_agenda` (
  `id_nomor_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_agenda` int(11) NOT NULL,
  `id_kode_disposisi` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  PRIMARY KEY (`id_nomor_agenda`),
  KEY `id_kode_disposisi` (`id_kode_disposisi`),
  KEY `id_tahun` (`id_tahun`),
  KEY `id_surat` (`id_surat`),
  CONSTRAINT `tb_nomor_agenda_ibfk_1` FOREIGN KEY (`id_kode_disposisi`) REFERENCES `tb_kode_disposisi` (`id_kode_disposisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_nomor_agenda_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_nomor_agenda_ibfk_3` FOREIGN KEY (`id_surat`) REFERENCES `tb_surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nomor_agenda` */

insert  into `tb_nomor_agenda`(`id_nomor_agenda`,`nomor_agenda`,`id_kode_disposisi`,`id_tahun`,`id_surat`) values 
(1,1,1,1,1);

/*Table structure for table `tb_pemberitahuan` */

DROP TABLE IF EXISTS `tb_pemberitahuan`;

CREATE TABLE `tb_pemberitahuan` (
  `id_pemberitahuan` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) NOT NULL,
  `id_nomor_agenda` int(11) NOT NULL,
  `id_sifat` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  PRIMARY KEY (`id_pemberitahuan`),
  KEY `id_surat` (`id_surat`),
  KEY `id_nomor_agenda` (`id_nomor_agenda`),
  KEY `id_sifat` (`id_sifat`),
  KEY `id_tahu` (`id_tahun`),
  KEY `id_pengirim` (`id_pengirim`),
  CONSTRAINT `tb_pemberitahuan_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `tb_surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_pemberitahuan_ibfk_2` FOREIGN KEY (`id_nomor_agenda`) REFERENCES `tb_nomor_agenda` (`id_nomor_agenda`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_pemberitahuan_ibfk_3` FOREIGN KEY (`id_sifat`) REFERENCES `tb_sifat` (`id_sifat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_pemberitahuan_ibfk_4` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_pemberitahuan_ibfk_6` FOREIGN KEY (`id_pengirim`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pemberitahuan` */

/*Table structure for table `tb_sifat` */

DROP TABLE IF EXISTS `tb_sifat`;

CREATE TABLE `tb_sifat` (
  `id_sifat` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_sifat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_sifat` */

insert  into `tb_sifat`(`id_sifat`,`keterangan`) values 
(1,'Rahasia'),
(2,'Penting');

/*Table structure for table `tb_surat` */

DROP TABLE IF EXISTS `tb_surat`;

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_surat` varchar(200) NOT NULL,
  `judul_surat` varchar(200) NOT NULL,
  `tanggal_masuk_surat` date NOT NULL,
  `perihal_surat` varchar(100) NOT NULL,
  `lampiran_surat` varchar(100) NOT NULL,
  `pengirim_tujuan` varchar(200) NOT NULL,
  `maksud_surat` text NOT NULL,
  `id_kode_disposisi` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `file` text NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_surat`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_kode_disposisi` (`id_kode_disposisi`),
  KEY `id_tahun` (`id_tahun`),
  CONSTRAINT `tb_surat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_surat_ibfk_2` FOREIGN KEY (`id_kode_disposisi`) REFERENCES `tb_kode_disposisi` (`id_kode_disposisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_surat_ibfk_3` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_surat` */

insert  into `tb_surat`(`id_surat`,`nomor_surat`,`judul_surat`,`tanggal_masuk_surat`,`perihal_surat`,`lampiran_surat`,`pengirim_tujuan`,`maksud_surat`,`id_kode_disposisi`,`id_kategori`,`file`,`id_tahun`,`status`) values 
(1,'123','Surat Cinta Untukmu','2019-01-26','Ungkapan','0','Madrasah Percintaan Rosul','Ringkasan Surat',1,1,'files/254385c4bdeb0e0f9f.docx',1,0),
(2,'124','Balasan Surat KP UAD','2019-01-28','Balasan','1','TU FMIPA UAD','Menanggapi surat yang diajukan oleh mahasiswa SI UAD ',NULL,2,'files/91935c4f15a2d39f6.docx',1,0);

/*Table structure for table `tb_tahun` */

DROP TABLE IF EXISTS `tb_tahun`;

CREATE TABLE `tb_tahun` (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `nama_tahun` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tahun` */

insert  into `tb_tahun`(`id_tahun`,`tahun`,`nama_tahun`) values 
(1,2018,'Tahun Ajaran 2018/2019'),
(2,2019,'Tahun Ajaran 2019/2020');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `jabatan` (`jabatan`),
  KEY `level` (`level`),
  CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`level`) REFERENCES `tb_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`nip`,`fullname`,`password`,`jabatan`,`alamat`,`email`,`level`) values 
(4,'385516','Muallimin Yogyakarta','21232f297a57a5a743894a0e4a801fc3',4,'Jalan S.Parman No 68, Patangpuluhan, Yogyakarta','mualliminmuhyk@gmail.com',1),
(5,'1416045','Anggi','4a283e1f5eb8628c8631718fe87f5917',5,'Yogyakarta','angger43@gmail.com',2),
(6,'28734','Muhammad Ansar Sara','21232f297a57a5a743894a0e4a801fc3',6,'Yogyakarta','opunkjr76@gmail.com',3),
(7,'1616043','Wina Ramadhan','8b9ae30192e5face087b174e2b18b749',7,'Riau','winaramadhan22@gmail.com',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
