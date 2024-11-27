-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/11/2024 às 22:30
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

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AtualizarEstoqueMarmita` (IN `p_ID_marmita` INT, IN `p_quantidade` INT)   BEGIN
    -- Declarações de variáveis
    DECLARE v_ID_ingrediente INT;
    DECLARE v_quantidade_necessaria INT;
    DECLARE v_estoque_atual INT;
    DECLARE done INT DEFAULT 0;

    -- Cursor para pegar os ingredientes e suas quantidades
    DECLARE cursor_ingredientes CURSOR FOR
        SELECT ID_ingrediente, quantidade_necessaria
        FROM marmita_ingredi
        WHERE ID_marmita = p_ID_marmita;

    -- Handler para encerrar o cursor
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    -- Abrir o cursor
    OPEN cursor_ingredientes;

    -- Loop para processar cada ingrediente
    read_loop: LOOP
        -- Buscar o próximo ingrediente e a quantidade
        FETCH cursor_ingredientes INTO v_ID_ingrediente, v_quantidade_necessaria;

        -- Verificar se o loop terminou
        IF done = 1 THEN
            LEAVE read_loop;
        END IF;

        -- Multiplicar a quantidade necessária pela quantidade de marmitas
        SET v_quantidade_necessaria = v_quantidade_necessaria * p_quantidade;

        -- Obter o estoque atual do ingrediente
        SELECT quantidade INTO v_estoque_atual
        FROM ingrediente
        WHERE ID_ingrediente = v_ID_ingrediente;

        -- Verificar se há estoque suficiente
        IF v_estoque_atual >= v_quantidade_necessaria THEN
            -- Atualizar o estoque
            UPDATE ingrediente
            SET quantidade = quantidade - v_quantidade_necessaria
            WHERE ID_ingrediente = v_ID_ingrediente;
        END IF;

    END LOOP;

    -- Fechar o cursor
    CLOSE cursor_ingredientes;
END$$

DELIMITER ;

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
(1, 'Frango', 'proteína', 'Fornecedor A', 997, 10.50, '2024-12-31', 10),
(2, 'Arroz Integral', 'carboidrato', 'Fornecedor B', 1000, 5.00, '2025-01-15', 10),
(3, 'Brócolis', 'vegetal', 'Fornecedor C', 1000, 7.30, '2025-02-28', 10),
(4, 'Batata Doce', 'carboidrato', 'Fornecedor D', 997, 6.20, '2025-03-10', 10),
(5, 'Peixe', 'proteína', 'Fornecedor E', 1000, 15.00, '2024-12-25', 10),
(6, 'Abóbora', 'vegetal', 'Fornecedor F', 1000, 4.80, '2025-04-05', 10);

--
-- Acionadores `ingrediente`
--
DELIMITER $$
CREATE TRIGGER `TG_EstoqueBaixo` AFTER UPDATE ON `ingrediente` FOR EACH ROW BEGIN
    IF NEW.quantidade <= NEW.quantMin THEN
        INSERT INTO alerta_estoque_baixo (ID_ingrediente, quantidade_estoque, data_alerta)
        VALUES (NEW.ID_ingrediente, NEW.quantidade, NOW());
    ELSE
        DELETE FROM alerta_estoque_baixo
        WHERE ID_ingrediente = NEW.ID_ingrediente;
    END IF;
END
$$
DELIMITER ;

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
(1, 1, 1, 1),
(2, 1, 4, 1),
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

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`ID_pedido`, `nomeCliente`, `quantidade`, `dataEntrega`, `ID_marmita`) VALUES
(1, 'Cliente Exemplo', 3, '2024-11-30', 1);

--
-- Acionadores `pedidos`
--
DELIMITER $$
CREATE TRIGGER `TG_atualizaIngredientes` AFTER INSERT ON `pedidos` FOR EACH ROW BEGIN

    DECLARE ID_marmita INT;
    DECLARE quantidade INT;


    SET ID_marmita = NEW.ID_marmita;
    SET quantidade = NEW.quantidade;


    CALL AtualizarEstoqueMarmita(ID_marmita, quantidade);
END
$$
DELIMITER ;

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

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `nome`, `email`, `senha`, `telefone`, `nivel_acesso`) VALUES
(1, 'Isabely ', 'Isabely@marmita.com', '$2y$10$TkJI3TOgF0aJ0PPSuwszv.7349VQ5X0HhjOE7SfZQRn78qdaM1Kuu', '1999475869', 'funcionario'),
(2, 'Raphael ', 'Raphael@marmita.com', '$2y$10$dhH3mKwHk1YKGCEDUljm/uRTRME2DWagKLMSkbfw4jX6pczHAVKN6', '1999639249', 'funcionario'),
(3, 'Rayanne ', 'Rayanne@marmita.com', '$2y$10$LwccwhU6rfewWUglmGKoveZ3hcX5/0A9ZQKLlgWOEuzzRvuWupT7q', '1998145863', 'funcionario'),
(4, 'Vitor', 'Vitor@marmita.com', '$2y$10$CTml5izmvunVQFviH.KLsu8cYgk.AtwI3hfcOJ99FO/yzaBy0XX4S', '1999029418', 'funcionario');

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
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alerta_estoque_baixo`
--
ALTER TABLE `alerta_estoque_baixo`
  MODIFY `ID_alerta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `ID_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
