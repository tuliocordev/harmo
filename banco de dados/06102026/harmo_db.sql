-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/06/2026 às 06:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `harmo_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `release_year` year(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `albums`
--

INSERT INTO `albums` (`id`, `title`, `slug`, `artist_id`, `cover`, `release_year`, `created_at`, `updated_at`) VALUES
(1, 'Bloco do Eu Sozinho', 'bloco-do-eu-sozinho', 1, 'images/albums/bloco-do-eu-sozinho.jpg', '2001', '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(2, 'Is This It', 'is-this-it', 2, 'images/albums/is-this-it.jpg', '2001', '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(3, '333', '333', 3, 'images/albums/333.jpg', '2019', '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(4, 'Appetite for Destruction', 'appetite-for-destruction', 4, 'images/albums/appetite-for-destruction.jpg', '1987', '2026-06-10 03:35:43', '2026-06-10 03:35:43'),
(6, 'Los Hermanos', 'los-hermanos', 1, 'images/albums/imagem-2026-06-09-194516463.png', '1999', '2026-06-10 05:45:34', '2026-06-10 05:45:34'),
(8, 'Ventura', 'ventura', 1, 'images/albums/imagem-2026-06-09-195125951.png', '2003', '2026-06-10 05:51:27', '2026-06-10 05:51:27'),
(9, 'Máquina do Tempo', 'maquina-do-tempo', 3, 'images/albums/imagem-2026-06-09-195700375.png', '2020', '2026-06-10 05:57:09', '2026-06-10 05:57:09'),
(10, '4', '4', 1, 'images/albums/imagem-2026-06-09-200016539.png', '2005', '2026-06-10 06:00:32', '2026-06-10 06:00:32'),
(11, 'Se Saudade Sentir (Se Prepara 3)', 'se-saudade-sentir-se-prepara-3', 7, 'images/albums/imagem-2026-06-09-205106546.png', '2026', '2026-06-10 06:51:20', '2026-06-10 06:51:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `artists`
--

CREATE TABLE `artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `artists`
--

