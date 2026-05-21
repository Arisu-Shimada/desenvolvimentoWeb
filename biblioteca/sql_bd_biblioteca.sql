CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE livros (
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(100),
ano INT,
quantidade INT
);

CREATE TABLE autores (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
nacionalidade VARCHAR(50)
);

CREATE TABLE editoras (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
cidade VARCHAR(50)
);

CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
email VARCHAR(100)
);

CREATE TABLE emprestimos (
id INT AUTO_INCREMENT PRIMARY KEY,
livro VARCHAR(100),
usuario VARCHAR(100),
data_emprestimo DATE,
data_devolucao DATE
);