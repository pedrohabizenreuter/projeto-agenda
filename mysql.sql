
CREATE DATABASE IF NOT EXISTS agenda
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE agenda;

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(14),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO contatos (nome, email, telefone) VALUES
('Ana Silva', 'ana_silva@email.com', '(11)91234-5678'),
('Bruno Costa', 'bruno.costa@email.com', '(21)98765-4321'),
('Carla Mendes', 'carla_mendes@email.com', '(31)99876-5432');

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(14) UNIQUE,
    email VARCHAR(100),
    telefone VARCHAR(14),
    endereco VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO clientes (nome, cpf, email, telefone, endereco) VALUES
('Pedro Henrique', '123.456.789-00', 'pedro@email.com', '(47)99999-1111', 'Rua A, 100'),
('Maria Souza', '987.654.321-00', 'maria@email.com', '(11)98888-2222', 'Rua B, 200'),
('Lucas Lima', '111.222.333-44', 'lucas@email.com', '(21)97777-3333', 'Rua C, 300');

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    descricao VARCHAR(255),
    preco DECIMAL(10,2),
    estoque INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produtos (nome, descricao, preco, estoque) VALUES
('Notebook', 'Notebook Dell i5', 3500.00, 10),
('Mouse Gamer', 'Mouse RGB 7200 DPI', 150.90, 25),
('Teclado Mecânico', 'Teclado Switch Blue', 299.99, 15);

INSERT INTO contatos (nome, email, telefone)
VALUES (
    'João Pedro',
    'joao@email.com',
    '(47)99999-0000'
);

CREATE INDEX idx_nome ON contatos(nome);

CREATE INDEX idx_email ON contatos(email);

ALTER TABLE produtos
ADD imagem VARCHAR(255) NULL;
drop table produtos;
SELECT * FROM contatos;
SELECT * FROM clientes;
SELECT * FROM produtos;