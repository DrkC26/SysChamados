-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Out-2022 às 19:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `problema` varchar(255) NOT NULL,
  `setor` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `momento_registro` datetime NOT NULL,
  `numb` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `numb` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resolvidos`
--

CREATE TABLE `resolvidos` (
  `id` int(11) NOT NULL,
  `problema_r` varchar(255) NOT NULL,
  `setor_r` varchar(255) NOT NULL,
  `nome_r` varchar(255) NOT NULL,
  `comentario_r` varchar(255) NOT NULL,
  `momento_registro_r` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `resolvidos`
--

INSERT INTO `resolvidos` (`id`, `problema_r`, `setor_r`, `nome_r`, `comentario_r`, `momento_registro_r`) VALUES
(7, 'a impressora fica dando falha na conexão, pode vir aq please?', 'adm', 'Duda', '', '2022-09-27 10:17:32'),
(8, 'IMPRESSORA PAROU', 'ADM', 'KELLY', '', '2022-09-27 13:00:31'),
(10, 'atolamento de papel ', 'adm', 'nataly', 'SOCORRO BRUNO', '2022-09-27 16:13:09'),
(11, 'ATOLAMENTO DE ESCANER', 'adm', 'NATALY', 'SOCORRO BRUNO', '2022-09-27 15:36:53'),
(12, 'a impressora dnv k', 'adm', 'duda', '', '2022-09-28 08:21:07'),
(13, 'atolamento de papel ', 'adm', 'nataly', 'SOCORRO BRUNO', '2022-09-28 14:45:42'),
(14, 'atolamento de papel scanner', 'adm', 'nataly', 'SOCORRO BRUNO', '2022-09-28 15:39:42'),
(15, 'IMPRESSORA', 'RH', 'SABRINA', 'TRAVOU', '2022-10-03 14:49:14'),
(16, 'IMPRESSORA NAO IMPRIME', 'RH', 'SABRINA', 'SOCORRO DEUS', '2022-10-06 13:56:08'),
(17, 'TROC CART DANIF', 'adm', 'Nataly', 'SOCORRO BRUNO', '2022-10-10 09:53:48'),
(18, 'a impressora travou e meu computador não quer abrir documento', 'adm', 'dudinha', '', '2022-10-11 10:14:54'),
(19, 'PAPEL NA BANDEIJA (NÃO CONSEGUI ARRUMAR)', 'adm', 'nataly', 'SOCORRO BRUNO', '2022-10-11 10:15:14'),
(21, 'impressora travou', 'adm', 'duda', '', '2022-10-11 16:09:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resolvidos`
--
ALTER TABLE `resolvidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `resolvidos`
--
ALTER TABLE `resolvidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
