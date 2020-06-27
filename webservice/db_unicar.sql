-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jun-2020 às 00:29
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_unicar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_campus_univali`
--

CREATE TABLE `t_campus_univali` (
  `id` int(11) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `rua` varchar(60) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `numero` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_campus_univali`
--

INSERT INTO `t_campus_univali` (`id`, `cidade_id`, `rua`, `bairro`, `numero`) VALUES
(1, 3, 'XXX QQQ EEE', 'Teste', '111'),
(3, 1, 'Rua teste', 'TesteBairro', '103'),
(4, 1, 'Rua teste', 'TesteBairro', '103');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_cidade`
--

CREATE TABLE `t_cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_cidade`
--

INSERT INTO `t_cidade` (`id`, `nome`, `uf`) VALUES
(1, 'Tijucas ', 'SC'),
(2, 'Joinville', 'SC'),
(3, 'Itajai', 'SC'),
(5, 'Florianopolis', 'SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_mensagem`
--

CREATE TABLE `t_mensagem` (
  `id` int(11) NOT NULL,
  `user_sender` int(11) NOT NULL,
  `user_receiver` int(11) NOT NULL,
  `mensagem` varchar(350) NOT NULL,
  `data_enviada` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_mensagem`
--

INSERT INTO `t_mensagem` (`id`, `user_sender`, `user_receiver`, `mensagem`, `data_enviada`) VALUES
(1, 1, 2, ':msg', '2020-06-27 17:23:46'),
(2, 1, 3, 'Teste3', '2020-06-27 17:35:02'),
(3, 1, 3, 'Teste23', '2020-06-27 17:35:06'),
(4, 1, 3, 'Teste213', '2020-06-27 17:35:15'),
(5, 1, 2, 'Wagner Lopes', '2020-06-27 18:53:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `pass_w` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sobre` varchar(600) DEFAULT NULL,
  `idade` tinyint(4) NOT NULL,
  `numero` varchar(16) NOT NULL,
  `documentacao_enviada` char(1) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `campus` int(11) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_user`
--

INSERT INTO `t_user` (`id`, `nome`, `pass_w`, `email`, `sobre`, `idade`, `numero`, `documentacao_enviada`, `curso`, `campus`, `foto`) VALUES
(1, 'Wagner Lopes', '321123', 'teste2@hotmail.com', 'testesobreee', 19, '48999184656', 'S', 'Ciência da Computação', 1, ''),
(2, 'Wagner Lopes', '123321', 'teste@hotmail.com', NULL, 18, '4899148656', 'N', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_user_viagem`
--

CREATE TABLE `t_user_viagem` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_viagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_user_viagem`
--

INSERT INTO `t_user_viagem` (`id`, `id_user`, `id_viagem`) VALUES
(1, 1, 2),
(4, 1, 1),
(5, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_viagem`
--

CREATE TABLE `t_viagem` (
  `id` int(11) NOT NULL,
  `id_user_criacao` int(11) NOT NULL,
  `quant_passageiro` tinyint(4) NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_partida` datetime NOT NULL,
  `origem` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `identificacao_campus` char(1) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_viagem`
--

INSERT INTO `t_viagem` (`id`, `id_user_criacao`, `quant_passageiro`, `data_criacao`, `data_partida`, `origem`, `destino`, `identificacao_campus`, `status`) VALUES
(1, 1, 2, '2020-06-27 18:00:08', '2020-06-27 14:00:00', 1, 2, 'O', 'F'),
(2, 1, 2, '2020-06-27 18:00:08', '2020-06-18 01:00:00', 1, 4, 'O', 'A'),
(3, 1, 2, '2020-06-27 19:18:04', '2020-06-27 14:00:00', 1, 2, 'O', 'A'),
(4, 1, 2, '2020-06-27 19:20:40', '2020-06-27 14:00:00', 1, 2, 'O', 'A'),
(5, 1, 2, '2020-06-27 19:21:14', '2020-06-27 14:00:00', 1, 2, 'O', 'A'),
(6, 1, 2, '2020-06-27 19:22:30', '2020-06-27 14:00:00', 1, 2, 'O', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_viagem_passageiro`
--

CREATE TABLE `t_viagem_passageiro` (
  `id` int(11) NOT NULL,
  `id_viagem` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_viagem_passageiro`
--

INSERT INTO `t_viagem_passageiro` (`id`, `id_viagem`, `id_user`) VALUES
(1, 1, 1),
(2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_campus_univali`
--
ALTER TABLE `t_campus_univali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_cidade`
--
ALTER TABLE `t_cidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_mensagem`
--
ALTER TABLE `t_mensagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_viagem`
--
ALTER TABLE `t_user_viagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_viagem`
--
ALTER TABLE `t_viagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_viagem_passageiro`
--
ALTER TABLE `t_viagem_passageiro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_campus_univali`
--
ALTER TABLE `t_campus_univali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_cidade`
--
ALTER TABLE `t_cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_mensagem`
--
ALTER TABLE `t_mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_user_viagem`
--
ALTER TABLE `t_user_viagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_viagem`
--
ALTER TABLE `t_viagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_viagem_passageiro`
--
ALTER TABLE `t_viagem_passageiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
