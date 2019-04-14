-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mar 2019 pada 08.46
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magister_kebencanaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksesibilitas_data`
--

CREATE TABLE `aksesibilitas_data` (
  `id` int(11) NOT NULL,
  `jenis_data_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aksesibilitas_data`
--

INSERT INTO `aksesibilitas_data` (`id`, `jenis_data_id`, `created_at`, `updated_at`) VALUES
(4, 5, '2018-06-04 23:01:26', '2018-06-04 23:01:26'),
(6, 11, '2018-06-04 23:02:22', '2018-06-04 23:02:22'),
(9, 2, '2018-06-04 23:32:31', '2018-06-04 23:32:31'),
(10, 8, '2018-06-05 22:20:51', '2018-06-05 22:20:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_data`
--

CREATE TABLE `akses_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `aksesibilitas_data_id` int(11) NOT NULL,
  `sistem_pengolahan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `akses_data`
--

INSERT INTO `akses_data` (`id`, `aksesibilitas_data_id`, `sistem_pengolahan_id`) VALUES
(3, 4, 2),
(4, 4, 3),
(7, 6, 2),
(8, 6, 3),
(9, 6, 4),
(18, 9, 1),
(19, 9, 2),
(20, 9, 3),
(21, 9, 4),
(22, 10, 2),
(23, 10, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_dosen`
--

CREATE TABLE `aktivitas_dosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `sks_ps_sendiri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks_ps_lain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks_ps_ptLain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks_pengabdian_masyarakat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks_manajemen_ptSendiri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks_manajemen_ptLain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aktivitas_dosen`
--

INSERT INTO `aktivitas_dosen` (`id`, `dosen_id`, `sks_ps_sendiri`, `sks_ps_lain`, `sks_ps_ptLain`, `sks_penelitian`, `sks_pengabdian_masyarakat`, `sks_manajemen_ptSendiri`, `sks_manajemen_ptLain`, `created_at`, `updated_at`) VALUES
(1, 10, '13', '13', '21', '13', '13', '13', '13', '2018-04-19 00:49:00', '2018-04-22 19:35:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alokasi_dana`
--

CREATE TABLE `alokasi_dana` (
  `id` int(10) UNSIGNED NOT NULL,
  `sumber_dana_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `jenis_dana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alokasi_dana`
--

INSERT INTO `alokasi_dana` (`id`, `sumber_dana_id`, `tahun`, `jenis_dana`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '1', 2016, 'Biaya Pribadi', 1000000, '2018-06-08 07:54:44', '2018-06-08 07:54:44'),
(2, '1', 2017, 'Biaya Pribadi', 2000000, '2018-06-08 07:56:03', '2018-06-08 07:56:03'),
(3, '1', 2018, 'Biaya Pribadi', 3000000, '2018-06-08 07:56:12', '2018-06-08 07:56:12'),
(4, '1', 2017, 'Biaya Orang Tua', 5000000, '2018-06-08 08:21:01', '2018-06-08 09:16:28'),
(5, '6', 2017, 'BIDIK MISI', 500000, '2018-06-08 08:51:06', '2018-07-16 07:28:38'),
(7, '5', 2017, 'cdcadfA', 34222, '2018-06-08 08:52:53', '2018-06-08 08:52:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_tesis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lulus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi_kerja_terakhir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`id`, `nama`, `judul_tesis`, `tahun_lulus`, `instansi_kerja_terakhir`, `created_at`, `updated_at`) VALUES
(1, 'Yunaldi', 'wwww', '2013', 'Lorem', '2018-05-24 20:33:12', '2018-05-24 21:23:50'),
(2, 'rrrrr', 'wwww', '2001', 'Ipsum', '2018-05-24 20:43:15', '2018-05-24 20:43:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `pendidikan_tertinggi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_akademik_id` int(191) NOT NULL,
  `pembimbing_sbg_ketua` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembimbing_sbg_anggota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id`, `dosen_id`, `pendidikan_tertinggi`, `jabatan_akademik_id`, `pembimbing_sbg_ketua`, `pembimbing_sbg_anggota`, `created_at`, `updated_at`) VALUES
(6, 11, '3', 1, '14', '15', '2018-04-18 02:18:10', '2018-04-18 02:35:08'),
(7, 10, '3', 3, '17', '16', '2018-04-18 02:28:39', '2018-04-18 02:28:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosens`
--

CREATE TABLE `dosens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan_akademik_id` int(191) NOT NULL,
  `gelar_akademik_s1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_pt_s1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_keahlian_s1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelar_akademik_s2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_pt_s2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_keahlian_s2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_akademik_s3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_pt_s3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_keahlian_s3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `sertifikasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_penelitian`
--

CREATE TABLE `dosen_penelitian` (
  `id` int(10) UNSIGNED NOT NULL,
  `penelitian_id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_publikasi`
--

CREATE TABLE `dosen_publikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `publikasi_id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_lanjutan`
--

CREATE TABLE `evaluasi_lanjutan` (
  `id` int(11) NOT NULL,
  `waktu_tunggu` varchar(255) DEFAULT NULL,
  `persentase` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi_lulusan`
--

CREATE TABLE `evaluasi_lulusan` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_kemampuan_id` int(191) DEFAULT NULL,
  `sangat_baik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cukup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kurang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelacakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_akademik`
--

CREATE TABLE `jabatan_akademik` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan_akademik`
--

INSERT INTO `jabatan_akademik` (`id`, `nama`) VALUES
(1, 'Guru Besar'),
(2, 'Lektor Kepala'),
(3, 'Lektor'),
(4, 'Assisten Ahli ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_data`
--

CREATE TABLE `jenis_data` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_data`
--

INSERT INTO `jenis_data` (`id`, `jenis`) VALUES
(1, 'Mahasiswa'),
(2, 'Kartu Rencana Studi'),
(3, 'Jadwal Mata Kuliah'),
(4, 'Transkrip Akademik'),
(5, 'Nilai Akademik'),
(6, 'Lulusan'),
(7, 'Dosen'),
(8, 'Pegawai'),
(9, 'Keuangan'),
(10, 'Inventaris'),
(11, 'Perpustakaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kemampuan`
--

CREATE TABLE `jenis_kemampuan` (
  `id` int(11) NOT NULL,
  `jenis_kemampuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kemampuan`
--

INSERT INTO `jenis_kemampuan` (`id`, `jenis_kemampuan`) VALUES
(1, 'Intgritas(etika dan moral)'),
(2, 'Keahlian berdasarkan bidang ilmu(profesionalisme)'),
(3, 'Keluasan wawasan antar disiplin ilmu'),
(4, 'Kepemimpinan'),
(5, 'Kerjasama dalam tim'),
(6, 'Bahasa asing'),
(7, 'Komunikasi'),
(8, 'Penggunaan teknologi'),
(9, 'Pengembangan diri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pustaka`
--

CREATE TABLE `jenis_pustaka` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pustaka`
--

INSERT INTO `jenis_pustaka` (`id`, `jenis`) VALUES
(1, 'Buku Teks'),
(2, 'Jurnal Nasional yang Terakreditasi'),
(3, 'Jurnal Internsional yang nomornya lengkap'),
(4, 'Jurnal Internsional yang nomornya tidak lengkap'),
(5, 'Prosiding'),
(6, 'Tesis'),
(7, 'Disertasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_staff`
--

CREATE TABLE `jenis_staff` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_staff`
--

INSERT INTO `jenis_staff` (`id`, `jenis`) VALUES
(1, 'Pustakawan'),
(2, 'Laboran/Teknisi/Analis/Operator/Programmer'),
(3, 'Administrasi'),
(4, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_seminar`
--

CREATE TABLE `kegiatan_seminar` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan_seminar`
--

INSERT INTO `kegiatan_seminar` (`id`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Seminar Ilmiah', NULL, NULL),
(2, 'Lokakarya', NULL, NULL),
(3, 'Penataran/Pelatihan', NULL, NULL),
(4, 'Workshop', NULL, NULL),
(5, 'Pagelaran', NULL, NULL),
(6, 'Pameran', NULL, NULL),
(7, 'Peragaan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelengkapan`
--

CREATE TABLE `kelengkapan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelengkapan`
--

INSERT INTO `kelengkapan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Deskripsi', NULL, NULL),
(2, 'Silabus', NULL, NULL),
(3, 'SAP', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelengkapan_mtkuliah`
--

CREATE TABLE `kelengkapan_mtkuliah` (
  `id` int(10) UNSIGNED NOT NULL,
  `struktur_kurikulum_id` int(10) UNSIGNED NOT NULL,
  `kelengkapan_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_s1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi_kerja_terakhir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `asal_s1`, `instansi_kerja_terakhir`, `created_at`, `updated_at`) VALUES
(1, 'Lorem', 'Lorem Ipsum', 'Lorem', '2018-04-24 20:21:50', '2018-04-24 21:30:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_dan_dana`
--

CREATE TABLE `mhs_dan_dana` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_akademik` int(11) NOT NULL,
  `jumlah_mahasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_dana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mhs_dan_dana`
--

INSERT INTO `mhs_dan_dana` (`id`, `tahun_akademik`, `jumlah_mahasiswa`, `jumlah_dana`, `created_at`, `updated_at`) VALUES
(1, 2018, '233', '20000', '2018-05-02 01:43:31', '2018-05-02 01:43:31'),
(2, 2017, '25', '40000', '2018-05-02 01:43:51', '2018-05-02 02:35:58'),
(3, 2016, '39', '40000', '2018-05-02 02:35:35', '2018-05-02 02:35:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_dan_lulusan`
--

CREATE TABLE `mhs_dan_lulusan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_akademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daya_tampung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ikut_seleksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lulus_seleksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mhsbr_bukan_transfer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mhsbr_transfer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mhs_bknTransfer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_mhs_transfer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lulusan_bkn_transfer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lulusan_transfer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipk_reg_min` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipk_reg_rat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipk_reg_mak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_mahasiswa_wna` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mhs_dan_lulusan`
--

INSERT INTO `mhs_dan_lulusan` (`id`, `tahun_akademik`, `daya_tampung`, `ikut_seleksi`, `lulus_seleksi`, `mhsbr_bukan_transfer`, `mhsbr_transfer`, `total_mhs_bknTransfer`, `total_mhs_transfer`, `lulusan_bkn_transfer`, `lulusan_transfer`, `ipk_reg_min`, `ipk_reg_rat`, `ipk_reg_mak`, `jumlah_mahasiswa_wna`, `created_at`, `updated_at`) VALUES
(1, '2018', '4', '4', '4', '4', '4', '4', '4', '4', '4', '3.24', '3.4', '4.00', '4', '2018-04-27 02:35:24', '2018-05-07 21:48:21'),
(14, '2016', '70', '56', '61', '77', '80', '44', '36', '88', '25', '4.0', '4.0', '4.0', '71', '2018-04-30 01:46:18', '2018-05-08 21:18:17'),
(16, '2015', '66', '45', '43', '56', '23', '67', '66', '90', '89', '3.4', '3.6', '3.7', '25', '2018-05-08 21:17:11', '2018-05-08 21:17:11'),
(19, '2014', '11', '11', '11', '11', '11', '11', '11', '11', '11', '3.7', '3.4', '3.1', '11', '2018-05-09 03:23:10', '2018-05-10 19:50:46'),
(20, '2017', '44', '33', '21', '12', '22', '13', '45', '11', '67', '3.4', '3.3', '3.5', '33', '2018-05-10 19:49:44', '2018-05-10 19:49:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_16_043011_create_dosens_table', 1),
(4, '2018_03_21_015737_tingkat_table', 2),
(5, '2018_03_21_041108_create_prestasi_Dosen_table', 3),
(6, '2018_03_21_045149_add_column_to_prestasi_dosens_table', 4),
(7, '2018_03_22_055609_create_pengalaman_table', 5),
(8, '2018_03_23_015920_create_seminar_role_table', 6),
(9, '2018_03_23_020713_create_kegiatan_seminar_table', 7),
(10, '2018_03_23_030502_create_seminar_dosen_table', 8),
(11, '2018_04_02_031344_create_publikasi_table', 9),
(12, '2018_04_02_072449_create_dosen_publikasi_table', 10),
(13, '2018_04_04_035832_create_penelitian_table', 11),
(14, '2018_04_04_072825_create_sumber_dana_table', 12),
(15, '2018_04_05_083730_create_dosen_penelitian_table', 13),
(16, '2018_04_12_034807_create_bimbingan_table', 14),
(17, '2018_04_12_050413_add_timestamp_to_bimbingan', 15),
(18, '2018_04_19_043417_create_aktivitas_dosen_table', 16),
(19, '2018_04_23_033546_create_tugas_belajar_table', 17),
(20, '2018_04_23_074112_add_timestampt_to_tugas_belajar_table', 18),
(21, '2018_04_25_025037_create_mahasiswa_table', 19),
(22, '2018_04_26_031857_create_penelitian_mahasiswa_table', 20),
(23, '2018_04_27_030839_create_mhs_dan_lulusan_table', 21),
(24, '2018_05_02_030509_create_mahasiswa_dan_dana_table', 22),
(25, '2018_05_04_024017_create_evaluasi_lulusan_table', 23),
(26, '2018_05_11_082209_create_struktur_kurikulum_table', 24),
(27, '2018_05_25_023111_create_alumni_table', 24),
(28, '2018_05_25_073643_create_kelengkapan_mtKuliah_table', 25),
(29, '2018_05_25_081207_create_kelengkapan_struktur_table', 26),
(30, '2018_05_30_072018_create_mk_pilihan_table', 27),
(31, '2018_05_31_023212_create_sks_minimum_table', 28),
(32, '2018_05_31_072951_create_staff_table', 29),
(34, '2018_06_05_044456_create_akses_jenis_table', 30),
(36, '2018_06_06_031702_alokasi_dana_table', 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mk_pilihan`
--

CREATE TABLE `mk_pilihan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_sks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_penyelenggara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian`
--

CREATE TABLE `penelitian` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_penelitian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana_id` int(191) NOT NULL,
  `jumlah_dana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_mahasiswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mhs_terkait` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mhs_tdk_terkait` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penelitian`
--

INSERT INTO `penelitian` (`id`, `judul`, `tahun_penelitian`, `sumber_dana_id`, `jumlah_dana`, `jumlah_mahasiswa`, `mhs_terkait`, `mhs_tdk_terkait`, `created_at`, `updated_at`) VALUES
(9, 'leeroy', '2018', 3, '4666', '14', '3', '2', '2018-04-17 22:19:30', '2018-04-17 22:19:30'),
(11, 'buduman', '2016', 2, '40000', '16', '6', '7', '2018-04-17 22:22:02', '2018-05-11 01:52:49'),
(13, 'tttwtw', '2018', 5, '40000', '17', '5', '12', '2018-05-11 01:16:28', '2018-05-11 01:16:28'),
(14, 'rrrrdd', '2016', 2, '300000', '16', '8', '8', '2018-05-11 01:52:09', '2018-05-11 01:52:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian_mahasiswa`
--

CREATE TABLE `penelitian_mahasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahasiswa_id` int(191) DEFAULT NULL,
  `judul_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penelitian_mahasiswa`
--

INSERT INTO `penelitian_mahasiswa` (`id`, `mahasiswa_id`, `judul_penelitian`, `tahun_penelitian`, `created_at`, `updated_at`) VALUES
(2, 1, 'iihihhi', '2008', '2018-04-25 21:39:53', '2018-04-26 01:14:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengabdian_masyarakat`
--

CREATE TABLE `pengabdian_masyarakat` (
  `id` int(11) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sumber_dana_id` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengabdian_masyarakat`
--

INSERT INTO `pengabdian_masyarakat` (`id`, `tahun`, `nama`, `sumber_dana_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '2018', 'buduman', '1', '300000', '2018-06-02 15:43:15', '2018-06-02 08:43:15'),
(2, '2018', 'jojo', '3', '40000', '2018-06-02 15:43:20', '2018-06-02 08:43:20'),
(3, '2016', 'cccc', '5', '20000', '2018-06-02 15:43:35', '2018-06-02 08:43:35'),
(5, '2017', 'deruman', '3', '300000', '2018-06-02 15:43:42', '2018-06-02 08:43:42'),
(6, '2017', 'jojo', '4', '40000', '2018-06-02 08:44:58', '2018-06-02 08:44:58'),
(7, '2016', 'trrrs', '2', '20000', '2018-06-02 08:45:17', '2018-06-02 08:45:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalamans`
--

CREATE TABLE `pengalamans` (
  `id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `lembaga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_awal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_akhir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengalamans`
--

INSERT INTO `pengalamans` (`id`, `dosen_id`, `lembaga`, `tahun_awal`, `tahun_akhir`, `tingkat_id`, `created_at`, `updated_at`) VALUES
(3, 10, 'LP3I', '2012', '2016', 2, '2018-04-17 21:47:20', '2018-04-17 21:47:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi_dosens`
--

CREATE TABLE `prestasi_dosens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_prestasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_pencapaian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_id` int(191) NOT NULL,
  `dosen_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasi_dosens`
--

INSERT INTO `prestasi_dosens` (`id`, `nama_prestasi`, `tahun_pencapaian`, `tingkat_id`, `dosen_id`, `created_at`, `updated_at`) VALUES
(5, 'Jogging', '2014', 1, 11, '2018-04-17 21:35:16', '2018-04-17 21:35:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `publikasi`
--

CREATE TABLE `publikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_publikasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lembaga_sitasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `publikasi`
--

INSERT INTO `publikasi` (`id`, `judul`, `tempat_publikasi`, `tahun`, `lembaga_sitasi`, `tingkat_id`, `created_at`, `updated_at`) VALUES
(1, 'ttt', 'ret', '777', 'Erlangga', 3, '2018-04-30 01:47:33', '2018-06-19 00:18:24'),
(2, 'xxxxx', 'ret', '566', 'Erlangga', 1, '2018-06-19 00:18:12', '2018-06-19 00:18:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pustaka`
--

CREATE TABLE `pustaka` (
  `id` int(11) NOT NULL,
  `jenis_pustaka_id` int(11) NOT NULL,
  `jumlah_judul` int(11) NOT NULL,
  `jumlah_copy` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pustaka`
--

INSERT INTO `pustaka` (`id`, `jenis_pustaka_id`, `jumlah_judul`, `jumlah_copy`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 4, '2018-06-04 06:52:17', '2018-06-03 23:52:17'),
(2, 4, 4, 4, '2018-06-03 23:47:31', '2018-06-03 23:47:31'),
(3, 7, 1, 1, '2018-06-03 23:47:52', '2018-06-03 23:47:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id`, `tipe`) VALUES
(1, 'satu ruang lebih dari 4 dosen'),
(2, 'satu ruang untuk 3-4 dosen'),
(3, 'satu ruang untuk 2 dosen'),
(4, 'satu untuk 1 dosen(bukan pejabat struktural)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_kerja`
--

CREATE TABLE `ruang_kerja` (
  `id` int(11) NOT NULL,
  `ruang_id` int(11) DEFAULT NULL,
  `jumlah_ruang` int(11) DEFAULT NULL,
  `luas` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang_kerja`
--

INSERT INTO `ruang_kerja` (`id`, `ruang_id`, `jumlah_ruang`, `luas`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1000, '2018-06-03 00:04:11', '2018-06-03 00:04:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_dosen`
--

CREATE TABLE `seminar_dosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `kegiatan_seminar_id` int(11) DEFAULT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seminar_role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `seminar_dosen`
--

INSERT INTO `seminar_dosen` (`id`, `dosen_id`, `kegiatan_seminar_id`, `tempat`, `tahun`, `seminar_role_id`, `created_at`, `updated_at`) VALUES
(4, 10, 5, 'Unsyiah', '2002', '2', '2018-04-17 21:51:13', '2018-04-23 02:03:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_role`
--

CREATE TABLE `seminar_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `seminar_role`
--

INSERT INTO `seminar_role` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Penyaji', NULL, NULL),
(2, 'Peserta', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sistem_pengolahan`
--

CREATE TABLE `sistem_pengolahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sistem_pengolahan`
--

INSERT INTO `sistem_pengolahan` (`id`, `nama`) VALUES
(1, 'Manual'),
(2, 'Komputer Tanpa Jaringan'),
(3, 'Komputer Dengan Jaringan Lokal(LAN)'),
(4, 'Komputer Dengan Jaringan Luas(WAN)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sks_minimal`
--

CREATE TABLE `sks_minimal` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sks_minimal`
--

INSERT INTO `sks_minimal` (`id`, `jenis_mk`, `sks`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Pilihan', '23', 'eeee', '2018-05-30 20:18:13', '2018-05-30 20:18:13'),
(3, 'Wajib', '25', 'rrrr', '2018-05-30 20:32:53', '2018-05-31 00:54:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_staff_id` int(191) DEFAULT NULL,
  `jumlah_s1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah_s2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah_s3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah_d4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah_d3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah_d2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah_d1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jumlah_sma` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `unit_kerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id`, `jenis_staff_id`, `jumlah_s1`, `jumlah_s2`, `jumlah_s3`, `jumlah_d4`, `jumlah_d3`, `jumlah_d2`, `jumlah_d1`, `jumlah_sma`, `unit_kerja`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '3', '0', '0', '0', '0', '0', '1', 'ttt', '2018-06-01 03:13:14', '2018-06-01 08:27:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_kurikulum`
--

CREATE TABLE `struktur_kurikulum` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_sks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inti` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_tugas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_penyelenggara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isPilihan` int(11) DEFAULT '0',
  `deskripsi_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sap_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `silabus_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_sumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sumber_dana`
--

INSERT INTO `sumber_dana` (`id`, `nama_sumber`, `created_at`, `updated_at`) VALUES
(1, 'Pembiayaan Sendiri ', NULL, NULL),
(2, 'PT Yang bersangkutan', NULL, NULL),
(3, 'Depdiknas', NULL, NULL),
(4, 'Institusi Dalam Negeri Selain Depdiknas', NULL, NULL),
(5, 'Institusi Luar Negeri', NULL, NULL),
(6, 'Mahasiswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_ahli`
--

CREATE TABLE `tenaga_ahli` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tenaga_ahli`
--

INSERT INTO `tenaga_ahli` (`id`, `nama`, `judul_kegiatan`, `tahun`, `created_at`, `updated_at`) VALUES
(2, 'Fadil', 'daddd', 2002, '2018-06-02 05:02:18', '2018-06-01 22:02:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE `tingkat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Lokal', '2018-03-21 02:00:00', NULL),
(2, 'Nasional', '2018-03-21 02:00:00', NULL),
(3, 'Internasional', '2018-03-21 02:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas_belajar`
--

CREATE TABLE `tugas_belajar` (
  `id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `jenjang_pendidikan_lanjut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_studi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perguruan_tinggi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mulai_studi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas_belajar`
--

INSERT INTO `tugas_belajar` (`id`, `dosen_id`, `jenjang_pendidikan_lanjut`, `bidang_studi`, `perguruan_tinggi`, `negara`, `tahun_mulai_studi`, `created_at`, `updated_at`) VALUES
(2, 10, '3', 'Telematika', 'Unsyiah', 'American Samoa', '2001', '2018-04-23 00:57:29', '2018-04-23 00:57:29'),
(4, 16, '3', 'Telematika', 'Unsyiah', 'Afghanistan', '2013', '2018-04-25 19:07:38', '2018-04-25 19:09:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'administrator', 'simik@gmail.com', '$2y$10$xxvaw3YKaT.Dkr83jtGbiuJZNls1id1iyQrRLL3uIH1VHGFz5F.N.', 'lEbxKMNR5JU8oQx0NZvR4YJntaaoebZWdWqVp98vQlfk979FOkylVO05fSlj', '2018-11-07 00:35:02', '2018-11-07 00:35:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksesibilitas_data`
--
ALTER TABLE `aksesibilitas_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akses_data`
--
ALTER TABLE `akses_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akses_data_aksesibilitas_data_id_foreign` (`aksesibilitas_data_id`),
  ADD KEY `akses_data_sistem_pengolahan_id_foreign` (`sistem_pengolahan_id`);

--
-- Indexes for table `aktivitas_dosen`
--
ALTER TABLE `aktivitas_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alokasi_dana`
--
ALTER TABLE `alokasi_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen_penelitian`
--
ALTER TABLE `dosen_penelitian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_penelitian_penelitian_id_foreign` (`penelitian_id`),
  ADD KEY `dosen_penelitian_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `dosen_publikasi`
--
ALTER TABLE `dosen_publikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_publikasi_publikasi_id_foreign` (`publikasi_id`),
  ADD KEY `dosen_publikasi_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `evaluasi_lanjutan`
--
ALTER TABLE `evaluasi_lanjutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasi_lulusan`
--
ALTER TABLE `evaluasi_lulusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan_akademik`
--
ALTER TABLE `jabatan_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_data`
--
ALTER TABLE `jenis_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kemampuan`
--
ALTER TABLE `jenis_kemampuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pustaka`
--
ALTER TABLE `jenis_pustaka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_staff`
--
ALTER TABLE `jenis_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_seminar`
--
ALTER TABLE `kegiatan_seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelengkapan_mtkuliah`
--
ALTER TABLE `kelengkapan_mtkuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelengkapan_mtkuliah_struktur_kurikulum_id_foreign` (`struktur_kurikulum_id`),
  ADD KEY `kelengkapan_mtkuliah_kelengkapan_id_foreign` (`kelengkapan_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs_dan_dana`
--
ALTER TABLE `mhs_dan_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs_dan_lulusan`
--
ALTER TABLE `mhs_dan_lulusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_pilihan`
--
ALTER TABLE `mk_pilihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penelitian_mahasiswa`
--
ALTER TABLE `penelitian_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengalamans`
--
ALTER TABLE `pengalamans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi_dosens`
--
ALTER TABLE `prestasi_dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pustaka`
--
ALTER TABLE `pustaka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang_kerja`
--
ALTER TABLE `ruang_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar_dosen`
--
ALTER TABLE `seminar_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar_role`
--
ALTER TABLE `seminar_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sistem_pengolahan`
--
ALTER TABLE `sistem_pengolahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sks_minimal`
--
ALTER TABLE `sks_minimal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_kurikulum`
--
ALTER TABLE `struktur_kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenaga_ahli`
--
ALTER TABLE `tenaga_ahli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_belajar`
--
ALTER TABLE `tugas_belajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aksesibilitas_data`
--
ALTER TABLE `aksesibilitas_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `akses_data`
--
ALTER TABLE `akses_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `aktivitas_dosen`
--
ALTER TABLE `aktivitas_dosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alokasi_dana`
--
ALTER TABLE `alokasi_dana`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen_penelitian`
--
ALTER TABLE `dosen_penelitian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen_publikasi`
--
ALTER TABLE `dosen_publikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evaluasi_lanjutan`
--
ALTER TABLE `evaluasi_lanjutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evaluasi_lulusan`
--
ALTER TABLE `evaluasi_lulusan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jabatan_akademik`
--
ALTER TABLE `jabatan_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_data`
--
ALTER TABLE `jenis_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jenis_kemampuan`
--
ALTER TABLE `jenis_kemampuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jenis_pustaka`
--
ALTER TABLE `jenis_pustaka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jenis_staff`
--
ALTER TABLE `jenis_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kegiatan_seminar`
--
ALTER TABLE `kegiatan_seminar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kelengkapan`
--
ALTER TABLE `kelengkapan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelengkapan_mtkuliah`
--
ALTER TABLE `kelengkapan_mtkuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mhs_dan_dana`
--
ALTER TABLE `mhs_dan_dana`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mhs_dan_lulusan`
--
ALTER TABLE `mhs_dan_lulusan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `mk_pilihan`
--
ALTER TABLE `mk_pilihan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `penelitian_mahasiswa`
--
ALTER TABLE `penelitian_mahasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengalamans`
--
ALTER TABLE `pengalamans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prestasi_dosens`
--
ALTER TABLE `prestasi_dosens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pustaka`
--
ALTER TABLE `pustaka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ruang_kerja`
--
ALTER TABLE `ruang_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seminar_dosen`
--
ALTER TABLE `seminar_dosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seminar_role`
--
ALTER TABLE `seminar_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sistem_pengolahan`
--
ALTER TABLE `sistem_pengolahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sks_minimal`
--
ALTER TABLE `sks_minimal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `struktur_kurikulum`
--
ALTER TABLE `struktur_kurikulum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tenaga_ahli`
--
ALTER TABLE `tenaga_ahli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tugas_belajar`
--
ALTER TABLE `tugas_belajar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akses_data`
--
ALTER TABLE `akses_data`
  ADD CONSTRAINT `akses_data_aksesibilitas_data_id_foreign` FOREIGN KEY (`aksesibilitas_data_id`) REFERENCES `aksesibilitas_data` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `akses_data_sistem_pengolahan_id_foreign` FOREIGN KEY (`sistem_pengolahan_id`) REFERENCES `sistem_pengolahan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen_penelitian`
--
ALTER TABLE `dosen_penelitian`
  ADD CONSTRAINT `dosen_penelitian_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_penelitian_penelitian_id_foreign` FOREIGN KEY (`penelitian_id`) REFERENCES `penelitian` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dosen_publikasi`
--
ALTER TABLE `dosen_publikasi`
  ADD CONSTRAINT `dosen_publikasi_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosen_publikasi_publikasi_id_foreign` FOREIGN KEY (`publikasi_id`) REFERENCES `publikasi` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelengkapan_mtkuliah`
--
ALTER TABLE `kelengkapan_mtkuliah`
  ADD CONSTRAINT `kelengkapan_mtkuliah_kelengkapan_id_foreign` FOREIGN KEY (`kelengkapan_id`) REFERENCES `kelengkapan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelengkapan_mtkuliah_struktur_kurikulum_id_foreign` FOREIGN KEY (`struktur_kurikulum_id`) REFERENCES `struktur_kurikulum` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
