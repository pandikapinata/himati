/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.30-MariaDB : Database - db_hmti
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_hmti` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_hmti`;

/*Table structure for table `admin_password_resets` */

DROP TABLE IF EXISTS `admin_password_resets`;

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admin_password_resets` */

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','admin','yudipratistha@hotmail.com','$2y$10$Fj4Do0/06FED.Ppv1G1WvuJON.YjyZw1NGbm5ud4cVlbqga0XSnq.',NULL,NULL,NULL);

/*Table structure for table `barang_sewas` */

DROP TABLE IF EXISTS `barang_sewas`;

CREATE TABLE `barang_sewas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sewa_id` bigint(20) DEFAULT NULL,
  `barang_id` bigint(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sewa_id` (`sewa_id`),
  KEY `barang_id` (`barang_id`),
  CONSTRAINT `barang_sewas_ibfk_1` FOREIGN KEY (`sewa_id`) REFERENCES `sewas` (`id`),
  CONSTRAINT `barang_sewas_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `barang_sewas` */

insert  into `barang_sewas`(`id`,`sewa_id`,`barang_id`,`qty`,`start_date`,`end_date`,`harga`,`created_at`,`updated_at`) values 
(1,1,2,1,'2018-05-30','2018-05-31',50000,'2018-05-25 05:33:06','2018-05-25 05:33:06');

/*Table structure for table `barangs` */

DROP TABLE IF EXISTS `barangs`;

CREATE TABLE `barangs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(5) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `foto_barang` varchar(255) DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `barangs` */

insert  into `barangs`(`id`,`kode_barang`,`nama_barang`,`foto_barang`,`stok_barang`,`harga_sewa`,`created_at`,`updated_at`) values 
(1,'HTTI1','Handy Talkie','Handy Talkie_05-25-2018.jpg',10,20000,'2018-05-25 05:14:39','2018-05-25 05:14:39'),
(2,'PHB','Photobooth','Photobooth_05-25-2018.jpg',-1,50000,'2018-05-25 05:15:13','2018-05-25 05:47:33');

/*Table structure for table `fungsionaris` */

DROP TABLE IF EXISTS `fungsionaris`;

CREATE TABLE `fungsionaris` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_fungsionaris` varchar(255) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `periode_awal` varchar(5) DEFAULT NULL,
  `periode_akhir` varchar(5) DEFAULT NULL,
  `media_profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `jabatan_id` (`jabatan_id`),
  CONSTRAINT `fungsionaris_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `fungsionaris` */

insert  into `fungsionaris`(`id`,`nama_fungsionaris`,`jabatan_id`,`periode_awal`,`periode_akhir`,`media_profile`,`created_at`,`updated_at`) values 
(1,'Kadek Kris Sanjaya',1,'2017','2018','Kadek Kris Sanjaya_05-25-2018.png','2018-05-25 04:04:38','2018-05-25 04:04:38'),
(2,'I Kadek Trio Putra Pinajeng',3,'2017','2018','I Kadek Trio Putra Pinajeng_05-25-2018.png','2018-05-25 04:07:45','2018-05-25 04:07:45'),
(3,'Made Prastha Nugraha',2,'2017','2018','Made Prastha Nugraha_05-25-2018.png','2018-05-25 04:08:38','2018-05-25 04:08:38'),
(4,'Ni Luh Putri Ari Wedayanti',6,'2017','2018','Ni Luh Putri Ari Wedayanti_05-25-2018.png','2018-05-25 04:11:27','2018-05-25 04:11:27'),
(5,'Ni Wayan Ria Mandasari',7,'2017','2018','Ni Wayan Ria Mandasari_05-25-2018.png','2018-05-25 04:12:07','2018-05-25 04:12:07'),
(6,'Ni Putu Ratindia Apriyanti',4,'2017','2018','Ni Putu Ratindia Apriyanti_05-25-2018.png','2018-05-25 04:13:24','2018-05-25 04:13:24'),
(7,'Ni Putu Ratih Andini Putri',5,'2017','2018','Ni Putu Ratih Andini Putri_05-25-2018.png','2018-05-25 04:14:03','2018-05-25 04:14:03');

/*Table structure for table `guest_password_resets` */

DROP TABLE IF EXISTS `guest_password_resets`;

CREATE TABLE `guest_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `guest_password_resets_email_index` (`email`),
  KEY `guest_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `guest_password_resets` */

/*Table structure for table `guests` */

DROP TABLE IF EXISTS `guests`;

CREATE TABLE `guests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` char(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priv_id` tinyint(4) DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guests_email_unique` (`email`),
  UNIQUE KEY `guests_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `guests` */

