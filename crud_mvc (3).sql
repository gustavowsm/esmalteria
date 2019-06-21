-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2019 às 23:51
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_mvc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos`
--

CREATE TABLE `atendimentos` (
  `ID` int(11) NOT NULL,
  `ID_ATENDENTE` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_SERVICO` varchar(50) NOT NULL,
  `NOME_CLIENTE` varchar(50) NOT NULL,
  `VALOR_PAGO` varchar(5) NOT NULL,
  `TEMPOESTIMADO` time NOT NULL,
  `METODO` varchar(50) NOT NULL,
  `DATACRI` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DATAMOD` datetime NOT NULL,
  `DATAMARCADA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendimentos`
--

INSERT INTO `atendimentos` (`ID`, `ID_ATENDENTE`, `ID_CLIENTE`, `ID_SERVICO`, `NOME_CLIENTE`, `VALOR_PAGO`, `TEMPOESTIMADO`, `METODO`, `DATACRI`, `DATAMOD`, `DATAMARCADA`) VALUES
(1, 1, 1, '4,5', 'creuza solinalva ', '0', '00:00:00', '', '2019-06-15 12:50:35', '0000-00-00 00:00:00', '2019-06-18 15:00:00'),
(2, 2, 1, '1', 'fulana', '15', '00:00:00', '', '2019-05-31 23:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 1, '1', 'fulana', '15', '00:00:00', '', '2019-05-31 22:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 1, '2', 'fulana', '2', '00:00:00', '', '2019-06-18 02:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 1, '2,4,5', 'creuza solinalva ', '0', '00:00:00', '', '2019-06-15 11:29:38', '0000-00-00 00:00:00', '2019-06-20 12:00:00'),
(6, 10, 2, '2,4', 'admin', '40', '00:00:00', 'dinheiro', '2019-06-19 16:52:36', '0000-00-00 00:00:00', '2019-06-21 11:00:00'),
(7, 10, 2, '2,4', 'admin', '40', '00:00:00', 'dinheiro', '2019-06-19 16:54:36', '0000-00-00 00:00:00', '2019-06-21 11:00:00'),
(8, 10, 2, '2,4,5', 'fulana', '40', '00:00:00', 'dinheiro', '2019-06-19 17:39:42', '0000-00-00 00:00:00', '2019-06-28 15:00:00'),
(9, 10, 2, '4,5', 'fulana', '40', '00:00:00', 'dinheiro', '2019-06-19 17:42:35', '0000-00-00 00:00:00', '2019-06-24 16:00:00'),
(10, 11, 2, '2,4', 'fulana', '40', '00:00:00', 'dinheiro', '2019-06-21 08:05:25', '0000-00-00 00:00:00', '2019-06-22 15:00:00'),
(11, 1, 2, '2,4,5', 'fulana', '60', '04:30:00', 'dinheiro', '2019-06-21 08:21:42', '0000-00-00 00:00:00', '2019-06-26 12:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `confs`
--

CREATE TABLE `confs` (
  `id` int(11) NOT NULL,
  `ABRE` time NOT NULL,
  `FECHA` time NOT NULL,
  `DIAS` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `confs`
--

INSERT INTO `confs` (`id`, `ABRE`, `FECHA`, `DIAS`) VALUES
(1, '09:00:00', '18:00:00', 'seg,ter,qua,qui,sex');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `VALOR` int(11) NOT NULL,
  `TEMPO` time NOT NULL,
  `DISPONIBILIDADE` tinyint(4) NOT NULL DEFAULT '1',
  `DESCRICAO` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`ID`, `NOME`, `VALOR`, `TEMPO`, `DISPONIBILIDADE`, `DESCRICAO`) VALUES
(2, 'Pintura personalizada1', 20, '01:30:00', 1, 'blablabla\r\n'),
(4, 'Pintura personalizada 2', 20, '01:30:00', 1, 'Descricao'),
(5, 'Pintura personalizada3', 20, '01:30:00', 1, 'tanto faz\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `pass` varchar(255) NOT NULL DEFAULT '',
  `loginhash` varchar(32) DEFAULT NULL,
  `telefone` int(14) NOT NULL,
  `DATACRI` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DATAMOD` datetime NOT NULL,
  `CLIENTE` tinyint(4) NOT NULL,
  `ATENDENTE` tinyint(4) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DISPONIBILIDADE` varchar(100) NOT NULL,
  `TIPO` tinyint(4) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `loginhash`, `telefone`, `DATACRI`, `DATAMOD`, `CLIENTE`, `ATENDENTE`, `EMAIL`, `DISPONIBILIDADE`, `TIPO`, `ativo`) VALUES
(1, 'admin', '$2y$10$DeO2B4TBzs2COFvNBjAFYefZDOycO688/ngNsUuo0alzG3YvYTBXi', '290528b15f98df5aae4b352727cfcd80', 12345, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 'admin@admin', '9,10,11,12', 1, 1),
(2, 'fulana', '$2y$10$DeO2B4TBzs2COFvNBjAFYefZDOycO688/ngNsUuo0alzG3YvYTBXi', '12b46b4808f0271aa49693f16af936b6', 13215645, '2019-06-05 14:30:31', '0000-00-00 00:00:00', 1, 0, 'fulana@fulanaa', '', 0, 1),
(10, 'sicrana', '$2y$10$DeO2B4TBzs2COFvNBjAFYefZDOycO688/ngNsUuo0alzG3YvYTBXi', NULL, 955321, '2019-06-05 14:23:51', '0000-00-00 00:00:00', 0, 1, 'sicrana@sicrana', '9,10,11,12,15,16,17,18', 0, 0),
(11, 'beltrana', '$2y$10$DeO2B4TBzs2COFvNBjAFYefZDOycO688/ngNsUuo0alzG3YvYTBXi', NULL, 325165145, '2019-06-13 12:46:21', '0000-00-00 00:00:00', 0, 1, 'beltrana@beltrana', '14,15,16,17,18', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `confs`
--
ALTER TABLE `confs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD UNIQUE KEY `ID` (`ID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `confs`
--
ALTER TABLE `confs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
