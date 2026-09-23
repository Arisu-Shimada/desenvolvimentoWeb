Create DATABASE ong_adocao;

Use ong_adocao;
--
-- Estrutura da tabela `animais`
--

CREATE TABLE `animais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `idade` int(11) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- A coluna de imagem é adicionada por você, como parte da HU02:
ALTER TABLE animais ADD COLUMN url_imagem_animal VARCHAR(255) DEFAULT NULL;

--
-- Inserir dados da tabela `animais`
--

INSERT INTO `animais` (`id`, `nome`, `especie`, `idade`, `cidade`) VALUES
(1, 'Rex', 'Cachorro', 3, 'Campo Grande'),
(2, 'Mimi', 'Gato', 2, 'Dourados'),
(3, 'Thor', 'Cachorro', 5, 'Campo Grande'),
(4, 'Luna', 'Gato', 1, 'Corumbá'),
(5, 'Bidu', 'Cachorro', 4, 'Dourados'),
(6, 'Nina', 'Gato', 2, 'Campo Grande'),
(7, 'Max', 'Cachorro', 6, 'Ponta Porã'),
(8, 'Mel', 'Gato', 3, 'Dourados'),
(9, 'Bob', 'Cachorro', 1, 'Campo Grande'),
(10, 'Amora', 'Gato', 4, 'Corumbá');
