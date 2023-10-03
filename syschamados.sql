-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/08/2023 às 19:46
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `syschamados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `problema` varchar(255) NOT NULL,
  `setor` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `momento_registro` datetime NOT NULL,
  `numb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`id`, `problema`, `setor`, `nome`, `comentario`, `momento_registro`, `numb`) VALUES
(32, 'Problema exemplo', 'adm', 'Bruno', 'Comentário exemplo', '2023-08-30 14:34:55', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resolvidos`
--

CREATE TABLE `resolvidos` (
  `id` int(11) NOT NULL,
  `problema_r` varchar(255) NOT NULL,
  `setor_r` varchar(255) NOT NULL,
  `nome_r` varchar(255) NOT NULL,
  `comentario_r` varchar(255) NOT NULL,
  `momento_registro_r` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `resolvidos`
--

INSERT INTO `resolvidos` (`id`, `problema_r`, `setor_r`, `nome_r`, `comentario_r`, `momento_registro_r`) VALUES
(47, 'Problema exemplo', 'adm', 'Bruno', 'Comentário exemplo', '2023-08-30 14:34:41'),
(48, 'Problema exemplo', 'adm', 'Bruno', 'Comentário exemplo', '2023-08-30 14:34:41'),
(49, 'Problema exemplo', 'adm', 'Bruno', 'Comentário exemplo', '2023-08-30 14:34:41'),
(50, 'Problema exemplo', 'adm', 'Bruno', 'Comentário exemplo', '2023-08-30 14:34:41');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `resolvidos`
--
ALTER TABLE `resolvidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `resolvidos`
--
ALTER TABLE `resolvidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
