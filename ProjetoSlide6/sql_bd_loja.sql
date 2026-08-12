Create DATABASE gamezone;

Use gamezone;
--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `nota_media` decimal(10,1),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Inserir dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `nome`, `categoria`,`descricao`,`nota_media`) VALUES
(1, 'Doki Doki Literature Club', 'Terror psicológico', 'Yandere com historias perturbadoras e tragédias no grupo de amigos, como suicídio', '1000.1')