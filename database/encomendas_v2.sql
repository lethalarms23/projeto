-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jan-2021 às 15:48
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `encomendas_v2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `designacao` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `designacao`, `icone`, `updated_at`, `created_at`) VALUES
(1, 'Informática', NULL, '2020-11-05 12:49:31', '2020-11-05 12:49:31'),
(2, 'TV', NULL, '2020-11-05 12:49:31', '2020-11-05 12:49:31'),
(3, 'Gamming', NULL, '2020-11-05 13:11:34', '2020-11-05 13:16:28'),
(4, 'Fotografia', NULL, '2020-11-05 13:11:34', '2020-11-05 13:11:34'),
(5, 'Mobile', NULL, '2020-11-05 13:12:24', '2020-11-05 13:16:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE `encomendas` (
  `id_encomenda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `encomendas`
--

INSERT INTO `encomendas` (`id_encomenda`, `id_produto`, `quantidade`, `preco`) VALUES
(2, 2, 2, 2),
(3, 3, 2, 2),
(4, 4, 2, 2),
(7, 3, 1, 250);

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas_produtos`
--

CREATE TABLE `encomendas_produtos` (
  `id_enc_prod` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_encomenda` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT 0,
  `preco` double DEFAULT 0,
  `desconto` double DEFAULT 0,
  `obervacoes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `encomendas_produtos`
--

INSERT INTO `encomendas_produtos` (`id_enc_prod`, `id_produto`, `id_encomenda`, `quantidade`, `preco`, `desconto`, `obervacoes`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 2, 1.5, 0, NULL, '2020-12-02 00:00:00', '2020-12-31 00:00:00'),
(2, 2, 1, 3, 10.5, 0, NULL, '2020-12-03 00:00:00', '2020-12-25 00:00:00'),
(3, 3, 3, 3, 11.5, 0, NULL, '2020-12-11 00:00:00', '2020-12-22 00:00:00'),
(4, 4, 4, 2, 21.5, 0, NULL, '2020-12-03 00:00:00', '2020-12-31 00:00:00'),
(5, 2, 6, 0, 0, 0, NULL, '2021-01-14 14:05:51', '2021-01-14 14:05:51'),
(6, 3, 7, 0, 0, 0, NULL, '2021-01-14 14:30:55', '2021-01-14 14:30:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morada` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `telefone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `nome`, `morada`, `id_categoria`, `telefone`, `observacoes`, `updated_at`, `created_at`) VALUES
(1, 'Oreo', 'Rua das Oreos', 1, '923456781', NULL, '2020-11-05 12:53:20', '2020-11-05 12:53:20'),
(3, 'IKEA', 'Rua do IKEA', 3, '918589899', NULL, '2020-11-05 13:12:14', '2020-11-05 13:12:14'),
(4, 'Porto Editora', 'Rua do Porto Editora', 3, '910608608', NULL, '2020-11-05 13:12:14', '2020-11-05 13:12:14'),
(5, 'aaa', 'aaa', NULL, '1', 'a', '2021-01-14 09:06:48', '2021-01-14 09:06:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_produtos`
--

CREATE TABLE `fornecedores_produtos` (
  `id_for_prod` int(11) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `preco` double DEFAULT 0,
  `observacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores_produtos`
--

INSERT INTO `fornecedores_produtos` (`id_for_prod`, `id_fornecedor`, `id_produto`, `preco`, `observacoes`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 100, NULL, '2020-11-05 13:02:06', '2020-11-05 13:02:06'),
(2, 1, 2, 150, NULL, '2020-11-05 13:02:22', '2020-11-05 13:02:22'),
(3, 2, 3, 100, NULL, '2020-11-05 13:20:52', '2020-11-05 13:20:52'),
(4, 2, 4, 150, NULL, '2020-11-05 13:21:00', '2020-11-05 13:21:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id_user` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id_user`, `id_produto`, `id_like`) VALUES
(1, 4, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `designacao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(9) DEFAULT 0,
  `preco` double DEFAULT 0,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `observacoes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `designacao`, `stock`, `preco`, `imagem`, `id_categoria`, `observacoes`, `updated_at`, `created_at`) VALUES
(1, 'TV LG', 100, 150, '', 2, NULL, '2020-12-02 00:00:00', '2020-12-02 00:00:00'),
(2, 'TV SONY', 200, 50, '', 2, NULL, '2020-12-25 00:00:00', '2020-12-31 00:00:00'),
(4, 'Apple iPhone', 200, 1000, '', 5, 'aa', '2021-01-16 13:56:10', '2020-12-31 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal' COMMENT 'admin ou normal',
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

INSERT INTO `users` (`id`, `name`, `tipo_user`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marcelo', 'admin', 'hiddankill@gmail.com', NULL, '$2y$10$wfycg.V.rOPEysknw51BWuqxz9VemaFDsioZWCQJrOZHmoklbkaLy', 'EExCiKQzMoH5xrk3harEkLdgx4YDagBI32dSYzfa7lqisG5IeVpB1jRhoZtl', '2021-01-14 14:01:22', '2021-01-14 14:01:22'),
(2, 'Marcelo Nogueira', 'normal', 'hiddankill@protonmail.com', NULL, '$2y$10$mUAPzosI/FRrCn2y0LuPp.48SDL4ys.YfgbOgDMu1XQhyxWQYDJMi', 'fkBbDyxnagoGN4aQmz8bIGDJuFk6eC48iRBqopGCIEZQNgdFlpaQioBznRuD', '2021-01-16 11:23:00', '2021-01-16 11:23:00'),
(5, 'Lethal Arms', 'normal', 'hiddan2020@gmail.com', NULL, '$2y$10$MdZ.7561ZxynZICYVQ6hKOfz.2lXaiRmdDBrW.3baXT6zwEotjH4O', NULL, '2021-01-16 14:38:12', '2021-01-16 14:38:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id_vendedor` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id_vendedor`, `nome`, `especialidade`, `email`, `updated_at`, `created_at`) VALUES
(1, 'Manuel Pacheca', 'Eletrónica', 'mpacheco@gmail.com', '2021-01-08 16:08:48', '2020-11-05 00:00:00'),
(2, 'Noé Silva', 'Informática', 'nsilva@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(3, 'Luís Gomes', 'Fotografia', 'lgomes', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(4, 'António Filipe', 'Informática', 'afilipe@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(5, 'Tiago Machado', 'Informática', 'tmachado@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`id_encomenda`);

--
-- Índices para tabela `encomendas_produtos`
--
ALTER TABLE `encomendas_produtos`
  ADD PRIMARY KEY (`id_enc_prod`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `fornecedores_produtos`
--
ALTER TABLE `fornecedores_produtos`
  ADD PRIMARY KEY (`id_for_prod`);

--
-- Índices para tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `id_encomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `encomendas_produtos`
--
ALTER TABLE `encomendas_produtos`
  MODIFY `id_enc_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
