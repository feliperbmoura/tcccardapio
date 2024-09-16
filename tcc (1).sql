-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Set-2024 às 20:09
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nivel` varchar(60) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nome`, `telefone`, `email`, `senha`, `nivel`, `foto`, `status`) VALUES
(1, 'Renan Mello', '(99)9.9999-8888', 'renan.melo31@etec.sp.gov.br', '123', 'Administrador', 'sem-foto.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(3, 'Donuts');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `senha`, `status`) VALUES
(1, 'Renan', 'renan.melo31@etec.sp.gov.br', '123', 1),
(2, 'Felipe Moura', 'dfgdf@gdfgdfgd', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `nro` varchar(10) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `fornecedor` varchar(60) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `nro` varchar(10) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `fornecedor`, `cnpj`, `endereco`, `nro`, `cidade`, `uf`, `cep`, `telefone`) VALUES
(3, 'Dubah Donuts', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id_imagem` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id_itens` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor_unitario` decimal(9,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `subtotal` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id_itens`, `id_pedido`, `id_produto`, `valor_unitario`, `qtd`, `subtotal`) VALUES
(1, 1, 1, '123.00', 1, '123.00'),
(2, 2, 1, '123.00', 1, '123.00'),
(3, 3, 3, '8.00', 1, '8.00'),
(4, 3, 1, '123.00', 1, '123.00'),
(5, 3, 2, '5.00', 1, '5.00'),
(6, 4, 3, '8.00', 1, '8.00'),
(7, 4, 3, '8.00', 1, '8.00'),
(8, 5, 2, '5.00', 1, '5.00'),
(9, 6, 3, '8.00', 1, '8.00'),
(10, 7, 3, '8.00', 1, '8.00'),
(11, 8, 2, '5.00', 1, '5.00'),
(12, 8, 2, '5.00', 1, '5.00'),
(13, 9, 3, '8.00', 1, '8.00'),
(14, 9, 3, '8.00', 1, '8.00'),
(15, 9, 3, '8.00', 1, '8.00'),
(16, 9, 3, '8.00', 1, '8.00'),
(17, 9, 2, '5.00', 1, '5.00'),
(18, 9, 3, '8.00', 1, '8.00'),
(19, 9, 3, '8.00', 1, '8.00'),
(20, 9, 3, '8.00', 1, '8.00'),
(21, 9, 3, '8.00', 1, '8.00'),
(22, 9, 3, '8.00', 1, '8.00'),
(23, 9, 3, '8.00', 1, '8.00'),
(24, 10, 2, '5.00', 1, '5.00'),
(25, 11, 3, '8.00', 1, '8.00'),
(26, 12, 1, '123.00', 1, '123.00'),
(27, 13, 1, '123.00', 1, '123.00'),
(28, 14, 1, '123.00', 1, '123.00'),
(29, 14, 1, '123.00', 1, '123.00'),
(30, 15, 5, '6.00', 1, '6.00'),
(31, 16, 5, '6.00', 1, '6.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `forma` varchar(60) NOT NULL,
  `valor` varchar(60) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `id_cliente`, `data`, `hora`, `forma`, `valor`, `status`) VALUES
(1, 1, '2024-09-12', '16:12:32', 'Dinheiro', '123.00', 2),
(2, 1, '2024-09-12', '16:14:00', 'Dinheiro', '123.00', 0),
(3, 1, '2024-09-12', '16:24:05', 'Dinheiro', '123.00', 1),
(4, 1, '2024-09-16', '12:42:36', 'Dinheiro', '123.00', 1),
(5, 1, '2024-09-16', '12:52:13', 'Dinheiro', '123.00', 1),
(6, 1, '2024-09-16', '13:16:00', 'Dinheiro', '123.00', 1),
(7, 1, '2024-09-16', '13:17:18', 'Dinheiro', '123.00', 1),
(8, 1, '2024-09-16', '13:20:50', 'PIX', '123.00', 1),
(9, 1, '2024-09-16', '13:36:41', 'PIX', '123.00', 1),
(10, 1, '2024-09-16', '13:37:40', 'PIX', '5', 1),
(11, 1, '2024-09-16', '13:38:09', 'Credito', '8', 1),
(12, 1, '2024-09-16', '13:40:56', 'Debito', '123', 1),
(13, 1, '2024-09-16', '13:52:29', 'Credito', '123', 1),
(14, 1, '2024-09-16', '15:24:21', 'Credito', '246', 1),
(15, 1, '2024-09-16', '15:36:31', 'PIX', '6', 1),
(16, 1, '2024-09-16', '15:39:31', 'Credito', '6', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `preco` decimal(9,2) NOT NULL,
  `categoria` int(11) NOT NULL,
  `data_validade` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `quantidade_min` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `preco`, `categoria`, `data_validade`, `quantidade`, `quantidade_min`, `descricao`, `fornecedor`, `foto`) VALUES
(5, 'Chocolate', '6.00', 3, '2024-09-18', 10, 1, '<p>Donuts Tradicional com a&ccedil;ucar refinado!</p>', 3, '16-09-2024-16-15-22-Design_sem_nome__18_-removebg-preview.pn'),
(6, 'Tradicional', '6.00', 3, '2024-09-18', 10, 1, '<p>Inspirado no simpsons!</p>', 3, '16-09-2024-16-14-07-Design-sem-nome-(20).png'),
(7, 'Simpsons', '6.00', 3, '2024-09-18', 10, 1, '<p>Donuts Pinkie Pie</p>', 3, '16-09-2024-16-14-03-Design-sem-nome-(20).png'),
(8, 'Avelã', '8.00', 3, '2024-09-18', 10, 1, '<p>Donuts de Avel&atilde;</p>', 3, '16-09-2024-16-13-46-Design-sem-nome-(20).png'),
(9, 'Pinkie Pie', '6.00', 3, '2024-09-18', 10, 1, '<p>Chocolate tradicional!</p>', 3, '16-09-2024-16-13-58-Design-sem-nome-(20).png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id_imagem`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id_itens`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id_itens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
