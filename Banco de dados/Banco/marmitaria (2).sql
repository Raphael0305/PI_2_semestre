-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2024 às 11:40
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
-- Estrutura para tabela `alertas_estoque`
--

CREATE TABLE `alertas_estoque` (
  `id_alerta` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `data_alerta` date NOT NULL,
  `status_alerta` enum('pendente','resolvido') DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `entradas_estoque`
--

CREATE TABLE `entradas_estoque` (
  `id_entrada` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `quantidade_adicionada` decimal(10,2) NOT NULL,
  `fornecedor` varchar(100) DEFAULT NULL,
  `data_entrada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id_ingrediente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `fornecedor` varchar(100) DEFAULT NULL,
  `quantidade` int(11) DEFAULT 0,
  `preco_compra` decimal(10,2) DEFAULT NULL,
  `data_validade` date DEFAULT NULL,
  `quantidade_minima` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ingredientes`
--

INSERT INTO `ingredientes` (`id_ingrediente`, `nome`, `categoria`, `fornecedor`, `quantidade`, `preco_compra`, `data_validade`, `quantidade_minima`) VALUES
(1, 'Arroz', 'carboidrato', 'Extra', 3, 3.00, '2025-02-03', 0.00),
(2, 'Feijão ', 'carboidratos ', 'Extra', 5, 3.50, '2025-04-15', 0.00),
(3, 'Alface ', 'Fibra', 'Extra', 5, 2.50, '2024-11-29', 0.00),
(4, 'Frango', 'Proteina', 'Extra', 5, 5.50, '2024-11-28', 0.00),
(5, 'ovo', 'Proteina', 'Extru', 3, 10.00, '2025-01-02', 0.00),
(6, 'macarrão ', 'carboidratos ', 'Macarone', 12, 4.50, '2025-02-07', 0.00),
(7, 'tofu', 'Proteina', 'Tofu-kan', 50, 3.00, '2025-01-12', 0.00),
(66, 'Cenoura ', 'sasd', 'asda', 2, 2.02, '2024-11-28', 0.00),
(67, 'Cenoura ', 'sasd', 'asda', 2, 2.02, '2024-11-29', 0.00),
(68, 'Cenoura ', 'sasd', 'asda', 2, 2.02, '2024-11-21', 0.00),
(69, 'Cenoura ', 'sasd', 'asda', 2, 2.02, '2024-11-22', 0.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `nome_marmita` varchar(100) NOT NULL,
  `data_entrega` date NOT NULL,
  `responsavel` varchar(100) DEFAULT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorios_estoque`
--

CREATE TABLE `relatorios_estoque` (
  `id_relatorio` int(11) NOT NULL,
  `data_geracao` date NOT NULL,
  `tipo_relatorio` varchar(50) DEFAULT NULL,
  `quantidade_movimentacao` decimal(10,2) DEFAULT 0.00,
  `resetado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saidas_estoque`
--

CREATE TABLE `saidas_estoque` (
  `id_saida` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `quantidade_retirada` decimal(10,2) NOT NULL,
  `produto_final` varchar(100) DEFAULT NULL,
  `data_saida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `nivel_acesso` tinyint(1) NOT NULL CHECK (`nivel_acesso` in (1,2)),
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_completo`, `email`, `senha`, `telefone`, `nivel_acesso`, `data_cadastro`) VALUES
(2, 'rayane', 'ray@teste.com', 'Teste123!', '199999999', 1, '2024-11-02 02:58:14'),
(3, 'Isabely', 'isa@teste.com', 'Teste123!', '999999999', 1, '2024-11-02 02:58:14'),
(4, 'Vitor', 'vitor@teste.com', 'Teste123!', '989898989', 1, '2024-11-02 02:59:44'),
(6, 'raphael', 'raphael@teste.com', 'Teste123!', '2311231', 1, '2024-11-15 19:16:07');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alertas_estoque`
--
ALTER TABLE `alertas_estoque`
  ADD PRIMARY KEY (`id_alerta`),
  ADD KEY `id_ingrediente` (`id_ingrediente`);

--
-- Índices de tabela `entradas_estoque`
--
ALTER TABLE `entradas_estoque`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_ingrediente` (`id_ingrediente`);

--
-- Índices de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `relatorios_estoque`
--
ALTER TABLE `relatorios_estoque`
  ADD PRIMARY KEY (`id_relatorio`);

--
-- Índices de tabela `saidas_estoque`
--
ALTER TABLE `saidas_estoque`
  ADD PRIMARY KEY (`id_saida`),
  ADD KEY `id_ingrediente` (`id_ingrediente`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alertas_estoque`
--
ALTER TABLE `alertas_estoque`
  MODIFY `id_alerta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `entradas_estoque`
--
ALTER TABLE `entradas_estoque`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relatorios_estoque`
--
ALTER TABLE `relatorios_estoque`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `saidas_estoque`
--
ALTER TABLE `saidas_estoque`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alertas_estoque`
--
ALTER TABLE `alertas_estoque`
  ADD CONSTRAINT `alertas_estoque_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id_ingrediente`) ON DELETE CASCADE;

--
-- Restrições para tabelas `entradas_estoque`
--
ALTER TABLE `entradas_estoque`
  ADD CONSTRAINT `entradas_estoque_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id_ingrediente`) ON DELETE CASCADE;

--
-- Restrições para tabelas `saidas_estoque`
--
ALTER TABLE `saidas_estoque`
  ADD CONSTRAINT `saidas_estoque_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id_ingrediente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
