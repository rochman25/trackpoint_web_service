-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 20 Feb 2019 pada 16.43
-- Versi Server: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trackpoint`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'yyz', 'yyzdabest'),
(2, 'zaenur', 'rochman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tiket`
--

CREATE TABLE `detail_tiket` (
  `idTiket` varchar(10) NOT NULL,
  `idWisata` int(3) NOT NULL,
  `ketentuan_tiket` text NOT NULL,
  `tiket_dewasa` double NOT NULL,
  `tiket_anak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_tiket`
--

INSERT INTO `detail_tiket` (`idTiket`, `idWisata`, `ketentuan_tiket`, `tiket_dewasa`, `tiket_anak`) VALUES
('TK122', 12, 'Kepentok nembe encer', 2000, 0),
('TK132', 13, 'addadasda', 50000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `idDriver` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`idDriver`, `username`, `nama_lengkap`, `alamat`, `email`, `nohp`, `password`) VALUES
(1, 'zaenur', 'rochman', 'kalisari', 'zaenur.rochman98@gmail.com', '081578988248', 'rochman25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `idfeedback` int(3) NOT NULL,
  `idWisata` int(3) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `idTraveller` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE `pengelola` (
  `idpengelola` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `password` text NOT NULL,
  `jk` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengelola`
--

INSERT INTO `pengelola` (`idpengelola`, `username`, `nama_lengkap`, `email`, `nohp`, `password`, `jk`, `alamat`) VALUES
(1, 'zaenur', 'ZaenurRochman', 'zaenur.rochman98@gmail.com', '081578988248', 'rochman25', '1', 'Desa Kalisari RT 07 / RW 02'),
(2, 'ztu', 'yeah its me', 'zaenur.rochman98@gmail.com', '081578988248', 'rochman5', '1', 'kalisari'),
(3, 'rochman', 'Zaenurrochman', 'zaenur.rochman98@gmail.com', '081578988248', 'amikom123', 'L', 'Cilongok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `responsefeedback`
--

CREATE TABLE `responsefeedback` (
  `idresponse` int(3) NOT NULL,
  `idfeedback` int(3) NOT NULL,
  `idpengelola` int(3) NOT NULL,
  `response` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `responsefeedback`
--

INSERT INTO `responsefeedback` (`idresponse`, `idfeedback`, `idpengelola`, `response`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'kalem euy', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickettransaction`
--

CREATE TABLE `tickettransaction` (
  `idTransaksi` int(3) NOT NULL,
  `idTraveller` int(3) NOT NULL,
  `idTiket` varchar(10) NOT NULL,
  `jumlah_tiketDewasa` int(3) NOT NULL,
  `jumlah_tiketAnak` int(3) NOT NULL,
  `total_harga` double NOT NULL,
  `status` varchar(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tickettransaction`
--

INSERT INTO `tickettransaction` (`idTransaksi`, `idTraveller`, `idTiket`, `jumlah_tiketDewasa`, `jumlah_tiketAnak`, `total_harga`, `status`, `tanggal_transaksi`, `tanggal_bayar`) VALUES
(1, 37, 'TK122', 5, 2, 0, '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `traveller`
--

CREATE TABLE `traveller` (
  `idTraveller` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `password` text NOT NULL,
  `checkpoint` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `traveller`
--

INSERT INTO `traveller` (`idTraveller`, `username`, `email`, `nohp`, `password`, `checkpoint`, `status`, `foto`) VALUES
(2, 'dapid', 'dapid.yanuar@gmail.com', '081215999174', 'dapidbaen', 0, 'Aktif', 'noImage.jpg'),
(4, 'rochman', 'rochman@gam.com', '0857639764', 'rochman', 0, 'Aktif', 'noImage.jpg'),
(5, 'yyz', 'yyz@gmail.com', '081578988248', 'yyzdabest', 0, 'Aktif', ''),
(6, 'roe', 'roe@gmail.com', '081578988248', 'roe', 0, 'Aktif', ''),
(10, 'yahya dani l', 'yahya@gmail.com', '08555524546', 'yahya', 0, 'Aktif', ''),
(11, 'yanuar arvians', 'yanuar.blue@gmail.com', '08121599174', '12345', 0, 'Aktif', ''),
(34, 'tjek', 'tjek@email.com', '081576425424', 'roe', 0, 'Belum Aktif', 'noImage.jpg'),
(35, 'blue', 'blue@gmail.com', '0852363636363', '1234', 0, 'Belum Aktif', 'noImage.jpg'),
(37, 'zaenurR', 'zaenur.rochman98@gmail.com', '081578988248', 'rochman25', 0, 'Aktif', 'noImage.jpg'),
(38, 'yanuar', 'devOp@gma.com', '081578988248', 'dev', 0, 'Aktif', ''),
(40, 'iyan', 'iyan@g.com', '0123456789101', '123', 0, 'Aktif', ''),
(41, '', '', '', '', 0, 'Belum Aktif', 'noImage.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `idWisata` int(3) NOT NULL,
  `nama_wisata` varchar(30) NOT NULL,
  `alamat_wisata` text NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `rating` float NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `idpengelola` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`idWisata`, `nama_wisata`, `alamat_wisata`, `deskripsi`, `kategori`, `status`, `foto`, `rating`, `latitude`, `longitude`, `idpengelola`) VALUES
(3, 'ubah', 'Hutan, Pasir, Ayah, Kebumen Regency, Central Java 54473', 'Pantai yang termasuk pantai selatan Pulau Jawa ini memiliki pemandangan yang aduhai. Di pantai ini terdapat tebing – tebing hijau nan indah. Selain itu juga terdapat karang dan bebatuan yang tersebar di sepanjang garis pantai. Pantai yang memiliki panjang kurang lebih 600 meter ini masih sangat asri dan relatif bersih. Bukan tanpa alasan, pengunjung yang masih sedikit juga membuat pantai ini masih tetap alami. Karena masih sepi, tentunya pantai ini sangat cocok bagi teman – teman yang membutuhkan suasana yang tenang damai dan alami. Selain itu, Pantai Surumanis Kebumen ini juga sangat fotogenik dan tentunya juga Instagramable, sehingga cocok bagi teman – teman yang hobi berfoto baik selfie , wefie, atau fotografi landscape. Jadi jangan lupa membawa perangkat fotografinya ya.', 'Pantai', 'Aktif', 'imgPantai_Suru_Manis21-07-18.jpg', 0, '', '', 1),
(4, 'Pantai Suwuk', 'Dusun Suwuk, Desa Tambakmulyo, Kecamatan Puring, Kabupaten Kebumen, Jawa Tengah.', 'merupakan sebuah pantai yang terletak di Dusun Suwuk, Desa Tambakmulyo, Kecamatan Puring, Kabupaten Kebumen, Jawa Tengah. Untuk menuju ke lokasi pantai ini, banyak jalur alternatif yang dapat digunakan. Pantai ini terletak 22 km sebelah selatan Kota Gombong dan dapat ditempuh sekitar 45 menit. Kemudian terletak sekitar 35 Km sebelah barat daya Kota Karanganyar dapat ditempuh lebih dari 1 Jam, dan terletak 50 Km dari pusat Kabupaten Kebumen maka dibutuhkan waktu sekitar satu setengah jam untuk menuju Pantai Suwuk. Bagi anda yang berasal dari arah timur yang kebetulan sedang melintasi jalan selatan-selatan atau jalan Daendels dari arah timur seperti Daerah Istimewa Yogyakarta maupun dari arah barat atau Kabupaten Cilacap dapat langsung lurus menuju Pantai Suwuk.', 'Pantai', 'Aktif', 'imgPantai_Suwuk21-07-18.jpg', 0, '', '', 1),
(8, 'Tranggulasih', 'Windujaya, Kedungbanteng, Windujaya, Kabupaten Banyumas, Jawa Tengah 53152', 'Masih terletak di kaki gunung slamet, di bukit ini udara terasa asri dan sangat sejuk. Dari bukit ini Anda bisa melihat kota Purwokerto dari ketinggian, tidak hanya Purwokerto, bahkan Purbalingga dan Pemalang pun terlihat dari atas bukit ini. Sungguh, pemandangan yang sangat menakjubkan.\r\n\r\nDari lokasi parkir, membutuhkan waktu untuk memanjat ke bagian atas bukit, tetapi tenang saja tidak terlalu jauh hanya sekitar 200m, tergantung lokasi mana yang akan kita singgahi. Ada 4 Bukit utama di kawasan ini yakni bukit Datar, bukit Cinta Suramenggala, bukit Tinggi, dan bukit Tranggulasih itu sendiri.\r\n\r\nTidak tahu pasti dari mana bukit-bukit itu diberi nama demikian, bahkan asal mula penemuan bukit ini sendiri juga masih simpang siur. Kami mendengar dari penduduk sekitar, dulunya di tempat ini banyak offroader atau crosser (para hobi motor cross atau trail) memacu adrenaline mereka dengan menyusuri bukit ini. Memang terbukti  dengan adanya beberapa jejak ban motor cross yang kami temui di kawasan ini.\r\n\r\nEntah benar atau tidaknya tidak terlalu penting, karena kawasan ini benar-benar tercipta dari alam yang merupakan tempat umum dan sangat menakjubkan. Jadi menetapkan siapa penemunya pun tidaklah terlalu penting.', 'Bukit', 'Aktif', 'imgTranggulasih21-07-18.JPG', 0, '', '', 1),
(10, 'Pantai sodong', 'Hutan, Pasir, Ayah, Kebumen Regency, Central Java 54473', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit ametloren ipsum dolor sit amet', 'Pantai', 'Aktif', 'imgPantai_sodong21-07-18.jpg', 0, '', '', 1),
(11, 'Tranggulasih', 'Dusun Suwuk, Desa Tambakmulyo, Kecamatan Puring, Kabupaten Kebumen, Jawa Tengah.', '/home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint /home/intermed/intermediaamikom.org/TrackPoint&nbsp;', 'Pantai', 'aktif', 'imgTranggulasih_21-07-18.JPG', 0, '', '', NULL),
(12, 'Curug Cipendok ', 'Cilongok', 'Curug Cipendok terletak di Desa Karangtengah,Kecamatan<a target=\"_blank\" rel=\"nofollow\" href=\"https://id.wikipedia.org/wiki/Cilongok,_Banyumas\">&nbsp;</a>Cilongok, Kabupaten Banyumas. Lokasi air terjun ini cukup mudah untuk dicapai. Jalan menuju lokasi sudah diaspal semua. Sampai lokasi parkir, kemudian harus berjalan menuju lokasi air terjun. Di jalan menuju lokasi, banyak warung yang menjajakan Mendoan, susu murni yang bisa ditemukan di warung-warung rumah penduduk. Perkebunan tomat, cabai dan seledri cukup menarik dinimati dalam perjalanan menuju lokasi. Belum lagi sungai-sungai kecil denga air jernih mengalir, bisa mengundang untuk turun sejenak merasakan sejuk dan jernihnya air pegunungan. Bila hari besar seperti libur lebaran, lokasi ini cukup ramai dikunjungi setiap tahunnya.', 'Adventure', 'Aktif', 'imgCurug_Cipendok_23-07-18.jpg', 0, '', '', 2),
(13, 'Gunung Slamet', 'Jalur pendakian standar adalah dari Blambangan, Desa Kutabawa, Kecamatan Karangreja, Purbalingga. Jalur populer lain adalah dari Baturraden dan dari Desa Gambuhan, Desa Jurangmangu dan Desa Gunungsari di Kabupaten Pemalang. ', '<span>Sebagaimana gunung api lainnya di Pulau Jawa, Gunung Slamet terbentuk akibat subduksi&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://id.wikipedia.org/wiki/Lempeng_Indo-Australia\">Lempeng Indo-Australia</a>&nbsp;pada&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://id.wikipedia.org/wiki/Lempeng_Eurasia\">Lempeng Eurasia</a>&nbsp;di selatan Pulau Jawa. Retakan pada lempeng membuka jalur lava ke permukaan. Catatan letusan diketahui sejak abad ke-19. Gunung ini aktif dan sering mengalami erupsi skala kecil. Aktivitas terakhir adalah pada bulan Mei 2009 dan sampai Juni masih terus mengeluarkan lava pijar.<a target=\"_blank\" rel=\"nofollow\" href=\"https://id.wikipedia.org/wiki/Gunung_Slamet#cite_note-1\">[1]</a>&nbsp;Sebelumnya ia tercatat meletus pada tahun 1999.</span><span>Maret 2014 Gunung Slamet menunjukkan aktifitas dan statusnya menjadi Waspada. Berdasarkan data PVMBG, aktivitas vukanik Gunung Slamet masih fluktuatif. Setelah sempat terjadi gempa letusan hingga 171 kali pada Jumat 14 Maret 2014 dari pukul 00.00-12.00 WIB, pada durasi waktu yang sama, tercatat sebanyak 57 kali gempa letusan. Tercatat pula 51 kali embusan. Pemantauan visual, embusan asap putih tebal masih keluar dari kawah gunung ke arah timur hingga setinggi 1&nbsp;km.<a target=\"_blank\" rel=\"nofollow\" href=\"https://id.wikipedia.org/wiki/Gunung_Slamet#cite_note-2\">[2]</a></span>', 'Adventure', 'Aktif', 'imgGunung_Slamet23-07-18.jpg', 0, '', '', 2),
(14, 'Pancuran 7', 'Baturaden', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet v', 'Adventure', 'aktif', 'imgPancuran_7_28-07-18.jpg', 0, '', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_tiket`
--
ALTER TABLE `detail_tiket`
  ADD PRIMARY KEY (`idTiket`),
  ADD KEY `fk_detailTiket` (`idWisata`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`idDriver`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`idfeedback`),
  ADD KEY `feedback_idTraveller_fk` (`idTraveller`),
  ADD KEY `feedback_idWisata_fk` (`idWisata`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`idpengelola`);

--
-- Indexes for table `responsefeedback`
--
ALTER TABLE `responsefeedback`
  ADD PRIMARY KEY (`idresponse`),
  ADD KEY `fk_feedback` (`idfeedback`),
  ADD KEY `responsefeedback_idpengelola_fk` (`idpengelola`);

--
-- Indexes for table `tickettransaction`
--
ALTER TABLE `tickettransaction`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `tickettransaction_idTraveller_fk` (`idTraveller`),
  ADD KEY `fk_ticketTr` (`idTiket`);

--
-- Indexes for table `traveller`
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`idTraveller`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`idWisata`),
  ADD KEY `wisata_idpengelola_fk` (`idpengelola`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `idDriver` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `idfeedback` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `idpengelola` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `responsefeedback`
--
ALTER TABLE `responsefeedback`
  MODIFY `idresponse` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tickettransaction`
--
ALTER TABLE `tickettransaction`
  MODIFY `idTransaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `traveller`
--
ALTER TABLE `traveller`
  MODIFY `idTraveller` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `idWisata` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_tiket`
--
ALTER TABLE `detail_tiket`
  ADD CONSTRAINT `fk_detailTiket` FOREIGN KEY (`idWisata`) REFERENCES `wisata` (`idWisata`);

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_idTraveller_fk` FOREIGN KEY (`idTraveller`) REFERENCES `traveller` (`idTraveller`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_idWisata_fk` FOREIGN KEY (`idWisata`) REFERENCES `wisata` (`idWisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `responsefeedback`
--
ALTER TABLE `responsefeedback`
  ADD CONSTRAINT `responsefeedback_idpengelola_fk` FOREIGN KEY (`idpengelola`) REFERENCES `pengelola` (`idpengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tickettransaction`
--
ALTER TABLE `tickettransaction`
  ADD CONSTRAINT `fk_ticketTr` FOREIGN KEY (`idTiket`) REFERENCES `detail_tiket` (`idTiket`),
  ADD CONSTRAINT `tickettransaction_idTraveller_fk` FOREIGN KEY (`idTraveller`) REFERENCES `traveller` (`idTraveller`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_idpengelola_fk` FOREIGN KEY (`idpengelola`) REFERENCES `pengelola` (`idpengelola`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
