Create DATABASE clinica;

Use clinica;
--
-- Estrutura da tabela `produtos`
--
CREATE TABLE `pacientes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(120) NOT NULL,
`idade` int(11) DEFAULT NULL,
`telefone` varchar(20) DEFAULT NULL,
`email` varchar(120) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `medicos` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(120) NOT NULL,
`especialidade` varchar(100) DEFAULT NULL,
`crm` varchar(20) DEFAULT NULL,
`salario` decimal(10,2) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `consultas` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`data_consulta` date DEFAULT NULL,
`hora` time DEFAULT NULL,
`valor` decimal(10,2) DEFAULT NULL,
`tipo` varchar(100) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `exames` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome_exame` varchar(120) NOT NULL,
`tipo` varchar(100) DEFAULT NULL,
`valor` decimal(10,2) DEFAULT NULL,
`resultado` varchar(255) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `funcionarios` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(120) NOT NULL,
`cargo` varchar(100) DEFAULT NULL,
`salario` decimal(10,2) DEFAULT NULL,
`data_admissao` date DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;