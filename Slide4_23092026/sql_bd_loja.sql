Create DATABASE loja;

Use Loja;
--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Inserir dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`) VALUES
(1, 'Mouse', '50.00'),
(2, 'Teclado', '100.00'),
(3, 'Monitor', '700.00'),
(4, 'Notebook', '3500.00'),
(5, 'Cabo HDMI', '30.00'),
(6, 'Pen Drive', '40.00'),
(7, 'HD Externo', '300.00'),
(8, 'Webcam', '150.00'),
(9, 'Fone de Ouvido', '80.00'),
(10, 'Caixa de Som', '120.00');