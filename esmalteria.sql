-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Ago-2019 às 23:22
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
-- Database: `esmalteria`
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
(1, 1, 1, '4,5', 'creuza solinalva ', '60', '00:00:00', 'dinheiro', '2019-06-15 12:50:35', '0000-00-00 00:00:00', '2019-06-18 15:00:00'),
(2, 2, 1, '4', 'fulana', '15', '01:30:00', 'dinheiro', '2019-05-31 23:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 1, '1', 'fulana', '15', '00:00:00', 'dinheiro', '2019-05-31 22:30:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 1, '2', 'fulana', '2', '00:00:00', 'dinheiro', '2019-06-18 02:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 1, '2,4,5', 'creuza solinalva ', '60', '00:00:00', 'dinheiro', '2019-06-15 11:29:38', '0000-00-00 00:00:00', '2019-06-20 12:00:00'),
(6, 10, 2, '2,4', 'admin', '40', '00:00:00', 'dinheiro', '2019-06-19 16:52:36', '0000-00-00 00:00:00', '2019-06-21 11:00:00'),
(7, 10, 2, '2,4', 'admin', '40', '00:00:00', 'dinheiro', '2019-06-19 16:54:36', '0000-00-00 00:00:00', '2019-06-21 11:00:00'),
(8, 11, 2, '2', 'fulana', '40', '01:30:00', 'dinheiro', '2019-06-19 17:39:42', '0000-00-00 00:00:00', '2019-06-28 15:00:00'),
(9, 10, 2, '4,5', 'fulana', '40', '00:00:00', 'dinheiro', '2019-06-19 17:42:35', '0000-00-00 00:00:00', '2019-06-24 16:00:00'),
(10, 11, 2, '2,4', 'fulana', '40', '00:00:00', 'dinheiro', '2019-06-21 08:05:25', '0000-00-00 00:00:00', '2019-06-22 15:00:00'),
(11, 1, 2, '2,4,5', 'fulana', '60', '04:30:00', 'dinheiro', '2019-06-21 08:21:42', '0000-00-00 00:00:00', '2019-06-26 15:00:00'),
(12, 11, 2, '2', 'fulana', '40', '01:30:00', 'debito', '2019-06-22 20:13:14', '0000-00-00 00:00:00', '2019-06-28 17:00:00'),
(13, 11, 2, '2', 'fulana', '20', '01:30:00', 'dinheiro', '2019-06-22 23:49:49', '0000-00-00 00:00:00', '2019-06-26 14:00:00'),
(14, 11, 2, '4', 'fulana', '20', '01:00:00', 'credito', '2019-06-23 17:11:38', '0000-00-00 00:00:00', '2019-06-26 15:00:00'),
(15, 11, 1, '2,4,5', 'admin', '60', '03:00:00', 'debito', '2019-06-23 20:16:26', '0000-00-00 00:00:00', '2019-06-26 16:00:00'),
(16, 11, 2, '2,4', 'fulana fulana', '40', '02:00:00', 'dinheiro', '2019-07-26 13:59:00', '0000-00-00 00:00:00', '2019-07-29 14:00:00'),
(17, 1, 1, '2,4', 'admin', '40', '02:00:00', 'credito', '2019-08-09 14:10:07', '0000-00-00 00:00:00', '2019-08-29 12:00:00'),
(18, 1, 1, '2,4,5', 'admin', '60', '03:00:00', 'debito', '2019-08-09 14:10:23', '0000-00-00 00:00:00', '2019-08-29 12:00:00'),
(19, 1, 1, '4,5', 'admin', '40', '02:00:00', 'debito', '2019-08-10 10:11:45', '0000-00-00 00:00:00', '2019-08-13 13:00:00'),
(20, 11, 1, '2,4,5', 'admin', '60', '03:00:00', 'debito', '2019-08-12 20:08:21', '0000-00-00 00:00:00', '2019-08-22 16:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `confs`
--

CREATE TABLE `confs` (
  `id` int(11) NOT NULL,
  `ABRE` time NOT NULL,
  `FECHA` time NOT NULL,
  `SEG` int(11) NOT NULL,
  `SEGABRE` time NOT NULL,
  `SEGFECHA` time NOT NULL,
  `TER` int(11) NOT NULL,
  `TERABRE` time NOT NULL,
  `TERFECHA` time NOT NULL,
  `QUA` int(11) NOT NULL,
  `QUAABRE` time NOT NULL,
  `QUAFECHA` time NOT NULL,
  `QUI` int(11) NOT NULL,
  `QUIABRE` time NOT NULL,
  `QUIFECHA` time NOT NULL,
  `SEX` int(11) NOT NULL,
  `SEXABRE` time NOT NULL,
  `SEXFECHA` time NOT NULL,
  `SAB` int(11) NOT NULL,
  `SABABRE` time NOT NULL,
  `SABFECHA` time NOT NULL,
  `DOM` int(11) NOT NULL,
  `DOMABRE` time NOT NULL,
  `DOMFECHA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `confs`
--

INSERT INTO `confs` (`id`, `ABRE`, `FECHA`, `SEG`, `SEGABRE`, `SEGFECHA`, `TER`, `TERABRE`, `TERFECHA`, `QUA`, `QUAABRE`, `QUAFECHA`, `QUI`, `QUIABRE`, `QUIFECHA`, `SEX`, `SEXABRE`, `SEXFECHA`, `SAB`, `SABABRE`, `SABFECHA`, `DOM`, `DOMABRE`, `DOMFECHA`) VALUES
(1, '08:00:00', '18:00:00', 1, '11:00:00', '18:00:00', 1, '10:00:00', '18:00:00', 1, '12:00:00', '18:00:00', 1, '08:00:00', '18:00:00', 1, '08:00:00', '18:00:00', 1, '08:00:00', '18:00:00', 1, '08:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `SEG` int(11) NOT NULL,
  `SEGENTRA` time NOT NULL,
  `SEGSAI` time NOT NULL,
  `TER` int(11) NOT NULL,
  `TERENTRA` time NOT NULL,
  `TERSAI` time NOT NULL,
  `QUA` int(11) NOT NULL,
  `QUAENTRA` time NOT NULL,
  `QUASAI` time NOT NULL,
  `QUI` int(11) NOT NULL,
  `QUIENTRA` time NOT NULL,
  `QUISAI` time NOT NULL,
  `SEX` int(11) NOT NULL,
  `SEXENTRA` time NOT NULL,
  `SEXSAI` time NOT NULL,
  `SAB` int(11) NOT NULL,
  `SABENTRA` time NOT NULL,
  `SABSAI` time NOT NULL,
  `DOM` int(11) NOT NULL,
  `DOMENTRA` time NOT NULL,
  `DOMSAI` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horarios`
--

INSERT INTO `horarios` (`id`, `idusuario`, `SEG`, `SEGENTRA`, `SEGSAI`, `TER`, `TERENTRA`, `TERSAI`, `QUA`, `QUAENTRA`, `QUASAI`, `QUI`, `QUIENTRA`, `QUISAI`, `SEX`, `SEXENTRA`, `SEXSAI`, `SAB`, `SABENTRA`, `SABSAI`, `DOM`, `DOMENTRA`, `DOMSAI`) VALUES
(1, 1, 1, '08:00:00', '08:00:00', 1, '08:00:00', '09:00:00', 1, '08:00:00', '12:00:00', 1, '12:00:00', '18:00:00', 1, '12:00:00', '18:00:00', 1, '10:00:00', '15:00:00', 1, '10:00:00', '15:00:00');

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
(2, 'ServiÃ§o 1', 20, '01:00:00', 1, '                        blablabla                    '),
(4, 'Serviço 2', 20, '01:00:00', 1, '                                                Descrigato\r\n                    '),
(5, 'Serviço 3', 20, '01:00:00', 1, '                                                tanto faz1\r\n                                        ');

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
(1, 'admin', '$2y$10$DeO2B4TBzs2COFvNBjAFYefZDOycO688/ngNsUuo0alzG3YvYTBXi', '5631ed540c3082a91e3ea81ecf9d4dc3', 12345, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 'admin@admin', '8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23', 1, 1),
(2, 'fulana fulana', '$2y$10$DeO2B4TBzs2COFvNBjAFYefZDOycO688/ngNsUuo0alzG3YvYTBXi', '1953f63755350360b67240c5a45170d6', 13215645, '2019-06-05 14:30:31', '0000-00-00 00:00:00', 1, 0, 'fulana@fulana', '', 0, 1),
(10, 'sicrana', '$2y$10$DeO2B4TBzs2COFvNBjAFYefZDOycO688/ngNsUuo0alzG3YvYTBXi', NULL, 955321, '2019-06-05 14:23:51', '0000-00-00 00:00:00', 0, 1, 'sicrana@sicrana', '9,10,11,12,13,14,15,16,17,18', 0, 1),
(11, 'beltrana', '$2y$10$DeO2B4TBzs2COFvNBjAFYefZDOycO688/ngNsUuo0alzG3YvYTBXi', NULL, 325165145, '2019-06-13 12:46:21', '0000-00-00 00:00:00', 0, 1, 'beltrana@beltrana', '8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23', 1, 1);

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
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `confs`
--
ALTER TABLE `confs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
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
