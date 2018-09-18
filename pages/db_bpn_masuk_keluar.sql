# Host: localhost:3356  (Version 5.5.5-10.1.28-MariaDB)
# Date: 2018-04-06 07:04:38
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "t_surat_keluar"
#

DROP TABLE IF EXISTS `t_surat_keluar`;
CREATE TABLE `t_surat_keluar` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(11) NOT NULL,
  `suratmasuk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "t_surat_keluar"
#

INSERT INTO `t_surat_keluar` VALUES (10,'',1,'s','   1','1/ND-92.02/04/2017','2018-04-25','0000-00-00','','reservasi-kereta-api.pdf',0,'1');

#
# Structure for table "t_surat_masuk"
#

DROP TABLE IF EXISTS `t_surat_masuk`;
CREATE TABLE `t_surat_masuk` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `no_agenda` int(11) DEFAULT NULL,
  `indek_berkas` varchar(100) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `dari` varchar(250) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(4) NOT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `agenda_pdf` int(11) NOT NULL,
  `dibales` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "t_surat_masuk"
#

INSERT INTO `t_surat_masuk` VALUES (5,'',1,'','        hal1        ','1','1','2018-03-24','2018-03-27','','VOIP BROCHURE - ID_0.2.pdf',0,'2018',9,0),(7,'',2,'','asda','3','1111','2018-04-06','2018-04-06','','aplikasi-epayment-win-8.pdf',0,'2018',1,1),(8,'',3,'','cdd','1','dd','2018-04-06','2018-04-06','','reservasi-kereta-api.pdf',0,'2018',1,0);
