-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2020 às 18:25
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encomendas_v2`
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
(1, 1, 1, 1),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas_produtos`
--

CREATE TABLE `encomendas_produtos` (
  `id_enc_prod` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_encomenda` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT '0',
  `preco` double DEFAULT '0',
  `desconto` double DEFAULT '0',
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
(4, 4, 4, 2, 21.5, 0, NULL, '2020-12-03 00:00:00', '2020-12-31 00:00:00');

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
  `obervacoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `nome`, `morada`, `id_categoria`, `telefone`, `obervacoes`, `updated_at`, `created_at`) VALUES
(1, 'Oreo', 'Rua das Oreos', 1, '923456781', NULL, '2020-11-05 12:53:20', '2020-11-05 12:53:20'),
(2, 'Nerf', 'Rua das Nerfs', 1, '981234567', NULL, '2020-11-05 12:53:20', '2020-11-05 12:53:20'),
(3, 'IKEA', 'Rua do IKEA', 3, '918589899', NULL, '2020-11-05 13:12:14', '2020-11-05 13:12:14'),
(4, 'Porto Editora', 'Rua do Porto Editora', 3, '910608608', NULL, '2020-11-05 13:12:14', '2020-11-05 13:12:14'),
(5, 'Cozinhas LDA', 'Rua da Cozinha', 4, '918589898', NULL, '2020-11-05 13:12:40', '2020-11-05 13:12:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores_produtos`
--

CREATE TABLE `fornecedores_produtos` (
  `id_for_prod` int(11) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `preco` double DEFAULT '0',
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
(4, 2, 4, 150, NULL, '2020-11-05 13:21:00', '2020-11-05 13:21:00'),
(5, 2, 5, 200, NULL, '2020-11-05 13:21:08', '2020-11-05 13:21:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `designacao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(9) DEFAULT '0',
  `preco` double DEFAULT '0',
  `id_categoria` int(11) DEFAULT NULL,
  `observacoes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `designacao`, `stock`, `preco`, `id_categoria`, `observacoes`, `updated_at`, `created_at`) VALUES
(1, 'TV LG', 100, 150, 2, NULL, '2020-12-02 00:00:00', '2020-12-02 00:00:00'),
(2, 'TV SONY', 200, 50, 2, NULL, '2020-12-25 00:00:00', '2020-12-31 00:00:00'),
(3, 'PC ASUS', 50, 250, 1, NULL, '2020-12-04 00:00:00', '2020-12-30 00:00:00'),
(4, 'Apple iPhone', 200, 1000, 5, NULL, '2020-12-02 00:00:00', '2020-12-31 00:00:00');

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
(1, 'Manuel Pacheco', 'Eletrónica', 'mpacheco@Gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(2, 'Noé Silva', 'Informática', 'nsilva@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(3, 'Luís Gomes', 'Fotografia', 'lgomes', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(4, 'António Filipe', 'Informática', 'afilipe@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00'),
(5, 'Tiago Machado', 'Informática', 'tmachado@gmail.com', '2020-11-05 00:00:00', '2020-11-05 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`id_encomenda`);

--
-- Indexes for table `encomendas_produtos`
--
ALTER TABLE `encomendas_produtos`
  ADD PRIMARY KEY (`id_enc_prod`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `fornecedores_produtos`
--
ALTER TABLE `fornecedores_produtos`
  ADD PRIMARY KEY (`id_for_prod`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `id_encomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `encomendas_produtos`
--
ALTER TABLE `encomendas_produtos`
  MODIFY `id_enc_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