INSERT INTO `artists` (`id`, `name`, `slug`, `bio`, `photo`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Los Hermanos', 'los-hermanos', NULL, 'images/artists/los-hermanos.jpg', NULL, '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(2, 'The Strokes', 'the-strokes', NULL, 'images/artists/the-strokes.jpg', NULL, '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(3, 'Matue', 'matue', NULL, 'images/artists/matue.jpg', NULL, '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(4, 'Guns N Roses', 'guns-n-roses', NULL, 'images/artists/guns-n-roses.jpg', NULL, '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(7, 'Mc Livinho', 'mc-livinho', 'Oliver nasceu em 11 de novembro de 1994, na cidade de São Paulo, no bairro Jardim Pedra Branca localizado na Zona Norte, e foi ligado à música desde sua infância. Segundo fontes, a mãe o incentivava a investir na MPB, pois era fã de artistas como Maria Gadú, Ana Carolina, Chico Buarque e Djavan.[5]\r\n\r\nIniciou a carreira musical como violinista em uma igreja em que frequentava no interior de São Paulo na cidade de Vargem, no ano de 2003, executou músicas no recinto até o ano de 2008, e segundo o próprio artista, \"já estava tocando com uma boa noção de orquestra e nota\".[5] No entanto, ele acabou se afastando dos trabalhos, pois era considerada um rapaz de mau comportamento, não condizente com a posição que exercia na igreja.[5] Após este fato, Oliver mudou de residência onde teve sua adolescência para o centro de São Paulo para morar com a avó, porém após cerca de seis meses, foi morar sozinho e iniciou trabalhando em uma LAN house para se manter.[5]', 'images/artists/imagem-2026-06-09-205011295.png', 'Brasil', '2026-06-10 06:50:20', '2026-06-10 06:50:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
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
-- Estrutura para tabela `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `song_id`, `created_at`) VALUES
(1, 1, 22, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Rock Nacional', 'rock-nacional', '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(2, 'Rock Alternativo', 'rock-alternativo', '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(3, 'Trap', 'trap', '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(4, 'Hard Rock', 'hard-rock', '2026-06-10 03:35:42', '2026-06-10 03:35:42'),
(5, 'Funk', 'funk', '2026-06-10 03:35:42', '2026-06-10 03:35:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_13_011724_create_genres_table', 1),
(5, '2026_05_13_012248_create_artists_table', 1),
(6, '2026_05_13_012435_create_albums_table', 1),
(7, '2026_05_13_012600_create_songs_table', 1),
(8, '2026_05_13_012716_create_favorites_table', 1),
(9, '2026_05_13_012816_create_playlists_table', 1),
(10, '2026_05_13_012936_create_playlist_song_table', 1),
(11, '2026_05_13_013442_add_fields_to_users_table', 1),
(12, '2026_06_09_225440_add_lyrics_and_youtube_to_songs_table', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `playlists`
--

INSERT INTO `playlists` (`id`, `user_id`, `name`, `description`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 1, 'rock', 'tudo de rock', 1, '2026-06-11 08:51:26', '2026-06-11 08:51:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `playlist_song`
--

CREATE TABLE `playlist_song` (
  `playlist_id` bigint(20) UNSIGNED NOT NULL,
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `order` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `playlist_song`
--

INSERT INTO `playlist_song` (`playlist_id`, `song_id`, `order`, `created_at`) VALUES
(1, 22, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XJaixc0ZRSz5Y4z8zFFaHlPybxxIIVWpFh34HDI0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 OPR/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTzlNYjhISnFucUdzR1BLQk9aM3NEVjhTYlpVVFRBaUNnckdQOTVVcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi91c2VycyI7czo1OiJyb3V0ZSI7czoxNzoiYWRtaW4udXNlcnMuaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1781150611);

-- --------------------------------------------------------

--
-- Estrutura para tabela `songs`
--

CREATE TABLE `songs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED DEFAULT NULL,
  `genre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `duration` smallint(5) UNSIGNED DEFAULT NULL,
  `track_number` tinyint(3) UNSIGNED DEFAULT NULL,
  `lyrics` longtext DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `songs`
--

INSERT INTO `songs` (`id`, `title`, `slug`, `artist_id`, `album_id`, `genre_id`, `duration`, `track_number`, `lyrics`, `youtube_url`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Anna Julia', 'anna-julia', 1, 6, 1, 212, NULL, 'Quem te vê passar assim por mim\r\nNão sabe o que é sofrer\r\nTer que ver você assim\r\nSempre tão linda\r\nContemplar o sol do teu olhar\r\nPerder você no ar\r\nNa certeza de um amor\r\nMe achar um nada\r\nPois sem ter teu carinho\r\nEu me sinto sozinho\r\nEu me afogo em solidão\r\nOh, Anna Júlia\r\nOh, Anna Júlia\r\nNunca acreditei na ilusão\r\nDe ter você pra mim\r\nMe atormenta a previsão\r\nDo nosso destino\r\nEu passando o dia a te esperar\r\nVocê sem me notar\r\nQuando tudo tiver fim\r\nVocê vai estar com um cara\r\nUm alguém sem carinho\r\nSerá sempre um espinho\r\nDentro do meu coração\r\nOh, Anna Júlia\r\nOh, Anna Júlia\r\nSei que você já não quer o meu amor\r\nSei que você já não gosta de mim\r\nEu sei que eu não sou quem você sempre sonhou\r\nMas vou reconquistar o seu amor todo pra mim\r\nOh, Anna Júlia\r\nOh, Anna Júlia\r\nOh, Anna Júlia\r\nOh, Anna Júlia, Júlia, Júlia', 'https://www.youtube.com/watch?v=umMIcZODm2k&list=RDumMIcZODm2k&start_radio=1', NULL, '2026-06-10 03:35:42', '2026-06-10 05:46:03'),
(2, 'Cara Estranho', 'cara-estranho', 1, 8, 1, 205, NULL, 'Olha só\r\nQue cara estranho que chegou\r\nParece não achar lugar\r\nNo corpo em que Deus lhe encarnou\r\nTropeça a cada quarteirão\r\nNão mede a força que já tem\r\nExibe à frente o coração\r\nQue não divide com ninguém\r\nTem tudo sempre às suas mãos\r\nMas leva a cruz um pouco além\r\nTalhando feito um artesão\r\nA imagem de um rapaz de bem\r\nOlha ali\r\nQuem tá pedindo aprovação\r\nNão sabe nem pra onde ir\r\nSe alguém não aponta a direção\r\nPeriga nunca se encontrar\r\nSerá que ele vai perceber?\r\nQue foge sempre do lugar\r\nDeixando o ódio se esconder\r\nTalvez, se nunca mais tentar\r\nViver o cara da TV\r\nQue vence a briga sem suar\r\nE ganha aplausos sem querer\r\nFaz parte desse jogo\r\nDizer ao mundo todo\r\nQue só conhece o seu quinhão ruim\r\nÉ simples desse jeito\r\nQuando se encolhe o peito\r\nE finge não haver competição\r\nÉ a solução de quem não quer\r\nPerder aquilo que já tem\r\nE fecha a mão pro que há de vir\r\nIáh, ah, ah, ah, ah\r\nHey!', 'https://www.youtube.com/watch?v=mkdOVkb0Dak&list=RDmkdOVkb0Dak&start_radio=1', NULL, '2026-06-10 03:35:42', '2026-06-10 05:51:49'),
(3, 'Morena', 'morena', 1, 10, 1, 215, NULL, 'É, morena, tá tudo bem\r\nSereno é quem tem\r\nA paz de estar em par com Deus\r\nPode rir agora\r\nQue o fio da maldade se enrola\r\nPra nós todo o amor do mundo\r\nPra eles, o outro lado\r\nEu digo mal-me-quer\r\nNinguém escapa o peso de viver assim\r\nSer assim, eu não\r\nPrefiro assim com você\r\nJuntinho, sem caber de imaginar\r\nAté o fim raiar\r\nPra nós todo o amor do mundo\r\nPra eles, o outro lado\r\nEu digo mal-me-quer\r\nNinguém escapa o peso de viver assim\r\nSer assim, eu não\r\nPrefiro assim com você\r\nJuntinho, sem caber de imaginar\r\nAté o fim raiar', 'https://www.youtube.com/watch?v=sRDFAcR7eDI&list=RDsRDFAcR7eDI&start_radio=1', NULL, '2026-06-10 03:35:42', '2026-06-10 06:01:41'),
(4, 'O Vencedor', 'o-vencedor', 1, 8, 1, 221, NULL, 'Olha lá quem vem do lado oposto\r\nVem sem gosto de viver\r\nOlha lá que os bravos são escravos\r\nSãos e salvos de sofrer\r\nOlha lá quem acha que perder é ser\r\nMenor na vida\r\nOlha lá quem sempre quer vitória\r\nE perde a glória de chorar\r\nEu que já não quero mais\r\nSer um vencedor\r\nLevo a vida devagar\r\nPra não faltar amor\r\nOlha você e diz que não\r\nVive a esconder o coração\r\nNão faz isso, amigo\r\nJá se sabe que você\r\nSó procura abrigo\r\nMas não deixa ninguém ver\r\nPor que será?\r\nEu que nunca fui assim\r\nMuito de ganhar\r\nJunto as mãos ao meu redor\r\nFaço o melhor que sou capaz\r\nSó pra viver em paz', 'https://www.youtube.com/watch?v=2b4mkBM2A-k&list=RD2b4mkBM2A-k&start_radio=1', NULL, '2026-06-10 03:35:42', '2026-06-10 05:55:33'),
(5, 'Last Nite', 'last-nite', 2, 2, 2, 193, NULL, 'Last night she said\r\nOh, baby, I feel so down\r\nOh it turn me off\r\nWhen I feel left out\r\nSo I, I turned around\r\nOh, baby, I don\'t care no more\r\nI know this for sure\r\nI\'m walking out that door\r\n\r\nWell, I\'ve been in town\r\nFor just about fifteen whole minutes now\r\nOh, baby, I feel so down\r\nAnd I don\'t know why\r\nI keep walking for miles\r\n\r\nAnd see, people, they don\'t understand\r\nNo girlfriends, they can\'t understand\r\nYour grandsons, they won\'t understand\r\nOn top of this, I ain\'t ever gonna understand\r\n\r\nLast night she said\r\nOh, baby, don\'t feel so down\r\nOh it turned me off\r\nWhen I feel left out\r\nSo I, I turned around\r\nOh, baby, I\'m gonna be alright\r\nIt was a great big lie\r\n\'Cause I left that night, yeah\r\n\r\nOh, people, they don\'t understand\r\nNo girlfriends, they don\'t understand\r\nIn spaceships, they won\'t understand\r\nAnd me, I ain\'t ever gonna understand\r\n\r\nLast night she said\r\nOh, baby, I feel so down\r\nSee, it turned me off\r\nWhen I feel left out\r\nSo I, I turned around\r\nOh, I don\'t care no more\r\nI know this for sure\r\nI\'m walking out that door, yeah', 'https://www.youtube.com/watch?v=phDGgIvwAmw&list=OLAK5uy_l98-V9f_VuC895QYk58lbFlwaE0QyMaro&index=7', NULL, '2026-06-10 03:35:42', '2026-06-10 06:12:09'),
(6, 'Someday', 'someday', 2, 2, 2, 186, NULL, 'In many ways, they\'ll miss the good old days\r\nSomeday, someday\r\nYeah, it hurts to say, but I want you to stay\r\nSometimes, sometimes\r\n\r\nWhen we was young, oh, man, did we have fun\r\nAlways, always\r\nPromises, they break before they\'re made\r\nSometimes, sometimes\r\n\r\nOh, Maya says I\'m lacking in depth\r\nI will do my best\r\nYou say you wanna stand by my side\r\nDarling, your head\'s not right\r\nAh, see, alone we stand, together we fall apart\r\nYeah, I think I\'ll be alright\r\nI\'m working so I won\'t have to try so hard\r\nTables, they turn sometimes\r\n\r\nOh, someday\r\nNo, I ain\'t wastin\' no more time\r\n\r\nAnd now my fears, they come to me in threes\r\nSo, I, sometimes\r\nSay: Fate, my friend, you say the strangest things\r\nI find, sometimes\r\n\r\nOh, Maya says I\'m lacking in depth\r\nShit, I will try my best\r\nYou say you wanna stand by my side\r\nDarling, your head\'s not right\r\nSee, alone we stand, together we fall apart\r\nYeah, I think I\'ll be alright\r\nI\'m working so I won\'t have to try so hard\r\nTables, they turn sometimes\r\n\r\nOh, someday\r\nI ain\'t wasting no more time', 'https://www.youtube.com/watch?v=knU9gRUWCno&list=OLAK5uy_l98-V9f_VuC895QYk58lbFlwaE0QyMaro', NULL, '2026-06-10 03:35:42', '2026-06-10 06:06:49'),
(7, 'Hard to Explain', 'hard-to-explain', 2, 2, 2, 231, NULL, 'Was an honest man\r\nAsked me for the phone\r\nTried to take control\r\n\r\nOh, I don\'t see it that way\r\nI don\'t see it that way\r\n\r\nOh, we shared some ideas\r\nAll obsessed with fame\r\nSays we\'re all the same\r\n\r\nOh, I don\'t see it that way\r\nI don\'t see it that way\r\n\r\nRaised in Carolina\r\nI\'m not like that\r\nTrying to remind her\r\nWhen we go back\r\n\r\nI missed the last bus, I\'ll take the next train\r\nI\'ll try but you see, it\'s hard to explain\r\nI say the right thing but act the wrong way\r\nI like it right here, but I cannot stay\r\nI\'m watching TV; forget what I\'m told\r\nWell, I am too young, and they are too old\r\nThe joke is on you, this place is a zoo\r\nYou\'re right it\'s true\r\n\r\nHe said he can\'t decide\r\nI shake my head to say\r\n\"Everything\'s just great\"\r\n\r\nOh, I just can\'t remember\r\nI just can\'t remember\r\n\r\nRaised in Carolina, she says:\r\n\"I\'m not like that\"\r\nTrying to remind her\r\nWhen we go back\r\n\r\nI say the right thing but act the wrong way\r\nI like it right here but I cannot stay\r\nI\'m watching TV; forget what I\'m told\r\nWell, I am too young, and they are too old\r\nOh man, can\'t you see, I\'m nervous, so please\r\nPretend to be nice, so I can be mean\r\nI missed the last bus, we\'ll take the next train\r\nI\'ll try but you see, it\'s hard to explain', 'https://www.youtube.com/watch?v=BXkm6h6uq0k&list=OLAK5uy_l98-V9f_VuC895QYk58lbFlwaE0QyMaro&index=8', NULL, '2026-06-10 03:35:42', '2026-06-10 06:13:24'),
(8, 'New York City Cops', 'new-york-city-cops', 2, 2, 2, 210, NULL, 'Oh! Haha, I meant, ah!\r\n\r\nHaha, no, I didn\'t mean that at all\r\nOoh, ooh, ooh\r\n\r\nHere in the streets so mechanized\r\nRise to the bottom of the meaning of life\r\nStudied all the rules and didn\'t want no part\r\nBut I let you in just to break this heart\r\nEven though it was only one night\r\nIt was, fucking strange\r\n\r\nNina\'s in the bedroom\r\nShe said: Time to go now\r\nBut leavin\' it ain\'t easy\r\n\r\nI\'ve got to let go\r\nOh, I\'ve got to let go\r\n\r\nAnd the hours they ran slow\r\nI said, every night\r\nShe just can\'t stop saying\r\nNew York City cops\r\nNew York City cops\r\nNew York City cops\r\nBut they ain\'t too smart\r\nNew York City cops\r\nNew York City cops\r\nNew York City cops\r\nBut they ain\'t too smart\r\n\r\nWell, kill me now \'cause I let you down\r\nI swear one day I\'m gonna leave this town\r\nStop\r\n\r\nYou stopped living \'cause this just won\'t work\r\nAnd they act like Romans, but they dress like Turks\r\nSome time in your prime\r\nSee me, I like the summertime\r\nBut, hey\r\n\r\nNina\'s in the bedroom\r\nShe said: Time to go now\r\nBut leaving it ain\'t easy\r\n\r\nOh, I\'ve got to let go\r\nI\'ve got to let go\r\n\r\nOh, trapped in an apartment\r\nShe would not let them get her\r\nShe wrote it in a letter\r\nOh I got to come clean\r\nThe authorities, they\'ve seen\r\nDarling, I\'m somewhere in between\r\n\r\nI said every night\r\nShe just can\'t stop saying\r\nNew York City cops\r\nNew York City cops\r\nNew York City cops\r\nBut they ain\'t too smart\r\nNew York City cops\r\nNew York City cops\r\nNew York City cops\r\nBut they ain\'t too smart', 'https://www.youtube.com/watch?v=ZNu8kDHD2IY&list=OLAK5uy_l98-V9f_VuC895QYk58lbFlwaE0QyMaro&index=9', NULL, '2026-06-10 03:35:42', '2026-06-10 06:08:06'),
(9, '333', '333', 3, 3, 3, 340, NULL, 'Yeah, yeah (proteste)\r\nMil cavalos, hoje eu \'to voando (wow, wow, wow, wow)\r\nNum portal, chegando em outro plano\r\nVagando, eu vejo essa miragem, muita saudade\r\nVem, que eu vou te elevando para um novo ano (wow)\r\nEm Fortal de novo, não me explano (yeah)\r\nBem normal esse bolão de grana\r\nEu \'tava preso na viagem, tipo a cidade\r\nEi, vivendo mais um sonho, mais um desengano\r\nCalculando os finais contra os meus rivais\r\nSão todos iguais, e, no fim, eu saio ganhando\r\nA minha mente vai longe\r\n\'Cê vai pra onde, meu bem? Onde, meu bem?\r\nMe dê sua marca\r\nEntra nesse som, deixa esse som te abraçar\r\nFirme e concentrado antes que a onda bata\r\nOu você cresce com ela ou ela te mata\r\nClareando o ar\r\nLimpa a visão pra eu continuar\r\n\'To clareando o ar\r\nAlém da visão, além da visão, oh, força\r\nClareando o ar\r\nLimpa a visão pra eu continuar\r\n\'To clareando o ar\r\nAlém da visão, além da visão, oh, força\r\nYeah, yeah\r\nYeah (yeah, ah, yeah, ah)\r\nYeah yeah, yeah yeah\r\nNão, não, não, não, não, não\r\nNessa vida, nada é de graça, irmão\r\nNada é muito fácil, não\r\nNada é muito fácil, irmão\r\nEu sabia que eu ia ser rico (rich)\r\nMas nunca que eu saberia o que vem com isso\r\nNa notícia, o jornalista expondo o meu filho (não, né?)\r\nMil noites fazendo um sacrifício pra pagar\r\nO carma que herdei da minha família (yeah, yeah, yeah)\r\nDe repente, te dão um tiro (blah)\r\nSeu irmão virando seu inimigo (yeah)\r\nQuer ser o vilão, e acaba se destruindo (yeah)\r\nE a minha consequência é carregar essa\r\nParanoia por ter meu estilo de vida\r\nÉ por isso que eu \'to no vício (vício)\r\n\'To pagando as promessas que eu fiz (fiz)\r\nVim pro estúdio e coloquei no disco (disco)\r\nMinha vó disse que eu sou artista (isso)\r\nQue só o trabalho pode engrandecer\r\nO homem pra ele ser o que ele quis\r\nEu falei que ia fazer e fiz (fiz)\r\nMas no começo, foi difícil (yeah)\r\nIsso pra não dizer que foi triste\r\nAgora existe outra visão fora disso (vixe)\r\nEsse ouro, eu encontrei no lixo\r\nSai da minha bota, eu vou acelerar (yeah, yeah)\r\nMe deixa respirar (ye-yeah)\r\n\'Tava no meu lugar (lugar)\r\nVocês vieram aqui me perturbar\r\nAgora eu não posso mais parar\r\nClareando o ar\r\nLimpa visão pra eu continuar\r\n\'To clareando o ar\r\nAlém da visão, além da visão, oh, força\r\nClareando o ar\r\nMe dá visão pra eu continuar\r\n\'To clareando o ar\r\nAlém da visão, além da visão, oh, força\r\nProteste\r\nYe-yeah\r\nYeah yeah', 'https://www.youtube.com/watch?v=xbbhp44RsPo&list=RDxbbhp44RsPo&start_radio=1', NULL, '2026-06-10 03:35:42', '2026-06-10 05:15:06'),
(10, 'Maquina do Tempo', 'maquina-do-tempo', 3, 9, 3, 230, NULL, 'Yeah, yeah, yeah, yeah, yeah\r\nYeah, yeah, yeah, yeah, yeah, yeah\r\nYeah, yeah, yeah, yeah, yeah, yeah\r\nWhoa, yeah\r\nYeah, yeah, yeah, yeah, yeah (ah)\r\nYeah, yeah, yeah, yeah, yeah, yeah (êh)\r\nYeah, yeah, yeah, yeah, yeah, yeah\r\nWhoa, whoa\r\nMe vê: duplo Rolex, fumando becks\r\nHoje eu trouxe um slick cheio do toprê\r\nDerrubo um Jack, bola uma track\r\nSempre existe mais dinheiro a fazer\r\nUh-ey, dinheiro a fazer\r\nSempre existe mais dinheiro a fazer\r\nUh-ey, dinheiro a fazer\r\nSempre existe mais dinheiro a fazer\r\nAhn, domingão queimando gasolina, yeah\r\nFoi mal por comer a sua prima, yeah, yeah\r\nMas a bunda dela me fascina, yeah\r\nMas a bunda dela me fasc...\r\nEu vou fazer uma máquina do tempo, encher ela de boldo\r\nVou voltar pro passado e reescrever tudo de novo\r\nVou pros anos \'70 encontrar com o meu sogro\r\nPra fumar um baseado mais bolado que o outro\r\nYeah, dropando uísque na balada\r\n20 grama de hash\', ninguém entendia nada (é o quê?)\r\nViajar no espaço-tempo, você tá ficando doido?\r\nCê sabe que isso é impossível, garoto, isso é papo de louco\r\nEssas ideia não vai curar com uma bomba\r\nMas não é do tipo que explode, é do tipo que te lombra\r\nFalei: Cê tá bem gostosinha, então segura a sua onda\r\nE hoje cê não imagina a cena quando ela...\r\nMe vê: duplo Rolex, fumando becks\r\nHoje eu trouxe um slick cheio do toprê\r\nDerrubo um Jack, bola uma track\r\nSempre existe mais dinheiro a fazer\r\nUh-ey, dinheiro a fazer\r\nSempre existe mais dinheiro a fazer\r\nUh-ey, dinheiro a fazer\r\nSempre existe mais dinheiro a fazer\r\nAhn, domingão queimando gasolina, yeah\r\nFoi mal por comer a sua prima, yeah, yeah\r\nMas a bunda dela me fascina, yeah\r\nMas a bunda dela me fasc...\r\n(Yeah, yeah, yeah, yeah, yeah)\r\nEu vou fazer uma máquina do tempo\r\nEu vou fazer uma máquina do tempo\r\nEu vou fazer uma máquina do tempo\r\nAhn, temaki apertado\r\nSe ela não quer me ligar, eu não tô ligado\r\nMas o amor dela queima forte, tipo um baseado\r\nEla vai desligar mesmo se eu não me ligar\r\nEla é A+, hein?\r\nAhn, eu queria um carro\r\nAgora eu posso ter dez, tá faltando vaga\r\nTô bombando no top dez, dominando a área\r\nNinguém vai me parar, nada mais vai me parar\r\nA+, hein?\r\nAhn, temaki apertado\r\nSe ela não quer me ligar, eu não tô ligado (fé)\r\nMas o amor dela queima forte, tipo um baseado\r\nEla vai desligar mesmo se eu não me ligar\r\nEla é A+, hein?\r\nAhn, eu queria um carro\r\nAgora eu posso ter dez, tá faltando vaga\r\nTô bombando no top dez, dominando a área\r\nNinguém vai me parar, nada mais vai me parar', 'https://www.youtube.com/watch?v=ZPcG9PCfagM&list=RDZPcG9PCfagM&start_radio=1', NULL, '2026-06-10 03:35:42', '2026-06-10 05:58:06'),
(11, 'Gorilla Roxo', 'gorilla-roxo', 3, 9, 3, 165, NULL, 'Yeah\r\n\r\nAyy, ayy\r\nEla quer dividir do que eu tenho\r\nCartão, me passa a senha\r\nCinto e calça da Balmain, yeah\r\nSempre que eu tô na estrada\r\nEla quer sentar de graça\r\nNão quer mais saber de nada\r\n\r\nAyy, ayy\r\nEla só não quer mais ficar sozinha\r\nEntra e chama as amiguinha\r\nDroga e festa lá na minha casa\r\nFumando o Gorilla Roxo\r\nEla me chupa até eu ficar roxo\r\nE nada lhe para\r\n\r\nSabe que ela é duas\r\nQuando o clima fecha, ela muda, ayy\r\nSe eu sou o Sol, ela é a Lua\r\nAinda mais quando ela tá nua, ayy\r\nEla sabe, minha carteira é sua (sua)\r\nTudo pra ser o dono daquela bunda, ayy\r\nNão sei se eu tomei um LSD\r\nE o horizonte tá fazendo a curva\r\n\r\nEu sou Tuê, prazer, eu sou a cura\r\nEu vim pra desembaçar sua vida turva\r\nE ela é tão linda, rara e especial\r\nPra ficar na mão de qualquer filha da puta\r\nEla vive assaltando a minha floricultura\r\nVive pra se derramar em ganja boa\r\nEu e você numa brisa espacial\r\nEu quero ver você bater na Lua\r\n\r\nAyy, ayy\r\nEla quer dividir do que eu tenho\r\nCartão, me passa a senha\r\nCinto e calça da Balmain, yeah\r\nSempre que eu tô na estrada\r\nEla quer sentar de graça\r\nNão quer mais saber de nada, yeah, yeah\r\n\r\nAyy, ayy\r\nEla só não quer mais ficar sozinha\r\nEntra e chama as amiguinha\r\nDroga e festa lá na minha casa\r\nFumando o Gorilla Roxo\r\nEla me chupa até eu ficar roxo\r\nE nada lhe para\r\n\r\nE ela quer (tudo), e ela quer\r\nE ela quer (o mundo)\r\n(Andar numa Meca; chapar)\r\nE ela quer, e ela quer\r\nE ela quer (gastar; parecer uma boneca)\r\nE ela quer (Dolce), e ela quer\r\nE ela quer (o mundo)\r\n(Quer gastar com tudo; chapar)\r\nE ela quer, e ela quer (gastar)\r\nE ela quer (ser dona do mundo)\r\n\r\nAyy, ayy\r\nEla quer dividir do que eu tenho\r\nCartão, me passa a senha\r\nCinto e calça da Balmain, yeah\r\nSempre que eu tô na estrada\r\nEla quer sentar de graça\r\nNão quer mais saber de nada, yeah, yeah\r\n\r\nAyy, ayy\r\nEla só não quer mais ficar sozinha\r\nEntra e chama as amiguinha\r\nDroga e festa lá na minha casa\r\nFumando o Gorilla Roxo\r\nEla me chupa até eu ficar roxo\r\nE nada lhe para', 'https://www.youtube.com/watch?v=BUL7zecHZjA&list=RDBUL7zecHZjA&start_radio=1', NULL, '2026-06-10 03:35:43', '2026-06-10 06:15:36'),
(12, 'O Som', 'o-som', 3, 3, 3, 303, NULL, '(O som)\r\n(O som)\r\n(O som)\r\n\r\nEu fui procurar dentro do tom e me perdi na ilusão\r\nCorrendo atrás do som (ah)\r\nAlém daqui, dessa visão, pude sentir meu coração\r\nCorrendo atrás do som (ah)\r\nEu fui seguir nessa missão, tive que ouvir a intuição (ahn-ahn)\r\nCorrendo atrás do som (ow-ow-ow-ow-ow)\r\n\r\nEu tava correndo atrás do som (som, som)\r\n\r\nPra curar, deixa o som ecoar (uh)\r\nVem ouvir e sentir o lugar (som)\r\nPra curar, deixa o som (deixa o som) ecoar (som)\r\nVem ouvir e sentir o lugar (som)\r\n\r\nSinta o som\r\nOuça o som\r\nSinta o som\r\n(We are the music makers)\r\n(And we are the dreamers of dreams)\r\n(O som)\r\n\r\nCorrendo atrás do som (do som, som, som)\r\nEu tava correndo atrás do som (atrás do som, som, som, som)\r\nEu tava correndo atrás do som (som, som, som, som)\r\nDo som, do som, correndo atrás do som (atrás do som, do som, yeah, yeah)\r\nDo som, do som, correndo atrás do som (atrás do som)\r\n(Som, som, som, som, som)\r\n\r\n(I think this might be the sound)\r\n\r\nPra curar, deixa o som ecoar (deixa o som, som)\r\n(Se você quer ouvir) quer ouvir e sentir o lugar', 'https://www.youtube.com/watch?v=T-h3O3djG9U&list=OLAK5uy_l7TtbHi-lUAT9rnq9kg6m2CQT1VigrTSA', NULL, '2026-06-10 03:35:43', '2026-06-10 06:55:18'),
(13, 'Welcome to the Jungle', 'welcome-to-the-jungle', 4, 4, 4, 279, NULL, '(Oh my God)\r\n(Ooh-ooh)\r\n(Cha)\r\n\r\nWelcome to the jungle\r\nWe got fun and games\r\nWe got everything you want\r\nHoney, we know the names\r\n\r\nWe are the people that can find\r\nWhatever you may need\r\nIf you got the money, honey\r\nWe got your disease\r\n\r\nIn the jungle, welcome to the jungle\r\nWatch it bring you to your knees, knees\r\nOh, I wanna watch you bleed\r\n\r\nWelcome to the jungle\r\nWe take it day by day\r\nIf you want it, you\'re gonna bleed\r\nBut it\'s the price you pay\r\n\r\nAnd you\'re a very sexy girl\r\nThat\'s very hard to please\r\nYou can taste the bright lights\r\nBut you won\'t get there for free\r\n\r\nIn the jungle, welcome to the jungle\r\nFeel my, my, my, my serpentine\r\nI, I wanna hear you scream\r\n\r\nWelcome to the jungle\r\nIt gets worse here everyday\r\nYou learn to live like an animal\r\nIn the jungle, where we play\r\n\r\nIf you got a hunger for what you see\r\nYou\'ll take it eventually\r\nYou can have anything you want\r\nBut you better not take it from me\r\n\r\nIn the jungle, welcome to the jungle\r\nWatch it bring you to your knees, knees\r\nOh, I wanna watch you bleed\r\n\r\nAnd when you\'re high, you never\r\nEver want to come down\r\nSo down, so down, so down, yeah\r\n\r\nYou know where you are?\r\nYou\'re in the jungle, baby\r\nYou\'re gonna die\r\n\r\nIn the jungle, welcome to the jungle\r\nWatch it bring you to your knees, knees\r\nIn the jungle, welcome to the jungle\r\nFeel my, my, my serpentine\r\n\r\nIn the jungle, welcome to the jungle\r\nWatch it bring you to your knees, knees\r\nDown in the jungle, welcome to the jungle\r\nWatch it bring you to you\r\nIt\'s gonna bring you down', 'https://www.youtube.com/watch?v=o1tj2zJ2Wvg&list=RDo1tj2zJ2Wvg&start_radio=1', NULL, '2026-06-10 03:35:43', '2026-06-10 06:17:50'),
(14, 'Sweet Child O Mine', 'sweet-child-o-mine', 4, 4, 4, 303, NULL, 'She\'s got a smile that it seems to me\r\nReminds me of childhood memories\r\nWhere everything was as fresh as the bright blue sky (sky, sky)\r\nNow and then when I see her face\r\nShe takes me away to that special place\r\nAnd if I stared too long, I\'d probably break down and cry\r\n\r\nWoah, oh, oh, sweet child of mine\r\nWoah, oh, oh, oh, sweet love of mine\r\n\r\nShe\'s got eyes of the bluest skies\r\nAs if they thought of rain\r\nI\'d hate to look into those eyes and see an ounce of pain\r\nHer hair reminds me of a warm, safe place\r\nWhere, as a child, I\'d hide\r\nAnd pray for the thunder and the rain to quietly pass me by\r\n\r\nWoah, oh, oh, sweet child of mine\r\nWoah-woah, oh, oh, oh, sweet love of mine\r\nWoah, oh, oh, oh, sweet child of mine (ooh, yeah, yeah)\r\nOoh, sweet love of mine\r\n\r\nWhere do we go?\r\nWhere do we go now?\r\nWhere do we go?\r\nMm-mm, oh, where do we go?\r\nWhere do we go now?\r\nOh, where do we go now?\r\nWhere do we go?\r\nSweet child, where do we go now?\r\n\r\nAye, aye, aye, aye, aye, aye, aye, aye (where do we go?)\r\nOoh, where do we go now?\r\nOh-oh-oh-oh-oh, oh, woah, where do we go?\r\nOh-oh, where do we go now?\r\nOh, where do we go?\r\nWhere do we go now?\r\nWhere do we go?\r\nWoah-oh, where do we go now?\r\nNo, no, no, no, no, no, no\r\nSweet child, sweet child of mine', 'https://www.youtube.com/watch?v=1w7OgIMMRc4&list=RD1w7OgIMMRc4&start_radio=1', NULL, '2026-06-10 03:35:43', '2026-06-10 06:21:49'),
(15, 'Paradise City', 'paradise-city', 4, 4, 4, 408, NULL, 'Take me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\n(Take me home) oh, won\'t you, please, take me home?\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\n(Take me home) oh, won\'t you, please, take me home?\r\n\r\nJust an urchin living under the street\r\nI\'m a hard case that\'s tough to beat\r\nI\'m your charity case, so buy me something to eat\r\nI\'ll pay you at another time\r\nTake it to the end of the line\r\n\r\nRags to riches, or so they say\r\nYou gotta keep pushing for the fortune and fame\r\nYou know it\'s, it\'s all a gamble when it\'s just a game\r\nYou treat it like a capital crime\r\nEverybody\'s doing their time\r\n\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nOh, won\'t you, please, take me home, yeah, yeah?\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nTake me home\r\n\r\nStrapped in the chair of the city\'s gas chamber\r\nWhy I\'m here, I can\'t quite remember\r\nThe surgeon general says it\'s hazardous to breathe\r\nI\'d have another cigarette, but I can\'t see\r\nTell me who you\'re gonna believe\r\n\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nTake me home, yeah, yeah\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nOh, won\'t you, please, take me home, yeah?\r\n\r\nSo far away, so far away\r\nSo far away, so far away\r\n\r\nCaptain America\'s been torn apart\r\nNow he\'s a court jester with a broken heart\r\nHe said: Turn me around and take me back to the start\r\nI must be losing my mind, are you blind?\r\nI\'ve seen it all a million times\r\n\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nTake me home, yeah, yeah\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nOh, won\'t you, please, take me home?\r\n\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nTake me home, yeah, yeah\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nOh, won\'t you, please, take me home, home?\r\n\r\nOh, I wanna go, I wanna know\r\nOh, won\'t you, please, take me home?\r\nI wanna see how good it can be\r\nOh, won\'t you, please, take me home?\r\n\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\n(Take me home) oh, won\'t you please take me home?\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nOh, won\'t you, please, take me home?\r\n\r\nTake me down (oh, yeah), spin me \'round\r\nOh, won\'t you, please, take me home?\r\nI wanna see how good it can be\r\nOh, won\'t you, please, take me home?\r\n\r\nI wanna see how good it can be\r\nOh, oh, take me home\r\n\r\nTake me down to the Paradise City\r\nWhere the grass is green and the girls are pretty\r\nOh, won\'t you, please, take me home?\r\nI wanna go, I wanna know\r\nOh, won\'t you, please, take me home?\r\nYeah, baby', 'https://www.youtube.com/watch?v=Rbm6GXllBiw&list=RDRbm6GXllBiw&start_radio=1', NULL, '2026-06-10 03:35:43', '2026-06-10 06:20:41'),
(16, 'Nightrain', 'nightrain', 4, 4, 4, 268, NULL, 'Loaded like a freight train\r\nFlyin\' like an aeroplane\r\nFeelin\' like a space brain\r\nOne more time tonight\r\n\r\nWell, I\'m a west coast struttin\'\r\nOne bad mother\r\nGot a rattlesnake suitcase\r\nUnder my arm\r\nSaid I\'m a mean machine\r\nBeen drinkin\' gasoline\r\nAnd, honey, you can make my motor hum\r\n\r\nI got one chance left\r\nIn a nine live cat\r\nI got a dog eat dog sly smile\r\nI got a Molotov cocktail\r\nWith a match to go\r\nI smoke my cigarette with style\r\n\r\nAnd I can tell you, honey\r\nYou can take my money tonight\r\n\r\nWake up late\r\nHoney, put on your clothes\r\nTake your credit card\r\nTo the liquor store\r\nThat\'s one for you\r\nAnd two for me by tonight\r\n\r\nI\'ll be loaded like a freight train\r\nFlyin\' like an aeroplane\r\nFeelin\' like a space brain\r\nOne more time tonight\r\n\r\nI\'m on the nightrain\r\nBottoms up\r\nI\'m on the nightrain\r\nFill my cup\r\nI\'m on the nightrain\r\nReady to crash and burn\r\nI never learn\r\n\r\nI\'m on the nightrain\r\nI love that stuff\r\nI\'m on the nightrain\r\nI can never get enough\r\nI\'m on the nightrain\r\nNever to return\r\nNo\r\n\r\nLoaded like a freight train\r\nFlyin\' like an aeroplane\r\nSpeedin\' like a space brain\r\nOne more time tonight\r\n\r\nI\'m on the nightrain\r\nAnd I\'m lookin\' for some\r\nI\'m on the nightrain\r\nSo\'s I can leave this slum\r\nI\'m on the nightrain\r\nAnd I\'m ready to crash an\' burn\r\n\r\nNightrain\r\nBottoms up\r\nI\'m on the nightrain\r\nFill my cup\r\nI\'m on the nightrain\r\n\r\nAh, ah ah\r\nAhh, oh, yeah!\r\n\r\nI\'m on the nightrain\r\nLove that stuff\r\nOh, I\'m on the nightrain\r\nAnd I can never get enough\r\nRidin\' the nightrain\r\nI guess, I\r\nI guess, I guess, I guess\r\nI guess never learn\r\n\r\nOn the nightrain\r\nFloat me home\r\nOh, I\'m on the nightrain\r\nRidin\' the nightrain\r\nNever to return\r\nNightrain', 'https://www.youtube.com/watch?v=VMDljoM5JFI&list=RDVMDljoM5JFI&start_radio=1', NULL, '2026-06-10 03:35:43', '2026-06-10 06:19:30'),
(21, 'Maria', 'maria', 3, 3, 3, 195, 10, 'A correria me obriga a ir\r\nE eu só queria um tempo pra poder ficar\r\nA sua presença é o que me faz feliz\r\nAntes eu achava normal ter que me maltratar\r\nSempre pondo a responsa em primeiro lugar\r\nEra eu contra o mundo e nada mais vai me parar\r\nÉ tanta coisa que eu prefiro nem contar\r\nEsqueci tudo no segundo que ela veio me falar\r\nBaby, fica agora, baby, tá na hora\r\nBaby fica agora, baby tá na hora\r\nFica agora, fica fica\r\nBaby, fica agora, baby, tá na hora\r\nViajar com você é minha terapia\r\nEm outra vida eu já te conhecia\r\nTrás a vibe santa sua luz me irradia\r\nVocê é o sol me dizendo bom dia (bom dia)\r\nQuem dera eu achasse a harmonia, o ritmo\r\nA melodia certa para acessar seu íntimo\r\nVocê é um anjo na terra, me diz qual é seu signo?\r\nSou só um homem que erra, será que eu sou digno?\r\nE ainda tô preso nessa correria\r\nSempre que um dilema surge\r\nEu me pergunto\r\nO que é que você faria?\r\nRainha da sabedoria\r\nVem clarear minha noite\r\nMe mostrar o caminho\r\nQue antes eu não via (clarear)\r\nHoje você tá me esperando aqui\r\nPor isso eu fico querendo voltar\r\nBaby, fica agora, baby, tá na hora\r\nBaby, fica agora, baby, tá na hora\r\nFica agora, fica fica\r\nBaby, fica agora, baby, tá na hora\r\nBaby, fica agora, baby, fica agora\r\nBaby, baby, não chora, fica agora\r\nFica agora, yeah\r\nVive o agora, fica, fica', 'https://www.youtube.com/watch?v=-x2cE--r3L8&list=RD-x2cE--r3L8&start_radio=1', 'images/albums/333.jpg', '2026-06-10 05:26:50', '2026-06-10 05:26:50'),
(22, 'Se Saudade Sentir (Se Prepara 3)', 'se-saudade-sentir-se-prepara-3', 7, 11, 5, 198, 1, 'Um pingo é letra, entendi, cê tá agindo assim\r\nA sua indecisão vai nos direcionar pro fim\r\nTantas eu deixei de comer só por amar você\r\nNão foi esforço, foi respeito que eu escolhi ter\r\nAhn (ahn)\r\n\r\nEntão se atenta aos detalhes, que eu sou minucioso\r\nSe caiu na rotina, eu reinicio o jogo\r\nCordial despedida, manda só a necessária\r\nToma sua cota e marcha, que na caça tem várias\r\n(Opa, opa, opa, opa)\r\n\r\nJá que é a última vez que vem buscar suas coisa, eu vou te botar\r\nSe saudade sentir, não tem mais volta\r\nTriste pelo fim tá suas amigas (opa, opa, opa, opa), fingindo se preocupar\r\nMelhor amiga de você agora é ninfeta minha\r\n\r\nJá que é a última vez que vem buscar suas coisa, eu vou te botar\r\nSe saudade sentir, não tem mais volta\r\nTriste pelo fim tá suas amigas (opa, opa, opa, opa), fingindo se preocupar\r\nMelhor amiga de você agora é ninfeta minha\r\n\r\nVai começar a putaria\r\nÉ o, é o DJ Perera, original\r\nDJ JB Mix, mais uma, né?\r\nOpa, opa, opa, opa\r\n\r\nUm pingo é letra, entendi, cê tá agindo assim\r\nA sua indecisão vai nos direcionar pro fim\r\nTantas eu deixei de comer só por amar você\r\nNão foi esforço, foi respeito que eu escolhi ter\r\nAhn (ahn)\r\n\r\nEntão se atenta aos detalhes, que eu sou minucioso\r\nSe caiu na rotina, eu reinicio o jogo\r\nCordial despedida, manda só a necessária\r\nToma sua, toma sua cota e marcha, que na, que na caça tem várias\r\n(Opa, opa, opa, opa)\r\n\r\nJá que é a última vez que vem buscar suas coisa, eu vou te botar\r\nSe saudade sentir, não tem, não tem mais volta\r\nTriste pelo fim tá suas amigas, fingindo se preocupar\r\nMelhor amiga de você agora é ninfeta minha\r\n\r\nJá que é, já que é a última vez que vem buscar suas coisas, eu vou te botar\r\nSe saudade sentir, não tem mais volta\r\nTriste, triste pelo fim tá suas amigas, fingindo se preocupar\r\nMelhor amiga de você agora é ninfeta minha\r\n(Opa, opa, opa, opa)\r\n\r\nVai começar a putaria\r\nÉ o DJ Perera, original\r\nOpa, opa, opa, opa\r\nDJ JB Mix, mais uma, né?\r\nOpa, opa, opa, opa', 'https://www.youtube.com/watch?v=XjxI5Qvpptc&list=RDXjxI5Qvpptc&start_radio=1', 'images/albums/imagem-2026-06-09-205106546.png', '2026-06-10 06:52:56', '2026-06-10 06:52:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `avatar`) VALUES
(1, 'Admin', 'admin@harmo.com', '2026-06-10 03:35:42', '$2y$12$tEtjgsCDwJdeVH4mAth4eeIOTnfbKCNuI8jH.lOSSCyCSXoTkzyy6', 'ieS8qIQvOPDOjTp7RJdl9Xlye8W9xPuFxAmf5sn3j9INv1X7w5KuzLz0YtMO', '2026-06-10 03:35:42', '2026-06-10 03:35:42', 'admin', NULL),
(2, 'Túlio', 'tuliocordeirodev@gmail.com', NULL, '$2y$12$eTqGeXhAEazvpjgZRzkoUuoenCff4nD2xdHZ071HgJVoKJIMG6Du6', NULL, '2026-06-11 09:03:11', '2026-06-11 09:03:11', 'user', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `albums_slug_unique` (`slug`),
  ADD KEY `albums_artist_id_foreign` (`artist_id`);

--
-- Índices de tabela `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artists_slug_unique` (`slug`);

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_song_id_unique` (`user_id`,`song_id`),
  ADD KEY `favorites_song_id_foreign` (`song_id`);

--
-- Índices de tabela `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genres_name_unique` (`name`),
  ADD UNIQUE KEY `genres_slug_unique` (`slug`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlists_user_id_foreign` (`user_id`);

--
-- Índices de tabela `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD PRIMARY KEY (`playlist_id`,`song_id`),
  ADD KEY `playlist_song_song_id_foreign` (`song_id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `songs_slug_unique` (`slug`),
  ADD KEY `songs_artist_id_foreign` (`artist_id`),
  ADD KEY `songs_album_id_foreign` (`album_id`),
  ADD KEY `songs_genre_id_foreign` (`genre_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `artists`
--
ALTER TABLE `artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD CONSTRAINT `playlist_song_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `playlist_song_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `songs_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `songs_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
