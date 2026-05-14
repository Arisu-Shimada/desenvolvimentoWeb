CREATE DATABASE loja;

use loja;

CREATE TABLE `clientes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(100) NOT NULL,
`email` varchar(100) DEFAULT NULL,
`telefone` varchar(20) DEFAULT NULL,
`cpf` varchar(14) DEFAULT NULL,
`cidade` varchar(100) DEFAULT NULL,
`uf` char(2) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `vendedores` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(100) NOT NULL,
`email` varchar(100) DEFAULT NULL,
`telefone` varchar(20) DEFAULT NULL,
`cpf` varchar(14) DEFAULT NULL,
`comissao` decimal(10,2) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `marcas` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nome` varchar(100) NOT NULL,
`descricao` varchar(255) DEFAULT NULL,
`pais_origem` varchar(100) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;