insert  into `guests`(`id`,`username`,`name`,`email`,`telp`,`password`,`remember_token`,`priv_id`,`created_at`,`updated_at`) values 
(1,'1605551013','Yudi Pratistha','pandeyudipratistha@hotmail.com',NULL,'$2y$10$1JSCL8TvHmTkzb7XWwgga.4EhtbHokXIxe9pa3yptKNz.iiLb6Hra',NULL,1,'2018-05-25 02:54:54','2018-05-25 02:54:54');

/*Table structure for table `jabatans` */

DROP TABLE IF EXISTS `jabatans`;

CREATE TABLE `jabatans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `jabatans` */

insert  into `jabatans`(`id`,`nama_jabatan`) values 
(1,'Ketua'),
(2,'Wakil Ketua I'),
(3,'Wakil Ketua II'),
(4,'Bendahara I'),
(5,'Bendahara II'),
(6,'Sekretaris I'),
(7,'Sekretaris II');

/*Table structure for table `kegiatans` */

DROP TABLE IF EXISTS `kegiatans`;

CREATE TABLE `kegiatans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `desk_kegiatan` text,
  `media_kegiatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `kegiatans` */

insert  into `kegiatans`(`id`,`nama_kegiatan`,`desk_kegiatan`,`media_kegiatan`,`created_at`,`updated_at`) values 
(1,'SPORTI','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','SPORTI_05-25-2018.png','2018-05-25 04:34:21','2018-05-25 04:34:21'),
(2,'IT-ESEGA','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','IT-ESEGA_05-25-2018.jpg','2018-05-25 04:35:08','2018-05-25 04:35:08'),
(3,'ITversary','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','ITversary_05-25-2018.jpg','2018-05-25 04:36:48','2018-05-25 04:36:48'),
(4,'Seminar Nasional TI','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','Seminar Nasional TI_05-25-2018.jpg','2018-05-25 04:37:17','2018-05-25 04:37:17'),
(5,'Information Technology Creative Competition','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','Information Technology Creative Competition_05-25-2018.jpg','2018-05-25 04:38:03','2018-05-25 04:38:03');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `newsfeeds` */

DROP TABLE IF EXISTS `newsfeeds`;

CREATE TABLE `newsfeeds` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(255) DEFAULT NULL,
  `isi_berita` text,
  `foto_berita` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `newsfeeds` */

insert  into `newsfeeds`(`id`,`judul_berita`,`isi_berita`,`foto_berita`,`created_at`,`updated_at`) values 
(1,'Akreditasi Program Studi Teknologi Informasi Fakultas Teknik 2018','<p style=\"text-align:justify\"><strong>Program Studi Teknologi Informasi</strong> Menyelenggarakan visitasi akreditasi pada tanggal 21-23 Mei 2018. Para staf dan pegawai sudah mulai melakukan persiapan bukti fisik dan visitasi sepuluh hari sebelum dimulainya visitasi dari asesor. Asesor yang melakukan visitasi ke Program Studi Teknologi Informasi adalah Dr. Ir. Gusti Ayu Putri Saptawati, M.Comm dan Dr. Sri Suning Kusumawardani, S.T., M.T. Selain di Prodi TI visitasi juga dilakukan di Unit Sumberdaya Informasi(USDI) yang dimiliki oleh universitas udayana yang dikelola oleh prodi Teknologi Informasi. Perpustakan Universitas Udayana dan Fakultas Teknik</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/8c07bccccc6124d0a3e2d689ffb1c991.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Visitasi di Unit Sumber Daya Informasi Universitas Udayana</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/af914eb73a5aa138a9e7c079e1b2e099.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Visitasi di Unit Sumber Daya Informasi Universitas Udayana</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/ed33adf1098f4ac59b573b13bf571446.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Visitasi di Unit Sumber Daya Informasi Universitas Udayana</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/803ddf302c12bea298f854c0281fe63e.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Visitasi ke perpustakaan Universitas Udayana</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/c6849f732ed414357c9d67e0999d4030.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Visitasi ke Perpustakan Universitas Udayana</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/01084cb2c52d2a1b47baea2c6e5fec7e.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Visitasi ke Fakultas Teknik</p>\r\n\r\n<p style=\"text-align:justify\">Kemudian dihari berikutnya pada tanggal 22 Mei 2018, rangkaian acara visitasi akreditasi program studi Teknologi Informasi dilanjutkan. DImulai dengan penerimaan asesor di fakultas teknik Universitas Udayana. Para asesor diterima oleh WR1, Dekan beserta jajarannya.</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/57b5bf6c6c95be50d416b5ec980e88df.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Penyambutan asesor di Fakultas Teknik Universitas Udayana</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/fc2b2fc1dcea304a3c3d8c0c8f4948b5.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Penyambutan asesor di Fakultas Teknik Universitas Udayana</p>\r\n\r\n<p style=\"text-align:center\"><img src=\"https://it.unud.ac.id/uploads/post/5f17f02aab253190703b8d3cc87bc98a.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p style=\"text-align:center\">Penyambutan asesor di Fakultas Teknik Universitas Udayana</p>','Akreditasi Program Studi Teknologi Informasi Fakultas Teknik 2018_05-25-2018.jpg','2018-05-25 04:20:46','2018-05-25 04:20:46'),
(2,'Seminar Nasional Teknologi Informasi 2018','<p style=\"text-align:justify\"><strong>Seminar Nasional Teknologi Informasi 2018 </strong>dilaksanakan pada tanggal 24 Maret 2018. Bertempat di Hotel Oranjje Sanur, Denpasar diselenggarakan oleh Himpunan Mahasiswa Teknologi Informasi. Himpunan Mahasiswa Teknologi Informasi (HMTI) merupakan salah satu himpunan mahasiswa dalam lingkungan Fakultas Teknik, Universitas Udayana. HMTI memiliki salah satu kegiatan yang diselenggarakan setiap tahunnya yaitu Seminar Nasional Teknologi Informasi. Tahun ini, Seminar Nasional Teknologi Informasi 2018 mengangkat tema &ldquo;<em>Harness the Power of IoT to Develop Smart Technology</em>&rdquo; sehingga diharapkan memberikan wawasan baru bagi masyarakat tentang penerapan Internet of Things dalam teknologi informasi untuk diterapkan dalam kehidupan sehari-hari.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nTujuan dari diselenggarakannya Seminar Nasional Teknologi Informasi 2018 &ldquo;<em>Harness the Power of IoT to Develop Smart Technology</em>&rdquo; oleh Himpunan Mahasiswa Teknologi Informasi ini adalah sebagai wadah untuk memperkenalkan Program Studi Teknologi Informasi Fakultas Teknik Universitas Udayana kepada kalangan masyarakat luas melalui kegiatan seminar nasional, dan memperluas wawasan masyarakat umum mengenai Internet of Things. Kegiatan Seminar Nasional Teknologi Informasi 2018 memiliki 3 kategori sasaran peserta yaitu kategori umum, mahasiswa, dan pelajar yang dihadiri oleh 350 peserta. Panitia pelaksana kegiatan ini berjumlah 75 orang. Perencanaan dimulai dari minggu ketiga bulan November dengan merancang konsep dari pelaksanaan seminar.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nSetelah mencari referensi pembicara dengan beragam latar belakang dan profesi, panitia Seminar Nasional Teknologi Informasi 2018 berhasil mengundang Sofian Hadiwijaya (Creative Technologist &amp; Intel serta IOT Innovator) dan Norman Sasono (Co-founder &amp; CTO Bizzy serta Senior Technical Evangelist Microsoft) sebagai pembicara yang memberikan materi sesuai dengan tema Seminar Nasional Teknologi Informasi 2018.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img src=\"https://it.unud.ac.id/uploads/post/e8fe91cec57d8694163791fccc3831fa.jpg\" style=\"width:556px\" /></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nAcara dimulai pada pukul 09.30 WITA yang diawali dengan tari pembukaan &ldquo;Tari Merak Angelo&rdquo;. Acara dibuka oleh Koordinator Program Studi Teknologi Informasi Fakultas Teknik Universitas Udayana, dan dihadiri Dosen Program Studi Teknologi Informasi, Ketua Badan Perwakilan Mahasiswa Fakultas Teknik Universitas Udayana juga Ketua Himpunan Mahasiswa di lingkungan Fakultas Teknik Universitas Udayana.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img src=\"https://it.unud.ac.id/uploads/post/744297e4410b6fc611778b55d101cdda.jpg\" style=\"width:515px\" /></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nPemaparan materi pertama oleh Bapak Norman Sasono dengan memberi materi dasar tentang <em>Internet of Things</em>. Setelah pemaparan materi oleh pembicara pertama, acara dilanjutkan dengan makan siang dan hiburan berupa demo IoT dari mahasiswa Teknologi Informasi dan akustik band. Pemaparan materi kedua diisi oleh Bapak Sofian Hadiwijaya dengan membawakan materi yaitu pengenalan <em>smart techonology</em> pada Internet of Things, serta memberikan gambaran mengenai peluang ide bisnis melalui IoT juga pengalaman-pengalaman dari pembicara. Acara ini diakhiri dengan pengundian doorprize dan ditutup oleh MC acara.</p>','Seminar Nasional Teknologi Informasi 2018_05-25-2018.jpg','2018-05-25 04:23:25','2018-05-25 04:23:25'),
(3,'Seminar Nasional Interpersonal and Life Skill 2018','<p>Kegiatan seminar nasional <em>Interpersonal and Life Skill</em> merupakan kegiatan yang dilaksanakan oleh seluruh peserta dan pengampu mata kuliah <em>Interpersonal and Life Skill</em> di Program Studi Teknologi Informasi Fakultas Teknik Universitas Udayana.<em> Interpersonal and Life Skill</em> merupakan mata kuliah yang melatih mahasiswa agar memiliki keterampilan emosional, sehingga mereka mampu melakukan interaksi dan berkomunikasi dengan orang lain dalam aturan sosial yang beretika dengan baik. Seminar yang mengusung tema &ldquo;<em>Be Insprative People</em>&rdquo; diselenggarakan pada hari Sabtu, 3 Februari 2018 di Gedung Auditorium Widya Sabha Universitas Udayana dengan mengundang 2 narasumber yakni Akhyari Hananto selaku Founder <em>Good News From Indonesia</em> dan Joseph Theodurus Wulianadi sebagai CEO Joger.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://it.unud.ac.id/uploads/post/780e62a97a6c2ced9a0bf3cd6ef6540e.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bapak Akhyary Hananto membawakan materi mengenai bagaimana agar bersikap positif dan bernavigasi pada masa kini. Ia menuturkan awal terbentuknya <em>Good News from Indonesia</em> yaitu terinspirasi dari masa kecilnya saat berkunjung ke luar negeri dimana Indonesia dipandang tidak lebih baik dari Negara di Asia Tenggara lainnya di luar negeri. Founder <em>Good News from Indonesia</em> ini kemudian melakukan riset kepada masyarakat Indonesia dan Negara-negara maju lain hingga pada akhirnya ia membentuk media untuk memberitakan berita baik Indonesia agar dapat mengubah citra Indonesia di luar negeri.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://it.unud.ac.id/uploads/post/597a6a4f24b00e421d95aaa2953ca752.jpg\" style=\"width:647px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sesi kedua Seminar dibawakan oleh Bapak Joseph Teodurus Wulianadi memaparkan bagaimana agar para peserta dapat menjadi individu yang kreatif, inspiratif, dan berkarakter. Peserta sangat antusias dengan materi yang dipaparkan oleh CEO Joger. Sesi kedua seminar ini berlangsung dengan penuh canda tawa ketika Mr. Joger membawakan materinya dan memberikan sebuah quotes yang sangat inspiratif yaitu &ldquo;Perlakukanlah orang lain sebagaimana kita ingin diperlakukan oleh orang lain&rdquo;.</p>\r\n\r\n<p>Kegiatan Seminar Nasional <em>Interpersonal and Life Skill</em> 2018 diharapkan dapat menginspirasi peserta untuk mengembangkan potensi diri peserta dan menciptakan ide-ide kreatif. Selain pengembangan potensi diri, diharapkan melalui kegiatan seminar ini dapat memberikan gambaran tentang pentingnya pengembangan diri dan pembentukan karakter di setiap individu agar mampu mencetak individu yang kreatif, inspiratif, dan berkarakter.</p>','Seminar Nasional Interpersonal and Life Skill 2018_05-25-2018.jpg','2018-05-25 04:24:53','2018-05-25 04:24:53'),
(4,'MUSANG LUB HMTI 2017','<div style=\"text-align:justify\"><strong>Musyawarah Anggota Himpunan Mahasiswa Teknologi Informasi Fakultas Teknik Universitas Udayana</strong> kembali digelar pada hari Jumat, 16 Desember 2017, bertempat di Aula Suastika, Gedung Teknologi Informasi, Fakultas Teknik Bukit Jimbaran. Kegiatan yang merupakan program kerja tahunan ini diadakan guna membahas kembali segala aturan yang berlaku di lingkungan himpunan selama satu periode kepengurusan. Namun, ada yang berbeda dari kegiatan tahunan ini, dimana musyawarah kali ini digelar dengan nama Musyawarah Anggota Luar Biasa yang selanjutnya disebut dengan MUSANG LUB karena telah diselenggarakan dua kali pada tahun 2017, dimana sebelumnya telah digelar pada awal bulan April 2017. Alasan mengapa MUSANG LUB diselenggarakan untuk kedua kalinya di tahun yang sama adalah karena adanya keputusan untuk mengganti periode angkatan yang menjabat pada kepengurusan Himpunan Mahasiswa Teknologi Informasi. &ldquo;Selama ini, program studi Teknologi Informasi dianggap memiliki kepengurusan himpunan dengan angkatan yang paling tua, dimana angkatan tersebut biasanya sudah disibukkan dengan kegiatan KKN, Kerja Praktek, dan menyusun Tugas Akhir.&rdquo; ujar Kadek Darmaastawan selaku Ketua Himpunan Mahasiswa Teknologi Informasi (HMTI) periode 2017.</div>\r\n\r\n<div style=\"text-align:justify\">&nbsp;</div>\r\n\r\n<div style=\"text-align:justify\">Kegiatan MUSANG LUB yang memiliki tema &ldquo;Satu Suara untuk TI yang Berintegritas&rdquo; ini dibuka oleh Dr. Eng. I Putu Agung Bayupati, S.T., M.T. selaku Ketua Program Studi Teknologi Informasi Fakultas Teknik Universitas Udayana. Beliau juga menyampaikan rasa terimakasihnya kepada Kadek Darmaastawan yang telah menjabat sebagai Ketua HMTI walaupun dengan periode kepengurusan terpendek.</div>\r\n\r\n<div style=\"text-align:justify\">&nbsp;</div>\r\n\r\n<div style=\"text-align:justify\">Kadek Darmaastawan dalam kesempatan kali ini menyampaikan seluruh fungsionaris pada masa kepemimpinannya resmi demisioner. Penyampaian demisioner tersebut merupakan awal perjalanan yang baru bagi Program Studi Teknologi Informasi, dimana selanjutnya melalui salah satu rangkaian kegiatan MUSANG LUB yaitu Pemilu Raya yang akan dilaksanakan pada 18-20 Desember 2017, akan dipilih ketua himpunan yang baru untuk memimpin HMTI untuk satu periode kedepan.&nbsp;</div>\r\n\r\n<div style=\"text-align:justify\">&nbsp;</div>\r\n\r\n<div style=\"text-align:justify\">Kandidat ketua himpunan yang telah ditetapkan terdiri dari dua orang yang berasal dari angkatan 2015, yaitu I Kadek Kris Sanjaya dan I Gede Gangga Darwantara. Perhitungan suara secara langsung akan diadakan pada hari Jumat, 22 Desember 2017, dimana akan dihadiri pula oleh perwakilan masing-masing angkatan program studi Teknologi Informasi.</div>\r\n\r\n<div style=\"text-align:justify\">&nbsp;</div>\r\n\r\n<div style=\"text-align:justify\">Setelah proses perhitungan suara selesai, pada hari yang sama akan dilaksanakan pula Serah Terima Jabatan (SERTIJAB) oleh Ketua HMTI periode 2017 yaitu Kadek Darmaastawan kepada pemilik jumlah suara tertinggi.</div>\r\n\r\n<div style=\"text-align:justify\">&nbsp;</div>\r\n\r\n<div style=\"text-align:justify\">Terpilihnya Ketua Himpunan Mahasiswa Teknologi Informasi periode 2018 akan menjadi tanda bahwa kepengurusan himpunan yang baru telah dimulai. Ketua himpunan terpilih tentunya diharapkan dapat menjalankan visi dan misi yang telah disampaikan dan dapat membawa program studi Teknologi Informasi menjadi lebih berintegritas dan lebih baik kedepannya. <strong>(cin)</strong></div>','MUSANG LUB HMTI 2017_05-25-2018.jpg','2018-05-25 04:30:38','2018-05-25 04:30:38');

/*Table structure for table `oprec_sies` */

DROP TABLE IF EXISTS `oprec_sies`;

CREATE TABLE `oprec_sies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `oprec_id` bigint(20) DEFAULT NULL,
  `sie_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oprec_id` (`oprec_id`),
  KEY `sie_id` (`sie_id`),
  CONSTRAINT `oprec_sies_ibfk_1` FOREIGN KEY (`oprec_id`) REFERENCES `oprecs` (`id`),
  CONSTRAINT `oprec_sies_ibfk_2` FOREIGN KEY (`sie_id`) REFERENCES `sies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `oprec_sies` */

insert  into `oprec_sies`(`id`,`oprec_id`,`sie_id`,`created_at`,`updated_at`) values 
(13,1,1,'2018-05-25 05:11:44','2018-05-25 05:11:44'),
(14,1,2,'2018-05-25 05:11:46','2018-05-25 05:11:46'),
(15,1,3,'2018-05-25 05:11:46','2018-05-25 05:11:46'),
(16,1,4,'2018-05-25 05:11:46','2018-05-25 05:11:46'),
(17,1,5,'2018-05-25 05:11:46','2018-05-25 05:11:46'),
(18,1,6,'2018-05-25 05:11:47','2018-05-25 05:11:47');

/*Table structure for table `oprecs` */

DROP TABLE IF EXISTS `oprecs`;

CREATE TABLE `oprecs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `media_kegiatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `oprecs` */

insert  into `oprecs`(`id`,`nama_kegiatan`,`media_kegiatan`,`created_at`,`updated_at`) values 
(1,'IT-ESEGA','IT-ESEGA_05-25-2018.jpg','2018-05-25 04:54:35','2018-05-25 04:54:35');

/*Table structure for table `pendaftaran` */

DROP TABLE IF EXISTS `pendaftaran`;

CREATE TABLE `pendaftaran` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `oprec_id` bigint(20) DEFAULT NULL,
  `guest_id` bigint(20) unsigned DEFAULT NULL,
  `sie_pilihan` varchar(255) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `user_line` varchar(255) DEFAULT NULL,
  `alasan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oprec_id` (`oprec_id`),
  KEY `guest_id` (`guest_id`),
  CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`oprec_id`) REFERENCES `oprecs` (`id`),
  CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pendaftaran` */

