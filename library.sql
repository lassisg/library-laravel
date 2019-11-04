-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Nov-2019 às 15:03
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `library`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `observations`, `created_at`, `updated_at`) VALUES
(1, 'Mario', 'Quintana', '', NULL, NULL),
(2, 'Max', 'Kanat-Alexander', 'Max Kanat-Alexander, Chief Architect of the open-source Bugzilla Project, Google Software Engineer, and writer, has been fixing computers since he was eight years old and writing software since he was fourteen.', NULL, NULL),
(3, 'Larry', 'Ullmann', '', NULL, NULL),
(4, 'Brett', 'McLaughlin', '', NULL, NULL),
(5, 'Pablo', 'Dall\'Oglio', '', NULL, NULL),
(6, 'Dan', 'Brown', '', NULL, NULL),
(7, 'Paulo', 'Coelho', '', NULL, NULL),
(8, 'William', 'Shekespeare', '', NULL, NULL),
(9, 'Dustin', 'Boswell', '', NULL, NULL),
(10, 'Trevor', 'Foucher', '', NULL, NULL),
(11, 'Remy', 'Sharp', '', NULL, NULL),
(12, 'Bruce', 'Lawson', '', NULL, NULL),
(13, 'Talal', 'Husseini', '', NULL, NULL),
(14, 'Machado de', 'Assis', 'Joaquim Maria Machado de Assis (Rio de Janeiro, 21 de junho de 1839 — Rio de Janeiro, 29 de setembro de 1908) foi um escritor brasileiro, amplamente considerado como o maior nome da literatura nacional.', NULL, NULL),
(15, 'Nitesh', 'Dhanjani', '', NULL, NULL),
(16, 'Billy', 'Rios', '', NULL, NULL),
(17, 'Brett', 'Hardin', '', NULL, NULL),
(18, 'Amit', 'Goswami', '', NULL, NULL),
(27, 'Roger', 'Pressman', NULL, '2019-11-02 02:09:39', '2019-11-02 02:09:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `author_book`
--

CREATE TABLE `author_book` (
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `author_book`
--

INSERT INTO `author_book` (`author_id`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, NULL),
(2, 13, NULL, NULL),
(3, 5, NULL, NULL),
(4, 6, NULL, NULL),
(5, 7, NULL, NULL),
(5, 8, NULL, NULL),
(6, 9, NULL, NULL),
(7, 15, NULL, NULL),
(8, 11, NULL, NULL),
(9, 12, NULL, NULL),
(10, 12, NULL, NULL),
(11, 16, NULL, NULL),
(12, 16, NULL, NULL),
(13, 10, NULL, NULL),
(14, 2, NULL, NULL),
(14, 3, NULL, NULL),
(15, 4, NULL, NULL),
(16, 4, NULL, NULL),
(17, 4, NULL, NULL),
(18, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` date NOT NULL DEFAULT current_timestamp(),
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copies` int(11) NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isBestSeller` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `books`
--

INSERT INTO `books` (`id`, `name`, `review`, `edition`, `published_at`, `isbn`, `copies`, `location`, `publisher_id`, `cover`, `created_at`, `updated_at`, `isBestSeller`) VALUES
(1, 'A Física da Alma', 'De forma excitante e inovadora, Amit Goswami emprega os fundamentos da física quântica para explicar e provar cientificamente conceitos místicos como imortalidade, reencarnação e pós-vida.', '2', '0000-00-00', '9788576570462', 1, 'E01P02', 13, 'a_fisica_da_alma_1572660215.jpeg', NULL, '2019-11-02 02:03:35', 0),
(2, 'Esaú e Jacó', 'O livro conta a história de Pedro e Paulo, irmãos gêmeos. Ambos se apaixonam pela bela Flora. Esaú e Jacó, é um livro recomendado pelos vestibulandos.', '1', '0000-00-00', '9788572324939', 1, 'E02P01', 11, 'esau_e_jaco_1572660294.jpeg', NULL, '2019-11-02 02:04:54', 0),
(3, 'Dom Casmurro', 'O narrador-personagem tenta restaurar, na velhice, a adolescência e, desta forma, viver o que já havia vivido, e assim, conta a história...', '1', '0000-00-00', '9788572322645', 1, 'E02P01', 11, 'dom_casmurro_1572660281.jpeg', NULL, '2019-11-02 02:04:41', 0),
(4, 'Hacking: The Next Generation', 'With the advent of rich Internet applications, the explosion of social media, and the increased use of powerful cloud computing infrastructures, a new generation of attackers has added cunning new techniques to its arsenal.', '1', '0000-00-00', '9780596807016', 1, 'E01P01', 3, 'hacking_the_next_generation_1572660309.jpeg', NULL, '2019-11-02 02:05:09', 0),
(5, 'PHP 6 E MYSQL 5', 'Fácil abordagem visual, utiliza imagens para guiá-lo pelo PHP 6 e MySQL 5 e mostrar o que fazer. Etapas e explicações precisas permitem colocar as atividades em prática imediatamente.', '1', '0000-00-00', '9788573937510', 1, 'E01P01', 1, 'php_6_e_mysql_5_1572660434.jpeg', NULL, '2019-11-02 02:07:14', 0),
(6, 'PHP & MySQL: The Missing Manual', 'If you can build websites with CSS and JavaScript, this book takes you to the next level-creating dynamic, database-driven websites with PHP and MySQL.', '1', '0000-00-00', '9780596515867', 1, 'E01P01', 3, 'php_mysql_the_missing_manual_1572660415.jpeg', NULL, '2019-11-02 02:06:55', 0),
(7, 'PHP: Programando com Orientação a Objetos', 'O foco deste livro é demonstrar como se dá a construção de uma aplicação totalmente orientada a objetos.', '2', '0000-00-00', '9788575222003', 1, 'E01P01', 2, 'php_programando_com_orientacao_a_objetos_1572660449.png', NULL, '2019-11-02 02:07:29', 0),
(8, 'Criando Relatórios com PHP', 'Uma das grandes demandas de quem desenvolve em PHP sempre foi a geração de relatórios. Este livro ensina diversas técnicas para gerá-los em PHP, nos mais diversos formatos, como HTML, PDF e RTF.', '1', '0000-00-00', '9788575222638', 1, 'E01P01', 2, 'criando_relatorios_com_php_1572660266.jpeg', NULL, '2019-11-02 02:04:26', 0),
(9, 'Código Da Vinci', 'Que mistério se esconde por trás do sorriso de Mona Lisa? Durante séculos, a igreja conseguiu manter a verdade oculta... até agora.', '1', '0000-00-00', '9788575421130', 1, 'E01P01', 4, 'codigo_da_vinci_1572660251.jpeg', NULL, '2019-11-02 02:04:11', 1),
(10, 'Paz Guerreira', 'Nesta obra épica, atemporal, dois mundos se encontram, num cruzamento bem elaborado de histórias e personagens de diferentes épocas, mas cujas vidas se entrelaçam da maneira mais profunda do que se pode supor.', '4', '0000-00-00', '9788587389619', 2, 'E02P01', 12, 'paz_guerreira_1572660399.jpeg', NULL, '2019-11-02 02:06:39', 1),
(11, 'Romeu e Julieta', 'A obra dramática de Shakespeare funde uma visão poética e refinada a um forte caráter popular, no qual os assassinos, as violações, os incestos e as traições são ingredientes.', '1', '0000-00-00', '9788572325271', 1, 'E01P01', 5, 'romeu_e_julieta_1572660468.jpeg', NULL, '2019-11-02 02:07:48', 1),
(12, 'The Art of Readable Code', 'Simple and Practical Techniques for Writing Better Code', '1', '0000-00-00', '9781449314170', 1, 'E02P02', 3, 'the_art_of_readable_code_1572660482.jpeg', NULL, '2019-11-02 02:08:02', 1),
(13, 'Code Simplicity', 'Good software design is simple and easy to understand. This concise guide helps you understand the fundamentals of good design through scientific laws & principles you can apply to any programming language or project from here to eternity.', '1', '0000-00-00', '9781449313883', 1, 'E01P02', 3, 'code_simplicity_1572660238.jpeg', NULL, '2019-11-02 02:03:58', 1),
(14, 'O Aprendiz de Feiticeiro', 'Nesta obra, dedicada ao também gaúcho e poeta Augusto Meyer, Quintana dá novo tratamento a temas abordados anteriormente, com um olhar incorporado a partir da prosa e seu respectivo tração coloquial.', '1', '0000-00-00', '9788525034960', 1, 'E01P02', 9, 'o_aprendiz_de_feiticeiro_1572660359.jpeg', NULL, '2019-11-02 02:05:59', 0),
(15, 'O Monte Cinco', 'No dia 12 do mês de agosto de 1979, eu fui dormir com uma única certeza: aos 30 anos de idade, eu estava conseguindo chegar ao topo de minha carreira como executivo.', '1', '0000-00-00', '9788576651932', 1, 'E01P02', 8, 'o_monte_cinco_1572660383.jpeg', NULL, '2019-11-02 02:06:23', 0),
(16, 'Introdução Ao Html 5', 'Escrito por desenvolvedores que têm utilizado esta nova linguagem em seu trabalho. O Introdução ao HTML 5 mostra a você como começar a adotar a linguagem agora para perceber seus benefícios em navegadores atuais.', '1', '0000-00-00', '9788576085935', 2, 'E01P01', 10, 'introducao_ao_html_5_1572660330.jpeg', NULL, '2019-11-02 02:05:30', 0),
(22, 'Engenharia de Software', 'Com mais de três décadas de liderança de mercado, Engenharia de Software chega à sua 8ª edição como o mais abrangente guia sobre essa importante área.\r\nTotalmente revisada e reestruturada, esta nova edição foi amplamente atualizada para incluir os novos tópicos da “engenharia do século 21”. Capítulos inéditos abordam a segurança de software e os desafios específicos ao desenvolvimento para aplicativos móveis. Conteúdos novos também foram incluídos em capítulos existentes, e caixas de texto informativas e conteúdos auxiliares foram expandidos, deixando este guia ainda mais prático para uso em sala de aula e em estudos autodidatas.', '8', '2016-01-01', '9788780555332', 1, 'Secretária do escritório, na sala de estar.', 15, 'Engenharia de Software_1572661057.jpg', '2019-11-02 02:17:37', '2019-11-02 02:17:37', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Leandro', 'lassisg@gmail.com', '99339104', 'Gostaria de informações sobre como pegar um livro emprestado. Como devo proceder?', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_28_140529_create_books_table', 2),
(5, '2019_10_28_142551_create_authors_table', 3),
(6, '2019_10_28_143106_create_contacts_table', 4),
(7, '2019_10_28_150907_create_publishers_table', 4),
(28, '2019_10_31_134809_create_author_book_table', 5),
(29, '2019_11_02_100848_update_author_book_table', 5),
(30, '2019_11_02_132559_update_book_table', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ciência Moderna', NULL, NULL),
(2, 'Novatec', NULL, NULL),
(3, 'O\'Reilly Media', NULL, NULL),
(4, 'Sextante', NULL, NULL),
(5, 'Abril', NULL, NULL),
(6, 'Panini', NULL, NULL),
(7, 'Lua de Papel', NULL, NULL),
(8, 'Objetiva', NULL, NULL),
(9, 'Fronteira', NULL, NULL),
(10, 'Alta Books', NULL, NULL),
(11, 'Livraria Garnier', NULL, NULL),
(12, 'Th Editora', NULL, NULL),
(13, 'Aleph', NULL, NULL),
(15, 'McGraw Hill', '2019-11-02 02:10:27', '2019-11-02 02:10:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Leandro', 'lassisg@gmail.com', NULL, '$2y$10$Q0FgJIurEvyv6zc3rlXM3ePTwx0wN5SRj904BIOusN/xaPixdsVwy', NULL, '2019-10-29 10:26:36', '2019-10-29 10:26:36');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `author_book`
--
ALTER TABLE `author_book`
  ADD PRIMARY KEY (`author_id`,`book_id`),
  ADD KEY `author_book_book_id_foreign` (`book_id`);

--
-- Índices para tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Índices para tabela `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `author_book`
--
ALTER TABLE `author_book`
  ADD CONSTRAINT `author_book_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `author_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
