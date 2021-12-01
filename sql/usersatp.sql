-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2021 às 15:14
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `usersatp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `devolucoes`
--

CREATE TABLE `devolucoes` (
  `id` int(11) NOT NULL,
  `datadevolucao` date NOT NULL,
  `nomeitemdevolvido` text NOT NULL,
  `nomeusuariodevolucao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `devolucoes`
--

INSERT INTO `devolucoes` (`id`, `datadevolucao`, `nomeitemdevolvido`, `nomeusuariodevolucao`) VALUES
(22, '2021-11-30', 'Livro de Receitas', 'Bruno'),
(25, '2021-11-30', 'Bola de Basquete', 'Bruno'),
(26, '2021-11-30', 'Monitor AOC', 'BrunoB'),
(27, '2021-11-30', 'Livro de Receitas', 'Aline'),
(28, '2021-12-01', 'Camisa Listrada', 'BrunoB'),
(29, '2021-12-01', 'Guarda-sol de praia', 'Bruno'),
(30, '2021-12-01', 'Livro - x', 'BrunoB'),
(31, '2021-12-01', 'Livro - x', 'BrunoB'),
(32, '2021-12-01', 'Caneta esferográfica', 'Bruno'),
(33, '2021-12-01', 'Caneta esferográfica', 'Bruno'),
(34, '2021-12-01', 'Monitor AOC', 'Joao'),
(35, '2021-12-01', 'Caneca Especial', 'BrunoB'),
(36, '2021-12-01', 'Caneca Especial', 'Joao'),
(37, '2021-12-01', 'Guia do PHP', 'Joao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dataemprestimo` date NOT NULL,
  `datadevolucao` date NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id`, `nome`, `status`, `dataemprestimo`, `datadevolucao`, `iduser`) VALUES
(1, 'Livro - x', 'Emprestado', '2021-12-01', '2021-12-07', 3),
(2, 'Iphone 10 - 2019', 'Emprestado', '2021-11-17', '2021-11-26', 30),
(3, 'Forma de pão', 'Emprestado', '2021-11-30', '2021-12-09', 32),
(8, 'Caneca Especial', 'Disponível', '0000-00-00', '0000-00-00', 0),
(9, 'Caneta esferográfica', 'Disponível', '0000-00-00', '0000-00-00', 0),
(11, 'Travesseiro de pluma', 'Emprestado', '2021-11-03', '2022-02-23', 30),
(12, 'Livro de Receitas', 'Disponível', '0000-00-00', '0000-00-00', 0),
(13, 'Camisa Listrada', 'Emprestado', '2021-12-01', '2022-01-19', 33),
(14, 'Guarda-sol de praia', 'Emprestado', '2021-11-30', '2021-12-08', 30),
(16, 'Bola de Basquete', 'Emprestado', '2021-12-09', '2022-01-19', 3),
(20, 'Notebook Dell I5', 'Emprestado', '2021-06-01', '2021-10-12', 3),
(22, 'Monitor AOC', 'Emprestado', '2021-12-01', '2021-12-08', 3),
(23, 'Cadeira de Praia', 'Emprestado', '2021-11-02', '2021-11-15', 3),
(24, 'Celular MS-1023 PRO', 'Emprestado', '2021-11-28', '2021-11-29', 30),
(25, 'Ventilador', 'Emprestado', '2021-11-26', '2022-01-19', 10),
(26, 'Teclado Infantil', 'Disponível', '0000-00-00', '0000-00-00', 0),
(28, 'Carro Preto de passeio', 'Emprestado', '2021-11-24', '2021-11-30', 10),
(29, 'Computador Gamer 2017', 'Disponível', '0000-00-00', '0000-00-00', 0),
(30, 'Apostila de programação', 'Emprestado', '2021-11-17', '2021-11-22', 3),
(31, 'Guia do PHP', 'Disponível', '0000-00-00', '0000-00-00', 0),
(32, 'Garfo', 'Disponível', '0000-00-00', '0000-00-00', 0),
(33, 'Colher', 'Disponível', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `acctipo` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `senha`, `acctipo`) VALUES
(3, 'BrunoB', 'bordignonotavio@gmail.com', '1234', 'adm'),
(4, 'Jose', 'jose@email.com', '98765', 'user'),
(5, 'Rubens', 'rubensrub@email.com', '654321', 'user'),
(7, 'Ayrton', 'ayrton@email.com', 'ayrton123', 'user'),
(8, 'Josue', 'josue@email.com', 'josue1234', 'user'),
(10, 'Gabriel', 'gabriel@email.com', '123456', 'user'),
(13, 'Elias', 'elias@email.com', '123456', 'user'),
(14, 'Pedro', 'pedro@gmail.com', 'pedropedro65432', 'user'),
(15, 'Rafael', 'rafael@hotmail.com', 'rafa12349876', 'user'),
(16, 'Gustavo', 'gusta@gmail.com', 'gustavo12938', 'user'),
(17, 'Roberto', 'roberto@email.com', 'rob123987', 'user'),
(18, 'Fernando', 'fernando@email.com', 'fer12345', 'user'),
(30, 'Bruno', 'bruno@email.com', '123', 'user'),
(32, 'Aline', 'aline02@email.com', '12345', 'user'),
(33, 'Artur', 'artur@email.com', '123456', 'user'),
(34, 'Augusto', 'augusto@email.com', '98765', 'user'),
(35, 'Augusto', 'augusto@email.com', '98765', 'user'),
(36, 'Cleiton', 'cleiton@email.com', '1234', 'user'),
(37, 'Renato', 'renato@email.com', '987654', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `devolucoes`
--
ALTER TABLE `devolucoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `devolucoes`
--
ALTER TABLE `devolucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