/*Table structure for table `pendaftarans` */

DROP TABLE IF EXISTS `pendaftarans`;

CREATE TABLE `pendaftarans` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `oprec_id` bigint(20) DEFAULT NULL,
  `guest_id` bigint(20) unsigned DEFAULT NULL,
  `sie_pilihan` varchar(255) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `user_line` varchar(255) DEFAULT NULL,
  `alasan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oprec_id` (`oprec_id`),
  KEY `guest_id` (`guest_id`),
  CONSTRAINT `pendaftarans_ibfk_1` FOREIGN KEY (`oprec_id`) REFERENCES `oprecs` (`id`),
  CONSTRAINT `pendaftarans_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `pendaftarans` */

insert  into `pendaftarans`(`id`,`oprec_id`,`guest_id`,`sie_pilihan`,`no_telp`,`user_line`,`alasan`,`created_at`,`updated_at`) values 
(6,1,1,'Perlengkapan','0896666777','yudi_123','Pingin nyari SKP','2018-05-25 06:23:29','2018-05-25 06:23:29');

/*Table structure for table `periods` */

DROP TABLE IF EXISTS `periods`;

CREATE TABLE `periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period_awal` varchar(255) DEFAULT NULL,
  `period_akhir` varchar(255) DEFAULT NULL,
  `kabinet` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `periods` */

insert  into `periods`(`id`,`period_awal`,`period_akhir`,`kabinet`,`created_at`,`updated_at`) values 
(1,'2017','2018','Perubahan','2018-05-25 02:52:47','0000-00-00 00:00:00');

/*Table structure for table `sewas` */

DROP TABLE IF EXISTS `sewas`;

CREATE TABLE `sewas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `guest_id` bigint(20) unsigned DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tgl_pesan` timestamp NULL DEFAULT NULL,
  `status_sewa` enum('Jadi','Pending','Waiting','Approved','Decline','Batal') DEFAULT 'Jadi',
  `keterangan` text,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guest_id` (`guest_id`),
  CONSTRAINT `sewas_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `sewas` */

insert  into `sewas`(`id`,`guest_id`,`total_bayar`,`tgl_pesan`,`status_sewa`,`keterangan`,`bukti_pembayaran`,`created_at`,`updated_at`) values 
(1,1,50000,'2018-05-25 05:47:04','Approved','LUNAS BOSS','Yudi Pratistha_1527198501.jpg','2018-05-25 05:33:05','2018-05-25 05:50:13');

/*Table structure for table `sies` */

DROP TABLE IF EXISTS `sies`;

CREATE TABLE `sies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sie` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `sies` */

insert  into `sies`(`id`,`nama_sie`,`created_at`,`updated_at`) values 
(1,'Keamanan','2018-05-25 04:55:26','2018-05-25 04:55:26'),
(2,'Perlengkapan','2018-05-25 04:55:36','2018-05-25 04:55:36'),
(3,'Hubungan Masyarakat','2018-05-25 04:55:51','2018-05-25 04:55:51'),
(4,'Penggalian Dana','2018-05-25 04:56:16','2018-05-25 04:56:16'),
(5,'Acara','2018-05-25 04:56:29','2018-05-25 04:56:29'),
(6,'Publikasi dan Dokumentasi','2018-05-25 04:56:53','2018-05-25 04:56:53');

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `CekStatus` */

/*!50106 DROP EVENT IF EXISTS `CekStatus`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `CekStatus` ON SCHEDULE EVERY 1 SECOND STARTS '2018-05-21 16:03:41' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
		UPDATE sewas
		SET status_sewa = 'Batal'
		WHERE tgl_pesan < DATE_SUB(NOW(), INTERVAL 24 HOUR)
		AND status_sewa = 'Pending';
	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
