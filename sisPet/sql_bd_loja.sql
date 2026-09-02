Create DATABASE sispet;

Use sispet;
--
-- Estrutura da tabela `pets`
--

CREATE TABLE pets (

  id INT NOT NULL AUTO_INCREMENT,

  cliente_id INT NOT NULL,

  nome VARCHAR(100) NOT NULL,

  especie VARCHAR(50) NOT NULL,

  raca VARCHAR(50) NOT NULL,

  data_nascimento DATE NOT NULL,

  peso DECIMAL(5,2) NOT NULL,

  PRIMARY KEY (id)

) ENGINE=InnoDB

  DEFAULT CHARSET=utf8mb4;