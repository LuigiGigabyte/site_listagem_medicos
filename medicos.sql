-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Set-2022 às 22:58
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
-- Banco de dados: `medicos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `id` int(10) NOT NULL,
  `especialidade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `especialidade`
--

INSERT INTO `especialidade` (`id`, `especialidade`) VALUES
(1, 'Dermatologia'),
(2, 'Endocrinologia'),
(3, 'Cardiologia'),
(4, 'Anestesiologia'),
(5, 'Endoscopia'),
(6, 'Geriatria'),
(7, 'Pediatria'),
(8, 'Oftalmologia'),
(9, 'Otorrinolaringologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `id` int(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `crm` varchar(30) NOT NULL,
  `telefone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`id`, `nome`, `crm`, `telefone`) VALUES
(4, 'Luigi', '24122', '2143641321'),
(6, 'Gabriel', '456', '32139817231'),
(39, 'Sarah', '1731', '231213651'),
(40, 'Joyce', '1172', '123123123'),
(46, 'Ricard', '9876', '4199756422'),
(50, 'Misael', '5334', '29381283'),
(51, 'Freitinhas', '4534', '912382712'),
(52, 'Jones', '1932', '231912813'),
(54, 'Meraki', '123643', '1232131245'),
(55, 'Silva Santos', '2312', '59182371'),
(57, 'Letica', '6664', '341551'),
(60, 'Linhares', '3451', '21321414'),
(61, 'Mariana', '4332', '6722145'),
(62, 'Joston', '2235', '123213213'),
(63, 'Rafaela', '7363', '13213123'),
(64, 'Matheus Freitas', '7777', '3213123123'),
(68, 'Luigi Enrico', '23453', '213213123'),
(69, 'Ana', '2131', '312312'),
(73, 'Ana carolina', '5152', '231312312'),
(75, 'Carolina', '4176', '2132131'),
(93, 'Douglas', '6384', '3132131');

-- --------------------------------------------------------

--
-- Estrutura da tabela `med_esp`
--

CREATE TABLE `med_esp` (
  `id_med` int(14) DEFAULT NULL,
  `id_esp` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `med_esp`
--

INSERT INTO `med_esp` (`id_med`, `id_esp`) VALUES
(39, 1),
(39, 5),
(39, 6),
(40, 1),
(40, 2),
(40, 3),
(6, 1),
(6, 3),
(46, 1),
(46, 3),
(46, 5),
(50, 2),
(50, 3),
(51, 2),
(51, 3),
(51, 4),
(52, 3),
(52, 7),
(52, 8),
(54, 1),
(54, 2),
(54, 4),
(55, 2),
(55, 3),
(55, 4),
(57, 2),
(57, 3),
(57, 4),
(57, 2),
(57, 3),
(57, 4),
(60, 2),
(60, 3),
(61, 2),
(61, 3),
(61, 4),
(62, 1),
(62, 2),
(62, 3),
(63, 1),
(63, 2),
(63, 3),
(63, 4),
(64, 2),
(64, 7),
(68, 2),
(68, 4),
(68, 5),
(69, 2),
(69, 3),
(69, 4),
(73, 1),
(73, 3),
(73, 4),
(75, 3),
(75, 4),
(4, 2),
(4, 3),
(4, 4),
(93, 2),
(93, 3),
(93, 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`,`crm`) USING BTREE;

--
-- Índices para tabela `med_esp`
--
ALTER TABLE `med_esp`
  ADD KEY `id_esp_fk` (`id_esp`),
  ADD KEY `id_med_fk` (`id_med`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `med_esp`
--
ALTER TABLE `med_esp`
  ADD CONSTRAINT `id_esp_fk` FOREIGN KEY (`id_esp`) REFERENCES `especialidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_med_fk` FOREIGN KEY (`id_med`) REFERENCES `medico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
