# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.9)
# Database: siberol
# Generation Time: 2012-03-01 23:55:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table berita
# ------------------------------------------------------------

DROP TABLE IF EXISTS `berita`;

CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nm_war` varchar(50) NOT NULL,
  `judul` varchar(127) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;

INSERT INTO `berita` (`id`, `tgl_post`, `nm_war`, `judul`, `isi`, `gambar`, `kategori`, `status`, `user_id`)
VALUES
	(23,'2012-03-01 22:03:21','Guntur','KPK: Pada Saatnya, Anas akan Dipanggil untuk Hambalang ','<p><strong>Jakarta </strong> KPK fokus menuntaskan kasus proyek pembangunan kompleks olahraga Hambalang. KPK akan memeriksa Ketua Umum PD Anas Urbaningrum jika datanya mencukupi.<br /><br />\"Ketika nanti pada tahap untuk penyelidikan memerlukan dia (Anas) pasti akan kami panggil,\" kata Wakil Ketua KPK Busyro Muqoddas kepada wartawan di Gedung DPR, Senayan, Jakarta, Kamis (1/3/2012),<br /><br />Menurut Busyro, waktu pemeriksaan Anas belum dipastikan. Semua tergantung kelengkapan data yang dimiliki KPK.<br /><br />\"Waktu itu bergantung pada capaian-capaian dari pengumpulan keterangan dalam tahap sekarang ini, yaitu tahap penyelidikan,\" kata Busyro.<br /><br />Namun sampai sekarang KPK belum menemukan pidana yang menyangkut Anas. \"Belum. Sampai saat ini saya belum bisa mengatakan ada atau tidak ada,\" kata Busyro.<br /><br />Namun dipastikan kesaksian Anas diperlukan. \"Ya. Diperlukan. Ketika dia itu nanti di dalam tahap penyelidikan ada sejumlah keterangan-keterangan, dokumen-dokumen yang menyebut-nyebut dia, disitulah letak urgensinya kami memanggil dia,\" tegas Busyro.<br /><br /> <strong> (van/ndr)</strong></p>','e4a1f6bfbad8e47f01b2f588b25f237e.jpg','politik',0,2),
	(24,'2012-03-01 23:03:17','Purwandi','Tes MotoGP Sepang Stoner Kembali Jadi yang Tercepat','<p><strong>Sepang</strong> - Setelah absen di tes hari kedua, Casey Stoner kembali unjuk gigi di tes hari ketiga. Ia mengakhiri tes dengan catatan waktu tercepat seperti yang ia lakukan di hari pertama.<br /><br />Tes hari ketiga yang selesai pada Kamis (1/3/2012) pukul 18.00 waktu setempat itu sempat diwarnai jatuhnya Alvaro Bautista, Ben Spies, Jorge Lorenzo, dan Nicky Hayden. Namun keempatnya tidak mengalami masalah serius.<br /><br />Stoner yang melahap 34 lap mencatatkan waktu terbaik 2 menit 0,473 detik. Catatan itu lebih cepat1.288 detik lebih cepat daripada catatannya di hari pertama serta 0.812 detik lebih cepat dibandingkan raihan Spies yang tercepat di hari kedua kemarin.<br /><br />Posisi kedua ditempati rekan setim Stoner, Dani Pedrosa. Usai mengitari lintasan sebanyak 40 kali, Pedrosa mencatatkan waktu tercepat 2 menit 0,648 detik atau terpaut 0,175 detik dari Stoner.<br /><br />Andrea Dovizioso punya catatan tercepat ketiga dengan 2 menit 0,802 detik dari 54 lap. Sedangkan Lorenzo yang melakukan 51 putaran menempati urutan empat dengan catatan terbaik 2 menit 0,877 detik.<br /><br />Sementara itu, Valentino Rossi meraih catatan waktu yang lebih baik dibandingkan dua tes sebelumnya. Setelah mengitari lintasan sebanyak 57 kali, pebalap Ducati itu mencatatkan waktu terbaik 2 menit 1,550 detik. Meski demikian catatan itu hanya menempatkannya di urutan 10.<br /><br />Tes hari ini jadi yang terakhir di Sirkuit Sepang. Tes pramusim ketiga sekaligus yang terakhir akan dihelat di Jerez pada 23-25 Maret mendatang.<br /><br /><strong>Hasil Akhir Tes Sepang Hari III</strong><br /><br />Pos-Pebalap-Tim-Waktu-Lap<br />1. Casey Stoner AUS Repsol Honda 2m 0.473s (34)<br />2. Dani Pedrosa ESP Repsol Honda 2m 0.648s (40)<br />3. Andrea Dovizioso ITA Monster Yamaha Tech 3 2m 0.802s (54)<br />4. Jorge Lorenzo ESP Yamaha Factory Racing 2m 0.877s (51)<br />5. Cal Crutchlow GBR Monster Yamaha Tech 3 2m 0.986s (54)<br />6. Hector Barbera ESP Pramac Racing 2m 1.231s (66)<br />7. Alvaro Bautista ESP San Carlo Honda Gresini 2m 1.275s (51)<br />8. Ben Spies USA Yamaha Factory Racing 2m 1.432s (28)<br />9. Stefan Bradl GER LCR Honda 2m 1.492s (54)<br />10. Valentino Rossi ITA Ducati Team 2m 1.550s (57)<br />11. Nicky Hayden USA Ducati Team 2m 1.609s (44)<br />12. Franco Battaini ITA Ducati Test Rider 2m 3.490s (39)<br />13. Colin Edwards USA Forward Racing (Suter-BMW CRT) 2m 3.681s (43)<br />14. Yonny Hernndez COL Avintia (FTR-Kawasaki CRT) 2m 6.632s (48)<br />15. Ivan Silva ESP Avintia (FTR-Kawasaki CRT) 2m 6.785s (53)<br /><br /><br /> <strong> ( rin / din ) </strong></p>','4fe8b983a8c65a6669a35f6ea434fd14.jpg','olahraga',1,1),
	(25,'2012-03-01 23:03:11','Purwandi','Samsung Borong Gadget + Awards 2012 ','<p><strong>Jakarta</strong> - Tak cuma di luar negeri, Samsung ternyata juga turut berprestasi dalam acara penghargaan lokal Gadget+ Awards 2012. Tak tanggung-tanggung, ada 12 award yang diboyong vendor asal Korea Selatan itu.<br /><br />Mulai dari kategori smartphone, perangkat Android, monitor, kamera, notebook, ultrabook, dan lainnya. Tak lupa, sejumlah operator juga kebagian acara bagi-bagi penghargaan ini.<br /><br />Seiring perkembangan gadget dan teknologi komunikasi, kategori dalam penyelenggaraan yang kelima ini pun bertambah dibandingkan tahun lalu. Dimana pada gelaran kali ini tercatat ada 45 kategori yang dihadirkan.<br /><br />Berikut daftar para pemenang Gadget+ Awards 2012 di setiap&nbsp;kategori: <br /><br />- The Best GSM Provider - Telkomsel<br />- The Best Innovation GSM Provider - Indosat<br />- The Best Campaign GSM Provider - Indosat<br />- The Most Popular GSM Provider For Teens - Indosat<br />- The Best CDMA Provider - SmartFren<br />- The Best Innovation CDMA - SmartFren<br />- The Best Operator Advertising - XL Axiata<br />- The Most Breakthrough Provider - Axis<br />- The Best Accessories - Dacota/Case Mate<br />- The Best Innovation Product - SpeedUp<br />- The Best Messaging Platform - BlackBerry<br />- The Best Design Mobile Phone - Nokia<br />- The Best Smartphone Local Brand - Nexian<br />- The Best Tablet Local Brand - Tabulet<br />- The Best Notebook Local Brand - Axioo<br />- The Most Favourite Entertainment Portal - malesbanget<br />- The Best Tablet - Samsung<br />- The Best Local Tablet Apps - Wayang Force <br />- The Best Smartphone - Samsung<br />- The Best Android Device - Samsung<br />- The Best Innovation Android Device - Samsung <br />- The Most Favourite Mobile Advertiser - Samsung<br />- The Best DSLR Camera - Nikon <br />- The Best Pocket Camera - Canon<br />- The Best Innovation Camera - Samsung<br />- The Best Camcorder - Samsung<br />- The Best Notebook - Samsung <br />- The Best Ultrabook - Samsung <br />- The Best Monitor - Samsung <br />- The Best Gaming Monitor - BenQ<br />- The Best Projector - BenQ<br />- The Best Smart TV - Samsung<br />- The Best 3D TV - LG<br />- The Best Blue Ray Home Theater 3D - LG<br />- The Best Promo Bundling - XL Axiata<br />- The Best Gadget of The Dragon Year - Samsung<br />- The Best Marketer of The Year - Telkomsel<br />- The Best e-Commerce - www.blibli.com<br />- The Most Favourite Portal - Kaskus<br />- The Most Favourite News Portal - kompas<br />- The Most Favourite Community - Android Community<br />- The Most Favourite Local Mobile Apps - Bouncity<br />- The Most Favourite Local Game Developer - Agate<br />- The Most Favourite Local PC Game - Garuda Games Studio <br />- The Best Internet Banking - BCA<br /><br /><br /> <strong> ( rns / ash ) </strong></p>','ea873a74e4c30e8e6a5685531648aa67.jpg','internet',1,1),
	(26,'2012-03-01 23:03:05','Purwandi','Internet Unlimited Axis Diskon 50% di Megabazar 2012','<p>Axis akan memberikan kejutan menarik pada acara Megabazar 2012 di Jakarta dan Bandung, tanggal 29 Februari &ndash; 4 Maret 2012, melalui program &ldquo;Axis Mega Hemat&rdquo;. Setiap pengunjung Megabazar 2012 akan berkesempatan menikmati paket layanan internet unlimited AXIS dengan potongan harga 50%. Tidak ada syarat atau ketentuan rumit, pengunjung cukup datang ke booth Axis dan langsung dapat menikmati penawaran menarik ini.</p>\n<p>Daniel Horan, Chief Marketing Officer Axis mengatakan bahwa di Megabazar 2012 ini, Axis akan menghadirkan produk dan layanan yang lebih terjangkau lagi melalui program &lsquo;Axis Mega Hemat&rsquo; dimana semua produk dan layanan Axis ditawarkan dengan harga paling hemat.&nbsp; Salah satunya, layanan internet Axis Eksis dan Axis Pro yang dikenal dengan layanan internet unlimited dan harganya yang kompetitif, di Axis Mega Hemat ditawarkan dengan potongan harga 50%. &ldquo;Hanya di Axis Mega Hemat, pengunjung dapat menikmati layanan internet unlimited berkecepatan tinggi hingga 30 hari, hanya setengah harga,&rdquo; imbuh Daniel.</p>\n<p>&lsquo;Axis Mega Hemat&rsquo; di Megabazar 2012 menawarkan berbagai produk dan layanan data Axis yang berkualitas dengan harga yang lebih hemat, seperti paket layanan internet Axis Eksis selama 7 hari atau paket layanan internet unlimited Axis Pro selama 30 hari hanya dengan membayar setengah harga dari harga yang ditawarkan sebelumnya. Tidak ada syarat dan ketentuan tambahan, pengunjung dapat memperoleh penawaran ini di Axis booth selama penyelenggaraan Megabazar 2012, baik di Jakarta maupun di Bandung.</p>\n<p>Terdapat juga paket layanan internet unlimited yang dapat dinikmati selama seminggu penuh, hanya dengan membayar Rp100. Pelanggan cukup menunjukkan potongan iklan Axis Mega Hemat yang terdapat pada media masa nasional atau menunjukkan bukti pembelian ponsel Android selama penyelenggaraan pameran kepada petugas di booth Axis, membayar Rp100, dan langsung mendapat paket layanan internet unlimited Axis. Juga tersedia beragam paket bundling ponsel, smartphone, dan modem yang ditawarkan dengan harga paling hemat, mulai dari Rp99.000.</p>\n<p>Sebagai apresiasi bagi pelanggan, Axis menyiapkan 10 paket wisata ke Universal Studio Singapura untuk 10 pengunjung yang beruntung selama penyelenggaraan Megabazar 2012 di Jakarta dan Bandung. &ldquo;Tanpa syarat dan ketentuan rumit, semua pengunjung yang melakukan transaksi apapun di booth Axis, akan berkesempatan memenangkan hadiah liburan ini. Semua program yang ditawarkan ini memang ditujukan untuk kenyamanan dan kegembiraan pelanggan,&rdquo; pungkas Daniel.</p>','4ca96af2f3ddddbb953f23593a76b3ae.jpg','internet',1,1),
	(19,'2012-03-01 22:03:11','Purwandi','Wah, Twitter Jual Tweet Pengguna','<p><strong>Inggris</strong> - Twitter dilaporkan telah menjual \'kicauan\' lawas para penggunanya ke sebuah lembaga bernama DataSift. Tweet tersebut akan dikelola dan dijadikan bahan riset untuk para pengiklan.<br /><br />Hal tersebut dibeberkan oleh <em>dailymail </em>dan dikutip <strong>detikINET</strong>, Kamis (1/3/2012). Konon selain Datashift, ribuan perusahaan lainnya masuk dalam daftar antrian untuk membeli tweet lama tweeps.<br /><br />Meski belum ada konfirmasi dari Twitter, namun hal ini sudah diakui oleh Datasift, sebagai salah satu perusahaan penyedia data bagi para calon pengiklan. <br /><br />Twitter sendiri sedikitnya telah mengarsip sekitar 250 juta tweet yang beredar setiap harinya. <em>Nah, </em>untuk mengekstrak data yang sangat besar ini menjadi informasi bernilai, Datashift memiliki aplikasi khusus yang mereka sebut DataSift Historic.<br /><br /><em>Tools </em>tersebut mampu menampilkan informasi seputar opini publik, kondisi pasar, berita, bisnis hingga merek dan produk tertenu yang dipakai oleh pengguna Twitter. <br /><br />\"Sudah jelas. Jika Anda tidak membayar untuk memakai sebuah layanan, Anda bukanlah kosumen tapi Anda adalah produk,\" kata Nick Pickles, Director of Big Brother Watch Campaign Group, sebuah lembaga yang menjunjung tinggi privasi.<br /><br /><br /> <strong> ( eno / ash ) </strong></p>','063708ed78139acb688bc8ae8e3fb686.jpg','olahraga',1,1),
	(22,'2012-03-01 23:03:54','Purwandi','Dhana Akui Uang di Rekeningnya Jauh Lebih Kecil dari Rp 60 M','<p><strong>Jakarta </strong> Dhana Widyatmika, mantan pegawai Ditjen Pajak Kemenkeu yang menjadi tersangka kasus dugaan korupsi, tidak mengakui ada dana Rp 60 miliar di rekeningnya. Melalui kuasa hukumnya, Dhana mengaku dana yang ia punyai jauh lebih kecil dari yang selama ini diberitakan.<br /><br />\"Tidak ada dana sebesar itu. Jauh lebih kecil,\" terang kuasa hukum Dhana, Reza, kepada wartawan seusai pemeriksaan Dhana di Gedung Bundar Kejaksaan Agung, Jalan Sultan Hasanuddin, Jakarta Selatan, Kamis (1/3/2012).<br /><br />Namun, Reza enggan menyebutkan berapa dana sebenarnya yang ada di lima rekening Dhana yang kini sudah diblokir Kejagung itu. Dia juga menolak menyebutkan asal dana besar yang disebut-sebut ada di rekening Dhana. \"Itu sudah masuk substansi. Tadi (pemeriksaan) belum menyentuh ke situ,\" imbuhnya.<br /><br />Seperti diketahui Dhana telah dijadikan tersangka oleh Kejagung sejak 16 Februari 2012. Kejagung juga telah memohon kepada Imigrasi untuk mencekal Dhana ke luar negeri. Dan atas permintaan itu, per 21 Februari 2012 Imigrasi mencekal Dhana selama 6 bulan. Dhana dijerat dengan pasal 2, 3, dan 5 UU Tindak Pidana Korupsi. Kejagung masih terus meneliti kasus ini. <br /><br />Pemeriksaan hari ini merupakan pemeriksaan perdana bagi Dhana. Sebelum dijadikan tersangka, Dhana belum pernah diperiksa oleh penyidik Kejagung. <br /><br />Para koleganya, antara lain alumni STAN dan pegawai Ditjen Pajak, meragukan tuduhan Kejagung terhadap Dhana. Sebab, selama ini Dhana dikenal sebagai anak yang baik. Kalau Dhana memiliki uang banyak, itu karena sudah berbisnis sejak masa kuliah. Jadi, sejak kuliah, Dhana sudah dikenal sebagai orang kaya.<br /><br /><br /> <strong> (riz/asy)</strong></p>','8bf15b823b45adad617a0b4777ce7b61.jpg','politik',1,1);

/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table captcha
# ------------------------------------------------------------

DROP TABLE IF EXISTS `captcha`;

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `captcha` WRITE;
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`)
VALUES
	(44,1330620555,'127.0.0.1','HG7V');

/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `tipe`)
VALUES
	(1,'purwandi','123','Purwandi','Redaktur'),
	(2,'guntur','123','Guntur','Wartawan'),
	(4,'puspa','12345','Puspa Rahmadani Suyitno','Wartawan');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
