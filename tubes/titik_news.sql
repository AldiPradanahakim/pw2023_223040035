-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2023 at 12:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `berita_terpopuler`
--

CREATE TABLE `berita_terpopuler` (
  `popular_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita_terpopuler`
--

INSERT INTO `berita_terpopuler` (`popular_id`, `title`, `content`, `link`, `gambar`, `waktu`, `tanggal`) VALUES
(4, 'Pendapat Sekda DKI soal Formula E Jakarta Digelar Malam ', 'Sekretaris Daerah atau Sekda DKI, Joko Agus Setyono buka suara soal kemungkinan Formula E Jakarta 2024 digelar malam hari. Menurut dia, itu akan membutuhkan tambahan dana untuk pencahayaan di lintasan. ', 'https://oto.detik.com/otosport/d-6756595/pendapat-sekda-dki-soal-formula-e-jakarta-digelar-malam', '647e111132096.jpeg', '23:45:05', '2023-06-05'),
(5, 'Jemaah, Hati-hati di Masjidil Haram Jangan Sembarangan Ambil Barang', 'Ada beberapa hal yang perlu diperhatikan jemaah ketika sedang beribadah di Mekkah. Panitia Penyelenggara Ibadah Haji (PPIH) Mekkah mengungkap beberapa diantaranya beserta dengan antisipasinya.', 'https://www.detik.com/hikmah/haji-dan-umrah/d-6756903/jemaah-hati-hati-di-masjidil-haram-jangan-sembarangan-ambil-barang', '647e11a7d759a.jpeg', '23:47:35', '2023-06-05'),
(6, 'Breaking News: Lionel Messi Ingin Kembali ke Barcelona  ', 'Barcelona - Jorge Messi sudah bertemu Presiden Barcelona, Juan Laporta. Ayah Lionel Messi itu menyebut anaknya ingin kembali ke Blaugrana. Hal itu diungkap jurnalis Spanyol, Toni Juanmarti, yang merekam pertemuan kedua pihak. Jorge menyebut Lionel Messi ingin kembali ke Camp Nou ', 'https://sport.detik.com/sepakbola/liga-spanyol/d-6756819/breaking-news-lionel-messi-ingin-kembali-ke-barcelona', '647e120cd8149.jpeg', '23:49:16', '2023-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `news_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `link` varchar(200) DEFAULT NULL,
  `gambar` varchar(250) NOT NULL,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`news_id`, `title`, `content`, `link`, `gambar`, `waktu`, `tanggal`) VALUES
(12, 'Bareskrim Bakal Tetapkan Dito Mahendra', 'Dito Mahendra telah ditetapkan sebagai tersangka atas kepemilikan senjata api ilegal. Sebagian dari senjata yang ditemukan di rumah Dito Mahendra statusnya tidak berizin atau ilegal.', 'https://news.detik.com/berita/d-6698145/bareskrim-bakal-tetapkan-dito-mahendra-dpo-jika-mangkir-pemeriksaan-besok', 'bareskrim_dito.jpeg', NULL, NULL),
(13, 'KPK Periksa 3 saksi', 'KPK Periksa 3 saksi pihak swasta dikasus gratifikasi rafael alun, ketiga saksi yang diperiksa masing-masing bernama hirawati, jennawati, Thio Ida. Para saksi memiliki latar belakang dari pihak swasta.', 'https://news.detik.com/berita/d-6700000/kpk-periksa-3-saksi-pihak-swasta-di-kasus-gratifikasi-rafael-alun', 'kpk.jpeg', NULL, NULL),
(14, 'Dua Wali kota bandung dalam pusaran kasus korupsi', 'Wali kota Bandung Yana Mulyana ditetapkan menjadi tersangka dugaan suap proyek Bandung Smart City. Yana menambah daftar orang nomor satu dikota kembang yang ditangkap KPK.', 'https://www.detik.com/jabar/hukum-dan-kriminal/d-6675983/dua-wali-kota-bandung-dalam-pusaran-kasus-korupsi', 'yana_mulyana.jpeg', NULL, NULL),
(15, 'Tak ada Damai! Catherine Wilson Mau Pelaku Pencurian di rumahnya jera', 'Catherine Wilson menegaskan tak mau berdamai kepada pencuri uang dollar dan peralatan YouTubenya. Ia ingin kasus ini tetap dijalankan sebagaimana mestinya. Tidak ada damai untuk kasus ini ia ingin pencuri yang merupakan penjaga rumahnya jera karena melanggar pidana.', 'https://hot.detik.com/celeb/d-6699563/tak-ada-damai-catherine-wilson-mau-pelaku-pencurian-di-rumahnya-jera', 'catherine-wilson.jpeg', NULL, NULL),
(16, 'Selain di Lapangan, Maguire disebut akan merepotkan MU di bursa transfer nanti.', 'Harry Maguire lebih banyak mengundang kritik sejak bergabung dengan Manchester United, Bek tengah itu di perkirakan akan merepotkan di bursa transfer nanti.', 'https://sport.detik.com/sepakbola/liga-inggris/d-6699844/selain-di-lapangan-maguire-disebut-akan-ngerepotin-mu-di-bursa-transfer', 'maguire.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_untuk_anda`
--

CREATE TABLE `rekomendasi_untuk_anda` (
  `recommendation_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `link` varchar(200) DEFAULT NULL,
  `gambar` varchar(250) NOT NULL,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rekomendasi_untuk_anda`
--

INSERT INTO `rekomendasi_untuk_anda` (`recommendation_id`, `title`, `content`, `link`, `gambar`, `waktu`, `tanggal`) VALUES
(2, 'LeBron James vs. Steph Curry: Old rivalries reignite as LA Lakers face Golden State Warriors', 'From that very day, the journeys of two of basketball’s all-time greats have been forever intertwined. Now the matchup that dominated basketball in the late 2010s is back again for round five, as the pair square off in the Western Conference semifinals.', 'https://edition.cnn.com/2023/05/02/sport/lebron-james-steph-curry-lakers-warriors-spt-intl/index.html', 'basket', NULL, NULL),
(3, 'Ed Sheeran says allegations in copyright infringement trial are ‘really insulting’', 'Musician Ed Sheeran appeared visibly frustrated on the stand Monday as he continued his testimony in the second week of his copyright infringement case about whether his smash single “Thinking Out Loud” copied the classic Marvin Gaye song “Let’s Get It On.”', 'https://edition.cnn.com/2023/05/01/media/ed-sheeran-trial-week-two/index.html', 'ed-sheeran.jpeg', NULL, NULL),
(4, 'BBC chairman resigns after controversy involving loan deal for former PM Boris Johnson', 'The embattled chairman of the British Broadcasting Corporaration (BBC), Richard Sharp, resigned on Friday after a report found he failed to disclose his involvement in facilitating a loan of almost $1 million to former British Prime Minister Boris Johnson.', 'https://edition.cnn.com/2023/04/28/media/bbc-sharp-resigns-intl-gbr/index.html', 'bbc.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `nama`, `email`, `password`, `role`) VALUES
(13, 'admin', 'aldi pradan hakim', 'aldipradanahakim@gmail.com', '$2y$10$StIHyv9exqvZldnYozOYtOrNBMdAF.lkSvaO3/bkc9OOCzeEahlqS', 'admin'),
(19, 'tono', 'tono', 'tono@gmail.com', '$2y$10$tgD09JkEsvCTvyYh5NJaZeHVjRVZCzb149bNWVMrzRqg0N2SII/Xe', 'user'),
(23, 'mahesaaa', 'mahesaa putra', 'mahesa@gmail.com', '$2y$10$7cx9wieXBVmdf3mBz6avberoBTE7lTQ36cRDyBILaFlHRphbJjZWm', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `world`
--

CREATE TABLE `world` (
  `world_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `link` varchar(200) DEFAULT NULL,
  `gambar` varchar(250) NOT NULL,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `world`
--

INSERT INTO `world` (`world_id`, `title`, `content`, `link`, `gambar`, `waktu`, `tanggal`) VALUES
(10, 'Disney rilis soundtrack The Little Mermaid versi Halle Bailey', 'Part of Your World pertama kali dirilis pada 1989 untuk soundtrack fil animasi THE LITTLE MERMAID. Lagu ini ditulis liriknya oleh Howard Ashman dengan komposisi yang digubah Alan Menken.', 'https://hot.detik.com/music/d-6692272/disney-rilis-soundtrack-the-little-mermaid-versi-halle-bailey', 'disney.jpeg', NULL, NULL),
(11, 'Adik tiri sebut hubungan Meghan Markle Harry Toksik dan tak sehat', 'Rumah tangga Meghan Markle dan Pangeran Harry kembali diusik. kini iparnya yang merupakna saudari tiri Meghan Markle yaitu Samantha Markle meceritakan aib meraka.', 'https://hot.detik.com/celeb/d-6694514/adik-tiri-sebut-hubungan-meghan-markle-harry-toksik-dan-tak-sehat', 'pangeran-harry-dan-meghan-markle.jpeg', NULL, NULL),
(12, 'Met Gala 2023: Stars gather for event celebrating Karl Lagerfeld', 'The fashion world has gathered in New York City for the annual Met Gala once again - this year themed on the late fashion icon Karl Lagerfeld.', 'https://www.bbc.com/news/world-us-canada-65452442', 'met gala', NULL, NULL),
(13, 'Commentary: Singapore may not be able to outbid the big players, but it has its own ‘secret recipe’', 'SINGAPORE: At his first outing as keynote speaker at the National Trades Union Congress (NTUC) May Day Rally on Monday (May 1), Deputy Prime Minister and prime minister-in-waiting Lawrence Wong issued.', 'https://www.channelnewsasia.com/commentary/lawrence-wong-may-day-rally-2023-political-compact-tripartism-leadership-transition-3457156', 'singapore', NULL, NULL),
(14, 'Google AI pioneer says he quit to speak freely about technology\'s \'dangers\'', 'A pioneer of artificial intelligence said he quit Google to speak freely about the technology\'s dangers, after realising that computers could become smarter than people far sooner than he and other experts had expected.', 'https://www.channelnewsasia.com/business/google-ai-pioneer-says-he-quit-speak-freely-about-technologys-dangers-3458896', 'artificial', NULL, NULL),
(15, 'Hollywood strike: Screenwriters will walk out for first time in 15 years', 'Thousands of Hollywood TV and movie screenwriters will strike on Tuesday, after last minute talks with major studios over wages broke down. A Writers Guild of America (WGA) strike, the first in 15 years.', 'https://www.bbc.com/news/entertainment-arts-65447046', 'hollywood', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_terpopuler`
--
ALTER TABLE `berita_terpopuler`
  ADD PRIMARY KEY (`popular_id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `rekomendasi_untuk_anda`
--
ALTER TABLE `rekomendasi_untuk_anda`
  ADD PRIMARY KEY (`recommendation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `world`
--
ALTER TABLE `world`
  ADD PRIMARY KEY (`world_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_terpopuler`
--
ALTER TABLE `berita_terpopuler`
  MODIFY `popular_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rekomendasi_untuk_anda`
--
ALTER TABLE `rekomendasi_untuk_anda`
  MODIFY `recommendation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `world`
--
ALTER TABLE `world`
  MODIFY `world_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
