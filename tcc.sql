-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2024 às 14:53
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
(3, 'Donuts'),
(4, 'Bebidas');

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
(1, 'Renan Mello', 'renan.melo31@etec.sp.gov.br', '123', 1),
(2, 'Felipe Moura', 'dfgdf@gdfgdfgd', '123', 1),
(3, 'felipe', 'felipemoura100k@gmail.com', '123', 1),
(4, 'Papagaio', 'papagaio@gmail.com', '123', 1);

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
-- Estrutura da tabela `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_cliente`, `feedback`, `data`) VALUES
(1, 1, 'sdfsdf', '2024-10-10 15:36:12'),
(2, 1, 'ooii', '2024-10-10 10:38:07'),
(3, 1, 'hjghjghjghj', '2024-10-10 10:39:05'),
(4, 4, 'sdfsafas', '2024-10-10 10:58:48');

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
(1, 1, 8, '8.00', 1, '8.00'),
(2, 1, 6, '6.00', 1, '6.00'),
(3, 2, 5, '6.00', 1, '6.00'),
(4, 3, 8, '8.00', 1, '8.00'),
(5, 3, 7, '6.00', 1, '6.00'),
(6, 4, 5, '6.00', 1, '6.00'),
(7, 5, 8, '8.00', 1, '8.00');

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
(1, 4, '2024-09-23', '13:22:25', 'Credito', '14', 0),
(2, 1, '2024-09-23', '13:23:07', 'PIX', '6', 0),
(3, 3, '2024-09-23', '13:24:32', 'Debito', '14', 0),
(4, 4, '2024-09-23', '13:44:40', 'Credito', '6', 0),
(5, 4, '2024-09-30', '16:30:39', 'Debito', '8', 1);

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
(5, 'Chocolate', '6.00', 3, '2024-09-18', 10, 1, '', 3, '19-09-2024-15-33-33-06.png'),
(6, 'Tradicional', '6.00', 3, '2024-09-18', 10, 1, '<p>Donuts Pinkie Pie</p>', 3, '19-09-2024-15-34-13-01.png'),
(7, 'Simpsons', '6.00', 3, '2024-09-18', 10, 1, '<p>Chocolate tradicional!</p>', 3, '19-09-2024-15-34-01-10.png'),
(8, 'Avelã', '8.00', 3, '2024-09-18', 10, 1, '', 3, '19-09-2024-15-33-17-02.png'),
(9, 'Pinkie Pie', '6.00', 3, '2024-09-18', 10, 1, '', 3, '19-09-2024-15-33-49-05.png');

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
-- Índices para tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_itens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
