-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2024 às 16:33
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `marmitaria`
--
CREATE DATABASE IF NOT EXISTS `marmitaria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `marmitaria`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alerta_estoque_baixo`
--

CREATE TABLE `alerta_estoque_baixo` (
  `ID_alerta` int(11) NOT NULL,
  `ID_ingrediente` int(11) DEFAULT NULL,
  `quantidade_estoque` int(11) DEFAULT NULL,
  `data_alerta` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `ID_ingrediente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoria` enum('proteína','carboidrato','vegetal','outros') NOT NULL,
  `fornecedor` varchar(255) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `valorUn` decimal(10,2) NOT NULL,
  `data_validade` date DEFAULT NULL,
  `quantMin` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ingrediente`
--

INSERT INTO `ingrediente` (`ID_ingrediente`, `nome`, `categoria`, `fornecedor`, `quantidade`, `valorUn`, `data_validade`, `quantMin`) VALUES
(1, 'Frango', 'proteína', 'Fornecedor A', 460, 10.50, '2024-12-31', 10),
(2, 'Arroz Integral', 'carboidrato', 'Fornecedor B', 460, 5.00, '2025-01-15', 10),
(3, 'Brócolis', 'vegetal', 'Fornecedor C', 460, 7.30, '2025-02-28', 10),
(4, 'Batata Doce', 'carboidrato', 'Fornecedor D', 460, 6.20, '2025-03-10', 10),
(5, 'Peixe', 'proteína', 'Fornecedor E', 460, 15.00, '2024-12-25', 10),
(6, 'Abóbora', 'vegetal', 'Fornecedor F', 460, 4.80, '2025-04-05', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `marmitas`
--

CREATE TABLE `marmitas` (
  `ID_marmita` int(11) NOT NULL,
  `nomeMarmita` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marmitas`
--

INSERT INTO `marmitas` (`ID_marmita`, `nomeMarmita`, `preco`) VALUES
(1, 'Marmita Fitness Frango', 20.00),
(2, 'Marmita Fitness Peixe', 25.00),
(3, 'Marmita Vegetariana', 18.50),
(4, 'Marmita Low Carb', 22.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `marmita_ingredi`
--

CREATE TABLE `marmita_ingredi` (
  `ID_marmitaIngredi` int(11) NOT NULL,
  `quantidade_necessaria` int(11) NOT NULL,
  `ID_ingrediente` int(11) NOT NULL,
  `ID_marmita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marmita_ingredi`
--

INSERT INTO `marmita_ingredi` (`ID_marmitaIngredi`, `quantidade_necessaria`, `ID_ingrediente`, `ID_marmita`) VALUES
(1, 150, 1, 1),
(2, 120, 4, 1),
(3, 80, 5, 2),
(4, 100, 2, 2),
(5, 150, 3, 3),
(6, 100, 2, 3),
(7, 120, 6, 4),
(8, 80, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_pedido` int(11) NOT NULL,
  `nomeCliente` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `dataEntrega` date NOT NULL,
  `ID_marmita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nivel_acesso` enum('administrador','funcionario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuario` (`nome`, `email`, `senha`, `telefone` ,`nivel_acesso`) VALUES
('Isabely ', 'Isabely@marmita.com', '$2y$10$TkJI3TOgF0aJ0PPSuwszv.7349VQ5X0HhjOE7SfZQRn78qdaM1Kuu', '1999475869',  'funcionario'),
('Raphael ', 'Raphael@marmita.com', '$2y$10$dhH3mKwHk1YKGCEDUljm/uRTRME2DWagKLMSkbfw4jX6pczHAVKN6', '1999639249',  'funcionario'),
('Rayanne ', 'Rayanne@marmita.com', '$2y$10$LwccwhU6rfewWUglmGKoveZ3hcX5/0A9ZQKLlgWOEuzzRvuWupT7q', '1998145863',  'funcionario'),
('Vitor', 'Vitor@marmita.com', '$2y$10$CTml5izmvunVQFviH.KLsu8cYgk.AtwI3hfcOJ99FO/yzaBy0XX4S', '1999029418', 'funcionario');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alerta_estoque_baixo`
--
ALTER TABLE `alerta_estoque_baixo`
  ADD PRIMARY KEY (`ID_alerta`),
  ADD KEY `ID_ingrediente` (`ID_ingrediente`);

--
-- Índices de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`ID_ingrediente`);

--
-- Índices de tabela `marmitas`
--
ALTER TABLE `marmitas`
  ADD PRIMARY KEY (`ID_marmita`);

--
-- Índices de tabela `marmita_ingredi`
--
ALTER TABLE `marmita_ingredi`
  ADD PRIMARY KEY (`ID_marmitaIngredi`),
  ADD KEY `ID_ingrediente` (`ID_ingrediente`),
  ADD KEY `ID_marmita` (`ID_marmita`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_pedido`),
  ADD KEY `ID_marmita` (`ID_marmita`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alerta_estoque_baixo`
--
ALTER TABLE `alerta_estoque_baixo`
  MODIFY `ID_alerta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `ID_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `marmitas`
--
ALTER TABLE `marmitas`
  MODIFY `ID_marmita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `marmita_ingredi`
--
ALTER TABLE `marmita_ingredi`
  MODIFY `ID_marmitaIngredi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alerta_estoque_baixo`
--
ALTER TABLE `alerta_estoque_baixo`
  ADD CONSTRAINT `alerta_estoque_baixo_ibfk_1` FOREIGN KEY (`ID_ingrediente`) REFERENCES `ingrediente` (`ID_ingrediente`);

--
-- Restrições para tabelas `marmita_ingredi`
--
ALTER TABLE `marmita_ingredi`
  ADD CONSTRAINT `marmita_ingredi_ibfk_1` FOREIGN KEY (`ID_ingrediente`) REFERENCES `ingrediente` (`ID_ingrediente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marmita_ingredi_ibfk_2` FOREIGN KEY (`ID_marmita`) REFERENCES `marmitas` (`ID_marmita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ID_marmita`) REFERENCES `marmitas` (`ID_marmita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
