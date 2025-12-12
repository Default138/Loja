CREATE DATABASE db_loja;
USE db_loja;

CREATE TABLE produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    preco FLOAT,
    imagem TEXT,
    categoria VARCHAR(100)
);

INSERT INTO produtos (nome, preco, imagem, categoria) VALUES
('default', 10.00, 'https://lipsum.app/632x360/111111', 'none'),
('default', 20.00, 'https://lipsum.app/632x360/222222', 'none'),
('default', 30.00, 'https://lipsum.app/632x360/333333', 'none'),
('default', 40.00, 'https://lipsum.app/632x360/444444', 'none');