-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 29 Ağu 2017, 15:55:43
-- Sunucu sürümü: 5.5.57-cll
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ahmetma1_cv`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'ahmetmanga@gmail.com', '0bbe65ee5c292d0317433b115a30587a', 'Ahmet Manga'),
(2, 'ahmetmanga66@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Manga Ahmet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `unvan` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `title`, `description`, `keywords`, `name`, `unvan`) VALUES
(1, 'Ahmet Manga - AhmetManga.Net', 'Ahmet Manga Kişisel Sitesi', 'ahmet,manga,ahmet manga, ahmet manga kişisel, ahmet manga cv, php, kali linux,sızma testi, html5,css3, laravel, manga ahmet,ahmetmanga.net, ahmet manga cv, ahmet manga resume', 'Ahmet Manga', 'Öğrenci');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `id` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `text`) VALUES
(1, '<p><strong>21 Eyl&uuml;l 1997 de İstanbul da doğdum. Nihat Sami Banarlı İ.&Ouml;.O ve Mustafa Kemal Anadolu Lisesini&nbsp;bitirdim.</strong></p>\r\n\r\n<p><strong>2016 yılında Kocaeli &Uuml;niversitesi Bilgisayar M&uuml;hendisliğine başladım ve&nbsp;devam ediyorum.</strong></p>\r\n\r\n<p><strong>Web Yazılım ve Siber G&uuml;venlik ile ilgileniyorum.</strong></p>\r\n\r\n<p>Kullandığım programlar:<strong> Web i&ccedil;in PHP Storm ve Sublime Text 3, C# İ&ccedil;in Visual Studio 2015.</strong></p>\r\n\r\n<p><strong>Bildiğim programlama dilleri;</strong></p>\r\n\r\n<table align=\"left\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<caption>\r\n	<p style=\"text-align:left\">Bildiğim Diller</p>\r\n	</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\" style=\"text-align:left\">PHP</th>\r\n			<th scope=\"col\" style=\"text-align:left\">İyi</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>HTML5</strong></td>\r\n			<td><strong>İyi</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>CSS3</strong></td>\r\n			<td><strong>Orta</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>JavaScript</strong></td>\r\n			<td><strong>Orta</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>C#</strong></td>\r\n			<td><strong>Orta</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>C</strong></td>\r\n			<td><strong>İyi</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<caption>\r\n	<p style=\"text-align:left\">Yabancı Dil</p>\r\n	</caption>\r\n	<tbody>\r\n		<tr>\r\n			<th>&nbsp;</th>\r\n			<th>&nbsp;</th>\r\n			<th>Okuma</th>\r\n			<th>Yazma</th>\r\n			<th>Konuşma</th>\r\n			<th>&nbsp;</th>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>İngilizce</strong></td>\r\n			<td>&nbsp;</td>\r\n			<td>Orta</td>\r\n			<td>Orta</td>\r\n			<td>Temel</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(2, '<p><span style=\"color:#f39c12\"><span style=\"font-size:22px\"><strong>PHP</strong></span></span></p>\r\n\r\n<p><strong><span style=\"font-size:16px\">Laravel ile Alışveriş Sitesi</span></strong></p>\r\n\r\n<p><strong><span style=\"font-size:16px\">CodeIgniter ile Blog Sitesi</span></strong></p>\r\n\r\n<p><strong><span style=\"font-size:16px\">MVC Mimarisi ile CV Sitesi</span></strong></p>\r\n\r\n<p><span style=\"font-size:16px\">Yukarıdaki projelerde CSS i&ccedil;in Bootstrap 3 kullandım.</span></p>\r\n\r\n<p><span style=\"color:#e67e22\"><span style=\"font-size:20px\"><strong>C#</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Youtube &Ccedil;oklu Mp3 Mp4 İndirme Uygulaması</strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><strong>Sitedeki Mail Adreslerini&nbsp;Bulma ve Mail G&ouml;nderme Uygulaması</strong></span></p>\r\n'),
(3, 'kariyer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `isim` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `social`
--

INSERT INTO `social` (`id`, `isim`, `link`) VALUES
(1, 'facebook', 'https://www.facebook.com/mangaahmet2011'),
(2, 'twitter', 'https://twitter.com/AhmetManga5'),
(3, 'linkedin', 'https://www.linkedin.com/in/ahmet-manga-4b4290128/'),
(4, 'github', 'https://github.com/AhmetManga'),
(5, 'envelope', 'mailto:ahmetmanga@gmail.com'),
(6, 'stack-overflow', 'https://stackoverflow.com/users/8421157/ahmet-manga'),
(7, 'phone', 'tel:05364559538');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `olay` varchar(120) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icon` varchar(40) NOT NULL,
  `renk` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `timeline`
--

INSERT INTO `timeline` (`id`, `olay`, `tarih`, `icon`, `renk`) VALUES
(1, 'Kocaeli Üniversitesi Bilgisayar Mühendisliği', '2016-09-01', 'book', 'info'),
(2, 'Mustafa Kemal Anadolu Lisesi', '2015-06-01', 'graduation-cap', 'primary'),
(3, 'Web Teknolojileri ile İlgileniyor', '2017-08-29', 'chrome', 'warning'),
(4, 'Siber güvenlikle ilgileniyor', '2017-08-29', 'shield', 'danger');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
