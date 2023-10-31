-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 10:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevotingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'caster', '$2y$10$NZHwtJQnzymBXOkJt65jP.2sweBbii8a52iQfLmVMyf7uI45P0nl6', 'SYSTEM ADMINISTRATOR', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `position` tinyint(4) NOT NULL,
  `election` tinyint(4) NOT NULL,
  `platform` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `image`, `fname`, `lname`, `mname`, `suffix`, `position`, `election`, `platform`, `created_at`, `updated_at`) VALUES
(1, '1698145541.png', 'Caster Troy', 'Ventura', 'Bril', NULL, 1, 1, '<p><strong>Student Affordability and Tuition Freeze Now&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with&nbsp;<em>Tuition Freeze Now&nbsp;</em>campaign to freeze, and eventually reduce, tuition costs.\r\n\r\n	<ul>\r\n		<li>&nbsp;For every $100 less in tuition, we save SFU students $3,000,000 a year&nbsp;collectively</li>\r\n	</ul>\r\n	</li>\r\n	<li>Keep pushing the provincial and federal governments to&nbsp;<strong>replace loans with grants&nbsp;</strong></li>\r\n	<li><strong>Push for a 2% cap on international&nbsp;</strong>student&nbsp;<strong>tuition&nbsp;</strong>increases across BC&nbsp;</li>\r\n	<li>Work with faculty and professors to move towards&nbsp;<strong>Open Education Resources&nbsp;</strong>(OERs)&nbsp;</li>\r\n	<li><strong>Triple the SFSS Bursary&nbsp;</strong>(from $10,000 to $30,000)&nbsp;</li>\r\n</ul>', '2023-10-24 11:05:41', '2023-10-24 11:05:41'),
(2, '1698145833.png', 'Aldrine', 'Villaflor', NULL, NULL, 1, 1, '<p><strong>Student Affordability and Tuition Freeze Now&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with&nbsp;<em>Tuition Freeze Now&nbsp;</em>campaign to freeze, and eventually reduce, tuition costs.\r\n\r\n	<ul>\r\n		<li>&nbsp;For every $100 less in tuition, we save SFU students $3,000,000 a year&nbsp;collectively</li>\r\n	</ul>\r\n	</li>\r\n	<li>Keep pushing the provincial and federal governments to&nbsp;<strong>replace loans with grants&nbsp;</strong></li>\r\n	<li><strong>Push for a 2% cap on international&nbsp;</strong>student&nbsp;<strong>tuition&nbsp;</strong>increases across BC&nbsp;</li>\r\n	<li>Work with faculty and professors to move towards&nbsp;<strong>Open Education Resources&nbsp;</strong>(OERs)&nbsp;</li>\r\n	<li><strong>Triple the SFSS Bursary&nbsp;</strong>(from $10,000 to $30,000)&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Rebuilding relationship with the Rotunda Community&nbsp;</strong></p>\r\n\r\n<p>The Rotunda groups (SOCA, SFPIRG, CJSF radio, and Embark) finally have a space to call home within the new Student Union Building. I will:&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Follow through&nbsp;</strong>with housing Rotunda Groups in the SUB this mandate&nbsp;</li>\r\n	<li>Support&nbsp;<strong>equity-seeking initiatives&nbsp;</strong>that Rotunda groups support&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Lobbying SFU to divest from Fossil Fuels and help rebuild climate activism on campus&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with student groups such as SFU350 to&nbsp;<strong>strengthen student advocacy&nbsp;</strong>to have SFU divest the endowment from fossil fuels&nbsp;</li>\r\n	<li>Ensure the SFSS&rsquo;s Investment Policy does not include fossil fuels&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Open and Accessible Governance&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Tracking votes as each board member should be able to&nbsp;<strong>defend and answer for their decisions&nbsp;</strong></li>\r\n	<li>Live Streaming meetings to make them&nbsp;<strong>more accessible and open&nbsp;</strong>for students&nbsp;</li>\r\n	<li>Semesterly &ldquo;<strong>State of the Society&rdquo;&nbsp;</strong>Town Halls&nbsp;</li>\r\n	<li><strong>Empower Council&nbsp;</strong>to keep cheques and balances on board&nbsp;\r\n	<ul>\r\n		<li>Giving Council oversight powers&nbsp;</li>\r\n		<li>Formalize training for new Council representatives&nbsp;</li>\r\n		<li>Bylaw reform &ndash; looking into how we can allocate more power to Council&nbsp;</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>SFU students deserve a student society that is willing to work with them, and for them.&nbsp;<strong>We do not have to settle for mediocrity any longer.&nbsp;</strong></p>\r\n\r\n<p><strong>Long live student power!&nbsp;</strong></p>\r\n\r\n<p>Please remember to vote on March 17-19 through SFU email! #LongLiveStudentPower&nbsp;</p>', '2023-10-24 11:10:33', '2023-10-24 11:10:33'),
(3, '1698145852.png', 'Royeth', 'Roman', NULL, NULL, 1, 1, '<p><strong>Student Affordability and Tuition Freeze Now&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with&nbsp;<em>Tuition Freeze Now&nbsp;</em>campaign to freeze, and eventually reduce, tuition costs.\r\n\r\n	<ul>\r\n		<li>&nbsp;For every $100 less in tuition, we save SFU students $3,000,000 a year&nbsp;collectively</li>\r\n	</ul>\r\n	</li>\r\n	<li>Keep pushing the provincial and federal governments to&nbsp;<strong>replace loans with grants&nbsp;</strong></li>\r\n	<li><strong>Push for a 2% cap on international&nbsp;</strong>student&nbsp;<strong>tuition&nbsp;</strong>increases across BC&nbsp;</li>\r\n	<li>Work with faculty and professors to move towards&nbsp;<strong>Open Education Resources&nbsp;</strong>(OERs)&nbsp;</li>\r\n	<li><strong>Triple the SFSS Bursary&nbsp;</strong>(from $10,000 to $30,000)&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Rebuilding relationship with the Rotunda Community&nbsp;</strong></p>\r\n\r\n<p>The Rotunda groups (SOCA, SFPIRG, CJSF radio, and Embark) finally have a space to call home within the new Student Union Building. I will:&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Follow through&nbsp;</strong>with housing Rotunda Groups in the SUB this mandate&nbsp;</li>\r\n	<li>Support&nbsp;<strong>equity-seeking initiatives&nbsp;</strong>that Rotunda groups support&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Lobbying SFU to divest from Fossil Fuels and help rebuild climate activism on campus&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with student groups such as SFU350 to&nbsp;<strong>strengthen student advocacy&nbsp;</strong>to have SFU divest the endowment from fossil fuels&nbsp;</li>\r\n	<li>Ensure the SFSS&rsquo;s Investment Policy does not include fossil fuels&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Open and Accessible Governance&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Tracking votes as each board member should be able to&nbsp;<strong>defend and answer for their decisions&nbsp;</strong></li>\r\n	<li>Live Streaming meetings to make them&nbsp;<strong>more accessible and open&nbsp;</strong>for students&nbsp;</li>\r\n	<li>Semesterly &ldquo;<strong>State of the Society&rdquo;&nbsp;</strong>Town Halls&nbsp;</li>\r\n	<li><strong>Empower Council&nbsp;</strong>to keep cheques and balances on board&nbsp;\r\n	<ul>\r\n		<li>Giving Council oversight powers&nbsp;</li>\r\n		<li>Formalize training for new Council representatives&nbsp;</li>\r\n		<li>Bylaw reform &ndash; looking into how we can allocate more power to Council&nbsp;</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>SFU students deserve a student society that is willing to work with them, and for them.&nbsp;<strong>We do not have to settle for mediocrity any longer.&nbsp;</strong></p>\r\n\r\n<p><strong>Long live student power!&nbsp;</strong></p>\r\n\r\n<p>Please remember to vote on March 17-19 through SFU email! #LongLiveStudentPower&nbsp;</p>', '2023-10-24 11:10:52', '2023-10-24 11:10:52'),
(4, '1698145869.jpg', 'Euly', 'Aguila', NULL, NULL, 2, 1, '<p><strong>Student Affordability and Tuition Freeze Now&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with&nbsp;<em>Tuition Freeze Now&nbsp;</em>campaign to freeze, and eventually reduce, tuition costs.\r\n\r\n	<ul>\r\n		<li>&nbsp;For every $100 less in tuition, we save SFU students $3,000,000 a year&nbsp;collectively</li>\r\n	</ul>\r\n	</li>\r\n	<li>Keep pushing the provincial and federal governments to&nbsp;<strong>replace loans with grants&nbsp;</strong></li>\r\n	<li><strong>Push for a 2% cap on international&nbsp;</strong>student&nbsp;<strong>tuition&nbsp;</strong>increases across BC&nbsp;</li>\r\n	<li>Work with faculty and professors to move towards&nbsp;<strong>Open Education Resources&nbsp;</strong>(OERs)&nbsp;</li>\r\n	<li><strong>Triple the SFSS Bursary&nbsp;</strong>(from $10,000 to $30,000)&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Rebuilding relationship with the Rotunda Community&nbsp;</strong></p>\r\n\r\n<p>The Rotunda groups (SOCA, SFPIRG, CJSF radio, and Embark) finally have a space to call home within the new Student Union Building. I will:&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Follow through&nbsp;</strong>with housing Rotunda Groups in the SUB this mandate&nbsp;</li>\r\n	<li>Support&nbsp;<strong>equity-seeking initiatives&nbsp;</strong>that Rotunda groups support&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Lobbying SFU to divest from Fossil Fuels and help rebuild climate activism on campus&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with student groups such as SFU350 to&nbsp;<strong>strengthen student advocacy&nbsp;</strong>to have SFU divest the endowment from fossil fuels&nbsp;</li>\r\n	<li>Ensure the SFSS&rsquo;s Investment Policy does not include fossil fuels&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Open and Accessible Governance&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Tracking votes as each board member should be able to&nbsp;<strong>defend and answer for their decisions&nbsp;</strong></li>\r\n	<li>Live Streaming meetings to make them&nbsp;<strong>more accessible and open&nbsp;</strong>for students&nbsp;</li>\r\n	<li>Semesterly &ldquo;<strong>State of the Society&rdquo;&nbsp;</strong>Town Halls&nbsp;</li>\r\n	<li><strong>Empower Council&nbsp;</strong>to keep cheques and balances on board&nbsp;\r\n	<ul>\r\n		<li>Giving Council oversight powers&nbsp;</li>\r\n		<li>Formalize training for new Council representatives&nbsp;</li>\r\n		<li>Bylaw reform &ndash; looking into how we can allocate more power to Council&nbsp;</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>SFU students deserve a student society that is willing to work with them, and for them.&nbsp;<strong>We do not have to settle for mediocrity any longer.&nbsp;</strong></p>\r\n\r\n<p><strong>Long live student power!&nbsp;</strong></p>\r\n\r\n<p>Please remember to vote on March 17-19 through SFU email! #LongLiveStudentPower&nbsp;</p>', '2023-10-24 11:11:09', '2023-10-24 11:11:09'),
(5, '1698145888.jpg', 'Quier', 'Florentino', NULL, NULL, 2, 1, '<p><strong>Student Affordability and Tuition Freeze Now&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with&nbsp;<em>Tuition Freeze Now&nbsp;</em>campaign to freeze, and eventually reduce, tuition costs.\r\n\r\n	<ul>\r\n		<li>&nbsp;For every $100 less in tuition, we save SFU students $3,000,000 a year&nbsp;collectively</li>\r\n	</ul>\r\n	</li>\r\n	<li>Keep pushing the provincial and federal governments to&nbsp;<strong>replace loans with grants&nbsp;</strong></li>\r\n	<li><strong>Push for a 2% cap on international&nbsp;</strong>student&nbsp;<strong>tuition&nbsp;</strong>increases across BC&nbsp;</li>\r\n	<li>Work with faculty and professors to move towards&nbsp;<strong>Open Education Resources&nbsp;</strong>(OERs)&nbsp;</li>\r\n	<li><strong>Triple the SFSS Bursary&nbsp;</strong>(from $10,000 to $30,000)&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Rebuilding relationship with the Rotunda Community&nbsp;</strong></p>\r\n\r\n<p>The Rotunda groups (SOCA, SFPIRG, CJSF radio, and Embark) finally have a space to call home within the new Student Union Building. I will:&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Follow through&nbsp;</strong>with housing Rotunda Groups in the SUB this mandate&nbsp;</li>\r\n	<li>Support&nbsp;<strong>equity-seeking initiatives&nbsp;</strong>that Rotunda groups support&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Lobbying SFU to divest from Fossil Fuels and help rebuild climate activism on campus&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Work with student groups such as SFU350 to&nbsp;<strong>strengthen student advocacy&nbsp;</strong>to have SFU divest the endowment from fossil fuels&nbsp;</li>\r\n	<li>Ensure the SFSS&rsquo;s Investment Policy does not include fossil fuels&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>Open and Accessible Governance&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Tracking votes as each board member should be able to&nbsp;<strong>defend and answer for their decisions&nbsp;</strong></li>\r\n	<li>Live Streaming meetings to make them&nbsp;<strong>more accessible and open&nbsp;</strong>for students&nbsp;</li>\r\n	<li>Semesterly &ldquo;<strong>State of the Society&rdquo;&nbsp;</strong>Town Halls&nbsp;</li>\r\n	<li><strong>Empower Council&nbsp;</strong>to keep cheques and balances on board&nbsp;\r\n	<ul>\r\n		<li>Giving Council oversight powers&nbsp;</li>\r\n		<li>Formalize training for new Council representatives&nbsp;</li>\r\n		<li>Bylaw reform &ndash; looking into how we can allocate more power to Council&nbsp;</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>SFU students deserve a student society that is willing to work with them, and for them.&nbsp;<strong>We do not have to settle for mediocrity any longer.&nbsp;</strong></p>\r\n\r\n<p><strong>Long live student power!&nbsp;</strong></p>\r\n\r\n<p>Please remember to vote on March 17-19 through SFU email! #LongLiveStudentPower&nbsp;</p>', '2023-10-24 11:11:28', '2023-10-24 11:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `election_id` bigint(20) UNSIGNED NOT NULL,
  `election_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `stardate` date NOT NULL,
  `enddate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_name`, `status`, `stardate`, `enddate`, `created_at`, `updated_at`) VALUES
(1, 'The Supreme Student Government Election', 0, '2023-11-06', '2023-11-10', '2023-10-24 10:50:18', '2023-10-24 10:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_22_033116_create_admins_table', 1),
(7, '2023_10_22_181937_create_election_table', 1),
(8, '2023_10_22_213620_create_position_table', 1),
(9, '2023_10_23_085305_create_candidate_table', 1),
(10, '2023_10_26_143720_create_sms_template_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `max_vote` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`, `max_vote`, `status`, `created_at`, `updated_at`) VALUES
(1, 'President', 2, 1, '2023-10-24 10:51:31', '2023-10-24 10:51:31'),
(2, 'Vice President', 2, 1, '2023-10-24 10:51:46', '2023-10-24 10:51:46'),
(3, 'Secretary', 1, 1, '2023-10-24 10:51:55', '2023-10-24 10:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `sms_template`
--

CREATE TABLE `sms_template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sms_desc` varchar(255) NOT NULL,
  `sms_message` longtext NOT NULL,
  `sms_query` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_template`
--

INSERT INTO `sms_template` (`id`, `sms_desc`, `sms_message`, `sms_query`, `created_at`, `updated_at`) VALUES
(1, 'SSG ELECTION', 'Hello Caster, \n\nWe\'re pleased to announce that voting is officially open until Nov 10, 2023. Your unique access code is: 549545. Vote Started on Oct 30, 2023.', 'SAMPLE QUERY', '2023-10-26 08:01:43', '2023-10-26 08:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `info_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`election_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `sms_template`
--
ALTER TABLE `sms_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_info_id_unique` (`info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `election_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_template`
--
ALTER TABLE `sms_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
