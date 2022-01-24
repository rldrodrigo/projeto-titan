-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jan-2022 às 22:52
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto-titan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_precos`
--

CREATE TABLE `tb_precos` (
  `IDPRECO` int(11) NOT NULL,
  `PRECO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_precos`
--

INSERT INTO `tb_precos` (`IDPRECO`, `PRECO`) VALUES
(1, 0),
(23, 1700.98),
(26, 60.69),
(34, 42.99),
(35, 17.88);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `IDPROD` int(11) NOT NULL,
  `NOME` varchar(40) NOT NULL,
  `COR` varchar(20) NOT NULL,
  `IDPRECO` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`IDPROD`, `NOME`, `COR`, `IDPRECO`) VALUES
(23, 'Pão de Queijo', 'VERMELHO', 23),
(26, 'Bananada 2', 'AZUL', 26),
(34, 'Cerveja', 'VERMELHO', 34),
(35, 'Maçã', 'AMARELO', 35);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_precos`
--
ALTER TABLE `tb_precos`
  ADD PRIMARY KEY (`IDPRECO`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`IDPROD`),
  ADD UNIQUE KEY `NOME` (`NOME`),
  ADD KEY `IDPRECO` (`IDPRECO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `IDPROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD CONSTRAINT `tb_produtos_ibfk_1` FOREIGN KEY (`IDPRECO`) REFERENCES `tb_precos` (`IDPRECO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
