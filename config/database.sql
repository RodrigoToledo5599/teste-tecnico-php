CREATE DATABASE IF NOT EXISTS teste_tecnico_db;

USE teste_tecnico_db;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  codigo VARCHAR(20) NOT NULL UNIQUE,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  valor DECIMAL(10,2) DEFAULT 0.00,
  quantidade INT DEFAULT 0,
  status ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo'
);



INSERT INTO produtos (codigo, nome, descricao, valor, quantidade, status) VALUES 
('P001', 'Mouse Gamer RGB', 'Mouse com iluminação RGB e sensor óptico de alta precisão.', 129.90, 25, 'ativo'),
('P002', 'Teclado Mecânico ABNT2', 'Teclado mecânico com switches azuis e layout brasileiro.', 249.99, 15, 'ativo'),
('P003', 'Suporte para Notebook', 'Suporte ergonômico para notebooks de até 17 polegadas.', 89.50, 40, 'inativo');