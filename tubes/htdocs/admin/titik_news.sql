-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Jun 2023 pada 10.24
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `titik_news`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'berita_terpopuler'),
(2, 'latest_news'),
(3, 'rekomendasi_untuk_anda'),
(4, 'world');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `kategori_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `tittle`, `content`, `link`, `gambar`, `waktu`, `tanggal`, `kategori_id`) VALUES
(14, 'Pendapat Sekda DKI soal Formula E Jakarta Digelar Malam ', 'Sekretaris Daerah atau Sekda DKI, Joko Agus Setyono buka suara soal kemungkinan Formula E Jakarta 2024 digelar malam hari. Menurut dia, itu akan membutuhkan tambahan dana untuk pencahayaan di lintasan. ', 'https://oto.detik.com/otosport/d-6756595/pendapat-sekda-dki-soal-formula-e-jakarta-digelar-malam', '648598a4e0fbd.jpeg', '16:49:24', '2023-06-11', 1),
(15, 'Jemaah, Hati-hati di Masjidil Haram Jangan Sembarangan Ambil Barang', 'Ada beberapa hal yang perlu diperhatikan jemaah ketika sedang beribadah di Mekkah. Panitia Penyelenggara Ibadah Haji (PPIH) Mekkah mengungkap beberapa diantaranya beserta dengan antisipasinya.', 'https://www.detik.com/hikmah/haji-dan-umrah/d-6756903/jemaah-hati-hati-di-masjidil-haram-jangan-sembarangan-ambil-barang', '648598ce9d3c2.jpeg', '16:50:06', '2023-06-11', 1),
(16, 'Breaking News: Lionel Messi Ingin Kembali ke Barcelona  ', 'Barcelona - Jorge Messi sudah bertemu Presiden Barcelona, Juan Laporta. Ayah Lionel Messi itu menyebut anaknya ingin kembali ke Blaugrana. Hal itu diungkap jurnalis Spanyol, Toni Juanmarti, yang merekam pertemuan kedua pihak. Jorge menyebut Lionel Messi ingin kembali ke Camp Nou ', 'https://sport.detik.com/sepakbola/liga-spanyol/d-6756819/breaking-news-lionel-messi-ingin-kembali-ke-barcelona', '648598f1d8533.jpeg', '16:50:41', '2023-06-11', 1),
(17, 'Bareskrim Bakal Tetapkan Dito Mahendra', 'Dito Mahendra telah ditetapkan sebagai tersangka atas kepemilikan senjata api ilegal. Sebagian dari senjata yang ditemukan di rumah Dito Mahendra statusnya tidak berizin atau ilegal.', 'https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok', '6485993052ec6.jpeg', '16:51:44', '2023-06-11', 2),
(18, 'KPK Periksa 3 saksi', 'KPK Periksa 3 saksi pihak swasta dikasus gratifikasi rafael alun, ketiga saksi yang diperiksa masing-masing bernama hirawati, jennawati, Thio Ida. Para saksi memiliki latar belakang dari pihak swasta.', 'https://news.detik.com/berita/d-6700000/kpk-periksa-3-saksi-pihak-swasta-di-kasus-gratifikasi-rafael-alun', '6485996ced90b.jpeg', '16:52:44', '2023-06-11', 2),
(19, 'Dua Wali kota bandung dalam pusaran kasus korupsi', 'Wali kota Bandung Yana Mulyana ditetapkan menjadi tersangka dugaan suap proyek Bandung Smart City. Yana menambah daftar orang nomor satu dikota kembang yang ditangkap KPK.', 'https://www.detik.com/jabar/hukum-dan-kriminal/d-6675983/dua-wali-kota-bandung-dalam-pusaran-kasus-korupsi', '6485998b628d1.jpeg', '16:53:15', '2023-06-11', 2),
(20, 'Tak ada Damai! Catherine Wilson Mau Pelaku Pencurian di rumahnya jera', 'Catherine Wilson menegaskan tak mau berdamai kepada pencuri uang dollar dan peralatan YouTubenya. Ia ingin kasus ini tetap dijalankan sebagaimana mestinya. Tidak ada damai untuk kasus ini ia ingin pencuri yang merupakan penjaga rumahnya jera karena melanggar pidana.', 'https://hot.detik.com/celeb/d-6699563/tak-ada-damai-catherine-wilson-mau-pelaku-pencurian-di-rumahnya-jera', '648599a8c0685.jpeg', '16:53:44', '2023-06-11', 2),
(21, 'Selain di Lapangan, Maguire disebut akan merepotkan MU di bursa transfer nanti.', 'Harry Maguire lebih banyak mengundang kritik sejak bergabung dengan Manchester United, Bek tengah itu di perkirakan akan merepotkan di bursa transfer nanti.', 'https://sport.detik.com/sepakbola/liga-inggris/d-6699844/selain-di-lapangan-maguire-disebut-akan-ngerepotin-mu-di-bursa-transfer', '648599c72b143.jpeg', '16:54:15', '2023-06-11', 2),
(22, 'Disney rilis soundtrack The Little Mermaid versi Halle Bailey', 'Part of Your World pertama kali dirilis pada 1989 untuk soundtrack fil animasi THE LITTLE MERMAID. Lagu ini ditulis liriknya oleh Howard Ashman dengan komposisi yang digubah Alan Menken.', 'https://hot.detik.com/music/d-6692272/disney-rilis-soundtrack-the-little-mermaid-versi-halle-bailey', '648599fd538b8.jpeg', '16:55:09', '2023-06-11', 4),
(23, 'Adik tiri sebut hubungan Meghan Markle Harry Toksik dan tak sehat', 'Rumah tangga Meghan Markle dan Pangeran Harry kembali diusik. kini iparnya yang merupakna saudari tiri Meghan Markle yaitu Samantha Markle meceritakan aib meraka.', 'https://hot.detik.com/celeb/d-6694514/adik-tiri-sebut-hubungan-meghan-markle-harry-toksik-dan-tak-sehat', '64859a229c444.jpeg', '16:55:46', '2023-06-11', 4),
(24, 'Met Gala 2023: Stars gather for event celebrating Karl Lagerfeld\r\n', 'The fashion world has gathered in New York City for the annual Met Gala once again - this year themed on the late fashion icon Karl Lagerfeld.', 'https://www.bbc.com/news/world-us-canada-65452442', 'met gala', '00:00:00', '2023-06-11', 4),
(25, 'Commentary: Singapore may not be able to outbid the big players, but it has its own ‘secret recipe’', 'SINGAPORE: At his first outing as keynote speaker at the National Trades Union Congress (NTUC) May Day Rally on Monday (May 1), Deputy Prime Minister and prime minister-in-waiting Lawrence Wong issued.', 'https://www.channelnewsasia.com/commentary/lawrence-wong-may-day-rally-2023-political-compact-tripartism-leadership-transition-3457156', 'singapore', '00:00:00', '2023-06-11', 4),
(26, 'Google AI pioneer says he quit to speak freely about technology\'s \'dangers\'', 'A pioneer of artificial intelligence said he quit Google to speak freely about the technology\'s dangers, after realising that computers could become smarter than people far sooner than he and other experts had expected.', 'https://www.channelnewsasia.com/business/google-ai-pioneer-says-he-quit-speak-freely-about-technologys-dangers-3458896', 'artificial', '00:00:00', '2023-06-11', 4),
(27, 'Hollywood strike: Screenwriters will walk out for first time in 15 years', 'Thousands of Hollywood TV and movie screenwriters will strike on Tuesday, after last minute talks with major studios over wages broke down. A Writers Guild of America (WGA) strike, the first in 15 years.', 'https://www.bbc.com/news/entertainment-arts-65447046\r\n', 'hollywood', '00:00:00', '2023-06-11', 4),
(28, 'LeBron James vs. Steph Curry: Old rivalries reignite as LA Lakers face Golden State Warriors', 'From that very day, the journeys of two of basketball’s all-time greats have been forever intertwined. Now the matchup that dominated basketball in the late 2010s is back again for round five, as the pair square off in the Western Conference semifinals.', 'https://edition.cnn.com/2023/05/02/sport/lebron-james-steph-curry-lakers-warriors-spt-intl/index.html', '64859c9eced66.jpeg', '17:06:22', '2023-06-11', 3),
(29, 'BBC chairman resigns after controversy involving loan deal for former PM Boris Johnson', 'The embattled chairman of the British Broadcasting Corporaration (BBC), Richard Sharp, resigned on Friday after a report found he failed to disclose his involvement in facilitating a loan of almost $1 million to former British Prime Minister Boris Johnson.', 'https://edition.cnn.com/2023/04/28/media/bbc-sharp-resigns-intl-gbr/index.html', '64859cbb0fb13.jpg', '17:06:51', '2023-06-11', 3),
(30, 'LeBron James vs. Steph Curry: Old rivalries reignite as LA Lakers face Golden State Warriors\r\n', 'From that very day, the journeys of two of basketball’s all-time greats have been forever intertwined. Now the matchup that dominated basketball in the late 2010s is back again for round five, as the pair square off in the Western Conference semifinals.', 'https://edition.cnn.com/2023/05/02/sport/lebron-james-steph-curry-lakers-warriors-spt-intl/index.html\r\n', 'basket', '00:00:00', '2023-06-11', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `nama`, `email`, `password`, `role`) VALUES
(13, 'admin', 'aldi pradan hakim', 'aldipradanahakim@gmail.com', '$2y$10$StIHyv9exqvZldnYozOYtOrNBMdAF.lkSvaO3/bkc9OOCzeEahlqS', 'admin'),
(19, 'tono', 'tono', 'tono@gmail.com', '$2y$10$tgD09JkEsvCTvyYh5NJaZeHVjRVZCzb149bNWVMrzRqg0N2SII/Xe', 'user'),
(23, 'mahesaaa', 'mahesaa putra', 'mahesa@gmail.com', '$2y$10$7cx9wieXBVmdf3mBz6avberoBTE7lTQ36cRDyBILaFlHRphbJjZWm', 'user'),
(24, 'coba', 'coba', 'coba2@mail.unpas.ac.id', '$2y$10$rVVf7zhW4UDbx71jMoTMg.UMJoYqkgU6Ou2sErhYClUX.yp1QF9LO', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
